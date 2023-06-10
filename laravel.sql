`tb_areasusuarios``tb_usuarios`-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2023 a las 17:09:39
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `laravel`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
<<<<<<< HEAD
  `id` BIGINT(20) UNSIGNED NOT NULL,
  `uuid` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` TEXT COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` TEXT COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` LONGTEXT COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` LONGTEXT COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
=======
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
>>>>>>> dev_josh

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
<<<<<<< HEAD
  `id` INT(10) UNSIGNED NOT NULL,
  `migration` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
=======
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
>>>>>>> dev_josh

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_03_04_000248_tb_tipos',1),
(6,'2023_03_04_000541_tb_usuarios',1),
(7,'2023_03_08_035611_tb_areas',1),
(8,'2023_03_08_040229_tb_programas',1),
(9,'2023_03_08_040306_tb_metas',1),
(10,'2023_03_08_040814_tb_areasusuarios',1),
(11,'2023_03_08_041215_tb_areasmetas',1),
(12,'2023_03_08_042614_tb_calendarizars',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `tb_areas` */

DROP TABLE IF EXISTS `tb_areas`;

CREATE TABLE `tb_areas` (
  `id_area` int(10) UNSIGNED NOT NULL,
  `clave` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_areas` */

INSERT INTO `tb_areas` (`id_area`, `clave`, `nombre`, `descripcion`, `foto`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, '1', 'ABOGADO GENERAL', 'ABOGADO GENERAL', 'cuervo.png', 0, 1, '2023-03-01 07:24:52', '2023-03-07 08:47:50'),
(2, '2', 'ORGANO INTERNO DE CONTROL', 'ORGANO INTERNO DE CONTROL', 'cuervo.png', 1, 2, '2023-03-01 07:25:29', '2023-03-07 08:27:17'),
(3, '3', 'UIPPE', 'UNIDAD DE INFROMACION, PLANEACION, PROGRAMACION  Y EVALUACION', 'cuervo.png', 1, 3, '2023-03-01 07:26:59', '2023-03-07 10:53:13'),
(4, '4', 'SECRETARIA ACADEMICA', 'SECRETARIA ACADEMICA', 'cuervo.png', 0, 4, '2023-03-01 07:27:43', '2023-03-01 07:27:46'),
(5, '5', 'DESARROLLO Y FORTALICIMIENTO ACADEMICO', 'DESARROLLO Y FORTALECIMIENTO ACADEMICO 	', 'cuervo.png', 0, 5, '2023-03-01 07:28:39', '2023-03-01 07:28:42'),
(6, '6', 'SECRETARIA DE VINCULACION', 'SECRETARIA DE VINCULACION', 'cuervo.png', 0, 6, '2023-03-01 07:29:26', '2023-03-01 07:29:30'),
(7, '7', 'SUBDIRECCION DE PROYECTOS DE VINCULACION', 'SUBRIRECCION DE PROYECTOS DE VINCULACION', 'cuervo.png', 0, 7, '2023-03-01 07:31:45', '2023-03-01 07:31:47'),
(8, '8', 'DEPARTAMENTO DE SERVICIOS TECNOLOGICOS', 'DEPARTAMENTO DE SERVICIOS TECNOLOGICOS\r\n				', 'cuervo.png', 0, 8, '2023-03-01 07:32:41', '2023-03-01 07:32:44'),
(9, '9', 'DEPARTAMENTO DE DESEMPEÑO DE EGRESADOS ', 'DEPARTAMENTO DE DESEMPEÑO DE EGRESADOS', 'cuervo.png', 0, 9, '2023-03-01 07:33:36', '2023-03-01 07:33:38'),
(10, '10', 'CEPIMUTVTOL', 'CENTRO DE DESAROLLO DE NEGOCIOS/ CENTRO DE PROTECCION DE INVENCIONES Y MARCAS', 'cuervo.png', 0, 10, '2023-03-01 07:34:39', '2023-03-01 07:34:41'),
(11, '11', 'COORDINACION DE LA ENTIDAD DE CERTIFICACION Y EVAL', 'COORDINACION DE LA ENTIDAD DE CERTIFICACION Y EVALUACION CONOCER', 'cuervo.png', 0, 11, '2023-03-01 07:35:35', '2023-03-01 07:35:37'),
(12, '12', 'DIRECCION DE DIFUSION Y EXTENSION UNIVERSITARIA', 'DIRECCION DE DIFUSION Y EXTENSION UNIVERSITARIA', 'cuervo.png', 1, 12, '2023-03-01 07:36:28', '2023-03-07 13:01:00'),
(13, '13', 'DEPARTAMENTO DE ACTIVIDADES CULTURALES Y DEPOSTIVA', 'DEPARTAMENTO DE ACTIVIDADES CULTURALES Y DEPOSTIVAS ', 'cuervo.png', 0, 13, '2023-03-01 07:39:31', '2023-03-01 07:39:33'),
(14, '14', 'DEPARTAMENTO DE PRENSA Y DIFUSION', 'DEPARTAMENTO DE PRENSA Y DIFUSION', 'cuervo.png', 0, 14, '2023-03-01 07:40:20', '2023-03-01 07:40:23'),
(15, '15', 'DEPARTAMENTO DE EDUCACION CONTINUA', 'DEPARTAMENTO DE EDUCACION CONTINUA', 'cuervo.png', 0, 15, '2023-03-01 07:41:00', '2023-03-01 07:41:03'),
(16, '16', 'DIRECCION DE ADMINISTRACION Y FINANZAS', 'DIRECCION DE ADMINISTRACION Y FINANZAS', 'cuervo.png', 1, 16, '2023-03-01 07:41:40', '2023-03-07 08:41:19'),
(17, '17', 'DEPARTAMENTO DE RECURSOS HUMANOS', 'DEPARTAMENTO DE RECURSOS HUMANOS', '20230306203711rectoria.jpeg', 1, 17, '2023-03-01 07:42:17', '2023-03-07 08:37:11'),
(18, '18', 'DEPARTAMENTO DE RECURSOS MATERIALES', 'DEPARTAMENTO DE RECURSOS MATERIALES', 'cuervo.png', 0, 18, '2023-03-01 07:43:30', '2023-03-01 07:43:31'),
(19, '19', 'DEPARTAMENTO DE MANTENIMIENTO Y SERVICIOS GENERALE', 'DEPARTAMENTO DE MANTENIMIENTO Y SERVICIOS GENERALES', 'cuervo.png', 0, 19, '2023-03-01 07:44:17', '2023-03-01 07:44:18'),
(20, '20', 'DEPARTAMENTO DE SISTEMAS', 'DEPARTAMENTO DE SISTEMAS', 'cuervo.png', 0, 20, '2023-03-01 07:44:57', '2023-03-01 07:45:03'),
(21, '21', 'SUBBDIRECCION DE FINANZAS', 'SUBBDIRECCION DE FINANZAS', 'cuervo.png', 0, 21, '2023-03-01 07:45:55', '2023-03-01 07:45:57'),
(22, '22', 'HOLIS', 'GRACIAS', 'cuervo.png', 0, 1, '2023-03-07 08:30:54', '2023-03-07 10:53:28');

/*Table structure for table `tb_areasmetas` */

DROP TABLE IF EXISTS `tb_areasmetas`;

CREATE TABLE `tb_areasmetas` (
  `id_areasmetas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area_id` int(10) unsigned NOT NULL,
  `meta_id` int(10) unsigned NOT NULL,
  `id_programa` int(11) NOT NULL,
  `objetivo` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_areasmetas`),
  KEY `tb_areasmetas_area_id_foreign` (`area_id`),
  KEY `tb_areasmetas_meta_id_foreign` (`meta_id`),
  CONSTRAINT `tb_areasmetas_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `tb_areas` (`id_area`),
  CONSTRAINT `tb_areasmetas_meta_id_foreign` FOREIGN KEY (`meta_id`) REFERENCES `tb_metas` (`id_meta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_areasmetas` */

/*Table structure for table `tb_areasusuarios` */

DROP TABLE IF EXISTS `tb_areasusuarios`;

CREATE TABLE `tb_areasusuarios` (
  `id_areasusuarios` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_areasusuarios`),
  KEY `tb_areasusuarios_area_id_foreign` (`area_id`),
  KEY `tb_areasusuarios_usuario_id_foreign` (`usuario_id`),
  CONSTRAINT `tb_areasusuarios_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `tb_areas` (`id_area`),
  CONSTRAINT `tb_areasusuarios_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_areasusuarios` */

/*Table structure for table `tb_calendarizars` */

DROP TABLE IF EXISTS `tb_calendarizars`;

CREATE TABLE `tb_calendarizars` (
  `id_entrega` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_areameta` int(11) NOT NULL,
  `fechaentrega` date NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_entrega`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_calendarizars` */

