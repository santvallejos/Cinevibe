<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabla de tickets (butacas/asientos reservados).
     * Cada ticket representa una butaca específica en una función.
     * Usa UUID como PK (guid) según el esquema.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('id')->primary();          // GUID único por ticket

            // Desnormalización intencional del esquema: guarda ids de película,
            // showtime y theater por acceso rápido (según diseño original)
            $table->unsignedBigInteger('pelicula_id');
            $table->foreign('pelicula_id')->references('id')->on('movies')->onDelete('restrict');

            $table->foreignId('showtime_id')
                ->constrained('showtimes')
                ->onDelete('restrict');

            $table->unsignedBigInteger('theater_id');
            $table->foreign('theater_id')->references('id')->on('theaters')->onDelete('restrict');

            $table->foreignId('seat_id')
                ->constrained('seats')
                ->onDelete('restrict');

            $table->double('price');                // Precio del ticket
            $table->string('amchair');              // Identificador butaca: ej "A1", "B5"
            $table->dateTime('date');               // Fecha/hora de la función
            $table->string('movie');                // Nombre película (cache desnormalizado)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
