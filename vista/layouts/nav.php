<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Sweetalert2 -->
<link rel="stylesheet" href="../css/sweetalert2.css">
<!-- Select 2 -->
<link rel="stylesheet" href="../css/select2.css">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../css/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <a href="../controlador/LogOut.php">Cerrar sesión</a>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="javascript:void(0)" class="brand-link">
                <img src="../img/doctor.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Rehabilita GYE</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../img/avatar5.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="javascript:void(0)" class="d-block">
                            <?php
                            echo $_SESSION['nombres_usuario'];
                            ?>
                        </a>
                        <a href="javascript:void(0)" class="d-block">
                            <?php
                            echo $_SESSION['apellidos_usuario'];
                            ?>
                        </a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-header">USUARIO</li>
                        <li class="nav-item">
                            <a href="admin_usuarios.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Gestión Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_pacientes.php" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>Gestión Pacientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_terapia.php" class="nav-link">
                                <i class="fas fa-hand-holding-medical"></i>
                                <p>Gestión Terapia Física</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_tipos_terapia.php" class="nav-link">
                                <i class="fas fa-file-medical"></i>
                                <p>Gestión Tipos Terapia Física</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-hand-holding-medical"></i>
                                <p>Gestión Terapia Diamagnética</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file-medical"></i>
                                <p>Gestión Tipos Terapia Diamagnética</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_agenda_consulta.php" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Agendamiento Consultas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_agenda_sesion.php" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Agendamiento Sesiones
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin_agenda_consulta.php" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Agendamiento Terapia Diamagnética
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>