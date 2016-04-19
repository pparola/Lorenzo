<?php namespace Facturacion\Http\Controllers;

use Facturacion\Http\Requests;
use Facturacion\Http\Controllers\Controller;

use Facturacion\Http\Requests\CreateClienteRequest;
use Facturacion\Http\Requests\EditClienteRequest;

use Illuminate\Http\Request;
use Facturacion\Cliente;
use Facturacion\Reparto;
use Facturacion\Movimiento;

class ClienteController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{

		$nombre = $request->get('nombre');
		$clientes = Cliente::bnombre($nombre)->paginate(8);
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
				'direccion'     => strtoupper( $request->get('direccion')),
				'localidad'	=> strtoupper( $request->get('localidad')),
				'codpos'        => strtoupper( $request->get('codpos')),
				'telefono'      => strtoupper( $request->get('telefono')),
				'tipiva' 	=> strtoupper( $request->get('tipiva')),
				'cuit' 		=> strtoupper( $request->get('cuit')),
				'reparto_id'    => strtoupper( $request->get('reparto_id')),
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
	public function update($id, EditClienteRequest $request)
	{
		$cliente = Cliente::find($id);
		$cliente->nombre 		= strtoupper( $request->get('nombre')) ;
		$cliente->direccion             = strtoupper( $request->get('direccion')) ;
		$cliente->localidad             = strtoupper( $request->get('localidad')) ;
		$cliente->codpos 		= strtoupper( $request->get('codpos')) ;
		$cliente->telefono 		= strtoupper( $request->get('telefono')) ;
		$cliente->tipiva 		= strtoupper( $request->get('tipiva')) ;
		$cliente->cuit  		= strtoupper( $request->get('cuit')) ;
		$cliente->reparto_id		= strtoupper( $request->get('reparto_id')) ;

		$cliente->save();

		return redirect('/clientes')->with('mensaje', 'Se actualizo el cliente correctamente');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$movimientos = Movimiento::where('cliente_id', '=', $id)->get();

		if( sizeof($movimientos) === 0){
			Cliente::destroy($id);
			return redirect('/clientes')->with('mensaje', 'Se eliminado el cliente correctamente');
		}else{
			return redirect('/clientes')->with('mensaje', 'No se puede eliminar un cliente con Comprobantes');
		}

	}

}
