<?php
session_start();
if ($_SESSION['id_rol_usuario']==1){
include_once 'layouts/header.php';
?>

<title>Administrador | Terapia Física</title>

<?php
include_once 'layouts/nav.php';
?>
<div class="modal fade" id="crearterapiafisica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Crear Terapia Física</h3>
                    <button data-dismiss="modal" aria-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="alert alert-success text-center" id="addterapia" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Terapia creada correctamente</span>
                    </div>
                    <div class="alert alert-danger text-center" id="noaddterapia" style='display:none;'>
                        <span><i class="fas fa-times m-1"></i>Terapia ya existe</span>
                    </div>
                    <form id="form-crear-terapia">
                        <div class="form-group">
                            <label for="nombre">Nombre de la Terapia</label>
                            <input id="nombre" type="text" class="form-control" placeholder="Ingrese nombre de la terapia" required>
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

<div class="modal fade" id="editarterapiafisica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Editar Terapia Física</h3>
                    <button data-dismiss="modal" aria-label="close" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="alert alert-success text-center" id="edit-terapia-fisica" style='display:none;'>
                        <span><i class="fas fa-check m-1"></i>Terapia editada correctamente</span>
                    </div>
                    <div class="alert alert-danger text-center" id="noedit-terapia-fisica" style='display:none;'>
                        <span><i class="fas fa-times m-1"></i>Terapia no se pudo editar</span>
                    </div>
                    <form id="form-editar-terapia">
                        <div class="form-group">
                            <input id="editar_id_terapiafisica" type="hidden" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="editar_nombre_terapiafisica" type="text" class="form-control"
                                placeholder="Ingrese nombre de la terapia">
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
                    <h1>Gestión Terapia Física <button type="button" data-toggle="modal" data-target="#crearterapiafisica"
                            class="btn bg-gradient-primary ml-2">Crear Terapia</button></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="administrador.php">Home</a></li>
                        <li class="breadcrumb-item active">Gestión Terapia Física</li>
                    </ol>
                </div>
            </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Buscar Terapia</h3>
                    <div class="input-group">
                        <input type="text" id="buscar" class="form-control float-left"
                            placeholder="Ingrese nombre de la terapia">
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
                                <th>Nombre Terapia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-active" id="terapiasfisicas">

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
<script src="../js/gestion_terapia_fisica.js"></script>
