<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Movimiento extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('movimientos', function(Blueprint $table)
		{

			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->string('tipo', 2);
			$table->date('fecha');
			$table->integer('idcliente');
			$table->decimal('total',12,2);
			$table->string('descripcion',32);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('movimientos');
	}

}
