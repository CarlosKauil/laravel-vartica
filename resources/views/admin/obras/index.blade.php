<div class="container mt-4">
    <h2 class="mb-4">Gestión de Obras de Arte</h2>

    <!-- Tabla de obras enviadas -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Artista</th>
                <th>Nombre de la Obra</th>
                <th>Año</th>
                <th>Rama Artística</th>
                <th>Género</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($obras as $obra)
                <tr>
                    <td>{{ $obra->id_obra }}</td>
                    <td>{{ $obra->artista->nombre_completo }}</td>
                    <td>{{ $obra->nombre_obra }}</td>
                    <td>{{ $obra->anio }}</td>
                    <td>{{ $obra->rama_artistica }}</td>
                    <td>{{ $obra->genero }}</td>
                    <td>
                        <span class="badge 
                            @if($obra->id_estado == 1) bg-warning 
                            @elseif($obra->id_estado == 2) bg-success 
                            @else bg-danger 
                            @endif">
                            {{ $obra->estado->nombre_estado }}
                        </span>
                    </td>
                    <td>
                        <!-- Ver Imagen -->
                        <a href="{{ asset('storage/' . $obra->archivo) }}" target="_blank" class="btn btn-info btn-sm">Ver Imagen</a>

                        <!-- Formulario para cambiar estado -->
                        <form action="{{ route('admin.obras.update', $obra->id_obra) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <select name="id_estado" class="form-select d-inline w-auto">
                                @foreach($estados as $estado)
                                    <option value="{{ $estado->id_estado }}" {{ $obra->id_estado == $estado->id_estado ? 'selected' : '' }}>
                                        {{ $estado->nombre_estado }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>