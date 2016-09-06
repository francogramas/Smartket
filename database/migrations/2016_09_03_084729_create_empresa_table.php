<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('empresa', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('razonsocial');
            $table->string('nit');
            $table->integer('ciudad')->unsigned()->index();            
            $table->string('direccion');
            $table->string('telefono');            
            $table->string('correo');

            $table->timestamps();
            $table->foreign('ciudad')->references('id')->on('ciudades');
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
    }
}
