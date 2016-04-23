<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Listado de Clientes</title>
    </head>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
        }
    </style>    
    <body>
        <main>
            <div id="details" class="clearfix">
                <h1>Listado de Clientes</h1>
                <h3>A la fecha: {{ $fecha }} </h3>
            </div>
            <table border="1" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <td>CODIGO</td>
                        <td>NOMBRE</td>
                        <td>TELEFONO</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $clientes as $cliente )
                    <tr>
                        <td> {{ $cliente->codigo }}</td>
                        <td> {{ $cliente->nombre }}</td>
                        <td> {{ $cliente->telefono }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </main>
    </body>
</html>
