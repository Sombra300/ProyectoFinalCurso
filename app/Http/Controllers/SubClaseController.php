<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubClase;

class SubClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subClases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $subClase=new SubCace();
        $subClase->name=$request->input('name');
        $subClase->clase_id=$id;
        $subClase->descripcion=$request->input('descripcion');
        $subClase->save();
        return redirect()->route('clases.show', $subClase->clase_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subClase=SubClase::find($id);
        return view('subClases.edit', compact('id'), compact('subClase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subClase->name=$request->input('name');
        $subClase->descripcion=$request->input('descripcion');
        $subClase->save();
        return redirect()->route('clases.show', $subClase->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       SubClase::findOrFail($id)->delete();
       return redirect()->route('clases.index');
    }
}
