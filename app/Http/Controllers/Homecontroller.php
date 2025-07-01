<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Constructor para proteger la ruta si se requiere autenticación.
     */
    public function __construct()
    {
        // Si necesitas autenticación, descomenta esta línea.
        // $this->middleware('auth');
    }

    /**
     * Retorna la vista del dashboard.
     */
    public function home()
    {
        return view('layouts.home'); 
    }

    public function Page(){
        return view('layouts.page');
    }
}
