<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('puntos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('facturapuntos_id')->unsigned()->default('0');
            $table->integer('tercero_id')->unsigned()->index();
            $table->integer('estadopuntos_id')->unsigned()->index();
            $table->double('valor');

            $table->timestamps();

            $table->foreign('tercero_id')->references('id')->on('terceros');
            $table->foreign('estadopuntos_id')->references('id')->on('estadopuntos');
            $table->foreign('facturapuntos_id')->references('id')->on('facturapuntos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('puntos');
    }
}