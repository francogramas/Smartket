<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarteraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartera', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tercero_id')->unsigned()->index();
            $table->integer('estadocartera_id')->unsigned()->index();
            $table->integer('tipocartera_id')->unsigned()->index();
            $table->double('deuda')->default('0');
            $table->double('abono')->default('0');

            $table->foreign('tercero_id')->references('id')->on('terceros');
            $table->foreign('estadocartera_id')->references('id')->on('estadocartera.id');
            $table->foreign('tipocartera_id')->references('id')->on('tipocartera.id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cartera');
    }
}
