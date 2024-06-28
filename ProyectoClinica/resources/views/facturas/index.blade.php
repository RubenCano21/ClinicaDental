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
                <th>NIT</th>
                <th>Detalle</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Paciente</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($facturas as $factura)
                <tr>
                    <td>{{ $factura->numero }}</td>
                    <td>{{ $factura->nit }}</td>
                    <td>{{ $factura->detalle }}</td>
                    <td>{{ $factura->monto }}</td>
                    <td>{{ $factura->fecha }}</td>
                    <td>{{ $factura->paciente->nombre }}</td>
                    <td>
                        <a href="{{ route('facturas.invoice', $factura->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('facturas.download', $factura->id) }}" class="btn btn-primary">Descargar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
