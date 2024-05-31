@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>LISTA DE USUARIOS </h1>
@stop


@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-end">
        <a class="btn btn-primary" href="{{route('admin.usuarios.create')}}">Crear Usuario</a>
    </div>
    </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <Tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('admin.usuarios.edit',$usuario)}}">Editar</a>
                            <a href="{{ route('admin.usuarios.show', $usuario) }}" class="btn btn-info">Ver</a>
                            <form action="{{ route('admin.usuarios.destroy', $usuario) }}" method="POST" style="display:inline;">
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