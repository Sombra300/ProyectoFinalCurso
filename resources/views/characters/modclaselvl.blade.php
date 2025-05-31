@extends('partials.layout')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container my-4 p-4 border rounded shadow-sm bg-light" style="max-width: 450px;">
    <form action="{{ route('characters.updateClaseLVL') }}" method="post">
        @csrf
        <input type="hidden" name="character_id" value="{{ $character->id }}">
        <input type="hidden" name="clase_id" value="{{ $clase->id }}">

        <div class="mb-3">
            <label for="subject" class="form-label">{{ $clase->nombre }}</label>
        </div>

        <div class="mb-3">
            <label for="subclase_id" class="form-label">Subclase</label>
            <select name="subclase_id" id="subclase_id" class="form-select @error('subclase_id') is-invalid @enderror"></select>
            @error('subclase_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="lvl" class="form-label">Nivel de la clase</label>
            <input type="number" name="lvl" id="lvl" value="{{ $currentlvl }}" class="form-control @error('lvl') is-invalid @enderror" min="1">
            @error('lvl')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success w-100">Guardar</button>
    </form>
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
