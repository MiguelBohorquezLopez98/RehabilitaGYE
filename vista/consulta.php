<?php
session_start();
if ($_SESSION['id_rol_usuario']==2){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/adminlte.min.css">
    <!-- Full Calendar -->
    <link rel="stylesheet" href="../css/main.css">


    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js"></script>


    <!-- Include the default stylesheet -->
    <!-- <link rel="stylesheet" type="text/css"
        href="https://cdn.rawgit.com/wenzhixin/multiple-select/e14b36de/multiple-select.css"> -->
    <!-- Include plugin -->
    <!-- <script src="https://cdn.rawgit.com/wenzhixin/multiple-select/e14b36de/multiple-select.js"></script> -->

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
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
                        <a href="#" class="d-block">
                            <?php
                            echo $_SESSION['nombres_usuario'];
                            ?>
                        </a>
                        <a href="#" class="d-block">
                            <?php
                            echo $_SESSION['apellidos_usuario'];
                            ?>
                        </a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-header">DOCTOR</li>
                        <li class="nav-item">
                            <a href="consulta.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Consulta</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>Agenda Terapia Diamagnética</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-friends"></i>
                                <p>Historia Clínica</p>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Bienvenido Doctor/a | Consulta</h1>
                        </div>

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="doctor.php">Home</a></li>
                                <li class="breadcrumb-item active">Consulta</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="col-md-9">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Datos del paciente</h3>
                        </div>
                        <div class="card-body">
                            <form id="form-consulta" class="form-horizontal">
                                <div class="form-group row">
                                    <label for="cedula" class="col-sm-2 col-form-label">Cédula</label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="cedula" id="cedula"
                                                aria-describedby="helpId" placeholder="Ingrese cédula del paciente">
                                            <button type="button" onclick="" id="btnCargar"
                                                class="btn btn-primary">Cargar datos</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nombres" class="col-sm-2 col-form-label">Nombres</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="nombres" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="apellidos" class="form-control" disabled>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Historia Clínica</h3>
                        </div>
                        <div class="card-body">
                            <form id="form-consulta" class="form-horizontal">
                                <div class="form-group row">
                                    <label for="alergias" class="col-sm-2 col-form-label">Alergias</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alergias" id="alergias"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="medicinas" class="col-sm-2 col-form-label">Medicinas</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="medicinas" id="medicinas"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alimentos" class="col-sm-2 col-form-label">Alimentos</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="alimentos" id="alimentos"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="enfermedades" class="col-sm-2 col-form-label">Enfermedades: </label>
                                    <fieldset class="p-2">
                                        <div>
                                            <input class="form-check-input" type="checkbox" id="hipertension"
                                                value="hipertension">
                                            <label class="form-check-label" for="hipertension">Hipertensión</label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" id="cardiaco"
                                                value="cardiaco">
                                            <label class="form-check-label" for="cardiaco">Cardiáco</label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" id="diabetes"
                                                value="diabetes">
                                            <label class="form-check-label" for="diabetes">Diabetes</label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" id="tiroides"
                                                value="tiroides">
                                            <label class="form-check-label" for="tiroides">Tiroides</label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" id="gastritis"
                                                value="gastritis">
                                            <label class="form-check-label" for="gastritis">Gastritis</label>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="p-4">
                                        </div>
                                    </fieldset>

                                    <fieldset class="p-2">
                                        <div>
                                            <input class="form-check-input" type="checkbox" id="colitis"
                                                value="colitis">
                                            <label class="form-check-label" for="colitis">Colitis</label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" id="vih" value="vih">
                                            <label class="form-check-label" for="vih">VIH</label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" id="fibromialgia"
                                                value="fibromialgia">
                                            <label class="form-check-label" for="fibromialgia">Fibromialgia</label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" id="cancer" value="cancer">
                                            <label class="form-check-label" for="cancer">Cáncer</label>
                                        </div>

                                        <div>
                                            <input class="form-check-input" type="checkbox" id="enfreumaticas"
                                                value="enfermedades reumaticas">
                                            <label class="form-check-label" for="enfreumaticas">Enf. Reumáticas</label>
                                        </div>
                                    </fieldset>

                                    <div class="form-group row">
                                        <label for="otrasenf" class="col-sm-3 col-form-label">Otras:</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="otrasenf" id="otrasenf"
                                                rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hsalud" class="col-sm-2 col-form-label">Hábitos de Salud:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="tabaquismo"
                                            value="tabaquismo">
                                        <label class="form-check-label" for="tabaquismo">Tabaquismo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="alcoholismo"
                                            value="alcoholismo">
                                        <label class="form-check-label" for="alcoholismo">Alcoholismo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="drogas" value="drogas">
                                        <label class="form-check-label" for="drogas">Drogas</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="actfisica"
                                            value="actividad fisica">
                                        <label class="form-check-label" for="actfisica">Actividad Física</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="signosvitales" class="col-sm-2 col-form-label">Signos Vitales</label>
                                </div>

                                <div class="form-group row">
                                    <label for="ta" class="col-sm-2 col-form-label">T/A:</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="ta" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="temperatura" class="col-sm-2 col-form-label">Temperatura:</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="temperatura" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fc" class="col-sm-2 col-form-label">FC:</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="fc" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fr" class="col-sm-2 col-form-label">FR:</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="fr" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="escaladolor" class="col-sm-2 col-form-label">Escala de Dolor:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="sindolor" value="sin dolor">
                                        <label class="form-check-label" for="sindolor">Sin Dolor</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="pocodolor"
                                            value="poco dolor">
                                        <label class="form-check-label" for="pocodolor">Poco Dolor</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="dolormoderado"
                                            value="dolor moderado">
                                        <label class="form-check-label" for="dolormoderado">Dolor Moderado</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="dolorfuerte"
                                            value="dolor fuerte">
                                        <label class="form-check-label" for="dolorfuerte">Dolor Fuerte</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="dolormuyfuerte"
                                            value="dolor muy fuerte">
                                        <label class="form-check-label" for="dolormuyfuerte">Dolor Muy Fuerte</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="imagencuerpo" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img src="../img/Cuerpo.jpg" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="marcha" class="col-sm-2 col-form-label">Marcha / Deambulación:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="libre" value="libre">
                                        <label class="form-check-label" for="libre">Libre</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="claudicante"
                                            value="claudicante">
                                        <label class="form-check-label" for="claudicante">Claudicante</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="conayuda" value="con ayuda">
                                        <label class="form-check-label" for="conayuda">Con ayuda</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="espasticas"
                                            value="espasticas">
                                        <label class="form-check-label" for="espasticas">Espásticas</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="ataxica" value="ataxica">
                                        <label class="form-check-label" for="ataxica">Atáxica</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="otras" value="otras">
                                        <label class="form-check-label" for="otras">Otras</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fecha" class="col-sm-2 col-form-label">Fecha:</label>
                                    <div class="col-sm-10">
                                        <input type="date" id="fecha" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="diagnostico" class="col-sm-2 col-form-label">Diagnóstico:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="diagnostico" id="diagnostico"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="evaluacion" class="col-sm-2 col-form-label">Evaluación:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="evaluacion" id="evaluacion"
                                            rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tratamientoseguir" class="col-sm-4 col-form-label">Tratamiento a
                                        seguir</label>
                                </div>
                                <div class="form-group row">
                                    <label for="descripcion" class="col-sm-2 col-form-label">Ejercicios:</label>
                                    <div class="col-sm-4 p-2">
                                        <select id="ms" multiple="multiple" class="form-control">
                                            <option value="1">Tubos de presion</option>
                                            <option value="2">Mancuernas</option>
                                            <option value="3">Bicicleta fija</option>
                                            <option value="4">Caminadora</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 p-2">
                                        <textarea class="form-control" name="observaciones" id="observaciones" placeholder="Observaciones"
                                            rows="3"></textarea>
                                    </div>


                                    <label for="descripcion" class="col-sm-2 col-form-label">Terapia Acuatica:</label>
                                    <div class="col-sm-4 p-2">
                                        <select id="ms" multiple="multiple" class="form-control">
                                            <option value="1">Fortalecimiento</option>
                                            <option value="2">Flotadores piernas</option>
                                            <option value="3">Flotadores brazos</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 p-2">
                                        <textarea class="form-control" name="observaciones" id="observaciones" placeholder="Observaciones"
                                            rows="3"></textarea>
                                    </div>

                                    <label for="descripcion" class="col-sm-2 col-form-label">Terapia de camilla:</label>
                                    <div class="col-sm-4 p-2">
                                        <select id="ms" multiple="multiple" class="form-control">
                                            <option value="1">Electrodos</option>
                                            <option value="2">Ultrasonido</option>
                                            <option value="3">Compresas frias</option>
                                            <option value="4">Compresas calientes</option>
                                            <option value="5">Masaje</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 p-2">
                                        <textarea class="form-control" name="observaciones" id="observaciones" placeholder="Observaciones"
                                            rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="observaciones" class="col-sm-2 col-form-label">Observaciones del
                                        tratamiento:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="observaciones" id="observaciones"
                                            rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-1 col-sm-10 float-right">
                                        <button class="btn btn-block btn-outline-success">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 0.0.1
            </div>
            <strong><a href="javascript:void(0)">Rehabilita GYE</a></strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../js/demo.js"></script>
    <!-- jQuery UI -->
    <script src="../js/jquery-ui.min.js"></script>

</body>

</html>
<?php
}
else{
    header('Location: ../vista/login.php');
}
?>