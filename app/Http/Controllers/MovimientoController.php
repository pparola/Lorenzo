<?php

namespace Facturacion\Http\Controllers;

use Facturacion\Http\Requests;
use Facturacion\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Facturacion\Http\Requests\createMovimientoRequest;
use Facturacion\Cliente;
use Facturacion\Articulo;
use Facturacion\Movimiento;
use Facturacion\Detalle;
use Facturacion\Tipo;

class MovimientoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $tipos = Tipo::all();
        $movimientos = Movimiento::orderBy('id', 'desc')->paginate(10);
        return view('Movimiento.index', array('movimientos' => $movimientos, 'tipos' => $tipos));
    }

    public function create($idTipo) {
        $tipo = Tipo::find($idTipo);
        $fecha = date('Y-m-d');
        $clientes = Cliente::all();
        $articulos = Articulo::all();
        $datos = array(
           'clientes' => $clientes,
           'fecha' => $fecha,
           'articulos' => $articulos,
           'tipo' => $tipo
        );
        if ($tipo->conarticulos == 'S') {
            return view('Movimiento.CreateMovimientoConArticulo', $datos);
        } else {
            return view('Movimiento.CreateMovimientoSinArticulo', $datos);
        }
    }

    public function store(createMovimientoRequest $request) {

        $tipo = Tipo::find($request->get('tipo_id'));

        $movimiento = Movimiento::create(
              [
                 'tipo_id' => $request->get('tipo_id'),
                 'fecha' => $request->get('fecha'),
                 'cliente_id' => intval($request->get('cliente_id')),
                 'descripcion' => strtoupper($request->get('descripcion')),
                 'total' => $request->get('totalgeneral')
        ]);

        if ($tipo->conarticulos == 'S') {
            $aidarticulo = $request->get('idarticulo');
            $apeso = $request->get('cantidad');
            $aprecio = $request->get('precio');

            for ($i = 0; $i < count($aidarticulo); $i++) {
                Detalle::create([
                   'idmovimiento' => $movimiento->id,
                   'idarticulo' => $aidarticulo[$i],
                   'peso' => $apeso[$i],
                   'precio' => $aprecio[$i]
                ]);
            }
        }

        // generar la impresion
        $cliente = Cliente::find($movimiento->cliente_id);

        if ($tipo->conarticulos == 'S') {
            $detalles = '';
            $detalles = $detalles . str_pad('Codigo', 10, ' ') . '     ';
            $detalles = $detalles . str_pad('Descripcion', 32, ' ') . '     ';
            $detalles = $detalles . str_pad('Peso', 15, ' ', STR_PAD_LEFT) . '	    ';
            $detalles = $detalles . str_pad('Precio', 15, ' ', STR_PAD_LEFT) . '	    ';
            $detalles = $detalles . str_pad('Total', 15, ' ', STR_PAD_LEFT) . '\n';


            for ($i = 0; $i < count($aidarticulo); $i++) {

                $articulo = Articulo::find($aidarticulo[$i]);

                $detalles = $detalles . str_pad($articulo->codigo, 10, ' ') . '     ';
                $detalles = $detalles . str_pad($articulo->nombre, 32, ' ') . '     ';
                $detalles = $detalles . str_pad(number_format($apeso[$i], 2, '.', ','), 15, ' ', STR_PAD_LEFT) . '	    ';
                $detalles = $detalles . str_pad(number_format($aprecio[$i], 2, '.', ','), 15, ' ', STR_PAD_LEFT) . '	    ';
                $detalles = $detalles . str_pad(number_format($aprecio[$i] * $apeso[$i], 2, '.', ','), 15, ' ', STR_PAD_LEFT) . '\n';
            }
        } else {
            if ($tipo->signo < 0) {
                $detalles = '';
                $detalles = $detalles . 'Recibi del Sr./a ' . $cliente->nombre . '\n';
                $detalles = $detalles . 'la cantidad de $ ' . number_format($request->get('totalgeneral'), 2) . '\n';
                $detalles = $detalles . 'en concepto de ' . strtoupper($request->get('descripcion')) . '\n';
            } else {
                $detalles = '';
                $detalles = $detalles . 'Recibi del Sr./a ' . env('EMPRESA', 'Apx Consultores') . '\n';
                $detalles = $detalles . 'la cantidad de $ ' . number_format($request->get('totalgeneral'), 2) . '\n';
                $detalles = $detalles . 'en concepto de ' . strtoupper($request->get('descripcion')) . '\n';
            }
        }


        return view('Movimiento.Impresion', array(
           'tipo' => $tipo,
           'cliente' => $cliente,
           'movimiento' => $movimiento,
           'detalles' => $detalles));
    }

    public function show($id) {

        $movimiento = Movimiento::find( $id );
        $movimiento->load('tipo','cliente', 'detalles');
        
        foreach( $movimiento->detalles as $detalle ){
            $detalle->load('articulo');
        }
        
        return view('Movimiento.show', array( 'movimiento' => $movimiento ));

    }
    
    public function delete(Request $request) {
        
        $id = $request->get('movimiento_id');

        Movimiento::destroy($id);
        return redirect('/home')->with('mensaje', \sprintf( 'Se elimino el Movimiento %08d correctamente', $id )) ;
        
    }


    
}
