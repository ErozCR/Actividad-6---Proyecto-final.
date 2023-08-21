<style>
    table {
        border-collapse: collapse;
        width: 100%;
        background-color: #333;
        color: white;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }


    th {
        background-color: #555;
    }

    tr:nth-child(even) {
        background-color: #444;
    }

    tr:hover {
        background-color: #666;
    }
    .left input[type="submit"] {
  display: inline-block;
}
</style>
<?php

include_once('../config/config.php');
include('usuarios.php');

$consulta = new usuario();
$data = $consulta->getAll();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Usuarios</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<header>
    <nav>
        <a href="../index.html"><img src="../imagenes/logo akt.png" alt="logo"></a>
        <ul>
            <li><a href="./registro_usuarios.php">Usuarios</a></li>
        </ul>
    </nav>
</header>
<body>
    <div class="contenedor"></div>
    <h1>Consulta Usuarios</h1>
    <div class ="row">

    <div class="left">
            <input type="text" id="filtro" placeholder='Filtrar por cedula' name="usuario">
    </div>
            

        <?php


if ($data->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>Seleccionar</th> <!-- Nueva columna para selección -->
            <th>Id</th>
            <th>Cédula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Contraseña</th>
            <th>Correo</th>
            <th>Estado</th>
            <th>Rol</th>
            <th>Fecha de Modificación</th>
        </tr>";

        while ($row = mysqli_fetch_object($data)) {
            
            echo "<tr>";
            echo "<td><input type='checkbox' name='selected_rows[]' value='$row->id'></td>"; // Nueva celda con checkbox
            echo "<td>$row->id</td>";
            echo "<td>$row->cedula</td>";
            echo "<td>$row->nombre</td>";
            echo "<td>$row->apellido</td>";
            echo "<td>$row->contraseña</td>";
            echo "<td>$row->correo</td>";
            echo "<td>$row->estado</td>";
            echo "<td>$row->rol</td>";
            echo "<td>$row->fecha_modificacion</td>";
            echo "</tr>";

        }

        echo"</table>";
        
    }else {
        echo "No se encontraron datos en la tabla rc_usuarios.";
    }
        ?>

    
<section class="left">
<input type="submit" value="Eliminar">
  <input type="submit" value="Modificar">
</section>
 
<script>
    document.getElementById("filtro").addEventListener("input", function () {
        var filtro = this.value.toLowerCase();
        var rows = document.querySelectorAll("table tr");

        for (var i = 1; i < rows.length; i++) {
            var cedulaCell = rows[i].querySelector("td:nth-child(3)");
            if (cedulaCell) {
                var cedula = cedulaCell.textContent.toLowerCase();
                if (cedula.includes(filtro)) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    });
</script>


</body>
</html>