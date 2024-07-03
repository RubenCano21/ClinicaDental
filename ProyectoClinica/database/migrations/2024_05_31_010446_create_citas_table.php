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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->string('estado')->nullable();
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('ci_odontologo');
            $table->unsignedBigInteger('id_reserva');
            $table->unsignedBigInteger('id_servicio');
            //$table->unsignedBigInteger('id_historialclinico');

            $table->foreign('ci_odontologo')->references('id')->on('odontologos')->onDelete('cascade');
            $table->foreign('id_reserva')->references('id')->on('reservas')->onDelete('cascade');
            $table->foreign('id_servicio')->references('id')->on('servicios')->onDelete('cascade');
           // $table->foreign('id_historialclinico')->references('id')->on('historial_clinicos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
