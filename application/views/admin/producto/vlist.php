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
                        <a href="<?php echo base_url(); ?>mantenimiento/cproducto/cadd"
                            class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Nuevo Producto</a>
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
                <div class="table-responsive">
                    <table id="table" class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Color</th>
                                <th>Categoria</th>
                                <th>Tipo Material</th>
                                <th>Marca</th>
                                <th>Unidad de Medida</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($productoindex)): ?>
                                <?php foreach ($productoindex as $atributos): ?>
                                    <tr>
                                        <td>
                                            <?php echo $atributos->idproducto; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->codigo; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->nombre; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->descripcion; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->color; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->categoria; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->tipo_material; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->marca; ?>
                                        </td>
                                      
                                        <td>
                                        <span style="font-weight: bold; margin-right: 5px;">Nom:</span><?php echo $atributos->unmedida; ?>
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
                                       <?php $data = $atributos->idproducto."*" .$atributos->nombre."*".$atributos->codigo. "*".$atributos->descripcion."*".$atributos->precio."*".$atributos->stock."*".$atributos->imagen; ?> 
                                        <td>
                                            <div class="btn-group">

                                            <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $data; ?>">
                                                    <span class="fa fa-eye"></span>
                                                </button>
                                          


                                                <a href="<?php echo base_url(); ?>mantenimiento/cproducto/cedit/<?php echo $atributos->idproducto; ?>"
                                                    class="btn btn-warning">
                                                    <span class="fa fa-pencil"></span>
                                                </a>

                                                <a href="<?php echo base_url(); ?>mantenimiento/cproducto/cdelete/<?php echo $atributos->idproducto; ?>"
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
</div>
</section>
</div>
 


<!-- /.content-wrapper --> 
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg"> <!-- Clase "modal-lg" para un modal más grande, si es necesario -->
        <div class="modal-content">
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


<script type="text/javascript">
    $(document).ready(function () {
        $('.btn-view').on('click', function () {
            var boton = $(this).val();
            console.log("entre jquery");
            var info = boton.split("*");
            var resp = "<p><strong>Nombre: </strong>" + info[1] + "</p>";
            resp += "<p><strong>Código: </strong>" + info[2] + "</p>";
            resp += "<p><strong>Descripción: </strong>" + info[3] + "</p>";
            resp += "<p><strong>Stock: </strong>" + info[5] + "</p>";
            resp += "<p><strong>Precio:$ </strong>" + info[4] + "</p>";
           
            resp += "<a href='<?php echo base_url()?>uploads/productos/" + info[6] + "' data-lightbox='img' data-title='mication'><img  style = 'width: 100%;' src='<?php echo base_url()?>uploads/productos/" + info[6] + "' alt='' data-lightbox='img' data-title='mication'></a>";

            $("#modal-default .modal-body").html(resp);
        });
    });
</script>
<img src="" alt="">