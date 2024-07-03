@extends('adminlte::page')


@section('content')
    <div class="container">
        <h1>Listado de Facturas</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>Número</th>
                <th>Paciente</th>
                <th>Fecha</th>
                <th>Detalle</th>
                <th>Monto</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($facturas as $factura)
                <tr>
                    <td>{{ $factura->numero }}</td>
                    <td>{{ $factura->paciente->nombre }}</td>
                    <td>{{ $factura->fecha }}</td>
                    <td>{{ $factura->detalle }}</td>
                    <td>{{ $factura->monto }}</td>
                    <td>
                        <a href="{{ route('facturas.pdf', $factura->id) }}" class="btn btn-danger "><i class=""></i>Descargar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
