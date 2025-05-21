<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters=Character::all();
        return view('characters.index');
    }

    public function propios(){
        $characters = Character::where('user_id', Auth::id())->get();
        return view('index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $character=new Character();
        $character->nombre=$request->input('nombre');
        $character->user_id=Auth::user()->id;
        $character->race_id=$request->input('race_id');
        $character->FUE=$request->input('FUE');
        $character->DES=$request->input('DES');
        $character->CON=$request->input('CON');
        $character->INT=$request->input('INT');
        $character->SAB=$request->input('SAB');
        $character->CAR=$request->input('CAR');
        $character->lvl=$request->input('lvl');
        $character->CA=$request->input('CA');
        $character->associate(User::findOrFail(Auth::user()->id));
        $character->associate(Race::findOrFail($request->input('race_id')));
        $character->attach(Clase::findOrFail($request->input('clase_id')));
        $character->save();
        return redirect()->route('characters.show', $character->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $character=Character::find($id);
        return view('characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $character=Character::find($id);
        return view('characters.edit', compact('id'), compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
    public function destroy(string $id)
    {
        Character::findOrFail($id)->delete();
       return redirect()->route('characters.index');
    }

    public function equip(Character $character, Request $request)
    {
        $item = Item::findOrFail($request->input('item_id'));

    if ($character->items()->where('item_id', $item->id)->exists()) {
        $character->items()->detach($item->id);
        if(input('cantidad')>0){
            $character->items()->attach($item->id, ['cantidad' => $input('cantidad')]);
        }
        return redirect()->route('characters.edit', $character->id);
    } else {
        $character->items()->attach($item->id, ['cantidad' => $input('cantidad')]);
        return redirect()->route('characters.show', $character->id);
    }

    }

    public function addClase(Character $character, Request $request)
    {
        $clase = Clase::findOrFail($request->input('clase_id'));
    }

    public function addClaseLVL(Character $character, Request $request)
    {
        $clase = Clase::findOrFail($request->input('clase_id'));
        $character->clases()->detach($clase->id);
        $character->clases()->attach($clases->id, ['cantidad' => $input('cantidad')]);
    }

}
