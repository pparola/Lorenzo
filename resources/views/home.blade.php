@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					Bienvenido al sistema de Facturacion


					<div class="dropdown">
					  	<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    Menu Principal
					    <span class="caret"></span>
					  	</button>
					  	<ul class="dropdown-menu" aria-labelledby="dropdown">

					    	<li>
					    		<a href="{{ url('articulos') }}">Actualizar Articulos</a>
				    		</li>

					    	<li>
					    		<a href="{{ url('clientes') }}">Actualizar Clientes</a>
				    		</li>
					    	<li>
					    		<a href="{{ url('repartos') }}">Actualizar Repartos</a>
				    		</li>


					    	<li role="separator" class="divider"></li>

					    	<li>
					    		<a href="{{ url('auth/logout') }}">Salir</a>
				    		</li>
					  	</ul>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
