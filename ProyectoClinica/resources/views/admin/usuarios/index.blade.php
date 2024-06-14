@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>LISTA DE USUARIOS </h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Usuarios Registrados</b></h3>
                        <div class="card-tools">
                            <a class="btn btn-primary" href="{{route('admin.usuarios.create')}}">Crear Usuario</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped table-sm" aria-describedby="example1_info">
                                        <thead class="text-light" style="background-color: #0c84ff">
                                        <tr>
                                            <th scope="col" style="text-align: center">ID</th>
                                            <th scope="col" style="text-align: center">Nombre</th>
                                            <th scope="col" style="text-align: center">Email</th>
                                            <th scope="col" style="text-align: center">Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $contador = 1;?>
                                        @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td style="text-align: center">{{ $contador++}}</td>
                                                <td>{{ $usuario->name }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td>
                                                    <a href="{{ route('admin.usuarios.show', $usuario) }}" class="btn btn-info ">Ver</a>
                                                    <a class="btn btn-primary " href="{{ route('admin.usuarios.edit', $usuario) }}">Editar</a>
                                                    <a href="{{url('admin/usuarios/'.$usuario->id.'/confirm-delete')}}" type="button" class="btn btn-danger">Eliminar</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
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
