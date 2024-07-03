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
        Schema::create('historial_clinicos', function (Blueprint $table) {
            $table->id();
            $table->string('Diagnostico')->nullable();
            $table->date('Fecha_Cita')->nullable();
            $table->string('Tratamiento')->nullable();
            $table->json('odontograma');

            $table->unsignedBigInteger('id_odontologo');
            $table->foreign('id_odontologo')->references('id')->on('odontologos')->onDelete('cascade');
            $table->unsignedBigInteger('id_paciente');
            $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_clinicos');
    }
};