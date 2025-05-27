@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{route('clases.store')}}" method="post">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
    <br>

    <label for="descripcion">Descripción</label>
    <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion') }}">
    <br>

    <label for="dadoGolpe">Valor de los dados de golpe</label>
    <input type="number" id="dadoGolpe" name="dadoGolpe" value="{{ old('dadoGolpe') }}">
    <br>

    <label for="lvlSubClase">Nivel en el que se obtiene la subclase</label>
    <input type="number" id="lvlSubClase" name="lvlSubClase" value="{{ old('lvlSubClase') }}">
    <br>

    <input type="checkbox" name="CompArmaSimple" value="1" {{ old('CompArmaSimple') ? 'checked' : '' }}>
    <label>Competencia con arma simple</label>
    <br>

    <input type="checkbox" name="CompArmaMarcial" value="1" {{ old('CompArmaMarcial') ? 'checked' : '' }}>
    <label>Competencia con arma marcial</label>
    <br>

    <input type="checkbox" name="CompArmaduraLig" value="1" {{ old('CompArmaduraLig') ? 'checked' : '' }}>
    <label>Competencia con armadura ligera</label>
    <br>

    <input type="checkbox" name="CompArmaduraMed" value="1" {{ old('CompArmaduraMed') ? 'checked' : '' }}>
    <label>Competencia con armadura media</label>
    <br>

    <input type="checkbox" name="CompArmaduraPes" value="1" {{ old('CompArmaduraPes') ? 'checked' : '' }}>
    <label>Competencia con armadura pesada</label>
    <br>

    <input type="checkbox" name="CompEscudo" value="1" {{ old('CompEscudo') ? 'checked' : '' }}>
    <label>Competencia con escudo</label>
    <br>

    <input type="submit" value="Guardar">
</form>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

@endsection('body')
