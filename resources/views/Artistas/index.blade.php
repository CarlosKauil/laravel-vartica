<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<section id="artistas">
    <h2>Artistas Destacados</h2>
    <div id="lista-artistas" class="grid-container">
        @foreach ($artistas as $artista)
            <div class="artista-card">
                <h3>{{ $artista->aleas }}</h3>
                <p>Fecha de Nacimiento: {{ $artista->fecha_nacimiento }}</p>
                <p>ID Área: {{ $artista->id_area }}</p>
            </div>
        @endforeach
    </div>
</section>

<script src="{{ asset('js/script.js') }}"></script>
