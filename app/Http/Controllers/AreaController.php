<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    /**
     * Muestra la lista de todas las áreas.
     */
    public function index()
    {
        $areas = Area::paginate(10);
        return view('areas.index', compact('areas'));
    }

    /**
     * Muestra el formulario para crear una nueva área.
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Guarda una nueva área en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_area' => 'required|string|max:100|unique:areas'
        ]);

        Area::create($request->all());

        return redirect()->route('areas.index')->with('success', 'Área creada exitosamente.');
    }

    /**
     * Muestra los detalles de un área específica.
     */
    public function show($id_area)
    {
        $area = Area::findOrFail($id_area);
        return view('areas.show', compact('area'));
    }

    /**
     * Muestra el formulario para editar un área existente.
     */
    public function edit($id_area)
    {
        $area = Area::findOrFail($id_area);
        return view('areas.edit', compact('area'));
    }

    /**
     * Actualiza un área en la base de datos.
     */
    public function update(Request $request, $id_area)
    {
        $request->validate([
            'nombre_area' => 'required|string|max:100|unique:areas,nombre_area,' . $id_area . ',id_area'
        ]);

        $area = Area::findOrFail($id_area);
        $area->update($request->all());

        return redirect()->route('areas.index')->with('success', 'Área actualizada exitosamente.');
    }

    /**
     * Elimina un área de la base de datos.
     */
    public function destroy($id_area)
    {
        $area = Area::findOrFail($id_area);
        $area->delete();

        return redirect()->route('areas.index')->with('success', 'Área eliminada exitosamente.');
    }
}
