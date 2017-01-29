<?php

namespace GymWeb\Http\Requests;

use GymWeb\Http\Requests\Request;

class MembershipRequest extends Request
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
                    'client_id' => 'required|exists:client,id|exist_membership_active',
                    'membership_type_id' => 'required|exists:membership_type,id',
                    'period_from' => 'date|required',
                    'period_to' => 'required|date',
                    'max_days' => 'required|int',
                    'price' => 'required|numeric',
                    'membership_state_phisical' => 'required|int',
                    'membership_state_economic' => 'required|int',
                    'payment_value'=>'numeric'
                ];
            }
            case 'PUT':
            {
                return [
                    'membership_state_phisical' => 'required|int'
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
                    'membership_type_id.required' => 'El tipo de membresia es requerida|exists:membership_type,id',
                    'membership_type_id.exists' => 'No existe el tipo de membresia',
                    'client_id.exist_membership_active' => 'Ya existe una membresia vigente, no es posible crear otra.',
                    'period_from.date' => 'Ingrese una fecha válida',
                    'period_from.required' => 'El periodo desde es requerido',
                    'period_to.date' => ' Ingrese una fecha válida',
                    'period_to.required' => 'El periodo de duración de la membresia es requerido',
                    'max_days.required' => 'El número de días de asistencia es requerida',
                    'max_days.int' => 'El número de días de asistencia es inválida',
                    'membership_state_phisical.required' => 'Estado de la membresia es requerido',
                    'membership_state_phisical.int' => 'Esta ingresando un estado fisico de membresia inválido',
                    'membership_state_economic.required' => 'Estado economico de la membresia es requerido',
                    'membership_state_phisical.int' => 'Esta ingresando un estado economico de membresia inválido',
                    'payment_value.numeric'=>'El valor a pagar es inválido'
                ];
            }
            case 'PUT':
                    return [
                        'membership_state_phisical.required' => 'Estado de la membresia es requerido',
                        'membership_state_phisical.int' => 'Esta ingresando un estado fisico de membresia inválida',
                    ];
            default:
                # code...
                break;
        }
    }
}
