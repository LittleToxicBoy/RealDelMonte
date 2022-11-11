<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePueblosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pueblos', function (Blueprint $table) {
            $table->id('idPueblo');
            $table->string('nombre');
            $table->string('latitud');
            $table->string('longitud');
            $table->string('img1');
            $table->string('img2');
            $table->string('img3');
            $table->string('img4');
            $table->string('img5');
            $table->string('img6');
            $table->string('img7');
            $table->string('img8');
            $table->string('img9');
            $table->string('img10');
            $table->string('descripcion');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            //FK 
            $table->unsignedBigInteger('idPueblo')->nullable();
            $table->foreign('idPueblo')->references('idPueblo')->on('pueblos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pueblos');
    }
}
