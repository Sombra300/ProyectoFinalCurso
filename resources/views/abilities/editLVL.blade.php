@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{ route('abilities.updateLVL') }}" method="POST">
    @csrf
    <input type="hidden" name="type" value="{{ $type }}">
    <input type="hidden" name="external_id" value="{{ $external_id }}">
    <input type="hidden" name="ability_id" value="{{ $ability->id }}">

    <label for="lvl">A que nivel se consigue la habilidad</label>
    <input type="number" name="lvl" id="lvl" value="{{ $currentLvl }}">

    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

@endsection('body')
