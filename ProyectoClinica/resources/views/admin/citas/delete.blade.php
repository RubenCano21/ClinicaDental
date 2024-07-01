@extends('adminlte::page')

@section('title', 'cita')


@section('content')
    <div class="row">
        <h1>Eliminar Especialidad: {{$cita->id}}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="card card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Esta seguro de cancelar esta cita?</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/cita', $cita->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Cita</label>
                                    <input type="text" value="{{$cita->id}}" name="cita"
                                           class="form-control" disabled>
                                    @error('cita')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{url('admin/citas')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-danger">Eliminar Cita</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
