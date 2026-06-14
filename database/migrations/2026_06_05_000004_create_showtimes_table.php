<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabla de funciones/horarios (showtimes).
     * Cada ShowTime es una función específica: película + sala + fecha-hora.
     */
    public function up(): void
    {
        Schema::create('showtimes', function (Blueprint $table) {
            $table->id();
            $table->dateTime('datetime');            // Fecha y hora exacta de la función
            $table->foreignId('theater_id')
                ->constrained('theaters')
                ->onDelete('restrict');             // No borrar sala si tiene funciones
            $table->foreignId('movie_id')
                ->constrained('movies')
                ->onDelete('restrict');             // No borrar película si tiene funciones
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('showtimes');
    }
};
