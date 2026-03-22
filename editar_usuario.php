<?php

    include "conexion_bbdd.php";

    $ID_usuario = $_GET["ID"];

    $consulta = "SELECT * FROM CLIENTES WHERE ID = $ID_usuario";
    $resultado = $conexion->query($consulta);
    $usuario = $resultado->fetch_all(MYSQLI_ASSOC);

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $NOMBRE = $_POST["nombre"];
            $APELLIDOS = $_POST["apellidos"];
            $DNI = $_POST["dni"];
            $DIRECCION = $_POST["direccion"];
            $POBLACION = $_POST["poblacion"];
            
            $consulta = "UPDATE CLIENTES SET NOMBRE = '$NOMBRE' , APELLIDOS = '$APELLIDOS' , 
            DNI = '$DNI' , DIRECCION = '$DIRECCION' , POBLACION = '$POBLACION' WHERE ID = $ID_usuario";
            $resultado = $conexion->query($consulta);

            if ($resultado == TRUE) {
			header("Location:cliente_editado.html");
            exit();
            } else {
                echo "Error al actualizar el registro: " . $conexion->error;
            }
        }
?>

<html>

    <body>

        <h1>Editar Cliente</h1>

        <h2>Datos antiguos</h2>
            <p>Nombre: <?php echo $usuario[0]["NOMBRE"]?></p> 
            <p>Apellidos: <?php echo $usuario[0]["APELLIDOS"]?></p>
            <p>DNI: <?php echo $usuario[0]["DNI"]?></p>
            <p>Dirección: <?php echo $usuario[0]["DIRECCION"]?></p>
            <p>Población: <?php echo $usuario[0]["POBLACION"]?></p>
        
        <h2>Datos nuevos</h2>
            <form action = "" method="POST">
                <p>Nombre <input type="text" value= "<?php echo $usuario[0]["NOMBRE"]?>" name="nombre" required> </p>
                <p>Apellidos: <input type="text" value="<?php echo $usuario[0]["APELLIDOS"]?>" name="apellidos" required></p>
                <p>DNI: <input type="text" value="<?php echo $usuario[0]["DNI"]?>" name="dni" required></p>
                <p>Dirección: <input type="text" value="<?php echo $usuario[0]["DIRECCION"]?>" name="direccion" required></p>
                <p>Población: <input type="text" value="<?php echo $usuario[0]["POBLACION"]?>" name="poblacion" required></p>
                <br>
                <input type="submit" value="confirmar">
            </form>

    </body>

</html>