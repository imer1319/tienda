<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:products_index')->only(['index', 'datatables']);
        $this->middleware('permission:products_create')->only(['create', 'store']);
        $this->middleware('permission:products_show')->only('show');
        $this->middleware('permission:products_edit')->only(['edit', 'update']);
        $this->middleware('permission:products_destroy')->only('destroy');
    }

    public function datatables()
    {
        $data = Product::query()
            ->select('id', 'name', 'slug', 'price', 'stock', 'category_id')
            ->orderBy('id', 'DESC');
        return DataTables::of($data)
            ->addColumn('category', function (Product $product) {
                return $product->category->name;
            })
            ->addColumn('btn', 'admin.products.partials.btn')
            ->rawColumns(['btn', 'category'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::with('category')->latest()->paginate(),
            'categorias' => Category::all()
        ]);
    }

    public function search(Request $request)
    {
        $products = Product::query()
            ->byCategoryId($request->input('category_id'))
            ->byName($request->input('name'))
            ->with('category')
            ->latest()
            ->paginate();

        return view('admin.products.index', [
            'products' => $products,
            'categorias' => Category::all()
        ]);
    }


    public function create()
    {
        return view('admin.products.create', [
            'product' => new Product(),
            'categories' => Category::pluck('name', 'id'),
            'providers' => Provider::pluck('name', 'id')
        ]);
    }

    public function store(StoreRequest $request)
    {
        $product = (new Product)->fill($request->validated());
        $image = $request->file('image');
        $imageName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('productos'), $imageName);
        $product->image = "productos/{$imageName}";
        $product->save();

        return redirect()->route('admin.products.index')->with('flash', 'Producto creado correctamente');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', [
            'product' => $product
        ]);
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::pluck('name', 'id'),
            'providers' => Provider::pluck('name', 'id')
        ]);
    }

    public function update(UpdateRequest $request, Product $product)
    {
        if ($request->hasFile('image') && $product->image) {
            $previousImage = basename($product->image);
            unlink(public_path("productos/{$previousImage}"));
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('productos'), $imageName);
            $product->image = "productos/{$imageName}";
        }
        $product->update($request->except('image'));

        return redirect()->route('admin.products.index')->with('flash', 'Producto actualizado correctamente');
    }

    public function destroy(Product $product)
    {
        $imagePath = public_path($product->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('flash', 'Producto eliminado correctamente');
    }

    public function downloadExcel(Request $request)
    {
        return Excel::download(new ProductExport($request->all()), 'productos.xlsx');
    }

    public function print(Request $request)
    {
        $productos = Product::query()
            ->byCategoryId($request->input('category_id'))
            ->byName($request->input('name'))
            ->with('category')
            ->latest()
            ->get();
        $pdf = Pdf::loadView('admin.reportes.productos', compact('productos'));

        $pdf->setPaper('A4', 'landscape');

        $pdf->set_option('isHtml5ParserEnabled', true);

        return $pdf->stream();
    }
}
