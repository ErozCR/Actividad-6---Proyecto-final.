<?php

include_once('../config/config.php');
include('usuarios.php');

$um = new Usuarioedit();
$dum =$um->getOne($_GET['id']);

if(isset($_POST)$$ !empty($_POST)){
    $update=$um->update($_POST);
    if($update){
        $mensaje='Datos actualizados correctamente';
    } else{
        $mensaje='Datos no fueron actualizados';

    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar usuarios</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
</head>
<header>
    <nav>
        <a href="../index.html"><img src="../imagenes/logo akt.png" alt="logo"></a>
        <ul>
            <li><a href="./registro_usuarios.php">Registro Usuarios</a></li>
        </ul>
    </nav>
</header>
<body>

    <?php if(isset($mensaje)){
        echo $mensaje;
    }
    
    ?>
    
   

    <h3>Control de usuarios</h3>
    <section class="section1">
        <form action="registro_usuarios.php" method="POST">
            <label for="Cedula">Cedula:</label>
            <input type="text" id="usuario" placeholder='Cedula' name="usuario" required value="<?=$dum->usuario?>">
            <label for="Nombre">Nombre:</label>
            <input type="text" id="nombre" placeholder='Nombre' name="nombre" required value="<?=$dum->nombre?>">
            <label for="Apellido">Apellido:</label>
            <input type="text" id="apellido" placeholder='Apellido' name="apellido" required value="<?=$dum->apellido?>">
            <label for="Nombre">Contraseña:</label>
            <input type="password" id="contraseña" placeholder='Contraseña' name="contraseña" required value="<?=$dum->contraseña?>">
            <label for="Correo">Correo:</label>
            <input type="text" id="correo" placeholder='Correo' name="correo" required value="<?=$dum->correo?>">
            <label for="Rol">Rol:</label>
            <input type="text" id="rol" placeholder='Rol' name="rol" required value="<?=$dum->rol?>">
            <!-- <select name="Rol" id="rol">
                <option value="Admin">Admin</option>
            </select> -->
            <input type="submit" value="Guardar">
            
        </form>
    </section>
</body>
</html>