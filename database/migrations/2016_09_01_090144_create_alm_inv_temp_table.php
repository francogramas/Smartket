<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlmInvTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('AlmInvTemp', function(Blueprint $table)
        {
            $table->integer('idInv')->unsigned()->index();
            $table->timestamps();
            $table->foreign('IdInv')->references('id')->on('inventario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('AlmInvTemp');
    }
}
