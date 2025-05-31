@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{ route('spells.update', $spell->id) }}" method="post" class="container mt-4">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $spell->nombre }}">
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ $spell->descripcion }}">
    </div>

    <div class="mb-3">
        <label for="coste" class="form-label">Coste/Materiales necesarios</label>
        <input type="text" id="coste" name="coste" class="form-control" value="{{ $spell->coste }}">
    </div>

    <div class="mb-3">
        <label for="daño" class="form-label">Caras del dado que usa el hechizo</label>
        <input type="number" id="daño" name="daño" class="form-control" value="{{ $spell->daño }}">
    </div>

    <div class="mb-3">
        <label for="nivel" class="form-label">Nivel del espacio de conjuro del hechizo</label>
        <input type="number" id="nivel" name="nivel" class="form-control" value="{{ $spell->nivel }}">
    </div>

    <div class="mb-3">
        <label for="tipoDaño" class="form-label">Tipo de Daño</label>
        <select name="tipoDaño" id="tipoDaño" class="form-select">
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
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" name="ataque" id="ataque" class="form-check-input" value="1" {{ $spell->ataque ? 'checked' : '' }}>
        <label for="ataque" class="form-check-label">El lanzador del conjuro necesita hacer tirada de ataque</label>
    </div>

    <button type="submit" class="btn btn-primary w-100">Guardar</button>
</form>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection('body')
