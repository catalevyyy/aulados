Schema::create('disponibilidades', function (Blueprint $table) {
    $table->id();
    $table->date('fecha');
    $table->time('hora');
    $table->enum('estado', ['disponible', 'ocupada', 'mantenimiento']);
    $table->foreignId('aula_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});