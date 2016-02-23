<?php namespace Facturacion;

use Illuminate\Database\Eloquent\Model;

class Reparto extends Model {


	protected $table = 'repartos';
	protected $fillable = ['nombre' ];
	public $timestamps = false;




	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = ['password', 'remember_token'];


}
