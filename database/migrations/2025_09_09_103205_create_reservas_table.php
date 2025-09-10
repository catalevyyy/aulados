Schema::create('reservas', function (Blueprint $table) {
    $table->id();
    $table->date('fecha');
    $table->time('hora_inicio');
    $table->time('hora_fin');
    $table->string('tipo_origen');
    $table->foreignId('materia_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});
