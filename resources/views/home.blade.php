@extends('master')

@section('content')
    <h1 class="page-header">Ingreso al sistema</h1>

    @if(Session::has('mensaje'))
        <div class="alert alert-success">
            <p>{{ Session::get('mensaje') }}</p>
        </div>
    @endif


@endsection


