<?php

class Database{
    public $host = 'localhost';// Servidor
    public $user ='root';// Usuario de phpmyadmin
    public $password ='Daiver94042210964*';// Contraseña phpmyadmin
    public $db ='regcontrol';// Base de datos
    public $conexion;

    function connectToDatabase(){
        $this->conexion= mysqli_connect( $this->host,$this->user,$this->password,$this->db);

        if( mysqli_connect_error() ){
            echo 'Error de conexion' . mysqli_connect_error();
        }

        return $this->conexion;

    }

}


?>

