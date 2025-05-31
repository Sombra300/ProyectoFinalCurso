@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container">
    <form action="{{route('characters.update', $character->id)}}" method="post">
        @csrf
        @method('put')

        <div class="row mb-4">
            <div class="col-12 col-md-5 mb-3">
                <div class="card p-3 h-100">
                    <input type="text" name="nombre" id="nombre" value="{{$character->nombre}}" class="form-control mb-3" placeholder="Nombre">

                    <div class="row text-center">
                        <div class="col-4"><span>{{$character->background->nombre}}</span></div>
                        <div class="col-4"><span>{{$race->nombre}}</span></div>
                        <div class="col-4"><span id="subrace_id">{{$subrace->nombre}}</span></div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-2 mb-3">
                <div class="card p-3 text-center h-100">
                    <label for="CA" class="form-label">CA</label>
                    <input type="number" name="CA" id="CA" value="{{$character->CA-$character->ModDES}}" class="form-control">
                </div>
            </div>

            <div class="col-12 col-md-5 mb-3">
                <div class="card p-3 h-100">
                    <label for="vidaMax" class="form-label">Puntos de Vida</label>
                    <input type="number" name="vidaMax" id="vidaMax" value="{{$character->vidaMax}}" class="form-control">
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <!-- Ejemplo para una característica (FUE) -->
            <div class="col-12">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-xl-2">
                <div class="col-12">FUE</div>
                <input type="number" name="FUE" id="FUE" value="{{ $character->FUE }}">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="SalvFUE" id="SalvFUE" value="1" {{ $character->SalvFUE ? 'checked' : '' }}>
                        <label for="SalvFUE">Competencia en salvación de fuerza</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompAtletismo" id="CompAtletismo" value="1" {{ $character->CompAtletismo ? 'checked' : '' }}>
                        <label for="CompAtletismo">Competencia en Atletismo</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-xl-2">
                <div class="col-12">DES</div>
                <input type="number" name="DES" id="DES" value="{{ $character->DES }}">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="SalvDES" id="SalvDES" value="1" {{ $character->SalvDES ? 'checked' : '' }}>
                        <label for="SalvDES">Competencia en salvación de destreza</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompAcrobacias" id="CompAcrobacias" value="1" {{ $character->CompAcrobacias ? 'checked' : '' }}>
                        <label for="CompAcrobacias">Competencia en Acrobacias</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompJuegoManos" id="CompJuegoManos" value="1" {{ $character->CompJuegoManos ? 'checked' : '' }}>
                        <label for="CompJuegoManos">Competencia en Juego de manos</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompSigilo" id="CompSigilo" value="1" {{ $character->CompSigilo ? 'checked' : '' }}>
                        <label for="CompSigilo">Competencia en Sigilo</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-xl-2">
                <div class="col-12">CON</div>
                <input type="number" name="CON" id="CON" value="{{ $character->CON }}">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="SalvCON" id="SalvCON" value="1" {{ $character->SalvCON ? 'checked' : '' }}>
                        <label for="SalvCON">Competencia en salvación de constitución</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-xl-2">
                <div class="col-12">INT</div>
                <input type="number" name="INT" id="INT" value="{{ $character->INT }}">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="SalvINT" id="SalvINT" value="1" {{ $character->SalvINT ? 'checked' : '' }}>
                        <label for="SalvINT">Competencia en salvación de inteligencia</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompConocimArcano" id="CompConocimArcano" value="1" {{ $character->CompConocimArcano ? 'checked' : '' }}>
                        <label for="CompConocimArcano">Competencia en Conocimiento Arcano</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompHistoria" id="CompHistoria" value="1" {{ $character->CompHistoria ? 'checked' : '' }}>
                        <label for="CompHistoria">Competencia en Historia</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompInvestigacion" id="CompInvestigacion" value="1" {{ $character->CompInvestigacion ? 'checked' : '' }}>
                        <label for="CompInvestigacion">Competencia en Investigación</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompNaturaleza" id="CompNaturaleza" value="1" {{ $character->CompNaturaleza ? 'checked' : '' }}>
                        <label for="CompNaturaleza">Competencia en naturaleza</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompReligion" id="CompReligion" value="1" {{ $character->CompReligion ? 'checked' : '' }}>
                        <label for="CompReligion">Competencia en Religión</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-xl-2">
                <div class="col-12">SAB</div>
                <input type="number" name="SAB" id="SAB" value="{{ $character->SAB }}">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="SalvSAB" id="SalvSAB" value="1" {{ $character->SalvSAB ? 'checked' : '' }}>
                        <label for="SalvSAB">Competencia en salvación de sabiduría</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompMedicina" id="CompMedicina" value="1" {{ $character->CompMedicina ? 'checked' : '' }}>
                        <label for="CompMedicina">Competencia en Medicina</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompPercepcion" id="CompPercepcion" value="1" {{ $character->CompPercepcion ? 'checked' : '' }}>
                        <label for="CompPercepcion">Competencia en Percepción</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompPerspicacia" id="CompPerspicacia" value="1" {{ $character->CompPerspicacia ? 'checked' : '' }}>
                        <label for="CompPerspicacia">Competencia en Perspicacia</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompSupervivencia" id="CompSupervivencia" value="1" {{ $character->CompSupervivencia ? 'checked' : '' }}>
                        <label for="CompSupervivencia">Competencia en Supervivencia</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompTratoAnimales" id="CompTratoAnimales" value="1" {{ $character->CompTratoAnimales ? 'checked' : '' }}>
                        <label for="CompTratoAnimales">Competencia en Trato con animales</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-xl-2">
                <div class="col-12">CAR</div>
                <input type="number" name="CAR" id="CAR" value="{{ $character->CAR }}">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="SalvCAR" id="SalvCAR" value="1" {{ $character->SalvCAR ? 'checked' : '' }}>
                        <label for="SalvCAR">Competencia en salvación de carisma</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompEngaño" id="CompEngaño" value="1" {{ $character->CompEngaño ? 'checked' : '' }}>
                        <label for="CompEngaño">Competencia en Engaño</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompInterpretacion" id="CompInterpretacion" value="1" {{ $character->CompInterpretacion ? 'checked' : '' }}>
                        <label for="CompInterpretacion">Competencia en Interpretación</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompIntimidacion" id="CompIntimidacion" value="1" {{ $character->CompIntimidacion ? 'checked' : '' }}>
                        <label for="CompIntimidacion">Competencia en Intimidación</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompPersuasion" id="CompPersuasion" value="1" {{ $character->CompPersuasion ? 'checked' : '' }}>
                        <label for="CompPersuasion">Competencia en Persuasión</label>
                    </div>
                </div>

            </div>
        </div>

            <!-- Repite para las demás características (DES, CON, INT, SAB, CAR) con la misma estructura -->
            <!-- ... -->

        </div>

        <div class="row mb-4">
            <div class="col-12">
                <div class="card p-3">
                    <h6>Historia del personaje</h6>
                    <textarea class="form-control mb-3" rows="5" name="historiaPersonaje">{{ $character->historiaPersonaje }}</textarea>

                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <h6>Rasgos del personaje</h6>
                            <textarea class="form-control" rows="5" name="rasgosPersonaje">{{ $character->rasgosPersonaje }}</textarea>
                        </div>
                        <div class="col-12 col-md-6">
                            <h6>Ideales del Personaje</h6>
                            <textarea class="form-control" rows="5" name="idealesPersonaje">{{ $character->idealesPersonaje }}</textarea>
                        </div>
                        <div class="col-12 col-md-6">
                            <h6>Vínculos del personaje</h6>
                            <textarea class="form-control" rows="5" name="vinculosPersonaje">{{ $character->vinculosPersonaje }}</textarea>
                        </div>
                        <div class="col-12 col-md-6">
                            <h6>Defectos/manías del personaje</h6>
                            <textarea class="form-control" rows="5" name="defectosPersonaje">{{ $character->defectosPersonaje }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

        @if ($errors->any())
        <ul class="mt-3 text-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </form>
</div>


{{-- <div class="container">
    <form action="{{route('characters.update', $character->id)}}" method="post">
    @csrf
    @method('put')
        <div class="row">
            <div class="col-5">
                <div class="card" style="width: 18rem">
                    <div class="row">
                        <div class="col-12">
                            <input type="text" name="nombre" id="nombre" value="{{$character->nombre}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <span>{{$character->background->nombre}}</span>
                        </div>
                        <div class="col-4">{{$race->nombre}}</div>
                        <div class="col-4"><span id="subrace_id">{{$subrace->nombre}}</span></div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card">
                    <div class="col-12">CA</div>
                    <div class="col-12">
                        <input type="number" name="CA" id="CA" value="{{$character->CA-$character->ModDES}}">
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card">
                    <div class="row">
                        <div class="col-12">Puntos de Vida</div>
                        <div class="row">
                            <label for="vidaMax">Vida maxima</label>
                            <input type="number" name="vidaMax" id="vidaMax" value="{{$character->vidaMax}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-xl-2">
                <div class="col-12">FUE</div>
                <input type="number" name="FUE" id="FUE" value="{{ $character->FUE }}">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="SalvFUE" id="SalvFUE" value="1" {{ $character->SalvFUE ? 'checked' : '' }}>
                        <label for="SalvFUE">Competencia en salvación de fuerza</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompAtletismo" id="CompAtletismo" value="1" {{ $character->CompAtletismo ? 'checked' : '' }}>
                        <label for="CompAtletismo">Competencia en Atletismo</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-xl-2">
                <div class="col-12">DES</div>
                <input type="number" name="DES" id="DES" value="{{ $character->DES }}">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="SalvDES" id="SalvDES" value="1" {{ $character->SalvDES ? 'checked' : '' }}>
                        <label for="SalvDES">Competencia en salvación de destreza</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompAcrobacias" id="CompAcrobacias" value="1" {{ $character->CompAcrobacias ? 'checked' : '' }}>
                        <label for="CompAcrobacias">Competencia en Acrobacias</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompJuegoManos" id="CompJuegoManos" value="1" {{ $character->CompJuegoManos ? 'checked' : '' }}>
                        <label for="CompJuegoManos">Competencia en Juego de manos</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompSigilo" id="CompSigilo" value="1" {{ $character->CompSigilo ? 'checked' : '' }}>
                        <label for="CompSigilo">Competencia en Sigilo</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-xl-2">
                <div class="col-12">CON</div>
                <input type="number" name="CON" id="CON" value="{{ $character->CON }}">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="SalvCON" id="SalvCON" value="1" {{ $character->SalvCON ? 'checked' : '' }}>
                        <label for="SalvCON">Competencia en salvación de constitución</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-xl-2">
                <div class="col-12">INT</div>
                <input type="number" name="INT" id="INT" value="{{ $character->INT }}">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="SalvINT" id="SalvINT" value="1" {{ $character->SalvINT ? 'checked' : '' }}>
                        <label for="SalvINT">Competencia en salvación de inteligencia</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompConocimArcano" id="CompConocimArcano" value="1" {{ $character->CompConocimArcano ? 'checked' : '' }}>
                        <label for="CompConocimArcano">Competencia en Conocimiento Arcano</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompHistoria" id="CompHistoria" value="1" {{ $character->CompHistoria ? 'checked' : '' }}>
                        <label for="CompHistoria">Competencia en Historia</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompInvestigacion" id="CompInvestigacion" value="1" {{ $character->CompInvestigacion ? 'checked' : '' }}>
                        <label for="CompInvestigacion">Competencia en Investigación</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompNaturaleza" id="CompNaturaleza" value="1" {{ $character->CompNaturaleza ? 'checked' : '' }}>
                        <label for="CompNaturaleza">Competencia en naturaleza</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompReligion" id="CompReligion" value="1" {{ $character->CompReligion ? 'checked' : '' }}>
                        <label for="CompReligion">Competencia en Religión</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-xl-2">
                <div class="col-12">SAB</div>
                <input type="number" name="SAB" id="SAB" value="{{ $character->SAB }}">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="SalvSAB" id="SalvSAB" value="1" {{ $character->SalvSAB ? 'checked' : '' }}>
                        <label for="SalvSAB">Competencia en salvación de sabiduría</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompMedicina" id="CompMedicina" value="1" {{ $character->CompMedicina ? 'checked' : '' }}>
                        <label for="CompMedicina">Competencia en Medicina</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompPercepcion" id="CompPercepcion" value="1" {{ $character->CompPercepcion ? 'checked' : '' }}>
                        <label for="CompPercepcion">Competencia en Percepción</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompPerspicacia" id="CompPerspicacia" value="1" {{ $character->CompPerspicacia ? 'checked' : '' }}>
                        <label for="CompPerspicacia">Competencia en Perspicacia</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompSupervivencia" id="CompSupervivencia" value="1" {{ $character->CompSupervivencia ? 'checked' : '' }}>
                        <label for="CompSupervivencia">Competencia en Supervivencia</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompTratoAnimales" id="CompTratoAnimales" value="1" {{ $character->CompTratoAnimales ? 'checked' : '' }}>
                        <label for="CompTratoAnimales">Competencia en Trato con animales</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-4 col-xl-2">
                <div class="col-12">CAR</div>
                <input type="number" name="CAR" id="CAR" value="{{ $character->CAR }}">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="SalvCAR" id="SalvCAR" value="1" {{ $character->SalvCAR ? 'checked' : '' }}>
                        <label for="SalvCAR">Competencia en salvación de carisma</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompEngaño" id="CompEngaño" value="1" {{ $character->CompEngaño ? 'checked' : '' }}>
                        <label for="CompEngaño">Competencia en Engaño</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompInterpretacion" id="CompInterpretacion" value="1" {{ $character->CompInterpretacion ? 'checked' : '' }}>
                        <label for="CompInterpretacion">Competencia en Interpretación</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompIntimidacion" id="CompIntimidacion" value="1" {{ $character->CompIntimidacion ? 'checked' : '' }}>
                        <label for="CompIntimidacion">Competencia en Intimidación</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompPersuasion" id="CompPersuasion" value="1" {{ $character->CompPersuasion ? 'checked' : '' }}>
                        <label for="CompPersuasion">Competencia en Persuasión</label>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="card">
                    <div class="col-md-12">
                        <h6 class="card-title">Historia del personaje</h6>
                        <textarea class="form-control p-4 text-center" rows="5" name="historiaPersonaje">{{ $character->historiaPersonaje }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="card-title">Rasgos del personaje</h6>
                            <textarea class="form-control p-4 text-center" rows="5" name="rasgosPersonaje">{{ $character->rasgosPersonaje }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <h6 class="card-title">Ideales del Personaje</h6>
                            <textarea class="form-control p-4 text-center" rows="5" name="idealesPersonaje">{{ $character->idealesPersonaje }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <h6 class="card-title">Vínculos del personaje</h6>
                            <textarea class="form-control p-4 text-center" rows="5" name="vinculosPersonaje">{{ $character->vinculosPersonaje }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <h6 class="card-title">Defectos/manías del personaje</h6>
                            <textarea class="form-control p-4 text-center" rows="5" name="defectosPersonaje">{{ $character->defectosPersonaje }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>

        <input type="submit" value="Guardar">
    </form>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
</div> --}}

@endsection('body')
