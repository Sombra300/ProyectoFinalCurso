@extends('partials.layout')
@section('titulo')
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container">
    <div class="item-card card mb-3 shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="#ITEMS">Objetos</a>
                    <a class="nav-link" aria-current="page" href="#WEAPONS">Armas</a>
                    <a class="nav-link" aria-current="page" href="#ARMORS">Armaduras</a>
                </div>
                </div>
            </div>
        </nav>
    </div>
</div>

<div id="ITEMS" class="container">
    @forelse ($items as $item)
        @if (!$item->weapon && !$item->armor)
            <div class="item-card card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nombre }}</h5>
                    <div class="mb-1"><strong>Valor:</strong> {{ $item->precio }} monedas de oro</div>
                    <div class="mb-1"><strong>Peso:</strong> {{ $item->peso }}</div>
                    <div class="mt-2">{{ $item->descripcion }}</div>
                </div>
            </div>
        @endif
    @empty
    @endforelse

</div>

<div id="WEAPONS" class="container">
    @forelse ($items as $item)
        @if ($item->weapon)
            <div class="weapon-card card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nombre }}</h5>

                    <div class="mb-1"><strong>Valor:</strong> {{ $item->precio }} monedas de oro</div>
                    <div class="mb-1"><strong>Peso:</strong> {{ $item->peso }}</div>

                    <div class="mb-1">
                        <strong>Daño:</strong> 1d{{ $item->weapon->daño }} {{ $item->weapon->tipoDaño }}
                    </div>

                    <div class="mb-1"><strong>Alcance normal:</strong> {{ $item->weapon->alcanceNormal }}</div>

                    @if ($item->weapon->alcanceNormal != $item->weapon->alcanceExtra)
                        <div class="mb-1">
                            <strong>Alcance con desventaja:</strong> {{ $item->weapon->alcanceExtra }}
                        </div>
                    @endif

                    <div class="mb-1"><strong>Tipo de arma:</strong> {{ $item->weapon->tipoArma }}</div>

                    <div class="mb-2">
                        @if ($item->weapon->propSut == 1)
                            Sutil <br>
                        @endif
                        @if ($item->weapon->prop2Manos == 1)
                            A 2 manos <br>
                        @endif
                        @if ($item->weapon->propPesada == 1)
                            Pesada
                        @endif
                    </div>


                    <div class="mt-2">{{ $item->descripcion }}</div>
                </div>
            </div>
        @endif
    @empty
    @endforelse

</div>

<div id="ARMORS" class="container">
    @forelse ($items as $item)
        @if ($item->armor)
            <div class="armor-card card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nombre }}</h5>
                    <div class="mb-1"><strong>Tipo de armadura:</strong> {{ $item->armor->tipoArm }}</div>

                    @if ($item->armor->tipoArm == 'escudo')
                        <div class="mb-1"><strong>Bono a la CA:</strong> +{{ $item->armor->CA }}</div>
                    @else
                        <div class="mb-1">
                            <strong>CA:</strong> {{ $item->armor->CA }}
                            @if ($item->armor->DESMax)
                                <small class="text-muted">+ hasta {{ $item->armor->DESMax }} por modificador de destreza</small>
                            @endif
                        </div>
                    @endif

                    @if ($item->armor->desSig)
                        <div class="alert alert-warning div-2 mt-2">
                            <strong>Advertencia:</strong> Este objeto da desventaja en las pruebas de sigilo.
                        </div>
                    @endif

                    <div class="mb-1"><strong>Valor:</strong> {{ $item->precio }} monedas de oro</div>
                    <div class="mb-1"><strong>Peso:</strong> {{ $item->peso }}</div>
                    <div class="mt-2">{{ $item->descripcion }}</div>
                </div>
            </div>
        @endif
    @empty
    @endforelse

</div>

@endsection('body')
