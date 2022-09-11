<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use Yajra\Datatables\Datatables;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:categories_index')->only(['index','datatables']);
        $this->middleware('permission:categories_create')->only(['create', 'store']);
        $this->middleware('permission:categories_edit')->only(['edit', 'update']);
        $this->middleware('permission:categories_destroy')->only('destroy');
    }

    public function datatables()
    {
        return DataTables::of(Category::select('id', 'name', 'slug'))
            ->addColumn('btn', 'admin.categories.partials.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create',[
            'category' => new Category()
        ]);
    }

    public function store(StoreRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('admin.categories.index')->with('flash','Categoria creada corretamente');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('admin.categories.index')->with('flash','Categoria actualizada corretamente');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('flash','Categoria eliminada corretamente');
    }
}
