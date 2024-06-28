@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <h1>Editar Plan de Pago</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-5">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"> LLene los campos</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('planPagos.update', $planPago->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" name="nombre" id="nombre" value="{{ $planPago->nombre }}" class="form-control rounded-pill" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{route('planPagos.index')}}" class="btn btn-secundary"> Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
