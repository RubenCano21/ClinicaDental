<!DOCTYPE html>
<html>

<head>
    <title>BoletaPago #{{$boletaPago->id}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h2,
        h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
<h2>Factura: #{{ $boletaPago->id }}</h2>
<h3><small class="float-right"><b>Fecha:</b> {{ date('d/m/Y') }}</small></h3>

<div class="row">
    <h4>Clinica Deltal Rojas</h4>
</div>
<div class="row">
    <address>
        <strong>Propietario: Dr. Carlos Rojas</strong><br>
        C/totai #55, B/30 de agosto<br>
        Av. Moscu 6to anillo<br>
        Teléfono: 75462341<br>
        Correo electrónico: info@clinicadeltal.com
    </address>
</div>
<br>
<div class="row">
    <address>
        <strong>Paciente: {{$boletaPago->paciente->nombre}}</strong><br>
        Correo electrónico: {{$boletaPago->paciente->email}}
    </address>
</div>
<h3>Detalles de Pago</h3>
<table>
    <tr>
        <th>Item</th>
        <th>Fecha</th>
        <th>Descripción</th>
        <th>Total parcial</th>
    </tr>
    <tr>
        <td>1</td>
        <td>{{$factura->created_at}}</td>
        <td>Deralle del servicio</td>
        <td>{{$pago->monto}}</td>
    </tr>
    <!-- Fila para mostrar el monto total -->
    <tr>
        <td colspan="3"></td>
        <th>Total:</th>
        <td>{{ $factura->monto}}</td>
    </tr>
</table>
</body>

</html>
