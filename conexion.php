<?php

    include "conexion_bbdd.php";
    session_start();


    $consulta = "SELECT * FROM USUARIOS";
    $resultado = $conexion->query($consulta);
    $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);
    
    $usuario_post = $_POST["nombre"] ?? "";
    $contraseña_post = $_POST["contraseña"] ?? "";
    $contraseña_hash = hash('sha256', $contraseña_post);
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        foreach($usuarios as $usuario){
            if($usuario["USER"] == $usuario_post && $usuario["PASS"] == $contraseña_hash) {
                $_SESSION["usuario"] = $usuario_post;
                header("Location: clientes.php");
                exit;
            }
        }
            echo "No se ha podido iniciar sesión :(";
        
    }
?>

<html>

	<head></head>
	
	<body>

		<h1>Inicio de sesión</h1>
		<form action = "" method="POST">
			<p>Usuario: <input type="text" name="nombre" required> </p>
			<p>Contraseña: <input type="password" name="contraseña" required></p>
			<br>
            <a href="nuevo_usuario.php">Registrarse</a>
            <br><br>
			<input type="submit">
		</form>
        <p>(Chuleta para iniciar sesión) [Usuario: admin | Contraseña: 1234]</p>

	</body>
	
</html>