<?php

namespace App\Http\Requests\Pedido;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cliente_id' => 'required|integer|exists:users,id',
            'sale_type' => 'required|string|in:CONTADO,DEUDA',
            'total' => 'required|numeric',
            'pago_deuda' => 'nullable|numeric',
            'monto_pagado' => 'required|numeric',
            'client.direccion' => 'required|string',
            'client.phone' => 'required|string',
            'client.ciudad' => 'required|string',
            'detalle_pedido' => 'required|array',
            'detalle_pedido.*.product_id' => 'required|integer|exists:products,id',
            'detalle_pedido.*.cantidad' => 'required|integer',
        ];
    }
}
