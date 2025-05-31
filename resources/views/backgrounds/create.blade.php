@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
<form action="{{ route('backgrounds.store') }}" method="POST" class="container my-4 p-4 border rounded shadow-sm bg-light">
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control @error('nombre') is-invalid @enderror">
        @error('nombre')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" class="form-control @error('descripcion') is-invalid @enderror">
        @error('descripcion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="lenguage_id" class="form-label">Idioma conocido</label>
        <select name="lenguage_id" id="lenguage_id" class="form-select @error('lenguage_id') is-invalid @enderror">
            <option value="null" {{ old('lenguage_id') == 'null' ? 'selected' : '' }}>Ninguno</option>
            @foreach ($lenguages as $lenguage)
                <option value="{{ $lenguage->id }}" {{ old('lenguage_id') == $lenguage->id ? 'selected' : '' }}>
                    {{ $lenguage->nombre }}
                </option>
            @endforeach
        </select>
        @error('lenguage_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@if ($errors->any())
    <div class="container mt-3">
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif



@endsection('body')
