<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatXCanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_x_can', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('categoria_id');
            $table->unsignedInteger('cantidad_id');
            $table->timestamps();

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
        Schema::dropIfExists('cat_x_can');
    }
}
