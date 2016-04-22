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
                <table class="table table-striped" >
                    <tr class="warning">
                        <td>Codigo</td>
                        <td>Tipo</td>
                        <td>Fecha</td>
                        <td>Cliente</td>
                        <td align="right">Total</td>
                        <td align="right">Acciones</td>
                    </tr>
                    @foreach ($movimientos as $movimiento)
                    <tr>
                        <td><?php echo sprintf( '%08d', $movimiento->id ) ?>  </td>
                        <td>{{ $movimiento->tipo->descripcion }}</td>
                        <td>{{ $movimiento->fecha }}</td>
                        <td>{{ $movimiento->cliente_id }}-{{ $movimiento->cliente->nombre }} </td>
                        <td align="right">{{ number_format($movimiento->total,2) }}</td>
                        <td align="right">
                            <a href="{{ url("movimiento/delete/$movimiento->id") }}" class="btn btn-danger btn-xs">-</a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6" align="left">
                            @foreach($tipos as $tipo)
                            <a href="{{ url( "movimiento/create/$tipo->id" )}}" class="btn btn-info btn-xs"> {{$tipo->descripcion }} </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" align="left">{!! $movimientos->render() !!} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
