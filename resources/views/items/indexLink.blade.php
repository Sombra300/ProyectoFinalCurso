@extends('partials.layout')
@section('titulo')
Añadir Objeto
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container">
    <div class="item-card card mb-3 shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="navbar" id="navbarNavAltMarkup">
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

<div id="ITEMS" class="container my-4">
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @forelse ($items as $item)
        @if (!$item->weapon && !$item->armor)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>{{ $item->nombre }}</strong>
                </div>
                <div class="card-body">
                    <div><strong>Valor:</strong> {{ $item->precio }}</div>
                    <div><strong>Peso:</strong> {{ $item->peso }}</div>
                    <div>{{ $item->descripcion }}</div>
                    <form action="{{ route('items.linkItems', ['external_id' => $id, 'item_id' => $item->id]) }}" method="POST" class="mt-2">
                        @csrf
                        <div class="mb-2">
                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <input type="number" id="cantidad" name="cantidad" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Añadir objeto</button>
                    </form>
                </div>
            </div>
        @endif
    @empty
    @endforelse
</div>

<div id="WEAPONS" class="container my-4">
    @forelse ($items as $item)
        @if ($item->weapon)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>{{ $item->nombre }}</strong>
                </div>
                <div class="card-body">
                    <div><strong>Valor:</strong> {{ $item->precio }}</div>
                    <div><strong>Peso:</strong> {{ $item->peso }}</div>
                    <div>{{ $item->descripcion }}</div>
                    <div class="mb-2">
                        <div>1d{{ $item->weapon->daño }} de daño {{ $item->weapon->tipoDaño }}</div>
                        <div>Alcance normal: {{ $item->weapon->alcanceNormal }}</div>
                        @if ($item->weapon->alcanceNormal != $item->weapon->alcanceExtra)
                            <div>Alcance con desventaja: {{ $item->weapon->alcanceExtra }}</div>
                        @endif
                        <div>Tipo de arma: {{ $item->weapon->tipoArma }}</div>
                        <div>
                            @if ($item->weapon->propSut) Sutil <br> @endif
                            @if ($item->weapon->prop2Manos) A 2 manos</br> @endif
                            @if ($item->weapon->propPesada) Pesada</br> @endif
                        </div>
                    </div>
                    <form action="{{ route('items.linkItems', ['external_id' => $id, 'item_id' => $item->id]) }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="cantidad_{{ $item->id }}" class="form-label">Cantidad:</label>
                            <input type="number" name="cantidad" id="cantidad_{{ $item->id }}" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Añadir objeto</button>
                    </form>
                </div>
            </div>
        @endif
    @empty
    @endforelse
</div>

<div id="ARMORS" class="container my-4">
    @forelse ($items as $item)
        @if ($item->armor)
            <div class="card mb-3">
                <div class="card-header">
                    <strong>{{ $item->nombre }}</strong>
                </div>
                <div class="card-body">
                    <div><strong>Tipo de armadura:</strong> {{ $item->armor->tipoArm }}</div>
                    @if ($item->armor->tipoArm == 'escudo')
                        <div><strong>Bono a la CA:</strong> +{{ $item->armor->CA }}</div>
                    @else
                        <div><strong>CA:</strong> {{ $item->armor->CA }}
                            @if ($item->armor->DESMax != 0)
                                + hasta {{ $item->armor->DESMax }} por modificador de destreza
                            @endif
                        </div>
                    @endif
                    @if ($item->armor->desSig)
                        <div class="alert alert-warning div-2">Desventaja en las pruebas de sigilo al usar esta armadura.</div>
                    @endif
                    <div><strong>Valor:</strong> {{ $item->precio }}</div>
                    <div><strong>Peso:</strong> {{ $item->peso }}</div>
                    <div>{{ $item->descripcion }}</div>
                    <form action="{{ route('items.linkItems', ['external_id' => $id, 'item_id' => $item->id]) }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="cantidad_{{ $item->id }}" class="form-label">Cantidad:</label>
                            <input type="number" name="cantidad" id="cantidad_{{ $item->id }}" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Añadir objeto</button>
                    </form>
                </div>
            </div>
        @endif
    @empty
    @endforelse
</div>


@endsection('body')
