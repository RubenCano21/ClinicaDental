<!-- resources/views/facturas/download.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Factura #{{ $factura->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        .header, .footer { text-align: center; margin-bottom: 20px; }
        .header img { height: 100px; }
        .details { margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="header">
    <img src="{{ asset('vendor/adminlte/dist/img/logo.jpeg') }}" alt="Clinica Deltal">
    <h2>Clinica Deltal Rojas</h2>
    <p>Propietario: Dr. Carlos Rojas<br>
        C/totai #55, B/30 de agosto<br>
        Av. Moscu 6to anillo<br>
        Teléfono: 75462341<br>
        Correo electrónico: info@clinicadeltal.com
    </p>
</div>

<div class="details">
    <h4>Factura #{{ $factura->id }}</h4>
    <p><strong>Cliente:</strong> {{ $factura->paciente->nombre }}<br>
        <strong>NIT:</strong> {{ $factura->nit }}<br>
        <strong>Fecha:</strong> {{ date('d/m/Y', strtotime($factura->fecha)) }}
    </p>
</div>

<table>
    <thead>
    <tr>
        <th>Item</th>
        <th>Fecha</th>
        <th>Tipo de Servicio</th>
        <th>Descripción</th>
        <th>Total parcial</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($factura->pagos as $index => $pago)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ date('d/m/Y', strtotime($pago->fecha)) }}</td>
            <td>{{ $pago->tipo_servicio }}</td>
            <td>{{ $pago->descripcion }}</td>
            <td>${{ number_format($pago->monto, 2) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="footer">
    <p><strong>Total:</strong> ${{ number_format($factura->monto, 2) }}</p>
</div>
</body>
</html>
