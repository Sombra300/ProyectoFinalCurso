@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')
<form action="{{route('abilities.store')}}" method="post">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}">
    <br>
    <label for="descripcion">Descripcion</label>
    <input type="text" id="descripcion" name="descripcion" value="{{old('descripcion')}}">
    <br>
    <label for="coste">Coste</label>
    <input type="text" id="coste" name="coste" value="{{old('coste')}}">
    <br>
    <label for="reuseTime">Tiempo de reutilización</label>
    <input type="text" id="reuseTime" name="reuseTime" value="{{old('reuseTime')}}">
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
