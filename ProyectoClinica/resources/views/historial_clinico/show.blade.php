@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Historial Clínico</h3>
                        <!-- Botón de imprimir -->
                        <button class="btn btn-primary float-right" onclick="printPage()">Imprimir</button>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Paciente:</label>
                            <p>{{ $historial_clinico->paciente->nombre }} {{ $historial_clinico->paciente->apellido }}</p>
                        </div>
                        <div class="form-group">
                            <label>Odontólogo:</label>
                            <p>{{ $historial_clinico->odontologo->nombre }} {{ $historial_clinico->odontologo->apellido }}</p>
                        </div>
                        <div class="form-group">
                            <label>Fecha de Cita:</label>
                            <p>{{ $historial_clinico->Fecha_Cita }}</p>
                        </div>
                        <div class="form-group">
                            <label>Diagnóstico:</label>
                            <p>{{ $historial_clinico->Diagnostico }}</p>
                        </div>
                        <div class="form-group">
                            <label>Tratamiento:</label>
                            <p>{{ $historial_clinico->Tratamiento }}</p>
                        </div>
                        <!-- Mostrar Odontograma -->
                        <h2>Odontograma</h2>
                        <div class="odontograma" id="odontograma">
                            <!-- Aquí se generará dinámicamente el odontograma -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        }

        /* Estilos para los diferentes estados */
        .parte.ausente { background-color: #000000; }
        .parte.cariado { background-color: #ec0b07; }
        .parte.sano { background-color: #2a9b59; }
        .parte.defectp { background-color: #ffffff; }

        @media print {
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
            }

            /* Estilos para los diferentes estados */
            .parte.ausente { background-color: #000000 !important; }
            .parte.cariado { background-color: #ec0b07 !important; }
            .parte.sano { background-color: #2a9b59 !important; }
            .parte.defectp { background-color: #ffffff !important; }
        }
    </style>
    <script>
        function printPage() {
            window.print();
        }

        document.addEventListener('DOMContentLoaded', function() {
            const odontogramaData = JSON.parse(@json($historial_clinico->odontograma));
            console.log('Datos del odontograma:', odontogramaData);
            
            const odontograma = document.getElementById('odontograma');
            console.log('Contenedor del odontograma:', odontograma); // Verifica que odontograma esté definido correctamente
            
            odontogramaData.forEach(dienteData => {
                console.log('Datos del diente:', dienteData); // Verifica cada dato del diente en la consola
                const diente = document.createElement('div');
                diente.classList.add('diente');
                
                const nombreDiente = document.createElement('div');
                nombreDiente.classList.add('nombre-diente');
                nombreDiente.textContent = dienteData.numeroDiente;
                diente.appendChild(nombreDiente);
                
                const partesDiente = document.createElement('div');
                partesDiente.classList.add('partes-diente');
                
                Object.keys(dienteData.partes).forEach(tipoParte => {
                    const parte = document.createElement('div');
                    parte.classList.add('parte', 'cuadrado');
                    parte.setAttribute('data-diente', dienteData.numeroDiente);
                    parte.setAttribute('data-parte', tipoParte);
                    
                    // Asignar la clase correspondiente al estado
                    parte.classList.add(dienteData.partes[tipoParte]);
                    
                    partesDiente.appendChild(parte);
                });
                
                diente.appendChild(partesDiente);
                odontograma.appendChild(diente);
            });
        });
    </script>
@endsection