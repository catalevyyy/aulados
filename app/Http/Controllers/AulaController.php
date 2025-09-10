<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function index()
    {
        $aulas = Aula::withCount('materias')->get();
        return view('aulas.index', compact('aulas'));
    }

    public function create()
    {
        return view('aulas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:aulas|max:255',
            'ubicacion' => 'required|max:255',
            'capacidad' => 'required|integer|min:1',
            'caracteristicas' => 'nullable|string'
        ]);

        Aula::create($request->all());
        return redirect()->route('aulas.index')->with('success', 'Aula creada exitosamente! 🌟');
    }

    public function show(Aula $aula)
    {
        $aula->load('materias', 'horarios', 'disponibilidades', 'focos', 'airesAcondicionados');
        return view('aulas.show', compact('aula'));
    }

    public function edit(Aula $aula)
    {
        return view('aulas.edit', compact('aula'));
    }

    public function update(Request $request, Aula $aula)
    {
        $request->validate([
            'nombre' => 'required|max:255|unique:aulas,nombre,' . $aula->id,
            'ubicacion' => 'required|max:255',
            'capacidad' => 'required|integer|min:1',
            'caracteristicas' => 'nullable|string'
        ]);

        $aula->update($request->all());
        return redirect()->route('aulas.index')->with('success', 'Aula actualizada exitosamente! ✨');
    }

    public function destroy(Aula $aula)
    {
        $aula->delete();
        return redirect()->route('aulas.index')->with('success', 'Aula eliminada exitosamente! 🗑️');
    }
}