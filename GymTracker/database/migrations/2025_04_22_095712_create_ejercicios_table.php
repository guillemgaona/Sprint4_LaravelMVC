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
        Schema::create('ejercicio', function (Blueprint $table) {
            $table->id('id_ejercicio');
            $table->string('nombre', 100);
            $table->enum('grupo_muscular', [
                'pecho','espalda','piernas','hombros','brazos','core','otros'
            ]);
            $table->text('descripcion')->nullable();
            $table->string('imagen_demo')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('ejercicio');
    }
    
};