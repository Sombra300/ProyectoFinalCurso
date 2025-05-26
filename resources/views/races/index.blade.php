@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

@forelse ($races as $race)
    <div class="">
        {{$race->nombre}}
        <div>
            <div class="">Tamaño:{{$race->tamaño}}</div>
            <div class="">Velocidad de movimiento:{{$race->velocidad}}</div>
            <div>
                <a href="{{ route('races.show', $race->id) }}" class="btn btn-primary">Ver detalles</a>
            </div>
        </div>
    </div>
@empty
@endforelse

@endsection('body')
