<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CambioContrasenaRequest extends FormRequest
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
            'password-antigua' => 'required',
            'password'  => 'required|confirmed|min:6'
        ];
    }

    public function attributes()
    {
        return [
            'password-antigua' => 'Contraseña actual',
            'password' => 'Contraseña'
        ];
    }
}
