<?php
include_once '../modelo/Conexion.php';
class Paciente{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function buscar_paciente(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT *,(SELECT TIMESTAMPDIFF(YEAR,fechanacimiento_usuario,CURDATE()))AS edad FROM usuario join rol on id_rol_usuario=id_rol WHERE nombres_usuario LIKE :consulta AND nombre_rol='Paciente'";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT *,(SELECT TIMESTAMPDIFF(YEAR,fechanacimiento_usuario,CURDATE()))AS edad FROM usuario join rol on id_rol_usuario=id_rol WHERE nombres_usuario NOT LIKE '' AND nombre_rol='Paciente' ORDER BY id_usuario LIMIT 20";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }
    function crear_paciente($cedula,$nombres,$apellidos,$fecha_nacimiento,$sexo,$direccion,$correo,$telefono){
        $sql = "SELECT id_usuario FROM usuario WHERE cedula_usuario=:cedula OR correo_usuario=:correo OR telefono_usuario=:telefono";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':cedula'=>$cedula,':correo'=>$correo,':telefono'=>$telefono));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noadd';
        }
        else{
            $sql = "INSERT INTO usuario (id_usuario,cedula_usuario,nombres_usuario,apellidos_usuario,fechanacimiento_usuario,sexo_usuario,direccion_usuario,correo_usuario,password_usuario,telefono_usuario,id_rol_usuario) VALUES (NULL,:cedula,:nombres,:apellidos,:fecha_nacimiento,:sexo,:direccion,:correo,NULL,:telefono,4);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':cedula'=>$cedula,':nombres'=>$nombres,':apellidos'=>$apellidos,':fecha_nacimiento'=>$fecha_nacimiento,':sexo'=>$sexo,':direccion'=>$direccion,':correo'=>$correo,':telefono'=>$telefono));
            echo 'add';
        }
    }
    function eliminar_paciente($id_usuario){
        $sql="DELETE FROM usuario WHERE id_usuario=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario));
        if(!empty($query->execute(array(':id'=>$id_usuario)))){
            echo 'eliminado';
        }
        else{
            echo 'noeliminado';
        }
    }
    function actualizar_paciente($id_usuario,$nombres,$apellidos,$sexo,$direccion,$correo,$telefono){
        $sql="UPDATE usuario SET nombres_usuario=:nombres,apellidos_usuario=:apellidos,sexo_usuario=:sexo,direccion_usuario=:direccion,correo_usuario=:correo,telefono_usuario=:telefono WHERE id_usuario=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario,':nombres'=>$nombres,':apellidos'=>$apellidos,':sexo'=>$sexo,':direccion'=>$direccion,':correo'=>$correo,':telefono'=>$telefono));
        if(!empty($query->execute(array(':id'=>$id_usuario,':nombres'=>$nombres,':apellidos'=>$apellidos,':sexo'=>$sexo,':direccion'=>$direccion,':correo'=>$correo,':telefono'=>$telefono)))){
            echo 'actualizado';
        }
        else{
            echo 'noactualizado';
        }
    }
    
}
?>