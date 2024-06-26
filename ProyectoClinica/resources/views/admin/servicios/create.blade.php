@extends('adminlte::page')

@section('title', 'Crear Servicio')

@section('content_header')
    <h1>Crear Servicio</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Creación de Servicio</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.servicios.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control rounded-pill" placeholder="Nombre del Servicio">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="number" name="precio" class="form-control rounded-pill" placeholder="Precio del Servicio">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="duracion">Sesiones</label>
                                    <input type="number" name="duracion" class="form-control rounded-pill">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{url('admin/servicios')}}" class="btn btn-secondary rounded-pill">Cancelar</a>
                                <button type="submit" class="btn btn-primary rounded-pill">Crear Servicio</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
