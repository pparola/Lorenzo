<?php namespace Facturacion\Http\Requests;

use Facturacion\Http\Requests\Request;

class createfacturaventaRequest extends Request {

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
			'idcliente' => 'exists:clientes,id',
			'fecha' 	=> 'required'
		);

		$aidarticulo 	= $this->request->get('idarticulo');
		$apeso		 	= $this->request->get('cantidad');
		$aprecio	 	= $this->request->get('precio');

		for($i=0; $i<count($aidarticulo); $i++){

			$reglas['idarticulo.'.$i] = 'exists:articulos,id';
			$reglas['cantidad.'.$i  ] = 'required|numeric|min:0.01';
			$reglas['precio.'.$i   	] = 'required|numeric|min:0.01';
		}


    	return $reglas;
	}

}
