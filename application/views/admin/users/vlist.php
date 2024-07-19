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
                        <a href="<?php echo base_url(); ?>mantenimiento/ccategoria/cadd"
                            class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Categoría</a>
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
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($categoriaindex)): ?>
                                <?php foreach ($categoriaindex as $atributos): ?>
                                    <tr>
                                        <td>
                                            <?php echo $atributos->codigo; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->nombre; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->descripcion; ?>
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
                                       <?php $data = $atributos->idcategoria."*" .$atributos->nombre."*".$atributos->codigo. "*".$atributos->descripcion; ?> 
                                        <td>
                                            <div class="btn-group">

                                            <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $data; ?>">
                                                        
                                                    <span class="fa fa-eye"></span>
                                                </button>
                                          
                                        

                                                <a href="<?php echo base_url(); ?>mantenimiento/ccategoria/cedit/<?php echo $atributos->idcategoria; ?>"
                                                    class="btn btn-warning">
                                                    <span class="fa fa-pencil"></span>
                                                </a>

                                                <a href="<?php echo base_url(); ?>mantenimiento/ccategoria/cdelete/<?php echo $atributos->idcategoria; ?>"
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

<div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Lista de productos</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-body2" style="margin: 2%;">
                    <div class="table-responsive">
                        <table id="tablemodal" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>add</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <!-- <th>Precio</th>
                                    <th>stock</th>
                                    <th>U.Medida</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                
                            <?php if (!empty($productoscategoria)): ?>
                                <?php foreach ($productoscategoria as $atributos): ?>
                                    <tr>
                                        <td>
                                            <?php echo $atributos->producto; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->Material; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->marca; ?>
                                        </td>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
        <script>
              $(document).ready(function(){
        $('#tablemodal').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron resultados en su búsqueda",
                "searchPlaceholder": "Buscar registro",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "No existen registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
        </script>
    </div>
    
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
