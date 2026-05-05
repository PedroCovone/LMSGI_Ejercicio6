<?php
    
    include "conexion_bbdd.php";
    $ID_cliente = $_GET["Id"];
    $cliente = $_GET['Cliente'];
    $pelicula = $_GET['Pelicula']??"";
    $libro = $_GET['Libro']??"";
    $fecha = $_GET['Fecha'];

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $consulta = "DELETE FROM RESERVAS WHERE Id = $ID_cliente";
    $resultado = $conexion->query($consulta);

    if($resultado == true) {
        echo "Registro eliminado";
    }
    else {
        echo "Error al eliminar el registro, gamberrín";
    }
    }


?>

<html>
    <a href="lista_reservas.php">Volver</a>
    <h1>Eliminar reserva</h1>
    <h2>Cliente:</h2>
    <p><?php echo $cliente?></p>
    <?php if(!empty($pelicula)):?>
    <h2>Pelicula:</h2>
    <p><?php echo $pelicula?></p>
    <?php endif;?>
    <?php if(!empty($libro)):?>
    <h2>Libro:</h2>
    <p><?php echo $libro?></p>
    <?php endif;?>
    <h2>Fecha:</h2>
    <p><?php echo $fecha?></p>

<form action="" method="POST">
    <input type="submit">
    </form>




</html>