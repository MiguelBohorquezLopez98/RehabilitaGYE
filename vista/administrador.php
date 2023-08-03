<?php
session_start();
if ($_SESSION['id_rol_usuario']==1){
include_once 'layouts/header.php';
?>

<title>Administrador</title>

<?php
include_once 'layouts/nav.php';
?>
<!-- Modal -->
<div class="modal fade" id="cambiocontra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="../img/avatar5.png" class="profile-user-img img-fluid img-circle">
                </div>
                <div class="text-center">
                    <b>
                        <?php
                            echo $_SESSION['nombres_usuario'];
                        ?>
                    </b>
                </div>
                <div class="alert alert-success text-center" id="update" style='display:none;'>
                    <span><i class="fas fa-check m-1"></i>Contraseña actualizada correctamente</span>
                </div>
                <div class="alert alert-danger text-center" id="noupdate" style='display:none;'>
                    <span><i class="fas fa-times m-1"></i>La contraseña ingresada no es correcta</span>
                </div>
                <form id="form-pass">
                    <dib class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
                        </div>
                        <input id="oldpass" type="password" class="form-control" placeholder="Ingrese password actual">
                    </dib>
                    <dib class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input id="newpass" type="text" class="form-control" placeholder="Ingrese nueva password">
                    </dib>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrador</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../vista/administrador.php">Home</a></li>
                        <li class="breadcrumb-item active">Administrador</li>
                    </ol>
                </div>
            </div>
    </section>
    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-success card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img src="../img/avatar5.png" class="profile-user-img img-fluid img-circle">
                                </div>
                                <input id="id_usuario" type="hidden" value="<?php echo $_SESSION['usuario']?>">
                                <h3 id="nombres_usuario" class="profile-username text-center text-success">Nombres</h3>
                                <p id="apellidos_usuario" class="text-muted text-center">Apellidos</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b style="color:#007300">Edad</b><a id="edad" class="float-right"></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b style="color:#007300">Cedula</b><a id="cedula_usuario"
                                            class="float-right"></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b style="color:#007300">Tipo Usuario</b>
                                        <span id="tipo_usuario" class="float-right badge badge-primary"></span>
                                    </li>
                                    <button data-toggle="modal" data-target="#cambiocontra" type="button"
                                        class="btn btn-block btn-outline-warning btn-sm">Cambiar
                                        contraseña</button>
                                </ul>
                            </div>
                        </div>
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Sobre mi</h3>
                            </div>
                            <div class="card-body">
                                <strong style="color:#007300">
                                    <i class="fas fa-phone mr-1"></i>Teléfono
                                </strong>
                                <p id="telefono_usuario" class="text-muted"></p>
                                <strong style="color:#007300">
                                    <i class="fas fa-map-marker-alt mr-1"></i>Domicilio
                                </strong>
                                <p id="direccion_usuario" class="text-muted"></p>
                                <strong style="color:#007300">
                                    <i class="fas fa-at mr-1"></i>Correo
                                </strong>
                                <p id="correo_usuario" class="text-muted"></p>
                                <strong style="color:#007300">
                                    <i class="fas fa-smile-wink mr-1"></i>Sexo
                                </strong>
                                <p id="sexo_usuario" class="text-muted"></p>
                                <button class="edit btn btn-block bg-gradient-danger">Editar</button>
                            </div>
                            <div class="card-footer">
                                <p class="text-muted">Click en el botón si desea editar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Editar datos personales</h3>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-success text-center" id="editado" style='display:none;'>
                                    <span><i class="fas fa-check m-1"></i>Editado</span>
                                </div>
                                <div class="alert alert-danger text-center" id="noeditado" style='display:none;'>
                                    <span><i class="fas fa-times m-1"></i>Edición deshabilitada</span>
                                </div>
                                <form id="form-usuario" class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                                        <div class="col-sm-10">
                                            <input type="number" id="telefono" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="direccion" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="correo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="sexo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10 float-right">
                                            <button class="btn btn-block btn-outline-success">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <p class="text-muted">Tener cuidado con ingresar datos incorrectos</p>
                            </div>
                        </div>
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
<script src="../js/usuario.js"></script>