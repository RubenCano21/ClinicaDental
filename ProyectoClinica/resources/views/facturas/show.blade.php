@extends('adminlte::page')

@section('title', 'Fatura')

@section('content_header')
    <title>Factura - {{ $invoice->id }}</title>
    <style>
        .logo-img {
            height: 50px;
            margin-right: 10px;
            border-radius: 50%;
        }
        .qr-code {
            margin-top: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>
                <img src="/public/img/logo11" alt="ClinicaDeltal" class="logo-img">
                ClinicaDeltal <b>Rojas</b>
                <small class="float-right"><b>Fecha:</b> {{ $invoice->created_at->format('d/m/Y') }}</small>
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h5>Factura #{{ $invoice->id }}</h5>
            <p>Cliente: {{ $invoice->client_name }}</p>
            <p>Monto: ${{ number_format($invoice->amount, 2) }}</p>
            <!-- Mostrar el código QR -->
            <div class="qr-code">
                <img src="{{ $qrCodeDataUri }}" alt="QR Code to download invoice">
            </div>
        </div>
    </div>
@endsection

