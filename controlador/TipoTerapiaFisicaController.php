<?php
include_once '../modelo/TipoTerapiaFisica.php';
$tipoterapiafisica = new TipoTerapiaFisica();
if($_POST['funcion']=='buscar_tipoterapia'){
    $tipoterapiafisica->buscar_tipoterapia();
    $json=array();
    foreach ($tipoterapiafisica->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_tipo_terapia_fisica,
            'nombre'=>$objeto->nombre_tipo_terapia_fisica,
            'terapiafisica'=>$objeto->nombre_terapia_fisica
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
} 
if($_POST['funcion']=='crear_tipoterapia'){
    $nombre=$_POST['nombre'];
    $terapiafisica=$_POST['terapiafisica'];
    $tipoterapiafisica->crear_tipoterapia($nombre,$terapiafisica);  
}
if($_POST['funcion']=='eliminar_tipoterapia'){
    $id_tipo_terapia_fisica=$_POST['id'];
    $tipoterapiafisica->eliminar_tipoterapia($id_tipo_terapia_fisica);    
}
if($_POST['funcion']=='actualizar_tipoterapia'){
    $id_tipo_terapia_fisica=$_POST['id'];
    $nombre=$_POST['nombre'];
    $terapiafisica=$_POST['terapiafisica'];
    $tipoterapiafisica->actualizar_tipoterapia($id_tipo_terapia_fisica,$nombre,$terapiafisica);
}
?>