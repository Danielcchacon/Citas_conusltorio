<style>

/* Asegúrate de que este CSS está siendo aplicado */
.is-invalid {
    border-color: #dc3545; /* Rojo para campos inválidos */
}

.invalid-feedback {
    color: #dc3545;
    display: block; /* Asegúrate de que el mensaje de error sea visible */
}

</style>
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
                                <p><?php echo $this->session->flashdata('error'); ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <form action="<?php echo base_url(); ?>mantenimiento/cusuarios/cupdate" method="POST">
                            <input type="hidden" value="<?php echo $usuariosedit->usuario_id; ?>" id="txtidusuarios" name="txtidusuarios">

                            <div class="form-group <?php echo form_error('txtnombre') ? 'is-invalid' : ''; ?>">
    <label for="txtnombre">Nombre</label>
    <input type="text" id="txtnombre" name="txtnombre" class="form-control"
        value="<?php echo set_value('txtnombre', $usuariosedit->nombres_usuario); ?>"
        onblur="this.value=this.value.toUpperCase();">
    <?php echo form_error('txtnombre', '<div class="invalid-feedback">', '</div>'); ?>
</div>

<div class="form-group <?php echo form_error('txtapellido') ? 'is-invalid' : ''; ?>">
    <label for="txtapellido">Apellido</label>
    <input type="text" id="txtapellido" name="txtapellido" class="form-control"
        value="<?php echo set_value('txtapellido', $usuariosedit->apellidos_usuario); ?>"
        onblur="this.value=this.value.toUpperCase();">
    <?php echo form_error('txtapellido', '<div class="invalid-feedback">', '</div>'); ?>
</div>

<div class="form-group <?php echo form_error('txtdocumento') ? 'is-invalid' : ''; ?>">
    <label for="txtdocumento">Documento</label>
    <input type="text" id="txtdocumento" name="txtdocumento" class="form-control"
        value="<?php echo set_value('txtdocumento', $usuariosedit->documento_usuario); ?>"
        onblur="this.value=this.value.toUpperCase();">
    <?php echo form_error('txtdocumento', '<div class="invalid-feedback">', '</div>'); ?>
</div>

<div class="form-group <?php echo form_error('txttelefono') ? 'is-invalid' : ''; ?>">
    <label for="txttelefono">Telefono</label>
    <input type="text" id="txttelefono" name="txttelefono" class="form-control"
        value="<?php echo set_value('txttelefono', $usuariosedit->telefono_usuario); ?>"
        onblur="this.value=this.value.toUpperCase();">
    <?php echo form_error('txttelefono', '<div class="invalid-feedback">', '</div>'); ?>
</div>

<div class="form-group <?php echo form_error('txtcorreo') ? 'is-invalid' : ''; ?>">
    <label for="txtcorreo">Correo</label>
    <input type="text" id="txtcorreo" name="txtcorreo" class="form-control"
        value="<?php echo set_value('txtcorreo', $usuariosedit->correo_usuario); ?>"
        onblur="this.value=this.value.toUpperCase();">
    <?php echo form_error('txtcorreo', '<div class="invalid-feedback">', '</div>'); ?>
</div>

<div class="form-group <?php echo form_error('txtrol') ? 'is-invalid' : ''; ?>">
    <label for="txtrol">ROL</label>
    <select name="txtrol" id="txtrol" class="form-control selectpicker" data-live-search="true">
        <option value=''>Seleccione</option>
        <?php foreach ($tipo_usuariocombo as $atributos): ?>
            <option value="<?php echo $atributos->tipo_usuario_id; ?>" <?php echo $atributos->tipo_usuario_id == $usuariosedit->tipo_usuario ? 'selected' : ''; ?>>
                <?php echo $atributos->descripcion_tipo_usuario; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label for="txtfecharegistro">Fecha de Registro</label>
    <input type="text" id="txtfecharegistro" name="txtfecharegistro" class="form-control"
        value="<?php echo set_value('txtfecharegistro', $usuariosedit->fecha_usuario); ?>"
        readonly>
</div>

<div class="form-group <?php echo form_error('txtcontrasena') ? 'is-invalid' : ''; ?>">
    <label for="txtcontrasena">Contraseña</label>
    <input type="password" id="txtcontrasena" name="txtcontrasena" class="form-control"
        value="<?php echo set_value('txtcontrasena'); ?>"
        onblur="this.value=this.value.toUpperCase();">
    <?php echo form_error('txtcontrasena', '<div class="invalid-feedback">', '</div>'); ?>
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
<!--
