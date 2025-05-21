<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Background;

class BackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $backgrounds=Background::all();
        return view('backgrounds.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lenguages=Lenguage::all();
        return view('backgrounds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $background=new Background();
        $background->nombre=$request->input('nombre');
        $background->descripcion=$request->input('descripcion');
        $background->CompArmaSimple=$request->input('CompArmaSimple');
        $background->CompArmaMarcial=$request->input('CompArmaMarcial');
        $background->CompArmaduraSimp=$request->input('CompArmaduraSimp');
        $background->CompArmaduraLig=$request->input('CompArmaduraLig');
        $background->CompArmaduraPes=$request->input('CompArmaduraPes');
        $background->CompEscudo=$request->input('CompEscudo');
        $background->lenguage_id=$request->input('lenguage_id');
        $background->associate(Lenguage::findOrFail($request->input('lenguage_id')));
        $background->save();
        return redirect()->route('backgrounds.show', $background->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $background=Background::find($id);
        return view('backgrounds.show', compact('background'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $background=Background::find($id);
        return view('backgrounds.edit', compact('id'), compact('background'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $background->nombre=$request->input('nombre');
        $background->descripcion=$request->input('descripcion');
        $background->CompArmaSimple=$request->input('CompArmaSimple');
        $background->CompArmaMarcial=$request->input('CompArmaMarcial');
        $background->CompArmaduraSimp=$request->input('CompArmaduraSimp');
        $background->CompArmaduraLig=$request->input('CompArmaduraLig');
        $background->CompArmaduraPes=$request->input('CompArmaduraPes');
        $background->CompEscudo=$request->input('CompEscudo');
        $background->save();

        return redirect()->route('backgrounds.show', $background->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Background::findOrFail($id)->delete();
       return redirect()->route('backgrounds.index');
    }
}
