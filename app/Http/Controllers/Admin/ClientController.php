<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:clients_index')->only(['index', 'datatables']);
        $this->middleware('permission:clients_create')->only(['create', 'store']);
        $this->middleware('permission:clients_show')->only('show');
        $this->middleware('permission:clients_edit')->only(['edit', 'update']);
        $this->middleware('permission:clients_destroy')->only('destroy');
    }
    
    public function datatables()
    {
        return DataTables::of(Client::select('id', 'name', 'document_type','document'))
        ->addColumn('btn', 'admin.clients.partials.btn')
        ->rawColumns(['btn'])
        ->toJson();
    }

    public function index()
    {
        return view('admin.clients.index');
    }

    public function create()
    {
        $client = new Client();
        return view('admin.clients.create', compact('client'));
    }

    public function store(StoreRequest $request)
    {
        Client::create($request->validated());

        return redirect()->route('admin.clients.index')->with('flash', 'Cliente creado corretamente');
    }

    public function show(Client $client)
    {
        return view('admin.clients.show', [
            'client' => $client
        ]);
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    public function update(UpdateRequest $request, Client $client)
    {
        $client->update($request->validated());
        return redirect()->route('admin.clients.index')->with('flash', 'Cliente actualizado corretamente');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index')->with('flash', 'Cliente eliminado corretamente');
    }
}
