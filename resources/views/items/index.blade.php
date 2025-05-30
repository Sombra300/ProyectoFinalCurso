@extends('partials.layout')
@section('titulo')
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

{{-- TODO nav y comp codig $item y $weapon --}}

<div id="ITEMS" class="container">
    @forelse ($items as $item)
        @if (!$item->weapon && !$item->armor)
            <div class="item-card card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nombre }}</h5>
                    <p class="mb-1"><strong>Valor:</strong> {{ $item->precio }} monedas de oro</p>
                    <p class="mb-1"><strong>Peso:</strong> {{ $item->peso }}</p>
                    <p class="mt-2">{{ $item->descripcion }}</p>
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

                    <p class="mb-1"><strong>Valor:</strong> {{ $item->precio }} monedas de oro</p>
                    <p class="mb-1"><strong>Peso:</strong> {{ $item->peso }}</p>

                    <p class="mb-1">
                        <strong>Daño:</strong> 1d{{ $item->weapon->daño }} {{ $item->weapon->tipoDaño }}
                    </p>

                    <p class="mb-1"><strong>Alcance normal:</strong> {{ $item->weapon->alcanceNormal }}</p>

                    @if ($item->weapon->alcanceNormal != $item->weapon->alcanceExtra)
                        <p class="mb-1">
                            <strong>Alcance con desventaja:</strong> {{ $item->weapon->alcanceExtra }}
                        </p>
                    @endif

                    <p class="mb-1"><strong>Tipo de arma:</strong> {{ $item->weapon->tipoArma }}</p>

                    <ul class="mb-2">
                        @if ($item->weapon->propSut == 1)
                            <li>Sutil</li>
                        @endif
                        @if ($item->weapon->prop2Manos == 1)
                            <li>A 2 manos</li>
                        @endif
                        @if ($item->weapon->propPesada == 1)
                            <li>Pesada</li>
                        @endif
                    </ul>

                    @if ($item->descripcion != "")
                        <p class="mt-2">{{ $item->descripcion }}</p>
                    @endif
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
                    <p class="mb-1"><strong>Tipo de armadura:</strong> {{ $item->armor->tipoArm }}</p>

                    @if ($item->armor->tipoArm == 'escudo')
                        <p class="mb-1"><strong>Bono a la CA:</strong> +{{ $item->armor->CA }}</p>
                    @else
                        <p class="mb-1">
                            <strong>CA:</strong> {{ $item->armor->CA }}
                            @if ($item->armor->DESMax)
                                <small class="text-muted">+ hasta {{ $item->armor->DESMax }} por modificador de destreza</small>
                            @endif
                        </p>
                    @endif

                    @if ($item->armor->desSig)
                        <div class="alert alert-warning p-2 mt-2">
                            <strong>Advertencia:</strong> Este objeto da desventaja en las pruebas de sigilo.
                        </div>
                    @endif

                    <p class="mb-1"><strong>Valor:</strong> {{ $item->precio }} monedas de oro</p>
                    <p class="mb-1"><strong>Peso:</strong> {{ $item->peso }}</p>
                    <p class="mt-2">{{ $item->descripcion }}</p>
                </div>
            </div>
        @endif
    @empty
    @endforelse

</div>

@endsection('body')
