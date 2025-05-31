<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubClaseRequest;

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
    public function create(string $id)
    {
        return view('subClases.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubClaseRequest $request)
    {
        $subClase=new SubClase();
        $subClase->nombre=$request->input('nombre');
        $subClase->clase_id=$request->input('clase_id');
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
        $subclase=SubClase::find($id);
        return view('subClases.edit', compact('subclase', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubClaseRequest $request, string $id)
    {
        $subClase=SubClase::find($id);
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
