-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2025 a las 01:10:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adso_nekonek`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anime`
--

CREATE TABLE `anime` (
  `a_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `a_temporada` int(11) DEFAULT NULL,
  `a_capitulo` int(11) DEFAULT NULL,
  `a_video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `biblioteca`
--

CREATE TABLE `biblioteca` (
  `b_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `b_estado` enum('favorito','leyendo','finalizado') NOT NULL,
  `b_fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `c_id` int(11) NOT NULL,
  `c_titulo` varchar(255) NOT NULL,
  `c_descripcion` text DEFAULT NULL,
  `c_canepisodios` int(11) DEFAULT NULL,
  `c_tipo` int(11) NOT NULL,
  `c_pais` int(11) NOT NULL,
  `c_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido_generos`
--

CREATE TABLE `contenido_generos` (
  `c_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `e_id` int(11) NOT NULL,
  `e_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`e_id`, `e_nombre`) VALUES
(1, 'emision'),
(2, 'finalizado'),
(3, 'cancelado'),
(4, 'pausado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `g_id` int(11) NOT NULL,
  `g_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`g_id`, `g_nombre`) VALUES
(1, 'accion'),
(2, 'aventura'),
(3, 'comedia'),
(4, 'ciencia_ficcion'),
(5, 'drama'),
(6, 'fantasia'),
(7, 'romance'),
(8, 'terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manga`
--

CREATE TABLE `manga` (
  `m_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `m_contenido` varchar(255) DEFAULT NULL,
  `m_numeropag` int(11) DEFAULT NULL,
  `m_capitulo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novela`
--

CREATE TABLE `novela` (
  `n_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `n_contenido` varchar(255) DEFAULT NULL,
  `n_volumen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `p_id` int(11) NOT NULL,
  `p_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`p_id`, `p_nombre`) VALUES
(1, 'corea'),
(2, 'china'),
(3, 'japon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `r_id` int(11) NOT NULL,
  `motivo_r` int(11) NOT NULL,
  `r_descripcion` text DEFAULT NULL,
  `u_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `r_fecha_creacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `r_id` int(11) NOT NULL,
  `r_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`r_id`, `r_nombre`) VALUES
(1, 'editor'),
(2, 'lector'),
(3, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_contenido`
--

CREATE TABLE `t_contenido` (
  `t_id` int(11) NOT NULL,
  `t_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_contenido`
--

INSERT INTO `t_contenido` (`t_id`, `t_nombre`) VALUES
(1, 'anime'),
(2, 'novelas'),
(3, 'manga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_reporte`
--

CREATE TABLE `t_reporte` (
  `t_r_id` int(11) NOT NULL,
  `t_reporte` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_reporte`
--

INSERT INTO `t_reporte` (`t_r_id`, `t_reporte`) VALUES
(1, 'contenido_inapropiado'),
(2, 'copyright'),
(3, 'otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `u_id` int(11) NOT NULL,
  `rol_u` int(11) NOT NULL,
  `u_nombre` varchar(100) NOT NULL,
  `u_apodo` varchar(50) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_telefono` varchar(20) DEFAULT NULL,
  `u_fondo` varchar(255) DEFAULT NULL,
  `u_perfil` varchar(255) DEFAULT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_sobreti` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indices de la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD PRIMARY KEY (`b_id`),
  ADD UNIQUE KEY `u_id` (`u_id`,`c_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `c_tipo` (`c_tipo`),
  ADD KEY `c_pais` (`c_pais`),
  ADD KEY `c_estado` (`c_estado`);

--
-- Indices de la tabla `contenido_generos`
--
ALTER TABLE `contenido_generos`
  ADD PRIMARY KEY (`c_id`,`g_id`),
  ADD KEY `g_id` (`g_id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`e_id`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`g_id`);

--
-- Indices de la tabla `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indices de la tabla `novela`
--
ALTER TABLE `novela`
  ADD PRIMARY KEY (`n_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`p_id`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `motivo_r` (`motivo_r`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`r_id`);

--
-- Indices de la tabla `t_contenido`
--
ALTER TABLE `t_contenido`
  ADD PRIMARY KEY (`t_id`);

--
-- Indices de la tabla `t_reporte`
--
ALTER TABLE `t_reporte`
  ADD PRIMARY KEY (`t_r_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`u_id`),
  ADD KEY `rol_u` (`rol_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anime`
--
ALTER TABLE `anime`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `manga`
--
ALTER TABLE `manga`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novela`
--
ALTER TABLE `novela`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_contenido`
--
ALTER TABLE `t_contenido`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_reporte`
--
ALTER TABLE `t_reporte`
  MODIFY `t_r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anime`
--
ALTER TABLE `anime`
  ADD CONSTRAINT `anime_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contenido` (`c_id`);

--
-- Filtros para la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD CONSTRAINT `biblioteca_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `usuarios` (`u_id`),
  ADD CONSTRAINT `biblioteca_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `contenido` (`c_id`);

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_ibfk_1` FOREIGN KEY (`c_tipo`) REFERENCES `t_contenido` (`t_id`),
  ADD CONSTRAINT `contenido_ibfk_2` FOREIGN KEY (`c_pais`) REFERENCES `paises` (`p_id`),
  ADD CONSTRAINT `contenido_ibfk_3` FOREIGN KEY (`c_estado`) REFERENCES `estado` (`e_id`);

--
-- Filtros para la tabla `contenido_generos`
--
ALTER TABLE `contenido_generos`
  ADD CONSTRAINT `contenido_generos_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contenido` (`c_id`),
  ADD CONSTRAINT `contenido_generos_ibfk_2` FOREIGN KEY (`g_id`) REFERENCES `generos` (`g_id`);

--
-- Filtros para la tabla `manga`
--
ALTER TABLE `manga`
  ADD CONSTRAINT `manga_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contenido` (`c_id`);

--
-- Filtros para la tabla `novela`
--
ALTER TABLE `novela`
  ADD CONSTRAINT `novela_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `contenido` (`c_id`);

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`motivo_r`) REFERENCES `t_reporte` (`t_r_id`),
  ADD CONSTRAINT `reportes_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `usuarios` (`u_id`),
  ADD CONSTRAINT `reportes_ibfk_3` FOREIGN KEY (`c_id`) REFERENCES `contenido` (`c_id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_u`) REFERENCES `roles` (`r_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
