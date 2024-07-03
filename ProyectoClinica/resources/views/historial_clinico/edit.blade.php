@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar Historial Clínico</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('historial_clinico.update', $historial_clinico->id) }}" method="POST" onsubmit="prepareOdontogramData()">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id_paciente">Paciente</label>
                            <input type="text" class="form-control" id="id_paciente_display" value="{{ $historial_clinico->paciente->nombre }} {{ $historial_clinico->paciente->apellido }}" readonly>
                            <input type="hidden" id="id_paciente" name="id_paciente" value="{{ $historial_clinico->id_paciente }}">
                        </div>

                        <div class="form-group">
                            <label for="id_odontologo">Odontólogo</label>
                            <input type="text" class="form-control" id="id_odontologo_display" value="{{ $historial_clinico->odontologo->nombre }} {{ $historial_clinico->odontologo->apellido }}" readonly>
                            <input type="hidden" id="id_odontologo" name="id_odontologo" value="{{ $historial_clinico->id_odontologo }}">
                        </div>
                        <div class="form-group">
                            <label for="Fecha_Cita">Fecha de Cita</label>
                            <input type="date" name="Fecha_Cita" id="Fecha_Cita" class="form-control" value="{{ $historial_clinico->Fecha_Cita }}" required>
                        </div>
                        <div class="form-group">
                            <label for="Diagnostico">Diagnóstico</label>
                            <textarea name="Diagnostico" id="Diagnostico" class="form-control" rows="3" required>{{ $historial_clinico->Diagnostico }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="Tratamiento">Tratamiento</label>
                            <textarea name="Tratamiento" id="Tratamiento" class="form-control" rows="3" required>{{ $historial_clinico->Tratamiento }}</textarea>
                        </div>
                        <!-- Odontograma -->
                        <h2>Odontograma</h2>
                        <div class="odontograma" id="odontograma">
                            <!-- Aquí se generará dinámicamente el odontograma -->
                        </div>
                        <input type="hidden" name="odontograma" id="odontograma_data">
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Actualizar Historial Clínico</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .odontograma {
        display: grid;
        grid-template-columns: repeat(16, 1fr);
        gap: 10px;
        max-width: 800px;
        margin: 0 auto;
    }

    .diente {
        border: 1px solid #000000;
        padding: 2px;
        text-align: center;
        margin-bottom: 5px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .nombre-diente {
        font-weight: bold;
        margin-bottom: 2px;
    }

    .partes-diente {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2px;
    }

    .parte {
        width: 10px;
        height: 10px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        cursor: pointer;
    }

    .parte.selected {
        background-color: #007bff;
        color: #fff;
    }

    .parte.ausente { background-color: #000000; }
    .parte.cariado { background-color: #ec0b07; }
    .parte.sano { background-color: #2db34e; }
    .parte.defecto { background-color: #f7f7f7; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const odontogramaData = JSON.parse(@json($historial_clinico->odontograma));
        const odontograma = document.getElementById('odontograma');
        
        odontogramaData.forEach(dienteData => {
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
                
                parte.classList.add(dienteData.partes[tipoParte]);
                
                parte.addEventListener('click', function() {
                    const partes = diente.querySelectorAll('.parte');
                    partes.forEach(parte => {
                        parte.classList.remove('selected');
                    });
                    this.classList.add('selected');
                    establecerEstado(this.getAttribute('data-diente'), this.getAttribute('data-parte'));
                });
                
                partesDiente.appendChild(parte);
            });
            
            diente.appendChild(partesDiente);
            odontograma.appendChild(diente);
        });
    });

    function establecerEstado(numeroDiente, tipoParte) {
        const estadoSeleccionado = prompt('Selecciona el Estado del Diente (Sano, Cariado, Ausente):');
        const partes = document.querySelectorAll('.parte');
        partes.forEach(parte => {
            if (parte.getAttribute('data-diente') === numeroDiente && parte.getAttribute('data-parte') === tipoParte) {
                parte.classList.remove('ausente', 'cariado', 'sano', 'defecto');
                parte.classList.add(estadoSeleccionado.toLowerCase());
            }
        });
    }

    function prepareOdontogramData() {
        const odontograma = [];
        document.querySelectorAll('.diente').forEach(diente => {
            const numeroDiente = diente.querySelector('.nombre-diente').textContent;
            const partes = {};
            diente.querySelectorAll('.parte').forEach(parte => {
                const tipoParte = parte.getAttribute('data-parte');
                let estado = 'defecto';
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
@endsection



