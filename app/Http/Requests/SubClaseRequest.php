<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubClaseRequest extends FormRequest
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
            'clase_id'=> ['required', 'exists:clases,id'],
            'descripcion'=> ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'=> 'El nombre es obligatorio',
            'nombre.string'=> 'El nombre debe ser texto',
            'nombre.max'=> 'El nombre no puede superar los 30 caracteres',

            'clase_id.required'=> 'Debe seleccionar una clase',
            'clase_id.exists'=> 'La clase seleccionada no es válida',

            'descripcion.string'=> 'La descripción debe ser texto',
        ];
    }
}
