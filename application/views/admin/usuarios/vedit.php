
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <a href="<?php echo base_url(); ?>mantenimiento/cusuarios/">usuarios</a>
          <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <p>
                                    <?php echo $this->session->flashdata('error') ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        
                        <form action="<?php echo base_url(); ?>mantenimiento/cusuarios/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $usuariosedit->usuario_id ?>" id="txtidusuarios" name="txtidusuarios">


                            <div class="form-group <?php echo !empty(form_error('txtnombre')) ? 'is-invalid' : ''; ?>">
                                <label for="txtnombre">Nombre </label>
                                <input type="text" id="txtnombre" name="txtnombre" class="form-control"
                                    value="<?php echo !empty(form_error('txtnombre')) ? set_value('txtnombre') : $usuariosedit->nombres_usuario ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtnombre', '<div class="invalid-feedback">', '</div>') ?>
                            </div>

                         

                            <div class="form-group <?php echo !empty(form_error('txtapellido')) ? 'is-invalid' : ''; ?>">
                                <label for="txtapellido">Apellido </label>
                                <input type="text" id="txtapellido" name="txtapellido" class="form-control"
                                    value="<?php echo !empty(form_error('txtapellido')) ? set_value('txtapellido') : $usuariosedit->apellidos_usuario ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtapellido', '<div class="invalid-feedback">', '</div>') ?>
                            </div>
                            

                            <div class="form-group <?php echo !empty(form_error('txtdocumento')) ? 'is-invalid' : ''; ?>">
                                <label for="txtdocumento">Documento</label>
                                <input type="text" id="txtdocumento" name="txtdocumento" class="form-control"
                                    value="<?php echo !empty(form_error('txtdocumento')) ? set_value('txtdocumento') : $usuariosedit->documento_usuario ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtdocumento', '<div class="invalid-feedback">', '</div>') ?>
                            </div>
                            
                            <div class="form-group <?php echo !empty(form_error('txttelefono')) ? 'is-invalid' : ''; ?>">
                                <label for="txttelefono">Correo </label>
                                <input type="text" id="txttelefono" name="txttelefono" class="form-control"
                                    value="<?php echo !empty(form_error('txttelefono')) ? set_value('txttelefono') : $usuariosedit->correo_usuario ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txttelefono', '<div class="invalid-feedback">', '</div>') ?>
                            </div>
                            
                            <div class="form-group <?php echo !empty(form_error('txteps')) ? 'has-erro' : ''; ?>">
                                <label for="documento">ROL</label>
                                <select name="txteps" id="txteps" class="form-control selectpicker" data-live-search="true">
                                    
                                    <option value=' '>Seleccione</option>
                                    
                                    <?php  foreach ($tipo_usuariocombo as $atributos): ?>
                                        <?php if($atributos->tipo_usuario_id == $usuariosedit->tipo_usuario): ?>
                                        <option value="<?php echo $atributos->tipo_usuario_id ?>"selected><?php echo $atributos->descripcion_tipo_usuario ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo $atributos->tipo_usuario_id ?>"><?php echo $atributos->descripcion_tipo_usuario?></option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                           
                            <div class="form-group <?php echo !empty(form_error('txttelefono')) ? 'is-invalid' : ''; ?>">
                                <label for="txttelefono">Fecha de Registro </label>
                                <input type="text" id="txttelefono" name="txttelefono" class="form-control"
                                    value="<?php echo !empty(form_error('txttelefono')) ? set_value('txttelefono') : $usuariosedit->fecha_usuario ?>"
                                    onblur="this.value=this.value.toUpperCase();"
                                    readonly
                                    >
                                <?php echo form_error('txttelefono', '<div class="invalid-feedback">', '</div>') ?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    document.getElementById("txtestado").addEventListener("change", function () {
        var selectElement = this;
        if (selectElement.value === "1") {
            selectElement.parentNode.classList.remove("has-error");
            selectElement.parentNode.classList.add("has-success");
        } else if (selectElement.value === "2") {
            selectElement.parentNode.classList.remove("has-success");
            selectElement.parentNode.classList.add("has-error");
        }
    });
</script>
