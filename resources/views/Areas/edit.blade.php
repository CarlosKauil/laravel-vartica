@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Área</h1>

    <form action="{{ route('areas.update', $area->id_area) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="nombre_area" class="form-label">Nombre del Área</label>
            <input type="text" class="form-control" name="nombre_area" value="{{ $area->nombre_area }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('areas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
