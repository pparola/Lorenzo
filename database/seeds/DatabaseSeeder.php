<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Facturacion\Articulo;
use Facturacion\Cliente;
use Facturacion\Reparto;
use Facturacion\User;
use Facturacion\Detalle;
use Facturacion\Movimiento;

//use Facturacion\seeds\UsersSeeder;
// use Facturacion\seeds\RepartosSeeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		//$this->call('UsersSeeder');

		User::Truncate();

		User::Create([
			'name' => 'Admin',
			'email' => 'admin@test.com',
			'password' => bcrypt('Admin')
		]);

		User::Create([
			'name' => 'Usuario',
			'email' => 'usuario@test.com',
			'password' => bcrypt('Usuario')
		]);

		//$this->call('RepartosSeeder');

		Reparto::Truncate();

		Reparto::Create(['nombre' => 'LUNES']);
		Reparto::Create(['nombre' => 'MARTES']);
		Reparto::Create(['nombre' => 'MIERCOLES']);
		Reparto::Create(['nombre' => 'JUEVES']);
		Reparto::Create(['nombre' => 'VIERNES']);

		//$this->call('ClientesSeeder');
		Cliente::Truncate();

		Cliente::Create(['codigo' => '0001', 'nombre' => 'AVALOS' , 'idreparto' => 1 ]);
		Cliente::Create(['codigo' => '0002', 'nombre' => 'ALIZANDRO', 'idreparto' => 2 ]);
		Cliente::Create(['codigo' => '0003', 'nombre' => 'JOSE VILLA DOS', 'idreparto' => 3 ]);
		Cliente::Create(['codigo' => '0004', 'nombre' => 'AGUIRRE', 'idreparto' => 4 ]);
		Cliente::Create(['codigo' => '0005', 'nombre' => 'BAZAN', 'idreparto' => 5 ]);
		Cliente::Create(['codigo' => '0006', 'nombre' => 'PRADO', 'idreparto' => 1 ]);
		Cliente::Create(['codigo' => '0007', 'nombre' => 'BETO', 'idreparto' => 2 ]);
		Cliente::Create(['codigo' => '0008', 'nombre' => 'MIGUEL PRIMAVERA', 'idreparto' => 3 ]);
		Cliente::Create(['codigo' => '0009', 'nombre' => 'JIMENEZ COLON', 'idreparto' => 4 ]);
		Cliente::Create(['codigo' => '0010', 'nombre' => 'BELTRAN', 'idreparto' => 5 ]);
		Cliente::Create(['codigo' => '0011', 'nombre' => 'CESAR', 'idreparto' => 1 ]);

		//$this->call('ArticulosSeeder');

		Articulo::Truncate();

		Articulo::Create(['codigo' => '0001', 'nombre' => '1/2 RES']);
		Articulo::Create(['codigo' => '0002', 'nombre' => 'BOCHA']);
		Articulo::Create(['codigo' => '0003', 'nombre' => 'PECHO']);
		Articulo::Create(['codigo' => '0004', 'nombre' => 'DELANTERO']);
		Articulo::Create(['codigo' => '0005', 'nombre' => 'ASADO']);
		Articulo::Create(['codigo' => '0006', 'nombre' => 'MOCHOS']);
		Articulo::Create(['codigo' => '0007', 'nombre' => 'ABASTO']);
		Articulo::Create(['codigo' => '0008', 'nombre' => 'BIFES']);
		Articulo::Create(['codigo' => '0009', 'nombre' => 'PISTOLA']);
		Articulo::Create(['codigo' => '0010', 'nombre' => 'RECORTES']);
		Articulo::Create(['codigo' => '0011', 'nombre' => 'STOCK DIAS ANTERIORES']);


		//$this->call('MovimientosSeeder');
		//$this->call('DetallesSeeder');

	}

}
