@extends('adminlte::page')

@section('title', 'Reservas')

@section('content')
<div class="container">
    <h1>Todas las reservas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Servicio</th>
                <th>Odontologo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->paciente->nombre." ".$reserva->paciente->apellido}}</td>
                    <td>{{ $reserva->fecha }}</td>
                    <td>{{ $reserva->hora }}</td>
                    <td>{{ $reserva->estado }}</td>
                    <td>{{ $reserva->servicio->nombre }}</td>
                    <td>{{ $reserva->odontologo->nombre." ".$reserva->odontologo->apellido }}</td>
                    <td>
                        {{-- <a href="{{ route('admin.reservas.edit', $reserva) }}" class="btn btn-warning">Editar</a> --}}
                        <form action="{{ route('admin.reservas.destroy', $reserva) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Cancelar reserva</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
