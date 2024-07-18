<?php include './views/layouts/header.php'; ?>

<!-- views/admin/pacientes/list.php -->

<div class="container mt-5">
    <h2 class="mb-4">Lista de Pacientes</h2>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="#" class="colordefault btn btn-sm btn-primary" data-toggle="modal" data-target="#pacienteModal">
            <i class="fa fa-plus"></i> Nuevo
        </a>
    </div>    
    <?php
    // Incluir el controlador para obtener la lista de pacientes
    require_once 'controllers/ManagerPacientesController.php';
    
    // Crear una instancia del controlador
    $controller = new ManagerPacientesController();
    
    // Llamar al método pacienteList() para obtener la lista de pacientes
    $list = $controller->pacienteList();

    // Verificar si $list no está vacío y luego mostrar los pacientes en una tabla
    if (!empty($list) && is_array($list)) {
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped table-bordered table-hover" style="border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">';
        echo '<thead class="thead-dark" style="background-color: #2A3F54; color: #ffffff;">';
        echo '<tr>';
        echo '<th style="padding: 12px;">Nombres</th>';
        echo '<th style="padding: 12px;">Apellidos</th>';
        echo '<th style="padding: 12px;">Documento</th>';
        echo '<th style="padding: 12px;">Teléfono</th>';
        echo '<th style="padding: 12px;">Tipo de Régimen</th>';
        echo '<th style="padding: 12px;">EPS</th>';
        echo '<th style="padding: 12px;">Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        foreach ($list as $paciente) {
            echo '<tr>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($paciente['nombres_paciente']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($paciente['apellidos_paciente']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($paciente['documento_paciente']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($paciente['telefono_paciente']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($paciente['descripcion_tipo_regimen']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($paciente['nombre_eps']) . '</td>';
            echo '<td style="padding: 12px;">';
            echo '<a href="editar_paciente.php?id=1" class="colordefault btn btn-sm btn-primary"><i class="fa fa-edit"></i> Editar</a>'; // Enlace con icono de edición
            echo '</td>';
            echo '</tr>';
        }
        
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo "<p class='alert alert-warning'>No hay pacientes para mostrar.</p>";
    }
    ?>
</div>

<!-- Modal -->
<div class="modal fade" id="pacienteModal" tabindex="-1" role="dialog" aria-labelledby="pacienteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pacienteModalLabel">Agregar Paciente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="pacienteForm">
          <div class="form-group">
            <label for="nombres">Nombres:</label>
            <input type="text" class="form-control" id="nombres" name="nombres" required>
          </div>
          <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
          </div>
          <div class="form-group">
            <label for="documento">Documento:</label>
            <input type="text" class="form-control" id="documento" name="documento" required>
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" required>
          </div>
          <div class="form-group">
            <label for="tipoPaciente">Tipo de Régimen:</label>
            <select class="form-control" id="tipoPaciente" name="tipoPaciente">
              <option value="1">Subsidiado</option>
              <option value="2">Contributivo</option>
              <!-- Agrega más opciones según sea necesario -->
            </select>
          </div>
          <div class="form-group">
            <label for="eps">EPS:</label>
            <select class="form-control" id="eps" name="eps">
              <option value="1">EPS 1</option>
              <option value="2">EPS 2</option>
              <!-- Agrega más opciones según sea necesario -->
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="colordefault btn btn-primary" onclick="submitPacienteForm()">Agregar Paciente</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
function submitPacienteForm() {
  const form = document.getElementById('pacienteForm');
  if (form.checkValidity()) {
    // Recopilar datos del formulario
    const formData = new FormData(form);

    // Hacer algo con los datos, como enviarlos a un servidor
    console.log(Object.fromEntries(formData.entries()));

    // Resetear el formulario y cerrar el modal
    form.reset();
    $('#pacienteModal').modal('hide');
  } else {
    form.reportValidity();
  }
}
</script>

<?php include './views/layouts/footer.php'; ?>
