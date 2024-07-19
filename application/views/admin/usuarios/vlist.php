<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Usuarios
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url(); ?>mantenimiento/cusuarios/cadd" class="btn btn-primary btn-flat">
                            <span class="fa fa-plus"></span> Agregar Usuarios
                        </a>
                    </div>
                </div>
                <hr>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <p><?php echo $this->session->flashdata('success'); ?></p>
                    </div>
                <?php endif; ?>

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Documento</th>
                                    <th>Correo</th>
                                    <th>Teléfono</th>
                                    <th>Tipo Usuario</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($usuariosindex)): ?>
                                    <?php foreach ($usuariosindex as $atributos): ?>
                                        <tr>
                                            <td><?php echo $atributos->nombres_usuario; ?></td>
                                            <td><?php echo $atributos->apellidos_usuario; ?></td>
                                            <td><?php echo $atributos->documento_usuario; ?></td>
                                            <td><?php echo $atributos->correo_usuario; ?></td>
                                            <td><?php echo $atributos->telefono_usuario; ?></td>
                                            <td><?php echo $atributos->descripcion_tipo_usuario; ?></td>
                                            <td><?php echo $atributos->estado_usuario; ?></td>
                                            <td><?php echo $atributos->fecha_usuario; ?></td>
                                            <?php $data = $atributos->usuario_id . "*" . $atributos->nombres_usuario . "*" . $atributos->apellidos_usuario . "*" . $atributos->documento_usuario; ?>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $data; ?>">
                                                        <span class="fa fa-eye"></span>
                                                    </button>
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cusuarios/cedit/<?php echo $atributos->usuario_id; ?>" class="btn btn-warning">
                                                        <span class="fa fa-pencil"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- /.content-wrapper -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">INFORMACIÓN DE USUARIOS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.btn-view').on('click', function () {
            var boton = $(this).val();
            var info = boton.split("*");
            var resp = "<p><strong>Nombre: </strong>" + info[1] + "</p>";
            resp += "<p><strong>Apellido: </strong>" + info[2] + "</p>";
            resp += "<p><strong>Documento: </strong>" + info[3] + "</p>";
            $("#modal-default .modal-body").html(resp);
        });
    });
</script>
