<?php

namespace GymWeb\Http\Requests;

use GymWeb\Http\Requests\Request;

class RoleRequest extends Request
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
                    'name' => 'required|max:20|unique:permission',
                    'display_name' => 'required|max:30|unique:permission',
                    'description' => 'max:255',
                ];
            }
            case 'PUT':
            {
                return [
                    'name' => 'required|max:20|unique:permission,name,'.$this->get('key'),
                    'display_name' => 'required|max:30|unique:permission,display_name,'.$this->get('key'),
                    'description' => 'max:255',
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
                    'name.required' => 'Nombre de rol requerido',
                    'name.max'=>'Nombre de rol debe tener máximo 20 caracteres',
                    'name.unique' => 'El nombre de rol ya existe',
                    'display_name.required'=>'Nombre a mostrar requerido',
                    'display_name.max'=>'Nombre a mostrar del rol debe tener máximo 30 caracteres',
                    'display_name.unique'=>'El nombre a mostrar del rol ya existe',
                    'description.max'=>'La descripción del rol debe tener máximo 30 caracteres',
                ];
            }
            case 'PUT':
                return [
                    'name.required' => 'Nombre requerido',
                    'name.max'=>'Nombre de rol debe tener máximo 20 caracteres',
                    'name.unique' => 'El nombre de rol ya existe',
                    'display_name.required'=>'Nombre a mostrar requerido',
                    'display_name.max'=>'Nombre a mostrar del rol debe tener máximo 30 caracteres',
                    'display_name.unique'=>'El nombre a mostrar del rol ya existe',
                    'description.max'=>'La descripción del rol debe tener máximo 30 caracteres',
                ];
            default:
                # code...
                break;
        }
    }
}
