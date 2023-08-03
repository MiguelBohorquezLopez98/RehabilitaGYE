<?php
include_once '../modelo/Conexion.php';
class Usuario{
    var $objetos;
    public function __construct(){
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    function Loguearse($dni,$pass){
        $sql = "SELECT * FROM usuario inner join rol on id_rol_usuario=id_rol where cedula_usuario=:dni and password_usuario=:pass";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni,':pass'=>$pass));
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
    function obtener_datos($id){
        $sql = "SELECT *,(SELECT TIMESTAMPDIFF(YEAR,fechanacimiento_usuario,CURDATE()))AS edad FROM usuario join rol on id_rol_usuario=id_rol and id_usuario=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $this->objetos=$query->fetchall();
        return $this->objetos;
    }
    function editar($id_usuario,$telefono,$direccion,$correo,$sexo){
        $sql = "UPDATE usuario SET telefono_usuario=:telefono,direccion_usuario=:direccion,correo_usuario=:correo,sexo_usuario=:sexo WHERE id_usuario=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario,':telefono'=>$telefono,':direccion'=>$direccion,':correo'=>$correo,':sexo'=>$sexo));
    }
    function cambiar_contra($id_usuario,$oldpass,$newpass){
        $sql = "SELECT * FROM usuario WHERE id_usuario=:id and password_usuario=:oldpass";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario,':oldpass'=>$oldpass));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            $sql="UPDATE usuario SET password_usuario=:newpass WHERE id_usuario=:id";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id_usuario,':newpass'=>$newpass));
            echo 'update';
        }
        else{
            echo 'noupdate';
        }
    }
    function buscar(){
        if(!empty($_POST['consulta'])){
            $consulta=$_POST['consulta'];
            $sql="SELECT *,(SELECT TIMESTAMPDIFF(YEAR,fechanacimiento_usuario,CURDATE()))AS edad FROM usuario join rol on id_rol_usuario=id_rol WHERE nombres_usuario LIKE :consulta AND nombre_rol!='Paciente'";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
        else{
            $sql="SELECT *,(SELECT TIMESTAMPDIFF(YEAR,fechanacimiento_usuario,CURDATE()))AS edad FROM usuario join rol on id_rol_usuario=id_rol WHERE nombres_usuario NOT LIKE '' AND nombre_rol!='Paciente' ORDER BY id_usuario LIMIT 20";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchall();
            return $this->objetos;
        }
    }
    function crear($cedula,$nombres,$apellidos,$fecha_nacimiento,$sexo,$direccion,$correo,$password,$telefono,$rol){
        $sql = "SELECT id_usuario FROM usuario WHERE cedula_usuario=:cedula OR correo_usuario=:correo OR telefono_usuario=:telefono";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':cedula'=>$cedula,':correo'=>$correo,':telefono'=>$telefono));
        $this->objetos=$query->fetchall();
        if(!empty($this->objetos)){
            echo 'noadd';
        }
        else{
            $sql = "INSERT INTO usuario (id_usuario,cedula_usuario,nombres_usuario,apellidos_usuario,fechanacimiento_usuario,sexo_usuario,direccion_usuario,correo_usuario,password_usuario,telefono_usuario,id_rol_usuario) VALUES (NULL,:cedula,:nombres,:apellidos,:fecha_nacimiento,:sexo,:direccion,:correo,:password,:telefono,:rol);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':cedula'=>$cedula,':nombres'=>$nombres,':apellidos'=>$apellidos,':fecha_nacimiento'=>$fecha_nacimiento,':sexo'=>$sexo,':direccion'=>$direccion,':correo'=>$correo,':password'=>$password,':telefono'=>$telefono,':rol'=>$rol));
            echo 'add';
        }
    }
    function eliminar($id_usuario){
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
    function actualizar_usuario($id_usuario,$nombres,$apellidos,$sexo,$direccion,$correo,$telefono,$password,$rol){
        $sql="UPDATE usuario SET nombres_usuario=:nombres,apellidos_usuario=:apellidos,sexo_usuario=:sexo,direccion_usuario=:direccion,correo_usuario=:correo,password_usuario=:password,telefono_usuario=:telefono,id_rol_usuario=:rol WHERE id_usuario=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario,':nombres'=>$nombres,':apellidos'=>$apellidos,':sexo'=>$sexo,':direccion'=>$direccion,':correo'=>$correo,':password'=>$password,':telefono'=>$telefono,':rol'=>$rol));
        if(!empty($query->execute(array(':id'=>$id_usuario,':nombres'=>$nombres,':apellidos'=>$apellidos,':sexo'=>$sexo,':direccion'=>$direccion,':correo'=>$correo,':password'=>$password,':telefono'=>$telefono,':rol'=>$rol)))){
            echo 'actualizado';
        }
        else{
            echo 'noactualizado';
        }
    }
    
}
?>