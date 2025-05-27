<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClaseRequest;
use App\Models\Clase;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clases=Clase::all();
        return view('clases.index',compact ('clases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClaseRequest $request)
    {
        $clase=new Clase();
        $clase->nombre=$request->input('nombre');
        $clase->descripcion=$request->input('descripcion');
        $clase->CompArmaSimple=$request->input('CompArmaSimple');
        $clase->CompArmaMarcial=$request->input('CompArmaMarcial');
        $clase->CompArmaduraLig=$request->input('CompArmaduraLig');
        $clase->CompArmaduraMed=$request->input('CompArmaduraMed');
        $clase->CompArmaduraPes=$request->input('CompArmaduraPes');
        $clase->CompEscudo=$request->input('CompEscudo');
        $clase->dadoGolpe=$request->input('dadoGolpe');
        $clase->lvlSubClase=$request->input('lvlSubClase');
        $clase->save();
        return redirect()->route('clases.show', $clase->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $clase=Clase::find($id);
        return view('clases.show', compact('clase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clase=Clase::find($id);
        return view('clases.edit', compact('id'), compact('clase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClaseRequest $request, string $id)
    {
        $clase->nombre=$request->input('nombre');
        $clase->descripcion=$request->input('descripcion');
        $clase->CompArmaSimple=$request->input('CompArmaSimple');
        $clase->CompArmaMarcial=$request->input('CompArmaMarcial');
        $clase->CompArmaduraMed=$request->input('CompArmaduraMed');
        $clase->CompArmaduraLig=$request->input('CompArmaduraLig');
        $clase->CompArmaduraPes=$request->input('CompArmaduraPes');
        $clase->CompEscudo=$request->input('CompEscudo');
        $clase->dadoGolpe=$request->input('dadoGolpe');
        $clase->lvlSubClase=$request->input('lvlSubClase');
        $clase->save();

        return redirect()->route('clases.show', $clase->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Clase::findOrFail($id)->delete();
       return redirect()->route('clases.index');
    }
}
