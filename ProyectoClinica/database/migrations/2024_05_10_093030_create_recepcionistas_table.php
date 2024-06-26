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
        Schema::create('recepcionistas', function (Blueprint $table) {
            $table->id();
            $table->integer('ci');
            $table->string('nombre',40);
            $table->string('apellido',40);
            $table->string('email',255);
            $table->string('sexo',10);
            $table->integer('telefono')->nullable();
            $table->string('turno',10);
            $table->integer('sueldo');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recepcionistas');
    }
};
