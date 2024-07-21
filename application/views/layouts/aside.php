<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a class="site_title"><i class="fa fa-stethoscope"></i></fa-solid> <span> consultorio</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo base_url();?>assets/149071.png" alt="..." class="img-circle profile_img">
               
            </div>
            <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo $this->session->userdata('login'); ?></h2>

            </div>
        </div>
        <!-- /menu profile quick info -->
        <br />
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
    <li>
        <a href="#"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url(); ?>cdashboard">Asignar Consulta</a></li>
            <li><a href="<?php echo base_url(); ?>mantenimiento/cpaciente">Pacientes</a></li>
            <li><a href="<?php echo base_url(); ?>mantenimiento/cpendingConsultations">Consultas Pendientes</a></li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="fa fa-shield"></i> Seguridad <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url(); ?>mantenimiento/cusuarios">Gestión de Usuarios</a></li>
            <li><a href="fixed_footer.html">Cambiar Contraseña</a></li>
        </ul>
    </li>
</ul>

            </div>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo base_url();?>assets/149071.png" alt="">
                        
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url();?>clogin/clogout">
                        <i class="fa fa-sign-out"></i> Cerrar sesión
                    </a>
                    </div>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item">
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="text-center">
                                <a class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
<div class="right_col" role="main">
    <!-- contenido principal -->

