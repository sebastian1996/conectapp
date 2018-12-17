<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcuerdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acuerdos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estadoGeneral');
            $table->string('estadoPunto');
            $table->string('estadoPersona');
            $table->string('precio')->nullable();
            $table->unsignedInteger('punto_id');
            $table->unsignedInteger('elemento_id');
            $table->timestamps();

            $table->foreign('punto_id')->references('id')->on('puntos');
            $table->foreign('elemento_id')->references('id')->on('elementos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acuerdos');
    }
}
