@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
<form action="{{route('events.store')}}" method="post">
    @csrf
    <label for="name">Nombre</label>
    <input type="text" id="name" name="name">
    <br>
    <label for="description">Descripcion</label>
    <input type="text" id="description" name="description">
    <br>
    <label for="cost">Coste</label>
    <input type="text" id="cost" name="cost">
    <br>
    <label for="reuseTime">Tiempo de reutilización</label>
    <input type="text" id="reuseTime" name="reuseTime">
    <br>
    <input type="checkbox" id="CompArmaSimple" name="CompArmaSimple" value="1">
    <label for="CompArmaSimple">Competencia con armas simples</label>
    <br>
    <input type="checkbox" id="CompArmaMarcial" name="CompArmaMarcial" value="1">
    <label for="CompArmaMarcial">Competencia con armas marciales</label>
    <br>
    <input type="checkbox" id="CompArmaduraLig" name="CompArmaduraLig" value="1">
    <label for="CompArmaduraSimp">Competencia con armaduras ligeras</label>
    <br>
    <input type="checkbox" id="CompArmaduraMed" name="CompArmaduraMed" value="1">
    <label for="CompArmaduraLig">Competencia con armaduras ligeras</label>
    <br>
    <input type="checkbox" id="CompArmaduraPes" name="CompArmaduraPes" value="1">
    <label for="CompArmaduraPes">Competencia con armaduras pesadas</label>
    <br>
    <input type="checkbox" id="CompEscudo" name="CompEscudo" value="1">
    <label for="CompEscudo">Competencia con escudos</label>
    <br>
    <label for="lenguage1">Idioma conocido</label>
    <select name="type" id="type">
        <option value="">Ninguno</option>
        @forelse ($lenguages as $lenguage)
            <option value="{{$lenguage->id}}">{{$lenguage->nombre}}</option>
        @empty

        @endforelse
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
