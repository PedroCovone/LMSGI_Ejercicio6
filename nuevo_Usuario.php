<?php

    include "conexion_bbdd.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario=$_POST["usuario"];
        $contraseña=$_POST["contraseña"];
        $hash_contraseña = hash('sha256' , $contraseña);
        $consulta = "INSERT INTO USUARIOS(USER, PASS) VALUES('$usuario','$hash_contraseña')";
        $resultado = $conexion->query($consulta);
        /* Falta hacer un "if resultado = true" o reenviarlo a otra página */
    }

?>


<html>
    <a href="clientes.php">Volver</a>
    <h1>Registrarse</h1>
    <form action = "" method="POST">
		<p>Usuario: <input type="text" name="usuario" required> </p>
		<p>Contraseña: <input type="password" name="contraseña" required></p>
        <br><br>
		<input type="submit">
	</form>

</html>