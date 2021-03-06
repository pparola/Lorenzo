<?php namespace Facturacion\Http\Requests;

use Facturacion\Http\Requests\Request;

class CreateClienteRequest extends Request {

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
		return [
			'codigo' => 'required|unique:clientes|numeric',
			'nombre' 	=> 'required|unique:clientes',
			'tipiva' 	=> 'required',
                        'reparto_id'    => 'exists:repartos,id',
		];
	}

}
