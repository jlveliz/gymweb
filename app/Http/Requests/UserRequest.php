<?php

namespace GymWeb\Http\Requests;

use GymWeb\Http\Requests\Request;

class UserRequest extends Request
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
                    'username' => 'required|max:30|unique:user',
                    'password' => 'required',
                    'password_repeat' => 'required|same:password',
                ];
            }
            case 'PUT':
            {
                return [
                    'username' => 'required|max:30|unique:user,username,'.$this->get('key'),
                    'password' => 'required_with:password',
                    'password_repeat' => 'required_with:password|same:password',
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
                    'username.required' => 'Usuario requerido',
                    'username.max'=>'Nombre de usuario debe tener máximo 30 caracteres',
                    'username.unique' => 'El nombre de usuario ya existe',
                    'password.required'=>'Clave requerida',
                    'password_repeat.required'=>'Confirmacion de clave requerida',
                    'password_repeat.same'=>'Las claves no coinciden',
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
                ];
            default:
                # code...
                break;
        }
    }
}
