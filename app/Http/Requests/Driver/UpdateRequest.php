<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'apellido_paterno' => 'nullable|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'ci' => [
                'required',
                'string',
                'max:20',
                Rule::unique('drivers')->ignore($this->route('driver'))
            ],
            'phone' => 'nullable|string|max:15',
            'direccion' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date|before:today',
            'placa' => 'nullable|string|max:10',
            'modelo_movil' => 'required|string|max:50',
            'categoria_licencia' => 'required|string|max:20',
            'genero' => 'required|in:MASCULINO,FEMENINO,OTROS',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'ci.required' => 'El CI es obligatorio.',
            'ci.unique' => 'El CI ya está en uso.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
            'genero.required' => 'El género es obligatorio.',
        ];
    }
}
