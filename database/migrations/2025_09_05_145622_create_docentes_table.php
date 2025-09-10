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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');                    // 🟡 Nombre completo
            $table->string('dni')->unique();             // 🟢 DNI único
            $table->string('especialidad');              // 🟣 Especialidad
            $table->string('email')->unique();           // 🔵 Email único
            $table->string('telefono')->nullable();      // ⚪ Teléfono opcional
            $table->boolean('activo')->default(true);    // 🟠 Estado activo/inactivo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};