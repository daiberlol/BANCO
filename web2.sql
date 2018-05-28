-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2018 a las 16:48:51
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_item` varchar(100) NOT NULL,
  `menu_padre` int(11) NOT NULL DEFAULT '0',
  `menu_link` varchar(100) NOT NULL DEFAULT '#',
  `menu_aplicacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_item`, `menu_padre`, `menu_link`, `menu_aplicacion`) VALUES
(1, 'Gestión Plataforma', 0, 'gestion/', ''),
(2, 'Dirección TIC', 0, 'direcciontic/', ''),
(3, 'Solicitud Servicio', 2, 'direcciontic/servicio/', ''),
(4, 'Gestión Financiera', 0, 'financiera/', ''),
(5, 'Calidad', 0, 'calidad/', ''),
(6, 'prueba', 0, 'prueba', ''),
(7, 'Sistemas', 0, 'sistemas/', ''),
(8, 'Gestión de menus', 7, 'Sistemas/', 'Menu'),
(9, 'Gestión de roles', 7, 'Sistemas/', 'Rol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_rol`
--

CREATE TABLE `menu_rol` (
  `mrol_id` int(11) NOT NULL,
  `mrol_id_menu` int(11) NOT NULL,
  `mrol_id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu_rol`
--

INSERT INTO `menu_rol` (`mrol_id`, `mrol_id_menu`, `mrol_id_rol`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 5, 1),
(5, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `rol_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `rol_nombre`) VALUES
(1, 'Administrador'),
(2, 'Sin Asignar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usu_usuario`
--

CREATE TABLE `usu_usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nombre` varchar(100) NOT NULL,
  `usu_apellido` varchar(100) NOT NULL,
  `usu_telefono` varchar(20) DEFAULT NULL,
  `usu_correo` varchar(100) NOT NULL,
  `usu_clave` varchar(100) NOT NULL,
  `usu_rol` int(11) NOT NULL,
  `usu_estado` int(11) NOT NULL,
  `usu_fecha_ingreso` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usu_usuario`
--

INSERT INTO `usu_usuario` (`usu_id`, `usu_nombre`, `usu_apellido`, `usu_telefono`, `usu_correo`, `usu_clave`, `usu_rol`, `usu_estado`, `usu_fecha_ingreso`) VALUES
(1, 'Martin', 'Diaz', '123456', 'mdiaz@coruniamericana.edu.co', '925d7518fc597af0e43f5606f9a51512', 1, 1, '2018-03-15 20:32:38'),
(2, 'Francisco', 'Perez', '3005440981', 'franciscoperezvillalba@gmail.com', '117735823fadae51db091c7d63e60eb0', 2, 1, '2018-03-15 20:32:38'),
(3, 'Jose', 'Solon', '3126499678', 'josedsolonr@gmail.com', '662eaa47199461d01a623884080934ab', 2, 1, '2018-03-15 20:32:38'),
(4, 'Gilberto', 'Anillo', '3013090344', 'gilberto_anillo@gmail.com', 'bafff1df7d916f99fbe8be1a81dc326f', 2, 1, '2018-03-15 20:32:38'),
(5, 'Juan', 'Santana', '3007649075', 'juanpimiguel@hotmail.com', '92eaf3719159c372f3d50337e0a14f57', 2, 1, '2018-03-15 20:32:38'),
(6, 'andres', 'sanchez', '3006019017', 'andres.camilo980810@gmail.com', '231badb19b93e44f47da1bd64a8147f2', 2, 1, '2018-03-15 20:32:39'),
(7, 'Donaldo', 'Diaz', '3178537324', 'jota.donaldo01@gmail.com', '12cd6199e27dc93742835909aa711c0e', 2, 1, '2018-03-15 20:32:39'),
(8, 'camilo', 'theran', '3043739724', 'camilotheran0498@outlook.com', '0aa0b6b3207f0b3839381db1962574a2', 2, 1, '2018-03-15 20:32:39'),
(9, 'Jeny', 'Cediel', '3015926479', 'yennicediel@gmail.com', 'e4334ca432504958a502e0fff87a1a8f', 2, 1, '2018-03-15 20:32:39'),
(10, 'jesus', 'martinez', '3005786877', 'martinezjesus@americana.edu.co', '110d46fcd978c24f306cd7fa23464d73', 2, 1, '2018-03-15 20:32:39'),
(11, 'Richard', 'De oro', '3213128404', 'alcazarrichard19976@gmail.com', 'c51c8bbd9e8c8bc49042ccd5d3e9864d', 2, 1, '2018-03-15 20:32:39'),
(12, 'Gerald', 'Naranjo', '3013559673', 'ganaranjorey@gmail.com', '2fde527993887e4946b3d77ea32d079c', 2, 1, '2018-03-15 20:32:39'),
(13, 'juanCamilo', 'Vargas', '3006955782', 'fcamilovargas@hotmail.com', 'a94652aa97c7211ba8954dd15a3cf838', 2, 1, '2018-03-15 20:32:39'),
(14, 'Julieth', 'Martinez', '3017376607', 'jull.mar@hotmail.com', '64e48dd0e8bc035fa4e8660a19f09a3a', 2, 1, '2018-03-15 20:32:39'),
(15, 'Moises', 'Polo', '3189653333', 'mdpolo@gmail.com', '2000b7287e012511c77a7b2517e838ba', 2, 1, '2018-03-15 20:32:39'),
(16, 'Javier', 'Guevara', '3002843545', 'jg131997@gmail.com', '3c9c03d6008a5adf42c2a55dd4a1a9f2', 2, 1, '2018-03-15 20:32:39'),
(17, 'Juan', 'Fontalvo', '3007723471', 'juan@cua.com', 'a94652aa97c7211ba8954dd15a3cf838', 2, 1, '2018-03-15 20:32:40'),
(18, 'Milton', 'Martinez', '3206982029', 'martinezmilton@americana.edu.co', '7c6e8d16a121df9be3e30701e417d11b', 2, 1, '2018-03-15 20:32:40'),
(19, 'Andres', 'Cardozo', '3014091518', 'cardozoandres@coruniamericana.edu.co', '27d2abba75fc7ec93e9c625fe3af8467', 2, 1, '2018-03-15 20:32:40'),
(20, 'jorge', 'sabogal', '3017526234', 'sabogaljorge@coruniamericana.edu.co', 'd67326a22642a324aa1b0745f2f17abb', 2, 1, '2018-03-15 20:32:40'),
(21, 'dilmer', 'freyle', '3016963960', 'dilmer.freyle6@hotmail.com', '896b09cf9c05ad9dd29a78cfb66e2cb9', 2, 1, '2018-03-15 20:32:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indices de la tabla `menu_rol`
--
ALTER TABLE `menu_rol`
  ADD PRIMARY KEY (`mrol_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usu_usuario`
--
ALTER TABLE `usu_usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `menu_rol`
--
ALTER TABLE `menu_rol`
  MODIFY `mrol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usu_usuario`
--
ALTER TABLE `usu_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
