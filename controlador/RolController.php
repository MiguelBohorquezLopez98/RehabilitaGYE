<?php
include_once '../modelo/Rol.php';
$rol = new Rol();
if($_POST['funcion']=='rellenar_roles'){
    $rol->rellenar_roles();
    $json = array();
    foreach($rol->objetos as $objeto){
        $json[]=array(
            'id'=>$objeto->id_rol,
            'nombre'=>$objeto->nombre_rol
        );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion']=='rellenar_roles2'){
    $rol->rellenar_roles2();
    $json = array();
    foreach($rol->objetos as $objeto){
        $json[]=array(
            'id'=>$objeto->id_rol,
            'nombre'=>$objeto->nombre_rol
        );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}
?>