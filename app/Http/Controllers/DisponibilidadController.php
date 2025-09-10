<?php

namespace App\Http\Controllers;

use App\Models\Disponibilidad;
use App\Models\Aula;
use Illuminate\Http\Request;

class DisponibilidadController extends Controller
{
    public function index()
    {
        $disponibilidades = Disponibilidad::with('aula')->get();
        return view('disponibilidades.index', compact('disponibilidades'));
    }

    public function create()
    {
        $aulas = Aula::all();
        return view('disponibilidades.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'estado' => 'required|in:disponible,ocupada,mantenimiento',
            'aula_id' => 'required|exists:aulas,id'
        ]);

        Disponibilidad::create($request->all());
        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad creada exitosamente! 📅');
    }

    public function show(Disponibilidad $disponibilidad)
    {
        $disponibilidad->load('aula');
        return view('disponibilidades.show', compact('disponibilidad'));
    }

    public function edit(Disponibilidad $disponibilidad)
    {
        $aulas = Aula::all();
        return view('disponibilidades.edit', compact('disponibilidad', 'aulas'));
    }

    public function update(Request $request, Disponibilidad $disponibilidad)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'estado' => 'required|in:disponible,ocupada,mantenimiento',
            'aula_id' => 'required|exists:aulas,id'
        ]);

        $disponibilidad->update($request->all());
        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad actualizada exitosamente! ✨');
    }

    public function destroy(Disponibilidad $disponibilidad)
    {
        $disponibilidad->delete();
        return redirect()->route('disponibilidades.index')->with('success', 'Disponibilidad eliminada exitosamente! 🗑️');
    }
}