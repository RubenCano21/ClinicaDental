@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <h1>Detalle del Plan de Pago</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-5">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombre</label>
                                <p>Nombre: {{ $tipoPago->nombre }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{ route('tipoPagos.edit', $tipoPago->id) }}" class="btn btn-info rounded-pill">Editar</a>
                                <a href="{{route('tipoPagos.index')}}" class="btn btn-secondary rounded-pill">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
