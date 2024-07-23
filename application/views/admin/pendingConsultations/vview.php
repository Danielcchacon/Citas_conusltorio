<style>

.fc-day-today {
    background-color: #b4c0cd !important;
}
</style>
<div class="container">
    <h2>Citas pendientes</h2>
    <div style="width:100%" id="calendarMedico"></div>

       <!-- Modal -->
     <!-- Modal -->
    <div class="modal fade" id="dateModal" tabindex="-1" role="dialog" aria-labelledby="dateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dateModalLabel">Formulario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Información del Paciente -->
                    <div class="patient-info">
                        <h6>Información del Paciente</h6>
                        <p><strong>Nombre:</strong> <span id="patientName"></span></p>
                        <p><strong>Documento:</strong> <span id="patientDocument"></span></p>
                    </div>
                    <!-- Formulario -->
                    <form>
                        <input  type="hidden" name="id_medico" id="id_medico">
                        <div class="form-row">
                        <div class="form-group col-md-4">
                               

      <label for="txtmedico">Médico</label>
      <select name="txtmedico" id="medico" class="form-control selectpicker" data-live-search="true" disabled>
        <option value="">Seleccione Médico</option>
        <?php foreach ($medicocombo as $atributos): ?>
          <option value="<?php echo $atributos->medico_id ?>"><?php echo $atributos->nombres_medico . " " . $atributos->apellidos_medico ?></option>
        <?php endforeach ?>
      </select>


                            </div>
                            <div class="form-group col-md-4">
                                <label for="procedimiento">Procedimiento Realizado</label>
                                <input type="text" class="form-control" id="procedimiento">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="examenFisico">Examen Físico</label>
                                <input type="text" class="form-control" id="examenFisico">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tratamiento">Tratamiento Médico</label>
                                <input type="text" class="form-control" id="tratamiento">
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <label for="evaluacion">Evaluación</label>
                            <textarea class="form-control" id="evaluacion" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="diagnostico">Diagnóstico</label>
                            <textarea class="form-control" id="diagnostico" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   document.addEventListener('DOMContentLoaded', function() {
    var citas = <?php echo json_encode($pendingConsultationsindex); ?>;
console.log(citas)
    var eventos = citas.map(function(cita) {
        return {
            title: cita.nombre_paciente + " "+cita.apellido_paciente,
            start: cita.fecha_consulta,
            extendedProps: {
                id: cita.medico_id,
                nombre: cita.nombre_paciente + " "+cita.apellido_paciente,
                documento: cita.documento
            }
        };
    });

    var calendarEl = document.getElementById('calendarMedico');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridDay',
        locale: 'es',
        headerToolbar: {
            left: '',
            center: 'title',
            right: 'prev,next today'
        },
        events: eventos,
        eventClick: function(info) {
            // Mostrar la información del paciente en la sección correspondiente del modal
            document.getElementById('patientName').innerText = info.event.extendedProps.nombre;
            document.getElementById('patientDocument').innerText = info.event.extendedProps.documento;
            document.getElementById('id_medico').value = info.event.extendedProps.id;

            
            // Limpiar campos del modal para nueva entrada de datos
            document.getElementById('procedimiento').value = '';
            document.getElementById('examenFisico').value = '';
            document.getElementById('tratamiento').value = '';
            document.getElementById('medico').value = info.event.extendedProps.id;
            document.getElementById('evaluacion').value = '';
            document.getElementById('diagnostico').value = '';

            // Abrir el modal
            $('#dateModal').modal('show');
        }
    });

    calendar.render();
});

</script>
