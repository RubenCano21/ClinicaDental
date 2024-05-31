@extends('adminlte::page')
@section('title', 'Servicios')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detalles del Servicio</div>

                    <div class="card-body">
                        <p><strong>Nombre:</strong> {{ $servicio->nombre }}</p>
                        <p><strong>Precio:</strong> {{ $servicio->precio }}</p>
                        <!-- Agrega más detalles aquí si es necesario -->
                        <a href="{{ route('admin.servicios.index', $servicio) }}" class="btn btn-primary">Aceptar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection