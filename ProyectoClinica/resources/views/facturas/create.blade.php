@extends('adminlte::page')

@section('content')
    <div class="container">
        <h1>Crear Nueva Factura</h1>

        <form action="{{ route('facturas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nit">NIT</label>
                <input type="text" class="form-control" id="nit" name="nit" required>
            </div>
            <div class="form-group">
                <label for="detalle">Detalle</label>
                <input type="text" class="form-control" id="detalle" name="detalle" required>
            </div>
            <div class="form-group">
                <label for="monto">Monto</label>
                <input type="number" class="form-control" id="monto" name="monto" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="form-group">
                <label for="paciente_id">Paciente</label>
                <select class="form-control" id="paciente_id" name="paciente_id" required>
                    @foreach($pacientes as $paciente)
                        <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear Factura</button>
        </form>
    </div>
@endsection


