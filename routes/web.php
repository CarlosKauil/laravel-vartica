<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ObraEvaluacionController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ArtistaAuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\RamaController;
use App\Http\Controllers\ArtistaController;


use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user = User::updateOrCreate([
        'email' => $googleUser->getEmail(),
    ], [
        'name' => $googleUser->getName(),
        'google_id' => $googleUser->getId(),
        'password' => bcrypt('password'), // Se requiere un password aunque no se usará
    ]);

    Auth::login($user);

    return redirect('/dashboard'); // Redirige al usuario autenticado
});

// Ruta para mostrar el formulario de login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Ruta para procesar el inicio de sesión
Route::post('/login', [LoginController::class, 'iniciar_sesion'])->name('login.post');
// Ruta para cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ruta para cargar la información de un artista
Route::get('/artistas', [ArtistaController::class, 'index'])->name('artistas.index');
// Ruta del home
Route::get('/home', [HomeController::class, 'home'])->name('home');

// Ruta del registro para artistas
Route::get('/registro-artista', [ArtistaAuthController::class, 'showRegistrationForm'])->name('artista.register.form');
// Ruta que hace la petición para porcesar los datos
Route::post('/registro-artista', [ArtistaAuthController::class, 'register'])->name('artista.register');


Route::get('/Vartica', [HomeController::class, 'page'])->name('page.index');


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');

    // Lista todas las obras enviadas
    Route::get('/obras', [ObraEvaluacionController::class, 'index'])->name('obras.index');
    // Formulario para subir una nueva obra
    Route::get('/obras/create', [ObraEvaluacionController::class, 'create'])->name('obras.create');
    // Apartado del artista para ver sus obras propias
    Route::get('/mis-obras', [ObraEvaluacionController::class, 'misObras'])->name('obras.misObras');
    // Procesa la subida de la obra
    Route::post('/obras', [ObraEvaluacionController::class, 'store'])->name('obras.store');


     // Listado de usuarios
     Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
     // Crear usuario
     Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
     Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
     // Ver usuario
     Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
     // Editar usuario
     Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
     Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
     // Eliminar usuario
     Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');



    // web.php
     Route::get('/get-ramas/{id_area}', [ObraEvaluacionController::class, 'getRamas'])->name('get-ramas');

     Route::resource('areas', AreaController::class);
     Route::resource('ramas', RamaController::class);

    // Rutas solo accesibles para administradores
    Route::middleware(['admin'])->group(function () {
        // Lista de obras pendientes de aprobación
        Route::get('/obras/pending', [ObraEvaluacionController::class, 'pending'])->name('obras.pending');
        // Permite visualizar la obra
        Route::get('/obras/{id}', [ObraEvaluacionController::class, 'show'])->name('obras.show');
        // Aprobar una obra
        Route::post('/obras/{id}/approve', [ObraEvaluacionController::class, 'approve'])->name('obras.approve');
        // Rechazar una obra
        Route::post('/obras/{id}/reject', [ObraEvaluacionController::class, 'reject'])->name('obras.reject');

    });
});

