<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Docente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'dni', 'especialidad', 'email', 'telefono', 'activo'];

    // Relación N:M con Materias (tabla pivot docente_materia)
    public function materias(): BelongsToMany
    {
        return $this->belongsToMany(Materia::class, 'docente_materia');
    }
}