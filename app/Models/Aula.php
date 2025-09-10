<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'ubicacion', 'capacidad', 'caracteristicas', 'activa'];

    // Relación 1:N con Horarios
    public function horarios(): HasMany
    {
        return $this->hasMany(Horario::class);
    }

    // Relación 1:N con Disponibilidades
    public function disponibilidades(): HasMany
    {
        return $this->hasMany(Disponibilidad::class);
    }

    // Relación 1:N con Focos
    public function focos(): HasMany
    {
        return $this->hasMany(Foco::class);
    }

    // Relación 1:N con AireAcondicionado
    public function airesAcondicionados(): HasMany
    {
        return $this->hasMany(AireAcondicionado::class);
    }

    // Relación N:M con Materias (tabla pivot aula_materia)
    public function materias(): BelongsToMany
    {
        return $this->belongsToMany(Materia::class, 'aula_materia');
    }
}