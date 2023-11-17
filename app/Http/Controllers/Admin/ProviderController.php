<?php

namespace App\Http\Controllers\Admin;

use App\Models\Provider;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:providers_index')->only(['index', 'datatables']);
        $this->middleware('permission:providers_create')->only(['create', 'store']);
        $this->middleware('permission:providers_show')->only('show');
        $this->middleware('permission:providers_edit')->only(['edit', 'update']);
        $this->middleware('permission:providers_destroy')->only('destroy');
    }

    public function datatables()
    {
        return DataTables::of(Provider::select('id', 'name', 'apellido_paterno', 'apellido_materno', 'ci', 'phone', 'genero')->orderBy('id', 'desc'))
            ->addColumn('full_name', function ($provider) {
                return $provider->getFullNameAttribute();
            })
            ->addColumn('btn', 'admin.providers.partials.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }


    public function index()
    {
        return view('admin.providers.index');
    }

    public function create()
    {
        $provider = new Provider();
        return view('admin.providers.create', compact('provider'));
    }

    public function store(StoreRequest $request)
    {
        Provider::create($request->validated());

        return redirect()->route('admin.providers.index')->with('flash', 'Proveedor creado corretamente');
    }

    public function show(Provider $provider)
    {
        return view('admin.providers.show', [
            'provider' => $provider->load('products')
        ]);
    }

    public function edit(Provider $provider)
    {
        return view('admin.providers.edit', compact('provider'));
    }

    public function update(UpdateRequest $request, Provider $provider)
    {
        $provider->update($request->validated());
        return redirect()->route('admin.providers.index')->with('flash', 'Proveedor actualizado corretamente');
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('admin.providers.index')->with('flash', 'Proveedor eliminado corretamente');
    }
}
