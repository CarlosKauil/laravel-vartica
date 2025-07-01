@extends('layouts.app')

@section('sub-tittle')
    Bienvenido  al panel administrativo
@endsection

@section('informacion')

@endsection

@section('content')
    <div class="container mx-auto mt-10">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg text-center">
            <!-- Imagen de perfil -->
            <div class="flex justify-center ">
                <img src="{{ asset('Template/img/profile.jpg') }}" 
                     alt="Foto de perfil" 
                     class="img-fluid rounded-circle border border-3 border-secondary shadow mx-auto d-block" 
                     style="width: 128px; height: 128px; object-fit: cover;">
            </div>

            <!-- Información del usuario -->
            <h1 class="text-3xl font-bold text-gray-800 mt-4">Bienvenido al Dashboard</h1>
            <p class="mt-2 text-lg text-gray-600">
                Hola, <span class="font-semibold">{{ Auth::user()->nombre_completo }}</span>
            </p>
            <p class="text-gray-500">
                Tu correo: <span class="font-medium">{{ Auth::user()->email }}</span>
            </p>

            <div class="mt-6">
                <a href="{{ route('logout') }}" 
                   class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                   Cerrar Sesión
                </a>
            </div>
        </div>
    </div>
@endsection
