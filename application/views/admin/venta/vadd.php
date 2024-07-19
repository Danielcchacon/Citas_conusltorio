<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <a href="<?php echo base_url(); ?>mantenimiento/ccolor">Venta<i class="fa fa-shopping-cart"></i></a>
            <small></small>
        </h1>
    </section>
    <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <form action="">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombre">Comprobante</label>
                                <select name="txtidtipo_comprobante" id="txtidtipo_comprobante"
                                    class="form-control selectpicker" data-live-search="true">

                                    <option value=" ">Seleccione</option>
                                    <?php
                                    foreach ($tipo_comprobantecombo as $atributos): ?>
                                        <?php $datacomprobante = $atributos->idtipo_comprobante . "*" . $atributos->cantidad . "*" . $atributos->iva . "*" . $atributos->serie ?>
                                        <option value="<?php echo $datacomprobante ?>">
                                            <?php echo $atributos->nombre . '= ' . $atributos->nombre ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                                <input type="hidden" name="txtidtipo_comprobante" id="txtidtipo_comprobante">
                                <!-- <input type="hidden" name="txtiva" id="txtiva"> -->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombre">Serie:</label>
                                <input type="text" class="form-control " name="txtserie" id="txtserie">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombre">Número:</label>
                                <input type="text" class="form-control" name="txtnum_documento" id="txtnum_documento">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nombre">Fecha:</label>
                                <input type="date" class="form-control" name="txtfecha" id="txtfecha">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Cliente:</label>
                                <select name="txtcliente" id="txtcliente" class="form-control selectpicker"
                                    data-live-search="true" required>
                                    <option value="">Seleccione</option>
                                    <?php foreach ($clientecombo as $atributos): ?>

                                        <option value="<?php echo $atributos->idcliente ?>">
                                            <?php echo $atributos->nombre . '= ' . $atributos->nombre ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nombre">Producto:</label>
                                <select name="txtproducto" id="txtproducto" class="form-control selectpicker"
                                    data-live-search="true">
                                    <option value=' '>Seleccione</option>
                                    <?php
                                    foreach ($productocombos as $atributos): ?>
                                        <?php $datacomprobanteselcte = $atributos->idtipo_comprobante . "*" . $atributos->cantidad . "*" . $atributos->iva . "*" . $atributos->serie ?>

                                        <option value="<?php echo $datacomprobanteselcte ?>">
                                            <?php echo $atributos->nombre . '= ' . $atributos->nombre ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">&nbsp;</label>
                                <button id="btn-agregar" type="button" class="btn btn-primary btn-flat btn-block">
                                    <span class="fa fa-plus"></span> Agregar
                                </button>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">&nbsp;</label>
                                <button type="button" class="btn btn-info btn-flat btn-block" data-toggle="modal"
                                    data-target="#modal-default">
                                    <span class="fa fa-search"></span> Buscar
                                </button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="detventas" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td>Codigo</td>
                                            <td>Nombre</td>
                                            <td>Imagen</td>
                                            <td>U.Medida</td>
                                            <td>Precio venta</td>
                                            <td>Stock</td>
                                            <td>Cantidad</td>
                                            <td>Importe</td>
                                            <td>X</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Contenido de la tabla -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Subtotal</span>
                                    <input type="text" class="form-control" placeholder="0.00" name="txtsubtotal">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">IVA</span>
                                    <input type="text" id="txtiva" class="form-control" placeholder="0.00"
                                        name="txtiva">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Total</span>
                                    <input type="text" class="form-control" placeholder="0.00" name="txttotal">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Lista de productos</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">

                    <table id="table" class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>stock</th>
                                <th>Estado</th>
                                <th>foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($productocombos)): ?>
                                <?php foreach ($productocombos as $atributos): ?>
                                    <tr>
                                        <?php $dataproducto = $atributos->idproducto . "*" . $atributos->codigo . "*" . $atributos->nombre . "*" . $atributos->imagen . "*" . $atributos->unmedida . "*" . $atributos->precio . "*" . $atributos->stock; ?>
                                        <td>
                                            <button type="button" class="btn btn-success btn-addp"
                                                value="<?php echo $dataproducto; ?>">
                                                <span class="fa fa-check"></span>
                                            </button>

                                        </td>
                                        <td>
                                            <?php echo $atributos->codigo; ?>
                                        </td>
                                        <td>
                                            <?php echo $atributos->nombre; ?>
                                        </td>

                                        <td>
                                            <?php echo $atributos->precio; ?>
                                        </td>
                                        <?php
                                        $stockValue = (int) $atributos->stock; // Convertir el valor del stock a entero
                                
                                        if ($stockValue == 0) {
                                            $style = 'style="background-color: #f2dede; border-left: 5px solid #c23321; vertical-align: center;"';
                                        } elseif ($stockValue < 0 || $stockValue <= 10) {
                                            $style = 'style="background-color: #faf2cc; border-left: 5px solid #f0ad4e; vertical-align: center;"';
                                        } else {
                                            $style = 'style="background-color: #dff0d8; border-left: 5px solid #4cae4c; vertical-align: center;"';
                                        }

                                        echo "<td $style> $stockValue</td>";
                                        ?>


                                        <?php
                                        if ($atributos->estado == 1) {
                                            $style = 'class="label label-success"';
                                            echo "<td><p><span $style><font style='vertical-align: inherit;'>Activo</font></span></p></td>";
                                        } else {
                                            $style = 'class="label label-danger"';
                                            echo "<td><p><span $style><font style='vertical-align: inherit;'>Desactivo</font></span></p></td>";
                                        }

                                        ?>
                                        <?php $data = $atributos->idproducto . "*" . $atributos->nombre . "*" . $atributos->codigo . "*" . $atributos->descripcion . "*" . $atributos->precio . "*" . $atributos->stock . "*" . $atributos->imagen; ?>
                                        <td>


                                            <a href='<?php echo base_url() ?>uploads/productos/<?php echo $atributos->imagen; ?>'
                                                data-lightbox='img' data-title='mication'>
                                                <img style='width: 90%;'
                                                    src='<?php echo base_url() ?>uploads/productos/<?php echo $atributos->imagen; ?>'
                                                    alt='' data-lightbox='img' data-title='mication'>
                                            </a>
                        </div>

                        </td>
                        </tr>

                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                </table>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="modal-default1">
    <div class="modal-dialog modal-lg"> <!-- Clase "modal-lg" para un modal más grande, si es necesario -->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> <!-- Usando el icono "x" de Bootstrap -->
                </button>
                <h4 class="modal-title">INFORMACIÓN DE CATEGORÍA</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script type="text/javascript">

    function generarNumero(numero) {
        console.log("Número original:", numero);

        if (numero >= 99999 && numero < 999999) {
            console.log("Caso 1");
            return Number(numero) + 1;
        } else if (numero >= 9999 && numero < 99999) {
            console.log("Caso 2");
            return "0" + (Number(numero) + 1);
        } else if (numero >= 999 && numero < 9999) {
            console.log("Caso 3");
            return "00" + (Number(numero) + 1);
        } else if (numero >= 99 && numero < 999) {
            console.log("Caso 4");
            return "000" + (Number(numero) + 1);
        } else if (numero >= 9 && numero < 99) {
            console.log("Caso 5");
            return "0000" + (Number(numero) + 1);
        } else if (numero < 9) {
            console.log("Caso 6");
            return "00000" + (Number(numero) + 1);
        }
    }

    // Ejemplo de uso:
    $("#txtidtipo_comprobante").on("change", function () {
        var option = $(this).val();
        if (option != "") {
            var atributos = option.split("*");
            $("#txtidtipo_comprobante").val(atributos[0]);
            $("#txtiva").val(atributos[2] + '%');
            $("#txtserie").val(atributos[3]);
            $("#txtnum_documento").val(generarNumero(atributos[1]) + "F");
        } else {
            $("#txttipo_comprobantes").val(null);
            $("#txtiva").val(null);
            $("#txtserie").val(null);
            $("#txtnum_documento").val(null);

        }
    });
    $(".btn-addp").on("click", function () {
        var dataproducto = $(this).val();
        // alert(dataproducto)
        var dtproducto = dataproducto.split("*");
        tabledt = "<tr>";
        tabledt += "<td><input type='hidden' name='txtidproducto[]' id='txtidproducto' value='" + dtproducto[0] + "'>" + dtproducto[1] + "</td>";
        tabledt += "<td>" + dtproducto[2] + "</td>";
        tabledt += "<td><a href='" + base_url + "uploads/productos/" + dtproducto[3] + "' class='img-thumbnail' alt='Cinque Terre' width='50px' height='50px'></a></td>";
        tabledt += "<td><i class='fa fa-fw fa qrcode'></i>" + dtproducto[4] + "</td>";
        tabledt += "<td><input type='hidden' name='txtprecio[]' id='txtprecio' value='" + dtproducto[5] + "'>" + dtproducto[5] + "</td>";
        tabledt += "<td>" + dtproducto[6] + "</td>";
        tabledt += "<td><input type='number' name='txtcantidad[]' id='txtcantidad' style='min-width: 70px; width: 74px;' class='cantidades' value='1'></td>";
        tabledt += "<td><input type='hidden' name='txtimporte[]' id='txtimporte' value=' 00.0 '><p> 00.0 </p></td>";
        tabledt += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
        tabledt += "</tr>";
        $("#detventas tbody").append(tabledt);
    });
    $("txtproducto").on("change", function () {

        var option = $(this).val();
        $("#btn-agregar").val(option);

    })
    $("#btn-agregar").on("click", function () {
        var dataproducto = $(this).val();
        // alert(dataproducto)
        var dtproducto = dataproducto.split("*");
        tabledt = "<tr>";
        tabledt += "<td><input type='hidden' name='txtidproducto[]' id='txtidproducto' value='" + dtproducto[0] + "'>" + dtproducto[1] + "</td>";
        tabledt += "<td>" + dtproducto[2] + "</td>";
        tabledt += "<td><a href='" + base_url + "uploads/productos/" + dtproducto[3] + "' class='img-thumbnail' alt='Cinque Terre' width='50px' height='50px'></a></td>";
        tabledt += "<td><i class='fa fa-fw fa qrcode'></i>" + dtproducto[4] + "</td>";
        tabledt += "<td><input type='hidden' name='txtprecio[]' id='txtprecio' value='" + dtproducto[5] + "'>" + dtproducto[5] + "</td>";
        tabledt += "<td>" + dtproducto[6] + "</td>";
        tabledt += "<td><input type='number' name='txtcantidad[]' id='txtcantidad' style='min-width: 70px; width: 74px;' class='cantidades' value='1'></td>";
        tabledt += "<td><input type='hidden' name='txtimporte[]' id='txtimporte' value=' 00.0 '><p> 00.0 </p></td>";
        tabledt += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
        tabledt += "</tr>";
        $("#detventas tbody").append(tabledt);
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.btn-view').on('click', function () {
            var boton = $(this).val();
            console.log("entre jquery");
            var info = boton.split("*");
            var resp = "<a href='<?php echo base_url() ?>uploads/productos/" + info[6] + "' data-lightbox='img' data-title='mication'><img  style = 'width: 100%;' src='<?php echo base_url() ?>uploads/productos/" + info[6] + "' alt='' data-lightbox='img' data-title='mication'></a>";

            $("#modal-default .modal-body").html(resp);
        });
    });
</script>
<img src="" alt="">