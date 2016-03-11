@extends('master')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">Actualizar Cliente</div>
		<div class="panel-body">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> Algunos problemas con los datos ingresados.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<form class="form-horizontal" role="form" method="POST" action="{{ url('clientes/edit') }}/{{ $cliente->id }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label class="col-md-4 control-label">Codigo</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="codigo" maxlength="4" disabled value="{{ $cliente->codigo }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Nombre</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="nombre" maxlength="32" value="{{ $cliente->nombre }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Direccion</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="direccion" maxlength="32" value="{{ $cliente->direccion }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Localidad</label>
					<div class="col-md-2">
						<input type="text" class="form-control" name="codpos" maxlength="4" value="{{ $cliente->codpos }}">
					</div>
					<div class="col-md-4">
						<input type="text" class="form-control" name="localidad" maxlength="25" value="{{ $cliente->localidad }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Telefono</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="telefono" maxlength="32" value="{{ $cliente->telefono }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Tipo Iva</label>
					<div class="col-md-6">
						<select class="form-control" name="tipiva">
							<option value="1" 
							@if($cliente->tipiva == '1')
								selected
							@endif 
							>Responsable Inscripto</option>
							
							<option value="2" 
							@if($cliente->tipiva == '2')
								selected
							@endif >Responsable Monotributo</option>

						</select>

					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Cuit</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="cuit" maxlength="13" value="{{ $cliente->cuit }}">
					</div>
				</div>


				<div class="form-group">
					<label class="col-md-4 control-label">Reparto</label>
					<div class="col-md-6">
						<select class="form-control" name="idreparto">
							@foreach ($repartos as $reparto)
								<option value="{{ $reparto->id }}"
								@if($cliente->idreparto==$reparto->id)
									selected
								@endif 
								">{{ $reparto->nombre }}</option>
							@endforeach

						</select>

					</div>
				</div>


				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Actualizar
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
