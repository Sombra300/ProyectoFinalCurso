@extends('partials.layout')
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
    </div>
@empty

@endforelse

@endsection('body')
