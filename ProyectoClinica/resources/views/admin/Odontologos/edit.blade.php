@extends('adminlte::page')

@section('content')
    <div class="row">
        <h1>Modificar Odontologo: {{$odontologo->nombre}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/odontologos', $odontologo->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">CI</label><b>*</b>
                                    <input type="text" value="{{$odontologo->ci}}" name="ci"
                                           class="form-control" required>
                                    @error('ci')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Nombres</label><b>*</b>
                                    <input type="text" value="{{$odontologo->nombre}}" name="nombre"
                                           class="form-control" required>
                                    @error('nombre')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Apellidos</label><b>*</b>
                                    <input type="text" value="{{$odontologo->apellido}}" name="apellido"
                                           class="form-control" required>
                                    @error('apellido')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
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

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Telefono</label><b>*</b>
                                    <input type="number" value="{{$odontologo->telefono}}" name="telefono"
                                           class="form-control" required>
                                    @error('telefono')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Matricula</label><b>*</b>
                                    <input type="text" value="{{$odontologo->matricula}}" name="matricula"
                                           class="form-control" required>
                                    @error('matricula')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Email</label><b>*</b>
                                    <input type="email" value="{{$odontologo->user->email}}" name="email"
                                           class="form-control" required>
                                    @error('email')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col md 3">
                                <div class="form-group">
                                    <label for="especialidad">Especialidad</label>
                                    <select class="form-control" id="especialidad" name="especialidades[]" multiple>
                                        @foreach ($especialidades as $especialidad)
                                            <option value="{{ $odontologo->id }}" {{ $odontologo->especialidades->contains($especialidad->id) ? 'selected' : '' }}>{{ $especialidad->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Contraseña</label>
                                    <input type="password" name="password" class="form-control">
                                    @error('password')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Confirmar Contraseña</label>
                                    <input type="password" name="password_confirmation" class="form-control">
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
                                    <a href="{{url('admin/odontologos')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
