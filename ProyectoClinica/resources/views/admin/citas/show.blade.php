@extends('adminlte::page')

@section('title', 'Servicios')

@section('content')
    <div class="row">
        <h1>Cita: {{$cita->id}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombre </label>
                                <p>Paciente: {{$cita->reserva->paciente->nombre." ".$cita->reserva->paciente->apellido}}</p>
                                <p>Fecha: {{$cita->fecha}}</p>
                                <p>Hora: {{$cita->hora}}</p>
                                <p>Servicio: {{$cita->reserva->servicio->nombre}}</p>
                                <p>Odontologo: {{$cita->odontologo->nombre}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('admin/citas')}}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
