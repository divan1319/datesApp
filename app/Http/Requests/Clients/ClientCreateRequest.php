<?php

namespace App\Http\Requests\Clients;

use Illuminate\Foundation\Http\FormRequest;

class ClientCreateRequest extends FormRequest
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
            'user_id'=>['required','int','exists:users,id','unique:clients,user_id'],
            'photo'=>'required'
        ];
    }

    public function messages():array
    {
        return [
            'user_id'=>'Id de usuario requerido',
            'user_id.int'=>'El id no es un tipo valido',
            'user_id.exists'=>'Usuario no identificado',
            'user_id.unique'=>'Cliente ya se encuentra registrado',
            'photo'=>'Imagen requerida'
        ];
    }
}
