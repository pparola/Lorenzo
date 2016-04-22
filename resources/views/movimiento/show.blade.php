@extends('master')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="panel panel-primary">
            <div class="panel-heading">{{ $movimiento->tipo->descripcion }} - <?php echo sprintf( '%08d', $movimiento->id); ?> </div>
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

            <form  class="form-horizontal" role="form" method="POST" action="{{  url("movimiento/delete") }}" >

                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="movimiento_id" value="{{ $movimiento->id }}" />

                <div class="form-group">

                    <label class="col-md-1 control-label">Cliente</label>
                    <div class="col-md-6">
                        <label class="form-control" > {{ $movimiento->cliente->nombre }}-{{ $movimiento->cliente_id }} </label>
                    </div>

                    <label class="col-md-1 col-md-offset-2 control-label">Fecha</label>
                    <div class="col-md-2">
                        <label class="form-control"> {{ $movimiento->fecha }} </label>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label">Descripcion</label>
                    <div class="col-md-6">
                        <label class="form-control"> {{ $movimiento->descripcion }} </label>
                    </div>

                </div>


                <table class="table table-bordered table-hover">
                    <thead>
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
                    </thead>
                    <tbody class="detalle">

                        @foreach( $movimiento->detalles as $detalle )
                        <tr>
                            <td> {{ $detalle->articulo->nombre }} </td>
                            <td> {{ $detalle->peso }} </td>
                            <td> {{ $detalle->precio }} </td>
                            <td> {{ $detalle->peso * $detalle->precio }} </td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                    <th colspan="3">Total:</th>
                    <th> {{ $movimiento->total }} </th>
                    </tfoot>

                </table>
               
                
                <div class="form-group">
                    <div class="col-md-1 col-md-offset-10">
                        <button type="submit" class="btn btn-primary">
                            Eliminar
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
