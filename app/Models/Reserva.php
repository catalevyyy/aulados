<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'hora_inicio', 'hora_fin', 'tipo_origen', 'materia_id'];

    // Relación inversa N:1 con Materia
    public function materia(): BelongsTo
    {
        return $this->belongsTo(Materia::class);
    }

    // Relación N:M con Focos (tabla pivot foco_reserva)
    public function focos(): BelongsToMany
    {
        return $this->belongsToMany(Foco::class, 'foco_reserva');
    }
}