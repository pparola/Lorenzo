<?php

namespace Facturacion;

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
    protected $fillable = array(
       'tipo_id',
       'fecha',
       'cliente_id',
       'total',
       'descripcion'
    );

    public function scopeBfecha($query, $fecha) {
        $query->where("fecha", "=", "$fecha");
    }

    public function cliente() {
        return $this->belongsTo('Facturacion\Cliente');
    }

    public function tipo() {
        return $this->belongsTo('Facturacion\Tipo');
    }

    public function detalles(){
        return $this->hasMany('Facturacion\Detalle','idmovimiento');
    }
    
}
