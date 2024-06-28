@extends('adminlte::page')

@section('title', 'Detalles de la Factura')

@section('content')
    <div class="container">
        <h1>Factura #{{ $factura->numero }}</h1>

        <div class="row">
            <div class="col-sm-4">
                <strong>NIT:</strong> {{ $factura->nit }}<br>
                <strong>Detalle:</strong> {{ $factura->detalle }}<br>
                <strong>Monto:</strong> {{ $factura->monto }}<br>
                <strong>Fecha:</strong> {{ $factura->fecha }}<br>
                <strong>Paciente:</strong> {{ $factura->paciente->nombre }}<br>
            </div>
            <div class="col-sm-4">
                <img src="{{ $qrCodeDataUri }}" alt="Código QR">
            </div>
        </div>
    </div>
@endsection

