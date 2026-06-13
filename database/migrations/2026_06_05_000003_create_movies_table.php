<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabla de películas.
     * showtime_id apunta al ShowTime "principal" o próximo de la película.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('state');       // Ej: "En cartelera", "Próximamente"
            $table->text('description')->nullable();
            $table->string('duration');         // Ej: "2h 15min"
            $table->string('category');
            $table->date('datepremire');
            $table->string('image_url')->nullable();
            $table->string('trailer_url')->nullable();
            // FK al showtime actual/próximo de la película (nullable)
            $table->unsignedBigInteger('showtime_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
