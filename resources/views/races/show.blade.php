@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<h1>{{$race->nombre}}</h1>
@if (Auth::check())
    @if(Auth::user()->rol=='admin')
        <a href="{{ route('subRaces.createID', $race->id) }}" class="btn btn-primary">Añadir subraza</a>
        <a href="{{ route('abilities.indexLink', [$race->id,'race']) }}" class="btn btn-primary">Añadir habilidad</a>
        <a href="{{ route('races.edit', $race->id) }}" class="btn btn-primary">Editar raza</a>
        <form action="{{ route('races.destroy', $race->id) }}" method="POST"  style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar raza</button>
        </form>

    @endif
@endif
@if ($race->descripcion=='')
@else
    <div>{{$race->descripcion}}</div>
@endif
<br>
<h5>Velocidad de movimiento{{$race->velocidad}}</h5>

Tamaño de la raza: {{$race->tamaño}}</br>
<div class="container">
    <div class="row">
        <div class="col-12" id="Habilidades"><h2>Habilidades de la raza</h2></div>
        @forelse ($race->abilities as $ability)
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        @if (Auth::check())
                            @if(Auth::user()->rol=='admin')
                                <div class="col-10">{{$ability->nombre}}</div>
                                <div class="col-2">
                                    <form action="{{ route('abilities.linkAbilities', ['type' => 'race', 'external_id' => $race->id, 'ability_id' => $ability->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Quitar habilidad</button>
                                    </form>
                                </div>
                                <div class="col-12">{{$ability->nombre}}</div>
                            @endif
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
            <div class="col-12"><h5>No hay habilidades asociadas para esta raza</h5></div>
        @endforelse
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12" id="Subrazas"><h2>Subrazas</h2></div>
            @forelse ($race->subRaces as $subrace)
                <div class="col-12">
                    <div class="card">
                        <div class="row">
                            @if (Auth::check())
                                @if(Auth::user()->rol=='admin')
                                    <div class="col-6">{{$subrace->nombre}}</div>
                                    <div class="col-2">
                                        <form action="{{route('subRaces.destroy', $subrace->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger" value="Eliminar">
                                        </form>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{ route('subRaces.edit', $subrace->id) }}" class="btn btn-primary">Editar subraza</a>
                                    </div>
                                    <div class="col-2">
                                        <a href="{{ route('abilities.indexLink', [$subrace->id,'subrace']) }}" class="btn btn-primary">Añadir habilidad</a>
                                    </div>
                                @else
                                    <div class="col-12">{{$subrace->nombre}}</div>
                                @endif
                            @endif
                        </div>
                        <div class="row">
                            @if ($subrace->descripcion!="")
                                <div class="col-12">{{$subrace->descripcion}}</div>
                            @endif
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        @forelse ($subrace->abilities as $ability )
                                            <div class="card">
                                                <div class="row">
                                                    @if (Auth::check())
                                                        @if(Auth::user()->rol=='admin')
                                                            <div class="col-10">{{$ability->nombre}}</div>
                                                            <div class="col-2">
                                                                <form action="{{ route('abilities.linkAbilities', ['type' => 'subrace', 'external_id' => $subrace->id, 'ability_id' => $ability->id]) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Quitar habilidad</button>
                                                            </form>
                                                        </div>
                                                        @else
                                                            <div class="col-12">{{$ability->nombre}}</div>
                                                        @endif
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
                                            esta subraza no tiene habilidades
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

@endsection('body')
