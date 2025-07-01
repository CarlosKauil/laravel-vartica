@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Editar Usuario</h2>

    <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre Completo</label>
            <input type="text" name="nombre_completo" class="form-control" value="{{ $usuario->nombre_completo }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" value="{{ $usuario->password }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rol</label>
            <select name="id_rol" class="form-control">
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id_rol }}" {{ $usuario->id_rol == $rol->id_rol ? 'selected' : '' }}>
                        {{ $rol->nombre_rol }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
