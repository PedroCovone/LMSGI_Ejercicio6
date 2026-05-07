-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: bbdd
-- Tiempo de generación: 07-05-2026 a las 17:26:07
-- Versión del servidor: 5.7.44
-- Versión de PHP: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbddphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AUTORES`
--

CREATE TABLE `AUTORES` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(100) CHARACTER SET latin1 NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `LUGAR` varchar(100) CHARACTER SET latin1 NOT NULL,
  `FECHA_DEFUNCION` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `AUTORES`
--

INSERT INTO `AUTORES` (`ID`, `NOMBRE`, `FECHA_NACIMIENTO`, `LUGAR`, `FECHA_DEFUNCION`) VALUES
(1, 'J. R. R. Tolkien', '1892-01-03', 'Bloemfontein', '1973-09-02'),
(2, 'Ernest Hemingway', '1899-07-21', 'Oak Park', '1961-07-02'),
(3, 'C. S. Lewis', '1898-11-29', 'Belfast', '1963-11-22'),
(4, 'Susan E. Hinton', '1948-07-22', 'Tulsa', NULL),
(5, 'J. K. Rowling', '1965-07-31', 'Yate', NULL),
(6, 'George R. R. Martin', '1948-09-20', 'Bayonne', NULL),
(7, 'Fred Uhlman', '1901-01-19', 'Stuttgart', '1985-04-11'),
(8, 'Joël Dicker', '1985-06-16', 'Ginebra', NULL),
(9, 'Mary Ann Shaffer', '1934-12-13', 'Martinsburg', '2008-02-16'),
(10, 'Patricia García-Rojo', '1984-09-24', 'Jaén', NULL),
(11, 'Mark Haddon', '1962-10-28', 'Northampton', NULL),
(12, 'Berlie Doherty', '1943-11-06', 'Knotty Ash', NULL),
(13, 'Jane Austen', '1775-12-16', 'Steventon', '1817-07-18'),
(14, 'Mitch Albom', '1958-05-23', 'Passaic', NULL),
(15, 'David Lozano', '1974-10-30', 'Zaragoza', NULL),
(16, 'María Menéndez-Ponte', '1962-01-01', 'Coruña', NULL),
(17, 'Gabriel García Márquez', '1927-03-06', 'Aracataca', '2014-04-17'),
(18, 'Patrick Rothfuss', '1973-06-06', 'Madison', NULL),
(19, 'Michael Ende', '1929-11-12', 'Garmisch-Partenkirchen', '1995-08-28'),
(20, 'Brandon Sanderson', '1975-12-19', 'Lincoln', NULL),
(21, 'Philip K. Dick', '1928-12-16', 'Illinois', '1982-03-02'),
(22, 'Carlos Ruiz Zafón', '1964-09-25', 'Barcelona', '2020-06-19'),
(23, 'Laura Gallego', '1977-10-11', 'Cuart de Poblet', NULL),
(24, 'R. L. Stevenson', '1850-11-13', 'Edimburgo', '1894-12-03'),
(25, 'Roald Dahl', '1916-09-13', 'Llandaff', '1990-11-23'),
(26, 'Scott Fitzgerald', '1986-09-26', 'Minnesota', '1940-12-21'),
(27, 'Ray Bradbury ', '1920-08-22', 'Illinois', '2012-06-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CLIENTES`
--

CREATE TABLE `CLIENTES` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_bin NOT NULL,
  `APELLIDOS` varchar(50) COLLATE utf8_bin NOT NULL,
  `DNI` varchar(11) COLLATE utf8_bin NOT NULL,
  `DIRECCION` text COLLATE utf8_bin NOT NULL,
  `POBLACION` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `CLIENTES`
--

