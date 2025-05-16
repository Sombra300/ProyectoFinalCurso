@extends('partials.layout')
@section('titulo')
Mis personajes
@endsection('titulo')
@section('estilo')
{{-- <link rel="stylesheet" href="{{ asset('css/logo.css') }}"> --}}
@endsection('estilo')
@section('body')

@if (Auth::check())

@else
    <div id="sinlog">
        <h1>Necesitas iniciar sesión para ver tus personajes</h1>
    </div>
@endif

@endsection('body')

