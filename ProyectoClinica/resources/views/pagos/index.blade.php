@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Pagos</h1>
        <a href="{{ route('pagos.create') }}" class="btn btn-primary mb-3">Registrar Pago</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Monto</th>
                <th>Método de Pago</th>
                <th>Fecha de Pago</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pagos as $pago)
                <tr>
                    <td>{{ $pago->id }}</td>
                    <td>{{ $pago->amount }}</td>
                    <td>{{ $pago->payment_method }}</td>
                    <td>{{ $pago->payment_date }}</td>
                    <td>{{ $pago->status }}</td>
                    <td>
                        <a href="{{ route('pagos.show', $pago->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('pagos.edit', $pago->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('pagos.destroy', $pago->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
