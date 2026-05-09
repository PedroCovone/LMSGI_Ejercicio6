<?php

    include "conexion_bbdd.php";
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("Location: conexion.php");
        exit;
    }

    $consulta = "SELECT * FROM CLIENTES";
    $resultado = $conexion->query($consulta);
    $clientes = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<html>

    <head></head>

    <body>

        <h1>Listado de clientes</h1>
        <a href="nuevo_cliente.php">Crear nuevo cliente</a>
        <a href="lista_reservas.php">Ver reservas</a>

        <ul>
            <?php foreach($clientes as $cliente):?>
            <li><?php echo $cliente["NOMBRE"]?>
                <a href="editar_usuario.php?ID=<?php echo $cliente["ID"]?>">| (Editar</a>
                <a href="lista_peliculas.php?ID=<?php echo $cliente["ID"]?>">| Reservar película |</a>
                <a href="lista_libros.php?ID=<?php echo $cliente["ID"]?>">| Reservar libro |</a>    
                <a href="borrar_usuario.php?ID=<?php echo $cliente["ID"]?>">| Borrar)</a>
            </li>
            <?php endforeach;?>
        </ul>
       
        <p>Pez molón:</p>
        <img src="fish.gif">

    </body>

</html>