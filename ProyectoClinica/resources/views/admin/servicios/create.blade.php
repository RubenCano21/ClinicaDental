@extends('adminlte::page')

@section('title', 'Crear Servicio')

@section('content_header')
    <h1>Crear Servicio</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formulario de Creación de Servicio</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.servicios.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre del Servicio">
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" class="form-control" placeholder="Precio del Servicio">
                </div>


            
                <!-- Agrega más campos según sea necesario -->

                <button type="submit" class="btn btn-primary">Crear Servicio</button>
            </form>
        </div>
    </div>
@stop