@extends('adminlte::page')

@section('title', 'Plan de pagos')

@section('content_header')
    <h1>Planes de Pago</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="{{ route('planPagos.create') }}"
                            class="btn btn-primary rounded-pill">Crear Nuevo Plan de Pago</a>
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
                        @foreach ($planPagos as $planPago)
                            <tr>
                                <td style="text-align: center">{{$contador++}}</td>
                                <td>{{ $planPago->nombre }}</td>
                                <td>
                                    <a href="{{ route('planPagos.show', $planPago->id) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('planPagos.edit', $planPago->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('planPagos.destroy', $planPago->id) }}" method="POST" style="display: inline">
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
