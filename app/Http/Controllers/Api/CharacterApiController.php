<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $characters=Character::all();
        return response()->json($characters);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $character=Character::find($id);
        return view('characters.show', compact('character'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        $character=Character::find($id);
        return view('characters.edit', compact('id'), compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        $character->nombre=$request->input('nombre');
        $character->race_id=$request->input('race_id');
        $character->FUE=$request->input('FUE');
        $character->DES=$request->input('DES');
        $character->CON=$request->input('CON');
        $character->INT=$request->input('INT');
        $character->SAB=$request->input('SAB');
        $character->CAR=$request->input('CAR');
        $character->lvl=$request->input('lvl');
        $character->CA=$request->input('CA');
        $character->save();

        return redirect()->route('characters.show', $character->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        //
    }
}
