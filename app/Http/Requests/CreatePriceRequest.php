<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePriceRequest extends FormRequest
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
            'establishment_id' => ['nullable','integer','exists:establishments,id'],
            'freelancer_id'=>['nullable','integer','exists:freelancers,id'],
            'price'=>['required','decimal:2'],
            'time' => ['required'],
            'type' => ['required','string']
        ];
    }

    public function messages():array
    {
        return[
            'establishment_id.exists' => 'Empleado no encontrado',
            'freelancer_id.exists' => 'Freelancer no encontrado',
            'price.required' => 'El precio es obligatorio.',
            'price.decimal' => 'Solo se aceptan dos decimales.',
            'time.required' => 'El tiempo es obligatorio.',
            'type.required' => 'Debes de enviar el tipo de usuario.'
        ];
    }
}
