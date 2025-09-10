<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aula_materia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aula_id')->constrained()->onDelete('cascade');
            $table->foreignId('materia_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            // Evitar duplicados: misma aula + misma materia
            $table->unique(['aula_id', 'materia_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aula_materia');
    }
};
