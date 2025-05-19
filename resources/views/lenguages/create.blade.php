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
    <label for="hour">Hora</label>
    <input type="time" id="hour" name="hour">
    <br>
    <label for="lenguage1">Tipo</label>
    <select name="type" id="type">
        <option value="official">Official</option>
        <option value="exhibition">Exhibition</option>
        <option value="charity">Charity</option>
    </select>
    <br>
    <br>
    <label for="tags">Etiquetas</label>
    <input type="text" id="tags" name="tags">
    <br>
    <label for="visible">Visibilidad</label>
    <select id="visible" name="visible">
        <option value="0">Oculto</option>
        <option value="1">Visible</option>
    </select>
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
