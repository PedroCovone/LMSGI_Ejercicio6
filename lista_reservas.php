<?php

    include "conexion_bbdd.php";

    $consultaPeliculas = "SELECT CLIENTES.NOMBRE, PELICULAS.Titulo, RESERVAS.Fecha_reserva, RESERVAS.Id
    FROM RESERVAS JOIN CLIENTES ON RESERVAS.Id = CLIENTES.ID 
    JOIN PELICULAS ON RESERVAS.Id_pelicula = PELICULAS.ID";
    $resultado = $conexion->query($consultaPeliculas);
    $peliculas = $resultado->fetch_all(MYSQLI_ASSOC);


    $consultaLibros = "SELECT CLIENTES.NOMBRE, LIBROS.Titulo, RESERVAS.Fecha_reserva, RESERVAS.Id
    FROM RESERVAS JOIN CLIENTES ON RESERVAS.Id = CLIENTES.ID 
    JOIN LIBROS ON RESERVAS.Id_libro = LIBROS.ID";
    $resultado = $conexion->query($consultaLibros);
    $libros = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<html>
    <h1>Listado de Reservas</h1>
    <h2>Películas</h2>
    <table border=1>
        <tr>
            <th>Cliente</th>
            <th>Prlícula</th>
            <th>Fecha</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($peliculas as $dato): ?>
        <tr>
            <td> <?php echo $dato['NOMBRE'] ?> </td>
            <td> <?php echo $dato['Titulo'] ?> </td>
            <td> <?php echo $dato['Fecha_reserva'] ?> </td>
        <!-- Se puede simplificar mucho pasando solo la ID y haciendo una consulta en la otra página-->
            <td> <a href="eliminar_reserva.php?
            Id=<?php echo $dato['Id']?>&
            Cliente=<?php echo $dato['NOMBRE']?>&
            Pelicula=<?php echo $dato['Titulo']?>&
            Fecha=<?php echo $dato['Fecha_reserva']?>">Borrar</a></td>
        </tr>
        <?php endforeach; ?>
    </table>



    <h2>Libros</h2>
    <table border=1>
        <tr>
            <th>Cliente</th>
            <th>Prlícula</th>
            <th>Fecha</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($libros as $dato): ?>
        <tr>
            <td> <?php echo $dato['NOMBRE'] ?> </td>
            <td> <?php echo $dato['Titulo'] ?> </td>
            <td> <?php echo $dato['Fecha_reserva'] ?> </td>
            <td> <a href="eliminar_reserva.php?Id=<?php echo $dato['Id']?>">Borrar</a></td>
        </tr>
        <?php endforeach; ?>
    </table>



</html>
