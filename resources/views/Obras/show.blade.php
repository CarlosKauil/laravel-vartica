@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Detalles de la Obra</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $obra->nombre_obra }}</h5>
                <p class="card-text"><strong>Autor:</strong> {{ $obra->usuario->nombre_completo }}</p>
                <p class="card-text"><strong>Fecha de Envío:</strong> {{ $obra->created_at->format('d/m/Y') }}</p>
                <p class="card-text"><strong>Descripción:</strong> {{ $obra->descripcion }}</p>

                @if($obra->archivo)
                    <div class="text-center">
                        <img src="{{ asset('storage/' . $obra->archivo) }}" class="card-img-top" alt="{{ $obra->nombre_obra }}">
                    </div>
                @endif

                <div class="mt-3">
                    <a href="{{ route('obras.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
