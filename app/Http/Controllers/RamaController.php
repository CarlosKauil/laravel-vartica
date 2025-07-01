<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rama;
use App\Models\Area;

class RamaController extends Controller
{
    /**
     * Muestra la lista de todas las ramas.
     */
    public function index()
    {
        $ramas = Rama::with('area')->paginate(10); // Cargar las ramas con sus áreas
        return view('ramas.index', compact('ramas'));
    }

    /**
     * Muestra el formulario para crear una nueva rama.
     */
    public function create()
    {
        $areas = Area::all(); // Obtener todas las áreas
        return view('ramas.create', compact('areas'));
    }

    /**
     * Guarda una nueva rama en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_rama' => 'required|string|max:100|unique:ramas',
            'id_area' => 'required|exists:areas,id_area' // Validar que el área exista
        ]);

        Rama::create($request->all()); // Crear la nueva rama

        return redirect()->route('ramas.index')->with('success', 'Rama creada exitosamente.');
    }

    /**
     * Muestra los detalles de una rama específica.
     */
    public function show($id_rama)
    {
        $rama = Rama::with('area')->findOrFail($id_rama); // Obtener la rama con su área
        return view('ramas.show', compact('rama'));
    }

    /**
     * Muestra el formulario para editar una rama existente.
     */
    public function edit($id_rama)
    {
        $rama = Rama::findOrFail($id_rama);
        $areas = Area::all(); // Obtener todas las áreas
        return view('ramas.edit', compact('rama', 'areas'));
    }

    /**
     * Actualiza una rama en la base de datos.
     */
    public function update(Request $request, $id_rama)
    {
        $request->validate([
            'nombre_rama' => 'required|string|max:100|unique:ramas,nombre_rama,' . $id_rama . ',id_rama',
            'id_area' => 'required|exists:areas,id_area' // Validar que el área exista
        ]);

        $rama = Rama::findOrFail($id_rama);
        $rama->update($request->all()); // Actualizar la rama

        return redirect()->route('ramas.index')->with('success', 'Rama actualizada exitosamente.');
    }

    /**
     * Elimina una rama de la base de datos.
     */
    public function destroy($id_rama)
    {
        $rama = Rama::findOrFail($id_rama);
        $rama->delete(); // Eliminar la rama

        return redirect()->route('ramas.index')->with('success', 'Rama eliminada exitosamente.');
    }

    // En RamasConreoller
    public function getRamasPorArea($areaId)
    {
        // Suponiendo que tienes una relación 'ramas' definida en tu modelo 'Area'
        $ramas = Area::find($areaId)->ramas; // O lo que sea apropiado según tu relación
        return response()->json($ramas);
    }
}
