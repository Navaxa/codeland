-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2020 a las 07:49:48
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `areaenergetica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id` int(11) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre_proveedor` varchar(50) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`id`, `nombre_cliente`, `id_cliente`, `nombre_proveedor`, `id_proveedor`, `id_solicitud`) VALUES
(1, 'Jonathan', 1, 'Miguel Nava', 1, 3),
(2, 'Anel', 4, 'Miguel Nava', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuario_cliente`
--

CREATE TABLE `datos_usuario_cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `dedicacion` varchar(50) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `calle` varchar(60) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `acerca_de` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `facebook` varchar(500) NOT NULL,
  `foto_perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_usuario_cliente`
--

INSERT INTO `datos_usuario_cliente` (`id`, `nombre`, `dedicacion`, `telefono`, `estado`, `calle`, `cp`, `acerca_de`, `email`, `facebook`, `foto_perfil`) VALUES
(1, 'Jonathan', 'Asesor', '555333241', 'Hidalgo', 'Shaghun', '44029', 'En busca de servicios de energías renovable', '15030371@itesa.edu.mx', '', 'perfildeusuario.jpg'),
(4, 'Anel', 'Asesor de finanzas', '5540988390', 'Colima', 'Zaragoza', '90020', 'Busco encontrar el mejor proveedor que se adapte a mis necesidades', 'anel@gmail.com', '', 'user.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuario_proveedor`
--

CREATE TABLE `datos_usuario_proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `cp` int(11) NOT NULL,
  `acerca_de` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `sitioweb` varchar(1000) NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_usuario_proveedor`
--

INSERT INTO `datos_usuario_proveedor` (`id`, `nombre`, `empresa`, `telefono`, `cargo`, `estado`, `calle`, `cp`, `acerca_de`, `email`, `sitioweb`, `logo`) VALUES
(1, 'Miguel Nava', 'Energy Solutions', '2147483647', 'Project Manager', 'Jalisco', 'Oaxaca', 90020, 'Software Develoment', '15030463@itesa.edu.mx', 'https://www.google.com', 'asolmex.png'),
(3, 'Angel Zavala', 'SDE', '5518248779', 'Director de ventas', 'Jalisco', 'Guadalajara', 90003, 'En SDE México, somos la distribuidora mayorista de paneles solares y equipo fotovoltaico con más de 10 años de experiencia en el mercado.', 'guiguelangel@gmail.com', 'http://www.sde.mx/', 'sde.png'),
(4, 'Mulan', 'Conermex', '5567890321', 'Director de Ejecutivo', 'México', 'La condesa', 90001, 'Somos un empresa mexicana dedicada 100% al mercado fotovoltaico. Trayectoria iniciada en el 2005 por profesionales con más de 30 años de experiencia , con socios experimentados en el mercado global. Ejecutamos la integración y puesta en funcionamiento de un sistema fotovoltaico de escala comercial e industrial de Generación Distribuida hasta 500 kWp y distribuimos como mayoristas de componentes y kits solares, tanto interconectados como fuera de la red.', 'proveedor1@gmail.com', 'https://www.conermex.com.mx/', 'conermex.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intereses`
--

CREATE TABLE `intereses` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `servicio` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `intereses`
--

INSERT INTO `intereses` (`id`, `nombre`, `descripcion`, `servicio`, `email`) VALUES
(3, 'Jonathan', 'Necesito instalar paneles solares urgente.', 'Instalación de paneles solares', '15030371@itesa.edu.mx'),
(6, 'Jonathan', 'Nuevamente aquí!! Solicito instalación inmediata de paneles solares.', 'Paneles Solares', '15030371@itesa.edu.mx'),
(7, 'Anel', 'Solicito instalación inmediata de paneles solares. Es para mi hogar.', 'Instalación de paneles solares', 'anel@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `email_cliente` varchar(50) NOT NULL,
  `nombre_proveedor` varchar(50) NOT NULL,
  `email_proveedor` varchar(50) NOT NULL,
  `propuesta` text NOT NULL,
  `fecha` datetime NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `oferta` bigint(20) NOT NULL,
  `estado_notificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `nombre_cliente`, `email_cliente`, `nombre_proveedor`, `email_proveedor`, `propuesta`, `fecha`, `id_solicitud`, `oferta`, `estado_notificacion`) VALUES
(6, 'Jonathan', '15030371@itesa.edu.mx', 'Miguel Nava', '15030463@itesa.edu.mx', 'Hola Jonathan tenemos amplia experiencia en lo que necesitas acepta nuestra propuesta y enseguida trabajaremos en tu petición', '2020-07-08 03:54:22', 3, 0, 1),
(7, 'Jonathan', '15030371@itesa.edu.mx', 'Angel Zavala', 'guiguelangel@gmail.com', 'Somo experto en el área por $100,000 te instalamos todo y te capacitamos y daremos soporte durante un mes.', '2020-07-09 03:33:36', 3, 0, 1),
(8, 'Anel', 'anel@gmail.com', 'Miguel Nava', '15030463@itesa.edu.mx', 'Hola Anel somos expertos en el área acepta nuestra oferta y en seguida trabajaremos en tu petición.', '2020-07-13 20:55:56', 7, 100000, 1),
(9, 'Anel', 'anel@gmail.com', 'Angel Zavala', 'guiguelangel@gmail.com', 'Somos expertos en el área por $800,000 te instalamos todo y te capacitamos y daremos soporte durante un mes.', '2020-07-15 01:45:13', 7, 80000, 1),
(10, 'Anel', 'anel@gmail.com', 'Mulan', 'proveedor1@gmail.com', 'Hola Anel te instalamos todo.', '2020-07-15 23:40:09', 7, 90000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `pass`, `rol`) VALUES
(1, 'Miguel Nava', '15030463@itesa.edu.mx', '1234', 'proveedor'),
(2, 'Jonathan', '15030371@itesa.edu.mx', '1234', 'cliente'),
(3, 'Angel Zavala', 'guiguelangel@gmail.com', '1234', 'proveedor'),
(4, 'Mulan', 'proveedor1@gmail.com', '1234', 'proveedor'),
(5, 'Joana', 'joana@gmail.com', '12345', 'cliente'),
(6, 'Key', 'key@gmail.com', 'key', 'cliente'),
(7, 'Ernesto', 'ernesto@gmail.com', '1234', 'cliente'),
(8, 'pilar', 'pilar@gmail.com', 'pilar', 'cliente'),
(9, 'Anel', 'anel@gmail.com', 'minombre', 'cliente'),
(10, 'Doki', 'doki@gmail.com', 'doki', 'proveedor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_usuario_cliente`
--
ALTER TABLE `datos_usuario_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_usuario_proveedor`
--
ALTER TABLE `datos_usuario_proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `intereses`
--
ALTER TABLE `intereses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `datos_usuario_cliente`
--
ALTER TABLE `datos_usuario_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `datos_usuario_proveedor`
--
ALTER TABLE `datos_usuario_proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `intereses`
--
ALTER TABLE `intereses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
