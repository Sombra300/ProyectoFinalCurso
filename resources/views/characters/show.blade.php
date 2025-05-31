@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-5 mb-3">
            <div class="card" style="max-width: 18rem; margin: auto;">
            <div class="row">
                <div class="col-12 text-center py-2">
                {{$character->nombre}}
                </div>
            </div>
            <div class="row text-center">
                @if ($character->subrace_id != '')
                <div class="col-4">{{$background->nombre}}</div>
                <div class="col-4">{{$race->nombre}}</div>
                <div class="col-4">{{$subrace->nombre}}</div>
                @else
                <div class="col-6">{{$background->nombre}}</div>
                <div class="col-6">{{$background->nombre}}</div>
                @endif
            </div>
            </div>
        </div>

        <div class="col-12 col-md-2 mb-3">
            <div class="card text-center py-3">
            <div>CA</div>
            <div>{{$character->CA}}</div>
            </div>
        </div>

        <div class="col-12 col-md-5 mb-3">
            <div class="card p-3">
            <div class="row">
                <div class="col-12 text-center mb-2">Puntos de Vida</div>
                <div class="col-6 text-center">
                <div>Actuales:</div>
                <div id="vida">{{$character->vida}}</div>
                </div>
                <div class="col-6 text-center">
                <div>Temporales: <span id="temporales">{{$character->vidaTemp}}</span></div>
                <div>Maximos: {{$character->vidaMax}}</div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                <button class="btn btn-success w-100" id="masVida">+</button>
                </div>
                <div class="col-6">
                <button class="btn btn-danger w-100" id="menosVida">-</button>
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

    <br>

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
                    @if (Auth::check())
                        @if (Auth::user()->id==$character->user_id)
                            <div class="card">
                                <a href="{{ route('characters.addClase', $character->id) }}" class="btn btn-primary card-body">Añadir clase</a>
                            </div>
                        @endif
                    @endif
                    @foreach ($character->clases as $clase)
                        <div class="card">

                            @if (Auth::check())
                                @if (Auth::user()->id==$character->user_id)
                                    <div class="card-title d-flex align-items-center gap-2">
                                        <h6 class="mb-0">{{ $clase->nombre }}</h6>
                                        <a href="{{ route('characters.modClaseLVL', ['character_id'=>$character->id, 'clase_id'=>$clase->id]) }}" class="btn btn-sm btn-primary py-0">
                                            Editar nivel de clase
                                        </a>
                                    </div>
                                @else
                                    <div class="card-title"><h6>{{$clase->nombre}}</h6></div>
                                @endif
                            @else
                                <div class="card-title"><h6>{{$clase->nombre}}</h6></div>
                            @endif
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
                                            <div class="col-md-3">{{$item->nombre}}</div>

                                            <div class="col-md-3">de 1 a {{$item->weapon->daño}}</div>

                                            <div class="col-md-3">{{$item->weapon->tipoDaño}}</div>

                                            <div class="col-md-3"><button id="arma.{{$item->weapon->id}}">Tirar ataque</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endif
                    @endforeach
                    <div class="card">
                        <div class="card-body" id="competencias">
                            <div class="row row-cols-2 row-cols-lg-3 g-3">
                            <div class="col competencia" ><span id="compArmaSimple"></span></div>
                            <div class="col competencia" ><span id="compArmaMarcial"></span></div>
                            <div class="col competencia" ><span id="compArmaduraLigera"></span></div>
                            <div class="col competencia" ><span id="compArmaduraMedia"></span></div>
                            <div class="col competencia" ><span id="compArmaduraPesada"></span></div>
                            <div class="col competencia" ><span id="compEscudo"></span></div>
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
                                    <h6 clas="card-title">{{$ability->nombre}}</h6>
                                    <div class="col-12">{{$ability->descripcion}}</div>
                                    <div class="row">
                                        <div class="col-6">Coste de habilidad: {{$ability->coste}}</div>
                                        <div class="col-6">{{$ability->reuseTime}}</div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        @endforeach

                        @foreach ($subrace->abilities as $ability)
                            <div class="col-12">
                                <div class="card">
                                    <h6 clas="card-title">{{$ability->nombre}}</h6>
                                    <div class="col-12">{{$ability->descripcion}}</div>
                                    <div class="row">
                                        <div class="col-6">Coste de habilidad: {{$ability->coste}}</div>
                                        <div class="col-6">{{$ability->reuseTime}}</div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        @endforeach
                        @foreach ($character->clases as $clase)
                            @foreach ($clase->abilities as $ability)
                                @if ($clase->pivot->lvl>=$ability->pivot->lvl)
                                    <div class="col-12">
                                        <div class="card">
                                            <h6 clas="card-title">{{$ability->nombre}}</h6>
                                            <div class="col-12">{{$ability->descripcion}}</div>
                                            <div class="row">
                                                <div class="col-6">Coste de habilidad: {{$ability->coste}}</div>
                                                <div class="col-6">{{$ability->reuseTime}}</div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                @endif
                            @endforeach
                            @foreach ($clase->subclases as $subclase)
                                    @if ($subclase->id==$clase->pivot->sub_clase_id)
                                        @foreach ($subclase->abilities as $ability)
                                            @if ($clase->pivot->lvl>=$ability->pivot->lvl)
                                                <div class="col-12">
                                                    <div class="card">
                                                        <h6 clas="card-title">{{$ability->nombre}}</h6>
                                                        <div class="col-12">{{$ability->descripcion}}</div>
                                                        <div class="row">
                                                            <div class="col-6">Coste de habilidad: {{$ability->coste}}</div>
                                                            <div class="col-6">{{$ability->reuseTime}}</div>
                                                        </div>
                                                    </div>
                                                    <br>
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
                        <br>
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
                                <a href="{{route('items.modCantidad', ['character_id'=>$character->id, 'item_id'=>$item->id])}}" class="btn enlaceBTN">Editar cantidad</a>
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
        <div class="card">
            <div class="card-body">
            <div class="row g-3">

                <div class="col-md-12">
                <h6 class="card-title">Historia del personaje</h6>
                <div class="border p-4 text-center">
                    {{$character->historiaPersonaje}}
                </div>
                </div>

                <div class="col-md-6">
                <h6 class="card-title">Rasgos del personaje</h6>
                <div class="border p-4 text-center">
                    {{$character->rasfosPersonaje}}
                </div>
                </div>

                <div class="col-md-6">
                <h6 class="card-title">Ideales del Personaje</h6>
                <div class="border p-4 text-center">
                    {{$character->idealesPersonaje}}
                </div>
                </div>

                <div class="col-md-6">
                <h6 class="card-title">Vinculos del personaje</h6>
                <div class="border p-4 text-center">
                    {{$character->vinculosPersonaje}}
                </div>
                </div>

                <div class="col-md-6">
                <h6 class="card-title">Defectos/manias del personaje</h6>
                <div class="border p-4 text-center">
                    {{$character->defectosPersonaje}}
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

    <br>
