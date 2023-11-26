<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Yajra\DataTables\Facades\DataTables;

class ProcesoController extends Controller
{
    public function datatables()
    {
        $data = Pedido::with(['client', 'detalles'])
            ->select('id', 'total', 'cliente_id', 'status', 'sale_type', 'created_at')
            ->where('status', 'EN PROCESO');
        return DataTables::of($data)
            ->addColumn('client', function (Pedido $pedido) {
                return $pedido->client->name;
            })
            ->addColumn('created_at', function (Pedido $pedido) {
                return $pedido->created_at->format('M d Y H:i');
            })
            ->addColumn('items', function (Pedido $pedido) {
                return count($pedido->detalles);
            })
            ->addColumn('btn', 'admin.procesos.partials.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.procesos.index');
    }

    public function show(Pedido $proceso)
    {
        return view('admin.procesos.show', [
            'pedido' => $proceso
        ]);
    }
}
