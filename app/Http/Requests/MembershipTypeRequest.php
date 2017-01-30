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
            'division_id' => 'required|exists:division,id',
            'name' => 'required|max:50',
            'description' => 'required|max:150',
            'length_time_number' => 'required|numeric',
            'length_time_mod' => 'required|string|in:days,weeks,months',
            'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        
        return [
            'division_id.required' => 'La división del tipo de membresia es requerido',
            'division_id.exists' => 'La división que desea ingresar no existe',
            'name.required' => 'El nombre de tipo de membresia requerida',
            'name.max' => 'El nombre debe tener un máximo de 50 caracteres',
            'description.required' => 'La descripción del tipo de membresia requerida',
            'description.max' => 'La descripción debe tener un máximo de 150 caracteres',
            'length_time_number.required' => 'La longitud de tiempo es requerida',
            'length_time_number.number' => 'La longitud de tiempo es inválida',
            'length_time_mod.required' => 'El modo de tiempo es requerido',
            'length_time_mod.string' => 'El modo de tiempo es inválido',
            'length_time_mod.in' => 'El modo de tiempo es inválido',
            'price.required' => 'El precio del tipo de membresia requerida',
            'price.numeric' => 'El precio del tipo de membresia es inválida',
        ];
    }
}
