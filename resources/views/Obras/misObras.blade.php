@extends('layouts.app')

@section('content')


    <div class="container">
      
        <h2>Mis Obras</h2>

        @if(auth()->user()->id_rol == 3)
            <div class="text-start">
                <a href="{{ route('obras.create') }}" class="btn btn-primary m-3">
                    <i class="fas fa-plus"></i> Agregar
                </a>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($obras->isEmpty())
            <p>No has subido ninguna obra aún.</p>
        @else
            <div class="row">
                @foreach ($obras as $obra)
                    <div class="col-md-4">
                        <div class="card">
                            <img 
                            src="{{ asset('storage/' . $obra->archivo) }}" 
                            class="card-img-top img-fluid p-2" 
                            style="object-fit: cover; height: 90px;" 
                            alt="{{ $obra->nombre_obra }}"
                            >
                            <div class="card-body">
                                <h5 class="card-title">{{ $obra->nombre_obra }}</h5>
                                <p class="card-text">{{ $obra->descripcion }}</p>
                                <p>
                                    <strong>Estado:</strong> 
                                    <span class="
                                        @if(strtolower($obra->estado->nombre_estado) === 'rechazada') text-danger 
                                        @elseif(strtolower($obra->estado->nombre_estado) === 'aprobado') text-success 
                                        @elseif(strtolower($obra->estado->nombre_estado) === 'pendiente') text-warning 
                                        @else text-secondary 
                                        @endif">
                                        {{ ucfirst($obra->estado->nombre_estado) }}
                                    </span>
                                </p>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
