<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->enum('dia', [
                'lunes',
                'martes', 
                'miercoles',
                'jueves',
                'viernes',
                'sabado'
            ]);                                          // 🟡 Día de la semana
            $table->enum('periodo', [
                'mañana',
                'tarde', 
                'noche'
            ]);                                          // 🟢 Periodo del día
            $table->string('turno');                     // 🟣 Turno (1ro, 2do, etc.)
            $table->time('hora_inicio');                 // 🔵 Hora de inicio
            $table->time('hora_fin');                    // ⚪ Hora de fin
            $table->foreignId('aula_id')                 // 🟠 Relación con Aula
                  ->constrained('aulas')
                  ->onDelete('cascade');
            $table->timestamps();
            
            // Índice único para evitar horarios duplicados en misma aula
            $table->unique(['dia', 'hora_inicio', 'aula_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
