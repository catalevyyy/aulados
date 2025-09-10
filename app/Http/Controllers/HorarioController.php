<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Aula;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::with('aula')->get();
        return view('horarios.index', compact('horarios'));
    }

    public function create()
    {
        $aulas = Aula::all();
        return view('horarios.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dia' => 'required|in:lunes,martes,miercoles,jueves,viernes,sabado',
            'periodo' => 'required|in:mañana,tarde,noche',
            'turno' => 'required|max:255',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'aula_id' => 'required|exists:aulas,id'
        ]);

        Horario::create($request->all());
        return redirect()->route('horarios.index')->with('success', 'Horario creado exitosamente! ⏰');
    }

    public function show(Horario $horario)
    {
        $horario->load('aula');
        return view('horarios.show', compact('horario'));
    }

    public function edit(Horario $horario)
    {
        $aulas = Aula::all();
        return view('horarios.edit', compact('horario', 'aulas'));
    }

    public function update(Request $request, Horario $horario)
    {
        $request->validate([
            'dia' => 'required|in:lunes,martes,miercoles,jueves,viernes,sabado',
            'periodo' => 'required|in:mañana,tarde,noche',
            'turno' => 'required|max:255',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'aula_id' => 'required|exists:aulas,id'
        ]);

        $horario->update($request->all());
        return redirect()->route('horarios.index')->with('success', 'Horario actualizado exitosamente! ⏱️');
    }

    public function destroy(Horario $horario)
    {
        $horario->delete();
        return redirect()->route('horarios.index')->with('success', 'Horario eliminado exitosamente! 🗑️');
    }
}