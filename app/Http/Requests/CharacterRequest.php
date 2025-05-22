<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'max:30'],
            'user_id' => ['required', 'exists:users,id'],
            'race_id' => ['required', 'exists:races,id'],

            'vida' => ['required', 'integer', 'min:0'],
            'vidaMax' => ['required', 'integer', 'min:0'],
            'vidaTemp' => ['nullable', 'integer', 'min:0'],

            'FUE' => ['required', 'integer'],
            'DES' => ['required', 'integer'],
            'CON' => ['required', 'integer'],
            'INT' => ['required', 'integer'],
            'SAB' => ['required', 'integer'],
            'CAR' => ['required', 'integer'],
            'ModFUE' => ['required', 'integer'],
            'ModDES' => ['required', 'integer'],
            'ModCON' => ['required', 'integer'],
            'ModINT' => ['required', 'integer'],
            'ModSAB' => ['required', 'integer'],
            'ModCAR' => ['required', 'integer'],

            'CA' => ['required', 'integer', 'min:0'],

            'CompSalvFUE' => ['nullable', 'boolean'],
            'CompSalvDES' => ['nullable', 'boolean'],
            'CompSalvINT' => ['nullable', 'boolean'],
            'CompSalvSAB' => ['nullable', 'boolean'],
            'CompSalvCAR' => ['nullable', 'boolean'],
            'CompAcrobacias' => ['nullable', 'boolean'],
            'CompAtletismo' => ['nullable', 'boolean'],
            'CompConocimArcano' => ['nullable', 'boolean'],
            'CompEngaño' => ['nullable', 'boolean'],
            'CompHistoria' => ['nullable', 'boolean'],
            'CompInterpretacion' => ['nullable', 'boolean'],
            'CompIntimidacion' => ['nullable', 'boolean'],
            'CompInvestigacion' => ['nullable', 'boolean'],
            'CompJuegoManos' => ['nullable', 'boolean'],
            'CompMedicina' => ['nullable', 'boolean'],
            'CompNaturaleza' => ['nullable', 'boolean'],
            'CompPercepcion' => ['nullable', 'boolean'],
            'CompPerspicacia' => ['nullable', 'boolean'],
            'CompPersuasion' => ['nullable', 'boolean'],
            'CompReligion' => ['nullable', 'boolean'],
            'CompSigilo' => ['nullable', 'boolean'],
            'CompSupervivencia' => ['nullable', 'boolean'],
            'CompTratoAnimales' => ['nullable', 'boolean'],

            'SalvFUE' => ['required', 'integer'],
            'SalvDES' => ['required', 'integer'],
            'SalvINT' => ['required', 'integer'],
            'SalvSAB' => ['required', 'integer'],
            'SalvCAR' => ['required', 'integer'],

            'Acrobacias' => ['required', 'integer'],
            'Atletismo' => ['required', 'integer'],
            'ConocimArcano' => ['required', 'integer'],
            'Engaño' => ['required', 'integer'],
            'Historia' => ['required', 'integer'],
            'Interpretacion' => ['required', 'integer'],
            'Intimidacion' => ['required', 'integer'],
            'Investigacion' => ['required', 'integer'],
            'JuegoManos' => ['required', 'integer'],
            'Medicina' => ['required', 'integer'],
            'Naturaleza' => ['required', 'integer'],
            'Percepcion' => ['required', 'integer'],
            'Perspicacia' => ['required', 'integer'],
            'Persuasion' => ['required', 'integer'],
            'Religion' => ['required', 'integer'],
            'Sigilo' => ['required', 'integer'],
            'Supervivencia' => ['required', 'integer'],
            'TratoAnimales' => ['required', 'integer'],

            'historiaPersonaje' => ['nullable', 'string'],
            'rasgosPersonaje' => ['nullable', 'string'],
            'idealesPersonaje' => ['nullable', 'string'],
            'vinculosPersonaje' => ['nullable', 'string'],
            'defectosPersonaje' => ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'=> 'El nombre del personaje es obligatorio',
            'nombre.max'=> 'El nombre no puede superar los 30 caracteres',

            'race_id.exists'=> 'La raza seleccionada no es válida',

            'vida.min'=> 'La vida no puede ser negativa',
            'vidaMax.min'=> 'La vida máxima no puede ser negativa',
            'vidaTemp.min'=> 'La vida temporal no puede ser negativa',

            'CA.min'=> 'La Clase de Armadura no puede ser negativa',

            '*.integer'=> 'Este campo debe ser un número entero',
            '*.boolean'=> 'Este campo debe ser verdadero o falso',
        ];
    }

}
