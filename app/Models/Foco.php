<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Foco extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'tipo', 'ubicacion', 'intensidad', 'estado', 'aula_id'];

    // Relación inversa N:1 con Aula
    public function aula(): BelongsTo
    {
        return $this->belongsTo(Aula::class);
    }

    // Relación N:M con Reservas (tabla pivot foco_reserva)
    public function reservas(): BelongsToMany
    {
        return $this->belongsToMany(Reserva::class, 'foco_reserva');
    }
}