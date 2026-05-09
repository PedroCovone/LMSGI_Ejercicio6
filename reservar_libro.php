<?php

    include "conexion_bbdd.php";
    $Id_libro = $_GET["ID_libro"];
    $ID_usuario = $_GET["ID_usuario"];


    $consulta1 = "SELECT NOMBRE FROM CLIENTES WHERE ID = $ID_usuario";
    $resultado1 = $conexion->query($consulta1);
    $usuario = $resultado1->fetch_all(MYSQLI_ASSOC);
    $nombre_usuario = $usuario[0]["NOMBRE"];

    $consulta2 = "SELECT Titulo FROM LIBROS WHERE Id = $Id_libro";
    $resultado2 = $conexion->query($consulta2);
    $libro = $resultado2->fetch_all(MYSQLI_ASSOC);
    $nombre_libro = $libro[0]["Titulo"];

    $fecha = date("d-m-y");


    if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $check = "SELECT * FROM RESERVAS WHERE Id_libro = '$Id_libro'";
    $resultado = $conexion->query($check);

    

    $consulta3 = "INSERT INTO RESERVAS(Id, Id_libro, Fecha_reserva) 
    VALUES ('$ID_usuario', '$Id_libro', '$fecha')";

    $resultado = $conexion->query($consulta3);

    if ($resultado == TRUE) {

        header("Location: reserva_realizada.php");
        exit();
    }

    echo "Error en la reserva: " . $conexion->error;
}
    

?>

<html>
    <head>

    </head>


    <body>
        <h1>Confirmar Reserva</h1>
        <h2>Cliente</h2>
            <p><?php echo $nombre_usuario ?></p>
        <h2>Película</h2>
            <p><?php echo $nombre_libro ?></p>
        </h2>
        <h2>Fecha reserva</h2>
            <p><?php echo $fecha ?></p>
        <h2>Duración préstamo</h2>
            <p>7 días</p>
<form method="POST"action="">
  <input type="submit" value="Reservar">
</form>
    </body>

</html>