@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CREAR NUEVO USUARIOS</h1>
@stop

@section('content')
  <div class="container mt-5">
    <h1 class="mb-4">grupos</h1>
    <div class="row">
        @foreach($grupo as $grupos)
            <div class="col-md-4 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $grupos->nombre }}</h5>
                        <p class="card-text">ID: {{ $grupos->id }}</p>
                        <!-- Agrega aquí otros datos del grupo que quieras mostrar -->
                    </div>
               
            </div>
        @endforeach
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