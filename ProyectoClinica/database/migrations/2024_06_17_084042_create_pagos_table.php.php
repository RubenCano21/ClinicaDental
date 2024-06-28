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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->decimal('monto', 10, 2);
            $table->string('stado');

            //agregando las llaves foraneas
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('planPagos_id');
            $table->unsignedBigInteger('tipoPago_id');
            $table->unsignedBigInteger('cita_id');
            $table->unsignedBigInteger('factura_id');

            $table->foreign('planPagos_id')->references('id')->on('plan_pagos')->onDelete('cascade');
            $table->foreign('tipoPago_id')->references('id')->on('tipo_pagos')->onDelete('cascade');
            $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('cascade');
            $table->foreign('cita_id')->references('id')->on('citas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
