-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-05-2020 a las 20:16:01
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

DROP DATABASE IF EXISTS bd_horarios;
CREATE DATABASE bd_horarios;
USE bd_horarios;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_horarios`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarMateria` (IN `periodo` VARCHAR(45), IN `id_programa` VARCHAR(45), IN `materia` VARCHAR(255), IN `nrc` INT(11), IN `alfanumerico` VARCHAR(45), IN `creditos` INT(11), IN `dia` VARCHAR(45), IN `hora_inicio` TIME, IN `hora_final` TIME, IN `jornada` VARCHAR(45), IN `nivel_semestre` VARCHAR(45))  BEGIN
    #Insertar en la tabla materias
    INSERT IGNORE INTO MATERIAS (id_materias, nombre, creditos, semestre)
          VALUES (alfanumerico, materia, creditos, nivel_semestre);

    #Insertar en la tabla PROGRAMAS_MATERIAS
    SET @periodo = (SELECT id_periodos FROM PERIODOS WHERE nombre = periodo);
    INSERT IGNORE INTO PROGRAMAS_MATERIAS (id_programas, id_periodos, id_materias)
        VALUES (id_programa, @periodo, alfanumerico);

    #Insertar en la tabla de NRCS
    SET @jornada = (SELECT id_jornadas FROM JORNADAS WHERE nombre = jornada);
    INSERT IGNORE INTO NRCS (id_nrcs, id_materias, id_jornadas) VALUES (nrc, alfanumerico, @jornada);

    #Insertar en la tabla CLASES
    SET @dia = (SELECT id_dias FROM DIAS WHERE nombre = dia);
    INSERT INTO CLASES (id_dias, id_nrcs, id_materias, id_jornadas, hora_inicio, hora_final)
        VALUES (@dia, nrc, alfanumerico, @jornada, hora_inicio, hora_final);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CLASES`
--

CREATE TABLE `CLASES` (
  `id_dias` int(11) NOT NULL,
  `id_nrcs` int(11) NOT NULL,
  `id_materias` varchar(45) COLLATE utf8_bin NOT NULL,
  `id_jornadas` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `CLASES`
--

INSERT INTO `CLASES` (`id_dias`, `id_nrcs`, `id_materias`, `id_jornadas`, `hora_inicio`, `hora_final`) VALUES
(1, 3460, 'ISUMBG083', 3, '18:15:00', '19:44:00'),
(1, 8213, 'ISUMBG083', 3, '20:30:00', '21:59:00'),
(2, 3463, 'ISUMBG133', 3, '18:15:00', '19:44:00'),
(2, 3468, 'ISUMBG223', 3, '18:15:00', '19:44:00'),
(2, 3906, 'MATE1130', 3, '20:30:00', '21:59:00'),
(2, 13811, 'ISUMBG223', 3, '20:30:00', '21:59:00'),
(3, 8217, 'ISUMBG083', 3, '20:30:00', '21:59:00'),
(3, 11602, 'ISUMBG083', 3, '18:15:00', '19:44:00'),
(4, 3460, 'ISUMBG083', 3, '20:30:00', '21:59:00'),
(4, 3463, 'ISUMBG133', 3, '20:30:00', '21:59:00'),
(4, 8213, 'ISUMBG083', 3, '18:15:00', '19:44:00'),
(5, 3906, 'MATE1130', 3, '20:30:00', '21:59:00'),
(5, 8217, 'ISUMBG083', 3, '18:15:00', '19:44:00'),
(5, 13811, 'ISUMBG223', 3, '18:15:00', '19:44:00'),
(6, 3468, 'ISUMBG223', 3, '21:15:00', '21:59:00'),
(6, 11602, 'ISUMBG083', 3, '20:30:00', '21:59:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DIAS`
--

