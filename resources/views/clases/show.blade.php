@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<h1>{{$clase->nombre}}</h1>
@if (Auth::check())
    @if(Auth::user()->rol=='admin')
        <a href="{{ route('subClases.createID', $clase->id) }}" class="btn btn-primary">Añadir subclase</a>
        <a href="{{ route('abilities.indexLink', [$clase->id,'clase']) }}" class="btn btn-primary">Añadir habilidad</a>
        <a href="{{ route('spells.indexLink', $clase->id) }}" class="btn btn-primary">Añadir hechizo</a>
        <a href="{{ route('clases.edit', $clase->id) }}" class="btn btn-primary">Editar clase</a>
        <a href="{{ route('clases.destroy', $clase->id) }}" class="btn btn-danger">Eliminar clase</a>
    @endif
@endif
@if ($clase->descripcion!='')
    <div>{{$clase->descripcion}}</div>
@endif
<br>
<h5>Caras del dado de golpe: {{$clase->dadoGolpe}}</h5>
<div class="container">
    <div class="row">
        <div class="col-6">Puntos de vida a primer nivel: {{$clase->dadoGolpe}}</div>
        <div class="col-6">Puntos de vida por nivel: {{$clase->dadoGolpe}}</div>
    </div>
</div>
<h5>Nivel al que se consigue la subclase: {{$clase->lvlSubClase}}</h5>
<h5>Competencias</h5>
<ul>
    @if ($clase->CompArmaSimple==1)
        <li>Armas simples</li>
    @endif
    @if ($clase->CompArmaMarcial==1)
        <li>Armas marciales</li>
    @endif
    @if ($clase->CompArmaduraLig==1)
        <li>Armaduras ligeras</li>
    @endif
    @if ($clase->CompArmaduraMed==1)
        <li>Armaduras medias</li>
    @endif
    @if ($clase->CompArmaduraPes==1)
        <li>Armaduras pesadas</li>
    @endif
    @if ($clase->CompEscudo==1)
        <li>Escudos</li>
    @endif
</ul>
<div class="container">
    <div class="row">
        <div class="col-12" id="Habilidades"><h2>Habilidades de la clase</h2></div>
        @forelse ($clase->abilities as $ability)
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        @if (Auth::check())
                            @if(Auth::user()->rol=='admin')
                                <div class="col-10">{{$ability->nombre}} al nivel {{$ability->pivot->lvl}}</div>
                                <div class="col-2">
                                    <div class="row">
                                        <div class="col-6">
                                            <form action="{{ route('abilities.linkAbilities', ['type' => 'clase', 'external_id' => $clase->id, 'ability_id' => $ability->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Quitar habilidad</button>
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{ route('abilities.editLVL', [$clase->id, $ability->id, 'clase']) }}" class="btn btn-primary">Editar lvl</a>
                                        </div>
                                    </div>

                                </div>
                            @else
                                <div class="col-12">{{$ability->nombre}} al nivel {{$ability->pivot->lvl}}</div>
                            @endif
                        @else
                            <div class="col-12">{{$ability->nombre}} al nivel {{$ability->pivot->lvl}}</div>
                        @endif
                        @if ($ability->descripcion!="")
                            <div class="">{{$ability->descripcion}}</div>
                        @endif
                        <div class="">Coste de habilidad: {{$ability->coste}}</div>
                        <div class="">{{$ability->reuseTime}}</div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12"><h5>No hay habilidades asociadas para esta clase</h5></div>
        @endforelse
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12" id="Subclases"><h2>Subclases</h2></div>
            @forelse ($clase->subClases as $subclase)
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            @if (Auth::check())
                                @if(Auth::user()->rol=='admin')
                                    <div class="col-6">{{$subclase->nombre}}</div>
                                    <div class="col-2">
                                        <form action="{{route('subClases.destroy', $subclase->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger" value="Eliminar">
                                        </form>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{ route('subClases.edit', $subclase->id) }}" class="btn btn-primary">Editar subclase</a>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{ route('abilities.indexLink', [$subclase->id,'subclase']) }}" class="btn btn-primary">Añadir habilidad</a>
                                    </div>
                                @else
                                    <div class="col-12">{{$subclase->nombre}}</div>
                                @endif
                            @endif
                        </div>
                        <div class="row">
                            @if ($subclase->descripcion!="")
                                <div class="col-12">{{$subclase->descripcion}}</div>
                            @endif
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        @forelse ($subclase->abilities as $ability )
                                            <div class="card">
                                                <div class="row">
                                                    @if (Auth::check())
                                                        @if(Auth::user()->rol=='admin')
                                                            <div class="col-10">{{$ability->nombre}} al nivel {{$ability->pivot->lvl}}</div>
                                                            <div class="col-2">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <form action="{{ route('abilities.linkAbilities', ['type' => 'subclase', 'external_id' => $subclase->id, 'ability_id' => $ability->id]) }}" method="POST">
                                                                            @csrf
                                                                            <button type="submit" class="btn btn-danger">Quitar habilidad</button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <a href="{{ route('abilities.editLVL', [$subclase->id, $ability->id, 'subclase']) }}" class="btn btn-primary">Editar lvl</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @else
                                                            <div class="col-12">{{$ability->nombre}} al nivel {{$ability->pivot->lvl}}</div>
                                                        @endif
                                                    @else
                                                        <div class="col-12">{{$ability->nombre}} al nivel {{$ability->pivot->lvl}}</div>
                                                    @endif
                                                </div>
                                                @if ($ability->descripcion!="")
                                                <div class="row">
                                                    <div class="col12">{{$ability->descripcion}}</div>
                                                </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-6">Coste de habilidad: {{$ability->coste}}</div>
                                                    <div class="col-6">{{$ability->reuseTime}}</div>
                                                </div>
                                            </div>
                                        @empty
                                            Esta subclase no tiene habilidades
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12"><h5>No hay subrazas de esta raza</h5></div>
            @endforelse
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12" id="hechizos"><h2>Hechizos de la clase</h2></div>
        @forelse ($clase->spells as $spell)
             <div class="card {{$spell->tipoDaño}}">
                <div class="row">
                    @if (Auth::check())
                        @if(Auth::user()->rol=='admin')
                        <div class="col-10">{{$spell->nombre}} al nivel {{$spell->pivot->lvl}}</div>
                            <div class="col-2">
                                <div class="row">
                                    <div class="col-6">
                                        <form action="{{ route('spells.linkSpells', ['external_id' => $clase->id, 'spell_id' => $spell->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Quitar hechizo</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('spells.editLVL', [$clase->id, $spell->id]) }}" class="btn btn-primary">Editar lvl</a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-12">{{$spell->nombre}} al nivel {{$spell->pivot->lvl}}</div>
                        @endif
                    @else
                        <div class="col-12">{{$spell->nombre}} al nivel {{$spell->pivot->lvl}}</div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-12">{{$spell->descripcion}}</div>
                    <div class="row">
                        <div class="col-6">Daño: 1d{{$spell->daño}}   Tipo: {{$spell->tipoDaño}}</div>
                        <div class="col-6">Nivel del hechizo: {{$spell->nivel}}</div>
                    </div>
                    @if ($spell->coste!='')
                        <div class="row">
                            <div class="col-12">Coste: {{$spell->coste}}</div>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-12"><h5>No hay hechizos asociados en esta clase</h5></div>
        @endforelse
    </div>
</div>


@endsection('body')
