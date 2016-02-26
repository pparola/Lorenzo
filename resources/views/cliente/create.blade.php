@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Agregar Cliente</div>
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

					<form class="form-horizontal" role="form" method="POST" action="/repartos/create">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Codigo</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="codigo" maxlength="4" value="{{ old('codigo') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nombre" maxlength="32" value="{{ old('nombre') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Direccion</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="direccion" maxlength="32" value="{{ old('direccion') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Localidad</label>
							<div class="col-md-2">
								<input type="text" class="form-control" name="codpos" maxlength="4" value="{{ old('codpos') }}">
							</div>
							<div class="col-md-4">
								<input type="text" class="form-control" name="localidad" maxlength="25" value="{{ old('localidad') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Telefono</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="telefono" maxlength="32" value="{{ old('telefono') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Cuit</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="cuit" maxlength="13" value="{{ old('cuit') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Tipo Iva</label>
							<div class="col-md-6">
								<select class="form-control" name="tipiva">
									<option value="1">Responsable Inscripto</option>
									<option value="2">Responsable Monotributo</option>

								</select>

							</div>
						</div>


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Agregar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
