<?php
include_once '../modelo/Usuario.php';
$usuario = new Usuario();
if($_POST['funcion']=='buscar_usuario'){
    $json=array();
    $usuario->obtener_datos($_POST['dato']);
    foreach ($usuario->objetos as $objeto) {
        $json[]=array(
            'cedula'=>$objeto->cedula_usuario,
            'nombres'=>$objeto->nombres_usuario,
            'apellidos'=>$objeto->apellidos_usuario,
            'edad'=>$objeto->edad,
            'sexo'=>$objeto->sexo_usuario,
            'direccion'=>$objeto->direccion_usuario,
            'correo'=>$objeto->correo_usuario,
            'telefono'=>$objeto->telefono_usuario,
            'tipo'=>$objeto->nombre_rol
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
if($_POST['funcion']=='capturar_datos'){
    $json=array();
    $id_usuario=$_POST['id_usuario'];
    $usuario->obtener_datos($id_usuario);
    foreach ($usuario->objetos as $objeto) {
        $json[]=array(
            'sexo'=>$objeto->sexo_usuario,
            'direccion'=>$objeto->direccion_usuario,
            'correo'=>$objeto->correo_usuario,
            'telefono'=>$objeto->telefono_usuario
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}
if($_POST['funcion']=='editar_usuario'){
    $id_usuario=$_POST['id_usuario'];
    $telefono=$_POST['telefono'];
    $direccion=$_POST['direccion'];
    $correo=$_POST['correo'];
    $sexo=$_POST['sexo'];
    $usuario->editar($id_usuario,$telefono,$direccion,$correo,$sexo);
    echo 'Editado';
}
if($_POST['funcion']=='cambiar_contra'){
    $id_usuario=$_POST['id_usuario'];
    $oldpass=$_POST['oldpass'];
    $newpass=$_POST['newpass'];
    $usuario->cambiar_contra($id_usuario,$oldpass,$newpass);  
}
if($_POST['funcion']=='buscar_usuarios_adm'){
    $usuario->buscar();
    $json=array();
    foreach ($usuario->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_usuario,
            'cedula'=>$objeto->cedula_usuario,
            'nombres'=>$objeto->nombres_usuario,
            'apellidos'=>$objeto->apellidos_usuario,
            'edad'=>$objeto->edad,
            'sexo'=>$objeto->sexo_usuario,
            'direccion'=>$objeto->direccion_usuario,
            'correo'=>$objeto->correo_usuario,
            'telefono'=>$objeto->telefono_usuario,
            'password'=>$objeto->password_usuario,
            'tipo'=>$objeto->nombre_rol
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
} 
if($_POST['funcion']=='crear'){
    $cedula=$_POST['cedula'];
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $fecha_nacimiento=$_POST['fecha_nacimiento'];
    $sexo=$_POST['sexo'];
    $direccion=$_POST['direccion'];
    $correo=$_POST['correo'];
    $password=$_POST['password'];
    $telefono=$_POST['telefono'];
    $rol=$_POST['rol'];
    $usuario->crear($cedula,$nombres,$apellidos,$fecha_nacimiento,$sexo,$direccion,$correo,$password,$telefono,$rol);  
}
if($_POST['funcion']=='eliminar'){
    $id_usuario=$_POST['id'];
    $usuario->eliminar($id_usuario);    
}
if($_POST['funcion']=='actualizar_usuario'){
    $id_usuario=$_POST['id'];
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $sexo=$_POST['sexo'];
    $direccion=$_POST['direccion'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];
    $password=$_POST['password'];
    $rol=$_POST['rol'];
    $usuario->actualizar_usuario($id_usuario,$nombres,$apellidos,$sexo,$direccion,$correo,$telefono,$password,$rol);
}
?>