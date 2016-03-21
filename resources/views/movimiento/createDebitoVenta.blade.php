@extends('master')

@section('content')

	<div class="panel panel-primary">
		<div class="panel-heading">Agregar Nota de Debito de Venta</div>
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

			<form  class="form-horizontal" role="form" method="POST" action="{{  url('createdebitoventa') }}" >

					<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">

					<label class="col-md-1 control-label">Cliente</label>
					<div class="col-md-6">

						<select class="form-control" name="idcliente">
							<option value="-1">Seleccione un Cliente</option>
							@foreach ($clientes as $cliente)
								<option value="{{ $cliente->id }}">{{ $cliente->nombre }}-{{ $cliente->codigo }}</option>
							@endforeach

						</select>

					</div>

					<label class="col-md-1 col-md-offset-2 control-label">Fecha</label>

					<div class="col-md-2">
						<input type="text" class="form-control" name="fecha" maxlength="10" value="{{ $fecha }}">
					</div>

				</div>

				<div class="form-group">
					<label class="col-md-1 control-label">Descripcion</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="descripcion" maxlength="32" value="{{ old('descripcion') }}">
					</div>

				</div>

				<div class="form-group">
					<label class="col-md-1 control-label">Importe</label>
					<div class="col-md-2">
						<input type="text" class="form-control" name="importe" maxlength="12" value="{{ old('importe') }}">
					</div>

				</div>


				<div class="form-group">
					<div class="col-md-1 col-md-offset-10">
						<button type="submit" class="btn btn-primary">
							Agregar
						</button>
					</div>
				</div>

			</form>
		</div>
	</div>

@endsection
