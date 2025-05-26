@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{route('races.store')}}" method="post">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre">
    <br>
    <label for="descripcion">Descripcion</label>
    <input type="text" id="descripcion" name="descripcion">
    <br>
    <label for="velocidad">Velocidad de movimiento</label>
    <input type="text" id="velocidad" name="velocidad">
    <br>
    <label for="tamaño">Tipo de tamaño</label>
    <select name="tamaño" id="tamaño">
        <option value="pequeña">Pequeña</option>
        <option value="media">Media</option>
        <option value="grande">Grande</option>
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
