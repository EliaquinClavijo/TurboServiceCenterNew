<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurbosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::create('turbos', function (Blueprint $table) {
            $table->increments('idturbo');
            $table->string('name',100)->unique();
            $table->string('marcas',1000);
            $table->string('modelos',1000);
            $table->string('motores',1000);
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
       // Schema::dropIfExists('turbos');
    }
}
