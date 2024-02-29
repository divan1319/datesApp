<?php

namespace App\Http\Requests\Establishments;

use Illuminate\Foundation\Http\FormRequest;

class EstablishmentCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','string','min:5','max:50'],
            'user_id'=>['required','int','exists:users,id','unique:establishments,user_id'],
            'telephone' => ['required','regex:/^([6|7]{1})(\d{7})$/'],
            'address'=> ['required','string','min:15']
        ];
    }

    public function messages():array
    {
        return [
            'name.required' => 'El nombre del establecimiento es obligatorio.',
            'name.min' => 'El nombre del establecimiento no cumple con la longitud requerida.',
            'name.max' => 'Has excedido el limite para el nombre del establecimiento.',
            'user_id.required' => 'El id del usuario es necesario para la creación del establecimiento.',
            'user_id.int' => 'El id es inválido',
            'user_id.exists' => 'Usuario no identificado.',
            'user_id.unique'=>'Ya tienes un establecimiento asociado a tu usuario',
            'telephone.required' => 'Número telefonico es obligatorio.',
            'telephone.regex' => 'Número telefónico no es válido, asegurate que tenga el formato correcto.',
            'address.required' => 'La dirección del establecimiento es obligatoria.',
            'address.min' => 'La dirección del establecimiento es muy corta, asegurate de escribir completamente la dirección.'
        ];
    }
}
