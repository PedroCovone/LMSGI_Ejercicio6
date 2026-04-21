<?php

    include "conexion_bbdd.php";
    $ID_pelicula = $_GET["ID_pelicula"];
    $ID_usuario = $_GET["ID_usuario"];


    $consulta1 = "SELECT NOMBRE FROM CLIENTES WHERE ID = $ID_usuario";
    $resultado1 = $conexion->query($consulta1);
    $usuario = $resultado1->fetch_all(MYSQLI_ASSOC);
    $nombre_usuario = $usuario[0]["NOMBRE"];

    $consulta2 = "SELECT Titulo FROM PELICULAS WHERE ID = $ID_pelicula";
    $resultado2 = $conexion->query($consulta2);
    $pelicula = $resultado2->fetch_all(MYSQLI_ASSOC);
    $nombre_pelicula = $pelicula[0]["Titulo"];

    $fecha = date("d-m-y");

?>

<html>
    <head>

    </head>


    <body>
        <h1>Confirmar Reserva</h1>
        <h2>Cliente</h2>
            <p><?php echo $nombre_usuario ?></p>
        <h2>Película</h2>
            <p><?php echo $nombre_pelicula ?></p>
        </h2>
        <h2>Fecha reserva</h2>
            <p><?php echo $fecha ?></p>
        <h2>Duración préstamo</h2>
            <p>7 días</p>
      <!--   <h2>Fecha de devolución</h2>
       <?php //echo $fecha->modify('+1 day +3 month + 1 year'); ?> -->
<form method="GET"action="reserva_realizada.php?ID_pelicula=<?php echo $autor["ID"]?>&ID_usuario=<?php echo $ID_usuario ?>">
  <input type="submit" value="Reservar">
</form>
    </body>

</html>