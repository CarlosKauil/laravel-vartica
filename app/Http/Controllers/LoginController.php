<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostrar la vista de inicio de sesión
    public function showLoginForm()
    {
        return view('Login.login');
    }

    // Método de inicio de sesión personalizado
    public function iniciar_sesion(Request $request)
    {
        // Validación de datos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session()->flash('Bienvenido', '¡Inicio de sesión exitoso!');

            return redirect()->intended($this->redirectPath());
        }

        session()->flash('error', 'Algunos datos no son correctos. Verifica los campos e intenta nuevamente.');
        return redirect()->route('login')->withInput();
    }

    // Redefinir el método de redirección después de iniciar sesión
    protected function redirectPath()
    {
        $user = Auth::user();
    
        if (!$user) {
            return route('login'); // Redirigir al login si no hay usuario autenticado
        }
    
        switch ($user->id_rol) {
            case 1: // Los valores en la base de datos son enteros, no strings
                return route('home'); // Administrador
            case 3:
                return route('home'); // Cliente
            default:
                return route('homeuser'); // Otros roles
        }
    }
    

    // Método de cierre de sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
