<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <a href="<?php echo base_url(); ?>mantnimiento/cproveedor/">proveedor</a>
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

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <p>
                                    <?php echo $this->session->flashdata('error') ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo base_url(); ?>mantenimiento/cproveedor/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $proveedoredit->idproveedor ?>" id="txtidproveedor"
                                name="txtidproveedor">

                            <div class="form-group <?php echo !empty(form_error('txtnombre')) ? 'has-erro' : ''; ?>">
                                <label for="documento">Documento</label>
                                <select name="txttipo_documento" id="txttipo_documento"
                                    class="form-control selectpicker" data-live-search="true">
                                
                                    <?php foreach ($tipo_documentocombo as $atributos): ?>
                                        <?php if ($atributos->idtipo_documento == $proveedoredit->idtipo_documento): ?>
                                            <option value="<?php echo $atributos->idtipo_documento ?>" selected> <?php echo $atributos->nombre ?> </option>
                                            <?php else: ?>
                                            <option value="<?php echo $atributos->idtipo_documento ?>"><?php echo $atributos->nombre ?> </option>
                                            <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtcodigo')) ? 'has-error' : ''; ?>">
                                <label for="codigo">Código</label>
                                <input type="text" id="txtcodigo" name="txtcodigo" class="form-control"
                                    value="<?php echo !empty(form_error('txtcodigo')) ? set_value('txtcodigo') : $proveedoredit->codigo ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtcodigo', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div
                                class="form-group <?php echo !empty(form_error('txttipo_proveedor')) ? 'has-erro' : ''; ?>">
                                <label for="tipo de proveedor">Tipo de proveedor</label>
                                
                                <select name="txttipo_proveedor" id="txttipo_proveedor" class="form-control selectpicker"
                                    data-live-search="true">
                                  
                                    <?php foreach ($tipo_proveedorcombo as $atributos): ?>
                                        <?php  if ($atributos->idtipo_cliente == $proveedoredit->idtipo_cliente): ?>
                                        <option value="<?php echo $atributos->idtipo_cliente ?>" selected><?php echo $atributos->nombre ?></option>
                                        <?php else: ?>     
                                            <option value="<?php echo $atributos->idtipo_cliente?>"><?php echo $atributos->nombre ?></option> 
                                            <?php endif ?>                             
                                        <?php endforeach ?>
                                </select>
                                <?php echo form_error('txttipo_proveedor', '<span class="help-block">', '</span>') ?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtnombre')) ? 'has-erro' : ''; ?>">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="txtnombre" name="txtnombre" class="form-control"
                                    value="<?php echo $proveedoredit->nombre ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group <?php echo !empty(form_error('txtdireccion')) ? 'has-erro' : ''; ?>">
                                <label for="direccion">Direccion</label>
                                <input type="text" id="txtdireccion" name="txtdireccion" class="form-control"
                                    value="<?php echo $proveedoredit->direccion ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group <?php echo !empty(form_error('txttelefono')) ? 'has-erro' : ''; ?>">
                                <label for="telefono">Telefono</label>
                                <input type="text" id="txttelefono" name="txttelefono" class="form-control"
                                    value="<?php echo $proveedoredit->telefono ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div
                                class="form-group <?php echo ($proveedoredit->estado == 1) ? "has-success" : "has-error"; ?>">
                                <label for="estado">Estado</label>
                                <select name="txtestado" id="txtestado" class="form-control" required>
                                    <option value="1" <?php if ($proveedoredit->estado == 1)
                                        echo 'selected'; ?>>Activo
                                    </option>
                                    <option value="2" <?php if ($proveedoredit->estado == 2)
                                        echo 'selected'; ?>>Desactivo
                                    </option>
                                </select>
                            </div>
                            <div class="from-group">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
</div>
<!-- /.box -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    var selectElement = document.getElementById("txtestado");

    selectElement.addEventListener("change", function () {
        if (selectElement.value === "1") {
            selectElement.parentNode.classList.remove("has-error");
            selectElement.parentNode.classList.add("has-success");
        } else if (selectElement.value === "2") {
            selectElement.parentNode.classList.remove("has-success");
            selectElement.parentNode.classList.add("has-error");
        }
    });

</script>