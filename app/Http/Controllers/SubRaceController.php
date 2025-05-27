<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubRaceRequest;
use App\Models\Race;
use App\Models\SubRace;

class SubRaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        return view('subRaces.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubRaceRequest $request)
    {
        $subRace=new SubRace();
        $subRace->nombre=$request->input('nombre');
        $subRace->race_id=$request->input('race_id');
        $subRace->descripcion=$request->input('descripcion');
        $subRace->save();
        return redirect()->route('races.show', $subRace->race_id);
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
        $subRace=SubRace::find($id);
        return view('subRaces.edit', compact('subRace'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubRaceRequest $request, SubRace $subRace)
    {
        $subRace->nombre=$request->input('nombre');
        $subRace->descripcion=$request->input('descripcion');
        $subRace->save();
        return redirect()->route('races.show', $subRace->race_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubRace::findOrFail($id)->delete();
        return redirect()->route('races.index');
    }
}
