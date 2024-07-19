<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <a href="<?php echo base_url(); ?>mantnimiento/ctipo_documento/">tipo_documento</a>
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
                    <form action="<?php echo base_url(); ?>mantenimiento/ctipo_documento/cinsert" method="POST">
                    
                     

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