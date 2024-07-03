<!DOCTYPE html>
<html>
<head>
    <title>Factura PDF</title>
    <style>
        /* Estilos personalizados para tu PDF */
        body { font-family: Arial, sans-serif; }
        .header, .footer { text-align: center; }
        .header img { height: 50px; }
        .content { margin: 20px; }
        .content table { width: 100%; border-collapse: collapse; }
        .content table, .content th, .content td { border: 1px solid black; }
        .content th, .content td { padding: 10px; text-align: left; }
    </style>
</head>
<body>
<div class="header">
    <h2>Clinica Dental Rojas</h2>
    <img src="{{ asset('vendor/adminlte/dist/img/logo.jpeg') }}" alt="Clinica Dental">
</div>

<div class="content">
    <h3>Factura #{{ $factura->id }}</h3>
    <p><strong>Fecha:</strong> {{ date('d/m/Y', strtotime($factura->fecha)) }}</p>
    <p><strong>Cliente:</strong> {{ $factura->paciente->nombre }}</p>
    <p><strong>Dirección:</strong> {{ $factura->paciente->direccion }}</p>
    <p><strong>Teléfono:</strong> {{ $factura->paciente->telefono }}</p>
    <p><strong>Correo electrónico:</strong> {{ $factura->paciente->email }}</p>

    <table>
        <thead>
        <tr>
            <th>Item</th>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>Total parcial</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($factura->pagos as $index => $pago)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ date('d/m/Y', strtotime($pago->fecha)) }}</td>

                <td>{{ $pago->descripcion }}</td>
                <td>${{ number_format($pago->monto, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h3>Total: ${{ number_format($factura->pagos->sum('monto'), 2) }}</h3>
</div>

<div class="footer">
    <p>Gracias por su preferencia.</p>
</div>
</body>
</html>
