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
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();       // 🟡 Nombre único
            $table->string('ubicacion');              // 🟢 Ubicación física
            $table->integer('capacidad');             // 🟣 Capacidad
            $table->boolean('activa')->default(true); // 🔵 Estado
            $table->text('caracteristicas')->nullable(); // ⚪ Características
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aulas');
    }
};