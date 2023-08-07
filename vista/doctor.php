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
                            <h1>Bienvenido Doctor/a | Agenda de Consultas</h1>
                        </div>

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Doctor/a</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container">


                    <div class="col-md-8 offset-md-2 ">

                        <div id='calendar'></div>

                    </div>

                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <div class="modal fade" id="modalEvento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Consulta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">

                                        <form action="" method="post">

                                            <div class="mb-3 visually-hidden ">
                                                <label for="id" class="form-label"></label>
                                                <input type="hidden" class="form-control" name="id" id="id"
                                                    aria-describedby="helpId" placeholder="ID">
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Cédula del paciente</label>
                                                <input type="text" class="form-control" name="" id=""
                                                    aria-describedby="helpId" placeholder="" disabled>
                                            </div>

                                            <div class="mb-3">
                                                <label for="titulo" class="form-label">Nombres del paciente</label>
                                                <input type="text" class="form-control" name="titulo" id="titulo"
                                                    aria-describedby="helpId" placeholder="" disabled>
                                            </div>

                                            <div class="mb-3">
                                                <label for="" class="form-label">Apellidos del paciente</label>
                                                <input type="text" class="form-control" name="" id=""
                                                    aria-describedby="helpId" placeholder="" disabled>
                                            </div>

                                            <div class="mb-3 visually-hidden">
                                                <label for="" class="form-label">Fecha</label>
                                                <input type="text" class="form-control" name="fecha" id="fecha"
                                                    aria-describedby="helpId" placeholder="Fecha" disabled>

                                            </div>

                                            <div class="mb-3">
                                                <label for="hora" class="form-label">Hora del evento</label>
                                                <input type="time" class="form-control" name="hora" id="hora"
                                                    aria-describedby="helpId" placeholder="Hora" disabled>
                                            </div>

                                            <div class="mb-3">
                                                <label for="descripcion" class="form-label">Tratamiento a seguir</label>
                                                <select id="ms" multiple="multiple" class="form-control">
                                                    <option value="1">Brazos</option>
                                                    <option value="2">Piernas</option>
                                                    <option value="3">Piscina</option>
                                                    <option value="4">Compresas Calientes</option>
                                                </select>
                                                <!-- <textarea class="form-control" name="descripcion" id="descripcion"
                                                    rows="3"></textarea> -->

                                            </div>

                                            <div class="mb-3">
                                                <label for="descripcion" class="form-label">Observaciones del
                                                    tratamiento</label>
                                                <textarea class="form-control" name="descripcion" id="descripcion"
                                                    rows="3"></textarea>
                                            </div>




                                            <!-- <div class="mb-3">
                                                <label for="color" class="form-label">Color:</label>
                                                <input type="color" class="form-control" name="color" id="color"
                                                    aria-describedby="helpId" placeholder="Color:">
                                            </div> -->

                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" onclick="borrarEvento()" class="btn btn-danger" id="btnBorrar"
                                        data-bs-dismiss="modal">Borrar</button> -->
                                    <button type="button" onclick="agregarEvento()" id="btnGuardar"
                                        class="btn btn-primary">Guardar</button>
                                </div>
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
    <!-- fullCalendar 2.2.5 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


    <script>
    var modalEvento;

    modalEvento = new bootstrap.Modal(document.getElementById('modalEvento'), {
        keyboard: false
    });
    var calendar;

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: "es",
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            dateClick: function(informacion) {

                limpiarFormulario(informacion.dateStr);
                // alert("Presionaste "+informacion.dateStr);
                modalEvento.show();

            },
            eventClick: function(informacion) {
                console.log(informacion);
                modalEvento.show();
                recuperarDatosEvento(informacion.event);

            },
            events: "../controlador/api.php"
        });
        calendar.render();
    });
    </script>
    <script>
    function recuperarDatosEvento(evento) {
        limpiarErrores();
        var fecha = evento.startStr.split("T");
        var hora = fecha[1].split(":");

        document.getElementById('id').value = evento.id;
        document.getElementById('titulo').value = evento.title;
        document.getElementById('fecha').value = fecha[0];
        document.getElementById('hora').value = hora[0] + ":" + hora[1];
        document.getElementById('descripcion').value = evento.extendedProps.descripcion;
        document.getElementById('color').value = evento.backgroundColor;

        //document.getElementById('btnBorrar').removeAttribute('disabled', "");
        document.getElementById('btnGuardar').removeAttribute('disabled', "");


    }

    function borrarEvento() {
        enviarDatosApi("borrar");

    }

    function agregarEvento() {

        if (document.getElementById('titulo').value == "") {
            document.getElementById('titulo').classList.add('is-invalid');
            return true;
        }



        accion = (document.getElementById("id").value == 0) ? "agregar" : "actualizar";
        enviarDatosApi(accion);

    }

    function enviarDatosApi(accion) {
        fetch("../controlador/api.php?accion=" + accion, {
                method: "POST",
                body: recolectarDatos()
            })
            .then(data => {
                console.log(data);
                calendar.refetchEvents();
                modalEvento.hide();
            })
            .catch(error => {
                console.log(error);
            });
    }

    function recolectarDatos() {
        var evento = new FormData();
        evento.append("title", document.getElementById('titulo').value);
        evento.append("fecha", document.getElementById('fecha').value);
        evento.append("hora", document.getElementById('hora').value);
        evento.append("descripcion", document.getElementById('descripcion').value);
        evento.append("color", document.getElementById('color').value);
        evento.append("id", document.getElementById('id').value);
        return evento;
    }

    function limpiarFormulario(fecha) {
        limpiarErrores();
        document.getElementById('titulo').value = "";
        document.getElementById('fecha').value = fecha;
        document.getElementById('hora').value = "12:00";
        document.getElementById('descripcion').value = "";
        document.getElementById('color').value = "";
        document.getElementById('id').value = "";
        //document.getElementById('btnBorrar').setAttribute('disabled', "disabled");
    }

    function limpiarErrores() {
        document.getElementById('titulo').classList.remove('is-invalid');
    }
    </script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script> -->


    <script>
    $(function() {
        $('#ms').change(function() {
            console.log($(this).val());
        });
    });
    </script>

</body>

</html>
<?php
}
else{
    header('Location: ../vista/login.php');
}
?>