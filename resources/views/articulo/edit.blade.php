@extends('master')

@section('content')

	<div class="panel panel-primary">
		<div class="panel-heading">Actualizar Articulo {{ $articulo->id }}</div>
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

			<form class="form-horizontal" role="form" method="POST" action="{{ url('articulos/edit') }}/{{ $articulo->id }}" >
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label class="col-md-4 control-label">Codigo</label>
					<div class="col-md-2">
						<input type="text" class="form-control" name="codigo" maxlength="4" value="{{ $articulo->codigo }}" readonly >
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Nombre</label>
					<div class="col-md-6">
						<input type="text" class="form-control" name="nombre" maxlength="32" value="{{ $articulo->nombre }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Precio</label>
					<div class="col-md-2">
						<input type="text" class="form-control" name="precio" maxlength="10" value="{{ $articulo->precio }}">
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">
							Modificar
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
