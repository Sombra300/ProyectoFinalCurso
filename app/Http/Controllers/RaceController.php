<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $races=Race::all();
        return view('races.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('races.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $race=new Race();
        $race->nombre=$request->input('nombre');
        $race->descripcion=$request->input('descripcion');
        $race->velocidad=$request->input('velocidad');
        $race->save();
        return redirect()->route('races.show', $race->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $race=Race::find($id);
        return view('races.show', compact('race'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $race=Race::find($id);
        return view('races.edit', compact('id'), compact('race'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $race->nombre=$request->input('nombre');
        $race->descripcion=$request->input('descripcion');
        $race->velocidad=$request->input('velocidad');
        $race->save();

        return redirect()->route('races.show', $race->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Race::findOrFail($id)->delete();
       return redirect()->route('races.index');
    }
}
