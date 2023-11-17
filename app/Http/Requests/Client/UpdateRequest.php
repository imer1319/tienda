<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
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
        $providerId = $this->route('provider');

        return [
            'apellido_paterno' => 'nullable|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'ci' => [
                'required',
                'string',
                'max:255',
                Rule::unique('providers', 'ci')->ignore($providerId),
            ],
            'phone' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'fecha_nacimiento' => 'nullable|date',
            'genero' => 'required|in:MASCULINO,FEMENINO,OTROS',
        ];
    }
}
