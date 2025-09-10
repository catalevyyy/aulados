<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Disponibilidad extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'hora', 'estado', 'aula_id'];

    // Relación inversa N:1 con Aula
    public function aula(): BelongsTo
    {
        return $this->belongsTo(Aula::class);
    }
}