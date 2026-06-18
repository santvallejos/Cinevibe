<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabla de asientos/butacas físicas por sala.
     */
    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();

            // Relación con salas (theaters)
            $table->foreignId('theater_id')
                ->constrained('theaters')
                ->onDelete('cascade');

            // Fila (ej: "A", "B", etc.)
            $table->string('row_letter', 2);

            // Número de asiento (ej: 1, 2, 3, etc.)
            $table->integer('seat_number');

            // Indica si es una butaca especial/VIP
            $table->boolean('is_premium')->default(false);

            // Indica si la butaca está activa para venta
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            // Clave única compuesta para evitar duplicados en la misma sala
            $table->unique(['theater_id', 'row_letter', 'seat_number'], 'unique_seat_coordinate');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
