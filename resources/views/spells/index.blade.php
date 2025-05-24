@extends('partials.layout')
@section('titulo')
Hechizos
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

@forelse ($spells as $spell)
        <div class="{{$spell->tipoDaño}}">
            {{$spell->nombre}}
            <div>
                @if ($spell->descripcion!="")
                @else
                    <div class="">{{$spell->descripcion}}</div>
                @endif
                @if ($spell->ataque==true)
                    <div class="ADV">El lanzador tendra que hacer una tirada de ataque al usar este hechizo</div>
                @else
                @endif
                <div class="">Espacio de conjuro requerido:{{$spell->nivel}}</div>
                <div class="">Causa: 1d{{$spell->daño}}</div>
            </div>
        </div>
    @empty
    <h1>No hay hechizos registrados</h1>
    @endforelse

@endsection('body')
