<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cliente extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('clientes', function(Blueprint $table)
		{

			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->string('codigo', 4 )->unique();
			$table->string('nombre', 32 )->unique();
			$table->string('direccion', 32 );
			$table->string('codpos', 4 );
			$table->string('localidad', 25 );
			$table->string('telefono', 32 );
			$table->string('tipiva', 1 );
			$table->string('cuit', 13 );
			$table->integer('idreparto');
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clientes');
	}

}
