<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Driver\StoreRequest;
use App\Http\Requests\Driver\UpdateRequest;
use App\Models\Driver;
use Yajra\Datatables\Datatables;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:drivers_index')->only(['index','datatables']);
        $this->middleware('permission:drivers_create')->only(['create', 'store']);
        $this->middleware('permission:drivers_edit')->only(['edit', 'update']);
        $this->middleware('permission:drivers_destroy')->only('destroy');
    }

    public function datatables()
    {
        return DataTables::of(Driver::select('id', 'name','ci','placa','modelo_movil','phone'))
            ->addColumn('btn', 'admin.drivers.partials.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.drivers.index');
    }

    public function create()
    {
        return view('admin.drivers.create',[
            'driver' => new Driver()
        ]);
    }

    public function store(StoreRequest $request)
    {
        Driver::create($request->validated());
        return redirect()->route('admin.drivers.index')->with('flash','Categoria creada corretamente');
    }

    public function edit(Driver $driver)
    {
        return view('admin.drivers.edit', compact('driver'));
    }

    public function update(UpdateRequest $request, Driver $driver)
    {
        $driver->update($request->validated());
        return redirect()->route('admin.drivers.index')->with('flash','Categoria actualizada corretamente');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('admin.drivers.index')->with('flash','Categoria eliminada corretamente');
    }
}
