<style>
  /* Cambiar color de fondo del día actual */
  .fc-daygrid-day.fc-day-today {
    background-color: #2A3F54 !important; /* Color de fondo deseado */
  }

  .fc .fc-daygrid-event-harness {
    background-color: #3788d8 !important;
    color: white;
    border-radius: 14px;
  }

  .fc-timegrid-day.fc-day-today {
    background-color: #2A3F54 !important; /* Color de fondo deseado */
  }

  .fc-direction-ltr .fc-daygrid-event.fc-event-end, .fc-direction-rtl .fc-daygrid-event.fc-event-start {

    color: white !important;
}



/* .fc .fc-daygrid-day-frame */
</style>
<?php if ($this->session->flashdata('error')): ?>
                            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                            <script>
                                Swal.fire({
                                    title: 'Error',
                                    text: '<?php echo $this->session->flashdata('error'); ?>',
                                    icon: 'error',
                                    showConfirmButton: false, 
                                    timer: 4000, 
                                    customClass: {
                            
                                        content: 'small-sweetalert'
                                    }
                                });
                            </script>
                            <style>
                              
                                .small-sweetalert {
                                    font-size: 14px;
                                   
                                }
                            </style>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('success')): ?>
                            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                            <script>
                                Swal.fire({
                                    title: 'Registro Exitoso',
                                    text: '<?php echo $this->session->flashdata('success'); ?>',
                                    icon: 'success',
                                    showConfirmButton: false, // No mostrar botón OK
                                    timer: 4000, // Cerrar automáticamente después de 3 segundos
                                    customClass: {
                                        // No es necesario agregar una clase personalizada para cambiar el tamaño
                                        // Puedes ajustar el tamaño directamente aquí
                                        content: 'small-sweetalert'
                                    }
                                });
                            </script>
                            <style>
                                /* Estilo CSS personalizado para hacer que la alerta sea más pequeña */
                                .small-sweetalert {
                                    font-size: 14px;
                                    /* Tamaño de fuente personalizado */
                                }
                            </style>
                        <?php endif; ?>
<div class="container">
  <h2>Calendario</h2>
  <div style="width:100%" id="calendar"></div>

  <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eventModalLabel">Detalles de la Cita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p><strong>Paciente:</strong> <span id="modal-paciente"></span></p>
          <p><strong>Documento:</strong> <span id="modal-documento"></span></p>
          <p><strong>Fecha y Hora:</strong> <span id="modal-fecha"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="dateModal" tabindex="-1" role="dialog" aria-labelledby="dateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dateModalLabel">Agregar Cita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="CerrarModal()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        

        <div class="modal-body">
  <form id="citaForm"  action="<?php echo base_url(); ?>cdashboard/caddcita" method="POST">
    <input type="hidden" name="fecha_hora" id="fecha_hora"> <!-- Campo oculto para fecha y hora combinadas -->

    <div class="form-group">
      <p id="selectedDate"></p>
    </div>
    
    <div class="form-group" id="fecha-group">
      <label for="fecha">Seleccionar Fecha:</label>
      <input type="date" class="form-control" id="fecha" name="fecha" readonly>
    </div>

    <div class="form-group" id="hora-group">
      <label for="hora">Seleccionar Hora:</label>
      <input type="time" class="form-control" id="hora" name="hora" >
    </div>

    <div class="form-group <?php echo !empty(form_error('txtmedico')) ? 'has-error' : ''; ?>">
      <label for="txtmedico">Médico</label>
      <select name="txtmedico" id="txtmedico" class="form-control selectpicker" data-live-search="true">
        <option value="">Seleccione Médico</option>
        <?php foreach ($medicocombo as $atributos): ?>
          <option value="<?php echo $atributos->medico_id ?>"><?php echo $atributos->nombres_medico . " " . $atributos->apellidos_medico ?></option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="form-group <?php echo !empty(form_error('txtpaciente')) ? 'has-error' : ''; ?>">
      <label for="txtpaciente">Paciente</label>
      <select name="txtpaciente" id="txtpaciente" class="form-control selectpicker" data-live-search="true">
        <option value="">Seleccione Paciente</option>
        <?php foreach ($pacientecombo as $atributos): ?>
          <option value="<?php echo $atributos->paciente_id ?>"><?php echo $atributos->nombres_paciente . " " . $atributos->apellidos_paciente ?></option>
          

          <?php endforeach ?>
      </select>
    </div>

    <div class="form-group <?php echo !empty(form_error('txtconsulta')) ? 'has-error' : ''; ?>">
      <label for="txtconsulta">Tipo de Consulta</label>
      <select name="txtconsulta" id="txtconsulta" class="form-control selectpicker" data-live-search="true">
        <option value="0">Seleccione Tipo de Consulta</option>
        <?php foreach ($tipodeconsulta as $atributos): ?>
          <option value="<?php echo $atributos->tipo_consulta_id ?>"><?php echo $atributos->descripcion_tipo_consulta ?></option>
          <?php endforeach ?>
          <option value="6">error</option>

      </select>
    </div>

    <div class="modal-footer">
      <button type="submit" class="colordefault btn btn-primary">Agregar Cita</button>
      <button type="button" class="btn btn-secondary" onclick="CerrarModal()" data-dismiss="modal">Cerrar</button>
    </div>
  </form>
