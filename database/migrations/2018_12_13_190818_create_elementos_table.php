<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('cantidad');
            $table->string('precio');
            $table->string('estado');
            $table->string('imagen');
            $table->unsignedInteger('persona_id');
            $table->unsignedInteger('categoria_id');
            $table->unsignedInteger('cantidad_id');
            $table->timestamps();

            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('cantidad_id')->references('id')->on('cantidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elementos');
    }
}
