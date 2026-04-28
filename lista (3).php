<?php
    
    include "conexion_bbdd.php";

   

    $consulta0 = "SELECT DISTINCT * FROM PELICULAS";
    $resultado0 = $conexion->query($consulta0);
    $autores = $resultado0->fetch_all(MYSQLI_ASSOC);


    $ID_usuario = $_GET["ID"];

    $titulo = $_GET['titulo'] ?? "";
    $genero = $_GET['genero'] ?? "";
    $anio = $_GET['anio'] ?? "";
    $director = $_GET['director'] ?? "";

 
    
    $lista_directores = $conexion->query("SELECT DISTINCT Director FROM PELICULAS ORDER BY Director ASC")->fetch_all(MYSQLI_ASSOC);
    $lista_generos = $conexion->query("SELECT DISTINCT Genero FROM PELICULAS ORDER BY Genero ASC")->fetch_all(MYSQLI_ASSOC);
   
    
    $genero_sel = $_GET['genero'] ?? '';
    $director_sel = $_GET['director'] ?? '';
   

    $consulta = "SELECT * FROM PELICULAS WHERE 1=1";
   
   if (!empty($genero_sel)){
    $consulta .= " AND Genero = '" . $conexion->real_escape_string($genero_sel) . "'";
}

if (!empty($director_sel)){
    $consulta .= " AND Director = '" . $conexion->real_escape_string($director_sel) . "'";
}

if ($titulo != ""){
    $consulta .= " AND Titulo LIKE '%$titulo%'";
}

if ($anio != ""){
    $consulta .= " AND Año_estreno = $anio";
}
    $resultado = $conexion->query($consulta);
    $peliculas = $resultado->fetch_all(MYSQLI_ASSOC);

   

  

?>

<html>

    <head>
        <meta charset="UTF-8">
    </head>

    <body>

       <form method="GET" action="lista (3).php">
    <input type="text" name="titulo" placeholder="Buscar por título">

     <select name="genero">
        <option value="">-- Género --</option>

        <?php foreach($lista_generos as $g){ ?>
            <option value="<?php echo $g['Genero']; ?>">
                <?php echo $g['Genero']; ?>
            </option>
        <?php } ?>

    </select>

    <input type="number" name="anio" placeholder="Año">

     <select name="director">
        <option value="">-- Director --</option>

        <?php foreach($lista_directores as $d){ ?>
            <option value="<?php echo $d['Director']; ?>">
                <?php echo $d['Director']; ?>
            </option>
        <?php } ?>

    </select>

    <button type="submit">Filtrar</button>
</form>

    <button type="submit">Filtrar</button>
    </form>

        <h1>Listado de películas</h1>

 
        <table>
            <tr>
                <th>Reservar</th>
                <th>Título</th>
                <th>Director</th>
                <th>Año</th>
                <th>Género</th>
            </tr>

            <?php foreach($peliculas as $autor): ?>
            <tr>
                <td><a href="reservar_pelicula.php?ID_pelicula=<?php echo $autor["ID"]?>&ID_usuario=<?php echo $ID_usuario ?>">[Reservar]</a></td>
                <td> <?php echo $autor["Titulo"] ?> </td>
                <td> <?php echo $autor["Director"] ?> </td>
                <td> <?php echo $autor["Año_estreno"] ?> </td>
                <td> <?php echo $autor["Genero"] ?> </td>

                </tr>
            <?php endforeach; ?>

        </table>
    </body>

   </html>