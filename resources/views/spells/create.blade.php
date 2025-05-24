@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{route('spells.store')}}" method="post">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre">
    <br>
    <label for="descripcion">Descripcion</label>
    <input type="text" id="descripcion" name="descripcion">
    <br>
    <label for="coste">Coste/Materiales necesarios</label>
    <input type="text" id="coste" name="coste">
    <br>
    <label for="daño">Caras del dado que usa el hechizo</label>
    <input type="number" id="daño" name="daño">
    <br>
    <label for="nivel">Nivel del espacio de conjuro del hechizo</label>
    <input type="number" id="nivel" name="nivel">
    <br>
    <label for="tipoDaño">Tipo de Daño</label>
    <select name="tipoDaño" id="tipoDaño">
        <option value="acido">Acido</option>
        <option value="cura">Curativo</option>
        <option value="fuego">Fuego</option>
        <option value="fuerza">Fuerza</option>
        <option value="frio">Frio</option>
        <option value="necrotico">Necrotico</option>
        <option value="psiquico">Psiquico</option>
        <option value="radiante">Radiante</option>
        <option value="rayo">Rayo</option>
        <option value="trueno">Trueno</option>
        <option value="veneno">Veneno</option>
        <option value="sin">Efecto de la descripcion</option>
    </select>
    <br>
    <input type="checkbox" name="ataque" id="ataque"><label for="ataque">El lanzador del conjuro necesita hacer tirada de ataque </label>
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
