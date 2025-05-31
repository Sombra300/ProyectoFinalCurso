@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($clases as $clase)
            <div class="col">
                <div class="card h-100 shadow">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">{{$clase->nombre}}</h5>
                        <a href="{{ route('clases.show', $clase->id) }}" class="btn btn-primary mt-3">Ver detalles</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center" role="alert">
                    <h5>No hay clases registradas</h5>
                </div>
            </div>
        @endforelse
    </div>
</div>


@endsection('body')
