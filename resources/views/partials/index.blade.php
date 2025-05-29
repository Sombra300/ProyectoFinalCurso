@extends('partials.layout')
@section('titulo')
Inicio
@endsection('titulo')
@section('estilo')
{{-- <link rel="stylesheet" href="{{ asset('css/logo.css') }}"> --}}
@endsection('estilo')
@section('body')

@if (Auth::check())
    <script>window.location.href = "{{ route('characters.propios') }}"</script>
@else
    <div id="sinlog">
        <h1>Necesitas iniciar sesión para ver tus personajes</h1>
    </div>
@endif

@endsection('body')

