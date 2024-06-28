@extends('adminlte::page')

@section('title', 'Administracion')

@section('content')
    <div class="row">
        <h1>Odontologo: {{$odontologo->nombre}} {{$odontologo->apellido}}</h1>
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
                                <label for="">CI</label>
                                <p>{{$odontologo->ci}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombres</label>
                                <p>{{$odontologo->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Apellidos</label>
                                <p>{{$recepcionista->apellido}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Sexo</label>
                                <p>{{$recepcionista->sexo}}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Telefono</label>
                                <p>{{$recepcionista->telefono}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Matricula</label>
                                <p>{{$recepcionista->matricula}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Especialidad</label>
                                @if ($recepcionista->especialidad)
                                    <p>{{ $recepcionista->especialidad->nombre }}</p>
                                @else
                                    <p>No se ha especificado especialidad</p>
                                @endif
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Email</label>
                                <p>{{$recepcionista->user->email}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('admin/odontologos')}}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
