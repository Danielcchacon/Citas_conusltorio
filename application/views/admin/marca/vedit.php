<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <a href="<?php echo base_url(); ?>mantnimiento/cmarca/">marca</a>
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
                    <form action="<?php echo base_url(); ?>mantenimiento/cmarca/cupdate" method="POST">
                    <input type="hidden" value="<?php echo $marcaedit->idmarca?>" id="txtidmarca" name="txtidmarca">
                        
                    <!-- <div class="form-group < ? php echo !empty(form_error('txtcodigo'))? 'has-error' : '';?>">
                            <label for="codigo">Código</label>
                            <input type="text"
                                id="txtcodigo" 
                                name="txtcodigo" 
                                class="form-control"
                                value="< ?php echo !empty(form_error('txtcodigo')) ? set_value('txtcodigo'):$marcaedit->codigo ?>"
                                onblur="this.value=this.value.toUpperCase();">
                            < ?php echo form_error('txtcodigo', '<span class="help-block">', '</span>') ?>
                        </div> -->

                        
                        <div class="form-group <?php echo !empty(form_error('txtnombre'))? 'has-erro' : '';?>">
                            <label for="codigo">Nombre</label>
                            <input type="text" id="txtnombre" name="txtnombre" class="form-control"
                            value="<?php echo $marcaedit->nombre?>"    
                            onblur="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group <?php echo !empty(form_error('txtdescripcion'))? 'has-erro' : '';?>">
                            <label for="codigo">Descripción</label>
                            <input type="text" id="txtdescripcion" name="txtdescripcion" class="form-control"
                            value="<?php echo $marcaedit->descripcion?>"    
                            onblur="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group <?php echo ($marcaedit->estado == 1)? "has-success":"has-error";?>">
                        <label for="estado">Estado</label>
                        <select name="txtestado" id="txtestado" class="form-control" required>
                            <option value="1" <?php if($marcaedit->estado == 1) echo 'selected';?>>Activo</option>
                            <option value="2" <?php if($marcaedit->estado == 2) echo 'selected';?>>Desactivo</option>
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
<script  type="text/javascript">
    var selectElement = document.getElementById("txtestado");

    selectElement.addEventListener("change", function() {
        if (selectElement.value === "1") {
            selectElement.parentNode.classList.remove("has-error");
            selectElement.parentNode.classList.add("has-success");
        } else if (selectElement.value === "2") {
            selectElement.parentNode.classList.remove("has-success");
            selectElement.parentNode.classList.add("has-error");
        }
    });

</script>