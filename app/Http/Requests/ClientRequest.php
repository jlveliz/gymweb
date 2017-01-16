<?php

namespace GymWeb\Http\Requests;

use GymWeb\Http\Requests\Request;

class ClientRequest extends Request
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'identity_number' => 'required|max:10|unique:client',
                    'name' => 'required|max:30',
                    'last_name' => 'required|max:30',
                    'email' => 'required|email|max:50|unique:client',
                    'phone' => 'required|numeric',
                    'height' => 'required|numeric:4|int',
                    'weight' => 'required|numeric',
                    'birth_date' => 'required|date',
                    'admission_date' => 'required|date',
                ];
            }
            case 'PUT':
            {
                return [
                    'identity_number' => 'required|max:10|unique:client,identity_number,'.$this->get('key'),
                    'name' => 'required|max:30',
                    'last_name' => 'required|max:30',
                    'email' => 'required|email|max:50|unique:client,email,'.$this->get('key'),
                    'phone' => 'required|numeric',
                    'height' => 'required|numeric:4',
                    'weight' => 'required|numeric',
                    'birth_date' => 'required|date',
                    'admission_date' => 'required|date',
                ];   
            }
            default:
                # code...
                break;
        }
    }

    public function messages()
    {
        
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'identity_number.required' => 'Cédula requerida',
                    'identity_number.max' => 'Cédula debe tener maximo 10 digitos',
                    'identity_number.unique' => 'Cédula existente',
                    'name.required' => 'Nombre de cliente requerido',
                    'name.max' => 'Nombre de cliente debe tener máximo 30 caracteres',
                    'last_name.required' => 'Apellido de cliente requerido',
                    'last_name.max' => 'Apellido de cliente debe tener máximo 30 caracteres',
                    'email.required' => 'Email requerido',
                    'email.email' => 'Email inválido',
                    'email.max' => 'Email de cliente debe tener máximo 50 caracteres',
                    'email.unique' => 'Email existente',
                    'phone.required' => 'Teléfono requerido',
                    'phone.numeric' => 'Teléfono inválido',
                    'height.required' => 'Altura requerida',
                    'height.numeric' => 'Altura inválida',
                    'weight.required' => 'Peso requerido',
                    'weight.numeric' => 'Peso inválido',
                    'birth_date.required' => 'Fecha de nacimiento requerida',
                    'birth_date.date' => 'Fecha de nacimiento inválida',
                    'admission_date.required' => 'Fecha de ingreso requerida',
                    'admission_date.date' => 'Fecha de ingreso inválida',
                ];
            }
            case 'PUT':
                return [
                    'identity_number.required' => 'Cédula requerida',
                    'identity_number.max' => 'Cédula debe tener maximo 10 digitos',
                    'identity_number.unique' => 'Cédula existente',
                    'name.required' => 'Nombre de cliente requerido',
                    'name.max' => 'Nombre de cliente debe tener máximo 30 caracteres',
                    'last_name.required' => 'Apellido de cliente requerido',
                    'last_name.max' => 'Apellido de cliente debe tener máximo 30 caracteres',
                    'email.required' => 'Email requerido',
                    'email.email' => 'Email inválido',
                    'email.max' => 'Email de cliente debe tener máximo 50 caracteres',
                    'email.unique' => 'Email existente',
                    'phone.required' => 'Teléfono requerido',
                    'phone.numeric' => 'Teléfono inválido',
                    'height.required' => 'Altura requerida',
                    'height.numeric' => 'Altura inválida',
                    'weight.required' => 'Peso requerido',
                    'weight.numeric' => 'Peso inválido',
                    'birth_date.required' => 'Fecha de nacimiento requerida',
                    'birth_date.date' => 'Fecha de nacimiento inválida',
                    'admission_date.required' => 'Fecha de ingreso requerida',
                    'admission_date.date' => 'Fecha de ingreso inválida',
                ];
            default:
                # code...
                break;
        }
    }
}
