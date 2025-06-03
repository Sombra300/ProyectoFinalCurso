<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CharacterRequest;
use App\Http\Requests\CharacterUpdateRequest;
use App\Http\Requests\LVLclaseRequest;
use App\Models\Character;
use App\Models\Background;
use App\Models\Clase;
use App\Models\SubClase;
use App\Models\Race;
use App\Models\SubRace;
use App\Models\Spell;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters=Character::all();
        return view('characters.index', compact('characters'));
    }

    public function propios(){
        $characters = Character::where('user_id', Auth::id())->get();
        return view('characters.propios', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $backgrounds=Background::orderBy('nombre')->get();

        $clases = Clase::orderBy('nombre')->get()->map(function ($clase) {
            return [
                'id' => $clase->id,
                'nombre' => $clase->nombre,
                'lvlSubClase' => $clase->lvlSubClase,
                'subclases' => $clase->subclases->map(function ($subclase) {
                    return [
                        'id' => $subclase->id,
                        'nombre' => $subclase->nombre
                    ];
                })
            ];
        });
        $races = Race::orderBy('nombre')->get()->map(function ($race){
            return [
                'id'=>$race->id,
                'nombre'=>$race->nombre,
                'subraces'=>$race->subRaces->map(function ($subrace){
                    return [
                        'id'=>$subrace->id,
                        'nombre'=>$subrace->nombre
                    ];
                })
            ];
        });

        return view('characters.create', compact('clases','races','backgrounds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CharacterRequest $request)
    {
        $clase=Clase::findOrFail($request->input('clase_id'));
        $race=Race::findOrFail($request->input('race_id'));
        $subclase=SubClase::findOrFail($request->input('subclase_id'));

        $character=new Character();
        $character->nombre=$request->input('nombre');
        $character->user_id=Auth::user()->id;
        $character->race_id=$request->input('race_id');
        $character->subrace_id=$request->input('subrace_id');
        $character->background_id = $request->input('background_id');
        $character->vida=$clase->dadoGolpe;
        $character->vidaMax=$clase->dadoGolpe;
        $character->velocidad=$race->velocidad;
        $character->CA=10+$this->calacularModEst($request->input('DES'));
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
        $character->historiaPersonaje=$request->input('historiaPersonaje');
        $character->rasgosPersonaje=$request->input('rasgosPersonaje');
        $character->idealesPersonaje=$request->input('idealesPersonaje');
        $character->vinculosPersonaje=$request->input('vinculosPersonaje');
        $character->defectosPersonaje=$request->input('defectosPersonaje');


        $character->save();

        $character->clases()->attach($request->input('clase_id'), [
            'sub_clase_id' => $request->input('subclase_id'),
            'subclase_name' => $subclase->nombre,
            'lvl' => $request->input('lvl', 1),
            'modComp' => $request->input('modComp', 2),
        ]);
        return redirect()->route('characters.show', $character->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $character=Character::find($id);
        $race=Race::find($character->race_id);
        if($character->subrace_id!=''){
            $subrace=SubRace::find($character->subrace_id);
        }
        $background=Background::find($character->background_id);

        $modCompData = DB::table('character_clase')
            ->where('character_id', $character->id)
            ->pluck('modComp', 'clase_id');

        $maxModComp = $modCompData->max();

        $characterJS=DB::table('characters')
            ->where('id', $character->id)
            ->select('ModFUE', 'ModDES', 'ModCON', 'ModINT', 'ModSAB', 'ModCAR',
                'SalvFUE', 'SalvDES', 'SalvCON', 'SalvINT', 'SalvSAB', 'SalvCAR',
                'CompAcrobacias', 'CompAtletismo', 'CompConocimArcano', 'CompEngaño', 'CompHistoria',
                'CompInterpretacion', 'CompIntimidacion', 'CompInvestigacion', 'CompJuegoManos',
                'CompMedicina', 'CompNaturaleza', 'CompPercepcion', 'CompPerspicacia', 'CompPersuasion',
                'CompReligion', 'CompSigilo', 'CompSupervivencia', 'CompTratoAnimales')->first();

        $weapons = $character->items
            ->filter(fn($item) => $item->weapon)
            ->map(fn($item) => [
                'id' => $item->id,
                'nombre' => $item->weapon->nombre,
                'daño' => $item->weapon->daño,
                'tipoDaño' => $item->weapon->tipoDaño,
                'tipoArma' => $item->weapon->tipoArma,
                'propSut' => $item->weapon->propSut,
        ]);

        $clases = DB::table('clases')
            ->join('character_clase', 'clases.id', '=', 'character_clase.clase_id')
            ->where('character_clase.character_id', $character->id)
            ->select('clases.*')
            ->get();

        return view('characters.show', compact('character','race', 'subrace', 'background', 'maxModComp', 'characterJS', 'weapons', 'clases'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $backgrounds=Background::orderBy('nombre')->get();
        $character=Character::find($id);
        $race=Race::find($character->race_id);
        if($character->subrace_id!=''){
            $subrace=SubRace::find($character->subrace_id);
        }
        return view('characters.edit', compact('character','race', 'subrace', 'backgrounds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CharacterUpdateRequest $request, string $id)
    {
        $character=Character::findOrFail($id);
        $character->nombre=$request->input('nombre');
        $character->vida=$request->input('vidaMax');
        $character->vidaMax=$request->input('vidaMax');
        $character->CA=10+$this->calacularModEst($request->input('DES'));
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
        $character->historiaPersonaje=$request->input('historiaPersonaje');
        $character->rasgosPersonaje=$request->input('rasgosPersonaje');
        $character->idealesPersonaje=$request->input('idealesPersonaje');
        $character->vinculosPersonaje=$request->input('vinculosPersonaje');
        $character->defectosPersonaje=$request->input('defectosPersonaje');


        if(Auth::check()){
            if(Auth::user()->id==$character->user_id){
                $character->save();
            }
        }

        return redirect()->route('characters.show', $character->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $character=Character::findOrFail($id);
        if(Auth::check()){
            if(Auth::user()->id==$character->user_id){
                Character::findOrFail($id)->delete();
            }
        }
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


    public function addClase(string $character_id)
    {
        $character=Character::findOrFail($character_id);
        $clases=Clase::whereNotIn('id', $character->clases->pluck('id'))->get();
        if(Auth::check()){
            if(Auth::user()->id==$character->user_id){
                return view('characters.addClase',compact ('clases', 'character_id'));
            }else{
                return redirect()->route('index');
            }
            return redirect()->route('index');
        }
    }


    public function linkClases(string $character_id, string $clase_id)
    {

        $character = Character::findOrFail($character_id);

        $character->clases()->toggle($clase_id);

        if(Auth::check()){
            if(Auth::user()->id==$character->user_id){
                return redirect()->route('characters.show', compact('character'));
            }else{
                return redirect()->route('index');
            }
            return redirect()->route('index');
        }

    }

    public function modclaselvl($character_id, $clase_id)
    {
        $clase = Clase::findOrFail($clase_id);
        $character=Character::find($character_id);
        $currentlvl = $character->clases()->where('clase_id', $clase_id)->first()->pivot->lvl ?? 1;
        $subClases = $clase->subClases;

        if(Auth::check()){
            if(Auth::user()->id==$character->user_id){
                return view('characters.modclaselvl', compact('character', 'clase', 'currentlvl', 'subClases'));
            }else{
                return redirect()->route('index');
            }
            return redirect()->route('index');
        }
    }

    public function updateclaselvl (LVLclaseRequest $request)
    {
        $character=Character::findOrFail($request->input('character_id'));
        $clase = Clase::findOrFail($request->input('clase_id'));

        if(Auth::check()){
            if(Auth::user()->id==$character->user_id){
                if($request->input('lvl')>0){
                    $clase->characters()->updateExistingPivot($character->id, ['lvl' => $request->input('lvl'),
                        'sub_clase_id'=>$request->input('subclase_id'),
                        'modComp'=>$this->calcularModComp($request->input('lvl'))]);
                }else{
                     $clase->characters()->detach($character->id);
                }

                return redirect()->route('characters.show', $character->id);
            }else{
                return redirect()->route('index');
            }
            return redirect()->route('index');
        }
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
