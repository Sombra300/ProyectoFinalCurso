@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<form action="{{route('characters.store')}}" method="post">
    @csrf
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre">
    <br>
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <label for="">Raza</label>
            <select name="" id="">
                @forelse ($races as $race)
                    <option value="{{$race->id}}">{{$race->nombre}}</option>
                @empty
                    <option value="null">No hay razas, no puedes crear el personaje</option>
                @endforelse
            </select>
        </div>
        <div class="col-sm-12 col-md-3">
            <label for="">Clase inicial</label>
            <select name="" id="">
                @forelse ( $clases as $clase)
                    <option value="{{$clase->id}}">{{$clase->nombre}}</option>
                @empty
                    <option value="null">No hay clases, no puedes crear el personaje</option>
                @endforelse
            </select>
        </div>
        <div class="col-sm-12 col-md-3">
            <label for="transfondo">Transfondo</label>
            <select name="transfondo" id="transfondo">
                @forelse ($backgrounds as $background)
                    <option value="{{$background->id}}">{{$background->nombre}}</option>
                @empty
                    <option value="null">No hay trasfondos, no puedes crear el personaje</option>
                @endforelse
            </select>
        </div>
    </div>
    {{-- //TODO style="width: 300px; height: 140px; font-size: 16px; border: 2px solid #ccc; border-radius: 8px; padding: 10px;" --}}

    <label for="historiaPersonaje">Historia del personaje</label>
    <input type="text" id="historiaPersonaje" name="historiaPersonaje">
    <br>
    <label for="rasgosPersonaje">Rasgos de la personalidad del personaje</label>
    <input type="text" id="rasgosPersonaje" name="rasgosPersonaje">
    <br>
    <label for="idealesPersonaje">Ideales del personaje</label>
    <input type="text" id="idealesPersonaje" name="idealesPersonaje">
    <br>
    <label for="vinculosPersonaje">Vinculos del personaje</label>
    <input type="text" id="vinculosPersonaje" name="vinculosPersonaje">
    <br>
    <label for="defectosPersonaje">Defectos y manias del personaje</label>
    <input type="text" id="defectosPersonaje" name="defectosPersonaje">
    <br>



    <div class="col-12">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-xl-2">
                <input type="text" name="FUE" id="FUE" value="FUE">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompSalvFUE" id="CompSalvFUE">
                        <label for="CompSalvFUE">Competencia en salvación de fuerza</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompAtletismo" id="CompAtletismo">
                        <label for="CompAtletismo">Competencia en Atletismo</label>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-4 col-xl-2">
                <input type="text" name="DES" id="DES" value="DES">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompSalvDES" id="CompSalvDES">
                        <label for="CompSalvDES">Competencia en salvación de destreza</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompAcrobacias" id="CompAcrobacias">
                        <label for="">Competencia en Acrobacias</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompJuegoManos" id="CompJuegoManos">
                        <label for="CompJuegoManos">Competencia en Juego de manos</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompSigilo" id="CompSigilo">
                        <label for="CompSigilo">Competencia en Sigilo</label>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-4 col-xl-2">
                <input type="text" name="CON" id="CON" value="CON">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompSalvCON" id="CompSalvCON">
                        <label for="CompSalvCON">Competencia en salvación de constitucion</label>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-4 col-xl-2">
                <input type="text" name="INT" id="INT" value="INT">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompSalvINT" id="CompSalvINT">
                        <label for="CompSalvINT">Competencia en salvación de inteligencia</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompConocimArcano" id="CompConocimArcano">
                        <label for="CompConocimArcano">Competencia en Conocimiento Arcano</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompHistoria" id="CompHistoria">
                        <label for="CompHistoria">Competencia en Historia</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompInvestigacion" id="CompInvestigacion">
                        <label for="CompInvestigacion">Competencia en Investigación</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompNaturaleza" id="CompNaturaleza">
                        <label for="CompNaturaleza">Competencia en naturaleza</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompReligion" id="CompReligion">
                        <label for="CompReligion">Competencia en Religión</label>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-4 col-xl-2">
                <input type="text" name="SAB" id="SAB" value="SAB">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompSalvSAB" id="CompSalvSAB">
                        <label for="CompSalvSAB">Competencia en salvación de sabiduria</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompMedicina" id="CompMedicina">
                        <label for="CompMedicina">Competencia en Medicina</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompPercepcion" id="CompPercepcion">
                        <label for="CompPercepcion">Competencia en Percepción</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompPerspicacia" id="CompPerspicacia">
                        <label for="CompPerspicacia">Competencia en Perspicacia</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompSupervivencia" id="CompSupervivencia">
                        <label for="CompSupervivencia">Competencia en Supervivencia</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompTratoAnimales" id="CompTratoAnimales">
                        <label for="CompTratoAnimales">Competencia en Trato con animales</label>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-4 col-xl-2">
                <input type="text" name="CAR" id="CAR" value="CAR">
                <div class="row">
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompSalvCAR" id="CompSalvCAR">
                        <label for="">Competencia en salvación de carisma</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompEngaño" id="CompEngaño">
                        <label for="CompEngaño">Competencia en Engaño</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompInterpretacion" id="CompInterpretacion">
                        <label for="CompInterpretacion">Competencia en Interpretación</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompIntimidacion" id="CompIntimidacion">
                        <label for="CompIntimidacion">Competencia en Intimidación</label>
                    </div>
                    <div class="col-12" style="display: flex; align-items: center;">
                        <input type="checkbox" name="CompPersuasion" id="CompPersuasion">
                        <label for="CompPersuasion">Competencia en Persuasión</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
