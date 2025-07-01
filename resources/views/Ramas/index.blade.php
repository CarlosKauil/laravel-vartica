@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Lista de Ramas</h2>

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <a href="{{ route('ramas.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Agregar Rama
    </a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Área</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ramas as $rama)
                <tr>
                    <td>{{ $rama->id_rama }}</td>
                    <td>{{ $rama->nombre_rama }}</td>
                    <td>{{ $rama->area ? $rama->area->nombre_area . ' - ' . $rama->area->id_area : 'Sin área' }}</td>

                    
                    <td>
                        <a href="{{ route('ramas.show', $rama->id_rama) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                        <a href="{{ route('ramas.edit', $rama->id_rama) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('ramas.destroy', $rama->id_rama) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Paginación --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $ramas->appends(request()->query())->links('pagination::bootstrap-5') }} 
    </div>
</div>
@endsection
