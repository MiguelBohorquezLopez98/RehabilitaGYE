<?php
session_start();
if ($_SESSION['id_rol_usuario']==1){
include_once 'layouts/header.php';
?>

<title>Administrador | Pacientes</title>

<?php
include_once 'layouts/nav.php';
?>
<div class="modal fade" id="crearpaciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Crear Paciente</h3>
                    <button data-dismiss="modal" aria-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="alert alert-success text-center" id="addpaciente" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Paciente creado correctamente</span>
                    </div>
                    <div class="alert alert-danger text-center" id="noaddpaciente" style='display:none;'>
                        <span><i class="fas fa-times m-1"></i>Paciente ya existe</span>
                    </div>
                    <form id="form-crear-paciente">
                        <div class="form-group">
                            <label for="cedula">Cedula</label>
                            <input id="cedula" type="text" class="form-control" placeholder="Ingrese cédula" required>
                        </div>
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input id="nombres" type="text" class="form-control" placeholder="Ingrese nombres" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input id="apellidos" type="text" class="form-control" placeholder="Ingrese apellidos"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="fechanacimiento">Fecha de nacimiento</label>
                            <input id="fecha_nacimiento" type="date" class="form-control"
                                placeholder="Ingrese fecha nacimiento" required>
                        </div>
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <input id="sexo" type="text" class="form-control" placeholder="Ingrese sexo" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input id="direccion" type="text" class="form-control" placeholder="Ingrese dirección"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input id="correo" type="text" class="form-control" placeholder="Ingrese correo electrónico"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input id="telefono" type="number" class="form-control" placeholder="Ingrese teléfono"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="ocupacion">Ocupación</label>
                            <input id="ocupacion" type="text" class="form-control"
                                placeholder="Ingrese ocupación">
                        </div>
                        <div class="form-group">
                            <label for="contactoemergencia">Contacto de Emergencia</label>
                            <input id="contactoemergencia" type="text" class="form-control"
                                placeholder="Ingrese contacto de emergencia">
                        </div>
                        <div class="form-group">
                            <label for="medicoreferido">Médico de referencia</label>
                            <input id="medicoreferido" type="text" class="form-control"
                                placeholder="Ingrese médico de referencia">
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
                    <button type="button" data-dismiss="modal"
                        class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editarpaciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Editar Paciente</h3>
                    <button data-dismiss="modal" aria-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="alert alert-success text-center" id="edit-user" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Paciente editado correctamente</span>
                    </div>
                    <div class="alert alert-danger text-center" id="noedit-user" style='display:none;'>
                        <span><i class="fas fa-times m-1"></i>Paciente no se pudo editar</span>
                    </div>
                    <form id="form-editar-paciente">
                        <div class="form-group">
                            <input id="editar_id_paciente" type="hidden" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input id="editar_nombres_paciente" type="text" class="form-control"
                                placeholder="Ingrese nombres">
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input id="editar_apellidos_paciente" type="text" class="form-control"
                                placeholder="Ingrese apellidos">
                        </div>

                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <input id="editar_sexo_paciente" type="text" class="form-control"
                                placeholder="Ingrese sexo">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input id="editar_direccion_paciente" type="text" class="form-control"
                                placeholder="Ingrese dirección">
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input id="editar_correo_paciente" type="text" class="form-control"
                                placeholder="Ingrese correo electrónico">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input id="editar_telefono_paciente" type="number" class="form-control"
                                placeholder="Ingrese teléfono">
                        </div>
                        <div class="form-group">
                            <label for="ocupacion">Ocupación</label>
                            <input id="editar_ocupacion" type="text" class="form-control"
                                placeholder="Ingrese ocupación">
                        </div>
                        <div class="form-group">
                            <label for="contactoemergencia">Contacto de Emergencia</label>
                            <input id="editar_contactoemergencia" type="text" class="form-control"
                                placeholder="Ingrese contacto de emergencia">
                        </div>
                        <div class="form-group">
                            <label for="medicoreferido">Médico de referencia</label>
                            <input id="editar_medicoreferido" type="text" class="form-control"
                                placeholder="Ingrese médico de referencia">
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-gradient-primary float-right m-1">Guardar</button>
                    <button type="button" data-dismiss="modal"
                        class="btn btn-outline-secondary float-right m-1">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestión Pacientes <button type="button" data-toggle="modal" data-target="#crearpaciente"
                            class="btn bg-gradient-primary ml-2">Crear paciente</button></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="administrador.php">Home</a></li>
                        <li class="breadcrumb-item active">Gestión Pacientes</li>
                    </ol>
                </div>
            </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Buscar paciente</h3>
                    <div class="input-group">
                        <input type="text" id="buscar" class="form-control float-left"
                            placeholder="Ingrese nombres de paciente">
                        <div class="input-group-append">
                            <button class="btn btn-default">
                                <i class="i fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-over text-nowrap">
                        <thead class="table-success">
                            <tr>
                                <th>Id</th>
                                <th>Cedula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Dirección</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-active" id="pacientes">

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">

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
<script src="../js/gestion_pacientes.js"></script>