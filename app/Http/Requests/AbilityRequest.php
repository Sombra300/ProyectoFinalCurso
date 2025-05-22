<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbilityRequest extends FormRequest
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
            'nombre'=>['required', 'string'],
            'coste'=>['required', 'string'],
            'reuseTime'=>['required', 'string'],
            'descripcion'=>['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'=>'El nombre no puede estar vacio',
            'coste.required'=>'El coste de la habilidad no puede estar vacio',
            'reuseTime.required'=>'Tienes que indicar cada cuanto se puede usar la habilidad, si es una habilidad pasiba puedes simplemente escribir la condicion o poner siempre',
            'descripcion.required'=>'Tienes que indicar que hace la habilidad',
        ];
    }
}
