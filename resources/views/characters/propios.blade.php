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
                <div class="card">
                    <h6 class="card-title">{{$character->nombre}}</h6>
                    <div class="card-body">
                        {{$character->race->nombre}}
                        @foreach ($character->clases as $clase)
                            &nbsp;{{$clase->nombre}}
                        @endforeach
                    </div>
                </div>
            </div>
        @empty

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

