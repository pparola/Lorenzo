<?php namespace Facturacion\Http\Requests;

use Facturacion\Http\Requests\Request;

class EditClienteRequest extends Request {

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
			'nombre' 	=> 'required|unique:clientes',
			'tipiva' 	=> 'required',
			'idreparto' => 'exists:repartos,id',
		];
	}

}
