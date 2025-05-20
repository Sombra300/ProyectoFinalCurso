@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{route('items.store')}}" method="post" id="itemForm">
    @csrf
    <label for="type">Tipo</label>
    <select name="type" id="type">
        <option value="item">Objeto</option>
        <option value="weapon">Arma</option>
        <option value="armor">Armadura</option>
    </select>
    <br>
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre">
    <br>
    <label for="description">Descripcion</label>
    <input type="text" id="description" name="description">
    <br>
    <label for="peso">Peso</label>
    <input type="number" id="peso" name="peso">
    <br>
    <label for="precio">Precio en monedas de oro</label>
    <input type="number" id="precio" name="precio">
    <br>
    <div id="extra"></div>
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

@section('scrips')
    <script >const extra = document.getElementById('extra');
const type = document.getElementById('type');
const itemForm = document.getElementById('itemForm');

const routes = {
    item: "{{ route('items.store') }}",
    weapon: "{{ route('weapons.store') }}",
    armor: "{{ route('armors.store') }}"
};


function updateFormContent() {
    const selectedType = type.value


    itemForm.action = routes[selectedType] || routes['item']


    if (selectedType == 'item') {
        extra.innerHTML = ''
    }

    if (selectedType == 'weapon') {
        extra.innerHTML = `
            <label for="tipoArma">Tipo de arma</label>
            <select name="tipoArma" id="tipoArma">
                <option value="simple">Simple</option>
                <option value="marcial">Marcial</option>
            </select><br>
            <label for="tipoDaño">Tipo de daño</label>
            <select name="tipoDaño" id="tipoDaño">
                <option value="contundente">Contundente</option>
                <option value="perforante">Perforante</option>
                <option value="cortante">Cortante</option>
            </select><br>

            <label for="daño">Número de caras del dado</label>
            <input type="number" id="daño" name="daño"><br>

            <label for="alcanceNormal">Alcance</label>
            <input type="number" id="alcanceNormal" name="alcanceNormal"><br>

            <label for="alcanceExtra">Alcance extra</label>
            <input type="number" id="alcanceExtra" name="alcanceExtra"><br>

            <input type="checkbox" id="propSut" name="propSut" value="1">
            <label for="propSut">Sutil</label><br>

            <input type="checkbox" id="prop2Manos" name="prop2Manos" value="1">
            <label for="prop2Manos">A 2 manos</label><br>

            <input type="checkbox" id="propPesada" name="propPesada" value="1">
            <label for="propPesada">Pesada</label><br>
        `
    }

    if (selectedType == 'armor') {
        extra.innerHTML = `
            <label for="typeArm">Tipo de armadura</label>
            <select name="typeArm" id="typeArm">
                <option value="ligera">Ligera</option>
                <option value="media">Media</option>
                <option value="pesada">Pesada</option>
                <option value="escudo">Escudo</option>
            </select><br>

            <label for="CA">Clase armadura</label>
            <input type="number" id="CA" name="CA"><br>

            <label for="desMax">Bono máximo por modificador de destreza</label>
            <input type="number" id="desMax" name="desMax"><br>

            <input type="checkbox" id="desSig" name="desSig" value="1">
            <label for="desSig">Desventaja en sigilo</label><br>
        `
    }
}


document.addEventListener('DOMContentLoaded', updateFormContent)

type.addEventListener('change', updateFormContent)


</script>
@endsection

