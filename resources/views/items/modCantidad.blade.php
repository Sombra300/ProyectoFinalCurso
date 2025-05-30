@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="form-container">
    <form action="{{route('items.updateCantidad')}}" method="post">
        @csrf
        <input type="hidden" name="character_id" value="{{ $character->id }}">
        <input type="hidden" name="item_id" value="{{ $item->id }}">
        <label for="subject">{{$item->nombre}}</label>
        <br>
        <br>
        <label for="lvl">Cantidad del objeto</label>
        <input type="number" name="lvl" id="lvl" value="{{$cantidad}}">
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
</div>

@endsection('body')
@section('scrips')

