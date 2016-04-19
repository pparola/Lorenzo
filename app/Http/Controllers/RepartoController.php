<?php

namespace Facturacion\Http\Controllers;

use Facturacion\Http\Requests;
use Facturacion\Http\Controllers\Controller;
use Facturacion\Reparto;
use Facturacion\Cliente;
use Illuminate\Http\Request;
use Facturacion\Http\Requests\CreateRepartoRequest;
use Facturacion\Http\Requests\EditRepartoRequest;

class RepartoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $repartos = Reparto::All();
        return view('Reparto.Index', [ 'repartos' => $repartos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('Reparto.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateRepartoRequest $request) {
        Reparto::Create(
                [ 'nombre' => strtoupper($request->get('nombre'))]
        );
        return redirect('/repartos')->with('mensaje', 'Se agrego el reparto correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $reparto = Reparto::find($id);
        return view('Reparto.edit', ['reparto' => $reparto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, EditRepartoRequest $request) {
        $reparto = Reparto::find($id);
        $reparto->nombre = strtoupper($request->get('nombre'));
        $reparto->save();
        return redirect('/repartos')->with('mensaje', 'Se actualizo el reparto correctamente');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $clientes = Cliente::where('reparto_id', '=', $id)->get();
        if (sizeof($clientes) === 0) {
            Reparto::destroy($id);
            return redirect('/repartos')->with('mensaje', 'Se eliminado el reparto correctamente');
        } else {
            return redirect('/repartos')->with('mensaje', 'No se puede eliminar un reparto con clientes');
        }
    }

}
