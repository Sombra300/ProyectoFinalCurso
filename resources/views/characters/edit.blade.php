@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card" style="width: 18rem">
                <div class="row">
                    <div class="col-12">
                        <input type="text" name="nombre" id="nombre" value="{{$character->nombre}}"> </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <select name="background_id" id="background_id">
                            @forelse ($backgrounds as $background)
                                <option value="{{$background->id}}" {{ $character->background_id == $background->id ? 'selected' : '' }}>{{$background->nombre}}</option>
                            @empty
                                <option value="null">No hay trasfondos, no puedes crear el personaje</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-4">{{$race->nombre}}</div>
                    <div class="col-4"><select name="subrace_id" id="subrace_id"></select></div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card">
                <div class="col-12">CA</div>
                <div class="col-12">{{$character->CA}}</div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="row">
                    <div class="col-12">Puntos de Vida</div>
                    <div class="row">
                        <div class="col-6">
                            <div class="col-12">Actuales:</div>
                            <div class="col-12" id="vida">{{$character->vida}}</div>
                        </div>
                        <div class="col-6">
                            <div class="col-12">Temporales:{{$character->vidaTemp}}</div>
                            <div class="col-12">Maximos:{{$character->vidaMax}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6"><button class="btn btn-success w-100" id="masVida">+</button></div>
                        <div class="col-6"><button class="btn btn-danger w-100"  id="menosVida">-</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card border-dark">
                <div class="card-body d-flex flex-column flex-md-row flex-wrap justify-content-between gap-2">

                    <div class="border p-3 flex-fill text-center"><button id="d4">1d4</button></div>


                    <div class="border p-3 flex-fill text-center"><button id="d6">1d6</button></div>


                    <div class="border p-3 flex-fill text-center"><button id="d8">1d8</button></div>


                    <div class="border p-3 flex-fill text-center"><button id="d10">1d10</button></div>


                    <div class="border p-3 flex-fill text-center"><button id="d12">1d12</button></div>


                    <div class="border p-3 flex-fill text-center"><button id="d20">1d20</button></div>
                </div>
            </div>
        </div>
    </div>
</div>


    <hr>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-xl-2">
                            <div class="card">
                                <h6 class="card-title">FUE</h6>
                                <p class="card-text" id="FUE">{{$character->FUE}}</p>

                                <div class="col-12">
                                    <div class="card">
                                        <card class="row">
                                            <div class="col-6">Atletismo</div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-6"><button class="btn-secundary" id="btnAtlet">tirar</button></div>
                                                    <div class="col-6"><button class="btn-secundary" id="btn2Atlet">x2</button></div>
                                                </div>
                                            </div>
                                        </card>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><button class="btn-primary tirar" id="purFUE">Puro</button></div>
                                    <div class="col-6"><button class="btn-primary tirar" id="salvFUE">Salvación</button></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-md-4 col-xl-2">
                            <div class="card">
                                <h6 class="card-title">DES</h6>
                                <p class="card-text" id="DES">{{$character->DES}}</p><div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">Acrobacias</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnAcro">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2Acro">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>

                                <div class="col-12">
                                    <div class="card">
                                        <card class="row">
                                            <div class="col-6">Juego de manos</div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-6"><button class="btn-secundary" id="btnJuegManos">tirar</button></div>
                                                    <div class="col-6"><button class="btn-secundary" id="btn2JuegManos">x2</button></div>
                                                </div>
                                            </div>
                                        </card>
                                    </div>
                                </div><div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">Sigilo</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnSig">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2Sig">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>


                                <div class="row">
                                    <div class="col-6"><button class="btn-primary tirar" id="purDES">Puro</button></div>
                                    <div class="col-6"><button class="btn-primary tirar" id="salvDES">Salvación</button></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-md-4 col-xl-2">
                            <div class="card">
                                <h6 class="card-title">CON</h6>
                                <p class="card-text" id="CON">{{$character->CON}}</p>
                                <div class="row">
                                    <div class="col-6"><button class="btn-primary tirar" id="purCON">Puro</button></div>
                                    <div class="col-6"><button class="btn-primary tirar" id="salvCON">Salvación</button></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-md-4 col-xl-2">
                            <div class="card">
                                <h6 class="card-title">INT</h6>
                                <p class="card-text" id="INT">{{$character->INT}}</p><div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">C. Arcano</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnCArc">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2CArc">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">Historia</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnHis">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2His">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">Investigación</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnInv">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2Inv">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">Naturaleza</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnNat">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2Nat">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">Religión</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnRel">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2Rel">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>


                                <div class="row">
                                    <div class="col-6"><button class="btn-primary tirar" id="purINT">Puro</button></div>
                                    <div class="col-6"><button class="btn-primary tirar" id="salvINT">Salvación</button></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-md-4 col-xl-2">
                            <div class="card">
                                <h6 class="card-title">SAB</h6>
                                <p class="card-text" id="SAB">{{$character->SAB}}</p>

                                    <div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">T. con Animales</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnTAnim">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2TAnim">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">Medicina</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnMed">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2Med">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">Percepción</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnPerce">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2Perce">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">Perspicacia</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnPerspi">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2Perspi">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">Supervivencia</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnSuperv">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2Superv">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>


                                <div class="row">
                                    <div class="col-6"><button class="btn-primary tirar" id="purSAB">Puro</button></div>
                                    <div class="col-6"><button class="btn-primary tirar" id="salvSAB">Salvación</button></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-6 col-md-4 col-xl-2">
                            <div class="card">
                                <h6 class="card-title">CAR</h6>
                                <p class="card-text" id="CAR">{{$character->CAR}}</p>

                                    <div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">Engaño</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnEng">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2Eng">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">Interpretación</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnInter">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2Inter">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">Intimidación</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnIntim">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2Intim">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card">
                                            <card class="row">
                                                <div class="col-6">Persuasión</div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6"><button class="btn-secundary" id="btnPersu">tirar</button></div>
                                                        <div class="col-6"><button class="btn-secundary" id="btn2Persu">x2</button></div>
                                                    </div>
                                                </div>
                                            </card>
                                        </div>
                                    </div>

                                <div class="row">
                                    <div class="col-6"><button class="btn-primary tirar" id="purCAR">Puro</button></div>
                                    <div class="col-6"><button class="btn-primary tirar" id="salvCAR">Salvación</button></div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="stacked">
                    @foreach ($character->clases as $clase)
                        <div class="card">
                            <h6>{{$clase->nombre}}</h6>
                            <div class="card-body" id="clases">
                                Nivel de clase: {{$clase->pivot->lvl}}    Subclase: {{$clase->pivot->subclase_name}} <br>
                                modComp de la clase {{$clase->pivot->modComp}}
                            </div>
                        </div>
                    @endforeach
                    @foreach ($character->items as $item)
                        @if ($item->weapon)
                            <div class="card">
                                <div class="card-body" id="armas">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-md-3">{{$item->weapon->nombre}}</div>

                                            <div class="col-md-3">de 1 a {{$item->weapon->daño}}</div>

                                            <div class="col-md-3">{{$item->weapon->tipoDaño}}</div>

                                            <div class="col-md-3"><button id="">Tirar ataque</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="card">
                        <div class="card-body" id="competencias">
                            <div class="col-2" id="compArmaSimple">
                                @if ($background->CompArmaSimple==1)
                                    Armas simples
                                @endif
                            </div>
                            <div class="col-2" id="compArmaMarcial">
                                @if ($background->CompArmaMarcial==1)
                                    Armas marciales
                                @endif
                            </div>
                            <div class="col-2" id="compArmaduraLigera">
                                @if ($background->CompArmaduraLig==1)
                                    Armadura ligera
                                @endif
                            </div>
                            <div class="col-2" id="compArmaduraMedia">
                                @if ($background->CompArmaduraMed==1)
                                    Armadura media
                                @endif
                            </div>
                            <div class="col-2" id="compArmaduraPesada">
                                @if ($background->CompArmaduraPes==1)
                                    Armadura pesada
                                @endif
                            </div>
                            <div class="col-2" id="compescudo">
                                @if ($background->CompEscudo==1)
                                    Escudo
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" id="habilidades">
                        @foreach ($race->abilities as $ability)
                            <div class="col-12">
                                <div class="card">
                                    <div class="col-12 card-title">{{$ability->nombre}}</div>
                                    <div class="col-12">{{$ability->descripcion}}</div>
                                    <div class="row">
                                        <div class="col-6">Coste de habilidad: {{$ability->coste}}</div>
                                        <div class="col-6">{{$ability->reuseTime}}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($subrace->abilities as $ability)
                            <div class="col-12">
                                <div class="card">
                                    <div class="col-12 card-title">{{$ability->nombre}}</div>
                                    <div class="col-12">{{$ability->descripcion}}</div>
                                    <div class="row">
                                        <div class="col-6">Coste de habilidad: {{$ability->coste}}</div>
                                        <div class="col-6">{{$ability->reuseTime}}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($character->clases as $clase)
                            @foreach ($clase->abilities as $ability)
                                @if ($clase->pivot->lvl>=$ability->pivot->lvl)
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="col-12 card-title">{{$ability->nombre}}</div>
                                            <div class="col-12">{{$ability->descripcion}}</div>
                                            <div class="row">
                                                <div class="col-6">Coste de habilidad: {{$ability->coste}}</div>
                                                <div class="col-6">{{$ability->reuseTime}}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @foreach ($clase->subclases as $subclase)
                                    @if ($subclase->id==$clase->pivot->sub_clase_id)
                                        @foreach ($subclase->abilities as $ability)
                                            @if ($clase->pivot->lvl>=$ability->pivot->lvl)
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="col-12 card-title">{{$ability->nombre}}</div>
                                                        <div class="col-12">{{$ability->descripcion}}</div>
                                                        <div class="row">
                                                            <div class="col-6">Coste de habilidad: {{$ability->coste}}</div>
                                                            <div class="col-6">{{$ability->reuseTime}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                    @endforeach
                                    @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" id="objetos">
                        <a href="{{ route('items.indexLink', $character->id) }}" class="btn btn-primary">Añadir Objetos</a>
                        @foreach ($character->items as $item)
                            @if ($item->weapon)
                                <div class="card weapon">
                            @elseif ($item->armor)
                                <div class="card armor">
                            @else
                                <div class="card item">
                            @endif
                                {{$item->nombre}}: {{$item->pivot->cantidad}} unidades  {{$item->peso*$item->pivot->cantidad}}lbs
                                @if ($item->armor)
                                    <br> Tipo armadura: {{$item->armor->tipoArm}}
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row g-3">
            @foreach ($character->clases as $clase)
                @foreach ($clase->spells as $spell)
                    @if ($clase->pivot->lvl >= $spell->pivot->lvl)
                        <div class="col-md-6 col-lg-4">
                            <div class="card {{$spell->tipoDaño}}">
                                <div class="card-body">
                                    <h6 class="card-title">{{$spell->nombre}}</h6>
                                    <p class="card-text">{{$spell->descripcion}}</p>

                                    @if ($spell->ataque)
                                        <div class="text-warning">
                                            El lanzador tendrá que hacer una tirada de ataque
                                        </div>
                                    @endif

                                    <div>
                                        <strong>Espacio de conjuro:</strong> {{$spell->nivel}}
                                    </div>
                                    <div>
                                        <strong>Daño:</strong> 1d{{$spell->daño}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="container mt-4">
    <div class="row g-3">

        <div class="col-md-12">
            <h6 class="card-title">Historia del personaje</h6>
            <textarea class="form-control p-4 text-center" rows="5" name="historiaPersonaje">{{ $character->historiaPersonaje }}</textarea>
        </div>

        <div class="col-md-6">
            <h6 class="card-title">Rasgos del personaje</h6>
            <textarea class="form-control p-4 text-center" rows="5" name="rasfosPersonaje">{{ $character->rasfosPersonaje }}</textarea>
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
<div style="opacity: 0" id="modCompMax"></div>

@endsection('body')

@section('scrips')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectRaza = document.getElementById('race_id')
        const selectSubraza = document.getElementById('subrace_id')

        const raceData = @json($races)

        raceData.forEach(race => {
            let option=document.createElement('option')
            option.value=race.id
            option.textContent=race.nombre
            selectRaza.appendChild(option)
        })

        selectRaza.addEventListener('change', function () {
            const razaID = parseInt(this.value)
            selectSubraza.innerHTML = ''

            const razaSeleccionada = raceData.find(item => item.id === razaID)

            if (razaSeleccionada.subraces.length > 0) {
                razaSeleccionada.subraces.forEach(subrace => {
                    let option = document.createElement('option')
                    option.value = subrace.id
                    option.textContent = subrace.nombre
                    selectSubraza.appendChild(option)
                });
            } else {
                let option = document.createElement('option')
                option.value = "";
                option.textContent = "Esta raza no tiene subrazas"
                selectSubraza.appendChild(option)
            }
        })

    })

</script>


@endsection('body')
