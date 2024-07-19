<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <a href="<?php echo base_url(); ?>mantnimiento/ccliente/">cliente</a>
            <small> Título</small>
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
                        <form action="<?php echo base_url(); ?>mantenimiento/ccliente/cinsert" method="POST">

                            <div class="form-group <?php echo !empty(form_error('txttipo_documento')) ? 'has-erro' : ''; ?>">
                                <label for="documento">Documento</label>
                                <select name="txttipo_documento" id="txttipo_documento"
                                    class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php foreach ($tipo_documentocombo as $atributos): ?>
                                        <option value="<?php echo $atributos->idtipo_documento ?>">
                                            <?php echo $atributos->nombre ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtcodigo')) ? 'has-error' : ''; ?>">
                                <label for="codigo">Código</label>
                                <input type="text" id="txtcodigo" name="txtcodigo" class="form-control"
                                    value="<?php echo set_value('txtcodigo') ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtcodigo', '<span class="help-block">', '</span>') ?>
                            </div>


                            <div class="form-group <?php echo !empty(form_error('txttipo_cliente')) ? 'has-erro' : ''; ?>">
                                <label for="tipo de cliente">tipo de cliente</label>
                                <select name="txttipo_cliente" id="txttipo_cliente" class="form-control selectpicker"
                                    data-live-search="true">
                                    <option value=''>Seleccione</option>
                                    <?php foreach ($tipo_clientecombo as $atributos): ?>
                                        <option value="<?php echo $atributos->idtipo_cliente ?>">
                                            <?php echo $atributos->nombre ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                                <?php echo form_error('txttipo_cliente', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('txtnombre')) ? 'has-erro' : ''; ?>">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="txtnombre" name="txtnombre" class="form-control"
                                    value="<?php echo set_value('txtnombre') ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group <?php echo !empty(form_error('txtdireccion')) ? 'has-erro' : ''; ?>">
                                <label for="direccion">Direccion</label>
                                <input type="text" id="txtdireccion" name="txtdireccion" class="form-control"
                                    value="<?php echo set_value('txtdireccion') ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtdireccion', '<span class="help-block">', '</span>') ?>
                            </div>
        

                            <div class="form-group <?php echo !empty(form_error('txttelefono')) ? 'has-error' : ''; ?>">
                                <label for="telefono">Telefono</label>
                                <input type="text" id="txttelefono" name="txttelefono" class="form-control"
                                    value="<?php echo set_value('txttelefono') ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txttelefono', '<span class="help-block">', '</span>') ?>
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