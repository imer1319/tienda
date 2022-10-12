<?php

namespace App\Http\Requests\Debt;

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
            'amount' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => 'El campo monto inicial es requerido', 
            'amount.min' => 'El campo monto no puede ser 0' 
        ];
    }
}
