<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RaceRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:30', 'unique:races,nombre'],
            'descripcion'=> ['nullable', 'string'],
            'tamaño' => ['required', 'string', 'in:pequeña,media,grande'],
            'velocidad'  => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'=> 'El nombre de la raza es obligatorio',
            'nombre.max' => 'El nombre de la raza no puede superar los 30 caracteres',
            'nombre.unique' => 'Este nombre de raza ya está registrado',

            'tamaño.required'=> 'El tamaño es obligatorio',
            'tamaño.in'=> 'El tamaño ha sido manipulado a un valor no aceptable',

            'velocidad.required'=> 'La velocidad de movimiento es obligatoria',
            'velocidad.integer' => 'La velocidad de movimiento debe ser un número entero',
            'velocidad.min'=> 'La velocidad de movimiento no puede ser negativa',
        ];
    }
}
