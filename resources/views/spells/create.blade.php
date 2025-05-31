@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{ route('spells.store') }}" method="post" class="container mt-4">
    @csrf

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}">
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion') }}">
    </div>

    <div class="mb-3">
        <label for="coste" class="form-label">Coste/Materiales necesarios</label>
        <input type="text" id="coste" name="coste" class="form-control" value="{{ old('coste') }}">
    </div>

    <div class="mb-3">
        <label for="daño" class="form-label">Caras del dado que usa el hechizo</label>
        <input type="number" id="daño" name="daño" class="form-control" value="{{ old('daño') }}">
    </div>

    <div class="mb-3">
        <label for="nivel" class="form-label">Nivel del espacio de conjuro del hechizo</label>
        <input type="number" id="nivel" name="nivel" class="form-control" value="{{ old('nivel') }}">
    </div>

    <div class="mb-3">
        <label for="tipoDaño" class="form-label">Tipo de Daño</label>
        <select name="tipoDaño" id="tipoDaño" class="form-select">
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
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" name="ataque" id="ataque" class="form-check-input" value="1" {{ old('ataque') ? 'checked' : '' }}>
        <label for="ataque" class="form-check-label">El lanzador del conjuro necesita hacer tirada de ataque</label>
    </div>

    <button type="submit" class="btn btn-success w-100">Guardar</button>
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
