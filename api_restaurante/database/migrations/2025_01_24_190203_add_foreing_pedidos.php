<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Builder\Function_;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pedidos', function(Blueprint $table) {
            $table->dropColumn('id_cliente');

            $table->unsignedBigInteger('id_cliente');

            $table->foreign('id_cliente')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos', function(Blueprint $table) {

            $table->dropForeign('id_clientes');

            $table->dropColumn('id_cliente');
        });
    }
};
