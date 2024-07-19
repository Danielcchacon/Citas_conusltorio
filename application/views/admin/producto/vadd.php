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
                            <p><?php echo $this->session->flashdata('error') ?></p>
                            </div> 
                    <?php endif; ?>
                    <form action="<?php echo base_url(); ?>mantenimiento/cproducto/cinsert" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group <?php echo !empty(form_error('txtcategoria')) ? 'has-erro' : ''; ?>">
                                <label for="documento">Categoria</label>
                                <select name="txtcategoria" id="txtcategoria"
                                    class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php foreach ($cataegoriacombo as $atributos): ?>
                                        <option value="<?php echo $atributos->idcategoria ?>">
                                            <?php echo $atributos->nombre ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txttipo_material')) ? 'has-erro' : ''; ?>">
                                <label for="documento">Tipo material</label>
                                <select name="txttipo_material" id="txttipo_material"
                                    class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php foreach ($tipo_materialcombo as $atributos): ?>
                                        <option value="<?php echo $atributos->idtipo_material ?>">
                                            <?php echo $atributos->nombre ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('txtmarca')) ? 'has-erro' : ''; ?>">
                                <label for="documento">Marca</label>
                                <select name="txtmarca" id="txtmarca"
                                    class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php foreach ($marcacombo as $atributos): ?>
                                        <option value="<?php echo $atributos->idmarca ?>">
                                            <?php echo $atributos->nombre ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('txtunmedida')) ? 'has-erro' : ''; ?>">
                                <label for="documento">Unidad de Medidad</label>
                                <select name="txtunmedida" id="txtunmedida"
                                    class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php foreach ($unmedidacombo as $atributos): ?>
                                        <option value="<?php echo $atributos->idunmedida ?>">
                                            <?php echo $atributos->nombre ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('txtcolor')) ? 'has-erro' : ''; ?>">
                                <label for="documento">Color</label>
                                <select name="txtcolor" id="txtcolor"
                                    class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php foreach ($colorcombo as $atributos): ?>
                                        <option value="<?php echo $atributos->idcolor ?>">
                                            <?php echo $atributos->nombre ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                        <div class="form-group <?php echo !empty(form_error('txtcodigo'))? 'has-error' : '';?>">
                            <label for="codigo">Código</label>
                            <input type="text" id="txtcodigo" name="txtcodigo" class="form-control"
                                value="<?php echo set_value('txtcodigo')?>"
                                onblur="this.value=this.value.toUpperCase();">
                            <?php echo form_error('txtcodigo', '<span class="help-block">', '</span>') ?>
                        </div>

                        <div class="form-group <?php echo !empty(form_error('txtnombre'))? 'has-erro' : '';?>">
                            <label for="codigo">Nombre</label>
                            <input type="text" id="txtnombre" name="txtnombre" class="form-control"
                            value="<?php echo set_value('txtnombre')?>"    
                            onblur="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group <?php echo !empty(form_error('txtdescripcion'))? 'has-erro' : '';?>">
                            <label for="codigo">Descripción</label>
                            <input type="text" id="txtdescripcion" name="txtdescripcion" class="form-control"
                            value="<?php echo set_value('txtdescripcion')?>"    
                            onblur="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group <?php echo !empty(form_error('txtprecio'))? 'has-erro' : '';?>">
                            <label for="codigo">Precio</label>
                            <input type="text" id="txtprecio" name="txtprecio" class="form-control"
                            value="<?php echo set_value('txtprecio')?>"    
                            onblur="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group <?php echo !empty(form_error('txtobservacion'))? 'has-erro' : '';?>">
                            <label for="codigo">Observacion</label>
                            <input type="text" id="txtobservacion" name="txtobservacion" class="form-control"
                            value="<?php echo set_value('txtobservacion')?>"    
                            onblur="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" id="txtimagen" name="txtimagen" class="form-control">
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