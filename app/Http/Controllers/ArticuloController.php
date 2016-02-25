<?php namespace Facturacion\Http\Controllers;

use Facturacion\Http\Requests;
use Facturacion\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Facturacion\Http\Requests\CreateArticuloRequest;
use Facturacion\Http\Requests\EditArticuloRequest;

use Facturacion\Articulo;
use Facturacion\Detalle;

class ArticuloController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articulos = Articulo::All();
		return view('Articulo.Index',[ 'articulos' => $articulos]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('Articulo.Create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateArticuloRequest $request)
	{
		Articulo::Create(
			[ 'nombre' => strtoupper( $request->get('nombre')),
			  'codigo' => strtoupper( $request->get('codigo')) ]
		);
		return redirect('/articulos')->with('mensaje', 'Se agrego el articulo correctamente');
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
		$articulo = Articulo::find($id);
		return view('articulo.edit' ,['articulo'=>$articulo]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditArticuloRequest $request)
	{
		$articulo = Articulo::find($id);
		$articulo->nombre = strtoupper( $request->get('nombre')) ;
		$articulo->save();
		return redirect('/articulos')->with('mensaje', 'Se actualizo el articulo correctamente');

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
		$detalles = Detalle::where('idarticulo', '=', $id)->get();

		if( sizeof($detalles) === 0){
			Articulo::destroy($id);
			return redirect('/articulos')->with('mensaje', 'Se eliminado el articulo correctamente');
		}else{
			return redirect('/articulos')->with('mensaje', 'No se puede eliminar un articulo que ha sido clientes');
		}

	}

}
