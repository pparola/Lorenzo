@extends('master')
@section('content')

<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <div class="panel panel-primary">
            <div class="panel-heading">Reporte de Clientes</div>
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

                <form class="form-horizontal" role="form" method="POST" action="{{ url('reporte/cliente') }}" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">


                    <label class="col-md-4 control-label">Desde Cliente</label>
                    <div class="col-md-6">

                        <select class="form-control" name="desde_cliente_codigo">
                            <option value="-1">Seleccione un Cliente</option>
                            @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->codigo }}">{{ $cliente->nombre }}-{{ $cliente->codigo }}</option>
                            @endforeach
                        </select>

                    </div>

                    <label class="col-md-4 control-label">Hasta Cliente</label>
                    <div class="col-md-6">

                        <select class="form-control" name="hasta_cliente_codigo">
                            <option value="-1">Seleccione un Cliente</option>
                            @foreach ($clientes1 as $cliente)
                            <option value="{{ $cliente->codigo }}">{{ $cliente->nombre }}-{{ $cliente->codigo }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Emitir
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


