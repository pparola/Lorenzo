/*
SQLyog Community v11.42 (64 bit)
MySQL - 5.5.27 : Database - facturacion
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`facturacion` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `facturacion`;

/*Table structure for table `articulos` */

DROP TABLE IF EXISTS `articulos`;

CREATE TABLE `articulos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `precio` decimal(12,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articulos_codigo_unique` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `articulos` */

insert  into `articulos`(`id`,`codigo`,`nombre`,`precio`) values (1,'0001','1/2 RES','10.32'),(2,'0002','BOCHA','12.44'),(3,'0003','PECHO','5.40'),(4,'0004','DELANTERO','33.22'),(5,'0005','ASADO','36.11'),(6,'0006','MOCHOS','66.32'),(7,'0007','ABASTO','99.02'),(8,'0008','BIFES','3.77'),(9,'0009','PISTOLA','1.44'),(10,'0010','RECORTES','0.87'),(11,'0011','STOCK DIAS ANTERIORES','1.00');

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `codpos` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `localidad` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `tipiva` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `cuit` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `reparto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_codigo_unique` (`codigo`),
  UNIQUE KEY `clientes_nombre_unique` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`codigo`,`nombre`,`direccion`,`codpos`,`localidad`,`telefono`,`tipiva`,`cuit`,`reparto_id`) values (1,'0001','AVALOS','','','','','','',1),(2,'0002','ALIZANDRO','','','','','','',2),(3,'0003','JOSE VILLA DOS','','','','','','',3),(4,'0004','AGUIRRE','','','','','','',4),(5,'0005','BAZAN','','','','','','',5),(6,'0006','PRADO','','','','','','',1),(7,'0007','BETO','','','','','','',2),(8,'0008','MIGUEL PRIMAVERA','','','','','','',3),(9,'0009','JIMENEZ COLON','','','','','','',4),(10,'0010','BELTRAN','','','','','','',5),(11,'0011','CESAR','','','','','','',1),(12,'1212','PRUEBA2','PP','1613','SAN MIGUEL','PRUEBA','1','1111111111',0),(13,'1244','PRUEBA233','PP','1613','SAN MIGUEL','PRUEBA','1','1111111111',1);

/*Table structure for table `detalles` */

DROP TABLE IF EXISTS `detalles`;

