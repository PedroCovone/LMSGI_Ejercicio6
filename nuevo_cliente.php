<?php

    include "conexion_bbdd.php";

	 if ($_SERVER["REQUEST_METHOD"] == "POST"){

		$NOMBRE = $_POST["nombre"];
		$APELLIDOS = $_POST["apellidos"];
		$DNI = $_POST["dni"];
		$DIRECCION = $_POST["direccion"];
        $POBLACION = $_POST["poblacion"];

		$consulta = "INSERT INTO CLIENTES(NOMBRE, APELLIDOS, DNI, DIRECCION, POBLACION) 
		VALUES ('$NOMBRE','$APELLIDOS','$DNI','$DIRECCION','$POBLACION')";
		$resultado = $conexion->query($consulta);

		if ($resultado == TRUE) {
			header("Location:registrado.html");
		} else {
			echo "Error en la inserción: " . $conexion->error;
		}
		
		$conexion->close();
	 }
?>

<html>

    <body>
		<h1>NUEVO CLIENTE</h1>
		<h2>Rellene los siguientes campos:</h2>
		<form action = "" method="POST">
			<p>Nombre <input type="text" name="nombre" required> </p>
			<p>Apellidos: <input type="text" name="apellidos" required></p>
			<p>DNI:<input type="text" name ="dni" required></p>
			<p>Dirección:<input type="text" name ="direccion" required></p>
			<p>Población:<input type="text" name ="poblacion" required></p>
			<br>
			<a href="clientes.php">Volver</a>
			<br><br>
			<input type="submit">
		</form>
	</body>

<html>