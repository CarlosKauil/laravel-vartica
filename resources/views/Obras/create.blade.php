@extends('layouts.app')


@section('sub-tittle')
Carga tu obra al sistema
@endsection

@section('informacion')
Ingresa la la información correcta
@endsection

@section('content')

<div class="container">
    <a href="{{route('obras.misObras')}}" class="btn btn-primary m-3">
        <i class="fas fa-arrow-left"></i>

                Volver

            </a>
    <div class="card">
        <div class="card-header">
            <h2 class="mb-4 text-center">Subir Nueva Obra</h2>
        </div>

    {{-- Mensajes de error globales --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Por favor corrige los errores:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="card-body">
            <form action="{{ route('obras.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                   <div class="col-md-6">
                        <label for="archivo">Archivo</label>
                        <input type="file" name="archivo" id="archivo" class="form-control @error('archivo') is-invalid @enderror" accept="image/*" required>
                        @error('archivo')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror

                        <!-- Vista previa -->
                        <div id="preview-container" class="mt-2">
                            <img id="preview-image"
                             src="img-onbra" 
                             alt="Vista previa"
                              class="img-fluid rounded shadow-sm border img-thumbnail"
                               style="max-width: 100%; height: auto; display: none;" 
                               />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="nombre_obra">Nombre de la Obra</label>
                        <input type="text" name="nombre_obra" id="nombre_obra" class="form-control @error('nombre_obra') is-invalid @enderror" value="{{ old('nombre_obra') }}" required>
                        @error('nombre_obra')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="anio">Año</label>
                        <input type="number" name="anio" id="anio" class="form-control @error('anio') is-invalid @enderror" value="{{ old('anio') }}" required>
                        @error('anio')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="id_rama">Rama Artística</label>
                        <select name="id_rama" id="id_rama" class="form-control @error('id_rama') is-invalid @enderror" required>
                            <option value="">Seleccione una rama artística</option>
                            @foreach ($ramas as $rama)
                                <option value="{{ $rama->id_rama }}" {{ old('id_rama') == $rama->id_rama ? 'selected' : '' }}>
                                    {{ $rama->nombre_rama }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_rama')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="genero">Género</label>
                            <input type="text" name="genero" id="genero" class="form-control @error('genero') is-invalid @enderror" value="{{ old('genero') }}" required>
                            @error('genero')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
               
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mt-3">
                    <i class="fas fa-upload"></i> 
                        Subir Obra
                    </button>
                </div>

            </form>
        </div>
    
    </div>
</div>

<script>
    document.getElementById('archivo').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview-image');

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    });
</script>


@endsection
