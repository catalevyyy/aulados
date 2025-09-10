<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('foco_reserva', function (Blueprint $table) {
            $table->id();
            $table->foreignId('foco_id')->constrained()->onDelete('cascade');
            $table->foreignId('reserva_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            // Evitar duplicados: mismo foco + misma reserva
            $table->unique(['foco_id', 'reserva_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('foco_reserva');
    }
};
