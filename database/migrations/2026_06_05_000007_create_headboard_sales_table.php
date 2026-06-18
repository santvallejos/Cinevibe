<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabla headboard_sales (cabecera de orden de compra).
     * Una cabecera por compra: agrupa retail_sales y pertenece a un usuario.
     */
    public function up(): void
    {
        Schema::create('headboard_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('restrict');             // No borrar usuario con compras activas

            $table->foreignId('retail_sale_id')
                ->constrained('retail_sales')
                ->onDelete('restrict');             // No borrar retail sin eliminar cabecera

            // Estado de la compra: pending, confirmed, cancelled, etc.
            $table->string('state')->default('pending');
            $table->double('total');                // Total general de la compra
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('headboard_sales');
    }
};
