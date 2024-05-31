@extends('adminlte::page')

@section('title', 'Administracion')

@section('content_header')
    <h1>Administracion</h1>
@stop

@section('content')
    <p>Esta pagina es solo para administrar.</p>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop