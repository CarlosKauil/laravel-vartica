<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artista;
use App\Models\User;
use App\Models\Area;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ArtistaAuthController extends Controller
{
    /*
        Muestra el formulario de registro para artistas
    */
    public function showRegistrationForm()
    {
        $areas = Area::all(); // Asegúrate de importar el modelo 'Area'

        return view('auth.register_artista', compact('areas'));
    }

    /**
     * Procesa el registro de un nuevo artista y su usuario asociado
     */
    public function register(Request $r)
    {
        // Validación de datos
        $r->validate([
            'nombre_completo' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6|confirmed',
            'aleas' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'id_area' => 'required|integer|exists:areas,id_area', // Nuevo campo
        ]);

        try {
            DB::beginTransaction();

            // Crea el usuario
            $usuario = User::create([
                'nombre_completo' => $r->nombre_completo,
                'email' => $r->email,
                'password' => bcrypt($r->password), // 🔹 Usando bcrypt() en lugar de Hash::make()
                'id_rol' => 3, // ID del rol de artista
            ]);

            // Crea el artista vinculado al usuario
            Artista::create([
                'id_usuario' => $usuario->id_usuario,
                'aleas' => $r->aleas,
                'fecha_nacimiento' => $r->fecha_nacimiento,
                'id_area' => $r->id_area, // Ahora guarda el área como ID
            ]);

            DB::commit();

            return redirect()->route('login')->with('success', 'Registro exitoso. Inicia sesión.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('register_artista')->with('error', 'Ocurrió un problema al registrarte. Intenta nuevamente.');
        }
    }
}
