@extends('adminlte::page')

@section('title', 'Horario')

@section('content')
    <div class="row">
        <h1>Horario del: {{$horario->odontologo->nombre}} {{$horario->odontologo->apellido}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Odontologo</label>
                                <p>{{$horario->odontologo->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Dia</label>
                                <p>{{$horario->dia}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Hora Inicio</label>
                                <p>{{$horario->horaInicio}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Hora Final</label>
                                <p>{{$horario->horaFin}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('admin/horarios')}}" class="btn btn-secondary rounded-pill">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
