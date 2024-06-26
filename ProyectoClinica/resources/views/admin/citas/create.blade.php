@extends('adminlte::page')

@section('title', 'Registrar-Cita')
@section('content')
    <div class="container">
        <h1>Registrar Cita</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/admin/citas/create') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Paciente</label><b>*</b>
                                        <select name="reserva_id" id="reserva_id" class="form-control rounded-pill search-path">
                                            @foreach($reservas as $reserva)
                                                <option value="{{$reserva->id}}">{{$reserva->paciente->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Fecha</label><b>*</b>
                                        <input type="date" value="{{old('fecha')}}" name="fecha" class="form-control rounded-pill" required>
                                        @error('fecha')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Hora</label><b>*</b>
                                        <input type="time" min="08:00" max="18:00" value="{{old('hora')}}" name="hora" class="form-control rounded-pill" required>
                                        @error('hora')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Servicios</label><b>*</b>
                                        <select name="servicio_id" id="" class="form-control rounded-pill">
                                            @foreach($servicios as $servicio)
                                                <option value="{{$servicio->id}}">{{$servicio->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form group">
                                        <label for="">Odontologo</label><b>*</b>
                                        <select name="odontologo_id" id="" class="form-control rounded-pill">
                                            @foreach($odontologos as $odontologo)
                                                <option value="{{$odontologo->id}}">{{$odontologo->nombre." ".$odontologo->apellido}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <a href="{{url('admin/citas')}}" class="btn btn-secondary rounded-pill">Cancelar</a>
                                        <button type="submit" class="btn btn-primary rounded-pill">Registrar Cita</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Incluye JavaScript de Select2 -->
    <script src="{{url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js')}}"></script>
    <!-- Incluye jQuery (Select2 depende de jQuery) -->
    <script src="{{url('https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#paciente_id').select2({
                placeholder: 'Buscar paciente',
                allowClear: true,
                ajax: {
                    url: '{{ route("admin.pacientes.buscar_paciente") }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term // Término de búsqueda
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                },
                minimumInputLength: 1,
                templateResult: function(paciente) {
                    if (paciente.loading) {
                        return "Buscando...";
                    }
                    return paciente.nombre + " " + paciente.apellido;
                },
                templateSelection: function(paciente) {
                    return paciente.nombre ? paciente.nombre + " " + paciente.apellido : 'Seleccionar paciente';
                }
            });
        });
    </script>

@endsection
