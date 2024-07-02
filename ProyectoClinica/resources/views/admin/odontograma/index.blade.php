@extends('adminlte::page')

@section('title', 'Odontograma')

@section('content_header')
    <h1>Odontograma</h1>
@stop

@section('content')
<style>
    .grid-container {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
    }
  
    .grid-item {
      padding: 20px;
      background-color: #f0f0f0;
      text-align: center;
      border: 1px solid #ccc;
      cursor: pointer;
    }
  </style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-header">
                <h3 class="card-title">Bitacora</h3>
            </div>
                
            <h1>Dental Map</h1>
            <div class="grid-container">
                <!-- Fila 1 -->
                <div class="grid-item" onclick="location.href='pagina1.html';">
                  <p>Celda 1</p>
                </div>
                <div class="grid-item" onclick="location.href='pagina2.html';">
                  <p>Celda 2</p>
                </div>
                <!-- Fila 2 -->
                <div class="grid-item" onclick="location.href='pagina3.html';">
                  <p>Celda 3</p>
                </div>
                <div class="grid-item" onclick="location.href='pagina4.html';">
                  <p>Celda 4</p>
                </div>
                <!-- Fila 3 -->
                <div class="grid-item" onclick="location.href='pagina5.html';">
                  <p>Celda 5</p>
                </div>
                <div class="grid-item" onclick="location.href='pagina6.html';">
                  <p>Celda 6</p>
                </div>
                <!-- Fila 4 -->
                <div class="grid-item" onclick="location.href='pagina7.html';">
                  <p>Celda 7</p>
                </div>
                <div class="grid-item" onclick="location.href='pagina8.html';">
                  <p>Celda 8</p>
                </div>
                <!-- Fila 5 -->
                <div class="grid-item" onclick="location.href='pagina9.html';">
                  <p>Celda 9</p>
                </div>
                <div class="grid-item" onclick="location.href='pagina10.html';">
                  <p>Celda 10</p>
                </div>
                <!-- Fila 6 -->
                <div class="grid-item" onclick="location.href='pagina11.html';">
                  <p>Celda 11</p>
                </div>
                <div class="grid-item" onclick="location.href='pagina12.html';">
                  <p>Celda 12</p>
                </div>
                <!-- Fila 7 -->
                <div class="grid-item" onclick="location.href='pagina13.html';">
                  <p>Celda 13</p>
                </div>
                <div class="grid-item" onclick="location.href='pagina14.html';">
                  <p>Celda 14</p>
                </div>
                <!-- Fila 8 -->
                <div class="grid-item" onclick="location.href='pagina15.html';">
                  <p>Celda 15</p>
                </div>
                <div class="grid-item" onclick="location.href='pagina16.html';">
                  <p>Celda 16</p>
                </div>
              </div>

                <script>
                    $(function () {
                        $("#example1").DataTable({
                            "pageLength": 10,
                            "language": {
                                "emptyTable": "No hay información",
                                "info": "Mostrando START a END de TOTAL Pacientes",
                                "infoEmpty": "Mostrando 0 a 0 de 0 Pacientes",
                                "infoFiltered": "(Filtrado de MAX total Pacientes)",
                                "infoPostFix": "",
                                "thousands": ",",
                                "loadingRecords": "Cargando...",
                                "processing": "Procesando...",
                                "search": "Buscar:",
                                "zeroRecords": "Sin resultados encontrados",
                                "paginate": {
                                    "first": "Primero",
                                    "last": "Ultimo",
                                    "next": "Siguiente",
                                    "previous": "Anterior"
                                }
                            },
                            "responsive": true, "lengthChange": true, "autoWidth": false,
                            buttons: [{
                                extend: 'collection',
                                text: 'Reportes',
                                orientation: 'landscape',
                                buttons: [{
                                    extend: 'pdf'
                                }, {
                                    extend: 'excel'
                                }, {
                                    text: 'Imprimir',
                                    extend: 'print'
                                }
                                ]
                            },
                                {
                                    extend: 'colvis',
                                    text: 'Visor de columnas',
                                    collectionLayout: 'fixed three-column'
                                }
                            ],
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{url('https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css')}}">
@stop

@section('js')
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('https://cdn.datatables.net/2.0.7/js/dataTables.js')}}"></script>
<script src="{{url('https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js')}}"></script>

<script>
    $(document).ready(function(){
        $('pacientes').DataTable({
            "lengthMenu":[[1, 10, 50, -1], [5, 10, 50, "All"]]
        });
    });
</script>
@stop
