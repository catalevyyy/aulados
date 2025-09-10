@extends('layouts.app')

@section('title', 'Dashboard - AulaDOS')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="p-4 text-white rounded" style="background: linear-gradient(135deg, #9B59B6, #3498DB);">
                <h1 class="display-4 fw-bold">🏠 Dashboard</h1>
                <p class="lead">Bienvenido al sistema de gestión de aulas</p>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card text-white shadow" style="background: linear-gradient(135deg, #FFD700, #FF7F50);">
                <div class="card-body text-center">
                    <h2>🏫</h2>
                    <h3>{{ $totalAulas }}</h3>
                    <p class="mb-0">Aulas Totales</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white shadow" style="background: linear-gradient(135deg, #2ECC71, #3498DB);">
                <div class="card-body text-center">
                    <h2>📚</h2>
                    <h3>{{ $totalMaterias }}</h3>
                    <p class="mb-0">Materias</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white shadow" style="background: linear-gradient(135deg, #9B59B6, #FF6B8B);">
                <div class="card-body text-center">
                    <h2>👨‍🏫</h2>
                    <h3>{{ $totalDocentes }}</h3>
                    <p class="mb-0">Docentes</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card text-white shadow" style="background: linear-gradient(135deg, #00CED1, #3498DB);">
                <div class="card-body text-center">
                    <h2>🗓️</h2>
                    <h3>{{ $totalReservas }}</h3>
                    <p class="mb-0">Reservas</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header" style="background: linear-gradient(135deg, #FFD700, #FF7F50); color: white;">
                    <h4>⚡ Acciones Rápidas</h4>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('aulas.create') }}" class="btn btn-warning btn-lg">➕ Nueva Aula</a>
                        <a href="{{ route('materias.create') }}" class="btn btn-success btn-lg">📝 Nueva Materia</a>
                        <a href="{{ route('reservas.create') }}" class="btn btn-primary btn-lg">🗓️ Nueva Reserva</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow">
                <div class="card-header" style="background: linear-gradient(135deg, #9B59B6, #3498DB); color: white;">
                    <h4>📊 Enlaces Rápidos</h4>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('aulas.index') }}" class="list-group-item list-group-item-action">
                            🏫 Ver Todas las Aulas
                        </a>
                        <a href="{{ route('materias.index') }}" class="list-group-item list-group-item-action">
                            📚 Ver Todas las Materias
                        </a>
                        <a href="{{ route('docentes.index') }}" class="list-group-item list-group-item-action">
                            👨‍🏫 Ver Todos los Docentes
                        </a>
                        <a href="{{ route('reservas.index') }}" class="list-group-item list-group-item-action">
                            🗓️ Ver Todas las Reservas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection