<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArmorRequest extends FormRequest
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
            'item_id'       => ['required', 'exists:items,id'],
            'TipoArmor' => ['required', 'string', 'in:Ligera,Media,Pesada,Escudo'],
            'desSig'    => ['required', 'boolean'],
            'DESMax'    => ['required', 'integer', 'min:0'],
            'CA'        => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
        'item_id.required'=> 'El ID del ítem es obligatorio',
        'item_id.exists' => 'El ítem seleccionado no es válido',
        
        'TipoArmor.required'=> 'El campo TipoArmor es obligatorio',
        'TipoArmor.in'=> 'El valor seleccionado ha sido manipulado a uno no aceptable, por favor intentelo de nuevo mas tarde',

        'desSig.required'=> 'El campo desSig es obligatorio',
        'desSig.boolean'=> 'El campo desSig debe ser verdadero o falso',

        'DESMax.required'=> 'Has de indicar cuanta Clase Armadura se añade como maximo por el Modificador de Destreza con esta armadura',
        'DESMax.integer'=> 'La Clase Armadura extra por el  Modificador de Destreza tiene que ser un numero entero',
        'DESMax.min'=> 'La Clase Armadura extra por el  Modificador de Destreza no puede ser inferior a 0',

        'CA.required'=> 'Has de indicar la clase armadura o el bono a la CA en caso de escudo',
        'CA.integer'=> 'La Clase Armadura tiene que ser un numero entero',
        'CA.min'=> 'El campo Clase Armadura no puede ser inferior a 0',
    ];
    }
}
