<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'=> 'El nombre es obligatorio',
            'nombre.max'=> 'El nombre no puede superar los 30 caracteres',

            'peso.required' => 'El peso es obligatorio',
            'peso.numeric'=> 'El peso debe ser un número válido',
            'peso.min'=> 'El peso no puede ser negativo',

            'precio.required'=> 'El precio es obligatorio',
            'precio.integer'=> 'El precio debe ser un número entero',
            'precio.min'=> 'El precio no puede ser negativo',
        ];
    }
}
