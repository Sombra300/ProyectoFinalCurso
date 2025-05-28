@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
<form action="{{route('backgrounds.store')}}" method="post">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}">
    <br>
    <label for="descripcion">Descripcion</label>
    <input type="text" id="descripcion" name="descripcion" value="{{old('descripcion')}}">
    <br>
    <input type="checkbox" id="CompArmaSimple" name="CompArmaSimple" value="1" {{ old('CompArmaSimple') ? 'checked' : '' }}>
    <label for="CompArmaSimple">Competencia con armas simples</label>
    <br>

    <input type="checkbox" id="CompArmaMarcial" name="CompArmaMarcial" value="1" {{ old('CompArmaMarcial') ? 'checked' : '' }}>
    <label for="CompArmaMarcial">Competencia con armas marciales</label>
    <br>

    <input type="checkbox" id="CompArmaduraLig" name="CompArmaduraLig" value="1" {{ old('CompArmaduraLig') ? 'checked' : '' }}>
    <label for="CompArmaduraLig">Competencia con armaduras ligeras</label>
    <br>

    <input type="checkbox" id="CompArmaduraMed" name="CompArmaduraMed" value="1" {{ old('CompArmaduraMed') ? 'checked' : '' }}>
    <label for="CompArmaduraMed">Competencia con armaduras medias</label>
    <br>

    <input type="checkbox" id="CompArmaduraPes" name="CompArmaduraPes" value="1" {{ old('CompArmaduraPes') ? 'checked' : '' }}>
    <label for="CompArmaduraPes">Competencia con armaduras pesadas</label>
    <br>

    <input type="checkbox" id="CompEscudo" name="CompEscudo" value="1" {{ old('CompEscudo') ? 'checked' : '' }}>
    <label for="CompEscudo">Competencia con escudos</label>
    <br>

    <label for="lenguage_id">Idioma conocido</label>
    <select name="lenguage_id" id="lenguage_id">
        <option value="null" {{ old('lenguage_id') == 'null' ? 'selected' : '' }}>Ninguno</option>
        @foreach ($lenguages as $lenguage)
            <option value="{{ $lenguage->id }}" {{ old('lenguage_id') == $lenguage->id ? 'selected' : '' }}>
                {{ $lenguage->nombre }}
            </option>
        @endforeach
    </select>
    <br>
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
