<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\ItemLinkRequest;
use App\Models\Item;
use App\Models\Character;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=Item::all();
        return view('items.index', compact ('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        $item=new Item();
        $item->nombre=$request->input('nombre');
        $item->descripcion=$request->input('descripcion');
        $item->peso=$request->input('peso');
        $item->precio=$request->input('precio');
        $item->save();
        return redirect()->route('items.index', $item->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item=Item::find($id);
        return view('items.index', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item=Item::find($id);
        return view('items.edit', compact('id'), compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, string $id)
    {
        $item->nombre=$request->input('nombre');
        $item->descripcion=$request->input('descripcion');
        $item->peso=$request->input('peso');
        $item->precio=$request->input('precio');
        $item->save();
        return redirect()->route('items.index', $item->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Item::findOrFail($id)->delete();
       return redirect()->route('items.index');
    }


    public function indexLink(string $id)
    {
        $items=Item::all();
        return view('items.indexLink',compact ('items', 'id'));
    }


    public function linkItems(string $external_id, string $item_id, ItemlinkRequest $request)
    {

        $character = Character::findOrFail($external_id);

        if ($character->items()->where('item_id', $item_id)->exists()) {
            $character->items()->detach($item_id);
            if(input('cantidad')>0){
                $character->items()->attach($item_id, ['cantidad' => $request->input('cantidad')]);
            }
            return redirect()->route('characters.show', compact('character'));
        } else {
            $character->items()->attach($item_id, ['cantidad' => $request->input('cantidad')]);
            return redirect()->route('characters.show', compact('character'));
        }

    }
}
