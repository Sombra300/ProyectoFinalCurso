<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SpellRequest;
use App\Http\Requests\LVLRequest;
use App\Models\Spell;
use App\Models\Clase;

class SpellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spells=Spell::all();
        return view('spells.index',compact ('spells'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('spells.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpellRequest $request)
    {
        $spell=new Spell();
        $spell->nombre=$request->input('nombre');
        $spell->descripcion=$request->input('descripcion');
        $spell->coste=$request->input('coste');
        $spell->ataque=$request->input('ataque');
        $spell->daño=$request->input('daño');
        $spell->tipoDaño=$request->input('tipoDaño');
        $spell->nivel=$request->input('nivel');
        $spell->save();
        return redirect()->route('spells.index');
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
        $spell=Spell::find($id);
        return view('spells.edit', compact('spell'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpellRequest $request, string $id)
    {
        $spell = Spell::findOrFail($id);
        $spell->nombre=$request->input('nombre');
        $spell->descripcion=$request->input('descripcion');
        $spell->coste=$request->input('coste');
        $spell->ataque=$request->input('ataque');
        $spell->daño=$request->input('daño');
        $spell->tipoDaño=$request->input('tipoDaño');
        $spell->nivel=$request->input('nivel');
        $spell->save();

        return redirect()->route('spells.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Spell::findOrFail($id)->delete();
       return redirect()->route('spells.index');
    }

    public function indexLink(string $id)
    {
        $spells=Spell::all();
        return view('spells.indexLink',compact ('spells', 'id'));
    }


    public function linkSpells(string $external_id, string $spell_id)
    {

        $clase = Clase::findOrFail($external_id);

        $clase->spells()->toggle($spell_id);

        return redirect()->route('clases.show', compact('clase'));

    }

    public function editLVL($external_id, $spell_id)
    {
        $clase = Clase::findOrFail($external_id);
        $spell=Spell::find($spell_id);
        $currentLvl = $clase->spells()->where('spell_id', $spell_id)->first()->pivot->lvl ?? 1;


        return view('spells.editLVL', compact('external_id', 'spell', 'currentLvl'));
    }

    public function updateLVL (LVLRequest $request)
    {
        $clase = Clase::findOrFail($request->input('external_id'));

        $clase->spells()->updateExistingPivot($request->input('spell_id'), ['lvl' => $request->input('lvl')]);

        return redirect()->route('clases.show', compact('clase'));
    }


}
