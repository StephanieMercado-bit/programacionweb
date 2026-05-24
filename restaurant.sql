-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2026 a las 02:59:20
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
-- Base de datos: `restaurant`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_usuario`) VALUES
(62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` varchar(8) NOT NULL,
  `total_precio` int(6) NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `total_precio`, `id_usuario`) VALUES
('6458d05b', 0, 45),
('6458d2c3', 17, 46),
('6458dc04', 0, 48),
('6458e068', 0, 54),
('64592f5d', 0, 58),
('645930d9', 0, 59),
('6a11e83a', 0, 60),
('6a11fae9', 0, 61),
('6a12188a', 0, 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `telefono` int(11) NOT NULL,
  `direccion` varchar(256) NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_reserva` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Usuarios registrados de tipo cliente';

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`telefono`, `direccion`, `id_usuario`, `id_reserva`) VALUES
(11, 'Chiclana', 59, NULL),
(1111, 'Sanlucar de Bda.', 46, NULL),
(9994, 'calle polar', 60, NULL),
(5462314, 'Calle 12, Portal C, 22222', 45, NULL),
(33123123, 'Sanlucar de Bda.', 55, NULL),
(44444333, 'Jerez de la Frontera', 48, NULL),
(44955123, 'admincalle', 62, NULL),
(449255555, 'madrigal 404', 61, NULL),
(1111111111, 'Jerez de la Frontera', 54, NULL),
(1234567891, 'Jerez de la Frontera', 58, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cocinero`
--

CREATE TABLE `cocinero` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cocinero`
--

INSERT INTO `cocinero` (`id_usuario`) VALUES
(60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE `local` (
  `id_local` varchar(8) NOT NULL,
  `ciudad` varchar(64) NOT NULL,
  `direccion` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`id_local`, `ciudad`, `direccion`) VALUES
('64209141', 'Sanlúcar', 'La Calzada'),
('6421c1ce', 'Jerez de la Frontera', 'La estación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2023_04_21_170047_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` varchar(8) NOT NULL,
  `total_precio` int(3) NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `estado` enum('pendiente','en_preparacion','lista') NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `total_precio`, `id_usuario`, `estado`) VALUES
('6458d3ac', 10, 46, 'lista'),
('64593211', 32, 46, 'lista'),
('645932cf', 2, 46, 'lista'),
('6a11fb26', 6, 61, 'lista'),
('6a12030b', 195, 61, 'lista'),
('6a122cdd', 340, 61, 'lista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` varchar(8) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` int(3) NOT NULL,
  `tipo` enum('menu','principal','entrante','bebida','postre') NOT NULL,
  `descripcion` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `tipo`, `descripcion`) VALUES
