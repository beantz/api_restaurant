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
        Schema::table('refeições', function(Blueprint $table) {
            $table->dropColumn('deleted_at');
            $table->string('deleted_at')->nullable();
        });

        Schema::table('bebidas', function(Blueprint $table) {
            $table->dropColumn('deleted_at');
            $table->string('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('refeições', function(Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('bebidas', function(Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
};