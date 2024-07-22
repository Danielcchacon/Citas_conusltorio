
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <a href="<?php echo base_url(); ?>mantenimiento/cpaciente/">Paciente</a>
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
                        
                        <form action="<?php echo base_url(); ?>mantenimiento/cpaciente/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $pacienteedit->paciente_id ?>" id="txtidpaciente" name="txtidpaciente">


                            <div class="form-group <?php echo !empty(form_error('txtnombre')) ? 'is-invalid' : ''; ?>">
                                <label for="txtnombre">Nombre </label>
                                <input type="text" id="txtnombre" name="txtnombre" class="form-control"
                                    value="<?php echo !empty(form_error('txtnombre')) ? set_value('txtnombre') : $pacienteedit->nombres_paciente ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtnombre', '<div class="invalid-feedback">', '</div>') ?>
                            </div>

                         

                            <div class="form-group <?php echo !empty(form_error('txtapellido')) ? 'is-invalid' : ''; ?>">
                                <label for="txtapellido">Apellido </label>
                                <input type="text" id="txtapellido" name="txtapellido" class="form-control"
                                    value="<?php echo !empty(form_error('txtapellido')) ? set_value('txtapellido') : $pacienteedit->apellidos_paciente ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtapellido', '<div class="invalid-feedback">', '</div>') ?>
                            </div>
                            

                            <div class="form-group <?php echo !empty(form_error('txtdocumento')) ? 'is-invalid' : ''; ?>">
                                <label for="txtdocumento">Documento</label>
                                <input type="text" id="txtdocumento" name="txtdocumento" class="form-control"
                                    value="<?php echo !empty(form_error('txtdocumento')) ? set_value('txtdocumento') : $pacienteedit->documento_paciente ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtdocumento', '<div class="invalid-feedback">', '</div>') ?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtcorreo')) ? 'is-invalid' : ''; ?>">
                                <label for="txtcorreo">Correo </label>
                                <input type="text" id="txtcorreo" name="txtcorreo" class="form-control"
                                    value="<?php echo !empty(form_error('txtcorreo')) ? set_value('txtcorreo') : $pacienteedit->correo_paciente ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtcorreo', '<div class="invalid-feedback">', '</div>') ?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txttelefono')) ? 'is-invalid' : ''; ?>">
                                <label for="txttelefono">Telefono </label>
                                <input type="text" id="txttelefono" name="txttelefono" class="form-control"
                                    value="<?php echo !empty(form_error('txttelefono')) ? set_value('txttelefono') : $pacienteedit->telefono_paciente ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txttelefono', '<div class="invalid-feedback">', '</div>') ?>
                            </div>
                            
                            <div class="form-group <?php echo !empty(form_error('txteps')) ? 'has-erro' : ''; ?>">
                                <label for="documento">EPS</label>
                                <select name="txteps" id="txteps" class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php foreach ($eps_pacientecombo as $atributos): ?>
                                        <?php if($atributos->eps_id == $pacienteedit->eps_paciente): ?>
                                        <option value="<?php echo $atributos->eps_id ?>"selected><?php echo $atributos->nombre_eps ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo $atributos->eps_id ?>"><?php echo $atributos->nombre_eps?></option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('txtregimen')) ? 'has-erro' : ''; ?>">
                                <label for="txtregimen">Regimen</label>
                                <select name="txtregimen" id="txtregimen" class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php foreach ($tipo_regimencombo as $atributos): ?>
                                        <?php if($atributos->tipo_regimen_id == $pacienteedit->tipo_paciente): ?>
                                        <option value="<?php echo $atributos->tipo_regimen_id ?>"selected><?php echo $atributos->descripcion_tipo_regimen ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo $atributos->tipo_regimen_id ?>"><?php echo $atributos->descripcion_tipo_regimen ?></option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </select>
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
