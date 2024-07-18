<?php include './views/layouts/header.php'; ?>

<!-- views/admin/users/list.php -->

<div class="container mt-5">
    <h2 class="mb-4">Lista de Usuarios</h2>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="ruta_a_tu_pagina_de_nuevo_usuario.php" class="colordefault btn btn-sm btn-primary">
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
            echo '<td style="padding: 12px;">' . htmlspecialchars($user['tipo_usuario']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($user['estado_usuario']) . '</td>';
            echo '<td style="padding: 12px;">' . htmlspecialchars($user['fecha_usuario']) . '</td>';
            echo '<td style="padding: 12px;">';
            echo '<a href="editar_usuario.php?id=' . htmlspecialchars($user['usuario_id']) . '" class="colordefault btn btn-sm btn-primary"><i class="fa fa-edit"></i> Editar</a>'; // Enlace con icono de edición
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

<?php include './views/layouts/footer.php'; ?>
