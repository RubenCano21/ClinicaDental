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
        Schema::create('ejerces', function (Blueprint $table) {
            $table->unsignedBigInteger('id_especialidad');
            $table->unsignedBigInteger('ci_odontologo');

            $table->primary('id_especialidad','ci_odontologo');
            $table->foreign('id_especialidad')->references('id')->on('especialidads')->onDelete('cascade');
            $table->foreign('ci_odontologo')->references('id')->on('odontologos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejerces');
    }
};
