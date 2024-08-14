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
        Schema::create('FechasEntrega', function (Blueprint $table) {
            $table->id();
            $table->string('cliente')->nullable();
            $table->date('entrega')->nullable();
            $table->integer('oc')->nullable();
            $table->integer('codigo')->nullable();
            $table->string('nomnbre')->nullable();
            $table->integer('cant')->nullable();
            $table->integer('cost_unit')->nullable();
            $table->integer('cost_total')->nullable();
            $table->integer('c_tela')->nullable();
            $table->integer('cost')->nullable();
            $table->integer('c_mad')->nullable();
            $table->integer('arm')->nullable();
            $table->integer('emparr')->nullable();
            $table->integer('c_esp')->nullable();
            $table->integer('p_blan')->nullable();
            $table->integer('tapic')->nullable();
            $table->integer('ensam')->nullable();
            $table->integer('despa')->nullable();
            $table->integer('nieves')->nullable();
            $table->integer('mes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('FechasEntrega');
    }
};
