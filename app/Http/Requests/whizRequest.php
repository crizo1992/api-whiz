<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;

class whizRequest extends FormRequest
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
        return [
            //'cliente' => 'required|array',            
            'nombre' => 'required|string',
            'apellido' => 'required|string',            
            'dni' => 'required|unique:whizs,dni|digits:8',
            //'cliente.ruc' => 'required|unique:clientes,ruc|digits:11',            
            'nacimineto => required|date'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        $msgs = $validator->messages()->all();

        return [
        'message'       => $msgs,
        'status_code'   => 200,
        'status'        => 'warning',
        ];
    }

    public function response(array $errors)
    {
       return new JsonResponse($errors, 422);
    }

    public function messages()
    {
        $message = [
           
            'nombre.required'  => 'El nombre es requerido',
            'nombre.string'  => 'El nombre debe ser texto',

            'apellido.required'  => 'El Apellido es requerido',
            'apellido.string'  => 'El Apellido debe ser texto',

            'dni.required'  => 'El DNI es requerido',
            'dni.unique'  => 'El dni ya existe',
            'dni.digits'     => 'El dni debe tener :digits digitos numericos',            

        ];
        return $message;
    }
}
