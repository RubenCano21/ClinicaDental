@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Detalles del Pago</h1>
        <p><strong>Monto:</strong> {{ $pago->amount }}</p>
        <p><strong>Fecha de Pago:</strong> {{ $pago->payment_date }}</p>
        <p><strong>Estado:</strong> {{ $pago->status }}</p>
        <h3>Métodos de Pago</h3>
        <ul>
            @foreach($pago->payment_methods as $method)
                <li>
                    <strong>Método:</strong> {{ $method['method'] }}<br>
                    @if($method['method'] == 'tarjeta')
                        <strong>Número de Tarjeta:</strong> {{ $method['details']['number'] ?? 'N/A' }}<br>
                        <strong>Nombre en Tarjeta:</strong> {{ $method['details']['name'] ?? 'N/A' }}
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection
