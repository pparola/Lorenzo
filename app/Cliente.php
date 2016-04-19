<?php

namespace Facturacion;

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
        'reparto_id'];

    public function movimientos(){
        return $this->hasMany('Facturacion\Movimiento');
    }


    public function scopeBnombre($query, $nombre) {
        if (trim($nombre) != "") {
            $query->where("nombre", "LIKE", "%$nombre%");
        }
    }

}
