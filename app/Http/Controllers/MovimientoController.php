<?php namespace Facturacion\Http\Controllers;

use Facturacion\Http\Requests;
use Facturacion\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Facturacion\Http\Requests\createfacturaventaRequest;

use Facturacion\Cliente;
use Facturacion\Articulo;
use Facturacion\Movimiento;
use Facturacion\Detalle;

class MovimientoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createFacturaVenta()
	{
		$fecha = date('Y-m-d');
		$clientes = Cliente::all();
		$articulos = Articulo::all();
		$datos = ['clientes'=>$clientes, 'fecha'=>$fecha, 'articulos'=>$articulos];
		return view('Movimiento.CreateFacturaVenta', $datos);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
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

		return redirect('/')->with('mensaje', 'Se agrego la factura de venta correctamente');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
