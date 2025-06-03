@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container mt-4">
    <div class="card shadow rounded mb-4">
        <div class="card-body">

            <h1>{{ $clase->nombre }}</h1>

            @if (Auth::check() && Auth::user()->rol == 'admin')
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="mb-3 d-flex flex-wrap justify-content-center gap-2">
                            <a href="{{ route('subClases.createID', $clase->id) }}" class="btn btn-primary">Añadir subclase</a>
                            <a href="{{ route('abilities.indexLink', [$clase->id, 'clase']) }}" class="btn btn-primary">Añadir habilidad</a>
                            <a href="{{ route('spells.indexLink', $clase->id) }}" class="btn btn-primary">Añadir hechizo</a>
                            <a href="{{ route('clases.edit', $clase->id) }}" class="btn btn-primary">Editar clase</a>
                            <a href="{{ route('clases.destroy', $clase->id) }}" class="btn btn-danger">Eliminar clase</a>
                        </div>
                    </div>
                </div>
            @endif


            <div class="mb-4">{{ $clase->descripcion }}</div>



            <h5>Caras del dado de golpe: {{ $clase->dadoGolpe }}</h5>

            <div class="row mb-4">
                <div class="col-12 col-md-6">Puntos de vida a primer nivel: {{ $clase->dadoGolpe }}</div>
                <div class="col-12 col-md-6">Puntos de vida por nivel: {{ $clase->dadoGolpe }}</div>
            </div>


            <h5>Nivel al que se consigue la subclase: {{ $clase->lvlSubClase }}</h5>


            <h5>Competencias:</h5>
            <ul>
                @if ($clase->CompArmaSimple == 1)<li>Armas simples</li>@endif
                @if ($clase->CompArmaMarcial == 1)<li>Armas marciales</li>@endif
                @if ($clase->CompArmaduraLig == 1)<li>Armaduras ligeras</li>@endif
                @if ($clase->CompArmaduraMed == 1)<li>Armaduras medias</li>@endif
                @if ($clase->CompArmaduraPes == 1)<li>Armaduras pesadas</li>@endif
                @if ($clase->CompEscudo == 1)<li>Escudos</li>@endif
            </ul>

        </div>
    </div>


    <div id="Habilidades" class="mb-4">
        <h2>Habilidades de la clase</h2>
        <div class="row g-3">
            <div class="card p-4 mb-4">
                <div class="row">
                    @forelse ($clase->abilities as $ability)
                        <div class="col-12">
                            <div class="card p-3 mb-3">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-10">
                                        <strong>{{ $ability->nombre }}</strong> al nivel {{ $ability->pivot->lvl }}
                                        @if ($ability->descripcion != "")
                                            <p class="mb-1">{{ $ability->descripcion }}</p>
                                        @endif
                                        <small>Coste de habilidad: {{ $ability->coste }}</small><br>
                                        <small>{{ $ability->reuseTime }}</small>
                                    </div>

                                    @if (Auth::check())
                                        @if(Auth::user()->rol == 'admin')
                                            <div class="col-12 col-md-2 mt-3 mt-md-0 d-flex flex-wrap gap-2 justify-content-md-end">
                                                <form action="{{ route('abilities.linkAbilities', ['type' => 'clase', 'external_id' => $clase->id, 'ability_id' => $ability->id]) }}" method="POST" class="m-0">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Quitar habilidad</button>
                                                </form>
                                                <a href="{{ route('abilities.editLVL', [$clase->id, $ability->id, 'clase']) }}" class="btn btn-primary btn-sm">Editar lvl</a>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12"><h5>No hay habilidades asociadas para esta clase</h5></div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    <div id="Subclases" class="mb-4">
        <h2>Subclases</h2>
        <div class="row g-3">
            @forelse ($clase->subClases as $subclase)
                <div class="col-12">
                    <div class="card p-3">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <strong>{{ $subclase->nombre }}</strong>
                            </div>

                            @if (Auth::check())
                                @if(Auth::user()->rol == 'admin')
                                    <div class="col-12 col-md-6 d-flex flex-wrap gap-2 justify-content-md-end mt-3 mt-md-0">
                                        <form action="{{ route('subClases.destroy', $subclase->id) }}" method="post" class="m-0">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                        <a href="{{ route('subClases.edit', $subclase->id) }}" class="btn btn-primary btn-sm">Editar subclase</a>
                                        <a href="{{ route('abilities.indexLink', [$subclase->id, 'subclase']) }}" class="btn btn-primary btn-sm">Añadir habilidad</a>
                                    </div>
                                @endif
                            @endif
                        </div>

                        @if ($subclase->descripcion != "")
                            <div class="mt-2">{{ $subclase->descripcion }}</div>
                        @endif

                        <div class="mt-3">
                            @forelse ($subclase->abilities as $ability)
                                <div class="card mb-3 p-3">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-10">
                                            <strong>{{ $ability->nombre }}</strong> al nivel {{ $ability->pivot->lvl }}<br>
                                            @if ($ability->descripcion != "")
                                                <small class="text-muted">{{ $ability->descripcion }}</small><br>
                                            @endif
                                            <small>Coste: {{ $ability->coste }}</small> |
                                            <small>{{ $ability->reuseTime }}</small>
                                        </div>

                                        @if (Auth::check())
                                            @if(Auth::user()->rol == 'admin')
                                                <div class="col-12 col-md-2 d-flex gap-2 justify-content-md-end mt-3 mt-md-0">
                                                    <form action="{{ route('abilities.linkAbilities', ['type' => 'subclase', 'external_id' => $subclase->id, 'ability_id' => $ability->id]) }}" method="POST" class="m-0 flex-grow-1">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm w-100">Quitar habilidad</button>
                                                    </form>
                                                    <a href="{{ route('abilities.editLVL', [$subclase->id, $ability->id, 'subclase']) }}"
                                                    class="btn btn-primary btn-sm flex-grow-1 w-100 text-center">Editar lvl</a>
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <p>Esta subclase no tiene habilidades</p>
                            @endforelse

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12"><h5>No hay subrazas de esta raza</h5></div>
            @endforelse
        </div>
    </div>

    <div id="hechizos">
        <h2>Hechizos de la clase</h2>
        <div class="row g-3">
            @forelse ($clase->spells as $spell)
                <div class="col-12">
                    <div class="card p-3 {{ $spell->tipoDaño }}">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-10">
                                <strong>{{ $spell->nombre }}</strong> al nivel {{ $spell->pivot->lvl }}
                                <p>{{ $spell->descripcion }}</p>
                                <small>Daño: 1d{{ $spell->daño }} | Tipo: {{ $spell->tipoDaño }}</small><br>
                                <small>Nivel del hechizo: {{ $spell->nivel }}</small><br>
                                @if ($spell->coste != '')
                                    <small>Coste: {{ $spell->coste }}</small>
                                @endif
                            </div>

                            @if (Auth::check())
                                @if(Auth::user()->rol == 'admin')
                                    <div class="col-12 col-md-2 d-flex gap-2 justify-content-md-end mt-3 mt-md-0">
                                        <form action="{{ route('spells.linkSpells', ['external_id' => $clase->id, 'spell_id' => $spell->id]) }}" method="POST" class="m-0">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Quitar hechizo</button>
                                        </form>
                                        <a href="{{ route('spells.editLVL', [$clase->id, $spell->id]) }}" class="btn btn-primary btn-sm">Editar lvl</a>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12"><h5>No hay hechizos asociados en esta clase</h5></div>
            @endforelse
        </div>
    </div>
</div>


@endsection('body')
