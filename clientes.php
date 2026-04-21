<?php

    include "conexion_bbdd.php";

    $consulta = "SELECT * FROM CLIENTES";
    $resultado = $conexion->query($consulta);
    $clientes = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<html>

    <head></head>

    <body>

        <h1>Listado de clientes</h1>
        <a href="nuevo_cliente.php">Crear nuevo cliente</a>

        <ul>
            <?php foreach($clientes as $cliente):?>
            <li><?php echo $cliente["NOMBRE"]?>
                <a href="editar_usuario.php?ID=<?php echo $cliente["ID"]?>">| (Editar</a>
                <a href="lista.php?ID=<?php echo $cliente["ID"]?>">| Reservar |</a>    
                <a href="borrar_usuario.php?ID=<?php echo $cliente["ID"]?>">| Borrar)</a>
            </li>
            <?php endforeach;?>
        </ul>
       
        <p>Pez molón:</p>
        <img src="fish.gif">

        <a href="lista.php">Listado películas</a>


    </body>

</html>