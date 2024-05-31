@extends('adminlte::page')

@section('title', 'Editar-Odontologo')

@section('content_header')
    <h1>EDITAR REGISTROS DE ODONTOLOGO</h1>
@stop

@section('content')
    <form action="/odontologos/{{ $odontologo->ci}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">CI</label>
            <input id="ci" name="ci" type="number" class="form-control" placeholder="C.I.5465456"
                value="{{ $odontologo->ci }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Juan"
                value="{{ $odontologo->nombre }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Apellido</label>
            <input id="apellido" name="apellido" type="text" class="form-control" placeholder="Zamora"
                value="{{ $odontologo->apellido }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control" placeholder="ejemplo@gmail.com"
                value="{{ $odontologo->correo }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Sexo</label>
            <select id="sexo" name="sexo" class="form-select" value="{{ $odontologo->sexo }}">
                <option selected>Masculino</option>
                <option>Femenino</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Telefono</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ $odontologo->telefono }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Matricula</label>
            <input type="date" class="form-control" id="matricula" name="matricula"
                value="{{ $odontologo->matricula }}">
        </div>
        <a href="/odontologos" class="btn btn-secundary"> Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
