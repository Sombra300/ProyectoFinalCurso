@extends('partials.layout')
@section('titulo')
    {{Auth::user()->name}}
@endsection
@section('estilo')

@endsection
@section('body')
<div class="container">
    <div class="form-container">
        <div class="mb-3">
            <strong>Nombre de usuario:</strong> {{ Auth::user()->name }} <br>
            <strong>Correo:</strong> {{ Auth::user()->email }}
        </div>

        <div class="mb-3">
            <form action="{{ route('users.destroy', ['user' => Auth::user()->id]) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Eliminar cuenta" class="btn btn-danger">
            </form>
        </div>

        <div class="mb-3">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-secondary">Cerrar sesión</button>
            </form>
        </div>
    </div>
@endsection
