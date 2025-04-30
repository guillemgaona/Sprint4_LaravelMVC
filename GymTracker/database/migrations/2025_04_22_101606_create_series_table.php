<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('serie', function (Blueprint $table) {
            $table->id('id_serie');
            $table->foreignId('id_sesion')
                  ->constrained('sesion','id_sesion')
                  ->onDelete('cascade');
            $table->foreignId('id_ejercicio')
                  ->constrained('ejercicio','id_ejercicio')
                  ->onDelete('cascade');
            $table->integer('serie_num');
            $table->integer('repeticiones');
            $table->decimal('peso', 4, 2);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('serie');
    }
};