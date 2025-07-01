@vite('resources/css/app.css')

<div class="min-h-screen flex items-center justify-center" 
    style="background-image: url('{{ asset('/template/img/fondo.png') }}'); background-size: cover; background-position: center;">
    <div class="min-h-screen flex items-center justify-center"> 
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
            <img src="{{ asset('/template/img/vartica.png') }}" class="w-62 h-auto mx-auto mb-10" alt="logo-Vartica">
            @if (session('error'))
                <div class="bg-red-500 text-white p-2 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('Bienvenido'))
                <div class="bg-green-500 text-white p-2 rounded mb-4">
                    {{ session('Bienvenido') }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium">Correo Electrónico</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium">Contraseña</label>
                    <input type="password" id="password" name="password" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                        required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-4">
                    <!-- Botón de Iniciar sesión -->
                    <button type="submit" class="w-full sm:w-auto bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                        Iniciar Sesión
                    </button>

                    <!-- Enlace de Iniciar sesión con Google -->
                    <a href="{{ route('google.login') }}" class="flex items-center gap-3 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        <img src="{{ asset('Template/img/google-color-svgrepo-com.svg') }}" class="w-5 h-5" alt="Google">
                        Iniciar sesión con Google
                    </a>
                </div>

                <!-- Botón de Atrás -->
                <div class="mt-4">
                    <a href="{{ route('page.index') }}" class="w-full sm:w-auto bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-600 transition text-center block">
                        Atrás
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
