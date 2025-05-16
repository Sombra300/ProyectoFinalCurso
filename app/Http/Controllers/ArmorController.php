<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Armor;
use App\Models\Item;

class ArmorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $armors=Armor::all();
        return view('armors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('armors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item=new Item();
        $item->name=$request->input('name');
        $item->descripcion=$request->input('descripcion');
        $item->peso=$request->input('peso');
        $item->precio=$request->input('precio');
        $item->save();
        $armor=new Armor();
        $armor->item_id=$item->id;
        $armor->tipo=$request->input('tipo');
        $armor->desSig=$request->input('desSig');
        $armor->pluesCA=$request->input('pluesCA');
        $armor->desMax=$request->input('desMax');
        $armor->CA=$request->input('CA');
        $armor->save();
        return redirect()->route('itemss.show', $armor->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $armor=Armor::find($id);
        return view('armors.show', compact('armor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $armor=Armor::find($id);
        return view('armors.edit', compact('id'), compact('armor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = $armor->item;

        $item->name = $request->input('name');
        $item->descripcion = $request->input('descripcion');
        $item->peso = $request->input('peso');
        $item->precio = $request->input('precio');
        $item->save();

        $armor->item_id=$item->id;
        $armor->tipo=$request->input('tipo');
        $armor->desSig=$request->input('desSig');
        $armor->pluesCA=$request->input('pluesCA');
        $armor->desMax=$request->input('desMax');
        $armor->CA=$request->input('CA');
        $armor->save();

        return redirect()->route('armors.show', $armor->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         Armor::findOrFail($id)->delete();
       return redirect()->route('items.index');
    }
}
