@extends('adminlte::page')

@section('title', 'Registrar-Paciente')

@section('content_header')
    <h1>REGISTRAR NUEVO PACIENTE</h1>
@stop

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/pacientes')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="" class="form-label">CI</label>
                                    <input id="ci" name="ci" type="number" class="form-control" placeholder="C.I.5465456" tabindex="1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="" class="form-label">Nombre</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Juan" tabindex="2">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="" class="form-label">Apellido</label>
                                    <input id="apellido" name="apellido" type="text" class="form-control" placeholder="Zamora" tabindex="3">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="" class="form-label">Email</label>
                                    <input id="email" name="email" type="email" class="form-control" placeholder="ejemplo@gmail.com"
                                        tabindex="4">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Sexo</label><b>*</b>
                                    <select class="form-control" name="sexo" id="">
                                        <option value="M">M</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="" class="form-label">Telefono</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" tabindex="6">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" tabindex="7">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Direccion</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="1234 Marical scz"
                                            tabindex="8">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('admin/pacientes')}}" class="btn btn-secundary"> Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
  
@stop

@section('css')
    {{-- Add here extra stylesheets --}}

@stop

@section('js')

@stop
