@extends('partials.layoutADMIN')
@section('titulo')
usuarios
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container">
    <div class="row">
        @foreach ($users as $user)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$user->name}}</h5>
                    <div class="col-6">
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                    <div class="col-6">
                        @if ($user->rol=='admin')
                        <form action="{{ route('users.update', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-secundary">Quitar permisos</button>
                        </form>
                        @else
                        <form action="{{ route('users.update', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary">Dar permisos</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection('body')
