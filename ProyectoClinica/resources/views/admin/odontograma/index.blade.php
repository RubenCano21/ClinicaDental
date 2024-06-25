@extends('adminlte::page')

@section('title', 'Odontograma')

@section('content_header')
    <h1>Odontograma</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                <h3 class="card-title">Bitacora</h3>
            </div>
                
            <h1>Dental Map</h1>
            <img src="{{asset('img/odontograma.jpg')}}" usemap="#dentalmap" alt="Dental Map" width="500" height="500">
        
            <map name="Mapa dental">
                <!-- Upper teeth -->
                <area shape="circle" coords="75,30,15" href="page1.html" alt="Upper Tooth 1">
                <area shape="circle" coords="105,30,15" href="page2.html" alt="Upper Tooth 2">
                <area shape="circle" coords="135,30,15" href="page3.html" alt="Upper Tooth 3">
                <!-- Add more areas for each tooth -->
        
                <!-- Lower teeth -->
                <area shape="circle" coords="75,130,15" href="page11.html" alt="Lower Tooth 1">
                <area shape="circle" coords="105,130,15" href="page12.html" alt="Lower Tooth 2">
                <area shape="circle" coords="135,130,15" href="page13.html" alt="Lower Tooth 3">
                <!-- Add more areas for each tooth -->
            </map>

                <script>
                    $(function () {
                        $("#example1").DataTable({
                            "pageLength": 10,
                            "language": {
                                "emptyTable": "No hay información",
                                "info": "Mostrando START a END de TOTAL Pacientes",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Pacientes",
                                "infoFiltered": "(Filtrado de MAX total Pacientes)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "loadingRecords": "Cargando...",
                                "processing": "Procesando...",
                                "search": "Buscar:",
                                "zeroRecords": "Sin resultados encontrados",
                                "paginate": {
                                    "first": "Primero",
                                    "last": "Ultimo",
                                    "next": "Siguiente",
                                    "previous": "Anterior"
                                }
                            },
                            "responsive": true, "lengthChange": true, "autoWidth": false,
                            buttons: [{
                                extend: 'collection',
                                text: 'Reportes',
                                orientation: 'landscape',
                                buttons: [{
                                    extend: 'pdf'
                                }, {
                                    extend: 'excel'
                                }, {
                                    text: 'Imprimir',
                                    extend: 'print'
                                }
                                ]
                            },
                                {
                                    extend: 'colvis',
                                    text: 'Visor de columnas',
                                    collectionLayout: 'fixed three-column'
                                }
                            ],
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{url('https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css')}}">
@stop

@section('js')
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('https://cdn.datatables.net/2.0.7/js/dataTables.js')}}"></script>
<script src="{{url('https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js')}}"></script>

<script>
    $(document).ready(function(){
        $('pacientes').DataTable({
            "lengthMenu":[[1, 10, 50, -1], [5, 10, 50, "All"]]
        });
    });
</script>
@stop
