<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturapuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('facturapuntos', function(Blueprint $table)
        {
    
            $table->increments('id');
            $table->integer('numero')->unsigned()->default('0');
            $table->string('prefijo',10);
            $table->integer('tercero_id')->unsigned()->index();
            $table->timestamp('fecha');
            $table->integer('tipo')->unsigned()->index();
            $table->integer('estado_id')->unsigned()->index();
            $table->double('valor');

            $table->timestamps();
            
            $table->foreign('tercero_id')->references('id')->on('terceros');
            $table->foreign('tipo')->references('id')->on('tipo');
            $table->foreign('estado_id')->references('id')->on('estadoFactura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facturapuntos');
    }
}
