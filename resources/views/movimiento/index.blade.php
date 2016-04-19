@extends('master')
@section('content')
@if(Session::has('mensaje'))
<div class="alert alert-success">
    <p>{{ Session::get('mensaje') }}</p>
</div>
@endif
<div class="row">
    <div class="col-md-12 ">
        <div class="panel panel-primary">
            <div class="panel-heading">Movimientos de Clientes</div>
            <div class="panel-body">
                @if (sizeof( $movimientos) > 0 )
                <table class="table table-striped" >
                    <tr class="warning">
                        <td>Tipo</td>
                        <td>Fecha</td>
                        <td>Codigo</td>
                        <td>Cliente</td>
                        <td align="right">Total</td>
                        <td align="right">Acciones</td>
                    </tr>
                    @foreach ($movimientos as $movimiento)
                    <tr>
                        <td>{{ $movimiento->tipo->descripcion }}</td>
                        <td>{{ $movimiento->fecha }}</td>
                        <td>{{ $movimiento->id }}</td>
                        <td>{{ $movimiento->cliente->nombre }} </td>
                        <td align="right">{{ $movimiento->total }}</td>
                        <td align="right">
                            <a href="" class="btn btn-info btn-xs">Actualizar</a>
                            <a href="" class="btn btn-info btn-xs">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                @endif
                <table class="table table-condensed" >
                    <tr>
                        <td align="left"><a href="" class="btn btn-info">Agregar</a></td>
                        <td align="right">{!! $movimientos->render() !!} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
