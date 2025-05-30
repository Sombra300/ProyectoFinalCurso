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

        <div class="row g-4">
        @forelse (Auth::user()->characters as $character)
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card position-relative p-3">
                <h6 class="card-title">{{ $character->nombre }}</h6>

                <div class="card-body">
                    {{ $character->race->nombre }}
                    <br>
                    @foreach ($character->clases as $clase)
                        <div class="card mt-2">
                            <h6 class="card-title">{{ $clase->nombre }}</h6>
                            <span class="card-body">Nivel {{ $clase->pivot->lvl}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$clase->pivot->subclase_name}}</span>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-between mt-3 px-2">
                    <a href="{{route('characters.show', $character->id)}}" class="btn btn-primary btn-sm">
                        Ver
                    </a>
                    @if (Auth::check())
                        <form action="{{ route('likes.like')}}" method="DELETE">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <p>No hay personajes disponibles.</p>
    @endforelse

</div>
@endsection
