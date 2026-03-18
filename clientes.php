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
        <a href="nuevo_cliente.html">Crear nuevo cliente</a>

        <ul>
            <?php foreach($clientes as $cliente):?>
            <li><?php echo $cliente["Nombre"]?></li>
                <a href="editar_usuario.php">Editar</a>
                <a href="borrar_usuario.php?ID=<?php echo $cliente["ID"]?>">Borrar</a>
            <?php endforeach;?>

        </ul>

        <form>
            <input type="text" name="nombre" value="<?php ?>">
        </form>
       
       <p>Pez molón:</p>
       <img src="fish.gif">

    </body>

</html>