<?php
    
    session_start();
    include "conexion_bbdd.php";
    
    if (isset($_GET["ID"])) {
        $_SESSION["ID_usuario"] = $_GET["ID"];
    }

    $ID_usuario = $_SESSION["ID_usuario"] ?? "";

   /* $consulta = "SELECT DISTINCT * FROM LIBROS";*/
   $consulta = "SELECT *
             FROM LIBROS
             INNER JOIN AUTORES
             ON LIBROS.Autor_id = AUTORES.ID";
    $resultado = $conexion->query($consulta);
    $libros = $resultado->fetch_all(MYSQLI_ASSOC);


    /*Listar géneros (no sé si ponerlo aquí o en el html)*/
    $listaGeneros = "SELECT DISTINCT Genero FROM LIBROS";
    $resultado = $conexion->query($listaGeneros);
    $generos = $resultado->fetch_all(MYSQLI_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        /*Filtro por títulos. Funciona, no lo toques Diego */
        if (!empty($_POST["titulo"])) {
            $titulo = $_POST["titulo"];
            $consultaTitulos = "SELECT LIBROS.*, AUTORES.Nombre AS NombreAutor
                            FROM LIBROS
                            INNER JOIN AUTORES ON LIBROS.Autor_id = AUTORES.ID
                            WHERE Titulo LIKE '%$titulo%'";
            $resultado = $conexion->query($consultaTitulos);
            $libros = $resultado->fetch_all(MYSQLI_ASSOC);
        }  
        if (!empty($_POST["autor"])) {
            $autor = trim($_POST["autor"]);
            $busqueda1 = $autor;                    
             $busqueda2 = str_replace('.', '', $autor);           
             $busqueda3 = str_replace(['.', ' '], '%', $autor);  
             $busqueda_limpia = preg_replace('/[\.\s,]+/', '', $autor);
            $consultaAutores = "SELECT LIBROS.*, AUTORES.Nombre AS NombreAutor
            FROM LIBROS
            INNER JOIN AUTORES ON LIBROS.Autor_id = AUTORES.ID
            WHERE AUTORES.Nombre LIKE '%$autor%'";
            $resultado = $conexion->query($consultaAutores);
            $libros = $resultado->fetch_all(MYSQLI_ASSOC);
        }  
        if (!empty($_POST["año"])) {
            $año = $_POST["año"];
            $consultaAños = "SELECT LIBROS.*, AUTORES.Nombre AS NombreAutor
                         FROM LIBROS
                         INNER JOIN AUTORES ON LIBROS.Autor_id = AUTORES.ID
                         WHERE LIBROS.Año LIKE '%$año%'";
            $resultado = $conexion->query($consultaAños);
            $libros = $resultado->fetch_all(MYSQLI_ASSOC);
        }
        if (!empty($_POST["Genero"])) {
            $genero = $_POST["Genero"];
            $consultageneros = "SELECT LIBROS.*, AUTORES.Nombre AS NombreAutor
                            FROM LIBROS
                            INNER JOIN AUTORES ON LIBROS.Autor_id = AUTORES.ID
                            WHERE Genero = '$genero'";
            $resultado = $conexion->query($consultageneros);
            $libros = $resultado->fetch_all(MYSQLI_ASSOC);
        }
         if (!empty($_POST["Editorial"])) {
            $Editorial = $_POST["Editorial"];
            $consultaEditorial = "SELECT LIBROS.*, AUTORES.Nombre AS NombreAutor
                              FROM LIBROS
                              INNER JOIN AUTORES ON LIBROS.Autor_id = AUTORES.ID
                              WHERE Editorial LIKE '%$Editorial%'";
            $resultado = $conexion->query($consultaEditorial);
            $libros = $resultado->fetch_all(MYSQLI_ASSOC);

    }if (!empty($_POST["Precio"])) {
            $Precio = $_POST["Precio"];
            $consultaPrecio = "SELECT LIBROS.*, AUTORES.Nombre AS NombreAutor
                           FROM LIBROS
                           INNER JOIN AUTORES ON LIBROS.Autor_id = AUTORES.ID
                           WHERE Precio LIKE '%$Precio%'";
            $resultado = $conexion->query($consultaPrecio);
            $libros = $resultado->fetch_all(MYSQLI_ASSOC);
    }

    }
?>

<html>

    <head>
        <meta charset="UTF-8">
    </head>

    <body>

        <h1>Listado de libros</h1>

        <form  method = "POST">

            <input type="text" name="titulo" placeholder="Título">

            <input type="text" name="autor" placeholder="Autor">

            <input type="number" name="año" placeholder="Año">

             <input type="text" name="Editorial" placeholder="Editorial">

              <input type="number" name="Precio" placeholder="Precio">

            <select name="Genero">
                <option value="">Género</option>
                <?php foreach ($generos as $genero): ?>
                <option value="<?php echo $genero["Genero"]; ?>"> <?php echo $genero["Genero"]; ?> </option>
                <?php endforeach; ?>>
            </select>

            <input type="submit">

        </form>

        <table border=1>
            <tr>
                <th>Reservar</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Año</th>
                <th>Género</th>
                <th>Editorial</th>
                <th>Precio</th>
            </tr>
            <?php foreach($libros as $libro): ?>
            <tr>

             <?php

            $consultaReserva = "SELECT * FROM RESERVAS WHERE Id_libro = ".$libro["Id"];
            $resultadoReserva = $conexion->query($consultaReserva);
            $reservaExiste = $resultadoReserva->fetch_all(MYSQLI_ASSOC);

            if (!empty($reservaExiste)){
                echo "<td>No disponible</td>";
            }else{
                echo "<td><a href='reservar_libro.php?ID_libro=".$libro["ID"]."&ID_usuario=".$_SESSION["ID_usuario"]."'>Reservar</a></td>";
            }

            ?>
                         
                <td><?php echo $libro["Titulo"]  ?? "" ?> </td>
                <td><?php echo $libro["NombreAutor"] ?? "";?></td>
                <td><?php echo $libro["Año"] ?> </td>
                <td><?php echo $libro["Genero"] ?> </td>
                <td><?php echo $libro["Editorial"] ?> </td>
                <td><?php echo $libro["Precio"] ?> </td>
            
                </tr>
            <?php endforeach; ?>

        </table>
    </body>

   </html>