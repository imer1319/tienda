<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Yajra\Datatables\Datatables;

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
        return DataTables::of(Product::select('id', 'name', 'slug', 'price', 'stock', 'category_id'))
            ->addColumn('category', function (Product $product) {
                return $product->category->name;
            })
            ->addColumn('btn', 'admin.products.partials.btn')
            ->rawColumns(['btn', 'category'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.create', [
            'product' => new Product(),
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function store(StoreRequest $request)
    {
        $product = Product::create($request->validated());
        return redirect()->route('admin.products.index')->with('flash', 'Producto creado corretamente');
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
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('admin.products.index')->with('flash', 'Producto actualizado corretamente');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('flash', 'Producto eliminado corretamente');
    }
}
