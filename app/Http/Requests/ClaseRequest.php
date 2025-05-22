<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaseRequest extends FormRequest
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
            'dadoGolpe'=> ['required', 'integer', 'min:1'],
            'CompArmaSimple'=> ['nullable', 'boolean'],
            'CompArmaMarcial'=> ['nullable', 'boolean'],
            'CompArmaduraMed'=> ['nullable', 'boolean'],
            'CompArmaduraLig'=> ['nullable', 'boolean'],
            'CompArmaduraPes'=> ['nullable', 'boolean'],
            'CompEscudo'=> ['nullable', 'boolean'],
            'lvlSubClase'=> ['required', 'integer', 'min:0'],
            'descripcion'=> ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.max'=> 'El nombre no puede exceder 30 caracteres',

            'dadoGolpe.required'=> 'El dado de golpe es obligatorio',
            'dadoGolpe.integer'=> 'El dado de golpe debe ser un número entero',
            'dadoGolpe.min'=> 'El dado de golpe debe ser al menos 1',

            'CompArmaSimple.boolean' => 'El campo CompArmaSimple debe ser verdadero o falso',
            'CompArmaMarcial.boolean'=> 'El campo CompArmaMarcial debe ser verdadero o falso',
            'CompArmaduraMed.boolean'=> 'El campo CompArmaduraMed debe ser verdadero o falso',
            'CompArmaduraLig.boolean'=> 'El campo CompArmaduraLig debe ser verdadero o falso',
            'CompArmaduraPes.boolean'=> 'El campo CompArmaduraPes debe ser verdadero o falso',
            'CompEscudo.boolean'=> 'El campo CompEscudo debe ser verdadero o falso',

            'lvlSubClase.required'=> 'El nivel de subclase es obligatorio',
            'lvlSubClase.integer'=> 'El nivel de subclase debe ser un número entero',
            'lvlSubClase.min'=> 'El nivel de subclase no puede ser negativo',

            'descripcion.string'=> 'La descripción debe ser texto',
        ];
    }
}
