<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado y tiene rol de administrador
        if (Auth::check() && Auth::user()->id_rol === 1) {
            return $next($request);
        }

        return redirect('/home')->with('error', 'Acceso denegado.');
    }
}
