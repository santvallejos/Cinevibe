<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Agrega la columna sale_id a la tabla users.
     * Referencia a headboard_sales para conocer la última compra del usuario.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Nullable porque un usuario puede no tener compras aún
            $table->unsignedBigInteger('sale_id')->nullable()->after('rol_id');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('sale_id');
        });
    }
};
