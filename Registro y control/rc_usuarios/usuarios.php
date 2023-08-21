<?php

include_once('../config/config.php');
include('../config/database.php');

class usuario{

    public $conexion;

    function __construct()
    {

        $db = new Database();
        $this->conexion = $db->connectToDatabase();
    }

    function save($params){
        $usuario = $params['usuario'];
        $nombre = $params['nombre'];
        $apellido = $params['apellido'];
        $contraseña = $params['contraseña'];
        $correo = $params['correo'];
        $rol = $params['rol'];

        $checkQuery = "SELECT COUNT(*) as count FROM rc_usuarios WHERE cedula = '$usuario' OR correo = '$correo'";
        $result = mysqli_query($this->conexion, $checkQuery);
        $row = mysqli_fetch_assoc($result);
        $existingUsers = $row['count'];

    if ($existingUsers > 0) {
        
        return false;
    }

        $insert = " INSERT INTO rc_usuarios VALUES (NULL,'$usuario','$nombre','$apellido','$contraseña','$correo',1,'$rol',CURRENT_TIMESTAMP()) ";
        return mysqli_query($this->conexion,$insert);
    }

   
    function getAll(){

        $sql = "SELECT * FROM rc_usuarios";
        return mysqli_query($this->conexion,$sql);
    }

    function getOne($id){

    $sql="SELECT * FROM rc_usuarios WHERE id =$id";
    return mysqli_query($this->conexion,$sql);
    }

    function update($params){

        $usuario = $params['usuario'];
        $nombre = $params['nombre'];
        $apellido = $params['apellido'];
        $contraseña = $params['contraseña'];
        $correo = $params['correo'];
        $rol = $params['rol'];

        $update =" UPDATE rc_usuarios SET usuario='$usuario', nombre='$nombre',apellido='$apellido',contraseña='$contraseña',correo='$correo',rol='$rol' WHERE id = $id";
        return mysqli_query($this->conexion,$update);

    }

}



?>