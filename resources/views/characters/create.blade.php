@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{route('characters.store')}}" method="post">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}">
    <br>
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="row">
                <div class="col-12">
                    <label for="race_id">Raza</label>
                    <select name="race_id" id="race_id">
                        <option value="null">Selecciona una raza</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12" id="divSubraza">
                   <label for="">Subraza</label>
                    <select name="subrace_id" id="subrace_id"></select>
                </div>
            </div>
        </div>


        <div class="col-sm-12 col-md-3">
            <div class="row">
                <div class="col-12">
                    <label for="clase_id">Clase</label>
                    <select name="clase_id" id="clase_id">
                        <option value="null">Selecciona una raza</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="">Subclase</label>
                    <select name="subclase_id" id="subclase_id"></select>
                </div>
            </div>
        </div>


        <div class="col-sm-12 col-md-3">
            <label for="background_id">Transfondo</label>
            <select name="background_id" id="background_id">
                @forelse ($backgrounds as $background)
                    <option value="{{$background->id}}" {{ old('background_id') == $background->id ? 'selected' : '' }}>{{$background->nombre}}</option>
                @empty
                    <option value="null">No hay trasfondos, no puedes crear el personaje</option>
                @endforelse
            </select>
        </div>
    </div>



    <div class="col-12">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-xl-2">
            <div class="col-12">FUE</div>
            <input type="number" name="FUE" id="FUE" value="{{ old('FUE') }}">
            <div class="row">
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="SalvFUE" id="SalvFUE" value="1" {{ old('SalvFUE') ? 'checked' : '' }}>
                    <label for="SalvFUE">Competencia en salvación de fuerza</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompAtletismo" id="CompAtletismo" value="1" {{ old('CompAtletismo') ? 'checked' : '' }}>
                    <label for="CompAtletismo">Competencia en Atletismo</label>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-xl-2">
            <div class="col-12">DES</div>
            <input type="number" name="DES" id="DES" value="{{ old('DES') }}">
            <div class="row">
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="SalvDES" id="SalvDES" value="1" {{ old('SalvDES') ? 'checked' : '' }}>
                    <label for="SalvDES">Competencia en salvación de destreza</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompAcrobacias" id="CompAcrobacias" value="1" {{ old('CompAcrobacias') ? 'checked' : '' }}>
                    <label for="CompAcrobacias">Competencia en Acrobacias</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompJuegoManos" id="CompJuegoManos" value="1" {{ old('CompJuegoManos') ? 'checked' : '' }}>
                    <label for="CompJuegoManos">Competencia en Juego de manos</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompSigilo" id="CompSigilo" value="1" {{ old('CompSigilo') ? 'checked' : '' }}>
                    <label for="CompSigilo">Competencia en Sigilo</label>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-xl-2">
            <div class="col-12">CON</div>
            <input type="number" name="CON" id="CON" value="{{ old('CON') }}">
            <div class="row">
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="SalvCON" id="SalvCON" value="1" {{ old('SalvCON') ? 'checked' : '' }}>
                    <label for="SalvCON">Competencia en salvación de constitución</label>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-xl-2">
            <div class="col-12">INT</div>
            <input type="number" name="INT" id="INT" value="{{ old('INT') }}">
            <div class="row">
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="SalvINT" id="SalvINT" value="1" {{ old('SalvINT') ? 'checked' : '' }}>
                    <label for="SalvINT">Competencia en salvación de inteligencia</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompConocimArcano" id="CompConocimArcano" value="1" {{ old('CompConocimArcano') ? 'checked' : '' }}>
                    <label for="CompConocimArcano">Competencia en Conocimiento Arcano</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompHistoria" id="CompHistoria" value="1" {{ old('CompHistoria') ? 'checked' : '' }}>
                    <label for="CompHistoria">Competencia en Historia</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompInvestigacion" id="CompInvestigacion" value="1" {{ old('CompInvestigacion') ? 'checked' : '' }}>
                    <label for="CompInvestigacion">Competencia en Investigación</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompNaturaleza" id="CompNaturaleza" value="1" {{ old('CompNaturaleza') ? 'checked' : '' }}>
                    <label for="CompNaturaleza">Competencia en naturaleza</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompReligion" id="CompReligion" value="1" {{ old('CompReligion') ? 'checked' : '' }}>
                    <label for="CompReligion">Competencia en Religión</label>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-xl-2">
            <div class="col-12">SAB</div>
            <input type="number" name="SAB" id="SAB" value="{{ old('SAB') }}">
            <div class="row">
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="SalvSAB" id="SalvSAB" value="1" {{ old('SalvSAB') ? 'checked' : '' }}>
                    <label for="SalvSAB">Competencia en salvación de sabiduría</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompMedicina" id="CompMedicina" value="1" {{ old('CompMedicina') ? 'checked' : '' }}>
                    <label for="CompMedicina">Competencia en Medicina</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompPercepcion" id="CompPercepcion" value="1" {{ old('CompPercepcion') ? 'checked' : '' }}>
                    <label for="CompPercepcion">Competencia en Percepción</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompPerspicacia" id="CompPerspicacia" value="1" {{ old('CompPerspicacia') ? 'checked' : '' }}>
                    <label for="CompPerspicacia">Competencia en Perspicacia</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompSupervivencia" id="CompSupervivencia" value="1" {{ old('CompSupervivencia') ? 'checked' : '' }}>
                    <label for="CompSupervivencia">Competencia en Supervivencia</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompTratoAnimales" id="CompTratoAnimales" value="1" {{ old('CompTratoAnimales') ? 'checked' : '' }}>
                    <label for="CompTratoAnimales">Competencia en Trato con animales</label>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-xl-2">
            <div class="col-12">CAR</div>
            <input type="number" name="CAR" id="CAR" value="{{ old('CAR') }}">
            <div class="row">
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="SalvCAR" id="SalvCAR" value="1" {{ old('SalvCAR') ? 'checked' : '' }}>
                    <label for="SalvCAR">Competencia en salvación de carisma</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompEngaño" id="CompEngaño" value="1" {{ old('CompEngaño') ? 'checked' : '' }}>
                    <label for="CompEngaño">Competencia en Engaño</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompInterpretacion" id="CompInterpretacion" value="1" {{ old('CompInterpretacion') ? 'checked' : '' }}>
                    <label for="CompInterpretacion">Competencia en Interpretación</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompIntimidacion" id="CompIntimidacion" value="1" {{ old('CompIntimidacion') ? 'checked' : '' }}>
                    <label for="CompIntimidacion">Competencia en Intimidación</label>
                </div>
                <div class="col-12" style="display: flex; align-items: center;">
                    <input type="checkbox" name="CompPersuasion" id="CompPersuasion" value="1" {{ old('CompPersuasion') ? 'checked' : '' }}>
                    <label for="CompPersuasion">Competencia en Persuasión</label>
                </div>
            </div>

        </div>
    </div>
    <div class="row g-3">

        <div class="col-md-12">
            <h6 class="card-title">Historia del personaje</h6>
            <textarea class="form-control p-4 text-center" rows="5" name="historiaPersonaje">{{ old('historiaPersonaje') }}</textarea>
        </div>

        <div class="col-md-6">
            <h6 class="card-title">Rasgos del personaje</h6>
            <textarea class="form-control p-4 text-center" rows="5" name="rasfosPersonaje">{{ old('rasfosPersonaje') }}</textarea>
        </div>

        <div class="col-md-6">
            <h6 class="card-title">Ideales del Personaje</h6>
            <textarea class="form-control p-4 text-center" rows="5" name="idealesPersonaje">{{ old('idealesPersonaje') }}</textarea>
        </div>

        <div class="col-md-6">
            <h6 class="card-title">Vínculos del personaje</h6>
            <textarea class="form-control p-4 text-center" rows="5" name="vinculosPersonaje">{{ old('vinculosPersonaje') }}</textarea>
        </div>

        <div class="col-md-6">
            <h6 class="card-title">Defectos/manías del personaje</h6>
            <textarea class="form-control p-4 text-center" rows="5" name="defectosPersonaje">{{ old('defectosPersonaje') }}</textarea>
        </div>

    </div>



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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectRaza = document.getElementById('race_id')
        const selectSubraza = document.getElementById('subrace_id')

        const raceData = @json($races)

        raceData.forEach(race => {
            let option=document.createElement('option')
            option.value=race.id
            option.textContent=race.nombre
            selectRaza.appendChild(option)
        })

        selectRaza.addEventListener('change', function () {
            const razaID = parseInt(this.value)
            selectSubraza.innerHTML = ''

            const razaSeleccionada = raceData.find(item => item.id === razaID)

            if (razaSeleccionada.subraces.length > 0) {
                razaSeleccionada.subraces.forEach(subrace => {
                    let option = document.createElement('option')
                    option.value = subrace.id
                    option.textContent = subrace.nombre
                    selectSubraza.appendChild(option)
                });
            } else {
                let option = document.createElement('option')
                option.value = "";
                option.textContent = "Esta raza no tiene subrazas"
                selectSubraza.appendChild(option)
            }
        })

    })

</script>

<script>//clases
    document.addEventListener('DOMContentLoaded', function () {
        const selectClase = document.getElementById('clase_id')
        const selectSubclase = document.getElementById('subclase_id')

        const claseData = @json($clases)

        claseData.forEach(clase => {
            let option=document.createElement('option')
            option.value=clase.id
            option.textContent=clase.nombre
            selectClase.appendChild(option)
        })

        selectClase.addEventListener('change', function () {
            const claseID = parseInt(this.value)
            selectSubclase.innerHTML=''

            const claseSeleccionada=claseData.find(i=>i.id === claseID)

            if (claseSeleccionada.subclases.length > 0&&claseSeleccionada.lvlSubClase==1) {
                claseSeleccionada.subclases.forEach(subclase => {
                    let option = document.createElement('option')
                    option.value = subclase.id
                    option.textContent = subclase.nombre
                    selectSubclase.appendChild(option)
                });
            } else {
                let option = document.createElement('option')
                option.value = "";
                option.textContent = "Sin subclase en este nivel"
                selectSubclase.appendChild(option)
            }
        })

    })
</script>

