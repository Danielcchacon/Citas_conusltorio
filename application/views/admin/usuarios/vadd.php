<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <a href="<?php echo base_url(); ?>mantenimiento/cusuarios/">usuarios</a>
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

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <p>
                                    <?php echo $this->session->flashdata('error') ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo base_url(); ?>mantenimiento/cusuarios/cinsert" method="POST">
                            <!-- Campo oculto eliminado porque no se necesita para agregar -->

                            <div class="form-group <?php echo !empty(form_error('txtnombre')) ? 'is-invalid' : ''; ?>">
                                <label for="txtnombre">Nombre </label>
                                <input type="text" id="txtnombre" name="txtnombre" class="form-control"
                                    value="<?php echo set_value('txtnombre'); ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtnombre', '<div class="invalid-feedback">', '</div>') ?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtapellido')) ? 'is-invalid' : ''; ?>">
                                <label for="txtapellido">Apellido </label>
                                <input type="text" id="txtapellido" name="txtapellido" class="form-control"
                                    value="<?php echo set_value('txtapellido'); ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtapellido', '<div class="invalid-feedback">', '</div>') ?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtdocumento')) ? 'is-invalid' : ''; ?>">
                                <label for="txtdocumento">Documento</label>
                                <input type="text" id="txtdocumento" name="txtdocumento" class="form-control"
                                    value="<?php echo set_value('txtdocumento'); ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtdocumento', '<div class="invalid-feedback">', '</div>') ?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txttelefono')) ? 'is-invalid' : ''; ?>">
                                <label for="txttelefono">Telefono </label>
                                <input type="text" id="txttelefono" name="txttelefono" class="form-control"
                                    value="<?php echo set_value('txttelefono'); ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txttelefono', '<div class="invalid-feedback">', '</div>') ?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtcorreo')) ? 'is-invalid' : ''; ?>">
                                <label for="txtte">Correo </label>
                                <input type="text" id="txtcorreo" name="txtcorreo" class="form-control"
                                    value="<?php echo set_value('txtcorreo'); ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtcorreo', '<div class="invalid-feedback">', '</div>') ?>
                            </div>

                            <div class="form-group <?php echo !empty(form_error('txtrol')) ? 'has-error' : ''; ?>">
                                <label for="txtrol">ROL</label>
                                <select name="txtrol" id="txtrol" class="form-control selectpicker" data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php foreach ($tipo_usuariocombo as $atributos): ?>
                                        <option value="<?php echo $atributos->tipo_usuario_id ?>"><?php echo $atributos->descripcion_tipo_usuario ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>

                           

                            <div class="form-group <?php echo !empty(form_error('txtcontraseña')) ? 'is-invalid' : ''; ?>">
                                <label for="txtcontraseña">Contraseña </label>
                                <input type="text" id="txtcontraseña" name="txtcontraseña" class="form-control"
                                    value="<?php echo set_value('txtcontraseña'); ?>"
                                    onblur="this.value=this.value.toUpperCase();">
                                <?php echo form_error('txtcontraseña', '<div class="invalid-feedback">', '</div>') ?>
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


        var isValid = true;
        var fields = ["txtnombre", "txtapellido", "txtdocumento", "txttelefono", "txteps", "txtcontraseña"];
        var fieldNames = {
            "txtnombre": "Nombre",
            "txtapellido": "Apellido",
            "txtdocumento": "Documento",
            "txttelefono": "Correo",
            "txteps": "ROL",
            "txtcontraseña": "Contraseña"
        };
        fields.forEach(function(field) {
            var input = document.getElementById(field);
            if (!input.value.trim()) {
                isValid = false;
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El campo ' + fieldNames[field] + ' es obligatorio',
                });
                event.preventDefault(); // Previene el envío del formulario
                return false; // Rompe el bucle
            }
        });
        return isValid; //
    });
</script>
