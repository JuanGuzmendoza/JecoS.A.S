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
        Schema::create('portafolio_productos', function (Blueprint $table) {
            $table->id();
            $table->string('oc')->nullable()->nullable();;
            $table->string('codigo')->unique()->nullable();
            $table->string('nombre')->unique()->nullable();;
            $table->integer('cost_unit')->nullable()->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portafolio_productos');
    }
};
