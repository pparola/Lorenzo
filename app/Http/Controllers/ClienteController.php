<?php namespace Facturacion\Http\Controllers;

use Facturacion\Http\Requests;
use Facturacion\Http\Controllers\Controller;

use Facturacion\Http\Requests\CreateClienteRequest;

use Illuminate\Http\Request;
use Facturacion\Cliente;
use Facturacion\Reparto;

class ClienteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$nombre = $request->get('nombre');
		$clientes = Cliente::bnombre($nombre)->paginate(10);
		return view('Cliente.Index',[ 'clientes' => $clientes, 'nombre'=>$nombre]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$repartos = Reparto::All();
		return view('Cliente.Create', [ 'repartos' => $repartos ]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateClienteRequest $request)
	{
		Cliente::Create(
			[
				'codigo' 	=> strtoupper( $request->get('codigo')),
				'nombre' 	=> strtoupper( $request->get('nombre')),
				'direccion' => strtoupper( $request->get('direccion')),
				'localidad'	=> strtoupper( $request->get('localidad')),
				'codpos'    => strtoupper( $request->get('codpos')),
				'telefono'  => strtoupper( $request->get('telefono')),
				'tipiva' 	=> strtoupper( $request->get('tipiva')),
				'cuit' 		=> strtoupper( $request->get('cuit')),
				'idreparto' => strtoupper( $request->get('idreparto')),
			]
		);
		return redirect('/clientes')->with('mensaje', 'Se agrego el cliente correctamente');
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
		$repartos = Reparto::All();
		$cliente = Cliente::find($id);
			return view('Cliente.edit' ,['cliente'=>$cliente, 'repartos'=>$repartos]);
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
