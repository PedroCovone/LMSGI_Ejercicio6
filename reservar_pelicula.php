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


    if ($_SERVER["REQUEST_METHOD"] == "POST"){

       $check = "SELECT * FROM RESERVAS WHERE Id_pelicula = '$ID_pelicula'";
       $resultado = $conexion->query($check);

        if ($resultado->num_rows > 0){
       echo "Película ya reservada";
       exit();
        }
        
        $consulta3 = "INSERT INTO RESERVAS(Id, Id_pelicula, Fecha_reserva) 
		VALUES ('$ID_usuario', '$ID_pelicula', '$fecha')";
		$resultado = $conexion->query($consulta3);

		if ($resultado == TRUE) {
			header("Location:reserva_realizada.php");
		} else {
			echo "Error en la inserción: " . $conexion->error;
		}
		
		$conexion->close();
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
            <p><?php echo $nombre_pelicula ?></p>
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