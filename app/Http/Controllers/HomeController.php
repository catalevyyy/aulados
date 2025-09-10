<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the welcome page.
     */
    public function welcome()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        // Si no tenemos modelos todavía, usamos datos de ejemplo
        $stats = [
            'totalAulas' => 0,
            'totalMaterias' => 0, 
            'totalDocentes' => 0,
            'totalReservas' => 0
        ];

        // Intentar obtener datos reales si los modelos existen
        try {
            if (class_exists('App\Models\Aula')) {
                $stats['totalAulas'] = \App\Models\Aula::count();
            }
            if (class_exists('App\Models\Materia')) {
                $stats['totalMaterias'] = \App\Models\Materia::count();
            }
            if (class_exists('App\Models\Docente')) {
                $stats['totalDocentes'] = \App\Models\Docente::count();
            }
            if (class_exists('App\Models\Reserva')) {
                $stats['totalReservas'] = \App\Models\Reserva::count();
            }
        } catch (\Exception $e) {
            // Si hay error de base de datos, mantener los ceros
        }

        return view('dashboard', $stats);
    }
}