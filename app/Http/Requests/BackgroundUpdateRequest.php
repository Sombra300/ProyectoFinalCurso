<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BackgroundUpdateRequest extends FormRequest
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
        'nombre'            => ['required', 'string', 'max:30'],
        'descripcion'       => ['nullable', 'string'],
        'CompArmaSimple'    => ['nullable', 'boolean'],
        'CompArmaMarcial'   => ['nullable', 'boolean'],
        'CompArmaduraMed'   => ['nullable', 'boolean'],
        'CompArmaduraLig'   => ['nullable', 'boolean'],
        'CompArmaduraPes'   => ['nullable', 'boolean'],
        'CompEscudo'        => ['nullable', 'boolean'],
    ];
    }

    public function messages()
    {
        return [
            'nombre.required'  => 'El campo nombre es obligatorio.',
            'nombre.max'       => 'El campo nombre no puede tener más de 30 caracteres.',

            'CompArmaSimple.boolean'   => 'Por favor no manipule los campos',
            'CompArmaMarcial.boolean'  => 'Por favor no manipule los campos',
            'CompArmaduraMed.boolean'  => 'Por favor no manipule los campos',
            'CompArmaduraLig.boolean'  => 'Por favor no manipule los campos',
            'CompArmaduraPes.boolean'  => 'Por favor no manipule los campos',
            'CompEscudo.boolean'       => 'Por favor no manipule los campos',
        ];
    }
}
