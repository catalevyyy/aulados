<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('focos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();                          // 🩷 Código único
            $table->enum('tipo', ['led', 'incandescente', 'halogeno']); // 💡 Tipo de foco
            $table->string('ubicacion');                                 // 📍 Ubicación en el aula
            $table->enum('intensidad', ['baja', 'media', 'alta']);       // 🔆 Intensidad lumínica
            $table->enum('estado', ['operativo', 'quemado', 'parpadeo']);// ⚡ Estado actual
            $table->foreignId('aula_id')                                 // 🟡 Relación con Aula
                  ->constrained('aulas')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('focos');
    }
};