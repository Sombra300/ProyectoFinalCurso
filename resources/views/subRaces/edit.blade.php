@extends('partials.layoutADMIN')
@section('titulo')
Editar{{$subRace->nombre}}
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{route('subRaces.update', $subRace->id)}}" method="post">
    @csrf
    @method('put')
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="{{$subRace->nombre}}">
    <br>
    <label for="descripcion">Descripcion</label>
    <input type="text" id="descripcion" name="descripcion" value="{{$subRace->descripcion}}">
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
