<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleCreateRequest extends FormRequest
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
            'freelancer_id'=>['nullable','integer','exists:freelancers,id'],
            'establishment_id' => ['nullable','integer','exists:establishments,id'],
            'days' => ['required','string'],
            'start_hour'=>['required'],
            'end_hour'=>['required'],
            'type'=>['required']
        ];
    }

    public function messages()
    {
        return [
            'freelancer_id.integer' => 'Id no valido',
            'freelancer_id.exists' => 'Freelancer no encontrado',
            'establishment_id.integer' => 'Id no valido',
            'establishment_id.exists' => 'Freelancer no encontrado',
            'days.required' => 'Debes de ingresar los dias a tu horario',
            'start_hour'=> 'Debes de ingresar una hora inicial',
            'end_hour' => 'Debes de ingresar una hora final',
            'type.required' => 'El tipo es obligatorio'
        ];
    }
}
