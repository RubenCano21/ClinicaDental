@extends('adminlte::page')

@section('title', 'Bitacora')

@section('content_header')
    <h1>Lista de actividades en el server</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                <h3 class="card-title">Bitacora</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-sm table-striped table-bordered">
                    <thead class="text-light" style="background-color: #0c84ff">
                    <tr>
                        <th scope="col" style="text-align: center">Nro</th>
                        <th scope="col" style="text-align: center">Accion</th>
                        <th scope="col" style="text-align: center">Fecha y hora</th>
                        <th scope="col" style="text-align: center">Usuario</th>
                        <th scope="col" style="text-align: center">Rol</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $contador = 1; ?>
                    @foreach($bitacoras as $bitacora)
                        <tr>
                            <td style="text-align: center">{{$contador++}}</td>
                            <td>{{$bitacora->accion}}</td>
                            <td>{{$bitacora->fecha_hora}}</td>
                            <td>
                                {{ $bitacora->paciente->nombre ?? 
                                    $bitacora->odontologo->nombre ?? 
                                    $bitacora->recepcionista->nombre ?? 
                                    $bitacora->user_id }}
                            </td>
                            <td>{{$bitacora->user->getRoleNames()}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
