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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_alberca');
            $table->foreign('id_alberca')->references('id')->on('albercas')->onDelete('cascade');
            $table->string('nombre');
            $table->string('ph');
            $table->string('cloro');
            $table->date('cepillo')->nullable();
            $table->date('filtro')->nullable();
            $table->text('observaciones')->nullable();
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id')->on('estados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