</div>
<div style="opacity: 0" id="modCompMax"></div>

@endsection('body')

@section('scrips')
<script>
    console.log('inicio js');

    const maxModComp = @json($maxModComp);
    console.log('clases');
    const clases = @json($clases);
    console.log(clases);

    const character=@json($characterJS);
    console.log('1');
    const weapons=@json($weapons);


    console.log('2');

    document.addEventListener('DOMContentLoaded', function() {
    const btnFUE=document.getElementById('purFUE')
    console.log('btnFUE:', btnFUE);
    const btnDES=document.getElementById('purDES')
    const btnCON=document.getElementById('purCON')
    const btnINT=document.getElementById('purINT')
    const btnSAB=document.getElementById('purSAB')
    const btnCAR=document.getElementById('purCAR')
    const btnsalvFUE=document.getElementById('salvFUE')
    const btnsalvDES=document.getElementById('salvDES')
    const btnsalvCON=document.getElementById('salvCON')
    const btnsalvINT=document.getElementById('salvINT')
    const btnsalvSAB=document.getElementById('salvSAB')
    const btnsalvCAR=document.getElementById('salvCAR')

    const btnAtlet=document.getElementById('btnAtlet')
    const btn2Atlet=document.getElementById('btn2Atlet')

    const btnAcro=document.getElementById('btnAcro')
    const btn2Acro=document.getElementById('btn2Acro')

    const btnJuegManos=document.getElementById('btnJuegManos')
    const btn2JuegManos=document.getElementById('btn2JuegManos')

    const btnSig=document.getElementById('btnSig')
    const btn2Sig=document.getElementById('btn2Sig')

    const btnCArc=document.getElementById('btnCArc')
    const btn2CArc=document.getElementById('btn2CArc')

    const btnHis=document.getElementById('btnHis')
    const btn2His=document.getElementById('btn2His')

    const btnInv=document.getElementById('btnInv')
    const btn2Inv=document.getElementById('btn2Inv')

    const btnNat=document.getElementById('btnNat')
    const btn2Nat=document.getElementById('btn2Nat')

    const btnRel=document.getElementById('btnRel')
    const btn2Rel=document.getElementById('btn2Rel')

    const btnTAnim=document.getElementById('btnTAnim')
    const btn2TAnim=document.getElementById('btn2TAnim')

    const btnMed=document.getElementById('btnMed')
    const btn2Med=document.getElementById('btn2Med')

    const btnPerce=document.getElementById('btnPerce')
    const btn2Perce=document.getElementById('btn2Perce')

    const btnPerspi=document.getElementById('btnPerspi')
    const btn2Perspi=document.getElementById('btn2Perspi')

    const btnSuperv=document.getElementById('btnSuperv')
    const btn2Superv=document.getElementById('btn2Superv')

    const btnEng=document.getElementById('btnEng')
    const btn2Eng=document.getElementById('btn2Eng')

    const btnInter=document.getElementById('btnInter')
    const btn2Inter=document.getElementById('btn2Inter')

    const btnIntim=document.getElementById('btnIntim')
    const btn2Intim=document.getElementById('btn2Intim')

    const btnPersu=document.getElementById('btnPersu')
    const btn2Persu=document.getElementById('btn2Persu')


    const dado4=document.getElementById('d4')
    const dado6=document.getElementById('d6')
    const dado8=document.getElementById('d8')
    const dado10=document.getElementById('d10')
    const dado12=document.getElementById('d12')
    const dado20=document.getElementById('d20')


    const divCompArmaSiple=document.getElementById('compArmaSimple')
    const divCompArmaMarcial=document.getElementById('compArmaMarcial')
    const divCompArmaduraLigera=document.getElementById('compArmaduraLigera')
    const divCompArmaduraMedia=document.getElementById('compArmaduraMedia')
    const divCompArmaduraPesada=document.getElementById('compArmaduraPesada')
    const divCompEscudo=document.getElementById('compEscudo')


    console.log('antes de la funcion')

    function tirarDado(lados) {
        return Math.floor(Math.random() * lados) + 1
    }

    btnFUE.onclick = function () {
        let result=tirarDado((20))
        alert(result, '+' , character.ModFUE, '=',result+character.ModFUE)
    }

    btnDES.onclick = function () {
        let result=tirarDado((20))
        alert(result, '+' , character.ModDES, '=',result+character.ModDES)
    }

    btnCON.onclick = function () {
        let result=tirarDado((20))
        alert(result, '+' , character.ModCON, '=',result+character.ModCON)
    }

    btnINT.onclick = function () {
        let result=tirarDado((20))
        alert(result, '+' , character.ModINT, '=',result+character.ModINT)
    }

    btnSAB.onclick = function () {
        let result=tirarDado((20))
        alert(result, '+' , character.ModSAB, '=',result+character.ModSAB)
    }

    btnCAR.onclick = function () {
        let result=tirarDado((20))
        alert(result, '+' , character.ModCAR, '=',result+character.ModCAR)
    }

    btnsalvFUE.onclick = function () {
        let result=tirarDado((20))
        if (character.SalvFUE == 1) {
            alert(`${result}+${character.ModFUE}+${maxModComp}=${result+character.ModFUE+maxModComp}`);
        } else {
            alert(`${result}+${character.ModFUE}=${result+character.ModFUE}`);
        }
    }

    btnsalvDES.onclick = function () {
        let result=tirarDado((20))
        if (character.SalvDES == 1) {
            alert(`${result}+${character.ModDES}+${maxModComp}=${result+character.ModDES+maxModComp}`);
        } else {
            alert(`${result}+${character.ModDES}=${result+character.ModDES}`);
        }
    }

    btnsalvCON.onclick = function () {
        let result=tirarDado((20))
        if (character.SalvCON == 1) {
            alert(`${result}+${character.ModCON}+${maxModComp}=${result+character.ModCON+maxModComp}`);
        } else {
            alert(`${result}+${character.ModCON}=${result+character.ModCON}`);
        }
    }

    btnsalvINT.onclick = function () {
        let result=tirarDado((20))
        if (character.SalvINT == 1) {
            alert(`${result}+${character.ModINT}+${maxModComp}=${result+character.ModINT+maxModComp}`);
        } else {
            alert(`${result}+${character.ModINT}=${result+character.ModINT}`);
        }
    }

    btnsalvSAB.onclick = function () {
        let result=tirarDado((20))
        if (character.SalvSAB == 1) {
            alert(`${result}+${character.ModSAB}+${maxModComp}=${result+character.ModSAB+maxModComp}`);
        } else {
            alert(`${result}+${character.ModSAB}=${result+character.ModSAB}`);
        }
    }

    btnsalvCAR.onclick = function () {
        let result=tirarDado((20))
        if (character.SalvCAR == 1) {
            alert(`${result}+${character.ModCAR}+${maxModComp}=${result+character.ModCAR+maxModComp}`);
        } else {
            alert(`${result}+${character.ModCAR}=${result+character.ModCAR}`);
        }
    }

    btnAtlet.onclick = function () {
        let result=tirarDado((20))
        if (character.CompAtletismo == 1) {
            alert(`${result}+${character.ModFUE}+${maxModComp}=${result+character.ModFUE+maxModComp}`);
        } else {
            alert(`${result}+${character.ModFUE}=${result+character.ModFUE}`);
        }
    }

    btn2Atlet.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompAtletismo == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModFUE} + ${maxModComp} = ${ventaja + character.ModFUE + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModFUE} + ${maxModComp} = ${desventaja + character.ModFUE + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModFUE} = ${ventaja + character.ModFUE}\n` +
                `Con desventaja: ${desventaja} + ${character.ModFUE} = ${desventaja + character.ModFUE}`
            );
        }
    }

    btnAcro.onclick = function () {
        let result=tirarDado((20))
        if (character.CompAcrobacias == 1) {
            alert(`${result}+${character.ModDES}+${maxModComp}=${result+character.ModDES+maxModComp}`);
        } else {
            alert(`${result}+${character.ModDES}=${result+character.ModDES}`);
        }
    }

    btn2Acro.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompAcrobacias == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModDES} + ${maxModComp} = ${ventaja + character.ModDES + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModDES} + ${maxModComp} = ${desventaja + character.ModDES + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModDES} = ${ventaja + character.ModDES}\n` +
                `Con desventaja: ${desventaja} + ${character.ModDES} = ${desventaja + character.ModDES}`
            );
        }
    }

    btnJuegManos.onclick = function () {
        let result=tirarDado((20))
        if (character.CompJuegoManos == 1) {
            alert(`${result}+${character.ModDES}+${maxModComp}=${result+character.ModDES+maxModComp}`);
        } else {
            alert(`${result}+${character.ModDES}=${result+character.ModDES}`);
        }
    }

    btn2JuegManos.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompJuegoManos == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModDES} + ${maxModComp} = ${ventaja + character.ModDES + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModDES} + ${maxModComp} = ${desventaja + character.ModDES + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModDES} = ${ventaja + character.ModDES}\n` +
                `Con desventaja: ${desventaja} + ${character.ModDES} = ${desventaja + character.ModDES}`
            );
        }
    }

    btnSig.onclick = function () {
        let result=tirarDado((20))
        if (character.CompSigilo == 1) {
            alert(`${result}+${character.ModDES}+${maxModComp}=${result+character.ModDES+maxModComp}`);
        } else {
            alert(`${result}+${character.ModDES}=${result+character.ModDES}`);
        }
    }

    btn2Sig.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompSigilo == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModDES} + ${maxModComp} = ${ventaja + character.ModDES + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModDES} + ${maxModComp} = ${desventaja + character.ModDES + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModDES} = ${ventaja + character.ModDES}\n` +
                `Con desventaja: ${desventaja} + ${character.ModDES} = ${desventaja + character.ModDES}`
            );
        }
    }

    btnCArc.onclick = function () {
        let result=tirarDado((20))
        if (character.CompConocimArcano == 1) {
            alert(`${result}+${character.ModINT}+${maxModComp}=${result+character.ModINT+maxModComp}`);
        } else {
            alert(`${result}+${character.ModINT}=${result+character.ModINT}`);
        }
    }

    btn2CArc.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompConocimArcano == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModINT} + ${maxModComp} = ${ventaja + character.ModINT + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModINT} + ${maxModComp} = ${desventaja + character.ModINT + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModINT} = ${ventaja + character.ModINT}\n` +
                `Con desventaja: ${desventaja} + ${character.ModINT} = ${desventaja + character.ModINT}`
            );
        }
    }

    btnHis.onclick = function () {
        let result=tirarDado((20))
        if (character.CompHistoria == 1) {
            alert(`${result}+${character.ModINT}+${maxModComp}=${result+character.ModINT+maxModComp}`);
        } else {
            alert(`${result}+${character.ModINT}=${result+character.ModINT}`);
        }
    }

    btn2His.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompHistoria == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModINT} + ${maxModComp} = ${ventaja + character.ModINT + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModINT} + ${maxModComp} = ${desventaja + character.ModINT + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModINT} = ${ventaja + character.ModINT}\n` +
                `Con desventaja: ${desventaja} + ${character.ModINT} = ${desventaja + character.ModINT}`
            );
        }
    }

    btnInv.onclick = function () {
        let result=tirarDado((20))
        if (character.CompInvestigacion == 1) {
            alert(`${result}+${character.ModINT}+${maxModComp}=${result+character.ModINT+maxModComp}`);
        } else {
            alert(`${result}+${character.ModINT}=${result+character.ModINT}`);
        }
    }

    btn2Inv.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompInvestigacion == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModINT} + ${maxModComp} = ${ventaja + character.ModINT + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModINT} + ${maxModComp} = ${desventaja + character.ModINT + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModINT} = ${ventaja + character.ModINT}\n` +
                `Con desventaja: ${desventaja} + ${character.ModINT} = ${desventaja + character.ModINT}`
            );
        }
    }

    btnNat.onclick = function () {
        let result=tirarDado((20))
        if (character.CompNaturaleza == 1) {
            alert(`${result}+${character.ModINT}+${maxModComp}=${result+character.ModINT+maxModComp}`);
        } else {
            alert(`${result}+${character.ModINT}=${result+character.ModINT}`);
        }
    }

    btn2Nat.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompNaturaleza == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModINT} + ${maxModComp} = ${ventaja + character.ModINT + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModINT} + ${maxModComp} = ${desventaja + character.ModINT + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModINT} = ${ventaja + character.ModINT}\n` +
                `Con desventaja: ${desventaja} + ${character.ModINT} = ${desventaja + character.ModINT}`
            );
        }
    }

    btnRel.onclick = function () {
        let result=tirarDado((20))
        if (character.CompReligion == 1) {
            alert(`${result}+${character.ModINT}+${maxModComp}=${result+character.ModINT+maxModComp}`);
        } else {
            alert(`${result}+${character.ModINT}=${result+character.ModINT}`);
        }
    }

    btn2Rel.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompReligion == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModINT} + ${maxModComp} = ${ventaja + character.ModINT + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModINT} + ${maxModComp} = ${desventaja + character.ModINT + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModINT} = ${ventaja + character.ModINT}\n` +
                `Con desventaja: ${desventaja} + ${character.ModINT} = ${desventaja + character.ModINT}`
            );
        }
    }

    btnTAnim.onclick = function () {
        let result=tirarDado((20))
        if (character.CompTratoAnimales == 1) {
            alert(`${result}+${character.ModSAB}+${maxModComp}=${result+character.ModSAB+maxModComp}`);
        } else {
            alert(`${result}+${character.ModSAB}=${result+character.ModSAB}`);
        }
    }

    btn2TAnim.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompTratoAnimales == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModSAB} + ${maxModComp} = ${ventaja + character.ModSAB + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModSAB} + ${maxModComp} = ${desventaja + character.ModSAB + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModSAB} = ${ventaja + character.ModSAB}\n` +
                `Con desventaja: ${desventaja} + ${character.ModSAB} = ${desventaja + character.ModSAB}`
            );
        }
    }

    btnMed.onclick = function () {
        let result=tirarDado((20))
        if (character.CompMedicina == 1) {
            alert(`${result}+${character.ModSAB}+${maxModComp}=${result+character.ModSAB+maxModComp}`);
        } else {
            alert(`${result}+${character.ModSAB}=${result+character.ModSAB}`);
        }
    }

    btn2Med.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompMedicina == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModSAB} + ${maxModComp} = ${ventaja + character.ModSAB + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModSAB} + ${maxModComp} = ${desventaja + character.ModSAB + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModSAB} = ${ventaja + character.ModSAB}\n` +
                `Con desventaja: ${desventaja} + ${character.ModSAB} = ${desventaja + character.ModSAB}`
            );
        }
    }

    btnPerce.onclick = function () {
        let result=tirarDado((20))
        if (character.CompPercepcion == 1) {
            alert(`${result}+${character.ModSAB}+${maxModComp}=${result+character.ModSAB+maxModComp}`);
        } else {
            alert(`${result}+${character.ModSAB}=${result+character.ModSAB}`);
        }
    }

    btn2Perce.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompPercepcion == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModSAB} + ${maxModComp} = ${ventaja + character.ModSAB + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModSAB} + ${maxModComp} = ${desventaja + character.ModSAB + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModSAB} = ${ventaja + character.ModSAB}\n` +
                `Con desventaja: ${desventaja} + ${character.ModSAB} = ${desventaja + character.ModSAB}`
            );
        }
    }

    btnPerspi.onclick = function () {
        let result=tirarDado((20))
        if (character.CompPerspicacia == 1) {
            alert(`${result}+${character.ModSAB}+${maxModComp}=${result+character.ModSAB+maxModComp}`);
        } else {
            alert(`${result}+${character.ModSAB}=${result+character.ModSAB}`);
        }
    }

    btn2Perspi.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompPerspicacia == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModSAB} + ${maxModComp} = ${ventaja + character.ModSAB + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModSAB} + ${maxModComp} = ${desventaja + character.ModSAB + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModSAB} = ${ventaja + character.ModSAB}\n` +
                `Con desventaja: ${desventaja} + ${character.ModSAB} = ${desventaja + character.ModSAB}`
            );
        }
    }

    btnSuperv.onclick = function () {
        let result=tirarDado((20))
        if (character.CompSupervivencia == 1) {
            alert(`${result}+${character.ModSAB}+${maxModComp}=${result+character.ModSAB+maxModComp}`);
        } else {
            alert(`${result}+${character.ModSAB}=${result+character.ModSAB}`);
        }
    }

    btn2Superv.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompSupervivencia== 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModSAB} + ${maxModComp} = ${ventaja + character.ModSAB + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModSAB} + ${maxModComp} = ${desventaja + character.ModSAB + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModSAB} = ${ventaja + character.ModSAB}\n` +
                `Con desventaja: ${desventaja} + ${character.ModSAB} = ${desventaja + character.ModSAB}`
            );
        }
    }

    btnEng.onclick = function () {
        let result=tirarDado((20))
        if (character.CompEngaño == 1) {
            alert(`${result}+${character.ModCAR}+${maxModComp}=${result+character.ModCAR+maxModComp}`);
        } else {
            alert(`${result}+${character.ModCAR}=${result+character.ModCAR}`);
        }
    }

    btn2Eng.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompEngaño == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModCAR} + ${maxModComp} = ${ventaja + character.ModCAR + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModCAR} + ${maxModComp} = ${desventaja + character.ModCAR + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModCAR} = ${ventaja + character.ModCAR}\n` +
                `Con desventaja: ${desventaja} + ${character.ModCAR} = ${desventaja + character.ModCAR}`
            );
        }
    }

    btnInter.onclick = function () {
        let result=tirarDado((20))
        if (character.CompInterpretacion == 1) {
            alert(`${result}+${character.ModCAR}+${maxModComp}=${result+character.ModCAR+maxModComp}`);
        } else {
            alert(`${result}+${character.ModCAR}=${result+character.ModCAR}`);
        }
    }

    btn2Inter.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompInterpretacion== 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModCAR} + ${maxModComp} = ${ventaja + character.ModCAR + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModCAR} + ${maxModComp} = ${desventaja + character.ModCAR + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModCAR} = ${ventaja + character.ModCAR}\n` +
                `Con desventaja: ${desventaja} + ${character.ModCAR} = ${desventaja + character.ModCAR}`
            );
        }
    }

    btnIntim.onclick = function () {
        let result=tirarDado((20))
        if (character.CompIntimidacion== 1) {
            alert(`${result}+${character.ModCAR}+${maxModComp}=${result+character.ModCAR+maxModComp}`);
        } else {
            alert(`${result}+${character.ModCAR}=${result+character.ModCAR}`);
        }
    }

    btn2Intim.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompIntimidacion== 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModCAR} + ${maxModComp} = ${ventaja + character.ModCAR + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModCAR} + ${maxModComp} = ${desventaja + character.ModCAR + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModCAR} = ${ventaja + character.ModCAR}\n` +
                `Con desventaja: ${desventaja} + ${character.ModCAR} = ${desventaja + character.ModCAR}`
            );
        }
    }

    btnPersu.onclick = function () {
        let result=tirarDado((20))
        if (character.CompPersuasion == 1) {
            alert(`${result}+${character.ModCAR}+${maxModComp}=${result+character.ModCAR+maxModComp}`);
        } else {
            alert(`${result}+${character.ModCAR}=${result+character.ModCAR}`);
        }
    }

    btn2Persu.onclick = function () {
        let result1=tirarDado((20))
        let result2=tirarDado((20))
        let ventaja
        let desventaja
        if(result1>=result2){
            ventaja=result1
            desventaja=result2
        }else{
            ventaja=result2
            desventaja=result1
        }
        if (character.CompPersuasion == 1) {
            alert(
            `Con ventaja: ${ventaja} + ${character.ModCAR} + ${maxModComp} = ${ventaja + character.ModCAR + maxModComp}\n` +
            `Con desventaja: ${desventaja} + ${character.ModCAR} + ${maxModComp} = ${desventaja + character.ModCAR + maxModComp}`
        );
        } else {
            alert(
                `Con ventaja: ${ventaja} + ${character.ModCAR} = ${ventaja + character.ModCAR}\n` +
                `Con desventaja: ${desventaja} + ${character.ModCAR} = ${desventaja + character.ModCAR}`
            );
        }
    }

    dado4.onclick = function () {
        alert('d4: ' + tirarDado(4))
    }

    dado6.onclick = function () {
        alert('d6: ' + tirarDado(6))
    }

    dado8.onclick = function () {
        alert('d8: ' + tirarDado(8))
    }

    dado10.onclick = function () {
        alert('d10: ' + tirarDado(10))
    }

    dado12.onclick = function () {
        alert('d12: ' + tirarDado(12))
    }

    dado20.onclick = function () {
        alert('d20: ' + tirarDado(20))
    }
    console.log('armas')

    weapons.forEach(arma=>{
        arma.buttonId ='arma.'+arma.id
    })

    weapons.forEach(arma=>{
        const boton=document.getElementById(arma.buttonId)
        if (boton) {
            boton.onclick=function () {
                let result=tirarDado(arma.daño)
                let mod=0
                if (arma.propSut==1) {
                    if(character.ModFUE >= character.ModDES){
                        mod=character.ModFUE
                    }else{
                        mod=character.ModDES
                    }
                }
                alert(`${result} + ${mod} = ${result + mod }`)
            }
        }
    })


    console.log(vida);

    const vidaDiv=document.getElementById('vida')
    const vidaTempDiv=document.getElementById('temporales')
    const btnMas=document.getElementById('masVida')
    const btnMenos=document.getElementById('menosVida')

    let vidaActual = vidaDiv.textContent
    let vidaTemp = character.vidaTemp || 0
    const vidaMax = vidaDiv.textContent
    const vidaMin = 0

    function actualizarTemporales() {
        vidaTempDiv.textContent = vidaTemp
    }

    btnMas.addEventListener('click', () => {
        if(vidaActual<vidaMax){
            vidaActual++
            vidaDiv.textContent=vidaActual
        }else{
            vidaTemp++
            actualizarTemporales()
        }
    });

    btnMenos.addEventListener('click', () => {
        if(vidaTemp>0){
            vidaTemp--
            actualizarTemporales()
        }else if(vidaActual>vidaMin){
            vidaActual--
            vidaDiv.textContent=vidaActual
        }

    })

    console.log('AAAAAAAAAAAAAAAAAAAAAAAAAAAAA')

    clases.forEach(clase=>{
        if(clase.CompArmaSimple==1){
            divCompArmaSiple.innerText='Armas Simples'
        }
        if(clase.CompArmaMarcial==1){
            divCompArmaMarcial.innerText='Armas Marciales'
        }
        if(clase.CompArmaduraLig==1){
            divCompArmaduraLigera.innerText='Armaduras Ligeras'
        }
        if(clase.CompArmaduraMed==1){
            divCompArmaduraMedia.innerText='Armaduras Medias'
        }
        if(clase.CompArmaduraPes==1){
            divCompArmaduraPesada.innerText='Armaduras Pesadas'
        }
        if(clase.CompEscudo==1){
            divCompEscudo.innerText='Escudos'
        }
    })

    console.log('fin');
})

</script>
