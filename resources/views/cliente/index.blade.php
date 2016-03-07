@extends('master')

@section('content')

	@if(Session::has('mensaje'))
		<div class="alert alert-success">
			<p>{{ Session::get('mensaje') }}</p>
		</div>
	@endif

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

			<div class="panel panel-primary">
				<div class="panel-heading">Clientes</div>
				<div class="panel-body">

					<form class="navbar-form navbar-left pull-right" role="search" method="GET" action="/clientes">
					  <div class="form-group">
					    <input type="text" class="form-control" placeholder="Nombre a Buscar" name="nombre" value="{{ $nombre }}">
					  </div>
					  <button type="submit" class="btn btn-default">Buscar</button>
					</form>

					@if (sizeof( $clientes) > 0 )

						<table class="table table-striped" >
							<tr class="warning">
								<th>Codigo</th>
								<th>Nombre</th>
								<th align="right">Acciones</th>
							</tr>

							@foreach ($clientes as $cliente)
								<tr>
									<td>{{ $cliente->codigo }}</td>
									<td>{{ $cliente->nombre }}</td>
									<td align="right">
										<a href="{{ url("clientes/edit/$cliente->id") }}" class="btn btn-info btn-xs">Actualizar</a>
										<a href="{{ url("clientes/delete/$cliente->id") }}" class="btn btn-info btn-xs">Eliminar</a>
									</td>
								</tr>

							@endforeach

						</table>
					@else
						<div class="alert alert-danger">
							<p>
								Al parecer no existen clientes creados... debes tener al menos uno.
							</p>
						</div>
					@endif
					<p>
					{!! $clientes->render() !!} 
					</p>
					<a href="{{ url('clientes/create') }}" class="btn btn-info">Agregar</a>
				</div>
			</div>
		</div>
	</div>
@endsection
