-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2022 a las 04:53:18
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pelicula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `id` int(11) NOT NULL,
  `alquiler_fecha` date NOT NULL,
  `alquiler_fecha_final` date NOT NULL,
  `alquiler_codigo` varchar(10) NOT NULL,
  `alquiler_monto` decimal(10,2) NOT NULL,
  `alquiler_estado` int(11) NOT NULL,
  `tarjeta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`id`, `alquiler_fecha`, `alquiler_fecha_final`, `alquiler_codigo`, `alquiler_monto`, `alquiler_estado`, `tarjeta_id`) VALUES
(25, '2022-08-08', '2022-08-11', 'ALQ-0001', '3.00', 2, 1),
(26, '2022-08-21', '2022-08-24', 'ALQ-0002', '9.50', 2, 1),
(27, '2022-08-21', '2022-08-24', 'ALQ-0003', '6.00', 2, 3),
(28, '2022-08-21', '2022-08-24', 'ALQ-0004', '3.00', 2, 3),
(29, '2022-08-11', '2022-08-14', 'ALQ-0005', '8.00', 2, 3),
(30, '2022-08-22', '2022-08-25', 'ALQ-0006', '4.50', 2, 1),
(31, '2022-08-18', '2022-08-21', 'ALQ-0007', '3.00', 2, 4),
(32, '2022-08-22', '2022-08-25', 'ALQ-0008', '16.00', 2, 5),
(33, '2022-08-16', '2022-08-19', 'ALQ-0009', '8.50', 2, 5),
(34, '2022-08-22', '2022-08-25', 'ALQ-0010', '7.00', 2, 5),
(35, '2022-08-23', '2022-08-26', 'ALQ-0011', '10.00', 2, 3),
(36, '2022-08-27', '2022-08-30', 'ALQ-0012', '15.00', 2, 5),
(37, '2022-08-27', '2022-08-30', 'ALQ-0013', '13.00', 2, 5),
(38, '2022-08-30', '2022-09-02', 'ALQ-0014', '8.00', 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria_descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria_descripcion`) VALUES
(1, 'Acción'),
(2, 'Anime'),
(3, 'Terror'),
(4, 'Aventura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `cliente_nombre` varchar(200) NOT NULL,
  `cliente_apellido` varchar(200) NOT NULL,
  `cliente_dni` varchar(8) NOT NULL,
  `cliente_edad` int(11) NOT NULL,
  `cliente_correo` varchar(200) NOT NULL,
  `cliente_tarjeta` int(11) NOT NULL,
  `cliente_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `cliente_nombre`, `cliente_apellido`, `cliente_dni`, `cliente_edad`, `cliente_correo`, `cliente_tarjeta`, `cliente_estado`) VALUES
(1, 'Juan', 'Perez Pinedo', '72155069', 21, 'prueba01@gmail.com', 2, 1),
(2, 'Luisa', 'Sandoval Huayamba', '76233224', 21, 'prueba02@gmail.com', 2, 1),
(3, 'Pedro', 'Garcia Chavez', '76934415', 21, 'prueba03@gmail.com', 2, 2),
(4, 'Juanito', 'Garcia Alvarez', '87654321', 21, 'recicla.prueba.purcallpa@gmail.com', 2, 1),
(5, 'Andrea', 'Mendoza Sandoval', '77777777', 21, 'jamt.mendozaf@gmail.com', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_alquiler`
--

CREATE TABLE `detalle_alquiler` (
  `id` int(11) NOT NULL,
  `detalle_estado` int(11) NOT NULL,
  `detalle_link` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `alquiler_id` int(11) NOT NULL,
  `pelicula_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_alquiler`
--

INSERT INTO `detalle_alquiler` (`id`, `detalle_estado`, `detalle_link`, `alquiler_id`, `pelicula_id`) VALUES
(27, 2, 'https://www.pucallpa_alquila.com/pelicula/jujutsu-kaisen/2hrs03min/normal', 25, 2),
(28, 2, 'https://www.pucallpa_alquila.com/pelicula/black-clover/2hrs28min/estreno', 26, 1),
(29, 2, 'https://www.pucallpa_alquila.com/pelicula/annabelle/2hrs00min/normal', 26, 3),
(30, 2, 'https://www.pucallpa_alquila.com/pelicula/black-clover/2hrs28min/estreno', 27, 1),
(31, 2, 'https://www.pucallpa_alquila.com/pelicula/jujutsu-kaisen/2hrs03min/normal', 28, 2),
(32, 2, 'https://www.pucallpa_alquila.com/pelicula/capitán-america/2hrs31min/estreno', 29, 4),
(33, 2, 'https://www.pucallpa_alquila.com/pelicula/annabelle/2hrs00min/normal', 29, 3),
(34, 2, 'https://www.pucallpa-alquila.com/jamt/pelicula/capitán-america/2hrs31min/estreno', 30, 4),
(35, 2, 'https://www.pucallpa-alquila.com/yochiro/pelicula/jujutsu-kaisen/2hrs03min/normal', 31, 2),
(36, 2, 'https://www.pucallpa-alquila.com/harold/pelicula/malefica/2hrs10min/estreno', 32, 6),
(37, 2, 'https://www.pucallpa-alquila.com/harold/pelicula/capitán-america/2hrs31min/estreno', 32, 4),
(38, 2, 'https://www.pucallpa-alquila.com/harold/pelicula/black-clover/2hrs28min/estreno', 32, 1),
(39, 2, 'https://www.pucallpa-alquila.com/harold/pelicula/jujutsu-kaisen/2hrs03min/normal', 33, 2),
(40, 2, 'https://www.pucallpa-alquila.com/harold/pelicula/malefica/2hrs10min/estreno', 33, 6),
(41, 2, 'https://www.pucallpa-alquila.com/harold/pelicula/geminis/2hrs50min/estreno', 34, 5),
(42, 2, 'https://www.pucallpa-alquila.com/luisa/pelicula/malefica/2hrs10min/estreno', 35, 6),
(43, 2, 'https://www.pucallpa-alquila.com/luisa/pelicula/capitán-america/2hrs31min/estreno', 35, 4),
(44, 2, 'https://www.pucallpa-alquila.com/harold/pelicula/black-clover/2hrs28min/estreno', 36, 1),
(45, 2, 'https://www.pucallpa-alquila.com/harold/pelicula/malefica/2hrs10min/estreno', 36, 6),
(46, 2, 'https://www.pucallpa-alquila.com/harold/pelicula/annabelle/2hrs00min/normal', 36, 3),
(47, 2, 'https://www.pucallpa-alquila.com/harold/pelicula/capitán-america/2hrs31min/estreno', 37, 4),
(48, 2, 'https://www.pucallpa-alquila.com/harold/pelicula/jujutsu-kaisen/2hrs03min/normal', 37, 2),
(49, 2, 'https://www.pucallpa-alquila.com/harold/pelicula/malefica/2hrs10min/estreno', 37, 6),
(50, 1, 'https://www.pucallpa-alquila.com/andrea/pelicula/jujutsu-kaisen/2hrs03min/normal', 38, 2),
(51, 1, 'https://www.pucallpa-alquila.com/andrea/pelicula/geminis/2hrs50min/normal', 38, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_tarjeta`
--

CREATE TABLE `historial_tarjeta` (
  `id` int(11) NOT NULL,
  `historial_monto` decimal(10,2) NOT NULL,
  `historial_fecha` date NOT NULL,
  `historial_modo` int(11) NOT NULL,
  `tarjeta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial_tarjeta`
--

INSERT INTO `historial_tarjeta` (`id`, `historial_monto`, `historial_fecha`, `historial_modo`, `tarjeta_id`) VALUES
(1, '10.00', '2022-08-20', 1, 1),
(2, '12.00', '2022-08-20', 1, 1),
(3, '4.00', '2022-08-20', 1, 1),
(4, '5.00', '2022-08-20', 1, 3),
(5, '14.00', '2022-08-20', 2, 1),
(6, '2.00', '2022-08-20', 1, 1),
(7, '30.00', '2022-08-20', 1, 1),
(8, '5.00', '2022-08-20', 1, 3),
(9, '4.00', '2022-08-20', 1, 3),
(10, '5.00', '2022-08-20', 1, 3),
(11, '9.50', '2022-08-21', 2, 1),
(12, '12.50', '2022-08-21', 2, 1),
(13, '12.50', '2022-08-21', 2, 1),
(14, '6.00', '2022-08-21', 1, 1),
(15, '5.00', '2022-08-21', 1, 1),
(16, '9.00', '2022-08-21', 2, 1),
(17, '9.00', '2022-08-21', 2, 3),
(18, '9.00', '2022-08-21', 2, 3),
(19, '3.50', '2022-08-21', 2, 3),
(20, '3.50', '2022-08-21', 2, 3),
(21, '3.00', '2022-08-21', 2, 1),
(22, '10.00', '2022-08-21', 1, 1),
(23, '9.50', '2022-08-21', 2, 1),
(24, '6.00', '2022-08-21', 2, 3),
(25, '3.00', '2022-08-21', 2, 3),
(26, '10.00', '2022-08-21', 1, 3),
(27, '8.00', '2022-08-21', 2, 3),
(28, '7.00', '2022-08-21', 1, 3),
(29, '5.00', '2022-08-22', 1, 1),
(30, '4.50', '2022-08-22', 2, 1),
(31, '4.00', '2022-08-22', 1, 4),
(32, '3.00', '2022-08-22', 2, 4),
(33, '15.00', '2022-08-22', 1, 5),
(34, '7.00', '2022-08-22', 1, 5),
(35, '16.00', '2022-08-22', 2, 5),
(36, '5.00', '2022-08-22', 1, 5),
(37, '8.50', '2022-08-22', 2, 5),
(38, '4.50', '2022-08-22', 1, 5),
(39, '7.00', '2022-08-22', 2, 5),
(40, '14.00', '2022-08-22', 1, 5),
(41, '3.00', '2022-08-23', 1, 3),
(42, '10.00', '2022-08-23', 2, 3),
(43, '1.00', '2022-08-27', 1, 5),
(44, '15.00', '2022-08-27', 2, 5),
(45, '10.00', '2022-08-27', 1, 5),
(46, '15.00', '2022-08-27', 1, 5),
(47, '13.00', '2022-08-27', 2, 5),
(48, '17.00', '2022-08-30', 1, 10),
(49, '8.00', '2022-08-30', 2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL,
  `pelicula_descripcion` varchar(200) NOT NULL,
  `pelicula_monto` decimal(10,2) NOT NULL,
  `pelicula_registro` date NOT NULL,
  `pelicula_imagen` varchar(200) NOT NULL,
  `pelicula_duracion` time NOT NULL,
  `pelicula_estado` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `pelicula_descripcion`, `pelicula_monto`, `pelicula_registro`, `pelicula_imagen`, `pelicula_duracion`, `pelicula_estado`, `categoria_id`, `tipo_id`) VALUES
(1, 'Black Clover', '6.00', '2022-08-18', '1660808531_Black Clover.jpg', '02:28:00', 1, 2, 1),
(2, 'Jujutsu Kaisen', '3.00', '2022-08-18', '1660808692_Jujutsu Kaisen.webp', '02:03:00', 1, 2, 2),
(3, 'Annabelle', '3.50', '2022-08-21', '1661095955_Annabelle.jpg', '02:00:00', 1, 3, 2),
(4, 'Capitán America', '4.50', '2022-08-21', '1661114058_Capitán America.webp', '02:31:00', 1, 1, 1),
(5, 'Geminis', '5.00', '2022-08-22', '1661179621_Geminis.jpg', '02:50:00', 1, 1, 2),
(6, 'Malefica', '4.50', '2022-08-22', '1661227375_Malefica.jpg', '02:10:00', 1, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE `tarjeta` (
  `id` int(11) NOT NULL,
  `tarjeta_numero` varchar(8) NOT NULL,
  `tarjeta_codigo` varchar(20) NOT NULL,
  `tarjeta_saldo` decimal(10,2) NOT NULL,
  `tarjeta_registro` date NOT NULL,
  `tarjeta_estado` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarjeta`
--

INSERT INTO `tarjeta` (`id`, `tarjeta_numero`, `tarjeta_codigo`, `tarjeta_saldo`, `tarjeta_registro`, `tarjeta_estado`, `cliente_id`) VALUES
(1, '00000001', '123', '1.50', '2022-08-17', 1, 1),
(3, '00000002', '123', '2.00', '2022-08-18', 1, 2),
(4, '00000003', '123', '1.00', '2022-08-22', 2, 3),
(5, '00000004', '123', '12.00', '2022-08-22', 1, 4),
(10, '00000005', '5555', '9.00', '2022-08-30', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pelicula`
--

CREATE TABLE `tipo_pelicula` (
  `id` int(11) NOT NULL,
  `tipo_descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_pelicula`
--

INSERT INTO `tipo_pelicula` (`id`, `tipo_descripcion`) VALUES
(1, 'Estreno'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$y7zq2D7bV3upP/lljShSpO9Ls89VOzBe3vaiqyUhy5wBpZidQ9wDy', 'JbYPtbPpJglzKTwz44EVDpQewyyZBeswmnKC5KnAj41jEVvYwtgxaIYGyVf4', '2022-08-18 02:53:46', '2022-08-18 02:53:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarjeta_id` (`tarjeta_id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_alquiler`
--
ALTER TABLE `detalle_alquiler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelicula_id` (`pelicula_id`),
  ADD KEY `alquiler_id` (`alquiler_id`);

--
-- Indices de la tabla `historial_tarjeta`
--
ALTER TABLE `historial_tarjeta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarjeta_id` (`tarjeta_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Indices de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `tipo_pelicula`
--
ALTER TABLE `tipo_pelicula`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_alquiler`
--
ALTER TABLE `detalle_alquiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `historial_tarjeta`
--
ALTER TABLE `historial_tarjeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_pelicula`
--
ALTER TABLE `tipo_pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `alquiler_ibfk_1` FOREIGN KEY (`tarjeta_id`) REFERENCES `tarjeta` (`id`);

--
-- Filtros para la tabla `detalle_alquiler`
--
ALTER TABLE `detalle_alquiler`
  ADD CONSTRAINT `detalle_alquiler_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `pelicula` (`id`),
  ADD CONSTRAINT `detalle_alquiler_ibfk_2` FOREIGN KEY (`alquiler_id`) REFERENCES `alquiler` (`id`);

--
-- Filtros para la tabla `historial_tarjeta`
--
ALTER TABLE `historial_tarjeta`
  ADD CONSTRAINT `historial_tarjeta_ibfk_1` FOREIGN KEY (`tarjeta_id`) REFERENCES `tarjeta` (`id`);

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `pelicula_ibfk_2` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_pelicula` (`id`);

--
-- Filtros para la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD CONSTRAINT `tarjeta_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
