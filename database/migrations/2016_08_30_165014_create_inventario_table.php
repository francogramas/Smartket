<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('producto_id')->unsigned()->index();
            $table->integer('cantidad')->unsigned();
            $table->double('costo')->default('0');
            $table->double('valor')->default('0');
            $table->integer('stock')->unsigned()->default('0');
            $table->integer('stockmin')->unsigned()->default('1');
            $table->string('lote')->default('0');
            $table->timestamp('vence');
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inventario');
    }
}
