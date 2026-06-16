<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Agrega columna retail_sale_id a tickets para vincular
 * cada ticket con su línea de venta (RetailSale).
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            // FK nullable hacia retail_sales, restrict al borrar
            $table->unsignedBigInteger('retail_sale_id')->nullable()->after('theater_id');
            $table->foreign('retail_sale_id')
                  ->references('id')
                  ->on('retail_sales')
                  ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            // Eliminar FK y columna en rollback
            $table->dropForeign(['retail_sale_id']);
            $table->dropColumn('retail_sale_id');
        });
    }
};
