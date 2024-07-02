@extends('adminlte::page')

@section('title', 'Historiales')

@section('content')
    <div class="row">
        <h1>Historiales clinicos</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Historiales clinicos</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-sm table-striped table-bordered">
                        <thead class="text-light" style="background-color: #0c84ff">
                        <tr>
                            <th scope="col" style="text-align: center">Nro</th>
                            <th scope="col" style="text-align: center">Nombre</th>
                            <th scope="col" style="text-align: center">Ultima cita</th>
                            <th scope="col" style="text-align: center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $contador = 1; ?>
                        @foreach($historiales as $historial)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td>{{$historial->paciente->nombre." ".$historial->paciente->apellido}}</td>
                                <td>{{$historial->cita}}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('historial/'.$historial->id)}}" type="button" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{url('historial/'.$historial->id.'/edit')}}" type="button" class="btn btn-success btn-sm">Editar</a>
                                        <a href="{{url('historial/'.$historial->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm">Eliminar</a>
                                    </div>
                                </td>
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
                                    "info": "Mostrando START a END de TOTAL consultorios",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 consultorios",
                                    "infoFiltered": "(Filtrado de MAX total consultorios)",
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
@endsection
