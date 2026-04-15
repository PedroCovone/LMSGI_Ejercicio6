<?php
    include "conexion_bbdd.php";

    
    $lista_directores = $conexion->query("SELECT DISTINCT Director FROM PELICULAS ORDER BY Director ASC")->fetch_all(MYSQLI_ASSOC);
    $lista_generos = $conexion->query("SELECT DISTINCT Genero FROM PELICULAS ORDER BY Genero ASC")->fetch_all(MYSQLI_ASSOC);
   
    
    $genero_sel = $_GET['genero'] ?? '';
    $director_sel = $_GET['director'] ?? '';
   

    $consulta = "SELECT * FROM PELICULAS WHERE 1=1";
    if (!empty($genero_sel))   $consulta .= " AND Genero = '" . $conexion->real_escape_string($genero_sel) . "'";
    if (!empty($director_sel)) $consulta .= " AND Director = '" . $conexion->real_escape_string($director_sel) . "'";
    
    $resultado = $conexion->query($consulta);
    $peliculas = $resultado->fetch_all(MYSQLI_ASSOC);

   

?>

<html>
    <head><meta charset="UTF-8"></head>
    <body>
        <h1>Listado de películas</h1>

        <form method="GET" action="">
            <select name="genero">
                <option value="">-- Todos los Géneros --</option>
                <?php foreach($lista_generos as $g): ?>
                    <option value="<?php echo $g['Genero']; ?>" <?php if($genero_sel == $g['Genero']) echo 'selected'; ?>>
                        <?php echo $g['Genero']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select name="director">
                <option value="">-- Todos los Directores --</option>
                <?php foreach($lista_directores as $d): ?>
                    <option value="<?php echo $d['Director']; ?>" <?php if($director_sel == $d['Director']) echo 'selected'; ?>>
                        <?php echo $d['Director']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <label for="start">Años:</label>

             <input
              type="date"
              id="Año_estreno"
              name="trip-start"
              value=""
              min="1943-01-01"
              max="2018-01-01" />

          
            <button type="submit">Aplicar filtros</button>
            <a href="peliculas.php">Limpiar</a>
        </form>

        <hr>

        <ul>
            <?php foreach($peliculas as $p): ?>
                <li>
                    <a href="reservar_pelicula.php?ID=<?php echo $p["ID"]?>">[reservar]</a>
                    <?php echo $p["Titulo"] . " | " . $p["Director"]; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>