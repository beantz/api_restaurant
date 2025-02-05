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
        Schema::create('ingredientes', function(Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });

        Schema::create('refeições_ingredientes', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('refeições_id');
            $table->unsignedBigInteger('ingredientes_id');
            $table->timestamps();

            $table->foreign('refeições_id')->references('id')->on('refeições');
            $table->foreign('ingredientes_id')->references('id')->on('ingredientes');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('refeições_ingredientes');
        Schema::dropIfExists('ingredientes');
        Schema::enableForeignKeyConstraints();
    }
};
