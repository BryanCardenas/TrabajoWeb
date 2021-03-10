<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'nombre'    => 'required|min:2',
            'apellido'  => 'required|min:3',
            'rol'       => 'required',
            'email'     => 'required|unique:usuarios,email|min:6',
            'password'  => 'required|confirmed|min:6'
        ];
    }

    public function attributes()
    {
        return [
            'nombre'  => 'Nombres',
            'apellido'=> 'Apellidos',
            'rol'     => 'Rol',
            'email'   => 'Correo electrónico',
            'password'=> 'Contraseña'
        ];
    }
}
