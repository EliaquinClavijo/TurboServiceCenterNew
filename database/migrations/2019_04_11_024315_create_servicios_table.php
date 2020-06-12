<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         Schema::create('servicios', function (Blueprint $table) {
            
            $table->increments('id')->unique();
            $table->date('fecha')->nullable();
            $table->string('turbo',1000)->nullable();
            $table->string('modelo',1000)->nullable();
            $table->string('marca',1000)->nullable();
            $table->string('motor',1000)->nullable();
            $table->string('placa',1000)->nullable();
            $table->string('descripcion',10000)->nullable();
            $table->integer('adelanto')->nullable();
            $table->integer('costo_total')->nullable();
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
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
        //
      //  Schema::dropIfExists('servicios');
    }
}
