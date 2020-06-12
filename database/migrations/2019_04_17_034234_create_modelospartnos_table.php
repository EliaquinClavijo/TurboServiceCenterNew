<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelospartnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::create('modelospartno', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idmodelo')->unsigned();
            $table->foreign('idmodelo')->references('id')->on('modelo')->onDelete('cascade');
            $table->integer('idpartno')->unsigned();
            $table->foreign('idpartno')->references('id')->on('partno')->onDelete('cascade');
            $table->timestamps();
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
         //Schema::dropIfExists('modelospartno');
    }
}
