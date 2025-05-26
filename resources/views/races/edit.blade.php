@extends('partials.layoutADMIN')
@section('titulo')
Editar {{$race->nombre}}
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{route('races.update', $race->id)}}" method="post">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="{{$race->nombre}}">
    <br>
    <label for="descripcion">Descripcion</label>
    <input type="text" id="descripcion" name="descripcion" value="{{$race->descripcion}}">
    <br>
    <label for="velocidad">Velocidad de movimiento</label>
    <input type="text" id="velocidad" name="velocidad" value="{{$race->velocidad}}">
    <br>
    <label for="tamaño">Tipo de tamaño</label>
    <select name="tamaño" id="tamaño">
        <option value="pequeña" {{ $race->tamaño == 'pequeña' ? 'selected' : '' }}>Pequeña</option>
        <option value="media" {{ $race->tamaño == 'media' ? 'selected' : '' }}>Media</option>
        <option value="grande" {{ $race->tamaño == 'grande' ? 'selected' : '' }}>Grande</option>
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
