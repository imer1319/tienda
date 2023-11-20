<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Yajra\DataTables\Facades\DataTables;

class PedidoController extends Controller
{
    public function datatables()
    {
        $data = Pedido::with(['client', 'detalles'])
            ->select('id', 'total', 'status', 'sale_type', 'created_at');
        return DataTables::of($data)
            ->addColumn('client', function (Pedido $pedido) {
                return $pedido->user->name;
            })
            ->addColumn('btn', 'admin.pedidos.partials.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.pedidos.index');
    }
}
