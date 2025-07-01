@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Áreas</h1>
    <a href="{{ route('areas.create') }}" class="btn btn-primary">Nueva Área</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($areas as $area)
            <tr>
                <td>{{ $area->id_area }}</td>
                <td>{{ $area->nombre_area }}</td>
                <td>
                    <a href="{{ route('areas.edit', $area->id_area) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('areas.destroy', $area->id_area) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar esta área?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $areas->links() }} <!-- Paginación -->
</div>
@endsection
