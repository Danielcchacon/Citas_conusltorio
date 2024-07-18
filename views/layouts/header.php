<!DOCTYPE html>
<html lang="es">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/image/logo.jpg" type="image/ico" />

    <title>Gentelella Alela!</title>

    <!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="./vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="./vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="./vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="./vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Incluye FullCalendar CSS localmente -->
    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
      <!-- Include SweetAlert CSS and JS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    
<!-- Tempus Dominus CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@eonasdan/tempus-dominus@6.0.0-beta.6/dist/css/tempus-dominus.min.css" />

<style>
    .fc-day-today {
      background-color: #ffeb3b !important; /* Highlight today's date */
    }

    .table .thead-dark th {
    color: #fff;
    background-color: #2A3F54 !important;
    border-color: #ffffff !important;
}

.colordefault{

  background-color: #2A3F54 !important;
  border-color: #2A3F54 !important;
}
  </style>


  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a  class="site_title"><i class="fa fa-stethoscope"></i></fa-solid> <span> consultorio</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="build/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <?php
                   if (isset($_SESSION['nombre'])) {
                       echo "<h2>" . $_SESSION['nombre'] ." ". $_SESSION['apellido']."</h2>";
                   } else {
                       echo "<h2>Guest</h2>";
                   }        
        ?>
               
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <?php include 'aside.php'; ?>
            <div class="right_col" role="main">