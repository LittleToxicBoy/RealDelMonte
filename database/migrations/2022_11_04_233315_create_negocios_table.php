<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negocios', function (Blueprint $table) {
            $table->id('idNegocio');
            $table->string('nombre');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('horarioDes');
            $table->enum('tipo', ['tienda', 'restaurante', 'recorrido', 'Hotel']);
            $table->string('descripcion');
            $table->string('img1');
            $table->string('img2');
            $table->string('img3');

            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('negocios');
    }
}
