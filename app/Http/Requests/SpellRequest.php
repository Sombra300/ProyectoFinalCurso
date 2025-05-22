<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpellRequest extends FormRequest
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
        'descripcion'=> ['nullable', 'string'],
        'coste' => ['nullable', 'string'],
        'ataque'=> ['nullable', 'boolean'],
        'daño'=> ['required', 'integer', 'min:0'],
        'tipoDaño'=> ['nullable', 'string'],
        'nivel'=> ['required', 'integer', 'min:0'],
    ];
    }

    public function messages()
    {
        return [
            'nombre.required'=> 'El nombre es obligatorio',
            'nombre.string' => 'El nombre debe ser texto',
            'nombre.max' => 'El nombre no puede superar los 30 caracteres',

            'descripcion.string' => 'La descripción debe ser texto',
            'coste.string'=> 'El coste debe ser texto',

            'ataque.boolean'=> 'El campo ataque debe ser verdadero o falso',

            'daño.required'=> 'El daño es obligatorio',
            'daño.integer'=> 'El daño debe ser un número entero',
            'daño.min'=> 'El daño no puede ser negativo',

            'tipoDaño.string'=> 'El tipo de daño debe ser texto',

            'nivel.required'=> 'El nivel es obligatorio',
            'nivel.integer'=> 'El nivel debe ser un número entero',
            'nivel.min'=> 'El nivel no puede ser negativo',
        ];
    }
}
