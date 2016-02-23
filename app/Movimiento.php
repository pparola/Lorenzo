<?php namespace Facturacion;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model {

	public $timestamps = false;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'movimientos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'tipo', 
							'fecha', 
							'id_cliente', 
							'total' , 
							'descripcion' ];


}
