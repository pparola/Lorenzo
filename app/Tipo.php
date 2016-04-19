<?php namespace Facturacion;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model {

    protected $table = 'tipos';
    protected $fillable = ['descripcion','operacion','signo','conarticulos'];
    public $timestamps = false;

}
