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
            'lvlSubClase'=> ['required', 'integer', 'min:1', 'max:20'],
            'descripcion'=> ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de la clase es obligatorio',
            'nombre.max'=> 'El nombre de la clase no puede exceder 30 caracteres',

            'dadoGolpe.required'=> 'El dado de golpe de la clase es obligatorio',
            'dadoGolpe.integer'=> 'El dado de golpe de la clase debe ser un número entero',
            'dadoGolpe.min'=> 'El dado de golpe de la clase debe ser al menos 1',

            'CompArmaSimple.boolean' => 'El campo Competencia con Arma Simple debe ser verdadero o falso',
            'CompArmaMarcial.boolean'=> 'El campo Competencia con Arma Marcial debe ser verdadero o falso',
            'CompArmaduraMed.boolean'=> 'El campo Competencia con Armadura Media debe ser verdadero o falso',
            'CompArmaduraLig.boolean'=> 'El campo Competencia con Armadura Ligera debe ser verdadero o falso',
            'CompArmaduraPes.boolean'=> 'El campo Competencia con Armadura Pesada debe ser verdadero o falso',
            'CompEscudo.boolean'=> 'El campo CompEscudo debe ser verdadero o falso',

            'lvlSubClase.required'=> 'El nivel en el que la clase consigue la subclase es obligatorio',
            'lvlSubClase.integer'=> 'El nivel en el que la clase consigue la subclase debe ser un número entero',
            'lvlSubClase.min'=> 'El nivel en el que la clase consigue la subclase no puede ser menor a 1',
            'lvlSubClase.max'=> 'El nivel en el que la clase consigue la subclase no puede ser mallor a 20',

        ];
    }
}
