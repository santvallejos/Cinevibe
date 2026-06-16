<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('retail_sales', function (Blueprint $table) {
            $table->foreignId('headboard_sale_id')
                  ->nullable()
                  ->constrained('headboard_sales')
                  ->onDelete('cascade');
        });

        Schema::table('headboard_sales', function (Blueprint $table) {
            $table->unsignedBigInteger('retail_sale_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('headboard_sales', function (Blueprint $table) {
            $table->unsignedBigInteger('retail_sale_id')->nullable(false)->change();
        });

        Schema::table('retail_sales', function (Blueprint $table) {
            $table->dropForeign(['headboard_sale_id']);
            $table->dropColumn('headboard_sale_id');
        });
    }
};
