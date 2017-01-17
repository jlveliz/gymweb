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
                    'client_id' => 'required|exists:client,id|exist_book_active',
                    'period_from' => 'date|required',
                    'period_to' => 'required|date',
                    'book_state_phisical' => 'required|int',
                    'book_state_economic' => 'required|int',
                    'value'=>'numeric'
                ];
            }
            case 'PUT':
            {
                return [
                    'book_state_phisical' => 'required|int'
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
                    'client_id.required' => 'El cliente es requerido',
                    'client_id.exists' => 'Ingrese un cliente existente',
                    'client_id.exist_book_active' => 'Ya existe una cartilla vigente, no es posible crear otra.',
                    'period_from.date' => 'Ingrese una fecha válida',
                    'period_from.required' => 'El periodo desde es requerido',
                    'period_to.date' => ' Ingrese una fecha válida',
                    'period_to.required' => 'El periodo de duración de la cartilla es requerido',
                    'book_state_phisical.required' => 'Estado de la cartilla es requerido',
                    'book_state_phisical.int' => 'Esta ingresando un estado fisico de cartilla inválido',
                    'book_state_economic.required' => 'Estado economico de la cartilla es requerido',
                    'book_state_phisical.int' => 'Esta ingresando un estado economico de cartilla inválido',
                    'value.numeric'=>'Es un valor inválido'
                ];
            }
            case 'PUT':
                    return [
                        'book_state_phisical.required' => 'Estado de la cartilla es requerido',
                        'book_state_phisical.int' => 'Esta ingresando un estado fisico de cartilla inválido',
                    ];
            default:
                # code...
                break;
        }
    }
}
