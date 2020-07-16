-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2020 a las 07:50:06
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
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `contenido` text NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `etiqueta` varchar(30) NOT NULL,
  `id_escritor` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id`, `titulo`, `contenido`, `imagen`, `etiqueta`, `id_escritor`, `fecha`) VALUES
(1, 'Energía solar sostenible en tu hogar', 'Tu hogar puede capturar esta fuente de energía a través de placas solares y convertir la luz del sol en electricidad. En poco tiempo, podrás utilizar de forma inmediata la luz del Sol, o almacenarla en una batería Powerwall para los días nublados o las noches.¡Conoce cómo funcionan las casas con energía solar!\r\n\r\nImagina la increíble reducción de costes que podríamos conseguir gracias a las casas con energía solar. Podríamos vivir mucho más barato, con la misma calidad de vida o incluso mayor. Además, esto supone un beneficio importante para el Medio Ambiente. Así que descubre en qué consiste esto de las casas con energía solar, y puede que te animes a probarlo.', 'panelsolar3.jpg', 'Energía solar', 1, '2020-07-14'),
(3, 'El futuro de la energía eólica\r\n\r\n\r\n', 'En el mundo, la capacidad de energía eólica en el mundo alcanzó los 487 gigavatios (GW) en 2016. Al mismo tiempo, los costes normalizados de referencia de la electricidad de la energía eólica (LCOE), es decir, cuánto cuesta la generación eléctrica (inversión inicial, mantenimiento, coste del combustible…) están cayendo, hasta los 67 dólares por megavatio/hora (MWh), el tercer valor más bajo entre las energías renovables. La energía eólica apenas supone el 4% de la generación mundial de energía, aunque desde BBVA Research en su informe “Renovables: La respuesta está en el viento\" creen que la mejora de la eficiencia de las turbinas eólicas podría incrementar ese porcentaje hasta el 20% en el año 2040. Sin embargo, para alcanzar este objetivo BBVA Research cree que aún faltan 2.000 GW más de capacidad en parques onshore y otros 200GW offshore. La diferencia entre estos dos términos radica en la situación geográfica de los parques eólicos: en tierra (onshore) o sobre el mar (offshore). En total, un objetivo para 2040 que necesitará de inversiones por valor de cuatro billones de dólares.', 'energia-eolica.jpg', 'Energía eólica', 2, '2020-07-14'),
(4, 'Energía solar sostenible en el futuro ', 'Resumen— Este documento desea mostrar los resultados obtenidos a base de una aplicación web alojada en la nube teniendo como fin el intentar aumentar el consumo de energías no contaminantes, basándose en el objetivo de la ONU “Energía asequible y no contaminante”. También se exhibirá como funciona la aplicación.\r\n\r\nAbstract— This document wants to show the results obtained on the basis of an application, the web hosted in the cloud, aiming at increasing the consumption of clean energy, the specification in the UN objective \"Affordable and clean energy\". It will also be shown how the application works\r\n', 'panelsolar2.jpg', 'Energía solar', 1, '2020-07-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `pass`) VALUES
(1, 'Miguel Nava', '15030463@itesa.edu.mx', 'c1234'),
(2, 'Jonathan Cañedo', '15030371@itesa.edu.mx', 'cañedo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
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
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
