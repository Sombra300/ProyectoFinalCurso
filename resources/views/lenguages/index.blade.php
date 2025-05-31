@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container my-4">
    <div class="row g-3">
        @forelse ($lenguages as $lenguage)
            <div class="col-md-4 col-sm-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $lenguage->nombre }}</h5>
                        @if (Auth::check() && Auth::user()->rol == 'admin')
                            <a href="{{ route('lenguages.edit', $lenguage->id) }}" class="btn btn-primary mt-2">Editar</a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <h4 class="text-muted">No hay lenguajes registrados</h4>
            </div>
        @endforelse
    </div>
</div>


@endsection('body')
