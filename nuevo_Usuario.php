<?php

    include "conexion_bbdd.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario=$_POST["usuario"];
        $contraseña=$_POST["contraseña"];
        $hash_contraseña = hash('sha512' , $contraseña);
        $consulta = "INSERT INTO USUARIOS(USER, PASS, NAME) VALUES('$usuario','$hash_contraseña', 'prueba')";
        $resultado = $conexion->query($consulta);
    }

?>


<html>

    <h1>Registrarse</h1>
    <form action = "" method="POST">
		<p>Usuario: <input type="text" name="usuario" required> </p>
		<p>Contraseña: <input type="password" name="contraseña" required></p>
        <br><br>
		<input type="submit">
	</form>

</html>