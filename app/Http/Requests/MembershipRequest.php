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
                    'period_to' => 'date',
                    'expiry_mode' => 'required|string|in:period_to,day_job',
                    'max_day_job' => 'int',
                    'price' => 'required|numeric',
                    'membership_state_phisical' => 'required|int',
                    'membership_state_economic' => 'required|int',
                    'payment_value'=>'numeric|max:"'.$this->get('price').'"'
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
                    'membership_type_id.required' => 'El tipo de membresia es requerida',
                    'membership_type_id.exists' => 'No existe el tipo de membresia',
                    'client_id.exist_membership_active' => 'Ya existe una membresia vigente, no es posible crear otra.',
                    'period_from.date' => 'Ingrese una fecha válida',
                    'period_from.required' => 'El periodo desde es requerido',
                    'period_to.date' => ' Ingrese una fecha válida',
                    'expiry_mode.required' => 'La forma de expiración es requerida',
                    'expiry_mode.string' => 'La forma de expiración es inválida',
                    'expiry_mode.in' => 'La forma de expiración es inválida',
                    'max_day_job.required' => 'El número de días es requerido',
                    'price.required' => 'El precio de la membresia es requerida',
                    'price.numeric' => 'El precio de la membresia es inválido',
                    'membership_state_phisical.required' => 'Estado de la membresia es requerido',
                    'membership_state_phisical.int' => 'Esta ingresando un estado fisico de membresia inválido',
                    'membership_state_economic.required' => 'Estado economico de la membresia es requerido',
                    'membership_state_phisical.int' => 'Esta ingresando un estado economico de membresia inválido',
                    'payment_value.numeric'=>'El valor a pagar es inválido',
                    'payment_value.max'=>'El valor a pagar no debe acceder el precio de la membresia'
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
