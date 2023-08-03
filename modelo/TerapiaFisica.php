<?php
include_once '../modelo/Conexion.php';
class TerapiaFisica{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function buscar_terapia(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT * FROM terapia_fisica WHERE nombre_terapia_fisica LIKE :consulta";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT * FROM terapia_fisica WHERE nombre_terapia_fisica NOT LIKE '' ORDER BY id_terapia_fisica LIMIT 20";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }
    function crear_terapia($nombre){
        $sql = "SELECT id_terapia_fisica FROM terapia_fisica WHERE nombre_terapia_fisica=:nombre";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noadd';
        }
        else{
            $sql = "INSERT INTO terapia_fisica (id_terapia_fisica,nombre_terapia_fisica) VALUES (NULL,:nombre);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre));
            echo 'add';
        }
    }
    function eliminar_terapia($id_terapia_fisica){
        $sql="DELETE FROM terapia_fisica WHERE id_terapia_fisica=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_terapia_fisica));
        if(!empty($query->execute(array(':id'=>$id_terapia_fisica)))){
            echo 'eliminado';
        }
        else{
            echo 'noeliminado';
        }
    }
    function actualizar_terapia($id_terapia_fisica,$nombre){
        $sql="UPDATE terapia_fisica SET nombre_terapia_fisica=:nombre WHERE id_terapia_fisica=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_terapia_fisica,':nombre'=>$nombre));
        if(!empty($query->execute(array(':id'=>$id_terapia_fisica,':nombre'=>$nombre)))){
            echo 'actualizado';
        }
        else{
            echo 'noactualizado';
        }
    }
    function rellenar_terapiafisica(){
        $sql="SELECT * FROM terapia_fisica ORDER BY nombre_terapia_fisica ASC";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
    function rellenar_terapiafisica2(){
        $sql="SELECT * FROM terapia_fisica ORDER BY nombre_terapia_fisica ASC";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
    
}
?>