<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::withCount('aulas')->get();
        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'tipo_cursada' => 'required|in:presencial,virtual,hibrida',
            'carrera' => 'required|max:255',
            'anio' => 'required|integer|min:1|max:5',
            'descripcion' => 'nullable|string'
        ]);

        Materia::create($request->all());
        return redirect()->route('materias.index')->with('success', 'Materia creada exitosamente! 📚');
    }

    public function show(Materia $materia)
    {
        $materia->load('aulas', 'docentes', 'reservas');
        return view('materias.show', compact('materia'));
    }

    public function edit(Materia $materia)
    {
        return view('materias.edit', compact('materia'));
    }

    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'tipo_cursada' => 'required|in:presencial,virtual,hibrida',
            'carrera' => 'required|max:255',
            'anio' => 'required|integer|min:1|max:5',
            'descripcion' => 'nullable|string'
        ]);

        $materia->update($request->all());
        return redirect()->route('materias.index')->with('success', 'Materia actualizada exitosamente! 📖');
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada exitosamente! 🗑️');
    }
}