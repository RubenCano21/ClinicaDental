@extends('adminlte::page')

@section('title', 'Odontologos')

@section('content_header')
    <h1>Bitacora</h1>
@stop

@section('content')

<a href="odontologos/create" class="btn btn-primary mb-3">REGISTRAR ODONTOLOGO</a>

<table id="odontologos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">CI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Email</th>
            <th scope="col">Sexo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Matricula Profecional</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($odontologos as $odontologo)
        <tr>
            <td>{{$odontologo->ci}}</td>
            <td>{{$odontologo->nombre}}</td>
            <td>{{$odontologo->apellido}}</td>
            <td>{{$odontologo->correo}}</td>
            <td>{{$odontologo->sexo}}</td>
            <td>{{$odontologo->telefono}}</td>
            <td>{{$odontologo->matricula}}</td>
            <td>
                <form action="{{route('odontologos.destroy',$odontologo->ci)}}" method="POST">
                    <a href="/odontologos/{{$odontologo->ci}}/editar" class="btn btn-info">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>                    
            </td>
        </tr>
            
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="/css/admin_custom.css"> 
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>

<script>
    $(document).ready(function(){
        $('odontologos').DataTable({
            "lengthMenu":[[1, 10, 50, -1], [5, 10, 50, "All"]]
        });
    });
</script>
@stop