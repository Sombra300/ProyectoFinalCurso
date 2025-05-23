<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeaponRequest;
use App\Models\Weapon;
use App\Models\Item;

class WeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weapons=Weapon::all();
        return view('weapons.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('weapons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeaponRequest $request)
    {
        $item=new Item();
        $item->nombre=$request->input('nombre');
        $item->descripcion=$request->input('descripcion');
        $item->peso=$request->input('peso');
        $item->precio=$request->input('precio');
        $item->save();

        $weapon=new Weapon();
        $weapon->item_id=$item->id;
        $weapon->tipoDaño=$request->input('tipoDaño');
        $weapon->daño=$request->input('daño');
        $weapon->alcanceNormal=$request->input('alcanceNormal');
        $weapon->alcanceExtra=$request->input('alcanceExtra');
        $weapon->tipoArma=$request->input('tipoArma');
        $weapon->propSut=$request->input('propSut');
        $weapon->prop2Manos=$request->input('prop2Manos');
        $weapon->propPesada=$request->input('propPesada');

        $weapon->save();
        $weapon->item()->associate($item);
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $weapon=Weapon::find($id);
        return view('weapons.show', compact('weapon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $weapon=Weapon::find($id);
        return view('weapons.edit', compact('id'), compact('weapon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeaponRequest $request, string $id)
    {
        $item = $weapon->item;

        $item->nombre = $request->input('nombre');
        $item->descripcion = $request->input('descripcion');
        $item->peso = $request->input('peso');
        $item->precio = $request->input('precio');
        $item->save();

        $weapon->tipoDaño = $request->input('tipoDaño');
        $weapon->daño = $request->input('daño');
        $weapon->alcanceNormal = $request->input('alcanceNormal');
        $weapon->alcanceExtra = $request->input('alcanceExtra');
        $weapon->tipoArma = $request->input('tipoArma');
        $weapon->propSut = $request->boolean('propSut');
        $weapon->prop2Manos = $request->boolean('prop2Manos');
        $weapon->propPesada = $request->boolean('propPesada');
        $weapon->save();

        return redirect()->route('items.index', $weapon->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Weapon::findOrFail($id)->delete();
       return redirect()->route('items.index');
    }
}
