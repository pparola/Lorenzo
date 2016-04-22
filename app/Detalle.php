<?php

namespace Facturacion;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model {

    public $timestamps = false;

    protected $table = 'detalles';

    protected $fillable = array(
       'idmovimiento',
       'idarticulo',
       'peso',
       'precio');

    public function movimiento() {
        return $this->belongsTo('Facturacion\Movimiento','idmovimiento');
    }

    public function articulo(){
        return $this->belongsTo('Facturacion\Articulo', 'idarticulo');
    }
    
}
