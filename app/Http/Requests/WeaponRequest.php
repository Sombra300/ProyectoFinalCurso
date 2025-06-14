<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeaponRequest extends FormRequest
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
            'peso'=> ['required', 'numeric', 'min:0'],
            'precio'=> ['required', 'integer', 'min:0'],
            'tipoDaño' => ['required', 'string', 'in:contundente,perforante,cortante'],
            'daño' => ['required', 'integer', 'min:0'],
            'alcanceNormal' => ['required', 'integer', 'min:0'],
            'alcanceExtra'  => ['required', 'integer', 'min:0'],
            'tipoArma'=> ['required', 'string', 'in:simple,marcial'],
            'propSut'  => ['nullable', 'boolean'],
            'prop2Manos'=> ['nullable', 'boolean'],
            'propPesada' => ['nullable', 'boolean'],
        ];
    }

    public function messages()
    {
        return [

            'tipoDaño.required'=> 'El tipo de daño es obligatorio',
            'tipoDaño.in'=> 'El valor del campo Tipo de Daño seleccionado ha sido manipulado a uno no aceptable, por favor intentelo de nuevo mas tarde',

            'daño.required'=> 'El daño es obligatorio',
            'daño.integer' => 'El daño debe ser un número entero',
            'daño.min'=> 'El daño no puede ser negativo',

            'alcanceNormal.required'=> 'El alcance normal es obligatorio',
            'alcanceNormal.integer'=> 'El alcance normal debe ser un número entero',
            'alcanceNormal.min'=> 'El alcance normal no puede ser negativo',

            'alcanceExtra.required' => 'El alcance extra es obligatorio',
            'alcanceExtra.integer'=> 'El alcance extra debe ser un número entero',
            'alcanceExtra.min' => 'El alcance extra no puede ser negativo',

            'tipoArma.required'=> 'El tipo de arma es obligatorio',
            'tipoArma.in'=> 'El valor del campo Tipo de Arma seleccionado ha sido manipulado a uno no aceptable, por favor intentelo de nuevo mas tarde',

            'propSut.boolean'=> 'El campo propSut debe ser verdadero o falso',
            'prop2Manos.boolean'=> 'El campo prop2Manos debe ser verdadero o falso',
            'propPesada.boolean'=> 'El campo propPesada debe ser verdadero o falso',
        ];
    }
}
