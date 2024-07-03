@extends('adminlte::page')

@section('content')
    <h1>Historiales Clínicos</h1>
    <a href="{{ route('historial_clinico.create') }}" class="btn btn-primary mb-3">Crear Historial Clínico</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Odontólogo</th>
                <th>Diagnóstico</th>
                <th>Fecha</th>
                <th>Tratamiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historial_clinicos as $historial_clinico)
                <tr>
                    <td>{{ $historial_clinico->id }}</td>
                    <td>{{ $historial_clinico->paciente->nombre }} {{ $historial_clinico->paciente->apellido }}</td>
                    <td>{{ $historial_clinico->odontologo->nombre }} {{ $historial_clinico->odontologo->apellido }}</td>
                    <td>{{ $historial_clinico->Diagnostico }}</td>
                    <td>{{ $historial_clinico->Fecha_Cita }}</td>
                    <td>{{ $historial_clinico->Tratamiento }}</td>
                    <td>
                        <a href="{{ route('historial_clinico.show', $historial_clinico) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('historial_clinico.edit', $historial_clinico) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('historial_clinico.destroy', $historial_clinico) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este historial clínico?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection