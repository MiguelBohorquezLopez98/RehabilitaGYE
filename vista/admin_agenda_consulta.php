<?php
session_start();
if ($_SESSION['id_rol_usuario']==1){
include_once 'layouts/header.php';
?>

<title>Administrador | Agenda Consultas</title>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../css/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../css/adminlte.min.css">
<!-- Full Calendar -->
<link rel="stylesheet" href="../css/main.css">


<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js"></script>
<?php
include_once 'layouts/nav.php';
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agenda Consultas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="administrador.php">Home</a></li>
                        <li class="breadcrumb-item active">Agenda Consultas</li>
                    </ol>
                </div>
            </div>
    </section>
    <section class="content">
        <div class="container">


            <div class="col-md-8 offset-md-2 ">

                <div id='calendar'></div>

            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalEvento">
                Agendar
            </button>

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
                                        <label for="titulo" class="form-label">Cédula del paciente</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="titulo" id="cedula"
                                                aria-describedby="helpId" placeholder="Ingrese cédula del paciente">
                                            <button type="button" onclick="" id="btnCargar"
                                                class="btn btn-primary">Cargar
                                                datos</button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="titulo" class="form-label">Nombres del paciente</label>
                                        <input type="text" class="form-control" name="titulo" id="titulo"
                                            aria-describedby="helpId" placeholder="" disabled>
                                    </div>

                                    <div class="mb-3">
                                        <label for="titulo" class="form-label">Apellidos del paciente</label>
                                        <input type="text" class="form-control" name="titulo" id="titulo"
                                            aria-describedby="helpId" placeholder="" disabled>
                                    </div>

                                    <div class="mb-3 visually-hidden">
                                        <label for="" class="form-label">Fecha</label>
                                        <input type="date" class="form-control" name="fecha" id="fecha"
                                            aria-describedby="helpId" placeholder="Seleccione fecha">
                                    </div>

                                    <div class="mb-3">
                                        <label for="hora" class="form-label">Hora del evento</label>
                                        <input type="time" class="form-control" name="hora" id="hora"
                                            aria-describedby="helpId" placeholder="Seleccione hora">
                                    </div>

                                    <!-- <div class="mb-3">
                                        <label for="descripcion" class="form-label">Tratamiento a seguir</label>
                                        <textarea class="form-control" name="descripcion" id="descripcion"
                                            rows="3"></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="color" class="form-label">Color</label>
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
</div>

<?php
include_once 'layouts/footer.php';
}
else{
    header('Location: index.php');
}
?>
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

    document.getElementById('btnBorrar').removeAttribute('disabled', "");
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
    document.getElementById('btnBorrar').setAttribute('disabled', "disabled");
}

function limpiarErrores() {
    document.getElementById('titulo').classList.remove('is-invalid');
}
</script>