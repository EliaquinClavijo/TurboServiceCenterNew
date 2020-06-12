<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::create('observacions', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('text',1000000);
            $table->date('fecha');
            $table->timestamps();
            //$table->integer('profo_id')->unsigned();
            //$table->foreign('profo_id')->references('id')->on('servicios')->onDelete('cascade');
           });
           */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         //Schema::dropIfExists('observacions');
    }
}
