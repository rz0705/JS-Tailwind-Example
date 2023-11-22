<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('add_products', function (Blueprint $table) {
            $table->float('price')->change();
            $table->float('weight')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('add_products', function (Blueprint $table) {
            $table->integer('price')->change();
            $table->integer('weight')->change();
        });
    }
};
