@extends('adminlte::page')

@section('title', 'Registrar-Paciente')
@section('content')
    <div class="container">
        <h1>Crear Pacientes</h1>
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
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.pacientes.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">CI</label><b>*</b>
                                        <input type="number" value="{{old('ci')}}" name="ci" class="form-control" required>
                                        @error('ci')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Nombres</label><b>*</b>
                                        <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" required>
                                        @error('nombre')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Apellidos</label><b>*</b>
                                        <input type="text" value="{{old('apellido')}}" name="apellido" class="form-control" required>
                                        @error('apellido')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Sexo</label><b>*</b>
                                        <select class="form-control" name="sexo" id="">
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                        @error('sexo')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Telefono</label><b>*</b>
                                        <input type="number" value="{{old('telefono')}}" name="telefono" class="form-control" required>
                                        @error('telefono')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Fecha de Nacimiento</label><b>*</b>
                                        <input type="date" value="{{old('fechaNacimiento')}}" name="fechaNacimiento" class="form-control" required>
                                        @error('fechaNacimiento')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Direccion</label><b>*</b>
                                        <input type="text" value="{{old('direccion')}}" name="direccion" class="form-control" required>
                                        @error('direccion')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Email</label><b>*</b>
                                        <input type="email" value="{{old('email')}}" name="email" class="form-control" required>
                                        @error('email')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Contraseña</label><b>*</b>
                                        <input type="password" name="password" class="form-control" required>
                                        @error('password')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form group">
                                        <label for="">Confirmar Contraseña</label><b>*</b>
                                        <input type="password" name="password_confirmation" class="form-control" required>
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
                                        <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Registrar paciente</button>
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
