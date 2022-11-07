<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosMapasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_mapas', function (Blueprint $table) {
            $table->id('idUsuarioMapa');
            $table->string('nombre');
            $table->string('apellifos');
            $table->string('correo');
            $table->string('password');
            //FK
            $table->unsignedBigInteger('idPueblo');
            $table->foreign('idPueblo')->references('idPueblo')->on('pueblos');
            
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
        Schema::dropIfExists('usuarios_mapas');
    }
}
