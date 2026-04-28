<?

    include "conexion_bbdd.php";

    $consulta = "SELECT * FROM LIBROS";
    $resultado = $conexion->query($consulta);
    $libros = $resultado

    /*
    
    */
    
    

?>

<html>

<?php foreach($libros as $libro): ?>
    <p>titulo: <?php echo $libro["Titulo"] ?> </p>
    <img height = "200px" width= "200px" src="img/<?php echo $libro["IMAGEN"] ?>"> 

    <?php endforeach; ?>


</html>

