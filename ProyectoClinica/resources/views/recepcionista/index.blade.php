@extends('adminlte::page')

@section('title', 'Receocionista')

@section('content_header')
    <h1>Recopcionista</h1>
@stop

@section('content')

<a href="recepcionistas/create" class="btn btn-primary mb-3">REGISTRAR RECEPCIONISTA</a>

<table id="recepcionistas" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">CI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Email</th>
            <th scope="col">Sexo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Turno</th>
            <th scope="col">Sueldo</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($recepcionistas as $recepcionista)
        <tr>
            <td>{{$recepcionista->ci}}</td>
            <td>{{$recepcionista->nombre}}</td>
            <td>{{$recepcionista->apellido}}</td>
            <td>{{$recepcionista->correo}}</td>
            <td>{{$recepcionista->sexo}}</td>
            <td>{{$recepcionista->telefono}}</td>
            <td>{{$recepcionista->turno}}</td>
            <td>{{$recepcionista->sueldo}}</td>
            <td>
                <form action="{{route('recepcionistas.destroy',$recepcionista->ci)}}" method="POST">
                    <a href="/recepcionistas/{{$recepcionista->ci}}/editar" class="btn btn-info">Editar</a>
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
        $('recepcionistas').DataTable({
            "lengthMenu":[[1, 10, 50, -1], [5, 10, 50, "All"]]
        });
    });
</script>
@stop