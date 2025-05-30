<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LVLclaseRequest extends FormRequest
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
            'lvl'=>['required', 'integer', 'max:20']
        ];
    }

    public function messages()
    {
        return [
            'lvl.required'=> 'El nivel es obligatorio',
            'lvl.integer'=> 'El nivel debe ser un número entero',
            'lvl.max'=> 'El nivel no puede ser superior a 20',
        ];
    }
}
