@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
<form action="{{route('backgrounds.store')}}" method="post">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre">
    <br>
    <label for="descripcion">Descripcion</label>
    <input type="text" id="descripcion" name="descripcion">
    <br>
    <input type="checkbox" id="CompArmaSimple" name="CompArmaSimple" value="1">
    <label for="CompArmaSimple">Competencia con armas simples</label>
    <br>
    <input type="checkbox" id="CompArmaMarcial" name="CompArmaMarcial" value="1">
    <label for="CompArmaMarcial">Competencia con armas marciales</label>
    <br>
    <input type="checkbox" id="CompArmaduraLig" name="CompArmaduraLig" value="1">
    <label for="CompArmaduraLig">Competencia con armaduras ligeras</label>
    <br>
    <input type="checkbox" id="CompArmaduraMed" name="CompArmaduraMed" value="1">
    <label for="CompArmaduramed">Competencia con armaduras medias</label>
    <br>
    <input type="checkbox" id="CompArmaduraPes" name="CompArmaduraPes" value="1">
    <label for="CompArmaduraPes">Competencia con armaduras pesadas</label>
    <br>
    <input type="checkbox" id="CompEscudo" name="CompEscudo" value="1">
    <label for="CompEscudo">Competencia con escudos</label>
    <br>
    <label for="lenguage_id">Idioma conocido</label>
    <select name="lenguage_id" id="lenguage_id">
        <option value="">Ninguno</option>
        @foreach ($lenguages as $lenguage)
            <option value="{{$lenguage->id}}">{{$lenguage->nombre}}</option>
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
