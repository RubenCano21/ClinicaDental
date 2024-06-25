@extends('adminlte::page')

@section('title', 'Editar- Paciente')

@section('content')
    <div class="row">
        <h1>Editar Horario de: {{$horario->recepcionista->nombre}} {{$horario->recepcionista->apellido}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"> LLene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/horarios',$horario->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Odontologo</label><b>*</b>
                                        <select name="odontologo_id" id="" class="form-control rounded-pill">
                                            @foreach($odontologos as $recepcionista)
                                                <option value="{{$recepcionista->id}}">{{$recepcionista->nombre." ".$recepcionista->apellido}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Dia</label><b>*</b>
                                        <select name="dia" id="" class="form-control rounded-pill">
                                            <option value="LUNES">LUNES</option>
                                            <option value="MARTES">MARTES</option>
                                            <option value="MIERCOLES">MIERCOLES</option>
                                            <option value="JUEVES">JUEVES</option>
                                            <option value="VIERNES">VIERNES</option>
                                            <option value="SABADO">SABADO</option>
                                            <option value="DOMINGO">DOMINGO</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="" class="form-label">Hora Inicio</label>
                                    <input id="horaInicio" name="horaInicio" type="time" class="form-control" value="{{ $horario->horaInicio }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="" class="form-label">Hora Final</label>
                                    <input id="horaFin" name="horaFin" type="time" class="form-control" value="{{ $horario->horaFin}}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/pacientes')}}" class="btn btn-secundary"> Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
