<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'tipo_cursada', 'carrera', 'anio', 'descripcion'];

    // Relación 1:N con Reservas
    public function reservas(): HasMany
    {
        return $this->hasMany(Reserva::class);
    }

    // Relación N:M con Aulas (tabla pivot aula_materia)
    public function aulas(): BelongsToMany
    {
        return $this->belongsToMany(Aula::class, 'aula_materia');
    }

    // Relación N:M con Docentes (tabla pivot docente_materia)
    public function docentes(): BelongsToMany
    {
        return $this->belongsToMany(Docente::class, 'docente_materia');
    }
}