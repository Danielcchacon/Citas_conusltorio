<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Título
            <small>Sub Título</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                  
                <div class="col-md-12">
    <a href="<?php echo base_url(); ?>mantenimiento/cproveedor/cadd" class="btn btn-primary btn-flat">
        <span class="fa fa-plus" style="margin-right: 5px;"></span> Agregar Proveedor
    </a>
</div>

                </div>
<hr>

                <?php if ($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                    <p><?php echo $this->session->flashdata('success')?></p>
                </div>
                <?php endif; ?>
                
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table id="table" class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Código</th>
                                <th>Direccion</th>
                                <th>Tipo Dococumento</th>
                                <th>Tipo de proveedor </th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($proveedorindex)): ?>
                                <?php foreach ($proveedorindex as $atributos): ?>
                                    <tr>
                                        <td>
                                            <?php echo $atributos->idproveedor; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->nombre; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->codigo; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->direccion; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->tipo_documento; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->tipo_proveedor; ?>
                                        </td>
                                        <?php
                                        if ($atributos->estado == 1) {
                                            $style = 'class="label label-success"';
                                            echo "<td><p><span $style><font style='vertical-align: inherit;'>Activo</font></span></p></td>";
                                        } else {
                                            $style = 'class="label label-danger"';
                                            echo "<td><p><span $style><font style='vertical-align: inherit;'>Desactivo</font></span></p></td>";
                                        }

                                        ?> 
                                       <?php $data = $atributos->idproveedor."*" .$atributos->nombre."*".$atributos->codigo; ?> 
                                        <td>
                                            <div class="btn-group">

                                            <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $data; ?>">
                                                    <span class="fa fa-eye"></span>
                                                </button>
                                          


                                                <a href="<?php echo base_url(); ?>mantenimiento/cproveedor/cedit/<?php echo $atributos->idproveedor; ?>"
                                                    class="btn btn-warning">
                                                    <span class="fa fa-pencil"></span>
                                                </a>

                                                <a href="<?php echo base_url(); ?>mantenimiento/cproveedor/cdelete/<?php echo $atributos->idproveedor; ?>"
                                                    class="btn btn-danger btn-remove">
                                                    <span class="fa fa-remove"></span>
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
    <div class="modal-dialog modal-lg"> <!-- Clase "modal-lg" para un modal más grande, si es necesario -->
        <div class="modal-content">
        <span class="" style="font-family: 'Russo One', sans-serif;"><b>CHECK<span style="color:#39ACE7">OUTPLUS</span></b></span>   
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> <!-- Usando el icono "x" de Bootstrap -->
                </button>
                <h4 class="modal-title">INFORMACIÓN DE CATEGORÍA</h4>
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

<script type="text/javascript">
    $(document).ready(function () {
        $('.btn-view').on('click', function () {
            var boton = $(this).val();
            console.log("entre jquery");
            var info = boton.split("*");
            var resp = "<p><strong>Nombre: </strong>" + info[1] + "</p>";
            resp += "<p><strong>Código: </strong>" + info[2] + "</p>";
            resp += "<p><strong>Descripción: </strong>" + info[3] + "</p>";
            $("#modal-default .modal-body").html(resp);
        });
    });
</script>
