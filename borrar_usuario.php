<?php   
    include "conexion_bbdd.php";
    $idUsuario = $_GET["ID"];
    
    $consulta = "DELETE FROM CLIENTES WHERE ID = $idUsuario";

    $resultado = $conexion->query($consulta);

    if($resultado == true) {
        echo "Registro eliminado";
    }
    else {
        echo "Error al eliminar el registro, gamberrín";
    }


?>