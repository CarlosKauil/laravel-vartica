@vite('resources/css/app.css')

<div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 bg-cover bg-center" style="background-image: url('{{ asset('/template/img/fondo-2.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="w-full max-w-md sm:max-w-lg md:max-w-xl lg:max-w-2xl p-6 bg-white bg-opacity-90 rounded-lg shadow-lg backdrop-blur-md">
        <h2 class="text-2xl font-bold text-center mb-6">Registro de Artista</h2>

        @if(session('success'))
            <div class="mb-4 p-3 text-green-700 bg-green-100 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('artista.register') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Nombre Completo -->
            <div>
                <label for="nombre_completo" class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                <input type="text" id="nombre_completo" name="nombre_completo" value="{{ old('nombre_completo') }}" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300">
                @error('nombre_completo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Correo Electrónico -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contraseña -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmar Contraseña -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300">
            </div>
            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <!-- Alias Artístico -->
            <div>
                <label for="aleas" class="block text-sm font-medium text-gray-700">Alias Artístico</label>
                <input type="text" id="aleas" name="aleas" value="{{ old('aleas') }}" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300">
                @error('aleas')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Fecha de Nacimiento -->
            <div>
                <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required
                    class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300">
                @error('fecha_nacimiento')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Área Artística (Nuevo) -->
            <div>
                <label for="id_area" class="block text-sm font-medium text-gray-700">Área Artística</label>
                <select id="id_area" name="id_area" required class="w-full p-2 border border-gray-300 rounded focus:ring focus:ring-blue-300">
                    <option value="">Seleccione un área</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id_area }}" {{ old('id_area') == $area->id_area ? 'selected' : '' }}>
                            {{ $area->nombre_area }}
                        </option>
                    @endforeach
                </select>
                @error('id_area')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón de Registro -->
            <button type="submit" class="w-full p-3 text-white bg-blue-600 rounded hover:bg-blue-700">Registrarse</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const password = document.getElementById("password");
    const passwordConfirmation = document.getElementById("password_confirmation");

    form.addEventListener("submit", function (event) {
        if (password.value !== passwordConfirmation.value) {
            event.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Las contraseñas no coinciden. Por favor, verifica e inténtalo de nuevo.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Entendido'
            });
        }
    });
});
</script>
