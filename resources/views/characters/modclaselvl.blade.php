@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="form-container">
    <form action="{{route('characters.updateClaseLVL')}}" method="post">
        @csrf
        <input type="hidden" name="character_id" value="{{ $character->id }}">
        <input type="hidden" name="clase_id" value="{{ $clase->id }}">
        <label for="subject">{{$clase->nombre}}</label>
        <br>
        <label for="subclase_id">Subclase</label>
        <select name="subclase_id" id="subclase_id"></select>
        <br>
        <label for="lvl">Nivel de la clase</label>
        <input type="number" name="lvl" id="lvl" value="{{$currentlvl}}">
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
</div>

@endsection('body')
@section('scrips')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const lvl=document.getElementById('lvl')
        const selectSubclases=document.getElementById('subclase_id')

        const subclasesData = @json($subClases);
        const claseData = @json($clase);

        function Subclases() {
            var actlvl=parseInt(lvl.value)
            selectSubclases.innerHTML=''

            if (actlvl>=claseData.lvlSubClase) {
                subclasesData.forEach(function(subclase) {
                    let option=document.createElement('option')
                    option.value=subclase.id
                    option.textContent=subclase.nombre
                    selectSubclases.appendChild(option)
                })
            }
        }

        Subclases()

        lvl.addEventListener('change', Subclases)
    })
</script>
