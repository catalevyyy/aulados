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
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');                    // 🟡 Nombre de la materia
            $table->enum('tipo_cursada', [               // 🟢 Tipo de cursada
                'presencial', 
                'virtual', 
                'hibrida'
            ]);
            $table->string('carrera');                   // 🟣 Carrera
            $table->integer('anio');                     // 🔵 Año
            $table->text('descripcion')->nullable();     // ⚪ Descripción opcional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};