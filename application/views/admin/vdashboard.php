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
          <form action="<?php echo base_url(); ?>cdashboard/caddcita" method="POST">
            <div class="form-group">
              <p id="selectedDate"></p>
            </div>
            
           
            
            <div class="form-group <?php echo !empty(form_error('txtregimen')) ? 'has-erro' : ''; ?>">
                                <label for="txtregimen">Medico </label>
                                <select name="txtregimen" id="txtregimen" class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione Medico</option>
                                    <?php foreach ($tipo_regimencombo as $atributos): ?>
                                        <?php if($atributos->tipo_regimen_id == $pacienteedit->tipo_paciente): ?>
                                        <option value="<?php echo $atributos->tipo_regimen_id ?>"selected><?php echo $atributos->descripcion_tipo_regimen ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo $atributos->tipo_regimen_id ?>"><?php echo $atributos->descripcion_tipo_regimen ?></option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div> <div class="form-group <?php echo !empty(form_error('txtregimen')) ? 'has-erro' : ''; ?>">
                                <label for="txtregimen">Paciente</label>
                                <select name="txtregimen" id="txtregimen" class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione Paciente</option>
                                    <?php foreach ($tipo_regimencombo as $atributos): ?>
                                        <?php if($atributos->tipo_regimen_id == $pacienteedit->tipo_paciente): ?>
                                        <option value="<?php echo $atributos->tipo_regimen_id ?>"selected><?php echo $atributos->descripcion_tipo_regimen ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo $atributos->tipo_regimen_id ?>"><?php echo $atributos->descripcion_tipo_regimen ?></option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div> 
                            <div class="form-group <?php echo !empty(form_error('txtregimen')) ? 'has-erro' : ''; ?>">
                                <label for="txtregimen">Tipo de consulta</label>
                                <select name="txtregimen" id="txtregimen" class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione Tipo de consulta</option>
                                    <?php foreach ($tipo_regimencombo as $atributos): ?>
                                        <?php if($atributos->tipo_regimen_id == $pacienteedit->tipo_paciente): ?>
                                        <option value="<?php echo $atributos->tipo_regimen_id ?>"selected><?php echo $atributos->descripcion_tipo_regimen ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo $atributos->tipo_regimen_id ?>"><?php echo $atributos->descripcion_tipo_regimen ?></option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group">
  <label for="hora">Seleccionar Hora:</label>
  <input type="time" class="form-control" id="hora" name="hora">
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

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'es',
      headerToolbar: {
        left: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
        center: 'title',
        right: 'prev,next today'
      },
      dateClick: function(info) {
        // Mostrar la fecha seleccionada en el modal
        document.getElementById('selectedDate').innerText = 'Fecha seleccionada: ' + info.dateStr;

        // Abrir el modal
        $('#dateModal').modal('show');
      },
      events: citas.map(function(cita) {
        return {
          title: cita.nombre_paciente + ' con ' + cita.nombre_medico,
          start: cita.fecha_consulta,
          allDay: false
        };
      })
    });
    calendar.render();
  });

  function CerrarModal() {
    $('#dateModal').modal('hide');
  }
</script>
