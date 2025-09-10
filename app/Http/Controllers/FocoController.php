<?php

namespace App\Http\Controllers;

use App\Models\Foco;
use App\Models\Aula;
use Illuminate\Http\Request;

class FocoController extends Controller
{
    public function index()
    {
        $focos = Foco::with('aula')->get();
        return view('focos.index', compact('focos'));
    }

    public function create()
    {
        $aulas = Aula::all();
        return view('focos.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:focos|max:255',
            'tipo' => 'required|in:led,incandescente,halogeno',
            'ubicacion' => 'required|max:255',
            'intensidad' => 'required|in:baja,media,alta',
            'estado' => 'required|in:operativo,quemado,parpadeo',
            'aula_id' => 'required|exists:aulas,id'
        ]);

        Foco::create($request->all());
        return redirect()->route('focos.index')->with('success', 'Foco creado exitosamente! 💡');
    }

    public function show(Foco $foco)
    {
        $foco->load('aula', 'reservas');
        return view('focos.show', compact('foco'));
    }

    public function edit(Foco $foco)
    {
        $aulas = Aula::all();
        return view('focos.edit', compact('foco', 'aulas'));
    }

    public function update(Request $request, Foco $foco)
    {
        $request->validate([
            'codigo' => 'required|max:255|unique:focos,codigo,' . $foco->id,
            'tipo' => 'required|in:led,incandescente,halogeno',
            'ubicacion' => 'required|max:255',
            'intensidad' => 'required|in:baja,media,alta',
            'estado' => 'required|in:operativo,quemado,parpadeo',
            'aula_id' => 'required|exists:aulas,id'
        ]);

        $foco->update($request->all());
        return redirect()->route('focos.index')->with('success', 'Foco actualizado exitosamente! ✨');
    }

    public function destroy(Foco $foco)
    {
        $foco->delete();
        return redirect()->route('focos.index')->with('success', 'Foco eliminado exitosamente! 🗑️');
    }
}