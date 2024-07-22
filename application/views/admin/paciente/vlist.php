<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Paciente
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url(); ?>mantenimiento/cpaciente/cadd"
                           class="btn btn-primary btn-flat">
                            <span class="fa fa-plus"></span> Agregar pacientes
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
                                    

                                    <th>telefono</th>
                                    <th>Correo</th>
                                    <th>Regimen</th>
                                    <th>EPS</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($pacienteindex)): ?>
                                    <?php foreach ($pacienteindex as $atributos): ?>
                                        <tr>
                                            <td><?php echo $atributos->nombres_paciente; ?></td>
                                            <td><?php echo $atributos->apellidos_paciente; ?></td>
                                            <td><?php echo $atributos->documento_paciente; ?></td>
                                            <td><?php echo $atributos->telefono_paciente; ?></td>
                                            <td><?php echo $atributos->correo_paciente; ?></td>

                                            <td><?php echo $atributos->descripcion_tipo_regimen; ?></td>
                                            <td><?php echo $atributos->nombre_eps; ?></td>
                                          
            
                                            <?php $data = $atributos->paciente_id . "*" . $atributos->nombres_paciente . "*" . $atributos->apellidos_paciente . "*" . $atributos->documento_paciente; ?>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view" data-toggle="modal"
                                                            data-target="#modal-default" value="<?php echo $data; ?>">
                                                        <span class="fa fa-eye"></span>
                                                    </button>
                                                    <a href="<?php echo base_url(); ?>mantenimiento/cpaciente/cedit/<?php echo $atributos->paciente_id; ?>"
                                                       class="btn btn-warning">
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
                <h4 class="modal-title">INFORMACIÓN DE PACIENTE</h4>
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
            resp += "<p><strong>Código: </strong>" + info[2] + "</p>";
            resp += "<p><strong>Descripción: </strong>" + info[3] + "</p>";
            $("#modal-default .modal-body").html(resp);
        });
    });
</script>
