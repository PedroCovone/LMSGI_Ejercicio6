<?php
    
    include "conexion_bbdd.php";

    $ID_usuario = $_GET["ID"];

    $consulta = "SELECT DISTINCT * FROM PELICULAS";
    $resultado = $conexion->query($consulta);
    $peliculas = $resultado->fetch_all(MYSQLI_ASSOC);

    session_start();

?>

<html>

    <head>
        <meta charset="UTF-8">
    </head>

    <body>

        <h1>Listado de películas</h1>

        <form>
            <input


        </form>

        <table>
            <tr>
                <th>Reservar</th>
                <th>Título</th>
                <th>Director</th>
                <th>Año</th>
                <th>Género</th>
            </tr>

            <?php foreach($peliculas as $peliculas): ?>
            <tr>
                <td><a href="reservar_pelicula.php?ID_pelicula=<?php echo $peliculas["ID"]?>&ID_usuario=<?php echo $ID_usuario ?>">[Reservar]</a></td>
                <td> <?php echo $peliculas["Titulo"] ?> </td>
                <td> <?php echo $peliculas["Director"] ?> </td>
                <td> <?php echo $peliculas["Año_estreno"] ?> </td>
                <td> <?php echo $peliculas["Genero"] ?> </td>

                </tr>
            <?php endforeach; ?>

        </table>
    </body>

   </html>