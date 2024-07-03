@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
    <h1>Lista de Pagos</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pagos a realizar</h3>
                    <div class="card-tools">
                        <a href="{{ route('pagos.create') }}"
                           class="btn btn-primary rounded-pill">Registrar Pago</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-sm table-striped table-bordered">
                        <thead style="text-align: center; background-color: #4f6883" class="text-light">
                        <tr>
                            <th>#</th>

                            <th>Nombre del Paciente</th>
                            <th>Tipo de Pago</th>
                            <th>Plan de Pago</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Monto</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $contador = 1; ?>
                        @foreach($pagos as $pago)
                            <tr>
                                <td>{{ $contador++}}</td>

                                <td>{{ $pago->paciente->nombre." ".$pago->paciente->apellido}}</td>
                                <td>{{ $pago->tipoPago->nombre }}</td>
                                <td>{{ $pago->planPago->nombre }}</td>
                                <td>{{ $pago->fecha }}</td>
                                <td>{{ $pago->estado }}</td>
                                <td>{{ $pago->monto}}</td>
                                {{--<td>
                                    <a href="{{ route('pagos.show', $pago->id) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('pagos.pdf', $pago->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('pagos.destroy', $pago->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