CREATE TABLE `DIAS` (
  `id_dias` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `DIAS`
--

INSERT INTO `DIAS` (`id_dias`, `nombre`) VALUES
(1, 'LUNES'),
(2, 'MARTES'),
(3, 'MIÉRCOLES'),
(4, 'JUEVES'),
(5, 'VIERNES'),
(6, 'SÁBADO'),
(7, 'VIRTUAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `JORNADAS`
--

CREATE TABLE `JORNADAS` (
  `id_jornadas` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `JORNADAS`
--

INSERT INTO `JORNADAS` (`id_jornadas`, `nombre`) VALUES
(1, 'MAÑANA'),
(2, 'TARDE'),
(3, 'NOCHE'),
(4, 'VIRTUAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MATERIAS`
--

CREATE TABLE `MATERIAS` (
  `id_materias` varchar(45) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `creditos` int(11) DEFAULT NULL,
  `semestre` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `MATERIAS`
--

INSERT INTO `MATERIAS` (`id_materias`, `nombre`, `creditos`, `semestre`) VALUES
('ISUMBG083', 'ARQUITECTURA DE SOFTWARE', 3, '7'),
('ISUMBG133', 'ESTRUCTURA DE INTERNET, SERVICIOS Y SERVIDORES', 3, '7'),
('ISUMBG223', 'BASE DE DATOS MASIVAS', 3, '7'),
('MATE1130', 'ECUACIONES DIFERENCIALES', 2, '4-5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `NRCS`
--

CREATE TABLE `NRCS` (
  `id_nrcs` int(11) NOT NULL,
  `id_materias` varchar(45) COLLATE utf8_bin NOT NULL,
  `id_jornadas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `NRCS`
--

INSERT INTO `NRCS` (`id_nrcs`, `id_materias`, `id_jornadas`) VALUES
(3460, 'ISUMBG083', 3),
(3463, 'ISUMBG133', 3),
(3468, 'ISUMBG223', 3),
(3906, 'MATE1130', 3),
(8213, 'ISUMBG083', 3),
(8217, 'ISUMBG083', 3),
(11602, 'ISUMBG083', 3),
(13811, 'ISUMBG223', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PERIODOS`
--

CREATE TABLE `PERIODOS` (
  `id_periodos` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `PERIODOS`
--

INSERT INTO `PERIODOS` (`id_periodos`, `nombre`) VALUES
(1, '2020-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PROGRAMAS`
--

CREATE TABLE `PROGRAMAS` (
  `id_programas` varchar(45) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_periodos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `PROGRAMAS`
--

INSERT INTO `PROGRAMAS` (`id_programas`, `nombre`, `id_periodos`) VALUES
('ADMI', 'Administración de empresas - Plan Único', 1),
('BIBL', 'Ciencias Biblicas - Plan Unico', 1),
('CONP', 'Contaduría Publica - Plan Antiguo', 1),
('CONP_BG', 'Contaduría Publica - Plan Nuevo', 1),
('COVI', 'Comunicación Visual - Plan Único', 1),
('CSOC', 'Comunicación Social y Periodismo - Plan Antiguo', 1),
('CSOC_BG', 'Comunicación Social y Periodismo - Plan Nuevo', 1),
('FCCO', 'Programas Facultad de Ciencias de la Comunicación - Planes antiguos', 1),
('FCCO_BG', 'Programas Facultad de Ciencias de la Comunicación - Planes nuevos', 1),
('FCEM', 'Programas Facultad de Ciencias Empresariales - Planes antiguos', 1),
('FCEM_BG', 'Programas Facultad de Ciencias Empresariales - Planes nuevos', 1),
('FCHS', 'Programas Facultad de Ciencias Humanas y Sociales - Planes antiguos', 1),
('FCHS_BG', 'Programas Facultad de Ciencias Humanas y Sociales - Planes nuevos', 1),
('FEDU', 'Programas Facultad de Educación - Planes antiguos', 1),
('FEDU_BG', 'Programas Facultad de Educación - Planes nuevos', 1),
('FILO', 'Estudios en Filosofía - Plan Antiguo', 1),
('FILO_BG', 'Estudios en Filosofía - Plan Nuevo', 1),
('FING', 'Programas Facultad de Ingeniería - Planes antiguos', 1),
('FING_BG', 'Programas Facultad de Ingeniería - Planes nuevos', 1),
('IAGR', 'Ingeniería Agroecológica - Plan Antiguo', 1),
('IAGR_BG', 'Ingeniería Agroecológica - Plan Nuevo', 1),
('ICIV', 'Ingeniería Civil - Plan Antiguo', 1),
('ICIV_BG', 'Ingeniería Civil - Plan Nuevo', 1),
('IINU', 'Ingeniería Industrial - Plan Antiguo', 1),
('IINU_BG', 'Ingeniería Industrial - Plan Nuevo', 1),
('ISUM', 'Ingeniería de Sistemas - Plan Antiguo', 1),
('ISUM_BG', 'Ingeniería de Sistemas - Plan Nuevo', 1),
('LBEA', 'Licenciatura en Educación Básica con Énfasis en Educación Artística - Plan único', 1),
('LBHL', 'Licenciatura en Educación Básica con Énfasis en Humanidades y Lengua Castellana - Plan Único', 1),
('LEATP', 'Licenciatura en Educación Artística', 1),
('LEFD', 'Licenciatura en Educación Física Recreación y Deporte - Plan Único', 1),
('LEFI', 'Licenciatura en Educación Física - Plan único', 1),
('LEIN', 'Licenciatura en Educación Infantil - Plan Único', 1),
('LFIL', 'Licenciatura en Filosofía - Plan Antiguo', 1),
('LFIL_BG', 'Licenciatura en Filosofía - Plan Nuevo', 1),
('LIEI', 'Licenciatura en Idioma Extranjero Inglés - Plan Antiguo', 1),
('LIEI_BG', 'Licenciatura en Idioma Extranjero Inglés - Plan Nuevo', 1),
('LINF', 'Licenciatura en Informática - Plan Antiguo', 1),
('LINF_BG', 'Licenciatura en Informática - Plan Nuevo', 1),
('LLCT_BG', 'Licenciatura en Humanidades y Lengua Castellana - Plan Único', 1),
('LLEI', 'Licenciatura en Lenguas Extranjeras con Énfasis en Inglés - Plan único', 1),
('LPIN', 'Licenciatura en Pedagogía Infantil - Plan Único', 1),
('PSIC', 'Psicología - Plan Antiguo', 1),
('PSIC_BG', 'Psicología - Plan Nuevo', 1),
('TCGR', 'Tecnología en Comunicación Gráfica - Plan Único', 1),
('TCOS', 'Tecnología en Costos y Auditoría - Plan Único', 1),
('TGME', 'Tecnología en Gestión de Mercadeo - Plan Único', 1),
('TGSC', 'Tecnología en Gestión de Seguridad y Redes de Computadores - Plan Único', 1),
('TINF', 'Tecnología en Informática - Plan Único', 1),
('TLEC', 'Tecnología en Electrónica - Plan Único', 1),
('TLEM', 'Tecnología en Logística Empresarial - Plan Único', 1),
('TLOG', 'Tecnología en Logística - Plan Único', 1),
('TRAU', 'Tecnología en Realización Audiovisual - Plan Antiguo', 1),
('TRAU_BG', 'Tecnología en Realización Audiovisual - Plan Nuevo', 1),
('TRSO', 'Trabajo Social - Plan Único', 1),
('UMD', 'Todos los programas de UNIMINUTO - Sede Principal Calle 80', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PROGRAMAS_MATERIAS`
--

CREATE TABLE `PROGRAMAS_MATERIAS` (
  `id_programas` varchar(45) COLLATE utf8_bin NOT NULL,
  `id_periodos` int(11) NOT NULL,
  `id_materias` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `PROGRAMAS_MATERIAS`
--

INSERT INTO `PROGRAMAS_MATERIAS` (`id_programas`, `id_periodos`, `id_materias`) VALUES
('ISUM_BG', 1, 'ISUMBG083'),
('ISUM_BG', 1, 'ISUMBG133'),
('ISUM_BG', 1, 'ISUMBG223'),
('ISUM_BG', 1, 'MATE1130');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CLASES`
--
ALTER TABLE `CLASES`
  ADD PRIMARY KEY (`id_dias`,`id_nrcs`,`id_materias`,`id_jornadas`),
  ADD KEY `fk_CLASES_NRCS1_idx` (`id_nrcs`,`id_materias`,`id_jornadas`);

--
-- Indices de la tabla `DIAS`
--
ALTER TABLE `DIAS`
  ADD PRIMARY KEY (`id_dias`);

--
-- Indices de la tabla `JORNADAS`
--
ALTER TABLE `JORNADAS`
  ADD PRIMARY KEY (`id_jornadas`);

--
-- Indices de la tabla `MATERIAS`
--
ALTER TABLE `MATERIAS`
  ADD PRIMARY KEY (`id_materias`);

--
-- Indices de la tabla `NRCS`
--
ALTER TABLE `NRCS`
  ADD PRIMARY KEY (`id_nrcs`,`id_materias`,`id_jornadas`),
  ADD KEY `fk_nrcs_materia1_idx` (`id_materias`),
  ADD KEY `fk_nrcs_jornada1_idx` (`id_jornadas`);

--
-- Indices de la tabla `PERIODOS`
--
ALTER TABLE `PERIODOS`
  ADD PRIMARY KEY (`id_periodos`);

--
-- Indices de la tabla `PROGRAMAS`
--
ALTER TABLE `PROGRAMAS`
  ADD PRIMARY KEY (`id_programas`,`id_periodos`),
  ADD KEY `fk_programas_periodos_idx` (`id_periodos`);

--
-- Indices de la tabla `PROGRAMAS_MATERIAS`
--
ALTER TABLE `PROGRAMAS_MATERIAS`
  ADD PRIMARY KEY (`id_programas`,`id_periodos`,`id_materias`),
  ADD KEY `fk_programas_has_materia_materia1_idx` (`id_materias`),
  ADD KEY `fk_programas_has_materia_programas1_idx` (`id_programas`,`id_periodos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `DIAS`
--
ALTER TABLE `DIAS`
  MODIFY `id_dias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `JORNADAS`
--
ALTER TABLE `JORNADAS`
  MODIFY `id_jornadas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `PERIODOS`
--
ALTER TABLE `PERIODOS`
  MODIFY `id_periodos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CLASES`
--
ALTER TABLE `CLASES`
  ADD CONSTRAINT `fk_CLASES_DIAS1` FOREIGN KEY (`id_dias`) REFERENCES `DIAS` (`id_dias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CLASES_NRCS1` FOREIGN KEY (`id_nrcs`,`id_materias`,`id_jornadas`) REFERENCES `NRCS` (`id_nrcs`, `id_materias`, `id_jornadas`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `NRCS`
--
ALTER TABLE `NRCS`
  ADD CONSTRAINT `fk_nrcs_jornada1` FOREIGN KEY (`id_jornadas`) REFERENCES `JORNADAS` (`id_jornadas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nrcs_materia1` FOREIGN KEY (`id_materias`) REFERENCES `MATERIAS` (`id_materias`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `PROGRAMAS`
--
ALTER TABLE `PROGRAMAS`
  ADD CONSTRAINT `fk_programas_periodos` FOREIGN KEY (`id_periodos`) REFERENCES `PERIODOS` (`id_periodos`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `PROGRAMAS_MATERIAS`
--
ALTER TABLE `PROGRAMAS_MATERIAS`
  ADD CONSTRAINT `fk_programas_has_materia_materia1` FOREIGN KEY (`id_materias`) REFERENCES `MATERIAS` (`id_materias`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_programas_has_materia_programas1` FOREIGN KEY (`id_programas`,`id_periodos`) REFERENCES `PROGRAMAS` (`id_programas`, `id_periodos`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
