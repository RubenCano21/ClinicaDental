@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>NUESTROS SERVICIOS</h1>
@stop


@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"> Servicios registrados</h3>
                    <div class="card-tools">
                        <a  class="btn btn-primary" href="{{route('admin.servicios.create')}}">Crear Servicio </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-bordered">
                        <thead style="text-align: center">
                        <tr>
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Duración</th>
                            <th >Acciones</th>
                        </tr>
                        </thead>
                        <Tbody>
                        <?php $contador = 1; ?>
                        @foreach ($servicios as $servicio)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td>{{$servicio->nombre}}</td>
                                <td style="text-align: center">{{$servicio->precio}} Bs.</td>
                                <td style="text-align: center;">{{$servicio->duracion}}</td>
                                <td style="text-align: center">
                                    <a href="{{ route('admin.servicios.show', $servicio) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('admin.servicios.edit', $servicio) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('admin.servicios.destroy', $servicio) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este servicio?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </Tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')

    <script
        src="{{url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('https://cdn.datatables.net/2.0.7/js/dataTables.js')}}"></script>
    <script src="{{url('https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js')}}"></script>


    <script>
        $(function () {
            $("#example1").DataTable({
                "pageLength": 10,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                    "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Usuarios",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": [
                    {
                        extend: 'collection',
                        text: 'Reportes',
                        orientation: 'landscape',
                        buttons: [
                            { extend: 'pdf' },
                            { extend: 'excel' },
                            { extend: 'print', text: 'Imprimir' }
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
@stop
