<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArriendoRequest extends FormRequest
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
            'fecha_salida'  => 'required|date',
            'fecha_llegada' => 'date|after:fecha_salida',
            'vehiculo_id'   => 'required',
            'cliente_id'    => 'required',
            'fotos'    => 'mimes:png,jpg'
        ];
    }

    public function attributes()
    {
        return [
            'fecha_salida' => 'Fecha de salida',
            'vehiculo_id'  => 'Vehiculo',
            'cliente_id'   => 'Cliente',
            'fotos'   => 'Imagenes'
        ];
    }
}
