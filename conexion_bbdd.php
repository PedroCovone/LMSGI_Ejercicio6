<?php

    $servidor = "bbdd";
    $usuario = "root";
    $contraseña = "bbddphp";
    $nombre_bbdd = "gamberro";

    $conexion = new mysqli($servidor, $usuario, $contraseña, $nombre_bbdd);

    if($conexion->connect_error){
        echo "Error: " . $conexion->connect_error;
    }




?>