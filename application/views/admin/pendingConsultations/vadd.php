<div class="content-wrapper">
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

                            <div class="form-group">
                                <label for="txtnombre">Nombre</label>
                                <input type="text" id="txtnombre" name="txtnombre" class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>

                            <div class="form-group">
                                <label for="txtapellido">Apellido</label>
                                <input type="text" id="txtapellido" name="txtapellido" class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>

                            <div class="form-group">
                                <label for="txtdocumento">Documento</label>
                                <input type="text" id="txtdocumento" name="txtdocumento" class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>

                            <div class="form-group">
                                <label for="txttelefono">Teléfono</label>
                                <input type="text" id="txttelefono" name="txttelefono" class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txteps')) ? 'has-erro' : ''; ?>">
                                <label for="documento">EPS</label>
                                <select name="txteps" id="txteps" class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione EPS</option>
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
                                    <option value=' '>Seleccione Regimen</option>
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


