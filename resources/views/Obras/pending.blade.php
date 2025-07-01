@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Obras Pendientes</h1>

        @if ($obras->isEmpty())
            <div class="alert alert-info">
                No hay obras pendientes en este momento.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Fecha de Envío</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obras as $obra)
                            <tr>
                                <td class="text-center">{{ $obra->id_obra }}</td>
                                <td>{{ $obra->nombre_obra }}</td>
                                <td>{{ $obra->usuario->nombre_completo }}</td>
                                <td class="text-center">{{ $obra->created_at->format('d/m/Y') }}</td>
                                <td class="text-center">
                                <a href="{{ route('obras.show', $obra->id_obra) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i> Ver
                                </a>
                                <form action="{{ route('obras.approve', $obra->id_obra) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="bi bi-check-circle"></i> Aprobar
                                    </button>
                                </form>
                                <form action="{{ route('obras.reject', $obra->id_obra) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-x-circle"></i> Rechazar
                                    </button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
