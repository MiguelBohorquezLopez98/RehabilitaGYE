<?php
include_once '../modelo/Conexion.php';
class Rol{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function rellenar_roles(){
        $sql="SELECT * FROM rol WHERE NOT nombre_rol='Paciente' ORDER BY nombre_rol ASC";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
    function rellenar_roles2(){
        $sql="SELECT * FROM rol WHERE NOT nombre_rol='Paciente' ORDER BY nombre_rol ASC";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
}
?>