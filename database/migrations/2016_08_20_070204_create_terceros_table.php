<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTercerosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('terceros', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('nit',45)->unique();
			$table->string('nombres',50);
			$table->string('apellido1',45);
			$table->string('apellido2',45);
			$table->string('correo',45);
			$table->string('telefono',45);
			$table->integer('ciudad')->unsigned()->index();
			
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
		Schema::drop('terceros');
	}

}
