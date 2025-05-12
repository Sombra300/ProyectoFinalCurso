<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abilities=Ability::all();
        return view('abilities.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('abilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ability=new Ability();
        $ability->name=$request->input('name');
        $ability->description=$request->input('description');
        $ability->date=$request->input('date');
        $ability->hour=$request->input('hour');
        $ability->type=$request->input('type');
        $ability->tags=$request->input('tags');
        $ability->visible=$request->input('visible');
        $ability->save();
        return redirect()->route('abilities.show', $ability->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ability=ability::find($id);
        return view('abilities.show' , compact('ability'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ability=ability::find($id);
        return view('abilities.edit', compact('id'), compact('ability'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ability->name=$request->input('name');
        $ability->description=$request->input('description');
        $ability->date=$request->input('date');
        $ability->hour=$request->input('hour');
        $ability->type=$request->input('type');
        $ability->tags=$request->input('tags');
        $ability->visible=$request->input('visible');
        $ability->save();
        return redirect()->route('abilities.show', $ability->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ability::findOrFail($id)->delete();
       return redirect()->route('abilities.index');
    }
}
