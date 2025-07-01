@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detalles de la Rama</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><strong>Nombre:</strong> {{ $rama->nombre_rama }}</h5>
            <p class="card-text"><strong>Área:</strong> {{ $rama->area->nombre_area }}</p>
            <a href="{{ route('ramas.index') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Volver</a>
        </div>
    </div>
</div>
@endsection
