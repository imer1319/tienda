<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Deuda\StoreRequest;
use App\Models\Pedido;

class DeudaController extends Controller
{
    public function store(StoreRequest $request, Pedido $pedido)
    {
        $montoAbonado = $request->input('amount');
        $pagoFaltante = $pedido->pago_faltante - $montoAbonado;

        if ($pagoFaltante != 0) {
            $pedido->update([
                'pago_faltante' => $pagoFaltante,
            ]);
        } else {
            $pedido->update([
                'pago_faltante' => 0,
                'status' => 'COMPLETADO',
            ]);
        }

        $pedido->deudas()->create([
            'amount' => $montoAbonado,
        ]);
        return redirect()->route('admin.procesos.show', $pedido);
    }
}
