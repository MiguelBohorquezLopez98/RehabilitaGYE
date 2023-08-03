<?php
include_once '../modelo/Usuario.php';
session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];
$usuario = new Usuario();
 
if(!empty($_SESSION['id_rol_usuario'])){
    switch ($_SESSION['id_rol_usuario']){
        case 1:
            header('Location: ../vista/administrador.php');
            break;

        case 2:
            header('Location: ../vista/doctor.php');
            break;

        case 3:
            header('Location: ../vista/terapista.php');
            break;
    }
}
else{
    $usuario->Loguearse($user,$pass);
    if(!empty($usuario->objetos)){
        foreach ($usuario->objetos as $objeto){
            $_SESSION['usuario']=$objeto->id_usuario;
            $_SESSION['id_rol_usuario']=$objeto->id_rol_usuario;
            $_SESSION['nombres_usuario']=$objeto->nombres_usuario;
            $_SESSION['apellidos_usuario']=$objeto->apellidos_usuario;
        }
        switch ($_SESSION['id_rol_usuario']){
            case 1:
                header('Location: ../vista/administrador.php');
                break;

            case 2:
                header('Location: ../vista/doctor.php');
                break;

            case 3:
                header('Location: ../vista/terapista.php');
                break;
        }
    }
    else{
        header('Location: ../index.php');
    }
}
?>