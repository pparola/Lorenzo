@extends('master')

@section('content')

	<script type="text/javascript">

		function totalgeneral(){
			var t = 0;
			$('.total').each(function(i,e){
				var parcial = $(this).val()-0;
				t = t + parcial;
			});
			//t = round( t * 100)/100;
			$('.totalgeneral').val(t);
		};

		$(function(){

			$(":input:visible:first").focus();

			$('.agregar').click(function(){

				var articulos =  $('.articulo').html();
				var n = $('.articulo').length + 1;

				var tr =	'<tr>' +
							'<th class="no">'+n+'</th>' +
							'<td> <select class="articulo form-control" name="idarticulo[]">' + articulos  + '</select> </td>' +
							'<td> <input type="text" class="cantidad form-control" name="cantidad[]"></input> 			</td>' +
							'<td> <input type="text" class="precio form-control" name="precio[]"></input>     			</td>' +
							'<td> <input type="text" class="total form-control" name="total[]" readonly></input> 		</td>' +
							'<td> <input type="button" class="btn btn-danger eliminar" value="-"></input>   			</td>' +
							'<tr>' ;

				$('.detalle').append( tr );

				$("select").last().focus();


			});
			$('.detalle').delegate('.eliminar','click',function(){
				var n = $('.articulo').length  ;
				if (n>1){
					$(this).parent().parent().remove();
				}
				totalgeneral();
			});
			$('.detalle').delegate('.articulo','change',function(){
				var tr = $(this).parent().parent();
				var precio = tr.find('.articulo option:selected').attr('data-precio');
				tr.find('.precio').val(precio);
				totalgeneral();
			});

			$('.detalle').delegate('.cantidad,.precio','keyup',function(){
				var tr = $(this).parent().parent();
				var cantidad = tr.find('.cantidad').val();
				var precio = tr.find('.precio').val();
				var total = (Math.round( (cantidad * precio ) * 100 )/100);
				tr.find('.total').val(total);
				totalgeneral();
			});


		});


	</script>

	<div class="panel panel-primary">
		<div class="panel-heading">Agregar Factura de Venta</div>
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

			<form  id="myform" class="form-horizontal" role="form" method="POST" action="{{  url('createfacturaventa')  }} >

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

				<table class="table table-bordered table-hover">
					<thead>
						<th class="col-md-1">
							N#
						</th>
						<th class="col-md-6">
							Articulo
						</th>
						<th class="col-md-1">
							Peso
						</th>
						<th class="col-md-1">
							Precio
						</th>
						<th class="col-md-2">
							Total
						</th>
						<th class="col-md-1">
							Acciones
						</th>
					</thead>
					<tbody class="detalle">
						<tr>
							<th class="no">1</th>
							<td>
								<select class="articulo form-control" name="idarticulo[]">

									<option data-precio="0" value="-1">Seleccione un Articulo</option>

									@foreach ($articulos as $articulo)
									<option data-precio="{{ $articulo->precio }}" value="{{ $articulo->id }}">{{ $articulo->codigo }}-{{ $articulo->nombre }}</option>
									@endforeach
								</select>
							</td>

							<td> <input type="text" class="cantidad form-control" name="cantidad[]"></input> 	</td>
							<td> <input type="text" class="precio form-control" name="precio[]"></input>     	</td>
							<td> <input type="text" class="total form-control" name="total[]" readonly></input>       </td>
							<td> <input type="button" class="btn btn-danger eliminar" value="-"></input> 	 	</td>
						</tr>
					</tbody>
					<tfoot>
						<th><input type="button" class="agregar btn btn-success " value="+" /></th>
						<th colspan="3">Total:</th>
						<th><input type="text" class="totalgeneral form-control" name="totalgeneral" readonly></input></th>
					</tfoot>
				</table>

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
