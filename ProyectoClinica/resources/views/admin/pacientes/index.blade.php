@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')
    <h1>Lista de Pacientes</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                <h3 class="card-title">Pacientes Registrados</h3>
                <div class="card-tools">
                    <a href="{{url('admin/pacientes/create')}}" class="btn btn-primary">
                        Registrar Paciente
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-sm table-striped table-bordered">
                    <thead class="text-light" style="background-color: #0c84ff">
                    <tr>
                        <th scope="col" style="text-align: center">Nro</th>
                        <th scope="col" style="text-align: center">CI</th>
                        <th scope="col" style="text-align: center">Nombres</th>
                        <th scope="col" style="text-align: center">Apellidos</th>
                        <th scope="col" style="text-align: center">Sexo</th>
                        <th scope="col" style="text-align: center">Celular</th>
                        <th scope="col" style="text-align: center">Fecha de Nacimiento</th>
                        <th scope="col" style="text-align: center">Direccion</th>
                        <th scope="col" style="text-align: center">Email</th>
                        <th scope="col" style="text-align: center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $contador = 1; ?>
                    @foreach($pacientes as $horario)
                        <tr>
                            <td style="text-align: center">{{$contador++}}</td>
                            <td>{{$horario->ci}}</td>
                            <td>{{$horario->nombre}}</td>
                            <td>{{$horario->apellido}}</td>
                            <td>{{$horario->sexo}}</td>
                            <td>{{$horario->celular}}</td>
                            <td>{{$horario->fechaNacimiento}}</td>
                            <td>{{$horario->direccion}}</td>
                            <td>{{$horario->user->email}}</td>
                            <td style="text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/pacientes/'.$horario->id)}}" type="button" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{url('admin/pacientes/'.$horario->id.'/edit')}}" type="button" class="btn btn-success btn-sm">Editar</a>
                                    <a href="{{url('admin/pacientes/'.$horario->id.'/confirm-delete')}}"
                                       type="button" class="btn btn-danger btn-sm">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
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
