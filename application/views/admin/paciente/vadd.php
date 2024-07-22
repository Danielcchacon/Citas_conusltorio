<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <a href="#">Paciente</a>
            <small>Agregar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url(); ?>mantenimiento/cpaciente/cinsert" method="POST"> 

                            <div class="form-group <?php echo !empty(form_error('txtnombre')) ? 'is-invalid' : ''; ?>">
                                <label for="txtnombre">Nombre</label>
                                <input type="text" id="txtnombre" name="txtnombre" class="form-control"
                                    value="<?php echo set_value('txtnombre'); ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtnombre', '<div class="invalid-feedback">', '</div>'); ?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtapellido')) ? 'is-invalid' : ''; ?>">
                                <label for="txtapellido">Apellido</label>
                                <input type="text" id="txtapellido" name="txtapellido" class="form-control"
                                    value="<?php echo set_value('txtapellido'); ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtapellido', '<div class="invalid-feedback">', '</div>'); ?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtdocumento')) ? 'is-invalid' : ''; ?>">
                                <label for="txtdocumento">Documento</label>
                                <input type="text" id="txtdocumento" name="txtdocumento" class="form-control"
                                    value="<?php echo set_value('txtdocumento'); ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtdocumento', '<div class="invalid-feedback">', '</div>'); ?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txttelefono')) ? 'is-invalid' : ''; ?>">
                                <label for="txttelefono">Teléfono</label>
                                <input type="text" id="txttelefono" name="txttelefono" class="form-control"
                                    value="<?php echo set_value('txttelefono'); ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txttelefono', '<div class="invalid-feedback">', '</div>'); ?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtcorreo')) ? 'is-invalid' : ''; ?>">
                                <label for="txtcorreo">Correo</label>
                                <input type="text" id="txtcorreo" name="txtcorreo" class="form-control"
                                    value="<?php echo set_value('txtcorreo'); ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtcorreo', '<div class="invalid-feedback">', '</div>'); ?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txteps')) ? 'is-invalid' : ''; ?>">
                                <label for="txteps">EPS</label>
                                <select name="txteps" id="txteps" class="form-control selectpicker" data-live-search="true">
                                    <option value="">Seleccione EPS</option>
                                    <?php foreach ($eps_pacientecombo as $atributos): ?>
                                        <option value="<?php echo $atributos->eps_id; ?>"
                                            <?php echo set_select('txteps', $atributos->eps_id); ?>>
                                            <?php echo $atributos->nombre_eps; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('txteps', '<div class="invalid-feedback">', '</div>'); ?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtregimen')) ? 'is-invalid' : ''; ?>">
                                <label for="txtregimen">Regimen</label>
                                <select name="txtregimen" id="txtregimen" class="form-control selectpicker" data-live-search="true">
                                    <option value="">Seleccione Regimen</option>
                                    <?php foreach ($tipo_regimencombo as $atributos): ?>
                                        <option value="<?php echo $atributos->tipo_regimen_id; ?>"
                                            <?php echo set_select('txtregimen', $atributos->tipo_regimen_id); ?>>
                                            <?php echo $atributos->descripcion_tipo_regimen; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('txtregimen', '<div class="invalid-feedback">', '</div>'); ?>
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
