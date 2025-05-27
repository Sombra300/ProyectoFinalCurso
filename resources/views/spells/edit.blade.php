@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{route('spells.update', $spell->id)}}" method="post">
    @csrf
    @method('put')
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="{{$spell->nombre}}">
    <br>
    <label for="descripcion">Descripcion</label>
    <input type="text" id="descripcion" name="descripcion" value="{{$spell->descripcion}}">
    <br>
    <label for="coste">Coste/Materiales necesarios</label>
    <input type="text" id="coste" name="coste" value="{{$spell->coste}}">
    <br>
    <label for="daño">Caras del dado que usa el hechizo</label>
    <input type="number" id="daño" name="daño" value="{{$spell->daño}}">
    <br>
    <label for="nivel">Nivel del espacio de conjuro del hechizo</label>
    <input type="number" id="nivel" name="nivel" value="{{$spell->nivel}}">
    <br>
    <label for="tipoDaño">Tipo de Daño</label>
    <select name="tipoDaño" id="tipoDaño">
        <option value="acido" {{ $spell->tipoDaño == 'acido' ? 'selected' : '' }}>Ácido</option>
        <option value="cura" {{ $spell->tipoDaño == 'cura' ? 'selected' : '' }}>Curativo</option>
        <option value="fuego" {{ $spell->tipoDaño == 'fuego' ? 'selected' : '' }}>Fuego</option>
        <option value="fuerza" {{ $spell->tipoDaño == 'fuerza' ? 'selected' : '' }}>Fuerza</option>
        <option value="frio" {{ $spell->tipoDaño == 'frio' ? 'selected' : '' }}>Frío</option>
        <option value="necrotico" {{ $spell->tipoDaño == 'necrotico' ? 'selected' : '' }}>Necrótico</option>
        <option value="psiquico" {{ $spell->tipoDaño == 'psiquico' ? 'selected' : '' }}>Psíquico</option>
        <option value="radiante" {{ $spell->tipoDaño == 'radiante' ? 'selected' : '' }}>Radiante</option>
        <option value="rayo" {{ $spell->tipoDaño == 'rayo' ? 'selected' : '' }}>Rayo</option>
        <option value="trueno" {{ $spell->tipoDaño == 'trueno' ? 'selected' : '' }}>Trueno</option>
        <option value="veneno" {{ $spell->tipoDaño == 'veneno' ? 'selected' : '' }}>Veneno</option>
        <option value="sin" {{ $spell->tipoDaño == 'sin' ? 'selected' : '' }}>Efecto de la descripción</option>
    </select>

    <br>
    <input type="checkbox" name="ataque" id="ataque" value="1" {{ $spell->ataque ? 'checked' : '' }}>
    <label for="ataque">El lanzador del conjuro necesita hacer tirada de ataque </label>
    <br>
    <input type="submit" value="Guardar">
</form>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
@endsection('body')
