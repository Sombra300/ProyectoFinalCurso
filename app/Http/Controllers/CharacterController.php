<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CharacterRequest;
use App\Models\Character;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters=Character::all();
        return view('characters.index');
    }

    public function propios(){
        $characters = Character::where('user_id', Auth::id())->get();
        return view('index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CharacterRequest $request)
    {
        $character=new Character();
        $character->nombre=$request->input('nombre');
        $character->user_id=Auth::user()->id;
        $character->race_id=$request->input('race_id');
        $character->FUE=$request->input('FUE');
        $character->ModFUE=$this->calacularModEst($request->input('FUE'));
        $character->DES=$request->input('DES');
        $character->ModDES=$this->calacularModEst($request->input('DES'));
        $character->CON=$request->input('CON');
        $character->ModCON=$this->calacularModEst($request->input('CON'));
        $character->INT=$request->input('INT');
        $character->ModINT=$this->calacularModEst($request->input('INT'));
        $character->SAB=$request->input('SAB');
        $character->ModSAB=$this->calacularModEst($request->input('SAB'));
        $character->CAR=$request->input('CAR');
        $character->ModCAR=$this->calacularModEst($request->input('CAR'));
        $character->lvl=$request->input('lvl');
        $character->CA=$request->input('CA');
        $character->CompSalvFUE=$request->input('CompSalvFUE');
        $character->CompSalvDES=$request->input('CompSalvDES');
        $character->CompSalvINT=$request->input('CompSalvINT');
        $character->CompSalvSAB=$request->input('CompSalvSAB');
        $character->CompSalvCAR=$request->input('CompSalvCAR');
        $character->CompAcrobacias=$request->input('CompAcrobacias');
        $character->CompAtletismo=$request->input('CompAtletismo');
        $character->CompConocimArcano=$request->input('CompConocimArcano');
        $character->CompEngaño=$request->input('CompEngaño');
        $character->CompHistoria=$request->input('CompHistoria');
        $character->CompInterpretacion=$request->input('CompInterpretacion');
        $character->CompIntimidacion=$request->input('CompIntimidacion');
        $character->CompInvestigacion=$request->input('CompInvestigacion');
        $character->CompJuegoManos=$request->input('CompJuegoManos');
        $character->CompMedicina=$request->input('CompMedicina');
        $character->CompNaturaleza=$request->input('CompNaturaleza');
        $character->CompPercepcion=$request->input('CompPercepcion');
        $character->CompPerspicacia=$request->input('CompPerspicacia');
        $character->CompPersuasion=$request->input('CompPersuasion');
        $character->CompReligion=$request->input('CompReligion');
        $character->CompSigilo=$request->input('CompSigilo');
        $character->CompSupervivencia=$request->input('CompSupervivencia');
        $character->CompTratoAnimales=$request->input('CompTratoAnimales');
        $character->SalvFUE=$request->input('SalvFUE');
        $character->SalvDES=$request->input('SalvDES');
        $character->SalvINT=$request->input('SalvINT');
        $character->SalvSAB=$request->input('SalvSAB');
        $character->SalvCAR=$request->input('SalvCAR');
        $character->Acrobacias=$request->input('Acrobacias');
        $character->Atletismo=$request->input('Atletismo');
        $character->ConocimArcano=$request->input('ConocimArcano');
        $character->Engaño=$request->input('Engaño');
        $character->Historia=$request->input('Historia');
        $character->Interpretacion=$request->input('Interpretacion');
        $character->Intimidacion=$request->input('Intimidacion');
        $character->Investigacion=$request->input('Investigacion');
        $character->JuegoManos=$request->input('JuegoManos');
        $character->Medicina=$request->input('Medicina');
        $character->Naturaleza=$request->input('Naturaleza');
        $character->Percepcion=$request->input('Percepcion');
        $character->Perspicacia=$request->input('Perspicacia');
        $character->Persuasion=$request->input('Persuasion');
        $character->Religion=$request->input('Religion');
        $character->Sigilo=$request->input('Sigilo');
        $character->Supervivencia=$request->input('Supervivencia');
        $character->TratoAnimales=$request->input('TratoAnimales');
        $character->historiaPersonaje=$request->input('historiaPersonaje');
        $character->rasgosPersonaje=$request->input('rasgosPersonaje');
        $character->idealesPersonaje=$request->input('idealesPersonaje');
        $character->vinculosPersonaje=$request->input('vinculosPersonaje');
        $character->defectosPersonaje=$request->input('defectosPersonaje');
        $character->associate(User::findOrFail(Auth::user()->id));
        $character->associate(Race::findOrFail($request->input('race_id')));
        $character->attach(Clase::findOrFail($request->input('clase_id')));
        $character->attach(Background::findOrFail($request->input('background_id')));
        $character->save();
        return redirect()->route('characters.show', $character->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $character=Character::find($id);
        return view('characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $character=Character::find($id);
        return view('characters.edit', compact('id'), compact('character'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CharacterRequest $request, string $id)
    {
        $character->nombre=$request->input('nombre');
        $character->race_id=$request->input('race_id');
        $character->FUE=$request->input('FUE');
        $character->ModFUE=$this->calacularModEst($request->input('FUE'));
        $character->DES=$request->input('DES');
        $character->ModDES=$this->calacularModEst($request->input('DES'));
        $character->CON=$request->input('CON');
        $character->ModCON=$this->calacularModEst($request->input('CON'));
        $character->INT=$request->input('INT');
        $character->ModINT=$this->calacularModEst($request->input('INT'));
        $character->SAB=$request->input('SAB');
        $character->ModSAB=$this->calacularModEst($request->input('SAB'));
        $character->CAR=$request->input('CAR');
        $character->ModCAR=$this->calacularModEst($request->input('CAR'));
        $character->CA=$request->input('CA');
        $character->CompSalvFUE=$request->input('CompSalvFUE');
        $character->CompSalvDES=$request->input('CompSalvDES');
        $character->CompSalvINT=$request->input('CompSalvINT');
        $character->CompSalvSAB=$request->input('CompSalvSAB');
        $character->CompSalvCAR=$request->input('CompSalvCAR');
        $character->CompAcrobacias=$request->input('CompAcrobacias');
        $character->CompAtletismo=$request->input('CompAtletismo');
        $character->CompConocimArcano=$request->input('CompConocimArcano');
        $character->CompEngaño=$request->input('CompEngaño');
        $character->CompHistoria=$request->input('CompHistoria');
        $character->CompInterpretacion=$request->input('CompInterpretacion');
        $character->CompIntimidacion=$request->input('CompIntimidacion');
        $character->CompInvestigacion=$request->input('CompInvestigacion');
        $character->CompJuegoManos=$request->input('CompJuegoManos');
        $character->CompMedicina=$request->input('CompMedicina');
        $character->CompNaturaleza=$request->input('CompNaturaleza');
        $character->CompPercepcion=$request->input('CompPercepcion');
        $character->CompPerspicacia=$request->input('CompPerspicacia');
        $character->CompPersuasion=$request->input('CompPersuasion');
        $character->CompReligion=$request->input('CompReligion');
        $character->CompSigilo=$request->input('CompSigilo');
        $character->CompSupervivencia=$request->input('CompSupervivencia');
        $character->CompTratoAnimales=$request->input('CompTratoAnimales');
        $character->SalvFUE=$request->input('SalvFUE');
        $character->SalvDES=$request->input('SalvDES');
        $character->SalvINT=$request->input('SalvINT');
        $character->SalvSAB=$request->input('SalvSAB');
        $character->SalvCAR=$request->input('SalvCAR');
        $character->Acrobacias=$request->input('Acrobacias');
        $character->Atletismo=$request->input('Atletismo');
        $character->ConocimArcano=$request->input('ConocimArcano');
        $character->Engaño=$request->input('Engaño');
        $character->Historia=$request->input('Historia');
        $character->Interpretacion=$request->input('Interpretacion');
        $character->Intimidacion=$request->input('Intimidacion');
        $character->Investigacion=$request->input('Investigacion');
        $character->JuegoManos=$request->input('JuegoManos');
        $character->Medicina=$request->input('Medicina');
        $character->Naturaleza=$request->input('Naturaleza');
        $character->Percepcion=$request->input('Percepcion');
        $character->Perspicacia=$request->input('Perspicacia');
        $character->Persuasion=$request->input('Persuasion');
        $character->Religion=$request->input('Religion');
        $character->Sigilo=$request->input('Sigilo');
        $character->Supervivencia=$request->input('Supervivencia');
        $character->TratoAnimales=$request->input('TratoAnimales');
        $character->historiaPersonaje=$request->input('historiaPersonaje');
        $character->rasgosPersonaje=$request->input('rasgosPersonaje');
        $character->idealesPersonaje=$request->input('idealesPersonaje');
        $character->vinculosPersonaje=$request->input('vinculosPersonaje');
        $character->defectosPersonaje=$request->input('defectosPersonaje');
        $character->save();

        return redirect()->route('characters.show', $character->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Character::findOrFail($id)->delete();
       return redirect()->route('characters.index');
    }

    public function have(Character $character, CharacterRequest $request)
    {
        $item = Item::findOrFail($request->input('item_id'));

    if ($character->items()->where('item_id', $item->id)->exists()) {
        $character->items()->detach($item->id);
        if(input('cantidad')>0){
            $character->items()->attach($item->id, ['cantidad' => $request->input('cantidad')]);
        }
        return redirect()->route('characters.edit', $character->id);
    } else {
        $character->items()->attach($item->id, ['cantidad' => $request->input('cantidad')]);
        return redirect()->route('characters.show', $character->id);
    }

    }
    public function equip(Character $character, CharacterRequest $request)
    {
        $item = Item::findOrFail($request->input('item_id'));

    if ($character->equipedItems()->where('item_id', $item->id)->exists()) {
        $character->equipedItems()->detach($item->id);
        return redirect()->route('characters.show', $character->id);
    } else {
        $character->equipedItems()->attach($item->id, ['sitio' => $request->input('sitio')]);
        return redirect()->route('characters.show', $character->id);
    }

    }

    public function addClase(Character $character, Request $request)
    {
        $clase = Clase::findOrFail($request->input('clase_id'));
        $character->clases()->attach($clase->id);
        return redirect()->route('characters.show', $character->id);
    }

    public function modClaseLVL(Character $character, Request $request)
    {
        $clase = Clase::findOrFail($request->input('clase_id'));
        $character->clases()->detach($clase->id);
        if(request->input('clase_id')>0){
            $character->clases()->attach($clases->id, ['lvl' => $input('clas_lvl'), 'modComp'=>calcularModComp($request->input('clas_lvl'))]);
        }
        return redirect()->route('characters.edit', $character->id);
    }

    private function calacularModEst($valor)
    {

        switch ($valor) {
            case 1:
                return $mod=-5;
                break;

            case 2:
            case 3:
                return $mod=-4;
                break;

            case 4:
            case 5:
                return $mod=-3;
                break;

            case 6:
            case 7:
                return $mod=-2;
                break;

            case 8:
            case 9:
                return $mod=-1;
                break;

            case 10:
            case 11:
                return $mod=0;
                break;

            case 12:
            case 13:
                return $mod=1;
                break;

            case 14:
            case 15:
                return $mod=2;
                break;

            case 16:
            case 17:
                return $mod=3;
                break;

            case 18:
            case 19:
                return $mod=4;
                break;

            case 20:
            case 21:
                return $mod=5;
                break;

            case 22:
            case 23:
                return $mod=6;
                break;

            case 24:
            case 25:
                return $mod=7;
                break;

            case 26:
            case 27:
                return $mod=8;
                break;

            case 28:
            case 29:
                return $mod=9;
                break;

            case 30:
                return $mod=10;
                break;
        }
    }

    private function calcularModComp($valor)
    {

        switch ($valor) {
            case 1:
            case 2:
            case 3:
            case 4:
                return $mod=2;
                break;
            case 5:
            case 6:
            case 7:
            case 8:
                return $mod=3;
                break;
            case 9:
            case 10:
            case 11:
            case 12:
                return $mod=4;
                break;

            case 13:
            case 14:
            case 15:
            case 16:
                return $mod=5;
                break;

            case 17:
            case 18:
            case 19:
            case 20:
                return $mod=6;
                break;
        }
    }
}
