@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{ route('clases.store') }}" method="post" class="container mt-4">
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
        <label for="dadoGolpe" class="form-label">Valor de los dados de golpe</label>
        <input type="number" id="dadoGolpe" name="dadoGolpe" value="{{ old('dadoGolpe') }}" class="form-control">
    </div>

    <div class="mb-3">
        <label for="lvlSubClase" class="form-label">Nivel en el que se obtiene la subclase</label>
        <input type="number" id="lvlSubClase" name="lvlSubClase" value="{{ old('lvlSubClase') }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label d-block">Competencias</label>
        <div class="row">
            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="CompArmaSimple" id="CompArmaSimple" value="1" {{ old('CompArmaSimple') ? 'checked' : '' }}>
                    <label class="form-check-label" for="CompArmaSimple">Arma simple</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="CompArmaMarcial" id="CompArmaMarcial" value="1" {{ old('CompArmaMarcial') ? 'checked' : '' }}>
                    <label class="form-check-label" for="CompArmaMarcial">Arma marcial</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="CompArmaduraLig" id="CompArmaduraLig" value="1" {{ old('CompArmaduraLig') ? 'checked' : '' }}>
                    <label class="form-check-label" for="CompArmaduraLig">Armadura ligera</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="CompArmaduraMed" id="CompArmaduraMed" value="1" {{ old('CompArmaduraMed') ? 'checked' : '' }}>
                    <label class="form-check-label" for="CompArmaduraMed">Armadura media</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="CompArmaduraPes" id="CompArmaduraPes" value="1" {{ old('CompArmaduraPes') ? 'checked' : '' }}>
                    <label class="form-check-label" for="CompArmaduraPes">Armadura pesada</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="CompEscudo" id="CompEscudo" value="1" {{ old('CompEscudo') ? 'checked' : '' }}>
                    <label class="form-check-label" for="CompEscudo">Escudo</label>
                </div>
            </div>
        </div>
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
