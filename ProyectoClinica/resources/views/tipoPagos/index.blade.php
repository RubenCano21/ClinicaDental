@extends('adminlte::page')

@section('title', 'Tipo-Pagos')

@section('content_header')
    <h1>Lista de Tipos de Pagos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="{{ route('tipoPagos.create') }}"
                           class="btn btn-primary rounded-pill">Crear Nuevo Tipo de Pago</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-bordered">
                        <thead style="text-align: center; background-color: #3f6791" class="text-light">
                        <tr>
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $contador = 1; ?>
                        @foreach ($tipoPagos as $tipoPago)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td>{{ $tipoPago->nombre }}</td>
                                <td>
                                    <a href="{{ route('tipoPagos.show', $tipoPago->id) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('tipoPagos.edit', $tipoPago->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('tipoPagos.destroy', $tipoPago->id) }}" method="POST" style="display: inline">
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
            </div>
        </div>
    </div>
@endsection
