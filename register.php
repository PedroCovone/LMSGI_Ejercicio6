<?php

	$servidor = "bbdd";
    $usuario = "root";
    $contraseña = "bbddphp";
    $nombre_bbdd = "bbddphp";

    $conexion = new mysqli($servidor, $usuario, $contraseña, $nombre_bbdd);

    if($conexion->connect_error){
        echo "Error: " . $conexion->connect_error;
    }
    else{
    //    echo "Base de datos conectada";
    }

	 if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$USER = $_POST["nombre"];
		$USER1 = $_POST["apellidos"];
		$PASS = $_POST["dni"];
        $Poblacion = $_POST["poblacion"];
		$consulta = "INSERT INTO USUARIOS(USER,USER1,PASS,Poblacion) VALUES ('$USER' ,'$USER1', '$PASS','$Poblacion')";
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
		<h1>Registrarse</h1>
		<h2>Rellene los siguientes campos:</h2>
		<form action = "" method="POST">
			<p>Nombre <input type="text" name="nombre" required> </p>
			<p>Apellidos: <input type="text" name="apellidos" required></p>
			<p>DNI:<input type="password" name ="dni" required></p>
			<p>Población:<input type="text" name ="población" required></p>
			<br>
			<a href="Login.php">Volver al inicio de sesión</a>
			<br>
			<input type="submit">
		</form>
	</body>


<html>