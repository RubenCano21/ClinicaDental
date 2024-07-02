@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')
    <h1>Lista de Horarios</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Horarios Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('admin/horarios/create')}}"
                           class="btn btn-primary rounded-pill">
                            Registrar Horario
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-sm table-striped table-bordered">
                        <thead class="text-light" style="background-color: #0c84ff">
                        <tr>
                            <th scope="col" style="text-align: center">Nro</th>
                            <th scope="col" style="text-align: center">Odontologo</th>
                            <th scope="col" style="text-align: center">Dia</th>
                            <th scope="col" style="text-align: center">Hora Inicio</th>
                            <th scope="col" style="text-align: center">Hora Final</th>
                            <th scope="col" style="text-align: center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $contador = 1; ?>
                        @foreach($horarios as $horario)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td>{{$horario->odontologo->nombre." ". $horario->odontologo->apellido}}</td>
                                <td>{{$horario->dia}}</td>
                                <td>{{$horario->horaInicio}}</td>
                                <td>{{$horario->horaFin}}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('admin/horarios/'.$horario->id)}}" type="button" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{url('admin/horarios/'.$horario->id.'/edit')}}" type="button" class="btn btn-success btn-sm">Editar</a>
                                        <a href="{{url('admin/horarios/'.$horario->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm">Eliminar</a>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Calendario de Atencion de Odontologos</h3>
                </div>
                <div class="card-body">
                    <div class="col-md-3">
                        <div class="form group">
                            <label for="">Especialidades</label>
                            <select name="especialidades_select" id="especialidades_select" class="form-control rounded-pill">
                                    @foreach($especialidades as $especialidade)
                                        <option value="especialidades">{{$especialidade->nombre}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="especialidad_info">

                    </div>
                    <hr>
                    <table style="font-size: 15px" class="table table-striped table-hover table-sm table-bordered">
                        <thead>
                        <tr style="text-align: center; background-color: #4f6883;" class="text-light">
                            <th>Hora</th>
                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miércoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                            <th>Sábado</th>
                        </tr>
                        </thead>
                        @php
                        $horas = ['08:00:00 - 09:00:00', '09:00:00 - 10:00:00', '10:00:00 - 11:00:00', '11:00:00 - 12:00:00', '12:00:00 - 13:00:00',
                                  '13:00:00 - 14:00:00', '14:00:00 - 15:00:00', '15:00:00 - 16:00:00', '16:00:00 - 17:00:00', '17:00:00 - 18:00:00',
                                  '18:00:00 - 19:00:00', '19:00:00 - 20:00:00',];
                        $dias = ['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO'];
                        @endphp
                        @foreach($horas as $hora)
                            @php
                            list($horaInicio, $horaFin) = explode(' - ',$hora);
                            @endphp
                            <tr>
                                <td>{{$hora}}</td>
                                @foreach($dias as $dia)
                                    @php
                                    $nombreOdontologo = '';
                                    foreach ($horarios as $horario){
                                        if (strtoupper($horario->dia) == $dia && $horaInicio >= $horario->horaInicio
                                            && $horaFin <= $horario->horaFin){
                                            $nombreOdontologo = $horario->odontologo->nombre." ".$horario->odontologo->apellido;
                                            break;
                                        }
                                    }
                                    @endphp
                                    <td>{{$nombreOdontologo}}</td>
                                @endforeach
                            </tr>
                        @endforeach
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
        $(document).ready(function () {
            $('pacientes').DataTable({
                "lengthMenu": [[1, 10, 50, -1], [5, 10, 50, "All"]]
            });
        });
    </script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "pageLength": 10,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando INICIO a FIN de TOTAL Horarios",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
                    "infoFiltered": "(Filtrado de MAX total Horarios)",
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

    {{--Codigo para la especialidad  --}}
    <script>
        $('#especialidades_select').on('change', function () {
           var especialidad_id = $('#especialidades_select').val();
           var url = "{{route('admin.horarios.CargarEspecialidad',':id')}}";
           url = url.replace(':id', especialidad_id);

            if (especialidad_id){
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function (data){
                        $('#especialidad_info').html(data);
                    },
                    error: function (){
                        alert('Error al obtener la especialidad');
                    }
                });
            }else {
                $('#especialidad_info').html('');
            }
        });
    </script>
@stop