/*Table structure for table `tb_metas` */

DROP TABLE IF EXISTS `tb_metas`;

CREATE TABLE `tb_metas` (
  `id_meta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(30) DEFAULT NULL,
  `nombre` text NOT NULL,
  `descripcion` text DEFAULT NULL,
  `unidadmedida` text NOT NULL,
  `programa_id` int(10) unsigned NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_meta`),
  KEY `tb_metas_programa_id_foreign` (`programa_id`),
  CONSTRAINT `tb_metas_programa_id_foreign` FOREIGN KEY (`programa_id`) REFERENCES `tb_programas` (`id_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_metas` */

INSERT INTO `tb_metas` (`id_meta`, `clave`, `nombre`, `descripcion`, `unidadmedida`, `programa_id`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, '1', 'Fomentar que los estudiantes egresen de sus estudios de tipo superior en el ciclo escolar', '', 'Egresado', 1, 1, 1, '2023-03-08 11:14:25', '2023-03-08 11:39:05'),
(2, '2', 'Atender a la matrícula de educación superior para contribuir en la disminución de las divergencias entre la oferta y la demanda educativa', NULL, 'Estudiante', 1, 1, 1, '2023-03-08 11:26:09', '2023-03-08 11:26:09'),
(3, '3', 'Atender a los estudiantes de nuevo ingreso de educación superior para contribuir en la disminución de las divergencias entre la oferta y la demanda educativa', NULL, 'Estudiante', 1, 1, 1, '2023-03-08 11:27:55', '2023-03-08 11:27:55'),
(4, '4', 'Realizar acciones de formación integral, para desarrollar capacidades, valores y habilidades profesionales', NULL, 'Acción', 1, 1, 1, '2023-03-08 11:29:04', '2023-03-08 11:29:04'),
(5, '5', 'Realizar acciones para fomentar una cultura emprendedora', NULL, 'Acción', 1, 1, 1, '2023-03-08 11:29:42', '2023-03-08 11:29:42'),
(6, '6', 'Acreditar programas educativos en educación superior para mejorar la calidad', NULL, 'Programa', 1, 1, 1, '2023-03-08 11:30:12', '2023-03-08 11:30:12'),
(7, '7', 'Fomentar que los egresados se titulen', NULL, 'Documento', 1, 1, 1, '2023-03-08 11:30:43', '2023-03-08 11:30:43'),
(8, '8', 'Lograr certificaciones en Educación Superior para mejorar la calidad', NULL, 'Documento', 1, 1, 1, '2023-03-08 11:31:15', '2023-03-08 11:31:15'),
(9, '9', 'Impulsar la capacitación o actualización del personal docente para mejorar la formación académica', NULL, 'Docente', 1, 1, 1, '2023-03-08 11:31:55', '2023-03-08 11:31:55'),
(10, '10', 'Evaluar al personal docente con la finalidad de encontrar áreas de oportunidad para mejorar su desempeño', NULL, 'Docente', 1, 1, 1, '2023-03-08 11:33:00', '2023-03-08 11:33:00'),
(11, '11', 'Impulsar la capacitación del personal directivo y administrativo para el fortalecimiento institucional', NULL, 'Persona', 1, 1, 1, '2023-03-08 11:33:35', '2023-03-08 11:33:35'),
(12, '12', 'Desarrollar proyectos de investigación para atender las necesidades de desarrollo tecnológico, económico y social', NULL, 'Proyecto', 1, 1, 1, '2023-03-08 11:34:15', '2023-03-08 11:34:15'),
(13, '13', 'Realizar la publicación de documentos derivados de la investigación para su divulgación', NULL, 'Publicación', 1, 1, 1, '2023-03-08 11:35:26', '2023-03-08 11:35:26'),
(14, '14', 'Realizar acciones de vinculación y extensión que permitan establecer lazos de colaboración con los sectores público, privado y social', NULL, 'Acción', 1, 1, 1, '2023-03-08 11:36:02', '2023-03-08 11:36:02'),
(15, '15', 'Operar convenios con los sectores público, privado y social, para formalizar los lazos de colaboración institucional', NULL, 'Convenio', 1, 1, 1, '2023-03-08 11:36:46', '2023-03-08 11:36:46'),
(16, '16', 'Atender estudiantes en educación Dual para desarrollar aptitudes y habilidades en unidades económicas', NULL, 'Estudiante', 1, 1, 1, '2023-03-08 11:37:16', '2023-03-08 11:37:16'),
(17, '17', 'Impulsar la internacionalización entre la comunidad de la institución para fortalecer la calidad educativa', NULL, 'Persona', 1, 1, 1, '2023-03-08 11:37:59', '2023-03-08 11:37:59'),
(18, '18', 'Contactar egresados en educación superior para identificar su situación profesional', '', 'Egresado', 1, 1, 1, '2023-03-08 11:38:29', '2023-03-08 11:38:53'),
(19, '19', 'Impartir el idioma Inglés a los estudiantes en educación superior para el desarrollo de competencias', NULL, 'Estudiante', 1, 1, 1, '2023-03-08 11:40:05', '2023-03-08 11:40:05'),
(20, '20', 'Impulsar la participación de estudiantes de educación superior en procesos de certificación en el idioma Inglés para el desarrollo de competencias', NULL, 'Estudiante', 1, 1, 1, '2023-03-08 11:40:35', '2023-03-08 11:40:35'),
(21, '21', 'Destinar equipo de cómputo el proceso de enseñanza-aprendizaje en educación superior para el desarrollo de las habilidades digitales', NULL, 'Equipo de Computo', 1, 1, 1, '2023-03-08 11:41:17', '2023-03-08 11:41:17'),
(22, '22', 'Impulsar la participación  de estudiantes en procesos de certificación en el uso de tecnologías del aprendizaje, conocimiento, información y comunicación  para el desarrollo de competencias y habilidades', NULL, 'Estudiante', 1, 1, 1, '2023-03-08 11:41:55', '2023-03-08 11:41:55'),
(23, '23', 'Realizar acciones para la prevención de la violencia escolar de educación superior', NULL, 'Acción', 1, 1, 1, '2023-03-08 11:42:34', '2023-03-08 11:42:34'),
(24, '24', 'Realizar acciones para igualdad de trato y oportunidades', NULL, 'Acción', 1, 1, 1, '2023-03-08 11:43:03', '2023-03-08 11:43:03'),
(25, '25', 'Realizar auditorías, con el propósito de verificar el cumplimiento del marco normativo que regula el funcionamiento de las dependencias y organismos auxiliares del Ejecutivo Estatal y los Ayuntamientos', NULL, 'Auditoria', 1, 1, 1, '2023-03-08 11:43:35', '2023-03-08 11:43:35'),
(26, '26', 'Realizar auditorías para determinar el grado de eficacia y eficiencia en los procesos, así como el desempeño Institucional de las dependencias y organismos auxiliares del Ejecutivo Estatal', NULL, 'Evaluación', 1, 1, 1, '2023-03-08 11:44:06', '2023-03-08 11:44:06'),
(27, '27', 'Realizar inspecciones a rubros específicos en las dependencias, organismos auxiliares del Ejecutivo Estatal y en su caso Ayuntamientos, con el propósito de constatar el cumplimiento del marco normativo que lo regula', NULL, 'Inspección', 1, 1, 1, '2023-03-08 11:44:57', '2023-03-08 11:44:57'),
(28, '28', 'Participar en testificaciones, con el propósito de asegurarse que los actos administrativos se realicen con forme a la normatividad vigente', NULL, 'Testificación', 1, 1, 1, '2023-03-08 11:45:39', '2023-03-08 11:45:39'),
(29, '29', 'Participación del órgano de control interno en reuniones que por mandato legal o disposición administrativa así lo requiera', NULL, 'Sesión', 1, 1, 1, '2023-03-08 11:46:30', '2023-03-08 11:46:30'),
(30, '30', 'Acompañamiento en la atención de auditorias practicadas por los entes fiscalizadores externos', NULL, 'Acción', 1, 1, 1, '2023-03-08 11:47:05', '2023-03-08 11:47:05'),
(31, '31', 'Atender acciones derivadas de la Fiscalización realizada por entes fiscalizadores externos', NULL, 'Acción', 1, 1, 1, '2023-03-08 11:47:31', '2023-03-08 11:47:31'),
(32, '32', 'Atención a observaciones y acciones de mejora determinadas con motivo de los actos de fiscalización realizados por la Dirección General u Órgano Interno de Control', NULL, 'Acción', 1, 1, 1, '2023-03-08 11:48:07', '2023-03-08 11:48:07'),
(33, '33', 'Elaborar el informe de presunta responsabilidad administrativa', NULL, 'Informe', 1, 1, 1, '2023-03-08 11:48:35', '2023-03-08 11:48:35'),
(34, '34', 'Substanciar investigaciones derivadas de denuncias ciudadanas', NULL, 'Expediente', 1, 1, 1, '2023-03-08 11:49:01', '2023-03-08 11:49:01'),
(35, '35', 'Substanciar investigaciones derivadas de auditoria', NULL, 'Expediente', 1, 1, 1, '2023-03-08 11:49:25', '2023-03-08 11:49:25'),
(36, '36', 'Substanciar investigaciones derivadas de actuación de oficio', '', 'Expediente', 1, 1, 1, '2023-03-08 11:50:08', '2023-03-08 11:53:09'),
(37, '37', 'Opinión de Empleadores', '', 'Encuesta Realizada', 2, 1, 1, '2023-03-08 11:52:40', '2023-03-08 11:52:54'),
(38, '38', 'Promoción de Egresados en el Mercado Laboral Post Estadía', NULL, 'Egresado', 2, 1, 1, '2023-03-08 11:53:48', '2023-03-08 11:53:48'),
(39, '39', 'Sesiones de Vinculación y Pertinencia', NULL, 'Reunión Celebrada', 2, 1, 1, '2023-03-08 11:56:35', '2023-03-08 11:56:35'),
(40, '40', 'Movilidad Estudiantil Nacional e Internacional', NULL, 'Estudiante', 2, 1, 1, '2023-03-08 11:57:08', '2023-03-08 11:57:08'),
(41, '41', 'Difusión de la Oferta Educativa en Instituciones de Educación Media Superior', NULL, 'IEMS', 2, 1, 1, '2023-03-08 11:57:49', '2023-03-08 11:57:49'),
(42, '42', 'Promoción de Planes de Estudio en Eventos de Orientación Vocacional', NULL, 'Evento o Expo', 2, 1, 1, '2023-03-08 11:58:33', '2023-03-08 11:58:33'),
(43, '43', 'Cursos de Educación Continua', NULL, 'Curso', 2, 1, 1, '2023-03-08 11:59:12', '2023-03-08 11:59:12'),
(44, '44', 'Campañas de Prevención de Embarazo, Vacunación y Asistencia Médica', NULL, 'Campaña', 2, 1, 1, '2023-03-08 11:59:45', '2023-03-08 11:59:45'),
(45, '45', 'Seguimiento y Evaluación de los Programas Operativos', NULL, 'Reporte de Seguimiento', 2, 1, 1, '2023-03-08 12:00:20', '2023-03-08 12:00:20'),
(46, '46', 'Elaborar Reporte de Indicadores del Modelo de Evaluación de la Calidad (MECASUT) y Evaluación Institucional (EVIN)', NULL, 'Informe Elaborado', 2, 1, 1, '2023-03-08 12:00:57', '2023-03-08 12:00:57'),
(47, '47', 'Informe Anual de Actividades', NULL, 'Documento Elaborado', 2, 1, 1, '2023-03-08 12:01:39', '2023-03-08 12:01:39'),
(48, '48', 'Sesiones de Comités Institucionales', NULL, 'Sesión', 2, 1, 1, '2023-03-08 12:02:20', '2023-03-08 12:02:20'),
(49, '49', 'Encuesta de Satisfacción de Servicios Bibliotecarios', NULL, 'Informe de la Encuesta', 2, 1, 1, '2023-03-08 12:03:03', '2023-03-08 12:03:03'),
(50, '50', 'Alumnos Inscritos a la Biblioteca Digital', NULL, 'Estudiante', 2, 1, 1, '2023-03-08 12:03:31', '2023-03-08 12:03:31'),
(51, '51', 'Legislación Universitaria Publicado', NULL, 'Documento', 2, 1, 1, '2023-03-08 12:04:04', '2023-03-08 12:04:04'),
(52, '52', 'Otorgamiento de Becas', NULL, 'Estudiante Becado', 2, 1, 1, '2023-03-08 12:04:44', '2023-03-08 12:04:44');

/*Table structure for table `tb_programas` */

DROP TABLE IF EXISTS `tb_programas`;

CREATE TABLE `tb_programas` (
  `id_programa` int(10) UNSIGNED NOT NULL,
  `abreviatura` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_programas` */

INSERT INTO `tb_programas` (`id_programa`, `abreviatura`, `nombre`, `descripcion`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, 'SIPREP', 'SISTEMA DE PLANEACION Y PRESUPUESTO', 'ENCARGADO DEL PRESUPUESTO', 1, 1, '2023-03-01 07:18:09', '2023-03-07 13:25:01'),
(2, 'POA FEDERAL', 'PROGRAMA OPERATIVO ANUAL  FEDERAL', 'PRESUPUESTAR LOS RECURSOS FINANCIEROSN NECESARIOS XD', 0, 2, '2023-03-01 07:19:27', '2023-03-01 07:19:30'),
(3, 'PIDE', 'PLATAFORMA DE INTERINOS DOCENTES DE EXTREMADURA', 'Referencia a Programa Intensivo de Dirección de Empresas de forma abreviada', 1, 3, '2023-03-01 07:22:12', '2023-03-07 13:26:24'),
(4, 'PROPIAS', 'UTVT', 'PROGRMA DE LA UTVT\r\n', 0, 4, '2023-03-01 07:23:20', '2023-03-01 07:23:23');

/*Table structure for table `tb_tipos` */

DROP TABLE IF EXISTS `tb_tipos`;

CREATE TABLE `tb_tipos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_tipos` */

INSERT INTO `tb_tipos` (`id`, `clave`, `nombre`, `descripcion`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, 'TIP1', 'Administardor', 'Contiene todos los permisos sobre el sistema', 0, 1, '2023-03-04 06:17:17', '2023-03-07 13:37:47'),
(2, 'TIP2', 'Encargado de Área', 'Director o similar', 1, 1, '2023-03-07 04:53:40', '2023-03-07 04:53:40'),
(3, 'TIP3', 'Secretaria', 'No posee los permisos que le director', 1, 1, '2023-03-07 04:59:01', '2023-03-07 04:59:01'),
(4, 'TIP4', 'Invitado', 'No tiene la mayoría de permisos', 0, 1, '2023-03-07 13:38:42', '2023-03-07 13:40:39');

/*Table structure for table `tb_usuarios` */

DROP TABLE IF EXISTS `tb_usuarios`;

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `app` varchar(50) NOT NULL,
  `apm` varchar(50) NOT NULL,
  `gen` varchar(15) NOT NULL,
  `fn` date NOT NULL,
  `academico` text NOT NULL,
  `foto` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `id_tipo` int(10) unsigned NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `tb_usuarios_email_unique` (`email`),
  KEY `tb_usuarios_id_tipo_foreign` (`id_tipo`),
  CONSTRAINT `tb_usuarios_id_tipo_foreign` FOREIGN KEY (`id_tipo`) REFERENCES `tb_tipos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_usuarios` */

INSERT INTO `tb_usuarios` (`id_usuario`, `clave`, `nombre`, `app`, `apm`, `gen`, `fn`, `academico`, `foto`, `email`, `pass`, `id_tipo`, `activo`, `id_registro`, `created_at`, `updated_at`) VALUES
(1, 'USR1', 'Jimena', 'Diaz', 'De Los Santos', 'F', '2003-02-24', 'TSU Area desarrollo de software multiplataforma', 'cuervo.png', 'al222110707@gmail.com', '123456', 1, 1, 1, '2023-03-04 06:18:34', '2023-03-07 14:18:26'),
(2, 'USR2', 'Jossue', 'Candelas', 'Hernandez', 'M', '2003-06-06', 'TSU Desarrollo de software multiplataforma', '20230306165445imagen_uippe2.png', 'al222010230@gmail.com', '123123', 2, 0, 1, '2023-03-07 04:54:46', '2023-03-07 10:57:11'),
(3, 'USR3', 'Eduardo', 'Diaz', 'Perez', 'M', '1978-02-01', 'TSU Desarrollo de software multiplataforma', '20230306165955cropped-logo-utvt.png', 'lalo@gmail.com', '123123', 3, 1, 1, '2023-03-07 04:59:55', '2023-03-07 13:57:07'),
(4, 'USR4', 'Leopoldo', 'Diaz', 'De Los Santos', 'M', '2003-06-05', 'TSU Desarrollo de software multiplataforma', '20230306214257rectoria.jpeg', 'leo@gmail.com', '123123', 3, 1, 1, '2023-03-07 07:58:42', '2023-03-07 09:42:57'),
(5, 'URS5', 'Francis', 'Carney', 'Jacobs', 'M', '1991-08-01', 'TSU Desarrollo de software multiplataforma', 'cuervo.png', 'suvikubyt@mailinator.com', '123123', 1, 1, 1, '2023-03-07 09:26:09', '2023-03-07 09:26:09');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

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
  MODIFY `id_area` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id_meta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `tb_programas`
--
ALTER TABLE `tb_programas`
  MODIFY `id_programa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_tipos`
--
ALTER TABLE `tb_tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
