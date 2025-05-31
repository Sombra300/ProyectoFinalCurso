@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
<div class="container">
    <div class="row">
        <div class="container mt-4">
            @forelse ($races as $race)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $race->nombre }}</h5>
                        <p class="card-text mb-1"><strong>Tamaño:</strong> {{ $race->tamaño }}</p>
                        <p class="card-text mb-3"><strong>Velocidad de movimiento:</strong> {{ $race->velocidad }}</p>
                        <a href="{{ route('races.show', $race->id) }}" class="btn btn-primary w-100">Ver detalles</a>
                    </div>
                </div>
            @empty
                <div class="alert alert-info text-center mt-4">
                    No hay razas disponibles
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection('body')
