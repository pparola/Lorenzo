<?php namespace Facturacion;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

	public $timestamps = false;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'clientes';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable = [ 'codigo',
							'nombre',
							'direccion',
							'codpos',
							'localidad',
							'telefono',
							'tipiva',
							'cuit',
							'idreparto'];



}
