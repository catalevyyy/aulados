<?php

namespace App\Http\Controllers;

use App\Models\AireAcondicionado;
use App\Models\Aula;
use Illuminate\Http\Request;

class AireAcondicionadoController extends Controller
{
    public function index()
    {
        $aires = AireAcondicionado::with('aula')->get();
        return view('aires.index', compact('aires'));
    }

    public function create()
    {
        $aulas = Aula::all();
        return view('aires.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'estado' => 'required|in:operativo,mantenimiento,descompuesto',
            'marca_modelo' => 'required|max:255',
            'ultimo_mantenimiento' => 'nullable|date',
            'proximo_mantenimiento' => 'nullable|date',
            'temperatura_actual' => 'nullable|integer|min:16|max:30',
            'aula_id' => 'required|exists:aulas,id'
        ]);

        AireAcondicionado::create($request->all());
        return redirect()->route('aires.index')->with('success', 'Aire acondicionado creado exitosamente! ❄️');
    }

    public function show(AireAcondicionado $aire)
    {
        $aire->load('aula');
        return view('aires.show', compact('aire'));
    }

    public function edit(AireAcondicionado $aire)
    {
        $aulas = Aula::all();
        return view('aires.edit', compact('aire', 'aulas'));
    }

    public function update(Request $request, AireAcondicionado $aire)
    {
        $request->validate([
            'estado' => 'required|in:operativo,mantenimiento,descompuesto',
            'marca_modelo' => 'required|max:255',
            'ultimo_mantenimiento' => 'nullable|date',
            'proximo_mantenimiento' => 'nullable|date',
            'temperatura_actual' => 'nullable|integer|min:16|max:30',
            'aula_id' => 'required|exists:aulas,id'
        ]);

        $aire->update($request->all());
        return redirect()->route('aires.index')->with('success', 'Aire acondicionado actualizado exitosamente! ✨');
    }

    public function destroy(AireAcondicionado $aire)
    {
        $aire->delete();
        return redirect()->route('aires.index')->with('success', 'Aire acondicionado eliminado exitosamente! 🗑️');
    }
}