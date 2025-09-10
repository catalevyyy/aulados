<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::withCount('materias')->get();
        return view('docentes.index', compact('docentes'));
    }

    public function create()
    {
        return view('docentes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'dni' => 'required|unique:docentes|max:20',
            'especialidad' => 'required|max:255',
            'email' => 'required|email|unique:docentes',
            'telefono' => 'nullable|max:20',
            'activo' => 'boolean'
        ]);

        Docente::create($request->all());
        return redirect()->route('docentes.index')->with('success', 'Docente creado exitosamente! 👨‍🏫');
    }

    public function show(Docente $docente)
    {
        $docente->load('materias');
        return view('docentes.show', compact('docente'));
    }

    public function edit(Docente $docente)
    {
        return view('docentes.edit', compact('docente'));
    }

    public function update(Request $request, Docente $docente)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'dni' => 'required|max:20|unique:docentes,dni,' . $docente->id,
            'especialidad' => 'required|max:255',
            'email' => 'required|email|unique:docentes,email,' . $docente->id,
            'telefono' => 'nullable|max:20',
            'activo' => 'boolean'
        ]);

        $docente->update($request->all());
        return redirect()->route('docentes.index')->with('success', 'Docente actualizado exitosamente! ✏️');
    }

    public function destroy(Docente $docente)
    {
        $docente->delete();
        return redirect()->route('docentes.index')->with('success', 'Docente eliminado exitosamente! 🗑️');
    }
}