<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabla retail_sales (líneas de venta agrupadas).
     * Agrupa tickets del mismo evento (misma película, horario, sala).
     * ticket_id apunta al ticket representativo del grupo, pero cant indica cuántos asientos.
     */
    public function up(): void
    {
        Schema::create('retail_sales', function (Blueprint $table) {
            $table->id();
            // FK al ticket (UUID) que representa esta línea de venta
            $table->uuid('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('restrict');

            $table->double('price');                // Precio total línea
            $table->integer('cant');                // Cantidad de tickets/asientos en esta línea
            $table->double('precio_unitario');      // Precio por asiento
            $table->double('subtotal');             // precio_unitario * cant
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('retail_sales');
    }
};
