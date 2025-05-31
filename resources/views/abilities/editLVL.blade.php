@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{ route('abilities.updateLVL') }}" method="POST" class="card p-3 shadow-sm mb-3">
    @csrf
    <input type="hidden" name="type" value="{{ $type }}">
    <input type="hidden" name="external_id" value="{{ $external_id }}">
    <input type="hidden" name="ability_id" value="{{ $ability->id }}">

    <div class="mb-3">
        <label for="lvl" class="form-label">Nivel al que se consigue la habilidad para la {{$type}}</label>
        <input type="number" name="lvl" id="lvl" class="form-control" value="{{ $currentLvl }}">
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
</form>

@if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@endsection('body')
