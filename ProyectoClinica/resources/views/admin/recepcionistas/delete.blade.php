@extends('adminlte::page')

@section('title', 'Clinica Dental')

@section('content')
    <div class="row">
        <h1>Eliminar Recepcionista: {{$odontologo->nombre}} {{$odontologo->apellido}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-9">
            <div class="card card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/recepcionistas', $odontologo->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombre</label>
                                    <input type="text" value="{{$odontologo->nombre}}" name="nombre" class="form-control" disabled>
                                    @error('nombre')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos</label>
                                    <input type="text" value="{{$odontologo->apellido}}" name="apellido" class="form-control" disabled>
                                    @error('apellido')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Email</label>
                                    <input type="email" value="{{$odontologo->user->email}}" name="email" class="form-control" disabled>
                                    @error('email')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono</label>
                                    <input type="number" value="{{$odontologo->telefono}}" name="telefono" class="form-control" disabled>
                                    @error('telefono')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Turno</label>
                                    <input type="text" value="{{$odontologo->turno}}" name="turno" class="form-control" disabled>
                                    @error('turno')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Sueldo</label>
                                    <input type="text" value="{{$odontologo->sueldo}}" name="sueldo" class="form-control" disabled>
                                    @error('sueldo')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/recepcionistas')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
