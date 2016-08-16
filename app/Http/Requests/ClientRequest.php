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
                    'email' => 'required|email|max:20',
                    'phone' => 'required|numeric',
                    'height' => 'required|numeric:4|int',
                    'weight' => 'required|numeric',
                    'birth_date' => 'required|date',
                ];
            }
            case 'PUT':
            {
                return [
                    'identity_number' => 'required|max:10|unique:client',
                    'name' => 'required|max:30',
                    'last_name' => 'required|max:30',
                    'email' => 'required|email|max:20',
                    'phone' => 'required|numeric',
                    'height' => 'required|numeric:4|int',
                    'weight' => 'required|numeric',
                    'birth_date' => 'required|date',
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
                    'name' => 'required|max:30',
                    'last_name' => 'required|max:30',
                    'email' => 'required|email|max:20',
                    'phone' => 'required|numeric',
                    'height' => 'required|numeric:4|int',
                    'weight' => 'required|numeric',
                    'birth_date' => 'required|date',
                ];
            }
            case 'PUT':
                return [
                    'username.required' => 'Usuario requerido',
                    'username.max'=>'Nombre de usuario debe tener máximo 30 caracteres',
                    'username.unique' => 'El nombre de usuario ya existe',
                    'password.required_with' =>'Clave requerida',
                    'password_repeat.required_with'=>'Confirmacion de clave requerida',
                    'password_repeat.same'=>'Las claves no coinciden',
                    'roles.required'=>'Debe escoger al menos un rol',
                ];
            default:
                # code...
                break;
        }
    }
}