INSERT INTO `CLIENTES` (`ID`, `NOMBRE`, `APELLIDOS`, `DNI`, `DIRECCION`, `POBLACION`) VALUES
(1, 'Prueba', 'Pruebez', '12345A', 'CallePrueba1', 'Pruebia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LIBROS`
--

CREATE TABLE `LIBROS` (
  `Id` int(2) NOT NULL,
  `Titulo` varchar(63) CHARACTER SET latin1 DEFAULT NULL,
  `Autor_id` int(2) DEFAULT NULL,
  `Genero` varchar(17) CHARACTER SET latin1 DEFAULT NULL,
  `Editorial` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `Paginas` int(3) DEFAULT NULL,
  `Año` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `Precio` decimal(4,2) DEFAULT NULL,
  `ESTADO` varchar(20) COLLATE utf8_bin DEFAULT 'disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `LIBROS`
--

INSERT INTO `LIBROS` (`Id`, `Titulo`, `Autor_id`, `Genero`, `Editorial`, `Paginas`, `Año`, `Precio`, `ESTADO`) VALUES
(1, 'El Señor de los anillos: La comunidad del anillo', 1, 'Fantástico', 'Minotauro', 488, '1954-01-01', 18.00, 'no'),
(2, 'El viejo y el mar', 2, 'Novela', 'Debolsillo', 208, '1952-01-01', 10.95, 'no'),
(3, 'Las Crónicas de Narnia: El león, la bruja y el armario', 3, 'Fantástico', 'Destino', 240, '1950-01-01', 15.00, 'no'),
(4, 'Rebeldes', 4, 'Drama', 'Alfaguara', 224, '1967-01-01', 12.00, 'no'),
(5, 'Harry Potter y la prisionero de Azkaban', 5, 'Fantástico', 'Salamandra', 264, '1999-01-01', 18.00, 'no'),
(6, 'Canción de hielo y fuego: Juego de Tronos', 6, 'Fantástico', 'Planeta', 800, '1996-01-01', 20.00, 'no'),
(7, 'Reencuentro', 7, 'Drama', 'Tusquets', 128, '1971-01-01', 10.00, 'no'),
(8, 'La verdad sobre el caso Harry Quebert', 8, 'Policíaco', 'Alfaguara', 672, '2012-01-01', 12.95, 'no'),
(9, 'La sociedad literaria y el pastel de piel de patata de Guernsey', 9, 'Novela epistolar', 'Salamandra', 274, '2007-01-01', 10.00, 'no'),
(10, 'El mar', 10, 'Fantástico', 'SM', 260, '2015-01-01', 12.95, 'no'),
(11, 'El curioso incidente del perro a medianoche', 11, 'Novela', 'Salamandra', 270, '2003-01-01', 10.00, 'no'),
(12, 'La hija del mar', 12, 'Fantástico', 'SM', 112, '1996-01-01', 10.00, 'no'),
(13, 'Orgullo y prejuicio', 13, 'Novela', 'Penguin', 448, '1813-01-01', 12.00, 'no'),
(14, 'Martes con mi viejo profesor', 14, 'Novela biográfica', 'Maeva', 143, '1997-01-01', 13.00, 'no'),
(15, 'Desconocidos', 15, 'Policíaco', 'Edebé', 221, '2018-01-01', 12.00, 'disponible'),
(16, 'Nunca seré tu héroe', 16, 'Novela', 'SM', 192, '1998-01-01', 10.95, 'disponible'),
(17, 'Crónica de una muerte anunciada', 17, 'Policíaco', 'Debolsillo', 156, '1981-01-01', 9.95, 'no'),
(18, 'El nombre del viento', 18, 'Fantástico', 'Debolsillo', 880, '2007-01-01', 22.00, 'disponible'),
(19, 'La historia interminable', 19, 'Fantástico', 'Alfaguara', 496, '1979-01-01', 15.00, 'disponible'),
(20, 'La ley de la calle', 4, 'Drama', 'Alfaguara', 112, '1975-01-01', 10.00, 'no'),
(21, 'Nacidos de la bruma: El imperio final', 20, 'Fantástico', 'Nova', 841, '2006-01-01', 20.00, 'disponible'),
(22, '¿Sueñan los androides con ovejas eléctricas?', 21, 'Ciencia ficción', 'Minotauro', 272, '1968-01-01', 10.00, 'disponible'),
(23, 'El príncipe de la niebla', 22, 'Fantástico', 'Edebé', 240, '1993-01-01', 14.00, 'disponible'),
(24, 'La leyenda del rey errante', 23, 'Fantástico', 'SM', 560, '2004-01-01', 21.00, 'disponible'),
(25, 'La isla del tesoro', 24, 'Aventuras', 'Edelvives', 288, '1883-01-01', 24.90, 'disponible'),
(26, 'Matilda', 25, 'Infantil', 'Loqueleo', 288, '1988-01-01', 10.00, 'disponible'),
(27, 'El gran Gatsby', 26, 'Drama', 'Austral', 224, '1925-01-01', 11.50, 'disponible'),
(28, 'Fahrenheit 451', 27, 'Ciencia ficción', 'Debolsillo', 192, '1953-01-01', 12.50, 'disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PELICULAS`
--

CREATE TABLE `PELICULAS` (
  `ID` int(2) NOT NULL,
  `Titulo` varchar(63) CHARACTER SET latin1 DEFAULT NULL,
  `Año_estreno` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `Director` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `Actores` varchar(112) CHARACTER SET latin1 DEFAULT NULL,
  `Genero` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `Tipo_adaptacion` varchar(8) CHARACTER SET latin1 DEFAULT NULL,
  `Adaptacion_ID` int(11) DEFAULT NULL,
  `ESTADO` varchar(20) COLLATE utf8_bin DEFAULT 'disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `PELICULAS`
--

INSERT INTO `PELICULAS` (`ID`, `Titulo`, `Año_estreno`, `Director`, `Actores`, `Genero`, `Tipo_adaptacion`, `Adaptacion_ID`, `ESTADO`) VALUES
(1, 'El editor de libros', '2016-01-01', 'Michael Grandage', 'Colin Firth, Jude Law, Nicole Kidman', 'Biografía', 'Película', NULL, 'no'),
(2, 'La historia interminable', '1984-01-01', 'Wolfgang Petersen', 'Barret Oliver, Noah Hathaway, Moses Gunn', 'Fantasía', 'Película', 19, 'no'),
(3, 'La ladrona de libros', '2013-01-01', 'Brian Percival', 'Sophie Nélisse, Geoffrey Rush, Emily Watson, Nico Liersch', 'Drama', 'Película', NULL, 'no'),
(4, 'La bruja novata', '1971-01-01', 'Robert Stevenson', 'Angela Lansbury, David Tomlinson, Roddy McDowall', 'Fantasía', 'Película', NULL, 'no'),
(5, 'Harry Potter y el prisionero de Azkaban', '2004-01-01', 'Alfonso Cuarón', 'Daniel Radcliffe, Rupert Grint, Emma Watson', 'Fantasía', 'Película', 5, 'no'),
(6, 'El señor de los anillos: La comunidad del anillo', '2001-01-01', 'Peter Jackson', 'Elijah Wood, Ian McKellen, Viggo Mortensen', 'Fantasía', 'Película', 1, 'disponible'),
(7, 'Charlie y la fábrica de chocolate', '2005-01-01', 'Tim Burton', 'Johnny Depp, Freddie Highmore, David Kelly, Deep Roy', 'Fantasía', 'Película', NULL, 'disponible'),
(8, 'Las Crónicas de Narnia: El león, la bruja y el armario', '2005-01-01', 'Andrew Adamson', 'Georgie Henley, William Moseley, Skandar Keynes, Anna Popplewell, Tilda Swinton', 'Fantasía', 'Película', NULL, 'no disponible'),
(9, 'Rebeldes', '1983-01-01', 'Francis Ford Coppola', 'C. Thomas Howell, Matt Dillon, Ralph Macchio, Diane Lane, Rob Lowe, Patrick Swayze, Emilio Estévez, Tom Cruise', 'Drama', 'Película', 4, 'disponible'),
(10, 'Juego de Tronos: Temporada 1', '2011-01-01', 'David Benioff, D.B. Weiss', 'Emilia Clarke, Kit Harington, Lena Headey, Peter Dinklage, Maisie Williams, Nikolaj Coster-Waldau, Sophie Turner', 'Fantasía', 'Serie', 6, 'disponible'),
(11, 'La verdad sobre el caso Harry Quebert', '2018-01-01', 'Jean-Jacques Annaud', 'Patrick Dempsey, Ben Schnetzer, Kristine Froseth, Damon Wayans Jr.', 'Policíaco', 'Serie', 8, 'no disponible'),
(12, 'La sociedad literaria y el pastel de piel de patata de Guernsey', '2018-01-01', 'Mike Newell', 'Lily James, Michiel Huisman, Glen Powell, Jessica Brown Findlay, Matthew Goode', 'Drama', 'Película', 9, 'disponible'),
(13, 'Orgullo y prejuicio', '2005-01-01', 'Joe Wright', 'Keira Knightley, Matthew Macfadyen, Brenda Blethyn, Donald Sutherland', 'Romance', 'Película', 13, 'disponible'),
(14, 'Orgullo y prejuicio', '1995-01-01', 'Simon Langton', 'Colin Firth, Jennifer Ehle, David Bamber, Crispin Bonham-carter, Anna Chancellor', 'Romance', 'Serie', 13, 'disponible'),
(15, 'Crónica de una muerte anunciada', '1987-01-01', 'Francesco Rosi', 'Anthony Delon, Rupert Everett, Lucía Bosé, Ornella Muti, Gian Maria Volonté', 'Drama', 'Película', NULL, 'no disponible'),
(16, 'La ley de la calle', '1983-01-01', 'Francis Ford Coppola', 'Matt Dillon, Mickey Rourke, Diane Lane, Dennis Hopper, Nicolas Cage', 'Drama', 'Película', 20, 'no disponible'),
(17, 'Blade Runner', '1982-01-01', 'Ridley Scott', 'Harrison Ford, Rutger Hauer, Sean Young, Daryl Hannah, Edward James Olmos', 'Ciencia ficción', 'Película', 22, 'no'),
(18, 'La isla del tesoro', '1934-01-01', 'Victor Fleming', 'Jackie Cooper, Wallace Beery, Lewis Stone, Lionel Barrymore, Otto Kruger', 'Aventuras', 'Película', 25, 'no'),
(19, 'La isla del tesoro', '1950-01-01', 'Byron Haskin', 'Bobby Driscoll, Robert Newton, Basil Sydney, Walter Fitzgerald, Denis O\'Dea', 'Aventuras', 'Película', 25, 'disponible'),
(20, 'La isla del tesoro', '1990-01-01', 'Fraser Clarke Heston', 'Charlton Heston, Christian Bale, Oliver Reed, Christopher Lee, Richard Johnson', 'Aventuras', 'Serie', 25, 'no disponible'),
(21, 'Matilda', '1996-01-01', 'Danny DeVito', 'Mara Wilson, Danny DeVito, Rhea Perlman, Embeth Davidtz, Pam Ferris', 'Infantil', 'Película', NULL, 'no'),
(22, 'Un mundo de fantasía', '1971-01-01', 'Mel Stuart', 'Gene Wilder, Jack Albertson, Peter Ostrum, Roy Kinnear, Michael Bollner', 'Infantil', 'Película', NULL, 'disponible'),
(23, 'Por quién doblan las campanas', '1943-01-01', 'Sam Wood', 'Gary Cooper, Ingrid Bergman, Akim Tamiroff, Arturo de Córdova, Vladimir Sokoloff', 'Drama', 'Película', NULL, 'disponible'),
(24, 'Harry Potter y el cáliz de fuego', '2005-01-01', 'Mike Newell', 'Daniel Radcliffe, Rupert Grint, Emma Watson, Robbie Coltrane, Michael Gambon', 'Fantasía', 'Película', NULL, 'disponible'),
(25, 'El gran Gatsby', '1949-01-01', 'Elliott Nugent', 'Alan Ladd, Betty Field, Macdonald Carey, Ruth Hussey, Barry Sullivan', 'Drama', 'Película', 27, 'disponible'),
(26, 'El gran Gatsby', '1974-01-01', 'Jack Clayton', 'Robert Redford, Mia Farrow, Bruce Dern, Karen Black, Scott Wilson', 'Drama', 'Película', 27, 'disponible'),
(27, 'El gran Gatsby', '2000-01-01', 'Robert Markowitz', 'Mira Sorvino, Toby Stephens, Paul Rudd, Martin Donovan, Francie Swift', 'Drama', 'Serie', 27, 'disponible'),
(28, 'El gran Gatsby', '2013-01-01', 'Baz Luhrmann', 'Leonardo DiCaprio, Tobey Maguire, Carey Mulligan, Joel Edgerton, Isla Fisher', 'Drama', 'Película', 27, 'disponible'),
(29, 'Fahrenheit 451', '1966-01-01', 'François Truffaut', 'Julie Christie, Oskar Werner, Cyril Cusack, Anton Diffring, Jeremy Spenser, Ann Bell', 'Ciencia ficción', 'Película', 26, 'disponible'),
(30, 'Fahrenheit 451', '2018-01-01', 'Ramin Bahrani', 'Michael B. Jordan, Michael Shannon, Sofia Boutella, Laura Harrier, Lilly Singh', 'Ciencia ficción', 'Película', 26, 'disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RESERVAS`
--

CREATE TABLE `RESERVAS` (
  `Id` int(2) NOT NULL,
  `Id_libro` int(1) DEFAULT NULL,
  `Id_pelicula` int(2) DEFAULT NULL,
  `Fecha_reserva` varchar(10) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `RESERVAS`
--

INSERT INTO `RESERVAS` (`Id`, `Id_libro`, `Id_pelicula`, `Fecha_reserva`) VALUES
(1, 4, 16, '2026-01-28'),
(1, NULL, 11, '22-04-26'),
(1, NULL, 1, '29-04-26'),
(1, NULL, 1, '29-04-26'),
(1, NULL, 1, '29-04-26'),
(1, NULL, 3, '29-04-26'),
(1, NULL, 15, '04-05-26'),
(1, NULL, 2, '04-05-26'),
(1, NULL, 2, '05-05-26'),
(1, NULL, 2, '05-05-26'),
(1, NULL, 1, '05-05-26'),
(1, NULL, 1, '05-05-26'),
(1, NULL, 5, '05-05-26'),
(1, NULL, 1, '05-05-26'),
(1, NULL, 1, '05-05-26'),
(1, NULL, 20, '06-05-26'),
(1, NULL, 8, '06-05-26'),
(1, NULL, 4, '06-05-26'),
(1, NULL, 17, '06-05-26'),
(1, NULL, 18, '06-05-26'),
(1, NULL, 21, '06-05-26'),
(1, NULL, 1, '06-05-26'),
(1, NULL, 2, '06-05-26'),
(1, NULL, 5, '06-05-26'),
(1, 5, NULL, '06-05-26'),
(1, 6, NULL, '06-05-26'),
(1, 1, NULL, '06-05-26'),
(1, 2, NULL, '07-05-26'),
(1, 3, NULL, '07-05-26'),
(1, NULL, 3, '07-05-26'),
(1, 7, NULL, '07-05-26'),
(1, 8, NULL, '07-05-26'),
(1, 9, NULL, '07-05-26'),
(1, 10, NULL, '07-05-26'),
(1, 11, NULL, '07-05-26'),
(1, 12, NULL, '07-05-26'),
(1, 13, NULL, '07-05-26'),
(1, 14, NULL, '07-05-26'),
(1, 15, NULL, '07-05-26'),
(1, 16, NULL, '07-05-26'),
(1, 17, NULL, '07-05-26'),
(1, 4, NULL, '07-05-26'),
(1, 20, NULL, '07-05-26'),
(1, 14, NULL, '07-05-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIOS`
--

CREATE TABLE `USUARIOS` (
  `ID` int(11) NOT NULL,
  `USER` varchar(20) COLLATE utf8_bin NOT NULL,
  `PASS` varchar(256) COLLATE utf8_bin NOT NULL,
  `NAME` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `USUARIOS`
--

INSERT INTO `USUARIOS` (`ID`, `USER`, `PASS`, `NAME`) VALUES
(1, 'admin', '1234', 'Administrador'),
(2, 'nyra', '1234', 'Nyra');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `AUTORES`
--
ALTER TABLE `AUTORES`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `CLIENTES`
--
ALTER TABLE `CLIENTES`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `LIBROS`
--
ALTER TABLE `LIBROS`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_LIBROS_AUTOR` (`Autor_id`);

--
-- Indices de la tabla `PELICULAS`
--
ALTER TABLE `PELICULAS`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_PELICULAS_LIBROS` (`Adaptacion_ID`);

--
-- Indices de la tabla `RESERVAS`
--
ALTER TABLE `RESERVAS`
  ADD KEY `FK_RESERVAS_CLIENTES` (`Id`),
  ADD KEY `FK_RESERVAS_LIBROS` (`Id_libro`),
  ADD KEY `FK_RESERVAS_PELICULA` (`Id_pelicula`);

--
-- Indices de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `AUTORES`
--
ALTER TABLE `AUTORES`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `CLIENTES`
--
ALTER TABLE `CLIENTES`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `LIBROS`
--
ALTER TABLE `LIBROS`
  MODIFY `Id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `PELICULAS`
--
ALTER TABLE `PELICULAS`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `LIBROS`
--
ALTER TABLE `LIBROS`
  ADD CONSTRAINT `FK_LIBROS_AUTOR` FOREIGN KEY (`Autor_id`) REFERENCES `AUTORES` (`ID`);

--
-- Filtros para la tabla `PELICULAS`
--
ALTER TABLE `PELICULAS`
  ADD CONSTRAINT `FK_PELICULAS_LIBROS` FOREIGN KEY (`Adaptacion_ID`) REFERENCES `LIBROS` (`Id`);

--
-- Filtros para la tabla `RESERVAS`
--
ALTER TABLE `RESERVAS`
  ADD CONSTRAINT `FK_RESERVAS_CLIENTES` FOREIGN KEY (`Id`) REFERENCES `CLIENTES` (`ID`),
  ADD CONSTRAINT `FK_RESERVAS_LIBROS` FOREIGN KEY (`Id_libro`) REFERENCES `LIBROS` (`Id`),
  ADD CONSTRAINT `FK_RESERVAS_PELICULA` FOREIGN KEY (`Id_pelicula`) REFERENCES `PELICULAS` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
