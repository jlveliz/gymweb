<?php

namespace GymWeb\Http\Requests;

use GymWeb\Http\Requests\Request;

class BookDetailRequest extends Request
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
                    'book_id' => 'required|exists:book,id',
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
                    'book_id.required' => 'La cartilla es requerida',
                    'client_id.exists' => 'Ingrese una cartilla existente',
                ];
            }
            case 'PUT':                
            default:
                # code...
                break;
        }
    }
}
