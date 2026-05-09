<?php
    include "conexion_bbdd.php";
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("Location: conexion.php");
        exit;
    }
    $titulo = $_POST["Titulo"];

    $nombreImagen = $_FILES["imagen"]["name"];
    $rutaImagen = $_FILES["imagen"]["tmp_name"];

    $rutaDestino = "IMG/" . $nombreImagen;
    if(move_uploaded_file($rutaImagen, $rutaDestino)){

       /* $consulta = insert into... 
       $conexion->query($consulta)*/
        move_uploaded_file($rutaImagen, $rutaDestino);
    }else
        echo "error";
    
?>


<html>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="titulo">
        <input type="file" name="imagen">
        <input type="submit">




    </form>

</html>