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
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->unsignedBigInteger('ci_paciente');
            $table->unsignedBigInteger('id_servicio');
            $table->date('fechainicio');
            $table->date('fechafin');

            $table->primary('ci_paciente','id_servicio');
            $table->foreign('ci_paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('id_servicio')->references('id')->on('servicios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tratamientos');
    }
};
