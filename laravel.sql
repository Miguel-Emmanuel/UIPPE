-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2023 a las 21:57:52
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
(5, '2023_03_04_000248_tb_tipos', 1),
(6, '2023_03_04_000541_tb_usuarios', 1),
(7, '2023_03_08_035611_tb_areas', 1),
(8, '2023_03_08_040229_tb_programas', 1),
(9, '2023_03_08_040306_tb_metas', 1),
(10, '2023_03_08_040814_tb_areasusuarios', 1),
(11, '2023_03_08_041215_tb_areasmetas', 1),
(12, '2023_03_08_042614_tb_calendarizars', 1);

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
  `id_area` int(10) UNSIGNED NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'ARE1', 'Secretaría de Vinculación', 'Secretaría de Vinculación', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(2, 'ARE2', 'Organo Interno De Control', 'Organo Interno De Control', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(3, 'ARE3', 'Unidad De Información, Planeación, Programación  y Evaluación', 'UIPPE', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(4, 'ARE4', 'Secretaria Académica', 'Secretaria Académica', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(5, 'ARE5', 'Desarrollo y Fortalecimiento Académico', 'Desarrollo y Fortalecimiento Académico', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(6, 'ARE6', 'Secretaría de Vinculación', 'Secretaría de Vinculación', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(7, 'ARE7', 'Subdirección de Proyectos de Vinculación', 'Subdirección de Proyectos de Vinculación', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(8, 'ARE8', 'Departamento de Servicios Tecnológicos', 'Departamento de Servicios Tecnológicos', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(9, 'ARE9', 'Departamento de Desempeño a Egresados', 'Departamento de Desempeño a Egresados', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(10, 'ARE10', 'Centro de Desarrollo de Negocios/Centro de Protección de Invenciones y Marcas', 'CEPIMUTVTOL', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(11, 'ARE11', 'Coordinación de la Entidad de Certificación y Evaluación', 'CONOCER', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(12, 'ARE12', 'Dirección de Difusión y Extensión Universitaria', 'Dirección de Difusión y Extensión Universitaria', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(13, 'ARE13', 'Departamento de Actividades Culturales y Deportivas', 'Departamento de Actividades Culturales y Deportivas', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(14, 'ARE14', 'Departamento de Prensa y Difusión', 'Departamento de Prensa y Difusión', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(15, 'ARE15', 'Departamento de Educación Continua', 'Departamento de Educación Continua', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(16, 'ARE16', 'Departamento de Administración y Finanzas', 'Departamento de Administración y Finanzas', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(17, 'ARE17', 'Departamento de Recursos Humanos', 'Departamento de Recursos Humanos', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(18, 'ARE18', 'Departamento de Recursos Materiales', 'Departamento de Recursos Materiales', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(19, 'ARE19', 'Departamento de Mantenimiento y Servicios Generales', 'Departamento de Mantenimiento y Servicios Generales', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(20, 'ARE20', 'Departamento de Sistemas', 'Departamento de Sistemas', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(21, 'ARE21', 'Subdirección de Finanzas', 'Subdirección de Finanzas', 'cuervo.png', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_areasmetas`
--

CREATE TABLE `tb_areasmetas` (
  `id_areasmetas` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `meta_id` int(10) UNSIGNED NOT NULL,
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
  `id_areasusuarios` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
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
  `id_meta` int(10) UNSIGNED NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidadmedida` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `programa_id` int(10) UNSIGNED NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_metas`
--

INSERT INTO `tb_metas` (`id_meta`, `clave`, `nombre`, `descripcion`, `unidadmedida`, `programa_id`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, '1', 'Fomentar que los estudiantes egresen de sus estudios de tipo superior en el ciclo escolar', '', 'Egresado', 1, 1, 1, '2023-03-08 17:14:25', '2023-03-08 17:39:05'),
(2, '2', 'Atender a la matrícula de educación superior para contribuir en la disminución de las divergencias entre la oferta y la demanda educativa', NULL, 'Estudiante', 1, 1, 1, '2023-03-08 17:26:09', '2023-03-08 17:26:09'),
(3, '3', 'Atender a los estudiantes de nuevo ingreso de educación superior para contribuir en la disminución de las divergencias entre la oferta y la demanda educativa', NULL, 'Estudiante', 1, 1, 1, '2023-03-08 17:27:55', '2023-03-08 17:27:55'),
(4, '4', 'Realizar acciones de formación integral, para desarrollar capacidades, valores y habilidades profesionales', NULL, 'Acción', 1, 1, 1, '2023-03-08 17:29:04', '2023-03-08 17:29:04'),
(5, '5', 'Realizar acciones para fomentar una cultura emprendedora', NULL, 'Acción', 1, 1, 1, '2023-03-08 17:29:42', '2023-03-08 17:29:42'),
(6, '6', 'Acreditar programas educativos en educación superior para mejorar la calidad', NULL, 'Programa', 1, 1, 1, '2023-03-08 17:30:12', '2023-03-08 17:30:12'),
(7, '7', 'Fomentar que los egresados se titulen', NULL, 'Documento', 1, 1, 1, '2023-03-08 17:30:43', '2023-03-08 17:30:43'),
(8, '8', 'Lograr certificaciones en Educación Superior para mejorar la calidad', NULL, 'Documento', 1, 1, 1, '2023-03-08 17:31:15', '2023-03-08 17:31:15'),
(9, '9', 'Impulsar la capacitación o actualización del personal docente para mejorar la formación académica', NULL, 'Docente', 1, 1, 1, '2023-03-08 17:31:55', '2023-03-08 17:31:55'),
(10, '10', 'Evaluar al personal docente con la finalidad de encontrar áreas de oportunidad para mejorar su desempeño', NULL, 'Docente', 1, 1, 1, '2023-03-08 17:33:00', '2023-03-08 17:33:00'),
(11, '11', 'Impulsar la capacitación del personal directivo y administrativo para el fortalecimiento institucional', NULL, 'Persona', 1, 1, 1, '2023-03-08 17:33:35', '2023-03-08 17:33:35'),
(12, '12', 'Desarrollar proyectos de investigación para atender las necesidades de desarrollo tecnológico, económico y social', NULL, 'Proyecto', 1, 1, 1, '2023-03-08 17:34:15', '2023-03-08 17:34:15'),
(13, '13', 'Realizar la publicación de documentos derivados de la investigación para su divulgación', NULL, 'Publicación', 1, 1, 1, '2023-03-08 17:35:26', '2023-03-08 17:35:26'),
(14, '14', 'Realizar acciones de vinculación y extensión que permitan establecer lazos de colaboración con los sectores público, privado y social', NULL, 'Acción', 1, 1, 1, '2023-03-08 17:36:02', '2023-03-08 17:36:02'),
(15, '15', 'Operar convenios con los sectores público, privado y social, para formalizar los lazos de colaboración institucional', NULL, 'Convenio', 1, 1, 1, '2023-03-08 17:36:46', '2023-03-08 17:36:46'),
(16, '16', 'Atender estudiantes en educación Dual para desarrollar aptitudes y habilidades en unidades económicas', NULL, 'Estudiante', 1, 1, 1, '2023-03-08 17:37:16', '2023-03-08 17:37:16'),
(17, '17', 'Impulsar la internacionalización entre la comunidad de la institución para fortalecer la calidad educativa', NULL, 'Persona', 1, 1, 1, '2023-03-08 17:37:59', '2023-03-08 17:37:59'),
(18, '18', 'Contactar egresados en educación superior para identificar su situación profesional', '', 'Egresado', 1, 1, 1, '2023-03-08 17:38:29', '2023-03-08 17:38:53'),
(19, '19', 'Impartir el idioma Inglés a los estudiantes en educación superior para el desarrollo de competencias', NULL, 'Estudiante', 1, 1, 1, '2023-03-08 17:40:05', '2023-03-08 17:40:05'),
(20, '20', 'Impulsar la participación de estudiantes de educación superior en procesos de certificación en el idioma Inglés para el desarrollo de competencias', NULL, 'Estudiante', 1, 1, 1, '2023-03-08 17:40:35', '2023-03-08 17:40:35'),
(21, '21', 'Destinar equipo de cómputo el proceso de enseñanza-aprendizaje en educación superior para el desarrollo de las habilidades digitales', NULL, 'Equipo de Computo', 1, 1, 1, '2023-03-08 17:41:17', '2023-03-08 17:41:17'),
(22, '22', 'Impulsar la participación  de estudiantes en procesos de certificación en el uso de tecnologías del aprendizaje, conocimiento, información y comunicación  para el desarrollo de competencias y habilidades', NULL, 'Estudiante', 1, 1, 1, '2023-03-08 17:41:55', '2023-03-08 17:41:55'),
(23, '23', 'Realizar acciones para la prevención de la violencia escolar de educación superior', NULL, 'Acción', 1, 1, 1, '2023-03-08 17:42:34', '2023-03-08 17:42:34'),
(24, '24', 'Realizar acciones para igualdad de trato y oportunidades', NULL, 'Acción', 1, 1, 1, '2023-03-08 17:43:03', '2023-03-08 17:43:03'),
(25, '25', 'Realizar auditorías, con el propósito de verificar el cumplimiento del marco normativo que regula el funcionamiento de las dependencias y organismos auxiliares del Ejecutivo Estatal y los Ayuntamientos', NULL, 'Auditoria', 1, 1, 1, '2023-03-08 17:43:35', '2023-03-08 17:43:35'),
(26, '26', 'Realizar auditorías para determinar el grado de eficacia y eficiencia en los procesos, así como el desempeño Institucional de las dependencias y organismos auxiliares del Ejecutivo Estatal', NULL, 'Evaluación', 1, 1, 1, '2023-03-08 17:44:06', '2023-03-08 17:44:06'),
(27, '27', 'Realizar inspecciones a rubros específicos en las dependencias, organismos auxiliares del Ejecutivo Estatal y en su caso Ayuntamientos, con el propósito de constatar el cumplimiento del marco normativo que lo regula', NULL, 'Inspección', 1, 1, 1, '2023-03-08 17:44:57', '2023-03-08 17:44:57'),
(28, '28', 'Participar en testificaciones, con el propósito de asegurarse que los actos administrativos se realicen con forme a la normatividad vigente', NULL, 'Testificación', 1, 1, 1, '2023-03-08 17:45:39', '2023-03-08 17:45:39'),
(29, '29', 'Participación del órgano de control interno en reuniones que por mandato legal o disposición administrativa así lo requiera', NULL, 'Sesión', 1, 1, 1, '2023-03-08 17:46:30', '2023-03-08 17:46:30'),
(30, '30', 'Acompañamiento en la atención de auditorias practicadas por los entes fiscalizadores externos', NULL, 'Acción', 1, 1, 1, '2023-03-08 17:47:05', '2023-03-08 17:47:05'),
(31, '31', 'Atender acciones derivadas de la Fiscalización realizada por entes fiscalizadores externos', NULL, 'Acción', 1, 1, 1, '2023-03-08 17:47:31', '2023-03-08 17:47:31'),
(32, '32', 'Atención a observaciones y acciones de mejora determinadas con motivo de los actos de fiscalización realizados por la Dirección General u Órgano Interno de Control', NULL, 'Acción', 1, 1, 1, '2023-03-08 17:48:07', '2023-03-08 17:48:07'),
(33, '33', 'Elaborar el informe de presunta responsabilidad administrativa', NULL, 'Informe', 1, 1, 1, '2023-03-08 17:48:35', '2023-03-08 17:48:35'),
(34, '34', 'Substanciar investigaciones derivadas de denuncias ciudadanas', NULL, 'Expediente', 1, 1, 1, '2023-03-08 17:49:01', '2023-03-08 17:49:01'),
(35, '35', 'Substanciar investigaciones derivadas de auditoria', NULL, 'Expediente', 1, 1, 1, '2023-03-08 17:49:25', '2023-03-08 17:49:25'),
(36, '36', 'Substanciar investigaciones derivadas de actuación de oficio', '', 'Expediente', 1, 1, 1, '2023-03-08 17:50:08', '2023-03-08 17:53:09'),
(37, '37', 'Opinión de Empleadores', '', 'Encuesta Realizada', 2, 1, 1, '2023-03-08 17:52:40', '2023-03-08 17:52:54'),
(38, '38', 'Promoción de Egresados en el Mercado Laboral Post Estadía', NULL, 'Egresado', 2, 1, 1, '2023-03-08 17:53:48', '2023-03-08 17:53:48'),
(39, '39', 'Sesiones de Vinculación y Pertinencia', NULL, 'Reunión Celebrada', 2, 1, 1, '2023-03-08 17:56:35', '2023-03-08 17:56:35'),
(40, '40', 'Movilidad Estudiantil Nacional e Internacional', NULL, 'Estudiante', 2, 1, 1, '2023-03-08 17:57:08', '2023-03-08 17:57:08'),
(41, '41', 'Difusión de la Oferta Educativa en Instituciones de Educación Media Superior', NULL, 'IEMS', 2, 1, 1, '2023-03-08 17:57:49', '2023-03-08 17:57:49'),
(42, '42', 'Promoción de Planes de Estudio en Eventos de Orientación Vocacional', NULL, 'Evento o Expo', 2, 1, 1, '2023-03-08 17:58:33', '2023-03-08 17:58:33'),
(43, '43', 'Cursos de Educación Continua', NULL, 'Curso', 2, 1, 1, '2023-03-08 17:59:12', '2023-03-08 17:59:12'),
(44, '44', 'Campañas de Prevención de Embarazo, Vacunación y Asistencia Médica', NULL, 'Campaña', 2, 1, 1, '2023-03-08 17:59:45', '2023-03-08 17:59:45'),
(45, '45', 'Seguimiento y Evaluación de los Programas Operativos', NULL, 'Reporte de Seguimiento', 2, 1, 1, '2023-03-08 18:00:20', '2023-03-08 18:00:20'),
(46, '46', 'Elaborar Reporte de Indicadores del Modelo de Evaluación de la Calidad (MECASUT) y Evaluación Institucional (EVIN)', NULL, 'Informe Elaborado', 2, 1, 1, '2023-03-08 18:00:57', '2023-03-08 18:00:57'),
(47, '47', 'Informe Anual de Actividades', NULL, 'Documento Elaborado', 2, 1, 1, '2023-03-08 18:01:39', '2023-03-08 18:01:39'),
(48, '48', 'Sesiones de Comités Institucionales', NULL, 'Sesión', 2, 1, 1, '2023-03-08 18:02:20', '2023-03-08 18:02:20'),
(49, '49', 'Encuesta de Satisfacción de Servicios Bibliotecarios', NULL, 'Informe de la Encuesta', 2, 1, 1, '2023-03-08 18:03:03', '2023-03-08 18:03:03'),
(50, '50', 'Alumnos Inscritos a la Biblioteca Digital', NULL, 'Estudiante', 2, 1, 1, '2023-03-08 18:03:31', '2023-03-08 18:03:31'),
(51, '51', 'Legislación Universitaria Publicado', NULL, 'Documento', 2, 1, 1, '2023-03-08 18:04:04', '2023-03-08 18:04:04'),
(52, '52', 'Otorgamiento de Becas', NULL, 'Estudiante Becado', 2, 1, 1, '2023-03-08 18:04:44', '2023-03-08 18:04:44'),
(53, '53', 'Elaborar informe anual de desempeño', NULL, 'Informe', 3, 1, 1, '2023-03-13 20:51:32', '2023-03-13 20:51:32'),
(54, '54', 'Instrumentos de Autoevaluación generados.', NULL, 'Documento', 3, 1, 1, '2023-03-13 20:52:12', '2023-03-13 20:52:12'),
(55, '55', 'Instrumentos de Autoevaluación aplicados', NULL, 'Documento', 3, 1, 1, '2023-03-13 20:52:37', '2023-03-13 20:52:37'),
(56, '56', 'Tasa de variación del desempeño institucional para el año t.', NULL, 'Evaluación', 3, 1, 1, '2023-03-13 20:53:03', '2023-03-13 20:53:03'),
(57, '57', 'Tasa de variación del desempeño institucional para el año t.', NULL, 'Evaluación', 3, 1, 1, '2023-03-13 20:53:37', '2023-03-13 20:53:37'),
(58, '58', 'Programa Operativo Anual Federal y Estatal elaborado en congruencia con el PIDE', '', 'Programa', 3, 1, 1, '2023-03-13 20:54:16', '2023-03-13 20:54:32'),
(59, '59', 'Seguimiento mensual a programas y proyectos institucionales realizados. (PAT)', NULL, 'Evaluación', 3, 1, 1, '2023-03-13 20:55:20', '2023-03-13 20:55:20'),
(60, '60', 'Informe bimenstral elaborado y presentado al Consejo Directivo.', NULL, 'Informe', 3, 1, 1, '2023-03-13 20:55:45', '2023-03-13 20:55:45'),
(61, '61', 'Informe anual elaborado y presentado al Consejo Directivo.', NULL, 'Informe', 3, 1, 1, '2023-03-13 20:56:18', '2023-03-13 20:56:18'),
(62, '61', 'Estadística cuatrimestral elaborada', NULL, 'Informe', 3, 1, 1, '2023-03-13 20:56:45', '2023-03-13 20:56:45'),
(63, '62', 'Estadística anual elaborada', NULL, 'Informe', 3, 1, 1, '2023-03-13 20:57:14', '2023-03-13 20:57:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_programas`
--

CREATE TABLE `tb_programas` (
  `id_programa` int(10) UNSIGNED NOT NULL,
  `abreviatura` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'SIPREP', 'Sistema de Presentación del Dictamen de estados financieros para efectos fiscales', 'Es un programa diseñado por el SAT para apoyar al contribuyente en la presentación de los dictámenes fiscales a través de internet facilitando el cumplimiento oportuno de sus obligaciones fiscales', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(2, 'POA Federal', 'Programa Operativo Anual', 'Presupuestar los recursos financieros necesarios para el cumplimiento de las metas del Programa de Trabajo Anual (PTA), mediante acciones programadas, por procesos estratégicos y clave', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(3, 'PIDE', 'Plan Institucional de Desarrollo', 'Plan Institucional de Desarrollo', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(4, 'PROPIAS', 'UTVT', 'UTVT', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13');

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
(1, 'TIP1', 'Administrador', 'Tiene acceso total al sistema', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(2, 'TIP2', 'Administrador de Plataforma', 'Tiene acceso total al sistema', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(3, 'TIP3', 'Encargado de Área', 'Tiene acceso total al sistema', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(4, 'TIP4', 'Secretaria', 'Solo tiene acceso al apartado de Metas y gráficas', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(5, 'TIP5', 'Invitado', 'Solo puede ver el contenido en gráficas', 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13');

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
(1, 'URS1', 'Jimena', 'Diaz', 'De Los Santos', 'F', '2003-02-24', 'TSU Área Dasarrollo de Software Multiplataforma', 'cuervo.png', 'al222110707@gmail.com', '123456', 1, 1, 1, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(2, 'URS2', 'Jossue Alejandro', 'Candelas', 'Hernandez', 'M', '2003-06-17', 'TSU Área Dasarrollo de Software Multiplataforma', 'cuervo.png', 'al222110811@gmail.com', '123456', 1, 1, 2, '2023-03-12 02:22:13', '2023-03-12 02:22:13'),
(3, 'URS3', 'Miguel Emmanuel', 'Arriola', 'Ortega', 'M', '2003-05-01', 'TSU Área Dasarrollo de Software Multiplataforma', 'cuervo.png', 'aal222010230@gmail.com', '123456', 1, 1, 2, '2023-03-12 02:22:13', '2023-03-12 02:22:13');

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
  ADD PRIMARY KEY (`id_areasmetas`),
  ADD KEY `tb_areasmetas_area_id_foreign` (`area_id`),
  ADD KEY `tb_areasmetas_meta_id_foreign` (`meta_id`);

--
-- Indices de la tabla `tb_areasusuarios`
--
ALTER TABLE `tb_areasusuarios`
  ADD PRIMARY KEY (`id_areasusuarios`),
  ADD KEY `tb_areasusuarios_area_id_foreign` (`area_id`),
  ADD KEY `tb_areasusuarios_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `tb_calendarizars`
--
ALTER TABLE `tb_calendarizars`
  ADD PRIMARY KEY (`id_entrega`);

--
-- Indices de la tabla `tb_metas`
--
ALTER TABLE `tb_metas`
  ADD PRIMARY KEY (`id_meta`),
  ADD KEY `tb_metas_programa_id_foreign` (`programa_id`);

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
  MODIFY `id_area` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tb_areasmetas`
--
ALTER TABLE `tb_areasmetas`
  MODIFY `id_areasmetas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_areasusuarios`
--
ALTER TABLE `tb_areasusuarios`
  MODIFY `id_areasusuarios` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_calendarizars`
--
ALTER TABLE `tb_calendarizars`
  MODIFY `id_entrega` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_metas`
--
ALTER TABLE `tb_metas`
  MODIFY `id_meta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `tb_programas`
--
ALTER TABLE `tb_programas`
  MODIFY `id_programa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_tipos`
--
ALTER TABLE `tb_tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_areasmetas`
--
ALTER TABLE `tb_areasmetas`
  ADD CONSTRAINT `tb_areasmetas_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `tb_areas` (`id_area`),
  ADD CONSTRAINT `tb_areasmetas_meta_id_foreign` FOREIGN KEY (`meta_id`) REFERENCES `tb_metas` (`id_meta`);

--
-- Filtros para la tabla `tb_areasusuarios`
--
ALTER TABLE `tb_areasusuarios`
  ADD CONSTRAINT `tb_areasusuarios_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `tb_areas` (`id_area`),
  ADD CONSTRAINT `tb_areasusuarios_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tb_metas`
--
ALTER TABLE `tb_metas`
  ADD CONSTRAINT `tb_metas_programa_id_foreign` FOREIGN KEY (`programa_id`) REFERENCES `tb_programas` (`id_programa`);

--
-- Filtros para la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_id_tipo_foreign` FOREIGN KEY (`id_tipo`) REFERENCES `tb_tipos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
