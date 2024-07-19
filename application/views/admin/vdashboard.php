
<div class="container">
    <h2>Calendario</h2>
    <div style="width:100%" id="calendar"></div>




<!-- Modal -->
<div class="modal fade" id="dateModal" tabindex="-1" role="dialog" aria-labelledby="dateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dateModalLabel">Agregar Cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
          
            <p id="selectedDate"></p>
          </div>
          <div class="form-group">
            <label for="selectMedico">Seleccionar Médico:</label>
            <select class="form-control" id="selectMedico">
              <option value="1">Dr. Juan Pérez</option>
              <option value="2">Dra. María García</option>
              <!-- Agrega más opciones según sea necesario -->
            </select>
          </div>
          <div class="form-group">
            <label for="selectPaciente">Seleccionar Paciente:</label>
            <select class="form-control" id="selectPaciente">
              <option value="1">Pedro Martínez</option>
              <option value="2">Ana Sánchez</option>
              <!-- Agrega más opciones según sea necesario -->
            </select>
          </div>
          <div class="form-group">
                            <label for="hora">Seleccionar Hora:</label>
                            <div class="input-group date" id="horaPicker" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#horaPicker"/>
                                <div class="input-group-append" data-target="#horaPicker" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                </div>
                            </div>
                        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="colordefault btn btn-primary" onclick="agregarCita()">Agregar Cita</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>
