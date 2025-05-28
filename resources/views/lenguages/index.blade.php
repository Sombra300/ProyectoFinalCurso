@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container">
    <div class="row">
        @forelse ($lenguages as $lenguage)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$lenguage->nombre}}</h5>
                    @if (Auth::check())
                        @if (Auth::user()->rol=='admin')
                        <a href="{{ route('lenguages.edit', $lenguage->id) }}" class="btn btn-primary">Editar</a>
                        @endif
                    @endif
                </div>
            </div>
        @empty
            <div class="col-12"><h1>No hay lenguajes registradas</h1></div>
        @endforelse
    </div>
</div>

@endsection('body')
