<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promociones', function (Blueprint $table) {
            $table->id('idPromocion');
            $table->string('Nombre')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('img1')->nullable();
            //FK
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
        Schema::dropIfExists('promociones');
    }
}
