@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{ route('abilities.update', $ability->id) }}" method="post" class="container mt-4">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $ability->nombre }}">
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ $ability->descripcion }}">
    </div>

    <div class="mb-3">
        <label for="coste" class="form-label">Coste</label>
        <input type="text" id="coste" name="coste" class="form-control" value="{{ $ability->coste }}">
    </div>

    <div class="mb-3">
        <label for="reuseTime" class="form-label">Tiempo de reutilización</label>
        <input type="text" id="reuseTime" name="reuseTime" class="form-control" value="{{ $ability->reuseTime }}">
    </div>

    <button type="submit" class="btn btn-primary w-100">Guardar</button>
</form>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@endsection('body')
