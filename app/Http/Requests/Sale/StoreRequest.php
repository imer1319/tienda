<?php

namespace App\Http\Requests\Sale;

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
            'client_id' => 'required|exists:App\Models\Client,id',
            'user_id' => 'required|exists:App\Models\User,id',
            'sale_type' => 'required|in:CONTADO,DEUDA',
            'status' => 'required|in:PENDIENTE,PAGADO',
            'total' => 'required|integer|min:1',
            'products' => 'required|min:1',
            'products.*.product_id' => 'required|exists:App\Models\Product,id|min:1',
            'products.*.quantity' => 'required|integer|min:1'
        ];
    }

    public function messages()
    {
        return [
            'products.required' => 'El campo productos es requerido',
            'products.min' => 'El carrito no puede estar vacio',
        ];
    }
}
