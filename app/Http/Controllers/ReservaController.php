<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Materia;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        $reservas = Reserva::with('materia')->get();
        return view('reservas.index', compact('reservas'));
    }

    public function create()
    {
        $materias = Materia::all();
        return view('reservas.create', compact('materias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'tipo_origen' => 'required|max:255',
            'materia_id' => 'required|exists:materias,id'
        ]);

        Reserva::create($request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva creada exitosamente! 🗓️');
    }

    public function show(Reserva $reserva)
    {
        $reserva->load('materia', 'focos');
        return view('reservas.show', compact('reserva'));
    }

    public function edit(Reserva $reserva)
    {
        $materias = Materia::all();
        return view('reservas.edit', compact('reserva', 'materias'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'tipo_origen' => 'required|max:255',
            'materia_id' => 'required|exists:materias,id'
        ]);

        $reserva->update($request->all());
        return redirect()->route('reservas.index')->with('success', 'Reserva actualizada exitosamente! 📅');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada exitosamente! 🗑️');
    }
}