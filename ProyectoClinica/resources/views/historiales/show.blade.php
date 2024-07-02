@extends('adminlte::page')

@section('title', 'Historial')

@section('content')
    <div class="row">
        <h1>Historial de: {{$historial->paciente->nombre." ".$historial->paciente->apellido}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Citas atendidas</h3>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombre </label>
                                <p>{{$historial->paciente->nombre}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if ($citas)
                        @foreach ($citas as $cita)
                            <div class="card card-outline card-secundary">
                                <h3>Fecha de atencion: {{$cita->fecha}}</h3>
                                <p>Hora de atencion: {{$cita->hora}}</p>
                                <p>Servicio realizado: {{$cita->servicio->nombre}}</p>
                                <p>Odontologo: {{$cita->Odontologo->nombre." ".$cita->Odontologo->apellido}}</p>
                            </div>
                            
                        @endforeach
                    @else
                        <h2>No existen citas atendidas</h2>
                    @endif
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('historial')}}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
