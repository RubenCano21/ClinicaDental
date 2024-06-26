@extends('adminlte::page')

@section('title', 'Registrar-Paciente')
@section('content')
    <div class="container">
        <h1>Crear Horarios</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/admin/horarios/create') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Odontologo</label><b>*</b>
                                        <select name="odontologo_id" id="" class="form-control rounded-pill">
                                            @foreach($odontologos as $odontologo)
                                                <option value="{{$odontologo->id}}">{{$odontologo->nombre." ".$odontologo->apellido}}</option>
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
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Hora Inicio</label><b>*</b>
                                        <input type="time" min="08:00" max="18:00" value="{{old('horaInicio')}}" name="horaInicio" class="form-control rounded-pill" required>
                                        @error('horaInicio')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Hora Final</label><b>*</b>
                                        <input type="time" min="08:00" max="18:00" value="{{old('horaFin')}}" name="horaFin" class="form-control rounded-pill" required>
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
                                        <button type="submit" class="btn btn-primary rounded-pill">Registrar horario</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
