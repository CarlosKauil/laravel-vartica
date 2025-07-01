<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artista;

class ArtistaController extends Controller
{
    public function index()
    {
        $artistas = Artista::select('id_artista', 'aleas', 'fecha_nacimiento', 'id_area')->get();
    
        foreach ($artistas as $artista) {
            echo "ID Artista: " . $artista->id_artista . "<br>";
            echo "Nombre Artístico: " . $artista->aleas . "<br>";
            echo "Fecha de Nacimiento: " . $artista->fecha_nacimiento . "<br>";
            echo "ID Área: " . $artista->id_area . "<br><br>";
        }
    }

}
