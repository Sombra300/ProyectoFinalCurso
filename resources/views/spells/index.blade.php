@extends('partials.layout')
@section('titulo')
Hechizos
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')


<div class="container">
    <div class="row">
        @forelse ($spells as $spell)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card {{$spell->tipoDaño}}" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">{{$spell->nombre}}</h5>
                        <div class="">{{$spell->descripcion}}</div>
                        @if ($spell->ataque == true)
                            <div class="ADV">El lanzador tendrá que hacer una tirada de ataque al usar este hechizo</div>
                        @endif
                        <div class="">Espacio de conjuro requerido: {{$spell->nivel}}</div>
                        <div class="">Causa: 1d{{$spell->daño}}</div>

                        @if (Auth::check() && Auth::user()->rol == 'admin')
                            <div class="row mb-4">
                                <div class="col-12">
                                    <div class="mb-3 d-flex flex-wrap gap-2">
                                        <a href="{{ route('spells.edit', $spell->id) }}" class="btn btn-primary">Editar</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12"><h1>No hay hechizos registrados</h1></div>
        @endforelse
    </div>
</div>




@endsection('body')
