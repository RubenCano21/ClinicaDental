@extends('adminlte::page')

@section('title', 'Administracion')

@section('content_header')
    <h1>VISTA DE Odontologos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p class=h5>Nombre:</p>
            <p class="form-control">{{$odontologo->nombre}}</p>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
