<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = ['dia', 'periodo', 'turno', 'hora_inicio', 'hora_fin', 'aula_id'];

    // Relación inversa 1:1 con Aula
    public function aula(): BelongsTo
    {
        return $this->belongsTo(Aula::class);
    }
}