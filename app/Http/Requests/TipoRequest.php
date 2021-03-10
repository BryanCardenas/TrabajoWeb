<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoRequest extends FormRequest
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
            'nombre' => 'required|min:2',
            'precio' => 'required|numeric|min:1000'
        ];
    }

    public function attributes()
    {
        return[
            'nombre' => 'Nombre del tipo',
            'precio' => 'Precio'
        ];
    }
}
