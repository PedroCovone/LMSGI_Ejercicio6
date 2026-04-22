<?php
    /*
    include "conexion_bbdd.php";

    $consulta = "SELECT DISTINCT * FROM PELICULAS";
    $resultado = $conexion->query($consulta);
    $autores = $resultado->fetch_all(MYSQLI_ASSOC);

    $ID_usuario = $_GET["ID"];
*/
    include "conexion_bbdd.php";

    
    $lista_directores = $conexion->query("SELECT DISTINCT Director FROM PELICULAS ORDER BY Director ASC")->fetch_all(MYSQLI_ASSOC);
    $lista_generos = $conexion->query("SELECT DISTINCT Genero FROM PELICULAS ORDER BY Genero ASC")->fetch_all(MYSQLI_ASSOC);
   
    
    $genero_sel = $_GET['genero'] ?? '';
    $director_sel = $_GET['director'] ?? '';
   

    $consulta = "SELECT * FROM PELICULAS WHERE 1=1";
    if (!empty($genero_sel))   $consulta .= " AND Genero = '" . $conexion->real_escape_string($genero_sel) . "'";
    if (!empty($director_sel)) $consulta .= " AND Director = '" . $conexion->real_escape_string($director_sel) . "'";
    
    $resultado = $conexion->query($consulta);
    $peliculas = $resultado->fetch_all(MYSQLI_ASSOC);

   

?>

<html>

    <head>
        <meta charset="UTF-8">
    </head>

    <body>

        <h1>Listado de películas</h1>

 
        <table>
            <tr>
                <th>Reservar</th>
                <th>Título</th>
                <th>Director</th>
                <th>Año</th>
                <th>Género</th>
            </tr>

            <?php foreach($autores as $autor): ?>
            <tr>
                <td><a href="reservar_pelicula.php?ID_pelicula=<?php echo $autor["ID"]?>&ID_usuario=<?php echo $ID_usuario ?>">[Reservar]</a></td>
                <td> <?php echo $autor["Titulo"] ?> </td>
                <td> <?php echo $autor["Director"] ?> </td>
                <td> <?php echo $autor["Año_estreno"] ?> </td>
                <td> <?php echo $autor["Genero"] ?> </td>
            </tr>
            <?php endforeach; ?>

        </table>
    </body>

   