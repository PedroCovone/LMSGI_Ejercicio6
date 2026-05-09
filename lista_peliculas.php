<?php
    
    session_start();
    include "conexion_bbdd.php";
    
    if (!isset($_SESSION["usuario"])) {
        header("Location: conexion.php");
        exit;
    }
    
    if (isset($_GET["ID"])) {
        $_SESSION["ID_usuario"] = $_GET["ID"];
    }
   
    $ID_usuario = $_SESSION["ID_usuario"] ?? "";
    

    $consulta = "SELECT DISTINCT * FROM PELICULAS";
    $resultado = $conexion->query($consulta);
    $peliculas = $resultado->fetch_all(MYSQLI_ASSOC);

    $listapeliculas = "SELECT DISTINCT Id_pelicula FROM RESERVAS";
    $resultado = $conexion->query($listapeliculas);
    $reserva = $resultado->fetch_all(MYSQLI_ASSOC);

    /*Listar géneros (no sé si ponerlo aquí o en el html)*/
    $listaGeneros = "SELECT DISTINCT Genero FROM PELICULAS";
    $resultado = $conexion->query($listaGeneros);
    $generos = $resultado->fetch_all(MYSQLI_ASSOC);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        /*Filtro por títulos. Funciona, no lo toques Diego */
        if (!empty($_POST["titulo"])) {
            $titulo = $_POST["titulo"];
            $consultaTitulos = "SELECT * FROM PELICULAS WHERE Titulo LIKE '%$titulo%'";
            $resultado = $conexion->query($consultaTitulos);
            $peliculas = $resultado->fetch_all(MYSQLI_ASSOC);
        }  
        if (!empty($_POST["director"])) {
            $director = $_POST["director"];
            $consultaDirectores = "SELECT * FROM PELICULAS WHERE Director LIKE '%$director%'";
            $resultado = $conexion->query($consultaDirectores);
            $peliculas = $resultado->fetch_all(MYSQLI_ASSOC);
        }  
        if (!empty($_POST["año"])) {
            $año = $_POST["año"];
            $consultaAños = "SELECT * FROM PELICULAS WHERE Año_estreno LIKE '%$año%'";
            $resultado = $conexion->query($consultaAños);
            $peliculas = $resultado->fetch_all(MYSQLI_ASSOC);
        }
        if (!empty($_POST["Genero"])) {
            $genero = $_POST["Genero"];
            $consultageneros = "SELECT * FROM PELICULAS WHERE Genero = '$genero'";
            $resultado = $conexion->query($consultageneros);
            $peliculas = $resultado->fetch_all(MYSQLI_ASSOC);
        }
    }

    if(!empty($_POST["RESERVAS"])) {
        $reserva = $_POST["RESERVAS"];
        $consultareserva = "SELECT * FROM RESERVAS WHERE Id_pelicula = '1'";
        $resultado = $conexion->query($consultareserva);
        $reserva = $resultado->fetch_all(MYSQLI_ASSOC);
        }
     $idsReservados = [];

    foreach ($reserva as $r){
    $idsReservados[] = $r["Id_pelicula"];
}

?>

<html>

    <head>
        <meta charset="UTF-8">
    </head>

    <body>

        <h1>Listado de películas</h1>

        <form  method = "POST">

            <input type="text" name="titulo" placeholder="Título">

            <input type="text" name="director" placeholder="director">

            <input type="number" name="año" placeholder="año">

            <select name="Genero">
                <option value="">Género</option>
                <?php foreach ($generos as $genero): ?>
                <option value="<?php echo $genero["Genero"]; ?>"> <?php echo $genero["Genero"]; ?> </option>
                <?php endforeach; ?>>
            </select>

            <input type="submit">

        </form>

        <table border=1>
            <tr>
                <th>Reservar</th>
                <th>Título</th>
                <th>Director</th>
                <th>Año</th>
                <th>Género</th>
            </tr>
            <?php foreach($peliculas as $pelicula): ?>
            <tr>

            <?php

            $consultaReserva = "SELECT * FROM RESERVAS WHERE Id_pelicula = ".$pelicula["ID"];
            $resultadoReserva = $conexion->query($consultaReserva);
            $reservaExiste = $resultadoReserva->fetch_all(MYSQLI_ASSOC);

            if (!empty($reservaExiste)){
                echo "<td>No disponible</td>";
            }else{
                echo "<td><a href='reservar_pelicula.php?ID_pelicula=".$pelicula["ID"]."&ID_usuario=".$_SESSION["ID_usuario"]."'>Reservar</a></td>";
            }

            ?>
                         
                <td><?php echo $pelicula["Titulo"] ?? "" ?></td>
                <td><?php echo $pelicula["Director"] ?? "" ?></td>
                <td><?php echo $pelicula["Año_estreno"] ?? "" ?></td>
                <td><?php echo $pelicula["Genero"] ?? "" ?></td>

                </tr>
            <?php endforeach; ?>

        </table>
    </body>

   </html>