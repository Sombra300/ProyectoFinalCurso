@extends('partials.layoutADMIN')
@section('titulo')
Habilidades
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

@forelse ($abilities as $ability)
    <div class="container">
        {{$ability->nombre}}
        @if ($ability->descripcion!="")
            <div class="">{{$ability->descripcion}}</div>
        @else
        @endif
        <div class="">Coste de habilidad: {{$ability->coste}}</div>
        <div class="">{{$ability->reuseTime}}</div>
        <form action="{{ route('abilities.linkAbilities', ['type' => $type, 'external_id' => $id, 'ability_id' => $ability->id]) }}" method="POST">
            @csrf
            <button type="submit">Añadir habilidad</button>
        </form>
    </div>
@empty
<h1>No hay habilidades para añadir</h1>
@if (Auth::check())
    @if(Auth::user()->rol=='admin')
        <a href="{{ route('abilities.create') }}" class="btn btn-secondary">Crear habilidad</a>
    @endif
@endif
@endforelse

@endsection('body')
