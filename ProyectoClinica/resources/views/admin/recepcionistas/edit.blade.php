@extends('adminlte::page')

@section('title', 'Editar-Recepcionista')

@section('content')
    <div class="row">
        <h1>Modificar Recepcionista: {{$odontologo->nombre}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/recepcionistas', $odontologo->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">CI</label><b>*</b>
                                    <input type="text" value="{{$odontologo->ci}}" name="ci" class="form-control rounded-pill" required>
                                    @error('ci')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres</label><b>*</b>
                                    <input type="text" value="{{$odontologo->nombre}}" name="nombre"
                                           class="form-control rounded-pill" required>
                                    @error('nombre')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos</label><b>*</b>
                                    <input type="text" value="{{$odontologo->apellido}}" name="apellido"
                                           class="form-control rounded-pill" required>
                                    @error('apellido')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Email</label><b>*</b>
                                    <input type="email" value="{{$odontologo->user->email}}" name="email"
                                           class="form-control rounded-pill" required>
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
                                    <label for="">Sexo</label><b>*</b>
                                    <select class="form-control rounded-pill" name="sexo" id="">
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
                                    <label for="">Telefono</label><b>*</b>
                                    <input type="number" value="{{$odontologo->telefono}}" name="telefono"
                                           class="form-control rounded-pill" required>
                                    @error('telefono')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Turno</label><b>*</b>
                                    <input type="text" value="{{$odontologo->turno}}" name="turno"
                                           class="form-control rounded-pill" required>
                                    @error('turno')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Sueldo</label><b>*</b>
                                    <input type="text" value="{{$odontologo->sueldo}}" name="sueldo"
                                           class="form-control rounded-pill" required>
                                    @error('sueldo')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Contraseña</label>
                                    <input type="password" name="password" class="form-control rounded-pill">
                                    @error('password')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Confirmar Contraseña</label>
                                    <input type="password" name="password_confirmation" class="form-control rounded-pill">
                                    @error('password_confirmation')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/recepcionistas')}}" class="btn btn-secondary rounded-pill">Cancelar</a>
                                    <button type="submit" class="btn btn-success rounded-pill">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@stop
