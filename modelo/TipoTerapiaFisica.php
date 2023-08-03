<?php
include_once '../modelo/Conexion.php';
class TipoTerapiaFisica{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function buscar_tipoterapia(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM tipo_terapia_fisica join terapia_fisica on id_terapiafisica=id_terapia_fisica WHERE nombre_tipo_terapia_fisica LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT * FROM tipo_terapia_fisica join terapia_fisica on id_terapiafisica=id_terapia_fisica WHERE nombre_tipo_terapia_fisica NOT LIKE '' ORDER BY id_tipo_terapia_fisica LIMIT 20";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }
    function crear_tipoterapia($nombre,$terapiafisica){
        $sql = "SELECT id_tipo_terapia_fisica FROM tipo_terapia_fisica WHERE nombre_tipo_terapia_fisica=:nombre";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noadd';
        }
        else{
            $sql = "INSERT INTO tipo_terapia_fisica (id_tipo_terapia_fisica,nombre_tipo_terapia_fisica,id_terapiafisica) VALUES (NULL,:nombre,:terapiafisica);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre,':terapiafisica'=>$terapiafisica));
            echo 'add';
        }
    }
    function eliminar_tipoterapia($id_tipo_terapia_fisica){
        $sql="DELETE FROM tipo_terapia_fisica WHERE id_tipo_terapia_fisica=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_tipo_terapia_fisica));
        if(!empty($query->execute(array(':id'=>$id_tipo_terapia_fisica)))){
            echo 'eliminado';
        }
        else{
            echo 'noeliminado';
        }
    }
    function actualizar_tipoterapia($id_tipo_terapia_fisica,$nombre,$terapiafisica){
        $sql="UPDATE tipo_terapia_fisica SET nombre_tipo_terapia_fisica=:nombre,id_terapiafisica=:terapiafisica WHERE id_tipo_terapia_fisica=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_tipo_terapia_fisica,':nombre'=>$nombre,':terapiafisica'=>$terapiafisica));
        if(!empty($query->execute(array(':id'=>$id_tipo_terapia_fisica,':nombre'=>$nombre,':terapiafisica'=>$terapiafisica)))){
            echo 'actualizado';
        }
        else{
            echo 'noactualizado';
        }
    }
    
}
?>