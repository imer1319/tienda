<?php

namespace App\Http\Requests\User;

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
        $rules = [
            'name' => 'required',
            'username' => [
                'required',
                Rule::unique('users')->ignore($this->route('user')->id)
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($this->route('user')->id)
            ]
        ];
        if ($this->filled('password')) {
            $rules['password'] = ['confirmed', 'min:6'];
        }
        return $rules;
    }
}
