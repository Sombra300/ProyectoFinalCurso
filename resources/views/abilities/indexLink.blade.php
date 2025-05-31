@extends('partials.layoutADMIN')
@section('titulo')
Habilidades
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

@forelse ($abilities as $ability)
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">{{ $ability->nombre }}</h5>

            @if ($ability->descripcion != "")
                <p class="card-text">{{ $ability->descripcion }}</p>
            @endif

            <p class="card-text"><strong>Coste:</strong> {{ $ability->coste }}</p>
            <p class="card-text"><strong>Tiempo de reutilización:</strong> {{ $ability->reuseTime }}</p>

            <form action="{{ route('abilities.linkAbilities', ['type' => $type, 'external_id' => $id, 'ability_id' => $ability->id]) }}" method="POST" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-primary">Añadir habilidad</button>
            </form>
        </div>
    </div>
@empty
    <div class="alert alert-warning" role="alert">
        No hay habilidades para añadir.
    </div>
@endforelse

@if (Auth::check() && Auth::user()->rol == 'admin')
    <div class="mt-4">
        <a href="{{ route('abilities.create') }}" class="btn btn-secondary">Crear habilidad</a>
    </div>
@endif


@endsection('body')
