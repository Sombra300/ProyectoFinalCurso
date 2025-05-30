@extends('partials.layout')
@section('titulo')
Clases
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container">
    <div class="row">
        @forelse ($clases as $clase)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$clase->nombre}}</h5>
                    <form action="{{ route('characters.linkClases', ['character_id' => $character_id, 'clase_id' => $clase->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary">Añadir clase</button>
                    </form>
                    </div>
                </div>
            @empty
        <div class="col-12"><h1>No hay clases registradas</h1></div>
        @endforelse
    </div>
</div>

@endsection('body')
