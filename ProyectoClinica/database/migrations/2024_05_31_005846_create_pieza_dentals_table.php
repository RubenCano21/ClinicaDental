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
        Schema::create('pieza_dentals', function (Blueprint $table) {
            $table->id();
            $table->string('tipodiente');
            $table->unsignedBigInteger('id_odontograma');
            $table->unsignedBigInteger('id_estadopieza');
            $table->unsignedBigInteger('id_tipopieza');

            $table->primary('id','id_odontograma');
            $table->foreign('id_odontograma')->references('id')->on('odontogramas')->onDelete('cascade');
            $table->foreign('id_estadopieza')->references('id')->on('estado_piezas')->onDelete('cascade');
            $table->foreign('id_tipopieza')->references('id')->on('tipo_piezas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pieza_dentals');
    }
};
