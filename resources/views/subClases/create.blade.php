@extends('partials.layoutADMIN')
@section('titulo')

@endsection('titulo')
@section('estilo')

@endsection('estilo')
@section('body')

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Crear Subclase</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('subClases.store') }}" method="post">
                @csrf
                <input type="hidden" name="clase_id" value="{{ $id }}">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" class="form-control">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">Guardar</button>
                </div>
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
        </div>
    </div>
</div>


@endsection('body')
