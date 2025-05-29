@extends('partials.layout')
@section('titulo')
Habilidades
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container">
    @forelse ($abilities as $ability)
    <div class="card">
        <div class="col-12">
            <h6 class="card-title">{{$ability->nombre}}</h6>
            <div class="card-body">
                <div>Coste de habilidad: {{$ability->coste}}</div>
                <div>{{$ability->reuseTime}}</div>
                <br> 
                <div >{{$ability->descripcion}}</div>
            </div>
        </div>
    </div>


    @empty
</div>

@endforelse

@endsection('body')