('c1o2m3b4', 'Combo Burger Lover', 220, 'menu', 'Incluye Hamburguesa Clásica, Papas a la Francesa y Malteada de Vainilla.'),
('e1n2t3r4', 'Papas a la Francesa', 55, 'entrante', 'Porción grande de papas fritas con sal de mar.'),
('e5n6t7r8', 'Aros de Cebolla', 65, 'entrante', 'Aros de cebolla empanizados acompañados de salsa BBQ.'),
('h1a2m3b4', 'Hamburguesa Clásica', 120, 'principal', 'Carne de res 150g, queso americano, lechuga, tomate y aderezo de la casa.'),
('h5a6m7b8', 'Smash Burger Doble', 180, 'principal', 'Doble carne smash, doble queso cheddar, tocino crujiente y cebolla caramelizada.'),
('h9a0m1b2', 'Chicken Crunch', 150, 'principal', 'Pechuga de pollo frita extracrujiente, ensalada de col y mayonesa picante.'),
('m3a4l5t6', 'Malteada de Vainilla Clásica', 75, 'bebida', 'Malteada espesa de vainilla con crema batida y una cereza.'),
('m7a8l9t0', 'Malteada de Chocolate Extremo', 90, 'bebida', 'Helado de chocolate, jarabe, trozos de brownie y crema batida.'),
('p1o2s3t4', 'Pay de Queso con Fresa', 70, 'postre', 'Rebanada de pay de queso horneado con mermelada de fresa natural.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_car_prod`
--

CREATE TABLE `rel_car_prod` (
  `id_carrito` varchar(8) NOT NULL,
  `id_producto` varchar(8) NOT NULL,
  `cantidad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_ped_prod`
--

CREATE TABLE `rel_ped_prod` (
  `id_pedido` varchar(8) NOT NULL,
  `id_producto` varchar(8) NOT NULL,
  `cantidad` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rel_ped_prod`
--

INSERT INTO `rel_ped_prod` (`id_pedido`, `id_producto`, `cantidad`) VALUES
('6a12030b', 'e5n6t7r8', 1),
('6a12030b', 'e1n2t3r4', 1),
('6a12030b', 'm3a4l5t6', 1),
('6a122cdd', 'e1n2t3r4', 1),
('6a122cdd', 'c1o2m3b4', 1),
('6a122cdd', 'e5n6t7r8', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` varchar(8) NOT NULL,
  `num_personas` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_local` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `num_personas`, `fecha`, `hora`, `id_usuario`, `id_local`) VALUES
('645931a9', 4, '2023-05-17', '17:00:00', 46, '64209141'),
('6a122dd4', 4, '2026-05-29', '18:00:00', 61, '6421c1ce');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DLNjej5CHAMsMNZnsIVNHjZnYJa50GRyBLJ5F0Li', 60, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.120.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicmZMQVlWZXNOT1FSeGhxSG9TWlc2MVlXWjRMVXlsajZmaDM5bnJ4SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb2NpbmEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCREeHhUcEFkaC44ZUFSbWlKN2pLbFBPVFFLYmQybzUubE5WR241UHVNRTVyaldXYTF0WVd4bSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NjA7fQ==', 1779576263),
('uzMWgJYiXqWbCGm6yRzAN4M2KaP7duiKqYV4pu5F', 61, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUTFDUVRmY1lkSmdoaUJuenVoZ3UzcWVkSXFLRXl1VGlEczlYelE1QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJyaXRvIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NjE7fQ==', 1779576499);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(45, 'ivan', 'ivan@gmail.com', NULL, '$2y$10$IP7v/RJdbUiuhnU98xcaYef7OQtwJL0vPkRiGtDcjnarirEL.Lo5G', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-08 08:35:07', '2023-05-08 08:35:07'),
(46, 'Antonio', 'antonio@gmail.com', NULL, '$2y$10$n0rKvx6j6Of995pjV3BYzuRE6gxP3UvTqumdd75hHc8J8EwkNKqzW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-08 08:45:23', '2023-05-08 08:48:55'),
(48, 'Pablo', 'pablo@gmail.com', NULL, '$2y$10$fGzSLzm5DW3sV2rX90qePuTdLCBBq0PSWlFZ9n6p9lkSdUFZSQS3q', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-08 09:24:52', '2023-05-08 09:24:52'),
(54, 'Alejandro', 'alejandro@gmail.com', NULL, '$2y$10$L0BI9NBPYKKhpmkmpe/wZ.qnGAhik8AGMb3MfIj8uW7MlADY2il1K', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-08 09:43:36', '2023-05-08 09:43:36'),
(55, 'pepito', 'pepito@gmail.com', NULL, '$2y$10$Vv.o1Bfjn5FkzqFuRcsEwOR4vSJzyCv9ftali3eKqbK1T1JEkPN7W', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-08 10:07:22', '2023-05-08 10:07:22'),
(58, 'Juan', 'juan@gmail.com', NULL, '$2y$10$L2lCpVnUFgppOx/TMyRu9.2q/NOxOQ5QHosti8AVDR3ZPObz.EBn6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-08 15:20:29', '2023-05-08 15:26:14'),
(59, 'Francisco', 'francisco@gmail.com', NULL, '$2y$10$Zkys5Qvt1JW.tG7j2jQNqeI7hdy6cDxkdw5I6ImatwBFNMpr2Bpp6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-08 15:26:49', '2023-05-08 15:27:28'),
(60, 'estre', 'estre@gmail.com', NULL, '$2y$10$DxxTpAdh.8eARmiJ7jKlPOTQKbd2o5.lNVGn5PuME5rjWWa1tYWxm', NULL, NULL, NULL, NULL, NULL, NULL, '2026-05-23 23:47:38', '2026-05-23 23:47:38'),
(61, 'Fatima González', 'fati@gmail.com', NULL, '$2y$10$.Ysnm5.yDQ5Rk2x9vx2p/.hnvINz0BTl8DO796p5e8Zks1.EgEkg2', NULL, NULL, NULL, NULL, NULL, NULL, '2026-05-24 01:07:21', '2026-05-24 01:07:21'),
(62, 'admin', 'admin@gmail.com', NULL, '$2y$10$/dSpwRFjb0O5eYV5mrNbpeAXeuRPmSw7xcqUXm4Fb8Giw5pTtkwfq', NULL, NULL, NULL, NULL, NULL, NULL, '2026-05-24 03:13:46', '2026-05-24 03:13:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_reserva` (`id_reserva`);

--
-- Indices de la tabla `cocinero`
--
ALTER TABLE `cocinero`
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id_local`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `rel_car_prod`
--
ALTER TABLE `rel_car_prod`
  ADD KEY `id_carrito` (`id_carrito`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `rel_ped_prod`
--
ALTER TABLE `rel_ped_prod`
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_local` (`id_local`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indices de la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indices de la tabla `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

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
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cocinero`
--
ALTER TABLE `cocinero`
  ADD CONSTRAINT `cocinero_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_car_prod`
--
ALTER TABLE `rel_car_prod`
  ADD CONSTRAINT `rel_car_prod_ibfk_4` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rel_car_prod_ibfk_5` FOREIGN KEY (`id_carrito`) REFERENCES `carrito` (`id_carrito`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_ped_prod`
--
ALTER TABLE `rel_ped_prod`
  ADD CONSTRAINT `rel_ped_prod_ibfk_3` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rel_ped_prod_ibfk_4` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_local`) REFERENCES `local` (`id_local`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
