<?php

namespace GymWeb\Http\Requests;

use GymWeb\Http\Requests\Request;

class MembershipDetailRequest extends Request
{
    
    public function __construct()
    {
    }

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
                    'membership_id' => 'required|exists:membership,id',
                    'secuence' => 'required|int',
                ];
            }
            case 'PUT':
            {
                
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
                    'membership_id.required' => 'La membresia es requerida',
                    'membership_id.exists' => 'Ingrese una membresia existente',
                ];
            }
            case 'PUT':                
            default:
                # code...
                break;
        }
    }
}
