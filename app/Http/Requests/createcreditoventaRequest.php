<?php namespace Facturacion\Http\Requests;

use Facturacion\Http\Requests\Request;

class createcreditoventaRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$reglas = array(
			'idcliente' 	=> 'exists:clientes,id',
			'fecha' 		=> 'required',
			'descripcion' 	=> 'required',
			'importe'		=> 'required|numeric|min:0.01',
		);

    	return $reglas;
	}

}
