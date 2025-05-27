@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
<div class="container">
    <div class="row">
        @forelse ($clases as $clase)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$clase->nombre}}</h5>
                    <a href="{{ route('clases.show', $clase->id) }}" class="btn btn-primary">Ver detalles</a>
                    </div>
                </div>
            @empty
        <div class="col-12"><h1>No hay clases registradas</h1></div>
        @endforelse
    </div>
</div>

@endsection('body')
