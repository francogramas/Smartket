<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('productos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre',200);
            $table->string('codigo',45) unique();
            $table->integer('categoria_id')->unsigned()->index();

            $table->foreign('categoria_id')->references('id')->on('categorias');
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
         Schema::drop('productos');
    }
}
