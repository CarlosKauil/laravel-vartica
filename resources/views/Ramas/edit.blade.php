@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Rama</h2>

    <form action="{{ route('ramas.update', $rama->id_rama) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre de la Rama:</label>
            <input type="text" name="nombre_rama" class="form-control" value="{{ $rama->nombre_rama }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Área:</label>
            <select name="id_area" class="form-select" required>
                @foreach($areas as $area)
                    <option value="{{ $area->id_area }}" {{ $rama->id_area == $area->id_area ? 'selected' : '' }}>
                        {{ $area->nombre_area }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar</button>
        <a href="{{ route('ramas.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancelar</a>
    </form>
</div>
@endsection
