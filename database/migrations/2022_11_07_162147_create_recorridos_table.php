<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecorridosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recorridos', function (Blueprint $table) {
            $table->id('idRecorrido');
            $table->string('nombre');
            $table->decimal('costo', 10, 2);
            $table->string('duracion');
            $table->string('img1');
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
        Schema::dropIfExists('recorridos');
    }
}
