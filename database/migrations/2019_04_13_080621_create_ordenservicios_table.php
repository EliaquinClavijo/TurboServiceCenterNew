<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenserviciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::create('ordenservicio', function (Blueprint $table) {
            $table->increments('idordenservicio');
            $table->integer('idcliente')->unsigned();
            $table->foreign('idcliente')->references('id')->on('clientes')->onDelete('cascade');

            $table->integer('idservicio')->unsigned();
            $table->foreign('idservicio')->references('id')->on('servicios')->onDelete('cascade');


            $table->string('marca',500)->nullable();
            $table->string('modelo',500)->nullable();

            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('ordenservicio');
    }
}
