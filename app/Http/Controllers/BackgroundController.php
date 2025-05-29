<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BackgroundRequest;
use App\Http\Requests\BackgroundUpdateRequest;
use App\Models\Background;
use App\Models\Lenguage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $backgrounds=Background::with('lenguage')->get();;
        return view('backgrounds.index', compact('backgrounds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lenguages=Lenguage::all();
        return view('backgrounds.create', compact('lenguages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BackgroundRequest $request)
    {
        $background=new Background();
        $background->nombre=$request->input('nombre');
        $background->descripcion=$request->input('descripcion');
        $background->lenguage_id=$request->input('lenguage_id');
        $background->save();
        return redirect()->route('backgrounds.index');
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
        $lenguages=Lenguage::all();
        $background=Background::find($id);
        return view('backgrounds.edit', compact('background', 'lenguages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BackgroundUpdateRequest $request, string $id)
    {
        $background=Background::findOrFail($id);
        $background->nombre=$request->input('nombre');
        $background->descripcion=$request->input('descripcion');
        $background->lenguage_id=$request->input('lenguage_id')?: null;
        $background->save();

        return redirect()->route('backgrounds.index', $background->id);
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
