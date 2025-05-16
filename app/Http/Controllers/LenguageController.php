<?php

namespace App\Http\Controllers;

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
        return view('lenguages.index');
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
    public function store(Request $request)
    {
        $lenguage=new Lenguage();
        $lenguage->nombre=$request->input('nombre');
        $lenguage->save();
        return redirect()->route('lenguages.show', $lenguage->id);
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lenguage->nombre=$request->input('nombre');
        $lenguage->save();

        return redirect()->route('lenguages.show', $lenguage->id);
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
