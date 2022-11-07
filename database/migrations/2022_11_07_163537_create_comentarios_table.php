<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->integer('valoracion');
            $table->text('comentario');
            //FK
            $table->unsignedBigInteger('idUsuarioMapa');
            $table->foreign('idUsuarioMapa')->references('idUsuarioMapa')->on('usuarios_mapas');
            $table->unsignedBigInteger('idNegocio');
            $table->foreign('idNegocio')->references('idNegocio')->on('negocios');
            
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
        Schema::dropIfExists('comentarios');
    }
}
