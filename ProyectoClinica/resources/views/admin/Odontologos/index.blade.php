@extends('adminlte::page')

@section('title', 'Odontologos')

@section('content_header')
    <h1>LISTA DE ODONTOLOGOS </h1>
@stop


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-end">
                <a class="btn btn-primary" href="{{route('admin.odontologos.create')}}">Crear Odontologo</a>
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
                    <th scope="col" style="text-align: center">Sexo</th>
                    <th scope="col" style="text-align: center">Telefono</th>
                    <th scope="col" style="text-align: center">Matricula</th>
                    <th scope="col" style="text-align: center">Email</th>
                    <th scope="col" style="text-align: center">Acciones</th>
                </tr>
                </thead>
                <Tbody>
                <?php $contador = 1; ?>
                @foreach ($odontologos as $odontologo)
                    <tr>
                        <td style="text-align: center">{{$contador++}}</td>
                        <td>{{$odontologo->ci}}</td>
                        <td>{{$odontologo->nombre}}</td>
                        <td>{{$odontologo->apellido}}</td>
                        <td>{{$odontologo->sexo}}</td>
                        <td>{{$odontologo->telefono}}</td>
                        <td>{{$odontologo->matricula}}</td>
                        <td>{{$odontologo->user->email}}</td>
                        <td>
                            <a href="{{ route('admin.odontologos.show', $odontologo) }}" class="btn btn-info">Ver</a>
                            <a class="btn btn-primary" href="{{route('admin.odontologos.edit',$odontologo)}}">Editar</a>
                            <form action="{{ route('admin.odontologos.destroy', $odontologo) }}" method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </Tbody>
            </table>
        </div>
    </div>
@stop




@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
