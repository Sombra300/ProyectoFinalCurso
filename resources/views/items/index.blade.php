@extends('partials.layout')
@section('titulo')
<style>
    .Item{
        
    }
    .Weapon{
        background-color: rgb(238, 132, 132)
    }
    .Armor{
        background-color: rgb(134, 241, 157)
    }
</style>
@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div id="ITEMS" class="container">
    @forelse ($items as $item)
        @if (!$item->weapon && !$item->armor)
            <div class="Item">
                {{$item->nombre}}
                <div>
                    <div class="">Valor:{{$item->precio}}</div>
                    <div class="">Peso:{{$item->peso}}</div>
                    @if ($item->descripcion!="")
                        {{$item->descripcion}}
                    @endif
                </div>
            </div>
        @endif
    @empty
    @endforelse
</div>
<div id="WEAPONS" class="container">
    @forelse ($items as $item)
        @if ($item->weapon)
            <div class="Weapon">
                {{$item->nombre}}
                <div>
                    <div class="">Valor:{{$item->precio}}</div>
                    <div class="">Peso:{{$item->peso}}</div>
                    <div>
                        1d{{$item->weapon->daño}} de daño {{$item->weapon->tipoDaño}} <br>
                        Alcance normal: {{$item->weapon->alcanceNormal}}  <br>
                        @if ($item->weapon->alcanceNormal!=$item->weapon->alcanceExtra)
                            Alcance con desventaja: {{$item->weapon->alcanceExtra}} <br>
                        @endif
                        Tipo de arma: {{$item->weapon->tipoArma}} <br>
                        <ul>
                            @if ($item->weapon->propSut==1)
                                <li>Sutil</li>
                            @endif
                            @if ($item->weapon->prop2Manos==1)
                                <li>A 2 manos</li>
                            @endif
                            @if ($item->weapon->propPesada==1)
                                <li>Pesada</li>
                            @endif
                        </ul>
                    </div>
                    @if ($item->descripcion!="")
                    {{$item->descripcion}}
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
            <div class="Armor">
                {{$item->nombre}}
                <div>
                    <div>
                        Tipo de armadura: {{$item->armor->tipoArm}} <br>
                        @if ($item->armor->tipoArm=='escudo')
                            Bono a la CA: +{{$item->armor->CA}}
                        @else
                            CA: {{$item->armor->CA}}
                            @if ($item->armor->DESMax!=0)
                                + hasta {{$item->armor->DESMax}} por modificador de destreza <br>
                            @else
                                <br>
                            @endif
                        @endif
                        @if ($item->armor->desSig==1)
                            <div class="ADV">Por llevar este objeto equipado tienes desventaja en las pruevas de sigilo</div>
                        @endif
                    </div>
                    <div class="">Valor:{{$item->precio}}</div>
                    <div class="">Peso:{{$item->peso}}</div>
                    @if ($item->descripcion!="")
                    {{$item->descripcion}}
                    @endif
                </div>
            </div>
        @endif
    @empty
    @endforelse
</div>

@endsection('body')
