<?php 

include_once('../config/database.php');
include_once('../config/config.php');

class UserSession extends Database {
    private $usuario;
    private $contraseña;

    public function userExists($user,$pass){
        $md5pass = md5($pass);

        $query = $this->connect()->prepare(' SELECT * FROM rc_usuarios WHERE cedula = :user AND contraseña = :pass ');
        $query->execute(['user'=>$user,'pass'=> $md5pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }

    }

    public function setUser($user){
        $query = $this->connect()->prepare(' SELECT * FROM rc_usuarios WHERE cedula = :user');
        $query->execute(['user'=>$user]);
        foreach($query as $correntUser){
            $this->usuario= $correntUser['usuario'];
            $this->username= $correntUser['username'];

        }
    }
    public function getNombre(){
        return $this->nombre;
    }
}



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R&C</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
    
</head>


<body>

<section class='seccion1'>
<img src="../imagenes/logo akt.png" alt="logo">
<h1>Iniciar Sesion</h1>
<form action="../index.html" method="POST" class="form1">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" placeholder='Cedula' name="usuario" required>
    <label for="contraseña">Contraseña:</label>
    <input type="password" id="contraseña" placeholder='Contraseña' name="contraseña" required>
    <input type="submit" value="Iniciar sesion">
    

</form>

</section>

</body>
</html>