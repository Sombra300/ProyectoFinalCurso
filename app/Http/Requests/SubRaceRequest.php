<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubRaceRequest extends FormRequest
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
            'nombre'=> ['required', 'string', 'max:30'],
            'race_id'=> ['required', 'exists:races,id'],
            'descripcion'=> ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required'=> 'El nombre es obligatorio.',
            'nombre.string'=> 'El nombre debe ser texto.',
            'nombre.max'=> 'El nombre no puede superar los 30 caracteres.',

            'race_id.required'=> 'Debe seleccionar una raza.',
            'race_id.exists'=> 'La raza seleccionada no es válida.',

            'descripcion.string'=> 'La descripción debe ser texto.',
        ];
    }
}
