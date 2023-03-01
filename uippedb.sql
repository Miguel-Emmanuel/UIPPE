/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - uippedb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`uippedb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `uippedb`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
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

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_02_23_011125_tb_usuarios',1),
(6,'2023_03_01_000854_tb_tipos',1),
(7,'2023_03_01_000913_tb_areas',1),
(8,'2023_03_01_000925_tb_areasusuarios',1),
(9,'2023_03_01_000935_tb_metas',1),
(10,'2023_03_01_000945_tb_areasmetas',1),
(11,'2023_03_01_000955_tb_programas',1),
(12,'2023_03_01_002046_tb_calendarizars',1);

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
  `id_area` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_areas` */

insert  into `tb_areas`(`id_area`,`clave`,`nombre`,`descripcion`,`foto`,`activo`,`id_registro`,`created_at`,`updated_at`) values 
(1,'1','ABOGADO GENERAL ','ABOGADO GENERAL ','cuervo.png	',0,1,'2023-02-28 19:24:52','2023-02-28 19:24:54'),
(2,'2','ORGANO INTERNO DE CONTROL','ORGANO INTERNO DE CONTROL\r\n','cuervo.png\r\n',0,2,'2023-02-28 19:25:29','2023-02-28 19:25:33'),
(3,'3','UIPPE','UNIDAD DE INFROMACION, PLANEACION, PROGRAMACION  Y EVALUACION','cuervo.png',0,3,'2023-02-28 19:26:59','2023-02-28 19:27:02'),
(4,'4','SECRETARIA ACADEMICA','SECRETARIA ACADEMICA','cuervo.png',0,4,'2023-02-28 19:27:43','2023-02-28 19:27:46'),
(5,'5','DESARROLLO Y FORTALICIMIENTO ACADEMICO','DESARROLLO Y FORTALECIMIENTO ACADEMICO 	','cuervo.png',0,5,'2023-02-28 19:28:39','2023-02-28 19:28:42'),
(6,'6','SECRETARIA DE VINCULACION','SECRETARIA DE VINCULACION','cuervo.png',0,6,'2023-02-28 19:29:26','2023-02-28 19:29:30'),
(7,'7','SUBDIRECCION DE PROYECTOS DE VINCULACION','SUBRIRECCION DE PROYECTOS DE VINCULACION','cuervo.png',0,7,'2023-02-28 19:31:45','2023-02-28 19:31:47'),
(8,'8','DEPARTAMENTO DE SERVICIOS TECNOLOGICOS','DEPARTAMENTO DE SERVICIOS TECNOLOGICOS\r\n				','cuervo.png',0,8,'2023-02-28 19:32:41','2023-02-28 19:32:44'),
(9,'9','DEPARTAMENTO DE DESEMPEÑO DE EGRESADOS ','DEPARTAMENTO DE DESEMPEÑO DE EGRESADOS','cuervo.png',0,9,'2023-02-28 19:33:36','2023-02-28 19:33:38'),
(10,'10','CEPIMUTVTOL','CENTRO DE DESAROLLO DE NEGOCIOS/ CENTRO DE PROTECCION DE INVENCIONES Y MARCAS','cuervo.png',0,10,'2023-02-28 19:34:39','2023-02-28 19:34:41'),
(11,'11','COORDINACION DE LA ENTIDAD DE CERTIFICACION Y EVAL','COORDINACION DE LA ENTIDAD DE CERTIFICACION Y EVALUACION CONOCER','cuervo.png',0,11,'2023-02-28 19:35:35','2023-02-28 19:35:37'),
(12,'12','DIRECCION DE DIFUSION Y EXTENSION UNIVERSITARIA','DIRECCION DE DIFUSION Y EXTENSION UNIVERSITARIA','cuervo.png',0,12,'2023-02-28 19:36:28','2023-02-28 19:36:30'),
(13,'13','DEPARTAMENTO DE ACTIVIDADES CULTURALES Y DEPOSTIVA','DEPARTAMENTO DE ACTIVIDADES CULTURALES Y DEPOSTIVAS ','cuervo.png',0,13,'2023-02-28 19:39:31','2023-02-28 19:39:33'),
(14,'14','DEPARTAMENTO DE PRENSA Y DIFUSION','DEPARTAMENTO DE PRENSA Y DIFUSION','cuervo.png',0,14,'2023-02-28 19:40:20','2023-02-28 19:40:23'),
(15,'15','DEPARTAMENTO DE EDUCACION CONTINUA','DEPARTAMENTO DE EDUCACION CONTINUA','cuervo.png',0,15,'2023-02-28 19:41:00','2023-02-28 19:41:03'),
(16,'16','DIRECCION DE ADMINISTRACION Y FINANZAS','DIRECCION DE ADMINISTRACION Y FINANZAS','cuervo.png',0,16,'2023-02-28 19:41:40','2023-02-28 19:41:42'),
(17,'17','DEPARTAMENTO DE RECURSOS HUMANOS','DEPARTAMENTO DE RECURSOS HUMANOS','cuervo.png	',0,17,'2023-02-28 19:42:17','2023-02-28 19:42:19'),
(18,'18','DEPARTAMENTO DE RECURSOS MATERIALES','DEPARTAMENTO DE RECURSOS MATERIALES','cuervo.png',0,18,'2023-02-28 19:43:30','2023-02-28 19:43:31'),
(19,'19','DEPARTAMENTO DE MANTENIMIENTO Y SERVICIOS GENERALE','DEPARTAMENTO DE MANTENIMIENTO Y SERVICIOS GENERALES','cuervo.png',0,19,'2023-02-28 19:44:17','2023-02-28 19:44:18'),
(20,'20','DEPARTAMENTO DE SISTEMAS','DEPARTAMENTO DE SISTEMAS','cuervo.png',0,20,'2023-02-28 19:44:57','2023-02-28 19:45:03'),
(21,'21','SUBBDIRECCION DE FINANZAS','SUBBDIRECCION DE FINANZAS','cuervo.png',0,21,'2023-02-28 19:45:55','2023-02-28 19:45:57');

