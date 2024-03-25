<?php

namespace App\Http\Requests\Freelancer;

use Illuminate\Foundation\Http\FormRequest;

class CreateFreelancerRequest extends FormRequest
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
            'user_id'=> ['required','int','exists:users,id'],
            'description' => ['required','string','min:15'],
            'services'=>['required'],
            'places'=>['required'],
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'El usuario es obligatorio.',
            'user_id.exists' => 'El usuario no ha sido identificado.',
            'services.required' => 'Los servicios son requeridos',
            'places.required' => 'Los lugares son requeridos.'
        ];
    }
}
