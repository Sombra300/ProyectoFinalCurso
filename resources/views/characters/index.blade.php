@extends('partials.layout')
@section('titulo')
Personajes
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container py-4">
    <div class="row g-4">
        @forelse ($characters as $character)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card position-relative p-3">
            <h6 class="card-title">{{ $character->nombre }}</h6>

            <div class="card-body">
                {{ $character->race->nombre }}
                <br>
                @foreach ($character->clases as $clase)
                    <div class="card mt-2">
                        <h6 class="card-title">{{ $clase->nombre }}</h6>
                        <span class="card-body">lvl {{ $clase->pivot->lvl }}</span>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-between mt-3 px-2">
                <a href="{{route('characters.show', $character->id)}}" class="btn btn-primary btn-sm">
                    Ver
                </a>

                @if (Auth::check())
                    <form action="{{ route('likes.like')}}" method="POST">
                        @csrf
                        <input type="hidden" name="character_id" value="{{ $character->id }}">
                        @if ($character->likes->contains(Auth::user()->id))
                            <button type="submit" class="btn btn-dark btn-sm">Quitar Like</button>
                        @else
                            <button type="submit" class="btn btn-danger btn-sm">Dar Like</button>
                        @endif
                    </form>
                @endif
            </div>
        </div>
    </div>
@empty
    <p>No hay personajes disponibles.</p>
@endforelse

@endsection('body')
