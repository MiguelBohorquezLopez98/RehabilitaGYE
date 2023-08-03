<?php
include_once '../modelo/Paciente.php';
$paciente = new Paciente();
if($_POST['funcion']=='buscar_paciente'){
    $paciente->buscar_paciente();
    $json=array();
    foreach ($paciente->objetos as $objeto) {
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
if($_POST['funcion']=='crear_paciente'){
    $cedula=$_POST['cedula'];
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $fecha_nacimiento=$_POST['fecha_nacimiento'];
    $sexo=$_POST['sexo'];
    $direccion=$_POST['direccion'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];
    $paciente->crear_paciente($cedula,$nombres,$apellidos,$fecha_nacimiento,$sexo,$direccion,$correo,$telefono);  
}
if($_POST['funcion']=='eliminar_paciente'){
    $id_usuario=$_POST['id'];
    $paciente->eliminar_paciente($id_usuario);    
}
if($_POST['funcion']=='actualizar_paciente'){
    $id_usuario=$_POST['id'];
    $nombres=$_POST['nombres'];
    $apellidos=$_POST['apellidos'];
    $sexo=$_POST['sexo'];
    $direccion=$_POST['direccion'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];
    $paciente->actualizar_paciente($id_usuario,$nombres,$apellidos,$sexo,$direccion,$correo,$telefono);
}
?>