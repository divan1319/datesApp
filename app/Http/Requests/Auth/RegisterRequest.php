<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'min:10', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                PasswordRules::min(10)->letters()->symbols()->numbers()
            ],
            'username'=>['required','min:8','string','unique:users,username'],
            'dui'=> ['required','min:9','unique:users,dui'],
            'telephone'=> ['required','min:8','phone','country:SV']
        ];
    }

    public function messages():array
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe de tener al menos 10 caracteres',
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'El formato de correo no es valido',
            'email.unique' => 'Este correo ya esta registrado, inicia sesion',
            'password' => 'El password es obligatorio y debe contener al menos 10 caracteres entre ellos; un simbolo y un numero.',
            'password.confirmed' => 'Las contrasenas no coinciden',
            'username.required'=>'El username es obligatorio',
            'username.min'=>'El username tiene un minimo de 8 caracteres',
            'username.unique'=>'Este username ya esta registrado',
            'dui.required' => 'El DUI es requerido',
            'dui.unique'=>'El DUI ya se encuentra registrado',
            'dui.min' => 'El DUI no cumple con la longitud correcta',
            'telephone.required'=>'El número de teléfono es requerido',
            'telephone.phone' => 'El número de teléfono no es valido'
        ];
    }
}
