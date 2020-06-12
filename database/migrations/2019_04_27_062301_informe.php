<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Informe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('informes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('descripcion',100000)->nullable();
            $table->string('operacion',100000)->nullable();
            $table->string('comentario',100000)->nullable();
            $table->text('resultado')->nullable();
            $table->text('recomendaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('informes');
    }
}
