@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{route('spells.store')}}" method="post">
    @csrf
    @method('put')
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}">
    <br>
    <label for="descripcion">Descripcion</label>
    <input type="text" id="descripcion" name="descripcion" value="{{old('descripcion')}}">
    <br>
    <label for="coste">Coste/Materiales necesarios</label>
    <input type="text" id="coste" name="coste" value="{{old('coste')}}">
    <br>
    <label for="daño">Caras del dado que usa el hechizo</label>
    <input type="number" id="daño" name="daño" value="{{old('daño')}}">
    <br>
    <label for="nivel">Nivel del espacio de conjuro del hechizo</label>
    <input type="number" id="nivel" name="nivel" value="{{old('nivel')}}">
    <br>
    <label for="tipoDaño">Tipo de Daño</label>
    <select name="tipoDaño" id="tipoDaño">
        <option value="acido" {{ old('tipoDaño') == 'acido' ? 'selected' : '' }}>Ácido</option>
        <option value="cura" {{ old('tipoDaño') == 'cura' ? 'selected' : '' }}>Curativo</option>
        <option value="fuego" {{ old('tipoDaño') == 'fuego' ? 'selected' : '' }}>Fuego</option>
        <option value="fuerza" {{ old('tipoDaño') == 'fuerza' ? 'selected' : '' }}>Fuerza</option>
        <option value="frio" {{ old('tipoDaño') == 'frio' ? 'selected' : '' }}>Frío</option>
        <option value="necrotico" {{ old('tipoDaño') == 'necrotico' ? 'selected' : '' }}>Necrótico</option>
        <option value="psiquico" {{ old('tipoDaño') == 'psiquico' ? 'selected' : '' }}>Psíquico</option>
        <option value="radiante" {{ old('tipoDaño') == 'radiante' ? 'selected' : '' }}>Radiante</option>
        <option value="rayo" {{ old('tipoDaño') == 'rayo' ? 'selected' : '' }}>Rayo</option>
        <option value="trueno" {{ old('tipoDaño') == 'trueno' ? 'selected' : '' }}>Trueno</option>
        <option value="veneno" {{ old('tipoDaño') == 'veneno' ? 'selected' : '' }}>Veneno</option>
        <option value="sin" {{ old('tipoDaño') == 'sin' ? 'selected' : '' }}>Efecto de la descripción</option>
    </select>

    <br>
    <input type="checkbox" name="ataque" id="ataque" value="1" {{ old('ataque') ? 'checked' : '' }}>
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
