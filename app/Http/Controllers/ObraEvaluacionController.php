<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObraArte;
use App\Models\EstadosObra;
use App\Models\Rama;
use App\Models\Area;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ObraEvaluacionController extends Controller
{
        // Mostrar todas las obras enviadas
    public function index()
    {
        $obras = ObraArte::with('estado')
                    ->orderBy('created_at', 'desc') // Ordenar por fecha de creación descendente
                    ->get();

        return view('obras.index', compact('obras'));
    }


    public function create()
    {
        $ramas = Rama::orderBy('id_rama', 'asc')->get(); // Ordenadas alfabéticamente
        return view('obras.create', compact('ramas'));
    }

    // Guardar una nueva obra de arte
    public function store(Request $request)
    {
        $request->validate([
            'archivo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nombre_obra' => 'required|string|max:255',
            'anio' => 'required|integer|min:1000|max:' . date('Y'),
            'id_rama' => 'required|integer|exists:ramas,id_rama',
            'genero' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);
    
        $usuario = Auth::user();
        if (!$usuario || $usuario->id_rol !== 3) {
            return redirect()->back()->with('error', 'Solo los artistas pueden subir obras.');
        }
    
        $archivoPath = $request->file('archivo')->store('obras', 'public');
    
        ObraArte::create([
            'id_usuario' => $usuario->id_usuario,
            'archivo' => $archivoPath,
            'nombre_obra' => $request->nombre_obra,
            'anio' => $request->anio,
            'id_rama' => $request->id_rama, // Se usa id_rama en lugar de rama_artistica
            'genero' => $request->genero,
            'descripcion' => $request->descripcion,
            'id_estado' => 1, // Estado inicial "Pendiente"
        ]);
    
        return redirect()->route('obras.misObras')->with('success', 'Obra subida exitosamente.');
    }

    // Mostrar obras pendientes
    public function pending()
    {
        $obras = ObraArte::where('id_estado', 1)->get();
        $obras = ObraArte::with('usuario')->get();
        return view('obras.pending', compact('obras'));
    }

    // Permite mostrar las obras
    public function show($id)
    {
        $obra = ObraArte::with('usuario')->findOrFail($id);
        return view('obras.show', compact('obra'));
    }


    // Aprobar una obra
    public function approve($id)
    {
        try {
            $obra = ObraArte::findOrFail($id);

            if ($obra->id_estado == 2) {
                return back()->with('info', 'Esta obra ya fue aprobada.');
            }

            $obra->update(['id_estado' => 2]); // Estado "Aprobado"
            return back()->with('success', 'Obra aprobada.');
        } catch (\Exception $e) {
            return back()->with('error', 'No se pudo aprobar la obra.');
        }
    }

    // Rechazar una obra
    public function reject($id)
    {
        try {
            $obra = ObraArte::findOrFail($id);

            if ($obra->id_estado == 3) {
                return back()->with('info', 'Esta obra ya fue rechazada.');
            }

            $obra->update(['id_estado' => 3]); // Estado "Rechazado"
            return back()->with('error', 'Obra rechazada.');
        } catch (\Exception $e) {
            return back()->with('error', 'No se pudo rechazar la obra.');
        }
    }

    // Mostrar obras del usuario autenticado
    public function misObras()
    {
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }

        $obras = ObraArte::where('id_usuario', $usuario->id_usuario)
                    ->orderBy('created_at', 'desc') // Ordenar por fecha de creación descendente
                    ->get();

        return view('obras.misObras', compact('obras'));
    }


   

}
