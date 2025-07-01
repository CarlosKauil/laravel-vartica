@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Agregar Nueva Rama</h2>

    <form action="{{ route('ramas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre de la Rama:</label>
            <input type="text" name="nombre_rama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Área:</label>
            <select name="id_area" class="form-select" required>
                @foreach($areas as $area)
                    <option value="{{ $area->id_area }}">{{ $area->nombre_area }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
        <a href="{{ route('ramas.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancelar</a>
    </form>
</div>
@endsection
