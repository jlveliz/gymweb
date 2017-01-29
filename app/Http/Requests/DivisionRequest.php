<?php

namespace GymWeb\Http\Requests;

use GymWeb\Http\Requests\Request;

class DivisionRequest extends Request
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
            'name' => 'required|max:50',
            'description' => 'required|max:150',
        ];
    }

    public function messages()
    {
        
        return [
            'name.required' => 'El nombre de tipo de la devisión es requerida',
            'name.max' => 'El nombre debe tener un máximo de 50 caracteres',
            'description.required' => 'La descripción del tipo de membresia requerida',
            'description.max' => 'La descripción debe tener un máximo de 150 caracteres',
        ];
    }
}
