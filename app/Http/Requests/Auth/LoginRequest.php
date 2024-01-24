<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username'=> ['required','exists:users,username'],
            'password'=> 'required'
        ];
    }

    public function messages():array
    {
        return [
            'username.required'=>'El nombre de usuario es obligatorio',
            'username.exists' => 'Usuario no encontrado o no existe',
            'password'=>'La contraseña es obligatorio'
        ];
    }
}
