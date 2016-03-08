<?php namespace Facturacion;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model {

	public $timestamps = false;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'articulos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'codigo',
							'nombre',
							'precio' ];



}
