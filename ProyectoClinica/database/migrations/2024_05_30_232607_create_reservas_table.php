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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->string('estado',50)->nullable();
            $table->unsignedBigInteger('id_paciente');
            
            // $table->unsignedBigInteger('id_recepcionista');
            // $table->unsignedBigInteger('id_paciente');
             $table->unsignedBigInteger('id_servicio');
             $table->foreign('id_paciente')->references('id')->on('pacientes');
            // $table->foreign('id_recepcionista')->references('id')->on('recepcionistas');
            // $table->foreign('id_paciente')->references('id')->on('pacientes');
             $table->foreign('id_servicio')->references('id')->on('servicios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
