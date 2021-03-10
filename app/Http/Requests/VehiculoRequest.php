<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
            'modelo'    => 'required|min:2',
            'marca'     => 'required|min:2',
            'patente'   => 'required|min:6|max:6|regex:/^([a-zA-Z]{2,4}[0-9]{2,4})?$/',
        ];
    }

    public function attributes()
    {
        return [
            'modelo'    => 'Modelo',
            'marca'     => 'Marca',
            'tipo_id'   => 'Tipo',
            'patente'   => 'Patente'
        ];
    }
}
