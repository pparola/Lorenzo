@extends('master')

@section('content')

	@if(Session::has('mensaje'))
		<div class="alert alert-success">
			<p>{{ Session::get('mensaje') }}</p>
		</div>
	@endif

    <div class="row">
        <div class="col-md-6 col-md-offset-3">

			<div class="panel panel-primary">
				<div class="panel-heading">Repartos</div>
				<div class="panel-body">

					@if (sizeof( $repartos) > 0 )

						<table class="table table-hover" >
							<tr class="warning">
								<th>#</th>
								<th>Nombre</th>
								<th align="right">Acciones</th>
							</tr>

							@foreach ($repartos as $reparto)
								<tr>
									<td>{{ $reparto->id }}</td>
									<td>{{ $reparto->nombre }}</td>
									<td align="right">
										<a href="{{ url("repartos/edit/$reparto->id") }}" class="btn btn-info btn-xs">Actualizar</a>
										<a href="{{ url("repartos/delete/$reparto->id") }}" class="btn btn-info btn-xs">Eliminar</a>
									</td>
								</tr>

							@endforeach

						</table>
					@else
						<div class="alert alert-danger">
							<p>
								Al parecer no existen repartos creados... debes tener al menos uno.
							</p>
						</div>
					@endif
					<a href="{{ url('repartos/create') }}" class="btn btn-info">Agregar</a>

				</div>
			</div>
		</div>
	<div>
</div>
@endsection
