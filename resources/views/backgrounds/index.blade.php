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
                        <h6>Competencias:</h6>
                        <div class="row">
                            @if ($background->CompArmaSimple==1)
                                <div class="col-2">Armas simples</div>
                            @endif
                            @if ($background->CompArmaMarcial==1)
                                <div class="col-2">Armas marciales</div>
                            @endif
                            @if ($background->CompArmaduraLig==1)
                                <div class="col-2">Armaduras ligeras</div>
                            @endif
                            @if ($background->CompArmaduraMed==1)
                                <div class="col-2">Armaduras medias</div>
                            @endif
                            @if ($background->CompArmaduraPes==1)
                                <div class="col-2">Armaduras pesadas</div>
                            @endif
                            @if ($background->CompEscudo==1)
                                <div class="col-2">Escudo</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-8">Descripcion: {{$background->descripcion}}</div>
                    @if (Auth::check())
                        @if(Auth::user()->rol=='admin')
                            <div class="col-4">
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
