@extends('master')
@section('content')
<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/libs/FileSaver.js/FileSaver.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/libs/Blob.js/Blob.js') }}"</script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/libs/Blob.js/BlobBuilder.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/libs/Deflate/deflate.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/libs/Deflate/adler32cs.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/jspdf.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/jspdf.plugin.addimage.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/jspdf.plugin.cell.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/jspdf.plugin.from_html.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/jspdf.plugin.ie_below_9_shim.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/jspdf.plugin.javascript.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/jspdf.plugin.sillysvgrenderer.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/jspdf.plugin.split_text_to_size.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/jspdf.plugin.standard_fonts_metrics.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jspdf/jspdf.PLUGINTEMPLATE.js') }}"></script>

<script>
$(function () {
ejecutar();
});
</script>

<div class="row">
    <iframe id="preview-pane" class="preview-pane col-md-12" height="540" frameborder="1"> A visualizar </iframe>
    <a href="{{url('/home')}}" class="btn btn-primary" >Volver a Movimientos</a>

</div>

<script>

    function ejecutar() {

        var doc = new jsPDF("l", "mm", "a5");
        doc.setFont("courier");
        doc.setFontSize(10);

        //cuadrado general
        doc.rect(5, 5, 200, 125, 'fill');
        //cuadrado de encabezado
        doc.rect(5, 5, 200, 40, 'fill');

        //cuadradito de Letra
        doc.rect(95, 5, 10, 10, 'fill');

        doc.setFontSize(20);
        doc.text(98, 12, 'X');

        doc.setFontSize(14);
        doc.text(150, 20, 'Fecha:' + '{{ $movimiento->fecha }}');
        doc.text(10, 10, '{{ env('EMPRESA') }}');
        doc.text(10, 20, '{{ $tipo->descripcion }}');
        doc.setFontSize(8);
        doc.text(10, 40, 'Documento No valido como Factura');

        //cuadrado de cliente
        doc.rect(5, 45, 200, 10, 'fill');

        doc.text(15, 50, 'Cliente:     ' + '{{ $cliente->codigo }}' + ' - ' + '{{ $cliente->nombre }}');
        doc.text(15, 53, 'Descripcion: ' + '{{ $movimiento->descripcion }}');

        doc.setFontSize(8);

        doc.text(15, 60, '{{ $detalles }}');

        //cuadrado de pie
        doc.rect(5, 120, 200, 10, 'fill');

        doc.setFontSize(10);
        doc.text(170, 125, 'Total: ' + '{{ number_format($movimiento->total,2) }}');

        // Output as Data URI
        var string = doc.output('datauristring');
        $('.preview-pane').attr('src', string);
    }
</script>

@endsection
