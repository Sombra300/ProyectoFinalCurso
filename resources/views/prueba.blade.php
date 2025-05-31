@extends('partials.layout')
@section('titulo')
Mis personajes
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container py-4">
    <div class="row g-4">
    <div class="col-12 col-sm-6 col-md-4">
        <div class="card position-relative">
            <div class="card-body  btn btn-primary">
                <h5 class="card-title">Crear personaje</h5>
                <a href="{{ route('characters.create') }}" class="stretched-link"></a>
            </div>
        </div>
    </div>

  </div>
</div>
<div class="row">
    <div class="prueva color1">A</div>
    <div class="prueva color2">B</div>
    <div class="prueva color3">C</div>
    <div class="prueva color4">D</div>
    <div class="prueva color5">E</div>
    <div class="prueva color6">F</div>
    <div class="prueva color7">G</div>
    <div class="prueva color8">H</div>
    <div class="prueva color9">I</div>
    <div class="prueva color10">J</div>
    <div class="prueva color11">K</div>
    <div class="prueva color12">L</div>
    <div class="prueva color13">M</div>
    <div class="prueva color14">N</div>
    <div class="prueva color15">O</div>
</div>

@endsection('body')