/*Table structure for table `tb_areasmetas` */

DROP TABLE IF EXISTS `tb_areasmetas`;

CREATE TABLE `tb_areasmetas` (
  `id_areasmetas` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_area` int(11) NOT NULL,
  `id_meta` int(11) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `objetivo` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_areasmetas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_areasmetas` */

/*Table structure for table `tb_areasusuarios` */

DROP TABLE IF EXISTS `tb_areasusuarios`;

CREATE TABLE `tb_areasusuarios` (
  `id_areasusuarios` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_area` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_areasusuarios`)
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
  `id_meta` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(30) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_meta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_metas` */

/*Table structure for table `tb_programas` */

DROP TABLE IF EXISTS `tb_programas`;

CREATE TABLE `tb_programas` (
  `id_programa` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `abreviatura` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_programas` */

insert  into `tb_programas`(`id_programa`,`abreviatura`,`nombre`,`descripcion`,`activo`,`id_registro`,`created_at`,`updated_at`) values 
(1,'SIPREP','SISTEMA DE PLANEACION Y PRESUPUESTO','ENCARGADO DEL PRESUPUESTO	\r\n',0,1,'2023-02-28 19:18:09','2023-02-28 19:18:12'),
(2,'POA FEDERAL','PROGRAMA OPERATIVO ANUAL  FEDERAL','PRESUPUESTAR LOS RECURSOS FINANCIEROSN NECESARIOS XD',0,2,'2023-02-28 19:19:27','2023-02-28 19:19:30'),
(3,'PIDE','PLATAFORMA DE INTERINOS DOCENTEES DE EXTREMADURA P',' referencia a Programa Intensivo de Dirección de Empresas de forma abreviada',0,3,'2023-02-28 19:22:12','2023-02-28 19:22:15'),
(4,'PROPIAS','UTVT','PROGRMA DE LA UTVT\r\n',0,4,'2023-02-28 19:23:20','2023-02-28 19:23:23');

/*Table structure for table `tb_tipos` */

DROP TABLE IF EXISTS `tb_tipos`;

CREATE TABLE `tb_tipos` (
  `id_tipo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `clave` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_tipos` */

/*Table structure for table `tb_usuarios` */

DROP TABLE IF EXISTS `tb_usuarios`;

CREATE TABLE `tb_usuarios` (
  `id_usuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `id_tipo` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `id_registro` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `tb_usuarios_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_usuarios` */

insert  into `tb_usuarios`(`id_usuario`,`clave`,`nombre`,`app`,`apm`,`gen`,`fn`,`academico`,`foto`,`email`,`pass`,`id_tipo`,`activo`,`id_registro`,`created_at`,`updated_at`) values 
(1,'222010230','MIKE','ARRIOLA','ORTEGA','masculino','2023-02-28','TSU DESARROLLO DE SOFTWARE\r\n','cuervo.png\r\n','al222010230@gmail.com','AIOM020605',0,0,1,'2023-02-28 19:12:59','2023-02-28 19:13:02');

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
