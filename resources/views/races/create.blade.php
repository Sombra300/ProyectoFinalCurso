@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{ route('races.store') }}" method="post" class="container mt-4">
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="velocidad" class="form-label">Velocidad de movimiento</label>
        <input type="text" id="velocidad" name="velocidad" value="{{ old('velocidad') }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="tamaño" class="form-label">Tipo de tamaño</label>
        <select name="tamaño" id="tamaño" class="form-select">
            <option value="pequeña" {{ old('tamaño') == 'pequeña' ? 'selected' : '' }}>Pequeña</option>
            <option value="media" {{ old('tamaño') == 'media' ? 'selected' : '' }}>Media</option>
            <option value="grande" {{ old('tamaño') == 'grande' ? 'selected' : '' }}>Grande</option>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">Guardar</button>
    </div>
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
