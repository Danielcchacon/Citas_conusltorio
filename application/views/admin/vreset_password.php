<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>CheckoutPlus</title>
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/CSS_loginUsuarios.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
</head>

<body>
    <!--nav_title-->
    <div class="nav1">
        <div class="nav">
            <P>C</P>
            <P>h</P>
            <P>e</P>
            <P>c</P>
            <P>k</P>
            <P>o</P>
            <P>u</P>
            <P>t</P>
            <P>P</P>
            <P>l</P>
            <P>u</P>
            <P>s</P>
        </div>
        <div class="nav2">
            <div class="dark-mode-toggle">
                <input type="checkbox" class="toggle-checkbox" id="darkModeToggle">
                <label class="toggle-label" for="darkModeToggle">
                    <span class="toggle-button"></span>
                </label>
            </div>
        </div>
    </div>

    <div class="cont_principal">
        <div class="master">
            <div class="wrapper fadeInDown">
                <div id="formContent">
                    <h2 id="loginTab" class="active underlineHover2"> Ingresa tu nueva contraseña </h2>

                    <div class="fadeIn first">
                        <img src="<?php echo base_url(); ?>assets/template/img/CheckoutPlus2.svg" id="icon" alt="User Icon">
                    </div>

                    <?php echo form_open('clogin/processResetPassword'); ?>


                    <?php if ($this->session->flashdata('success')): ?>
                        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script>
                            Swal.fire({
                                title: 'Exitoso',
                                text: '<?php echo $this->session->flashdata('success'); ?>',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 4000,
                                customClass: {
                                    content: 'small-sweetalert'
                                }
                            });
                        </script>
                        <style>
                            .small-sweetalert {
                                font-size: 14px;
                            }
                        </style>
                    <?php endif; ?>

                    <!-- Mostrar mensajes de error o éxito -->
                    <?php if ($this->session->flashdata('error')): ?>
                        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                        <script>
                            Swal.fire({
                                title: 'Error',
                                text: '<?php echo $this->session->flashdata('error'); ?>',
                                icon: 'error',
                                showConfirmButton: false, 
                                timer: 4000, 
                                customClass: {
                                    content: 'small-sweetalert'
                                }
                            });
                        </script>
                        <style>
                            .small-sweetalert {
                                font-size: 14px;
                            }
                        </style>
                    <?php endif; ?>

                  
                    <!-- Agregar campos del formulario -->
                    <input type="hidden" name="token" value="<?php echo $token; ?>">
                    <input type="text" id="login" class="fadeIn second" name="txtnombre" placeholder="Contraseña">
                    <input type="password" id="password" class="fadeIn third" name="txtpass" placeholder="Confirmar Contraseña">
                    <input type="submit" class="fadeIn fourth" value="Restablecer Contraseña">

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/template/js/Js_formulario.js"></script>
</body>

</html>
