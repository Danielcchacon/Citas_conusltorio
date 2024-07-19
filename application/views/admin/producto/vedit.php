<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <a href="<?php echo base_url(); ?>mantnimiento/cproducto/">producto</a>
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

                        <form action="<?php echo base_url(); ?>mantenimiento/cproducto/cupdate" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $productoedit->idproducto ?>" id="txtidproducto"
                                name="txtidproducto">

                            <div class="form-group <?php echo !empty(form_error('txtcategoria')) ? 'has-erro' : ''; ?>">
                                <label for="documento">Categoria</label>
                                <select name="txtcategoria" id="txtcategoria" class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php foreach ($cataegoriacombo as $atributos): ?>
                                        <?php if($atributos->idcategoria == $productoedit->idcategoria): ?>
                                        <option value="<?php echo $atributos->idcategoria ?>"selected><?php echo $atributos->nombre ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo $atributos->idcategoria ?>"><?php echo $atributos->nombre ?></option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div
                                class="form-group <?php echo !empty(form_error('txttipo_material')) ? 'has-erro' : ''; ?>">
                                <label for="documento">Tipo material</label>
                                <select name="txttipo_material" id="txttipo_material" class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php foreach ($tipo_materialcombo as $atributos): ?>
                                        <?php if($atributos->idtipo_material == $productoedit->idtipo_material): ?>
                                        <option value="<?php echo $atributos->idtipo_material ?>"selected><?php echo $atributos->nombre ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo $atributos->idtipo_material ?>"><?php echo $atributos->nombre ?></option>
                                        <?php endif ?>
                                     <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtmarca')) ? 'has-erro' : ''; ?>">
                                <label for="documento">Marca</label>
                                <select name="txtmarca" id="txtmarca" class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php foreach ($marcacombo as $atributos): ?>
                                        <?php if($atributos->idmarca == $productoedit->idmarca): ?>
                                        <option value="<?php echo $atributos->idmarca ?>"selected><?php echo $atributos->nombre ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $atributos->idmarca ?>"><?php echo $atributos->nombre ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtunmedida')) ? 'has-erro' : ''; ?>">
                                <label for="documento">Unidad de Medidad</label>
                                <select name="txtunmedida" id="txtunmedida" class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php foreach ($unmedidacombo as $atributos): ?>
                                        <?php if($atributos->idunmedida == $productoedit->idunmedida): ?>
                                        <option value="<?php echo $atributos->idunmedida ?>" selected><?php echo $atributos->nombre ?></option>
                                       <?php else: ?>
                                        <option value="<?php echo $atributos->idunmedida ?>"><?php echo $atributos->nombre ?></option>
                                        <?php endif ?>
                                        <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtcolor')) ? 'has-erro' : ''; ?>">
                                <label for="documento">Color</label>
                                <select name="txtcolor" id="txtcolor" class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php foreach ($colorcombo as $atributos): ?>
                                        <?php if($atributos ->idcolor==$productoedit->idcolor): ?>
                                        <option value="<?php echo $atributos->idcolor ?>" selected><?php echo $atributos->nombre ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo $atributos->idcolor ?>"><?php echo $atributos->nombre ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>


                         







                            <div class="form-group <?php echo !empty(form_error('txtcodigo')) ? 'has-error' : ''; ?>">
                                <label for="codigo">Código</label>
                                <input type="text" id="txtcodigo" name="txtcodigo" class="form-control"
                                    value="<?php echo !empty(form_error('txtcodigo')) ? set_value('txtcodigo') : $productoedit->codigo ?>"
                                    onblur="this.value=this.value.toUpperCase();"
                                    readonly>
                                <?php echo form_error('txtcodigo', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('txtnombre')) ? 'has-erro' : ''; ?>">
                                <label for="codigo">Nombre</label>
                                <input type="text" id="txtnombre" name="txtnombre" class="form-control"
                                    value="<?php echo $productoedit->nombre ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div
                                class="form-group <?php echo !empty(form_error('txtdescripcion')) ? 'has-erro' : ''; ?>">
                                <label for="codigo">Descripción</label>
                                <input type="text" id="txtdescripcion" name="txtdescripcion" class="form-control"
                                    value="<?php echo $productoedit->descripcion ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group <?php echo !empty(form_error('txtprecio')) ? 'has-erro' : ''; ?>">
                                <label for="codigo">Precio</label>
                                <input type="text" id="txtprecio" name="txtprecio" class="form-control"
                                    value="<?php echo !empty(form_error('txtprecio')) ? set_value('txtprecio') : $productoedit->precio ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div
                                class="form-group <?php echo !empty(form_error('txtobservacion')) ? 'has-erro' : ''; ?>">
                                <label for="codigo">Observacion</label>
                                <input type="text" id="txtobservacion" name="txtobservacion" class="form-control"
                                    txtprecio
                                    value="<?php echo !empty(form_error('txtobservacion')) ? set_value('txtobservacion') : $productoedit->observacion ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" id="txtimagen" name="txtimagen" class="form-control">
                            </div>
                            <div
                                class="form-group <?php echo ($productoedit->estado == 1) ? "has-success" : "has-error"; ?>">
                                <label for="estado">Estado</label>
                                <select name="txtestado" id="txtestado" class="form-control" required>
                                    <option value="1" <?php if ($productoedit->estado == 1)
                                        echo 'selected'; ?>>Activo
                                    </option>
                                    <option value="2" <?php if ($productoedit->estado == 2)
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