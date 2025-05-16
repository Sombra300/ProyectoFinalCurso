<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spell;

class SpellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spells=Spell::all();
        return view('spells.index');
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
    public function store(Request $request)
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
        return redirect()->route('spells.show', $spell->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $spell=Spell::find($id);
        return view('spells.show', compact('spell'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $spell=Spell::find($id);
        return view('spells.edit', compact('id'), compact('spell'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $spell->nombre=$request->input('nombre');
        $spell->descripcion=$request->input('descripcion');
        $spell->coste=$request->input('coste');
        $spell->ataque=$request->input('ataque');
        $spell->daño=$request->input('daño');
        $spell->tipoDaño=$request->input('tipoDaño');
        $spell->nivel=$request->input('nivel');
        $spell->save();

        return redirect()->route('spells.show', $spell->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Spell::findOrFail($id)->delete();
       return redirect()->route('spells.index');
    }
}
