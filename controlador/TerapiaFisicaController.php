<?php
include_once '../modelo/TerapiaFisica.php';
$terapiafisica = new TerapiaFisica();
if($_POST['funcion']=='buscar_terapia'){
    $terapiafisica->buscar_terapia();
    $json=array();
    foreach ($terapiafisica->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_terapia_fisica,
            'nombre'=>$objeto->nombre_terapia_fisica
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
} 
if($_POST['funcion']=='crear_terapia'){
    $nombre=$_POST['nombre'];
    $terapiafisica->crear_terapia($nombre);  
}
if($_POST['funcion']=='eliminar_terapia'){
    $id_terapia_fisica=$_POST['id'];
    $terapiafisica->eliminar_terapia($id_terapia_fisica);    
}
if($_POST['funcion']=='actualizar_terapia'){
    $id_terapia_fisica=$_POST['id'];
    $nombre=$_POST['nombre'];
    $terapiafisica->actualizar_terapia($id_terapia_fisica,$nombre);
}
if($_POST['funcion']=='rellenar_terapiafisica'){
    $terapiafisica->rellenar_terapiafisica();
    $json = array();
    foreach($terapiafisica->objetos as $objeto){
        $json[]=array(
            'id'=>$objeto->id_terapia_fisica,
            'nombre'=>$objeto->nombre_terapia_fisica
        );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}
if($_POST['funcion']=='rellenar_terapiafisica2'){
    $terapiafisica->rellenar_terapiafisica2();
    $json = array();
    foreach($terapiafisica->objetos as $objeto){
        $json[]=array(
            'id'=>$objeto->id_terapia_fisica,
            'nombre'=>$objeto->nombre_terapia_fisica
        );
    }
    $jsonstring=json_encode($json);
    echo $jsonstring;
}
?>