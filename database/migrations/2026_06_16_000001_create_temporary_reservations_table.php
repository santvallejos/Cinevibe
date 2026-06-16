<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Reservas temporales de butacas.
     * Bloquea un asiento por X minutos mientras el usuario finaliza la compra.
     * Evita que dos usuarios seleccionen el mismo asiento simultáneamente.
     */
    public function up(): void
    {
        Schema::create('temporary_reservations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('showtime_id')
                ->constrained('showtimes')
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Identificador de butaca, ej: "A1", "B5"
            $table->string('amchair', 10);

            // Cuándo expira el bloqueo (por defecto 10 minutos)
            $table->dateTime('expires_at');

            $table->timestamps();

            // Un asiento por función no puede estar reservado por dos usuarios a la vez
            $table->unique(['showtime_id', 'amchair'], 'unique_seat_per_showtime');

            // Índice para limpiar reservas expiradas eficientemente
            $table->index('expires_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('temporary_reservations');
    }
};
