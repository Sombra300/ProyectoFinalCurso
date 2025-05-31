@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container">
    <div class="row">
        @forelse ($backgrounds as $background)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$background->nombre}}</h5>
                    <div class="card-text">
                        <h6>Idioma: {{ $background->lenguage->nombre ?? 'No asignado' }}</h6>
                    </div>
                    <div class="col-12">{{$background->descripcion}}</div>
                    @if (Auth::check())
                        @if(Auth::user()->rol=='admin')
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <form action="{{ route('backgrounds.destroy', $background->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('backgrounds.edit',$background->id) }}" class="btn btn-primary">Editar</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        @empty
            <div class="col-12"><h5>No hay trasfondos registrados</h5></div>
        @endforelse
    </div>
</div>

@endsection('body')
