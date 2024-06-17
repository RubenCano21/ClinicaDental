@extends('adminlte::page')

@section('title', 'Editar- Paciente')

@section('content')
    <div class="row">
        <h1>EDITAR REGISTROS DEL PACIENTE: {{$paciente->nombre}} {{$paciente->apellido}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"> LLene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/pacientes',$paciente->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="" class="form-label">CI</label>
                                    <input id="ci" name="ci" type="number" class="form-control" placeholder="C.I.5465456"
                                           value="{{ $paciente->ci }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="" class="form-label">Nombre</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Juan"
                                           value="{{ $paciente->nombre }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="" class="form-label">Apellido</label>
                                    <input id="apellido" name="apellido" type="text" class="form-control" placeholder="Zamora"
                                           value="{{ $paciente->apellido }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="" class="form-label">Email</label>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="ejemplo@gmail.com"
                                           value="{{ $paciente->correo }}">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Sexo</label><b>*</b>
                                    <select class="form-control" name="sexo" id="">
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                    @error('sexo')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="" class="form-label">Telefono</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ $paciente->telefono }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento"
                                           value="{{ $paciente->fechanacimiento }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="" class="form-label">Direccion</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="1234 Marical scz"
                                           value="{{ $paciente->direccion }}">
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
