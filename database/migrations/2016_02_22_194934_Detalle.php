<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Detalle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('detalles', function(Blueprint $table)
		{

			$table->engine = 'MyISAM';
			$table->increments('id');
			$table->integer('idmovimiento');
			$table->date('idarticulo');
			$table->decimal('peso',12,2);
			$table->decimal('precio',12,2);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('detalles');
	}

}
