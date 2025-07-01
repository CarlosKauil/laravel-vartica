@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalles del Usuario</h2>

    <div class="mb-3">
        <strong>ID:</strong> {{ $usuario->id_usuario }}
    </div>
    <div class="mb-3">
        <strong>Nombre:</strong> {{ $usuario->nombre_completo }}
    </div>
    <div class="mb-3">
        <strong>Email:</strong> {{ $usuario->email }}
    </div>
    <div class="mb-3">
        <strong>Rol:</strong> {{ $usuario->rol->nombre }}
    </div>

    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
