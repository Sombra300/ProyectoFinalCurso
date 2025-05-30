@extends('partials.layout')
@section('titulo')
Mis personajes
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container py-4">
    <div class="row g-4">
        @forelse ($characters as $character)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card miCard position-relative p-3">
                <h6 class="card-title">{{ $character->nombre }}</h6>

                <div class="card-body">
                    {{ $character->race->nombre }}
                    <br>
                    @foreach ($character->clases as $clase)
                        <div class="card mt-2 miniCard">
                            <h6 class="card-title">{{ $clase->nombre }}</h6>
                            <span class="card-body">Nivel {{ $clase->pivot->lvl}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$clase->pivot->subclase_name}}</span>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-between mt-3 px-2">
                    <a href="{{route('characters.show', $character->id)}}" class="btn btn-primary btn-sm">Ver</a>
                    <a href="{{route('characters.edit', $character->id)}}" class="btn btn-primary btn-sm">Editar</a>
                </div>
            </div>
        </div>
    @empty
        <p>No hay personajes disponibles.</p>
    @endforelse
    <div class="col-12 col-sm-6 col-md-4">
        <div class="card position-relative">
            <div class="card-body  btn btn-primary">
                <h5 class="card-title">Crear personaje</h5>
                <a href="{{ route('characters.create') }}" class="stretched-link"></a>
            </div>
        </div>
    </div>

  </div>
</div>


@endsection('body')

