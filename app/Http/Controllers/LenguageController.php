<?php

namespace App\Http\Controllers;

use App\Http\Requests\LenguageRequest;
use Illuminate\Http\Request;
use App\Models\Lenguage;

class LenguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lenguages=Lenguage::all();
        return view('lenguages.index', compact('lenguages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lenguages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LenguageRequest $request)
    {
        $lenguage=new Lenguage();
        $lenguage->nombre=$request->input('nombre');
        $lenguage->save();
        return redirect()->route('lenguages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lenguage=Lenguage::find($id);
        return view('lenguages.show', compact('lenguage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lenguage=Lenguage::find($id);
        return view('lenguages.edit', compact('lenguage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LenguageRequest $request, string $id)
    {
        $lenguage=Lenguage::find($id);
        $lenguage->nombre=$request->input('nombre');
        $lenguage->save();

        return redirect()->route('lenguages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lenguage::findOrFail($id)->delete();
       return redirect()->route('lenguages.index');
    }
}
