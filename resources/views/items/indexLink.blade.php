@extends('partials.layout')
@section('titulo')
Añadir Objeto
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

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
                    <p><strong>Valor:</strong> {{ $item->precio }}</p>
                    <p><strong>Peso:</strong> {{ $item->peso }}</p>
                    <p>{{ $item->descripcion }}</p>
                    <form action="{{ route('items.linkItems', ['external_id' => $id, 'item_id' => $item->id]) }}" method="POST" class="mt-2">
                        @csrf
                        <div class="mb-2">
                            <label for="cantidad_{{ $item->id }}" class="form-label">Cantidad</label>
                            <input type="number" id="cantidad_{{ $item->id }}" name="cantidad" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Añadir objeto</button>
                    </form>
                </div>
            </div>
        @endif
    @empty
        <p>No hay objetos disponibles.</p>
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
                    <p><strong>Valor:</strong> {{ $item->precio }}</p>
                    <p><strong>Peso:</strong> {{ $item->peso }}</p>
                    <p>{{ $item->descripcion }}</p>
                    <div class="mb-2">
                        <p>1d{{ $item->weapon->daño }} de daño {{ $item->weapon->tipoDaño }}</p>
                        <p>Alcance normal: {{ $item->weapon->alcanceNormal }}</p>
                        @if ($item->weapon->alcanceNormal != $item->weapon->alcanceExtra)
                            <p>Alcance con desventaja: {{ $item->weapon->alcanceExtra }}</p>
                        @endif
                        <p>Tipo de arma: {{ $item->weapon->tipoArma }}</p>
                        <ul>
                            @if ($item->weapon->propSut) <li>Sutil</li> @endif
                            @if ($item->weapon->prop2Manos) <li>A 2 manos</li> @endif
                            @if ($item->weapon->propPesada) <li>Pesada</li> @endif
                        </ul>
                    </div>
                    <form action="{{ route('items.linkItems', ['external_id' => $id, 'item_id' => $item->id]) }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="cantidad_{{ $item->id }}" class="form-label">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad_{{ $item->id }}" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Añadir objeto</button>
                    </form>
                </div>
            </div>
        @endif
    @empty
        <p>No hay armas disponibles.</p>
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
                    <p><strong>Tipo de armadura:</strong> {{ $item->armor->tipoArm }}</p>
                    @if ($item->armor->tipoArm == 'escudo')
                        <p><strong>Bono a la CA:</strong> +{{ $item->armor->CA }}</p>
                    @else
                        <p><strong>CA:</strong> {{ $item->armor->CA }}
                            @if ($item->armor->DESMax != 0)
                                + hasta {{ $item->armor->DESMax }} por modificador de destreza
                            @endif
                        </p>
                    @endif
                    @if ($item->armor->desSig)
                        <div class="alert alert-warning p-2">Desventaja en las pruebas de sigilo al usar esta armadura.</div>
                    @endif
                    <p><strong>Valor:</strong> {{ $item->precio }}</p>
                    <p><strong>Peso:</strong> {{ $item->peso }}</p>
                    <p>{{ $item->descripcion }}</p>
                    <form action="{{ route('items.linkItems', ['external_id' => $id, 'item_id' => $item->id]) }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="cantidad_{{ $item->id }}" class="form-label">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad_{{ $item->id }}" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Añadir objeto</button>
                    </form>
                </div>
            </div>
        @endif
    @empty
        <p>No hay armaduras disponibles.</p>
    @endforelse
</div>


@endsection('body')
