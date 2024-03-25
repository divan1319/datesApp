<?php

namespace App\Http\Requests\Establishments;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class CreateEmployeeRequest extends FormRequest
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
            'establishment_id' => ['required','int','exists:establishments,id'],
            'name' => ['required','string','min:10'],
            'photo' => ['required','image','mimes:jpg,jpeg,png'],
            'status' => ['required','string'],
            'nickname'=> [
                'required',
                'min:5',
                'unique:employees,nickname,null,id,establishment_id,' . $this->establishment_id
                ]
        ];
    }

    public function messages()
    {
        return[
            'establishment_id.required'=>'El establecimiento es obligatorio.',
            'establishment_id.exists' => 'No se encontro el establecimiento.',
            'name.required' => 'El nombre es obligatorio.',
            'name.min' => 'Nombre muy corto.',
            'photo.required' => 'Debes de ingresar una foto del empleado',
            'photo.image' => 'Debe de ser una imagen.',
            'photo.mimes' => 'Formato de la imagen no es aceptado.',
            'status.required'=> 'El status es requerido.',
            'nickname.required' => 'El nickname es obligatorio.',
            'nickname.min' => 'El nickname es muy corto.',
            'nickname.unique' => 'Ya tienes registrado este nickname en tu establecimiento.'
        ];
    }
}
