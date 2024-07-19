<!DOCTYPE html>
<html lang="es">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Consultorio</title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?php echo base_url(); ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">


  <!-- Include SweetAlert CSS and JS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
</head>

<body style="background-color:#68B2CB" class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
        <form action="<?php echo base_url(); ?>clogin/clogeo" method="post" id="loginForm">
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

                        <?php if ($this->session->flashdata('success')): ?>
                            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                            <script>
                                Swal.fire({
                                    title: 'Registro Exitoso',
                                    text: '<?php echo $this->session->flashdata('success'); ?>',
                                    icon: 'success',
                                    showConfirmButton: false, // No mostrar botón OK
                                    timer: 4000, // Cerrar automáticamente después de 3 segundos
                                    customClass: {
                                        // No es necesario agregar una clase personalizada para cambiar el tamaño
                                        // Puedes ajustar el tamaño directamente aquí
                                        content: 'small-sweetalert'
                                    }
                                });
                            </script>
                            <style>
                                /* Estilo CSS personalizado para hacer que la alerta sea más pequeña */
                                .small-sweetalert {
                                    font-size: 14px;
                                    /* Tamaño de fuente personalizado */
                                }
                            </style>
                        <?php endif; ?>
            <h1><img style="border-radius:100px; " src="<?php echo base_url(); ?>assets/logo.jpg" alt=""></h1>
            <div>
              <input style="border-radius:10px;" type="text" name="txtnombre" class="form-control" placeholder="Username"
                required="" />
            </div>
            <div>
              <input style="border-radius:10px;" type="password" name="txtpass" class="form-control"
                placeholder="Password" required="" />
            </div>
            <div>
              <button style="color:#001E37;border: 1px solid; border-radius: 17px;" type="submit" class="btn btn-default submit">Ingrese</button>

            </div>

            <div class="clearfix"></div>

            <div class="separator">


              <div class="clearfix"></div>
              <br />

              <div>
                <h1 style="color:#001E37"><i class="fa fa-stethoscope"></i>
                  Consultorio</h1>
              </div>
            </div>
          </form>
        </section>
      </div>

      <div id="register" class="animate form registration_form">
        <section class="login_content">
          <form>
            <h1>Create Account</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" />
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <a class="btn btn-default submit" href="index.html">Submit</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Already a member ?
                <a href="#signin" class="to_register"> Ingresar</a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-stethoscope"></i> Consultorio</h1>
                <p>©2016 All Rights Reserved. consultorio</p>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
  
</body>

</html>
