@extends('adminlte::page')

@section('title', 'Clinica Dental')

@section('content')
    <div class="row">
        <h1>Eliminar Paciente: {{$horario->nombre}} {{$horario->apellido}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/pacientes', $horario->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">CI</label>
                                    <input type="text" value="{{$horario->ci}}" name="ci" class="form-control" disabled>
                                    @error('ci')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div><div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre</label>
                                    <input type="text" value="{{$horario->nombre}}" name="nombre" class="form-control" disabled>
                                    @error('nombre')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos</label>
                                    <input type="text" value="{{$horario->apellido}}" name="apellido" class="form-control" disabled>
                                    @error('apellido')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono</label>
                                    <input type="number" value="{{$horario->telefono}}" name="telefono" class="form-control" disabled>
                                    @error('telefono')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Matricula</label>
                                    <input type="text" value="{{$horario->matricula}}" name="matricula" class="form-control" disabled>
                                    @error('matricula')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form group">
                                    <label for="">Especialidad</label>
                                    <input type="text" value="{{$horario->especialidad}}" name="especialidad" class="form-control" disabled>
                                    @error('especialidad')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Email</label>
                                    <input type="email" value="{{$horario->user->email}}" name="email" class="form-control" disabled>
                                    @error('email')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-danger">Eliminar horario</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
