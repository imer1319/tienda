<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pedido\StoreRequest;
use App\Http\Resources\PedidoResource;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function index()
    {
        return PedidoResource::collection(
            Pedido::query()
                ->orderBy('created_at', 'desc')
                ->get()
        );
    }

    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $detalles_pedido = $request->input('detalle_pedido');
            $client = $request->input('client');
            $client_id = $request->input('cliente_id');

            $pedido = Pedido::create([
                'cliente_id' => $client_id,
                'sale_type' => $request->input('sale_type'),
                'total' => $request->input('total'),
                'monto_pagado' => $request->input('monto_pagado'),
            ]);

            foreach ($detalles_pedido as $detalle) {
                $pedido->detalles()->create([
                    'product_id' => $detalle['product_id'],
                    'cantidad' => $detalle['cantidad'],
                ]);
            }
            $cliente = User::find($client_id);
            $cliente->profile()->update([
                'phone' => $client['phone'],
                'ciudad' => $client['ciudad'],
                'direccion' => $client['direccion'],
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
