<?php
session_start();
if ($_SESSION['id_rol_usuario']==1){
include_once 'layouts/header.php';
?>

<title>Administrador | Usuarios</title>

<?php
include_once 'layouts/nav.php';
?>
<div class="modal fade" id="crearusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Crear Usuario</h3>
                    <button data-dismiss="modal" aria-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="alert alert-success text-center" id="add" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Usuario creado correctamente</span>
                    </div>
                    <div class="alert alert-danger text-center" id="noadd" style='display:none;'>
                        <span><i class="fas fa-times m-1"></i>Usuario ya existe</span>
                    </div>
                    <form id="form-crear-usuario">
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
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
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
                            <label for="password">Contraseña</label>
                            <input id="password" type="password" class="form-control" placeholder="Ingrese contraseña"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input id="telefono" type="text" class="form-control" placeholder="Ingrese teléfono"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="rol">Seleccione Rol: </label>
                            <select id="rol" name="select" class="form-control select2">

                            </select>
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

<div class="modal fade" id="editarusuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Editar Usuario</h3>
                    <button data-dismiss="modal" aria-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="alert alert-success text-center" id="edit-user" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Usuario editado correctamente</span>
                    </div>
                    <div class="alert alert-danger text-center" id="noedit-user" style='display:none;'>
                        <span><i class="fas fa-times m-1"></i>Usuario no se pudo editar</span>
                    </div>
                    <form id="form-editar-usuario">
                        <div class="form-group">
                            <input id="editar_id_usuario" type="hidden" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input id="editar_nombres_usuario" type="text" class="form-control"
                                placeholder="Ingrese nombres">
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input id="editar_apellidos_usuario" type="text" class="form-control"
                                placeholder="Ingrese apellidos">
                        </div>

                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <input id="editar_sexo_usuario" type="text" class="form-control" placeholder="Ingrese sexo">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input id="editar_direccion_usuario" type="text" class="form-control"
                                placeholder="Ingrese dirección">
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input id="editar_correo_usuario" type="text" class="form-control"
                                placeholder="Ingrese correo electrónico">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input id="editar_password_usuario" type="password" class="form-control"
                                placeholder="Ingrese contraseña">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input id="editar_telefono_usuario" type="text" class="form-control"
                                placeholder="Ingrese teléfono">
                        </div>
                        <div class="form-group">
                            <label for="rol">Seleccione Rol: </label>
                            <select id="editar_rol_usuario" name="select" class="form-control select2">

                            </select>
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
                    <h1>Gestión Usuarios <button type="button" data-toggle="modal" data-target="#crearusuario"
                            class="btn bg-gradient-primary ml-2">Crear usuario</button></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="administrador.php">Home</a></li>
                        <li class="breadcrumb-item active">Gestión Usuarios</li>
                    </ol>
                </div>
            </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Buscar usuario</h3>
                    <div class="input-group">
                        <input type="text" id="buscar" class="form-control float-left"
                            placeholder="Ingrese nombres de usuario">
                        <div class="input-group-append">
                            <button class="btn btn-default">
                                <i class="i fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0 table-responsive">
                    <table class="table table-hover text-nowrap">
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
                                <th>Contraseña</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-active" id="usuarios">

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
<script src="../js/gestion_usuarios.js"></script>
<script src="../js/rol.js"></script>