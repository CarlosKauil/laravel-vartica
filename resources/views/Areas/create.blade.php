@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Área</h1>

    <form action="{{ route('areas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre_area" class="form-label">Nombre del Área</label>
            <input type="text" class="form-control" name="nombre_area" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('areas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
