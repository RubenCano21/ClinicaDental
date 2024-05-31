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
        Schema::create('estado_tratamientos', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('ci_paciente');
            $table->unsignedBigInteger('id_servicio');

            $table->foreign('ci_paciente')->references('ci_paciente')->on('tratamientos')->onDelete('cascade');
            $table->foreign('id_servicio')->references('id_servicio')->on('tratamientos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado_tratamientos');
    }
};
