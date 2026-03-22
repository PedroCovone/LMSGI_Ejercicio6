<?php

    include "conexion_bbdd.php";

    $consulta = "SELECT * FROM USUARIOS";
    $resultado = $conexion->query($consulta);
    $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);
    
    $usuario_post = $_POST["nombre"] ?? "";
    $contraseña_post = $_POST["contraseña"] ?? "";
    
    //print_r($usuarios);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach($usuarios as $usuario){
            if($usuario["USER"] == $usuario_post && $usuario["PASS"] == $contraseña_post) {
                header("Location: clientes.php");
            }
            else{
                echo "No se ha podido iniciar sesión :(";
            }
        }
    }
?>

<html>

	<head></head>
	
	<body>

		<h1>Inicio de sesión</h1>
		<form action = "" method="POST">
			<p>Usuario: <input type="text" name="nombre" required> </p>
			<p>Contraseña: <input type="password" name="contraseña" required></p>
			<br><br>
			<input type="submit">
		</form>
        <p>(Chuleta para iniciar sesión) [Usuario: admin | Contraseña: 1234]</p>

	</body>
	
</html>