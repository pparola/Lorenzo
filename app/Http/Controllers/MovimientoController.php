<?php namespace Facturacion\Http\Controllers;

use Facturacion\Http\Requests;
use Facturacion\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Facturacion\Http\Requests\createfacturaventaRequest;
use Facturacion\Http\Requests\createpagoventaRequest;
use Facturacion\Http\Requests\createcreditoventaRequest;
use Facturacion\Http\Requests\createdebitoventaRequest;

use Facturacion\Cliente;
use Facturacion\Articulo;
use Facturacion\Movimiento;
use Facturacion\Detalle;

class MovimientoController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}


	public function index()
	{
		$datos = array();
		$movimientos = Movimiento::bfecha(date('Y-m-d')) ;


		return view('Movimiento.index', $movimientos);
	}


	public function createFacturaVenta()
	{
		$fecha = date('Y-m-d');
		$clientes = Cliente::all();
		$articulos = Articulo::all();
		$datos = ['clientes'=>$clientes, 'fecha'=>$fecha, 'articulos'=>$articulos];
		return view('Movimiento.CreateFacturaVenta', $datos);
	}


	public function storeFacturaVenta(createfacturaventaRequest $request)
	{
		$movimiento = Movimiento::create(
		[
			'tipo'			=> 'VF',
			'fecha' 		=> $request->get('fecha'),
			'idcliente' 	=> intval($request->get('idcliente')),
			'descripcion'	=> strtoupper($request->get('descripcion')),
			'total'			=> $request->get('totalgeneral')
		]);

		$aidarticulo 	= $request->get('idarticulo');
		$apeso		 	= $request->get('cantidad');
		$aprecio	 	= $request->get('precio');

		for($i=0; $i<count($aidarticulo); $i++){
			Detalle::create([
				'idmovimiento' 	=> $movimiento->id,
				'idarticulo' 	=> $aidarticulo[$i],
				'peso'			=> $apeso[$i],
				'precio'		=> $aprecio[$i]
			]);
		}

		// generar la impresion
		$cliente = Cliente::find($movimiento->idcliente);


		$detalles = '';


		$detalles = $detalles . str_pad( 'Codigo'		, 10, ' ')		. '     ';
		$detalles = $detalles . str_pad( 'Descripcion'	, 32, ' ')		. '     ';
		$detalles = $detalles . str_pad( 'Peso' 		, 15, ' ',STR_PAD_LEFT). '	    ';
		$detalles = $detalles . str_pad( 'Precio'		, 15, ' ',STR_PAD_LEFT). '	    ';
		$detalles = $detalles . str_pad( 'Total'		, 15, ' ',STR_PAD_LEFT).'\n';


		for($i=0; $i<count($aidarticulo); $i++){

			$articulo =  Articulo::find($aidarticulo[$i]);

			$detalles = $detalles . str_pad($articulo->codigo, 10, ' ')		. '     ';
			$detalles = $detalles . str_pad($articulo->nombre, 32, ' ')		. '     ';
			$detalles = $detalles . str_pad( number_format($apeso[$i]	,2,'.',',') , 15, ' ',STR_PAD_LEFT). '	    ';
			$detalles = $detalles . str_pad( number_format($aprecio[$i] ,2,'.',',')	, 15, ' ',STR_PAD_LEFT). '	    ';
			$detalles = $detalles . str_pad( number_format($aprecio[$i] * $apeso[$i],2,'.',','), 15, ' ',STR_PAD_LEFT).'\n';

		}



		return view('Movimiento.CreateFacturaVentaImpresion',[
			'cliente' => $cliente,
			'movimiento' => $movimiento,
			'detalles' =>$detalles ]);
	}


	public function createPagoVenta()
	{
		$fecha = date('Y-m-d');
		$clientes = Cliente::all();
		$datos = ['clientes'=>$clientes, 'fecha'=>$fecha ];
		return view('Movimiento.CreatePagoVenta', $datos);
	}



	public function storePagoVenta(createfacturaventaRequest $request)
	{
		$movimiento = Movimiento::create(
		[
			'tipo'			=> 'VP',
			'fecha' 		=> $request->get('fecha'),
			'idcliente' 	=> intval($request->get('idcliente')),
			'descripcion'	=> strtoupper($request->get('descripcion')),
			'total'			=> $request->get('importe')
		]);

		$cliente = Cliente::find(intval($request->get('idcliente')));

		$detalles = '';
		$detalles = $detalles . 'Recibi del Sr./a ' .$cliente->nombre  .'\n';
		$detalles = $detalles . 'la cantidad de $ ' .number_format($request->get('importe'),2) .'\n';
		$detalles = $detalles . 'en concepto de pago a cuenta' .'\n';

		return view('Movimiento.CreatePagoVentaImpresion',[
			'cliente' 		=> $cliente,
			'movimiento' 	=> $movimiento,
			'detalles' 		=> $detalles,
		]);
	}


	public function createCreditoVenta()
	{
		$fecha = date('Y-m-d');
		$clientes = Cliente::all();
		$datos = ['clientes'=>$clientes, 'fecha'=>$fecha ];
		return view('Movimiento.CreateCreditoVenta', $datos);
	}


	public function storeCreditoVenta(createcreditoventaRequest $request)
	{
		$movimiento = Movimiento::create(
		[
			'tipo'			=> 'VC',
			'fecha' 		=> $request->get('fecha'),
			'idcliente' 	=> intval($request->get('idcliente')),
			'descripcion'	=> strtoupper($request->get('descripcion')),
			'total'			=> $request->get('importe')
		]);

		$cliente = Cliente::find(intval($request->get('idcliente')));

		$detalles = '';
		$detalles = $detalles . 'Recibi del Sr./a ' . env('EMPRESA', 'Apx Consultores')  .'\n';
		$detalles = $detalles . 'la cantidad de $ ' .number_format($request->get('importe'),2) .'\n';
		$detalles = $detalles . 'en concepto de '.  strtoupper($request->get('descripcion')) .'\n';

		return view('Movimiento.CreateCreditoVentaImpresion',[
			'cliente' 		=> $cliente,
			'movimiento' 	=> $movimiento,
			'detalles' 		=> $detalles,
		]);
	}

	public function createDebitoVenta()
	{
		$fecha = date('Y-m-d');
		$clientes = Cliente::all();
		$datos = ['clientes'=>$clientes, 'fecha'=>$fecha ];
		return view('Movimiento.CreateDebitoVenta', $datos);
	}


	public function storeDebitoVenta(createdebitoventaRequest $request)
	{
		$movimiento = Movimiento::create(
		[
			'tipo'			=> 'VD',
			'fecha' 		=> $request->get('fecha'),
			'idcliente' 	=> intval($request->get('idcliente')),
			'descripcion'	=> strtoupper($request->get('descripcion')),
			'total'			=> $request->get('importe')
		]);

		$cliente = Cliente::find(intval($request->get('idcliente')));

		$detalles = '';
		$detalles = $detalles . 'Recibi del Sr./a ' .$cliente->nombre  .'\n';
		$detalles = $detalles . 'la cantidad de $ ' .number_format($request->get('importe'),2) .'\n';
		$detalles = $detalles . 'en concepto de '.  strtoupper($request->get('descripcion')) .'\n';

		return view('Movimiento.CreateDebitoVentaImpresion',[
			'cliente' 		=> $cliente,
			'movimiento' 	=> $movimiento,
			'detalles' 		=> $detalles,
		]);
	}

}

