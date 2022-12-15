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
            $table->enum('srActivo', ['si', 'no']);
            $table->enum('activo', ['si', 'no'])->default('si');
            $table->enum('tipo', ['tienda', 'showroom', 'restaurante', 'recorrido', 'hotel', 'servicios', 'transporte']);
            $table->text('descripcion');
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->string('img4')->nullable();
            $table->string('img5')->nullable();
            $table->string('img6')->nullable();
            $table->string('img7')->nullable();
            $table->string('img8')->nullable();
            $table->string('img9')->nullable();
            $table->string('img10')->nullable();

            //FK
            $table->unsignedBigInteger('idPueblo');
            $table->foreign('idPueblo')->references('idPueblo')->on('pueblos');

            $table->unsignedBigInteger('idUser')->nullable();
            $table->foreign('idUser')->references('id')->on('users');

            $table->unsignedBigInteger('id_negocio_fk')->nullable();
            $table->foreign('id_negocio_fk')->references('idNegocio')->on('negocios');
            
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
