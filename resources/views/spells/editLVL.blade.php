@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{ route('spells.updateLVL') }}" method="POST">
    @csrf
    <input type="hidden" name="external_id" value="{{ $external_id }}">
    <input type="hidden" name="spell_id" value="{{ $spell->id }}">

    <label for="lvl">A que nivel se consigue el hechizo</label>
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
