
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!--Titulo y logo de la pagina web-->
    <title>CheckoutPlus</title>
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/css/CSS_loginUsuarios.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
</head>

<body>


    <!--===================================================================================================================================-->
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
    <!--===================================================================================================================================-->
    <div class="cont_principal">
        <div class="master">
            <div class="wrapper fadeInDown">
                <div id="formContent">
                    <h2 id="loginTab" style="color:red" > Error </h2>
                    <h2>Error en el Restablecimiento de Contraseña</h2>
                                <p style="color:red"><?php echo $error; ?></p>

                

                   
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/template/js/Js_formulario.js"></script>

</body>

</html>