</div>



      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var citas = <?php echo json_encode($citasindex); ?>;
  console.log(citas);
  
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'es',
    headerToolbar: {
      left: 'dayGridMonth,listWeek',
      center: 'title',
      right: 'prev,next today'
    },
    dateClick: function(info) {
      // Mostrar la fecha seleccionada en el modal
      document.getElementById('selectedDate').innerText = 'Fecha seleccionada: ' + info.dateStr;

      // Establecer el valor de la fecha seleccionada en el campo de fecha
      document.getElementById('fecha').value = info.dateStr;
      
      // Abrir el modal
      $('#dateModal').modal('show');
    },
    events: citas.map(function(cita) {
      return {
        title: cita.nombre_paciente,
        start: cita.fecha_consulta,
        allDay: false,
        extendedProps: {
          nombre_paciente: cita.nombre_paciente,
          documento: cita.documento,
          fecha_consulta: cita.fecha_consulta
        }
      };
    }),
    eventClick: function(info) {
      var modal = document.getElementById('eventModal');
      var span = document.getElementsByClassName('close')[0];
      
      document.getElementById('modal-paciente').textContent = info.event.extendedProps.nombre_paciente;
      document.getElementById('modal-documento').textContent = info.event.extendedProps.documento;
      document.getElementById('modal-fecha').textContent = info.event.extendedProps.fecha_consulta;
      
      $('#eventModal').modal('show');
    }
  });
  
  calendar.render();
});


  function CerrarModal() {
    $('#dateModal').modal('hide');
  }

  document.getElementById('citaForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el envío del formulario
    var fecha = document.getElementById('fecha').value;
    var hora = document.getElementById('hora').value;

    var hora_fecha = document.getElementById('fecha_hora').value;
    var medico = document.getElementById('txtmedico').value;
    var paciente = document.getElementById('txtpaciente').value;
    var tipoConsulta = document.getElementById('txtconsulta').value;

    if (!fecha) {
      Swal.fire({
        title: 'Error',
        text: 'Por favor seleccione una fecha.',
        icon: 'error',
        timer: 3000
      });
      return;
    }

    if (!hora) {
      Swal.fire({
        title: 'Error',
        text: 'Por favor seleccione una hora.',
        icon: 'error',
        timer: 3000
      });
      return;
    }

    if (!medico) {
      Swal.fire({
        title: 'Error',
        text: 'Por favor seleccione un médico.',
        icon: 'error',
        timer: 3000
      });
      return;
    }

    if (!paciente) {
      Swal.fire({
        title: 'Error',
        text: 'Por favor seleccione un paciente.',
        icon: 'error',
        timer: 3000
      });
      return;
    }

    if (!tipoConsulta) {
      Swal.fire({
        title: 'Error',
        text: 'Por favor seleccione un tipo de consulta.',
        icon: 'error',
        timer: 3000
      });
      return;
    }

    var fechaHora = fecha + ' ' + hora + ':00'; // Combinar fecha y hora
    document.getElementById('fecha_hora').value = fechaHora;

    // Si todo está correcto, envía el formulario
    this.submit();
  });
</script>

