<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AbilityController;
use App\Http\Controllers\ArmorController;
use App\Http\Controllers\BackgroundController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\SubClaseController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\SubRaceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SpellController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LenguageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeaponController;

Route::get('abilities/link/{id}/{type}', [AbilityController::class, 'indexLink'])->name('abilities.indexLink');
Route::post('abilities/linkAbilities/{type}/{external_id}/{ability_id}', [AbilityController::class, 'linkAbilities'])->name('abilities.linkAbilities');

Route::get('/subraces/createID/{id}', [SubRaceController::class, 'create'])->name('subRaces.createID');

Route::get('/subclases/createID/{id}', [SubClaseController::class, 'create'])->name('subClases.createID');

Route::get('signup',[LoginController::class, 'signupFrom'])->name('signupFrom');
Route::post('signup',[LoginController::class, 'signup'])->name('signup');
Route::get('login',[LoginController::class, 'loginFrom'])->name('loginFrom');
Route::post('login',[LoginController::class, 'login'])->name('login');
Route::post('logout',[LoginController::class, 'logout'])->name('logout');

Route::post('likes', [LikeController::class, 'store'])->name('likes.store');
Route::delete('likes/{id}', [LikeController::class, 'destroy'])->name('likes.destroy');

Route::get('account', function(){
    return view('users.account');
})->name('users.account')->middleware('auth');

Route::get('signup', function () {
    return view('auth.signup');
})->name('signup');

Route::get('/', function () {
    return view('partials.index');
})->name('index');


Route::resource('items', ItemController::class);
Route::resource('backgrounds', BackgroundController::class);
Route::resource('clases', ClaseController::class);
Route::resource('subClases', SubClaseController::class);
Route::resource('races', RaceController::class);
Route::resource('subRaces', SubRaceController::class);
Route::resource('abilities', AbilityController::class);
Route::resource('spells', SpellController::class);
Route::resource('characters', CharacterController::class);
Route::resource('users', UserController::class);
Route::resource('auth', LoginController::class);
Route::resource('lenguages', LenguageController::class);
Route::resource('weapons', WeaponController::class);
Route::resource('armors', ArmorController::class);
