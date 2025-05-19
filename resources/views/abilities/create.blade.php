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
