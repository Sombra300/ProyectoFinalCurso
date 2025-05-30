<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request){
        $character = Character::findOrFail($request->input('character_id'));
        $user=Auth::user();
        $character->likes()->toggle($user);
        return redirect()->back();
    }
}
