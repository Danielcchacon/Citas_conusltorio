<?php include './views/layouts/header.php'; ?>

<!-- views/admin/users/list.php -->
<div class="container mt-5">
<h2 class="mb-4">Lista de Usuarios</h2>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="#" class="colordefault btn btn-sm btn-primary" data-toggle="modal" data-target="#userModal">
            <i class="fa fa-plus"></i> Nuevo
        </a>
    </div>

    <?php
    // Incluir el controlador para obtener la lista de usuarios
    require_once 'controllers/ManagerUsersController.php';
    
    // Crear una instancia del controlador
    $controller = new ManagerUsersController();
    
    // Llamar al método userList() para obtener la lista de usuarios
    $list = $controller->userList();

    // Verificar si $list no está vacío y luego mostrar los usuarios en una tabla
    if (!empty($list) && is_array($list)) {
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped table-bordered table-hover" style="border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">';
        echo '<thead class="thead-dark" style="background-color: #2A3F54; color: #ffffff;">';
        echo '<tr>';
        echo '<th style="padding: 12px;">ID</th>';
        echo '<th style="padding: 12px;">Nombres</th>';
        echo '<th style="padding: 12px;">Apellidos</th>';
        echo '<th style="padding: 12px;">Documento</th>';
        echo '<th style="padding: 12px;">Correo</th>';
        echo '<th style="padding: 12px;">Teléfono</th>';
        echo '<th style="padding: 12px;">Tipo de Usuario</th>';
        echo '<th style="padding: 12px;">Estado</th>';
        echo '<th style="padding: 12px;">Fecha</th>';
        echo '<th style="padding: 12px;">Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        foreach ($list as $user) {
            echo '<tr>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($user['usuario_id']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($user['nombres_usuario']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($user['apellidos_usuario']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($user['documento_usuario']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($user['correo_usuario']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($user['telefono_usuario']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($user['descripcion_tipo_usuario']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($user['estado_usuario']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($user['fecha_usuario']) . '</td>';
            echo '<td style="padding: 12px;">';
            echo '<a href="#" class="colordefault btn btn-sm btn-warning"><i class="fa fa-edit"></i> Editar</a>';
            echo '</td>';
            echo '</tr>';
        }
        
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo "<p class='alert alert-warning'>No hay usuarios para mostrar.</p>";
    }
    ?>
</div>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="userForm">
          <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
          </div>
          <div class="form-group">
            <label for="documento">Documento:</label>
            <input type="text" class="form-control" id="documento" name="documento" required>
          </div>
          <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" class="form-control" id="correo" name="correo" required>
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" class="form-control" id="telefono" name="telefono" required>
          </div>
          <div class="form-group">
            <label for="tipoUsuario">Tipo de Usuario:</label>
            <select class="form-control" id="tipoUsuario" name="tipoUsuario">
              <option value="admin">Secretari@</option>
              <option value="user">Medico</option>
              <!-- Agrega más opciones según sea necesario -->
            </select>
          </div>
          <div class="form-group">
            <label for="estadoUsuario">Estado:</label>
            <select class="form-control" id="estadoUsuario" name="estadoUsuario">
              <option value="activo">Activo</option>
              <option value="inactivo">Inactivo</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="colordefault btn btn-primary" onclick="submitUserForm()">Agregar Usuario</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
function submitUserForm() {
  const form = document.getElementById('userForm');
  if (form.checkValidity()) {
    // Recopilar datos del formulario
    const formData = new FormData(form);

    // Hacer algo con los datos, como enviarlos a un servidor
    console.log(Object.fromEntries(formData.entries()));

    // Resetear el formulario y cerrar el modal
    form.reset();
    $('#userModal').modal('hide');
  } else {
    form.reportValidity();
  }
}
</script>

<?php include './views/layouts/footer.php'; ?>
