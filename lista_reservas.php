<?php

    include "conexion_bbdd.php";

$consultaPeliculas = "
SELECT CLIENTES.NOMBRE, PELICULAS.Titulo, RESERVAS.Fecha_reserva, RESERVAS.Id, RESERVAS.Id_pelicula
FROM RESERVAS
JOIN CLIENTES ON RESERVAS.Id = CLIENTES.ID
JOIN PELICULAS ON RESERVAS.id_pelicula = PELICULAS.ID
";
    $resultado = $conexion->query($consultaPeliculas);
    $peliculas = $resultado->fetch_all(MYSQLI_ASSOC);


    $consultaLibros = "
SELECT CLIENTES.NOMBRE, LIBROS.Titulo, RESERVAS.Fecha_reserva, RESERVAS.Id, RESERVAS.Id_libro
FROM RESERVAS
JOIN CLIENTES ON RESERVAS.Id = CLIENTES.ID
JOIN LIBROS ON RESERVAS.id_libro = LIBROS.ID
";
    $resultado = $conexion->query($consultaLibros);
    $libros = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<html>
    <h1>Listado de Reservas</h1>
    <a href="clientes.php">Volver</a>
    <h2>Películas</h2>
    <table border=1>
        <tr>
            <th>Cliente</th>
            <th>Película</th>
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
            Fecha=<?php echo $dato['Fecha_reserva']?>&
            Id_pelicula=<?php echo $dato['Id_pelicula']?>">Borrar</a></td>
        </tr>
        <?php endforeach; ?>
    </table>



    <h2>Libros</h2>
    <table border=1>
        <tr>
            <th>Cliente</th>
            <th>Libro</th>
            <th>Fecha</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($libros as $dato): ?>
        <tr>
            <td> <?php echo $dato['NOMBRE'] ?> </td>
            <td> <?php echo $dato['Titulo'] ?> </td>
            <td> <?php echo $dato['Fecha_reserva'] ?> </td>
            <td> <a href="eliminar_reserva.php?Id=<?php echo $dato['Id']?>&
                        Cliente=<?php echo $dato['NOMBRE']?>&
                                    Pelicula=<?php echo $dato['Titulo']?>&

            Fecha=<?php echo $dato['Fecha_reserva']?>&
            Id_libro=<?php echo $dato['Id_libro']?>"

            >Borrar</a></td>
        </tr>
        <?php endforeach; ?>
    </table>



</html>
