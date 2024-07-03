@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Crear Nuevo Historial Clínico</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('historial_clinico.store') }}" method="POST" onsubmit="prepareOdontogramData()">
                            @csrf
                            <div class="form-group">
                                <label for="id_paciente">Paciente</label>
                                <select name="id_paciente" id="id_paciente" class="form-control">
                                    @foreach($pacientes as $paciente)
                                        <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_odontologo">Odontólogo</label>
                                <select name="id_odontologo" id="id_odontologo" class="form-control">
                                    @foreach($odontologos as $odontologo)
                                        <option value="{{ $odontologo->id }}">{{ $odontologo->nombre }} {{ $odontologo->apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Fecha_Cita">Fecha de Cita</label>
                                <input type="date" name="Fecha_Cita" id="Fecha_Cita" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Diagnostico">Diagnóstico</label>
                                <textarea name="Diagnostico" id="Diagnostico" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Tratamiento">Tratamiento</label>
                                <textarea name="Tratamiento" id="Tratamiento" class="form-control" rows="3" required></textarea>
                            </div>
                            <!-- Odontograma -->
                            <h2>Odontograma</h2>
                            <div class="odontograma" id="odontograma">
                                <!-- Aquí se generará dinámicamente el odontograma -->
                            </div>
                            <input type="hidden" name="odontograma" id="odontograma_data">
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Guardar Historial Clínico</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .odontograma {
            display: grid;
            grid-template-columns: repeat(16, 1fr); /* 16 columnas */
            gap: 10px; /* Espacio entre los dientes */
            max-width: 800px; /* Ancho máximo del contenedor */
            margin: 0 auto; /* Centra el odontograma en la página */
        }

        .diente {
            border: 1px solid #000000;
            padding: 2px; /* Ajusta el padding para hacer más pequeños los dientes */
            text-align: center;
            margin-bottom: 5px; /* Ajusta el espacio entre las filas */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .nombre-diente {
            font-weight: bold;
            margin-bottom: 2px; /* Ajusta el margen entre el nombre del diente y las partes */
        }

        .partes-diente {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 columnas */
            gap: 2px; /* Espacio entre las partes del diente */
        }

        .parte {
            width: 10px; /* Ajusta el ancho de las partes del diente */
            height: 10px; /* Ajusta el alto de las partes del diente */
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            cursor: pointer;
        }

        .parte.selected {
            background-color: #007bff;
            color: #fff;
        }

        /* Estilos para los diferentes estados */
        .parte.ausente { background-color: #000000; }
        .parte.cariado { background-color: #ec0b07; }
        .parte.sano { background-color: #2db34e; }
        .parte.defecto { background-color: #f7f7f7; }
    </style>
</head>
<body>
  

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const odontograma = document.getElementById('odontograma');
            console.log('odontograma:', odontograma);
            // Número inicial para los dientes (empezando desde 1)
            let numeroDiente = 1;
            
            // Generar los dientes y partes dinámicamente
            for (let i = 1; i <= 32; i++) { // 32 dientes en total (16 por fila)
                const diente = document.createElement('div');
                diente.classList.add('diente');
                
                const nombreDiente = document.createElement('div');
                nombreDiente.classList.add('nombre-diente');
                nombreDiente.textContent = numeroDiente++;
                diente.appendChild(nombreDiente);
                
                const partesDiente = document.createElement('div');
                partesDiente.classList.add('partes-diente');
                
                // Crear partes del diente (cuadrados)
                const tiposPartes = ['Corona', 'Raíz', 'Cuello', 'Esmalte'];
                tiposPartes.forEach(tipo => {
                    const parte = document.createElement('div');
                    parte.classList.add('parte', 'cuadrado');
                    parte.setAttribute('data-diente', nombreDiente.textContent);
                    parte.setAttribute('data-parte', tipo);
                    
                    // Evento click para seleccionar el estado
                    parte.addEventListener('click', function() {
                        // Remover la clase 'selected' de todas las partes del diente
                        const partes = diente.querySelectorAll('.parte');
                        partes.forEach(parte => {
                            parte.classList.remove('selected');
                        });
                        
                        // Agregar la clase 'selected' a la parte clicada
                        this.classList.add('selected');
                        
                        // Obtener el número del diente y el tipo de parte seleccionada
                        const numeroDiente = this.getAttribute('data-diente');
                        const tipoParte = this.getAttribute('data-parte');
                        console.log('Diente:', numeroDiente, '- Parte:', tipoParte);
                        
                        // Establecer el estado de la parte del diente seleccionada
                        establecerEstado(numeroDiente, tipoParte);
                    });
                    
                    partesDiente.appendChild(parte);
                });
                
                diente.appendChild(partesDiente);
                odontograma.appendChild(diente);
            }
        });
        
        // Función para establecer el estado de la parte del diente seleccionada
        function establecerEstado(numeroDiente, tipoParte) {
            // Puedes manejar la lógica para establecer el estado aquí
            // Por ahora, simplemente imprimiremos el estado seleccionado en la consola
            const estadoSeleccionado = prompt('Selecciona el Estado del Diente (Sano,Cariado,Ausente):');
            console.log('Diente:', numeroDiente, '- Parte:', tipoParte, '- Estado:', estadoSeleccionado);
            
            // Remover clases de estado anteriores y agregar la clase del nuevo estado
            const partes = document.querySelectorAll('.parte');
            partes.forEach(parte => {
                if (parte.getAttribute('data-diente') === numeroDiente && parte.getAttribute('data-parte') === tipoParte) {
                    parte.classList.remove('ausente', 'cariado', 'sano', 'defecto');
                    parte.classList.add(estadoSeleccionado.toLowerCase());
                }
            });
        }

        // Función para preparar los datos del odontograma antes de enviar el formulario
        function prepareOdontogramData() {
            const odontograma = [];
            document.querySelectorAll('.diente').forEach(diente => {
                const numeroDiente = diente.querySelector('.nombre-diente').textContent;
                const partes = {};
                diente.querySelectorAll('.parte').forEach(parte => {
                    const tipoParte = parte.getAttribute('data-parte');
                    let estado = 'defecto'; // Estado por defecto
                    if (parte.classList.contains('ausente')) {
                        estado = 'ausente';
                    } else if (parte.classList.contains('cariado')) {
                        estado = 'cariado';
                    } else if (parte.classList.contains('sano')) {
                        estado = 'sano';
                    }
                    partes[tipoParte] = estado;
                });
                odontograma.push({ numeroDiente, partes });
            });
            document.getElementById('odontograma_data').value = JSON.stringify(odontograma);
        
        }
    </script>
</body>
</html>
@endsection 