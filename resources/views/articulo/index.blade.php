@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">

		<div class="col-md-8 col-md-offset-2">

			@if(Session::has('mensaje'))
				<div class="alert alert-success">
					<p>{{ Session::get('mensaje') }}</p>
				</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">Articulos</div>
				<div class="panel-body">

					@if (sizeof( $articulos) > 0 )

						<table class="table table-hover" >
							<tr class="warning">
								<th>codigo</th>
								<th>Nombre</th>
								<th align="right">Acciones</th>
							</tr>

							@foreach ($articulos as $articulo)
								<tr>
									<td>{{ $articulo->codigo }}</td>
									<td>{{ $articulo->nombre }}</td>
									<td align="right">
										<a href="{{ url("articulos/edit/$articulo->id") }}" class="btn btn-info btn-xs">Actualizar</a>
										<a href="{{ url("articulos/delete/$articulo->id") }}" class="btn btn-info btn-xs">Eliminar</a>
									<td>
								</tr>

							@endforeach

						</table>
					@else
						<div class="alert alert-danger">
							<p>
								Al parecer no existen Articulos creados... debes tener al menos uno.
							</p>
						</div>
					@endif
					<a href="{{ url('articulos/create') }}" class="btn btn-info">Agregar</a>

				<div>
			<div>
		</div>
	</div>
</div>
@endsection
