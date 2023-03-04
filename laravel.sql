-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2023 a las 03:30:51
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
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_01_000913_tb_areas', 1),
(6, '2023_03_01_000925_tb_areasusuarios', 1),
(7, '2023_03_01_000935_tb_metas', 1),
(8, '2023_03_01_000945_tb_areasmetas', 1),
(9, '2023_03_01_000955_tb_programas', 1),
(10, '2023_03_01_002046_tb_calendarizars', 1),
(11, '2023_03_04_000248_tb_tipos', 1),
(12, '2023_03_04_000541_tb_usuarios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_areas`
--

CREATE TABLE `tb_areas` (
  `id_area` bigint(20) UNSIGNED NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_areas`
--

INSERT INTO `tb_areas` (`id_area`, `clave`, `nombre`, `descripcion`, `foto`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, '1', 'ABOGADO GENERAL ', 'ABOGADO GENERAL ', 'cuervo.png	', 0, 1, '2023-03-01 01:24:52', '2023-03-01 01:24:54'),
(2, '2', 'ORGANO INTERNO DE CONTROL', 'ORGANO INTERNO DE CONTROL\r\n', 'cuervo.png\r\n', 0, 2, '2023-03-01 01:25:29', '2023-03-01 01:25:33'),
(3, '3', 'UIPPE', 'UNIDAD DE INFROMACION, PLANEACION, PROGRAMACION  Y EVALUACION', 'cuervo.png', 0, 3, '2023-03-01 01:26:59', '2023-03-01 01:27:02'),
(4, '4', 'SECRETARIA ACADEMICA', 'SECRETARIA ACADEMICA', 'cuervo.png', 0, 4, '2023-03-01 01:27:43', '2023-03-01 01:27:46'),
(5, '5', 'DESARROLLO Y FORTALICIMIENTO ACADEMICO', 'DESARROLLO Y FORTALECIMIENTO ACADEMICO 	', 'cuervo.png', 0, 5, '2023-03-01 01:28:39', '2023-03-01 01:28:42'),
(6, '6', 'SECRETARIA DE VINCULACION', 'SECRETARIA DE VINCULACION', 'cuervo.png', 0, 6, '2023-03-01 01:29:26', '2023-03-01 01:29:30'),
(7, '7', 'SUBDIRECCION DE PROYECTOS DE VINCULACION', 'SUBRIRECCION DE PROYECTOS DE VINCULACION', 'cuervo.png', 0, 7, '2023-03-01 01:31:45', '2023-03-01 01:31:47'),
(8, '8', 'DEPARTAMENTO DE SERVICIOS TECNOLOGICOS', 'DEPARTAMENTO DE SERVICIOS TECNOLOGICOS\r\n				', 'cuervo.png', 0, 8, '2023-03-01 01:32:41', '2023-03-01 01:32:44'),
(9, '9', 'DEPARTAMENTO DE DESEMPEÑO DE EGRESADOS ', 'DEPARTAMENTO DE DESEMPEÑO DE EGRESADOS', 'cuervo.png', 0, 9, '2023-03-01 01:33:36', '2023-03-01 01:33:38'),
(10, '10', 'CEPIMUTVTOL', 'CENTRO DE DESAROLLO DE NEGOCIOS/ CENTRO DE PROTECCION DE INVENCIONES Y MARCAS', 'cuervo.png', 0, 10, '2023-03-01 01:34:39', '2023-03-01 01:34:41'),
(11, '11', 'COORDINACION DE LA ENTIDAD DE CERTIFICACION Y EVAL', 'COORDINACION DE LA ENTIDAD DE CERTIFICACION Y EVALUACION CONOCER', 'cuervo.png', 0, 11, '2023-03-01 01:35:35', '2023-03-01 01:35:37'),
(12, '12', 'DIRECCION DE DIFUSION Y EXTENSION UNIVERSITARIA', 'DIRECCION DE DIFUSION Y EXTENSION UNIVERSITARIA', 'cuervo.png', 0, 12, '2023-03-01 01:36:28', '2023-03-01 01:36:30'),
(13, '13', 'DEPARTAMENTO DE ACTIVIDADES CULTURALES Y DEPOSTIVA', 'DEPARTAMENTO DE ACTIVIDADES CULTURALES Y DEPOSTIVAS ', 'cuervo.png', 0, 13, '2023-03-01 01:39:31', '2023-03-01 01:39:33'),
(14, '14', 'DEPARTAMENTO DE PRENSA Y DIFUSION', 'DEPARTAMENTO DE PRENSA Y DIFUSION', 'cuervo.png', 0, 14, '2023-03-01 01:40:20', '2023-03-01 01:40:23'),
(15, '15', 'DEPARTAMENTO DE EDUCACION CONTINUA', 'DEPARTAMENTO DE EDUCACION CONTINUA', 'cuervo.png', 0, 15, '2023-03-01 01:41:00', '2023-03-01 01:41:03'),
(16, '16', 'DIRECCION DE ADMINISTRACION Y FINANZAS', 'DIRECCION DE ADMINISTRACION Y FINANZAS', 'cuervo.png', 0, 16, '2023-03-01 01:41:40', '2023-03-01 01:41:42'),
(17, '17', 'DEPARTAMENTO DE RECURSOS HUMANOS', 'DEPARTAMENTO DE RECURSOS HUMANOS', 'cuervo.png	', 0, 17, '2023-03-01 01:42:17', '2023-03-01 01:42:19'),
(18, '18', 'DEPARTAMENTO DE RECURSOS MATERIALES', 'DEPARTAMENTO DE RECURSOS MATERIALES', 'cuervo.png', 0, 18, '2023-03-01 01:43:30', '2023-03-01 01:43:31'),
(19, '19', 'DEPARTAMENTO DE MANTENIMIENTO Y SERVICIOS GENERALE', 'DEPARTAMENTO DE MANTENIMIENTO Y SERVICIOS GENERALES', 'cuervo.png', 0, 19, '2023-03-01 01:44:17', '2023-03-01 01:44:18'),
(20, '20', 'DEPARTAMENTO DE SISTEMAS', 'DEPARTAMENTO DE SISTEMAS', 'cuervo.png', 0, 20, '2023-03-01 01:44:57', '2023-03-01 01:45:03'),
(21, '21', 'SUBBDIRECCION DE FINANZAS', 'SUBBDIRECCION DE FINANZAS', 'cuervo.png', 0, 21, '2023-03-01 01:45:55', '2023-03-01 01:45:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_areasmetas`
--

CREATE TABLE `tb_areasmetas` (
  `id_areasmetas` bigint(20) UNSIGNED NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_meta` int(11) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `objetivo` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_areasusuarios`
--

CREATE TABLE `tb_areasusuarios` (
  `id_areasusuarios` bigint(20) UNSIGNED NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_calendarizars`
--

CREATE TABLE `tb_calendarizars` (
  `id_entrega` bigint(20) UNSIGNED NOT NULL,
  `id_areameta` int(11) NOT NULL,
  `fechaentrega` date NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_metas`
--

CREATE TABLE `tb_metas` (
  `id_meta` bigint(20) UNSIGNED NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_programas`
--

CREATE TABLE `tb_programas` (
  `id_programa` bigint(20) UNSIGNED NOT NULL,
  `abreviatura` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_programas`
--

INSERT INTO `tb_programas` (`id_programa`, `abreviatura`, `nombre`, `descripcion`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, 'SIPREP', 'SISTEMA DE PLANEACION Y PRESUPUESTO', 'ENCARGADO DEL PRESUPUESTO	\r\n', 0, 1, '2023-03-01 01:18:09', '2023-03-01 01:18:12'),
(2, 'POA FEDERAL', 'PROGRAMA OPERATIVO ANUAL  FEDERAL', 'PRESUPUESTAR LOS RECURSOS FINANCIEROSN NECESARIOS XD', 0, 2, '2023-03-01 01:19:27', '2023-03-01 01:19:30'),
(3, 'PIDE', 'PLATAFORMA DE INTERINOS DOCENTEES DE EXTREMADURA P', ' referencia a Programa Intensivo de Dirección de Empresas de forma abreviada', 0, 3, '2023-03-01 01:22:12', '2023-03-01 01:22:15'),
(4, 'PROPIAS', 'UTVT', 'PROGRMA DE LA UTVT\r\n', 0, 4, '2023-03-01 01:23:20', '2023-03-01 01:23:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipos`
--

CREATE TABLE `tb_tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_tipos`
--

INSERT INTO `tb_tipos` (`id`, `clave`, `nombre`, `descripcion`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, 'TIP1', 'Administardor', 'Contiene todos los permisos sobre el sistema', 1, 1, '2023-03-04 00:17:17', '2023-03-04 00:17:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gen` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fn` date NOT NULL,
  `academico` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tipo` int(10) UNSIGNED NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `clave`, `nombre`, `app`, `apm`, `gen`, `fn`, `academico`, `foto`, `email`, `pass`, `id_tipo`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, 'USR1', 'Jimena', 'Diaz', 'De Los Santos', 'F', '2003-02-24', 'TSU Area desarrollo de software multiplataforma', 'cuervo.png', 'al222110707@gmail.com', '123456', 1, 1, 1, '2023-03-04 00:18:34', '2023-03-04 00:18:34');

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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `tb_areas`
--
ALTER TABLE `tb_areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `tb_areasmetas`
--
ALTER TABLE `tb_areasmetas`
  ADD PRIMARY KEY (`id_areasmetas`);

--
-- Indices de la tabla `tb_areasusuarios`
--
ALTER TABLE `tb_areasusuarios`
  ADD PRIMARY KEY (`id_areasusuarios`);

--
-- Indices de la tabla `tb_calendarizars`
--
ALTER TABLE `tb_calendarizars`
  ADD PRIMARY KEY (`id_entrega`);

--
-- Indices de la tabla `tb_metas`
--
ALTER TABLE `tb_metas`
  ADD PRIMARY KEY (`id_meta`);

--
-- Indices de la tabla `tb_programas`
--
ALTER TABLE `tb_programas`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `tb_tipos`
--
ALTER TABLE `tb_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `tb_usuarios_email_unique` (`email`),
  ADD KEY `tb_usuarios_id_tipo_foreign` (`id_tipo`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_areas`
--
ALTER TABLE `tb_areas`
  MODIFY `id_area` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tb_areasmetas`
--
ALTER TABLE `tb_areasmetas`
  MODIFY `id_areasmetas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_areasusuarios`
--
ALTER TABLE `tb_areasusuarios`
  MODIFY `id_areasusuarios` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_calendarizars`
--
ALTER TABLE `tb_calendarizars`
  MODIFY `id_entrega` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_metas`
--
ALTER TABLE `tb_metas`
  MODIFY `id_meta` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_programas`
--
ALTER TABLE `tb_programas`
  MODIFY `id_programa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_tipos`
--
ALTER TABLE `tb_tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_id_tipo_foreign` FOREIGN KEY (`id_tipo`) REFERENCES `tb_tipos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
