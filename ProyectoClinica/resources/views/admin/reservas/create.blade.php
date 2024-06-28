@extends('adminlte::page')
@section('title', 'Reservas')
@section('content')
<div class="container">
    <h1>Reservar una Cita</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.reservas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="hora">Hora</label>
            <select name="hora" id="hora" class="form-control" required>
                @foreach($horasDeTrabajo as $hora)
                    <option value="{{ $hora }}">{{ $hora }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_servicio">Tipo de Servicio</label>
            <select name="id_servicio" id="id_servicio" class="form-control" required>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_odontologo">Odontologo</label>
            <select name="id_odontologo" id="id_odontologo" class="form-control" required>
                @foreach($odontologos as $odontologo)
                    <option value="{{ $odontologo->id }}">{{ $odontologo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Reservar</button>
    </form>
</div>
@endsection