CREATE TABLE `detalles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idmovimiento` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `peso` decimal(12,2) NOT NULL,
  `precio` decimal(12,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=204 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `detalles` */

insert  into `detalles`(`id`,`idmovimiento`,`idarticulo`,`peso`,`precio`) values (3,9,2,'2.00','12.44'),(4,9,3,'3.60','5.40'),(5,10,7,'3.00','99.02'),(6,10,8,'55.00','3.77'),(7,11,1,'0.00','10.32'),(8,11,2,'2.00','12.44'),(9,12,1,'1.00','10.32'),(10,12,3,'2.00','5.40'),(11,13,1,'2.00','10.32'),(12,14,1,'2.00','10.32'),(13,15,1,'2.00','10.32'),(14,16,1,'2.00','10.32'),(15,17,1,'2.00','10.32'),(16,18,1,'2.00','10.32'),(17,19,1,'2.00','10.32'),(18,20,1,'2.00','10.32'),(19,21,1,'2.00','10.32'),(20,22,1,'2.00','10.32'),(21,23,1,'2.00','10.32'),(22,24,1,'2.00','10.32'),(23,25,1,'2.00','10.32'),(24,26,1,'2.00','10.32'),(25,27,1,'2.00','10.32'),(26,28,1,'2.00','10.32'),(27,29,1,'2.00','10.32'),(28,30,1,'2.00','10.32'),(29,31,1,'2.00','10.32'),(30,32,1,'2.00','10.32'),(31,33,1,'2.00','10.32'),(32,34,1,'2.00','10.32'),(33,35,1,'2.00','10.32'),(34,36,1,'2.00','10.32'),(35,37,1,'2.00','10.32'),(36,38,1,'2.00','10.32'),(37,39,1,'2.00','10.32'),(38,40,1,'2.00','10.32'),(39,41,1,'2.00','10.32'),(40,42,1,'2.00','10.32'),(41,43,1,'2.00','10.32'),(42,44,1,'2.00','10.32'),(43,45,1,'2.00','10.32'),(44,46,1,'2.00','10.32'),(45,47,1,'2.00','10.32'),(46,48,1,'2.00','10.32'),(47,49,1,'2.00','10.32'),(48,50,1,'2.00','10.32'),(49,51,1,'2.00','10.32'),(50,52,3,'3.00','5.40'),(51,52,2,'4.00','12.44'),(52,53,3,'3.00','5.40'),(53,53,2,'4.00','12.44'),(54,54,3,'3.00','5.40'),(55,54,2,'4.00','12.44'),(56,55,3,'3.00','5.40'),(57,55,2,'4.00','12.44'),(58,56,3,'3.00','5.40'),(59,56,2,'4.00','12.44'),(60,57,3,'3.00','5.40'),(61,57,2,'4.00','12.44'),(62,58,3,'3.00','5.40'),(63,58,2,'4.00','12.44'),(64,59,3,'3.00','5.40'),(65,59,2,'4.00','12.44'),(66,60,3,'3.00','5.40'),(67,60,2,'4.00','12.44'),(68,61,3,'3.00','5.40'),(69,61,2,'4.00','12.44'),(70,62,3,'3.00','5.40'),(71,62,2,'4.00','12.44'),(72,63,3,'3.00','5.40'),(73,63,2,'4.00','12.44'),(74,64,3,'3.00','5.40'),(75,64,2,'4.00','12.44'),(76,65,3,'3.00','5.40'),(77,65,2,'4.00','12.44'),(78,66,3,'3.00','5.40'),(79,66,2,'4.00','12.44'),(80,67,3,'3.00','5.40'),(81,67,2,'4.00','12.44'),(82,68,3,'3.00','5.40'),(83,68,2,'4.00','12.44'),(84,69,3,'3.00','5.40'),(85,69,2,'4.00','12.44'),(86,70,3,'3.00','5.40'),(87,70,2,'4.00','12.44'),(88,71,3,'3.00','5.40'),(89,71,2,'4.00','12.44'),(90,72,3,'3.00','5.40'),(91,72,2,'4.00','12.44'),(92,73,3,'3.00','5.40'),(93,73,2,'4.00','12.44'),(94,74,3,'3.00','5.40'),(95,74,2,'4.00','12.44'),(96,75,3,'3.00','5.40'),(97,75,2,'4.00','12.44'),(98,76,3,'3.00','5.40'),(99,76,2,'4.00','12.44'),(100,77,3,'3.00','5.40'),(101,77,2,'4.00','12.44'),(102,78,3,'3.00','5.40'),(103,78,2,'4.00','12.44'),(104,79,3,'3.00','5.40'),(105,79,2,'4.00','12.44'),(106,80,3,'3.00','5.40'),(107,80,2,'4.00','12.44'),(108,81,3,'3.00','5.40'),(109,81,2,'4.00','12.44'),(110,82,3,'3.00','5.40'),(111,82,2,'4.00','12.44'),(112,83,3,'3.00','5.40'),(113,83,2,'4.00','12.44'),(114,84,3,'3.00','5.40'),(115,84,2,'4.00','12.44'),(116,85,3,'3.00','5.40'),(117,85,2,'4.00','12.44'),(118,86,3,'3.00','5.40'),(119,86,2,'4.00','12.44'),(120,87,3,'3.00','5.40'),(121,87,2,'4.00','12.44'),(122,88,3,'3.00','5.40'),(123,88,2,'4.00','12.44'),(124,89,3,'3.00','5.40'),(125,89,2,'4.00','12.44'),(126,90,3,'3.00','5.40'),(127,90,2,'4.00','12.44'),(128,91,3,'3.00','5.40'),(129,91,2,'4.00','12.44'),(130,92,3,'3.00','5.40'),(131,92,2,'4.00','12.44'),(132,93,3,'3.00','5.40'),(133,93,2,'4.00','12.44'),(134,94,3,'3.00','5.40'),(135,94,2,'4.00','12.44'),(136,95,3,'3.00','5.40'),(137,95,2,'4.00','12.44'),(138,96,3,'3.00','5.40'),(139,96,2,'4.00','12.44'),(140,97,3,'3.00','5.40'),(141,97,2,'4.00','12.44'),(142,98,3,'3.00','5.40'),(143,98,2,'4.00','12.44'),(144,99,3,'3.00','5.40'),(145,99,2,'4.00','12.44'),(146,100,3,'3.00','5.40'),(147,100,2,'4.00','12.44'),(148,101,3,'3.00','5.40'),(149,101,2,'4.00','12.44'),(150,102,3,'3.00','5.40'),(151,102,2,'4.00','12.44'),(152,103,3,'3.00','5.40'),(153,104,3,'3.00','5.40'),(154,105,3,'3.00','5.40'),(155,106,3,'3.00','5.40'),(156,107,3,'3.00','5.40'),(157,108,3,'3.00','5.40'),(158,109,3,'3.00','5.40'),(159,110,3,'3.00','5.40'),(160,111,3,'3.00','5.40'),(161,112,3,'3.00','5.40'),(162,113,3,'3.00','5.40'),(163,114,3,'3.00','5.40'),(164,115,3,'3.00','5.40'),(165,116,3,'3.00','5.40'),(166,117,3,'3.00','5.40'),(167,118,3,'3.00','5.40'),(168,119,3,'3.00','5.40'),(169,120,3,'3.00','5.40'),(170,121,3,'3.00','5.40'),(171,122,3,'3.00','5.40'),(172,123,3,'3.00','5.40'),(173,124,3,'3.00','5.40'),(174,125,3,'3.00','5.40'),(175,126,3,'3.00','5.40'),(176,127,3,'3.00','5.40'),(177,128,3,'3.00','5.40'),(178,129,3,'3.00','5.40'),(179,130,3,'3.00','5.40'),(180,131,3,'3.00','5.40'),(181,132,3,'3.00','5.40'),(182,133,3,'3.00','5.40'),(183,134,3,'3.00','5.40'),(184,135,3,'3.00','5.40'),(185,136,3,'3.00','5.40'),(186,137,3,'3.00','5.40'),(187,138,2,'33.00','12.44'),(188,138,4,'44.00','33.22'),(189,139,2,'33.00','12.44'),(190,139,4,'44.00','33.22'),(191,140,2,'33.00','12.44'),(192,140,4,'44.00','33.22'),(193,141,2,'33.00','12.44'),(194,141,4,'44.00','33.22'),(195,142,2,'33.00','12.44'),(196,142,4,'44.00','33.22'),(197,143,2,'33.00','12.44'),(198,143,4,'44.00','33.22'),(199,144,2,'23.00','12.44'),(200,144,3,'44.00','5.40'),(201,144,6,'99.00','66.32'),(202,154,1,'1.10','10.32'),(203,154,7,'3.00','99.02');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_02_22_190406_Reparto',1),('2016_02_22_191530_Cliente',1),('2016_02_22_194905_Articulo',1),('2016_02_22_194917_Movimiento',1),('2016_02_22_194934_Detalle',1);

/*Table structure for table `movimientos` */

DROP TABLE IF EXISTS `movimientos`;

CREATE TABLE `movimientos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_id` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `descripcion` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `movimientos` */

insert  into `movimientos`(`id`,`tipo_id`,`fecha`,`cliente_id`,`total`,`descripcion`) values (9,'VF','2016-03-16',1,'44.32',''),(10,'VF','2016-03-16',7,'504.41',''),(11,'VF','2016-03-16',1,'24.88','PRUEBA'),(12,'VF','2016-03-16',2,'21.12',''),(13,'VF','2016-03-16',1,'20.64',''),(14,'VF','2016-03-16',1,'20.64',''),(15,'VF','2016-03-16',1,'20.64',''),(16,'VF','2016-03-16',1,'20.64',''),(17,'VF','2016-03-16',1,'20.64',''),(18,'VF','2016-03-16',1,'20.64',''),(19,'VF','2016-03-16',1,'20.64',''),(20,'VF','2016-03-16',1,'20.64',''),(21,'VF','2016-03-16',1,'20.64',''),(22,'VF','2016-03-16',1,'20.64',''),(23,'VF','2016-03-16',1,'20.64',''),(24,'VF','2016-03-16',1,'20.64',''),(25,'VF','2016-03-16',1,'20.64',''),(26,'VF','2016-03-16',1,'20.64',''),(27,'VF','2016-03-16',1,'20.64',''),(28,'VF','2016-03-16',1,'20.64',''),(29,'VF','2016-03-16',1,'20.64',''),(30,'VF','2016-03-16',1,'20.64',''),(31,'VF','2016-03-16',1,'20.64',''),(32,'VF','2016-03-16',1,'20.64',''),(33,'VF','2016-03-16',1,'20.64',''),(34,'VF','2016-03-16',1,'20.64',''),(35,'VF','2016-03-16',1,'20.64',''),(36,'VF','2016-03-16',1,'20.64',''),(37,'VF','2016-03-16',1,'20.64',''),(38,'VF','2016-03-16',1,'20.64',''),(39,'VF','2016-03-16',1,'20.64',''),(40,'VF','2016-03-16',1,'20.64',''),(41,'VF','2016-03-16',1,'20.64',''),(42,'VF','2016-03-16',1,'20.64',''),(43,'VF','2016-03-16',1,'20.64',''),(44,'VF','2016-03-16',1,'20.64',''),(45,'VF','2016-03-16',1,'20.64',''),(46,'VF','2016-03-16',1,'20.64',''),(47,'VF','2016-03-16',1,'20.64',''),(48,'VF','2016-03-16',1,'20.64',''),(49,'VF','2016-03-16',1,'20.64',''),(50,'VF','2016-03-16',1,'20.64',''),(51,'VF','2016-03-16',1,'20.64',''),(52,'VF','2016-03-16',1,'65.96',''),(53,'VF','2016-03-16',1,'65.96',''),(54,'VF','2016-03-16',1,'65.96',''),(55,'VF','2016-03-16',1,'65.96',''),(56,'VF','2016-03-16',1,'65.96',''),(57,'VF','2016-03-16',1,'65.96',''),(58,'VF','2016-03-16',1,'65.96',''),(59,'VF','2016-03-16',1,'65.96',''),(60,'VF','2016-03-16',1,'65.96',''),(61,'VF','2016-03-16',1,'65.96',''),(62,'VF','2016-03-16',1,'65.96',''),(63,'VF','2016-03-16',1,'65.96',''),(64,'VF','2016-03-16',1,'65.96',''),(65,'VF','2016-03-16',1,'65.96',''),(66,'VF','2016-03-16',1,'65.96',''),(67,'VF','2016-03-16',1,'65.96',''),(68,'VF','2016-03-16',1,'65.96',''),(69,'VF','2016-03-16',1,'65.96',''),(70,'VF','2016-03-16',1,'65.96',''),(71,'VF','2016-03-16',1,'65.96',''),(72,'VF','2016-03-16',1,'65.96',''),(73,'VF','2016-03-16',1,'65.96',''),(74,'VF','2016-03-16',1,'65.96',''),(75,'VF','2016-03-16',1,'65.96',''),(76,'VF','2016-03-16',1,'65.96',''),(77,'VF','2016-03-16',1,'65.96',''),(78,'VF','2016-03-16',1,'65.96',''),(79,'VF','2016-03-16',1,'65.96',''),(80,'VF','2016-03-16',1,'65.96',''),(81,'VF','2016-03-16',1,'65.96',''),(82,'VF','2016-03-16',1,'65.96',''),(83,'VF','2016-03-16',1,'65.96',''),(84,'VF','2016-03-16',1,'65.96',''),(85,'VF','2016-03-16',1,'65.96',''),(86,'VF','2016-03-16',1,'65.96',''),(87,'VF','2016-03-16',1,'65.96',''),(88,'VF','2016-03-16',1,'65.96',''),(89,'VF','2016-03-16',1,'65.96',''),(90,'VF','2016-03-16',1,'65.96',''),(91,'VF','2016-03-16',1,'65.96',''),(92,'VF','2016-03-16',1,'65.96',''),(93,'VF','2016-03-16',1,'65.96',''),(94,'VF','2016-03-16',1,'65.96',''),(95,'VF','2016-03-16',1,'65.96',''),(96,'VF','2016-03-16',1,'65.96',''),(97,'VF','2016-03-16',1,'65.96',''),(98,'VF','2016-03-16',1,'65.96',''),(99,'VF','2016-03-16',1,'65.96',''),(100,'VF','2016-03-16',1,'65.96',''),(101,'VF','2016-03-16',1,'65.96',''),(102,'VF','2016-03-16',1,'65.96',''),(103,'VF','2016-03-16',1,'65.96',''),(104,'VF','2016-03-16',1,'65.96',''),(105,'VF','2016-03-16',1,'65.96',''),(106,'VF','2016-03-16',1,'65.96',''),(107,'VF','2016-03-16',1,'65.96',''),(108,'VF','2016-03-16',1,'65.96',''),(109,'VF','2016-03-16',1,'65.96',''),(110,'VF','2016-03-16',1,'65.96',''),(111,'VF','2016-03-16',1,'65.96',''),(112,'VF','2016-03-16',1,'65.96',''),(113,'VF','2016-03-16',1,'65.96',''),(114,'VF','2016-03-16',1,'65.96',''),(115,'VF','2016-03-16',1,'65.96',''),(116,'VF','2016-03-16',1,'65.96',''),(117,'VF','2016-03-16',1,'65.96',''),(118,'VF','2016-03-16',1,'65.96',''),(119,'VF','2016-03-16',1,'65.96',''),(120,'VF','2016-03-16',1,'65.96',''),(121,'VF','2016-03-16',1,'65.96',''),(122,'VF','2016-03-16',1,'65.96',''),(123,'VF','2016-03-16',1,'65.96',''),(124,'VF','2016-03-16',1,'65.96',''),(125,'VF','2016-03-16',1,'65.96',''),(126,'VF','2016-03-16',1,'65.96',''),(127,'VF','2016-03-16',1,'65.96',''),(128,'VF','2016-03-16',1,'65.96',''),(129,'VF','2016-03-16',1,'65.96',''),(130,'VF','2016-03-16',1,'65.96',''),(131,'VF','2016-03-16',1,'65.96',''),(132,'VF','2016-03-16',1,'65.96',''),(133,'VF','2016-03-16',1,'65.96',''),(134,'VF','2016-03-16',1,'65.96',''),(135,'VF','2016-03-16',1,'65.96',''),(136,'VF','2016-03-16',1,'65.96',''),(137,'VF','2016-03-16',1,'65.96',''),(138,'VF','2016-03-16',2,'1872.20',''),(139,'VF','2016-03-16',2,'1872.20',''),(140,'VF','2016-03-16',2,'1872.20',''),(141,'VF','2016-03-16',2,'1872.20',''),(142,'VF','2016-03-16',2,'1872.20',''),(143,'VF','2016-03-16',2,'1872.20',''),(144,'VF','2016-03-16',3,'7089.40','VENTA ESPECIAL'),(145,'VP','2016-03-16',1,'1500.00','PAGO A CUENTA'),(146,'VP','2016-03-16',1,'1500.00','PAGO A CUENTA'),(147,'VP','2016-03-16',1,'1500.00','PAGO A CUENTA'),(148,'VP','2016-03-16',1,'1500.00','PAGO A CUENTA'),(149,'VC','2016-03-16',4,'1000.00','ARREGLO DE CUENTA'),(150,'VC','2016-03-16',4,'1000.00','ARREGLO DE CUENTA'),(151,'VC','2016-03-16',2,'600.00','NOTA DE DEBITO'),(152,'VD','2016-03-16',3,'200.00','ERROR EN FACTURACION'),(153,'VP','2016-04-18',1,'240.00','PRUEBA1QQ'),(154,'','2016-04-18',12,'308.41',''),(155,'','2016-04-18',13,'22.60','PAGO A CUENTA'),(156,'','2016-04-18',13,'22.60','PAGO A CUENTA'),(157,'','2016-04-18',1,'123.00','PAGO A CUENTA'),(158,'','2016-04-18',1,'123.00','PAGO A CUENTA'),(159,'','2016-04-18',1,'33.00','ARREGLO DE CUENTA'),(160,'','2016-04-18',1,'23.00','PAGO A CUENTA');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `repartos` */

DROP TABLE IF EXISTS `repartos`;

CREATE TABLE `repartos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `repartos_nombre_unique` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `repartos` */

insert  into `repartos`(`id`,`nombre`) values (1,'LUNES'),(2,'MARTES'),(3,'MIERCOLES'),(4,'JUEVES'),(5,'VIERNES');

/*Table structure for table `tipos` */

DROP TABLE IF EXISTS `tipos`;

CREATE TABLE `tipos` (
  `id` varchar(2) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `operacion` varchar(20) DEFAULT NULL,
  `signo` double DEFAULT NULL,
  `conarticulos` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tipos` */

insert  into `tipos`(`id`,`descripcion`,`operacion`,`signo`,`conarticulos`) values ('VC','NOTA DE CREDITO VENTA','VENTA',-1,'N'),('VD','NOTA DE DEBITO VENTA','VENTA',1,'N'),('VF','FACTURA DE VENTA','VENTA',1,'S'),('VP','PAGO DE VENTA','VENTA',-1,'N');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'Admin','admin@test.com','$2y$10$PmM73cDNgUHcRJKZ2tpafOeoacAOyMg9MSCuaBmENdzh6BgP4kXO.',NULL,'2016-03-08 19:49:22','2016-03-08 19:49:22'),(2,'Usuario','usuario@test.com','$2y$10$dUoxXLU5XqCV8.e95L6KcO0A.R2JKSx42aDccAYbnLaDIL6ijO0qK',NULL,'2016-03-08 19:49:22','2016-03-08 19:49:22');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
