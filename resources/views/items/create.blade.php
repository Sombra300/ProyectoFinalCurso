@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{ route('items.store') }}" method="POST" id="itemForm" class="container mt-4">
    @csrf

    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <select name="tipo" id="tipo" class="form-select">
            <option value="item" {{ old('tipo') == 'item' ? 'selected' : '' }}>Objeto</option>
            <option value="weapon" {{ old('tipo') == 'weapon' ? 'selected' : '' }}>Arma</option>
            <option value="armor" {{ old('tipo') == 'armor' ? 'selected' : '' }}>Armadura</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}">
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion') }}">
    </div>

    <div class="mb-3">
        <label for="peso" class="form-label">Peso</label>
        <input type="number" id="peso" name="peso" class="form-control" value="{{ old('peso') }}">
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio en monedas de oro</label>
        <input type="number" id="precio" name="precio" class="form-control" value="{{ old('precio') }}">
    </div>

    <div id="extra" class="mb-3"></div>

    <div class="mb-3">
        <input type="submit" value="Guardar" class="btn btn-success w-100">
    </div>
</form>

@if ($errors->any())
    <div class="container mt-3">
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif


@endsection('body')

@section('scrips')
<script>
    const extra = document.getElementById('extra')
    const tipo = document.getElementById('tipo')
    const itemForm = document.getElementById('itemForm')

    const routes = {
        item: "{{ route('items.store') }}",
        weapon: "{{ route('weapons.store') }}",
        armor: "{{ route('armors.store') }}"
    }

    function updateForm() {
        const selectedType = tipo.value
        itemForm.action = routes[selectedType] || routes['item']

        if (selectedType === 'item') {
            extra.innerHTML = ''
        }

        if (selectedType === 'weapon') {
            extra.innerHTML = `
                <div class="mb-3">
                    <label for="tipoArma" class="form-label">Tipo de arma</label>
                    <select name="tipoArma" id="tipoArma" class="form-select">
                        <option value="simple">Simple</option>
                        <option value="marcial">Marcial</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tipoDaño" class="form-label">Tipo de daño</label>
                    <select name="tipoDaño" id="tipoDaño" class="form-select">
                        <option value="contundente" {{ old('tipoDaño') == 'contundente' ? 'selected' : '' }}>Contundente</option>
                        <option value="perforante" {{ old('tipoDaño') == 'perforante' ? 'selected' : '' }}>Perforante</option>
                        <option value="cortante" {{ old('tipoDaño') == 'cortante' ? 'selected' : '' }}>Cortante</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="daño" class="form-label">Número de caras del dado</label>
                    <input type="number" id="daño" name="daño" class="form-control" value="{{ old('daño') }}">
                </div>

                <div class="mb-3">
                    <label for="alcanceNormal" class="form-label">Alcance</label>
                    <input type="number" id="alcanceNormal" name="alcanceNormal" class="form-control" value="{{ old('alcanceNormal') }}">
                </div>

                <div class="mb-3">
                    <label for="alcanceExtra" class="form-label">Alcance extra con desventaja</label>
                    <input type="number" id="alcanceExtra" name="alcanceExtra" class="form-control" value="{{ old('alcanceExtra') }}">
                </div>

                <div class="form-check mb-2">
                    <input type="checkbox" id="propSut" name="propSut" value="1" class="form-check-input" {{ old('propSut') ? 'checked' : '' }}>
                    <label for="propSut" class="form-check-label">Sutil</label>
                </div>

                <div class="form-check mb-2">
                    <input type="checkbox" id="prop2Manos" name="prop2Manos" value="1" class="form-check-input" {{ old('prop2Manos') ? 'checked' : '' }}>
                    <label for="prop2Manos" class="form-check-label">A 2 manos</label>
                </div>

                <div class="form-check mb-2">
                    <input type="checkbox" id="propPesada" name="propPesada" value="1" class="form-check-input" {{ old('propPesada') ? 'checked' : '' }}>
                    <label for="propPesada" class="form-check-label">Pesada</label>
                </div>
            `
        }

        if (selectedType === 'armor') {
            extra.innerHTML = `
                <div class="mb-3">
                    <label for="tipoArm" class="form-label">Tipo de armadura</label>
                    <select name="tipoArm" id="tipoArm" class="form-select">
                        <option value="ligera" {{ old('tipoArm') == 'ligera' ? 'selected' : '' }}>Ligera</option>
                        <option value="media" {{ old('tipoArm') == 'media' ? 'selected' : '' }}>Media</option>
                        <option value="pesada" {{ old('tipoArm') == 'pesada' ? 'selected' : '' }}>Pesada</option>
                        <option value="escudo" {{ old('tipoArm') == 'escudo' ? 'selected' : '' }}>Escudo</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="CA" class="form-label">Clase armadura</label>
                    <input type="number" id="CA" name="CA" class="form-control" value="{{ old('CA') }}">
                </div>

                <div class="mb-3">
                    <label for="DESMax" class="form-label">Bono máximo por modificador de destreza</label>
                    <input type="number" id="DESMax" name="DESMax" class="form-control" value="{{ old('DESMax') }}">
                </div>

                <div class="form-check mb-2">
                    <input type="checkbox" id="desSig" name="desSig" value="1" class="form-check-input" {{ old('desSig') ? 'checked' : '' }}>
                    <label for="desSig" class="form-check-label">Desventaja en sigilo</label>
                </div>
            `
        }
    }

    document.addEventListener('DOMContentLoaded', updateForm);
    tipo.addEventListener('change', updateForm);
</script>
@endsection


