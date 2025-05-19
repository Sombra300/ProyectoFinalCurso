@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{route('items.store')}}" method="post" id="itemForm">
    @csrf
    <label for="type">Tipo</label>
    <select name="type" id="type">
        <option value="item">Objeto</option>
        <option value="weapon">Arma</option>
        <option value="armor">Armadura</option>
    </select>
    <br>
    <label for="name">Nombre</label>
    <input type="text" id="name" name="name">
    <br>
    <label for="description">Descripcion</label>
    <input type="text" id="description" name="description">
    <br>
    <label for="peso">Peso</label>
    <input type="number" id="peso" name="peso">
    <br>
    <label for="precio">Precio</label>
    <input type="number" id="precio" name="precio">
    <br>
    <div id="extra"></div>
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

@section('scrips')
    <script src=""></script>
@endsection

