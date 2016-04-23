<?php

namespace Facturacion\Http\Controllers;

use Facturacion\Http\Requests;
use Facturacion\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Facturacion\Cliente;

class ReporteController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getCliente() {
        $clientes = Cliente::orderBy('codigo')->get();
        $clientes1 = Cliente::orderBy('codigo','desc')->get();
        return view('Reporte.cliente', array('clientes' => $clientes, 'clientes1' => $clientes1 ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function postCliente(Request $request) {

        $desde_cliente_codigo = $request->get('desde_cliente_codigo');
        $hasta_cliente_codigo = $request->get('hasta_cliente_codigo');
        
        $fecha = date('Y-m-d');
        $clientes = \DB::table('clientes')->whereBetween('codigo', array($desde_cliente_codigo, $hasta_cliente_codigo))->get();

        $view =  \View::make('pdf.Cliente', compact('clientes', 'fecha'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('cliente');        
        
    }

}
