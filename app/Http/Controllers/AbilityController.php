<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AbilityRequest;
use App\Http\Requests\LVLRequest;
use App\Models\Ability;
use App\Models\Race;
use App\Models\SubRace;
use App\Models\Clase;
use App\Models\SubClase;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abilities=Ability::all();
        return view('abilities.index',compact ('abilities'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('abilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AbilityRequest $request)
    {
        $ability=new Ability();
        $ability->nombre=$request->input('nombre');
        $ability->descripcion=$request->input('descripcion');
        $ability->coste=$request->input('coste');
        $ability->reuseTime=$request->input('reuseTime');
        $ability->save();
        return redirect()->route('abilities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ability=Ability::find($id);
        return view('abilities.edit', compact('ability'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AbilityRequest $request, string $id)
    {
        $ability=Ability::find($id);
        $ability->nombre=$request->input('nombre');
        $ability->descripcion=$request->input('descripcion');
        $ability->coste=$request->input('coste');
        $ability->reuseTime=$request->input('reuseTime');
        $ability->save();
        return redirect()->route('abilities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Ability::findOrFail($id)->delete();
       return redirect()->route('abilities.index');
    }

    public function indexLink(string $id, string $type)
    {
        $abilities=Ability::all();
        return view('abilities.indexLink',compact ('abilities', 'id', 'type'));
    }


    public function linkAbilities(string $type, string $external_id, string $ability_id)
    {
        $modelMap = [
            'race' => \App\Models\Race::class,
            'subrace' => \App\Models\SubRace::class,
            'clase' => \App\Models\Clase::class,
            'subclase' => \App\Models\SubClase::class,
        ];

        if (!array_key_exists($type, $modelMap)) {
            abort(404, "Tipo inválido");
        }

        $modelClass = $modelMap[$type];

        $entity = $modelClass::findOrFail($external_id);

        $entity->abilities()->toggle($ability_id);

        if($type=='race'){
            $race=Race::find($external_id);
            return redirect()->route('races.show', compact('race'));
        }
        if($type=='subrace'){
            $subRace=SubRace::find($external_id);
            $race=Race::find($subRace->race_id);
            return redirect()->route('races.show', compact('race'));
        }
        if($type=='clase'){
            $clase=Clase::find($external_id);
            return redirect()->route('clases.show', compact('clase'));
        }
        if($type=='subclase'){
            $subClase=SubClase::find($external_id);
            $clase=Clase::find($subClase->clase_id);
            return redirect()->route('clases.show', compact('clase'));
        }
    }

    public function editLVL($external_id, $ability_id, $type)
    {
        $modelMap = [
            'clase' => \App\Models\Clase::class,
            'subclase' => \App\Models\SubClase::class,
        ];

        if (!array_key_exists($type, $modelMap)) {
            abort(404, "Tipo inválido");
        }

        $modelClass = $modelMap[$type];


        $entity = $modelClass::findOrFail($external_id);
        $ability=Ability::find($ability_id);
        $currentLvl = $entity->abilities()->where('ability_id', $ability_id)->first()->pivot->lvl ?? 1;


        return view('abilities.editLVL', compact('type', 'external_id', 'ability', 'currentLvl'));
    }

    public function updateLVL (LVLRequest $request)
    {
        $modelMap = [
            'clase' => \App\Models\Clase::class,
            'subclase' => \App\Models\SubClase::class,
        ];

        $type = $request->input('type');

        if (!array_key_exists($type, $modelMap)) {
            abort(404, "Tipo inválido");
        }

        $modelClass = $modelMap[$type];
        $entity = $modelClass::findOrFail($request->input('external_id'));

        $entity->abilities()->updateExistingPivot($request->input('ability_id'), ['lvl' => $request->input('lvl')]);

        if($type=='clase'){
            $clase=Clase::find($request->input('external_id'));
            return redirect()->route('clases.show', compact('clase'));
        }
        if($type=='subclase'){
            $subClase=SubClase::find($request->input('external_id'));
            $clase=Clase::find($subClase->clase_id);
            return redirect()->route('clases.show', compact('clase'));
        }
    }

}
