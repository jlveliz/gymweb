<?php

namespace GymWeb\Http\Requests;

use GymWeb\Http\Requests\Request;

class BookRequest extends Request
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
                    'client_id' => 'required|exists:user,id',
                    'period_from' => 'date|required',
                    'period_to' => 'required|date',
                    'book_state_phisical' => 'required|digits:1',
                    'book_state_economic' => 'required|digits:1',
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
                    'client_id.required' => 'El cliente es requerido',
                    'client_id.exists' => 'Ingrese un cliente existente',
                    'period_from.date' => 'Ingrese una fecha válida',
                    'period_from.required' => 'El periodo desde es requerido',
                    'period_to.date' => ' Ingrese una fecha válida',
                    'period_to.required' => 'El periodo de duración de la cartilla es requerido',
                    'book_state_phisical.required' => 'Estado de la cartilla es requerido',
                    'book_state_economic.required' => 'Estado economico de la cartilla es requerido',
                ];
            }
            case 'PUT':                
            default:
                # code...
                break;
        }
    }
}
