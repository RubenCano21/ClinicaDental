@extends('adminlte::page')

@section('title', 'Clinica Dental')

@section('content')
    <div class="row">
        <h1>Eliminar Horario del: {{$horario->recepcionista->nombre}} {{$horario->recepcionista->apellido}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/horarios', $horario->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Odontologo</label>
                                    <input type="text" value="{{$horario->recepcionista->nombre." ".$horario->recepcionista->apellido}}" name="nombre" class="form-control" disabled>
                                    @error('nombre')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div><div class="col-md-3">
                                <div class="form group">
                                    <label for="">Dia</label>
                                    <input type="text" value="{{$horario->dia}}" name="dia" class="form-control" disabled>
                                    @error('dia')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Hora Inicio</label>
                                    <input type="time" value="{{$horario->horaInicio}}" name="horaInicio" class="form-control" disabled>
                                    @error('horaInicio')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Hora Final</label>
                                    <input type="time" value="{{$horario->horaFin}}" name="horaFin" class="form-control" disabled>
                                    @error('horaFin')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/horarios')}}" class="btn btn-secondary rounded-pill">Cancelar</a>
                                    <button type="submit" class="btn btn-danger rounded-pill">Eliminar horario</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
