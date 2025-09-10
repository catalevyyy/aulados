@extends('layouts.app')

@section('title', 'Lista de Aulas - AulaDOS')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="p-4 text-white rounded" style="background: linear-gradient(135deg, #FFD700, #FF7F50);">
                <h1 class="display-4 fw-bold">🏫 Lista de Aulas</h1>
                <p class="lead">Gestión completa de todas las aulas disponibles</p>
            </div>
        </div>
    </div>

    <!-- Create Button -->
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ route('aulas.create') }}" class="btn btn-success btn-lg">
                ➕ Nueva Aula
            </a>
        </div>
    </div>

    <!-- Aulas Grid -->
    <div class="row">
        @foreach($aulas as $aula)
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg h-100" style="border: 3px solid #FFD700; border-radius: 15px;">
                <div class="card-header text-white" style="background: linear-gradient(135deg, #FFD700, #FF7F50);">
                    <h5 class="card-title mb-0">{{ $aula->nombre }}</h5>
                </div>
                <div class="card-body">
                    <p>📍 <strong>Ubicación:</strong> {{ $aula->ubicacion }}</p>
                    <p>👥 <strong>Capacidad:</strong> {{ $aula->capacidad }} estudiantes</p>
                    <p>📚 <strong>Materias:</strong> {{ $aula->materias_count }}</p>
                    @if($aula->caracteristicas)
                    <p>✨ <strong>Características:</strong> {{ $aula->caracteristicas }}</p>
                    @endif
                    <p>✅ <strong>Estado:</strong> 
                        <span class="badge bg-{{ $aula->activa ? 'success' : 'danger' }}">
                            {{ $aula->activa ? 'Activa' : 'Inactiva' }}
                        </span>
                    </p>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap-2">
                        <a href="{{ route('aulas.show', $aula) }}" class="btn btn-primary btn-sm">
                            👀 Ver Detalles
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Empty State -->
    @if($aulas->isEmpty())
    <div class="row">
        <div class="col-12">
            <div class="text-center p-5" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-radius: 15px;">
                <h2>🏗️ No hay aulas registradas</h2>
                <p class="lead">Comienza creando tu primera aula</p>
                <a href="{{ route('aulas.create') }}" class="btn btn-warning btn-lg">
                    ➕ Crear Primera Aula
                </a>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection