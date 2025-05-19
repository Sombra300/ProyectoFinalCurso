const extra = document.getElementById('extra');
const type = document.getElementById('type');
const itemForm = document.getElementById('itemForm');

const routes = {
    item: "{{ route('items.store') }}",
    weapon: "{{ route('weapon.store') }}",
    armor: "{{ route('armor.store') }}"
};


function updateFormContent() {
    const selectedType = type.value


    itemForm.action = routes[selectedType] || routes['item']


    if (selectedType == 'item') {
        extra.innerHTML = ''
    }

    if (selectedType == 'weapon') {
        extra.innerHTML = `
            <label for="typeDaño">Tipo de daño</label>
            <select name="typeDaño" id="typeDaño">
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


