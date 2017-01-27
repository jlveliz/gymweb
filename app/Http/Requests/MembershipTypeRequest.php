<?php

namespace GymWeb\Http\Requests;

use GymWeb\Http\Requests\Request;

class MembershipTypeRequest extends Request
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
            'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        
        return [
            'name.required' => 'El nombre de tipo de membresia requerida',
            'name.max' => 'El nombre debe tener un máximo de 50 caracteres',
            'description.required' => 'La descripción del tipo de membresia requerida',
            'name.max' => 'La descripción debe tener un máximo de 150 caracteres',
            'price.required' => 'El precio del tipo de membresia requerida',
            'price.numeric' => 'El precio del tipo de membresia es inválida',
        ];
    }
}
