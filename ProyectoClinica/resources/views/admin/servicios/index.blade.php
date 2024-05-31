@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>NUESTROS SERVICIOS</h1>
@stop


@section('content')
<div class="card">
    <div class="card-header">
        <a  class="btn btn-primary" href="{{route('admin.servicios.create')}}">Crear Servicio </a>
    </div>
   
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <Tbody>
                    @foreach ($servicios as $servicio)
                    <tr>
                        <td>{{$servicio->nombre}}</td>
                        <td>{{$servicio->precio}}</td>
                    
                        <td>
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
@stop
