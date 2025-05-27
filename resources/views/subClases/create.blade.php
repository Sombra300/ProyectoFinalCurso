@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{route('subClases.store')}}" method="post">
    @csrf
    <input type="hidden" name="clase_id" value="{{ $id }}">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre">
    <br>
    <label for="descripcion">Descripcion</label>
    <input type="text" id="descripcion" name="descripcion">
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
