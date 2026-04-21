<?php

    $servidor = "bbdd";
    $usuario = "root";
    $contraseña = "bbddphp";
    $nombre_bbdd = "bbddphp";

    $conexion = new mysqli($servidor, $usuario, $contraseña, $nombre_bbdd);
    $conexion->set_charset("utf8");

    if($conexion->connect_error){
        echo "Error: " . $conexion->connect_error;
    }




?>