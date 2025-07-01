@extends('layouts.app')
@section('sub-tittle')
Listado
@endsection

@section('informacion')
Panel con información detallada sobre cada obra.
@endsection

@section('content')

<h1>Obras Recibidas</h1>

<!-- Muestra mensajes de éxito o error -->
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@elseif(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if(auth()->user()->id_rol == 3)
<div class="text-start">
        <a href="{{ route('obras.create') }}" class="btn btn-primary m-3">
            <i class="fas fa-plus"></i> Agregar
        </a>
    </div>
@endif


<table class="table">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Año</th>
            <th>Género</th>
            <th>Estado</th>
            @if(auth()->user()->id_rol == 1) <!-- Solo los administradores ven estas opciones -->
                <th>Acciones</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($obras as $obra)
        <tr>
            <!-- Muestra la imagen de la obra -->
            <td><img src="{{ asset('storage/' . $obra->archivo) }}" width="100"></td>
            <td>{{ $obra->nombre_obra }}</td>
            <td>{{ $obra->anio }}</td>
            <td>{{ $obra->genero }}</td>
            <td class="
                @if(strtolower($obra->estado->nombre_estado) === 'rechazada') text-danger 
                @elseif(strtolower($obra->estado->nombre_estado) === 'aprobado') text-success 
                @elseif(strtolower($obra->estado->nombre_estado) === 'pendiente') text-warning 
                @else text-secondary 
                @endif">
                {{ ucfirst($obra->estado->nombre_estado) }}
            </td>


            @if(auth()->user()->id_rol == 1)
             <td class="text-center">
                    <div class="d-flex flex-column gap-2">
                        {{-- Botón para ver detalles --}}
                        <a href="{{ route('obras.show', $obra->id_obra) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Ver
                        </a>

                        {{-- Botón para aprobar --}}
                        <form action="{{ route('obras.approve', $obra->id_obra) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fas fa-check"></i>
                                Aprobar
                            </button>
                        </form>

                        {{-- Botón para rechazar --}}
                        <form action="{{ route('obras.reject', $obra->id_obra) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-times"></i>

                                Rechazar
                            </button>
                        </form>
                    </div>
                </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection