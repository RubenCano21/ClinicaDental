@extends('adminlte::page')

@section('title', 'Receocionista')

@section('content_header')
    <h1>Recepcionista</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <a class="btn btn-primary" href="{{route('admin.recepcionistas.create')}}">Registrar Recepcionista</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="text-light" style="background-color: #0c84ff">
                <tr>
                    <th scope="col" style="text-align: center">Nro</th>
                    <th scope="col" style="text-align: center">CI</th>
                    <th scope="col" style="text-align: center">Nombres</th>
                    <th scope="col" style="text-align: center">Apellidos</th>
                    <th scope="col" style="text-align: center">Email</th>
                    <th scope="col" style="text-align: center">Sexo</th>
                    <th scope="col" style="text-align: center">Telefono</th>
                    <th scope="col" style="text-align: center">Turno</th>
                    <th scope="col" style="text-align: center">Sueldo</th>
                    <th scope="col" style="text-align: center">Acciones</th>
                </tr>
                </thead>
                <Tbody>
                <?php $contador = 1; ?>
                @foreach ($recepcionistas as $recepcionista)
                    <tr>
                        <td style="text-align: center">{{$contador++}}</td>
                        <td>{{$recepcionista->ci}}</td>
                        <td>{{$recepcionista->nombre}}</td>
                        <td>{{$recepcionista->apellido}}</td>
                        <td>{{$recepcionista->user->email}}</td>
                        <td>{{$recepcionista->sexo}}</td>
                        <td>{{$recepcionista->telefono}}</td>
                        <td>{{$recepcionista->turno}}</td>
                        <td>{{$recepcionista->sueldo}}</td>
                        <td>
                            <a href="{{ route('admin.recepcionistas.show', $recepcionista) }}"class="btn btn-info ">Ver</a>
                            <a class="btn btn-primary " href="{{ route('admin.recepcionistas.edit', $recepcionista) }}">Editar</a>
                            <a href="{{url('admin/recepcionistas/'.$recepcionista->id.'/confirm-delete')}}" type="button" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
                </Tbody>
            </table>
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
            $('recepcionistas').DataTable({
                "lengthMenu": [[1, 10, 50, -1], [5, 10, 50, "All"]]
            });
        });
    </script>
@stop
