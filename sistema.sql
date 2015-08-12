-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sistema
-- ------------------------------------------------------
-- Server version	5.5.43-0+deb7u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `assists`
--

DROP TABLE IF EXISTS `assists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_assist` date NOT NULL,
  `note` varchar(60) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assists`
--

LOCK TABLES `assists` WRITE;
/*!40000 ALTER TABLE `assists` DISABLE KEYS */;
INSERT INTO `assists` VALUES (1,18,11,38,2,'2015-04-21','juas',NULL,NULL),(2,65,11,38,3,'2015-04-21','xdeee',NULL,NULL),(3,18,3,38,2,'2015-04-22','',NULL,NULL),(4,65,3,38,3,'2015-04-22','',NULL,NULL),(5,18,19,38,1,'2015-04-23','es gay ',NULL,NULL),(6,65,19,38,3,'2015-04-23','este es mas ',NULL,NULL),(7,18,11,38,3,'2015-05-05','',NULL,NULL),(8,65,11,38,2,'2015-05-05','',NULL,NULL),(9,18,9,38,1,'2015-05-07','',NULL,NULL),(10,65,9,38,1,'2015-05-07','',NULL,NULL);
/*!40000 ALTER TABLE `assists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `careers`
--

DROP TABLE IF EXISTS `careers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `careers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `abrev` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `careers`
--

LOCK TABLES `careers` WRITE;
/*!40000 ALTER TABLE `careers` DISABLE KEYS */;
INSERT INTO `careers` VALUES (11,'Ingenieria en Sistemas Computacionales','ISC'),(12,'Licenciatura en Administracion Hotelera y Gastronomia','LAHYG'),(13,'Licenciaura en Administracion y Mercadotecnia','LAYM'),(14,'Licenciatura en Comunicacion','LC'),(15,'Licenciatura en Educacion','LE'),(16,'Licenciatura en Contaduria y Finanzas','LCYF'),(17,'Licenciatura en Derecho','LD'),(18,'Licenciatura en DiseÃ±o Grafico','LDG'),(19,'Licenciatura en Turismo','LT'),(20,'Licenciatura en Ciencias de la Educacion','LCE');
/*!40000 ALTER TABLE `careers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_modules`
--

DROP TABLE IF EXISTS `course_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `career_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_modules`
--

LOCK TABLES `course_modules` WRITE;
/*!40000 ALTER TABLE `course_modules` DISABLE KEYS */;
INSERT INTO `course_modules` VALUES (1,19,9,'miercoles','13:00:00','14:00:00',NULL,NULL),(3,19,12,'miercoles','07:01:00','08:01:00',NULL,NULL),(4,19,12,'lunes','13:00:00','16:00:00',NULL,NULL),(5,11,18,'lunes','11:20:00','13:20:00',NULL,NULL),(6,11,18,'martes','09:00:00','11:00:00',NULL,NULL),(7,11,18,'lunes','14:01:00','15:00:00',NULL,NULL),(8,11,18,'jueves','15:03:00','16:03:00',NULL,NULL),(9,19,10,'lunes','01:00:00','02:00:00',NULL,NULL),(10,19,11,'lunes','10:00:00','11:00:00',NULL,NULL),(11,19,11,'martes','13:00:00','14:02:00',NULL,NULL),(12,19,16,'viernes','14:18:00','13:02:00',NULL,NULL),(13,19,16,'viernes','18:01:00','15:01:00',NULL,NULL),(14,19,13,'lunes','09:00:00','10:00:00',NULL,NULL),(15,19,13,'lunes','12:00:00','13:00:00',NULL,NULL),(16,19,16,'viernes','18:02:00','17:03:00',NULL,NULL),(17,19,15,'viernes','15:02:00','16:02:00',NULL,NULL),(18,19,15,'viernes','16:01:00','03:01:00',NULL,NULL),(34,19,9,'lunes','15:00:00','19:00:00',NULL,NULL),(35,19,19,'lunes','11:50:00','12:40:00',NULL,NULL),(36,19,19,'martes','13:30:00','14:20:00',NULL,NULL),(37,19,19,'viernes','15:10:00','16:50:00',NULL,NULL),(38,19,20,'lunes','16:00:00','17:00:00',NULL,NULL),(39,19,20,'martes','17:10:00','18:00:00',NULL,NULL),(40,19,21,'miercoles','10:10:00','11:00:00',NULL,NULL),(41,19,21,'viernes','13:30:00','14:20:00',NULL,NULL),(42,19,22,'viernes','18:00:00','18:50:00',NULL,NULL),(43,19,14,'lunes','08:00:00','09:00:00',NULL,NULL),(44,19,14,'martes','10:00:00','11:00:00',NULL,NULL);
/*!40000 ALTER TABLE `course_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `semester` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (9,'InglÃ©s BÃ¡sico I',1,19,2),(10,'TeorÃ­a y GeografÃ­a TurÃ­stic',1,19,1),(11,'IntroducciÃ³n a la GastronomÃ­',1,19,2),(12,'MicrobiologÃ­a de Alimentos',1,19,1),(13,'Fundamentos de AdministraciÃ³n',1,19,2),(14,'Fundamentos de Contabilidad',1,19,2),(15,'ComputaciÃ³n I',1,19,1),(16,'Desarrollo Humano y Ã‰tica',2,19,1),(17,'InglÃ©s BÃ¡sico II',2,19,2),(18,'paradigmas de programacion',2,11,2),(19,'MetodologÃ­a y DiseÃ±o de InvestigaciÃ³n',8,19,1),(20,'TransportaciÃ³n Terrestre',8,19,1),(21,'ArqueologÃ­a',8,19,1),(22,'EcologÃ­a y Ambiente',8,19,1),(23,'xddxdxdxxxxx',2,14,2);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee_profiles`
--

DROP TABLE IF EXISTS `employee_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lv_education` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto_dir` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_profiles`
--

LOCK TABLES `employee_profiles` WRITE;
/*!40000 ALTER TABLE `employee_profiles` DISABLE KEYS */;
INSERT INTO `employee_profiles` VALUES (1,1,'ING.','dinero.jpg','1'),(2,2,'ING.','Abstract-Geometric-Wallpapers-HD.jpg','2'),(25,62,'LIC.','/img',NULL),(26,63,'LIC.','/img',NULL),(27,67,'LIC.',NULL,''),(28,68,'LIC.','11109157_1597936787113930_3347809650319831639_n.jpg','28'),(29,69,'LIC.','D:.jpg','29'),(31,81,'ING','MorganFreeman.png','31'),(32,82,'LIC.','piojo-herrea.jpg','32');
/*!40000 ALTER TABLE `employee_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `partial` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exams`
--

LOCK TABLES `exams` WRITE;
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
INSERT INTO `exams` VALUES (1,9,1,'2015-03-19','10:10:00','11:10:00','2015-08-04 20:00:47','2015-08-04 20:00:47'),(2,9,2,'2015-04-20','11:10:00','12:40:00','2015-08-04 20:00:47','2015-08-04 20:00:47'),(3,9,3,'2015-05-19','09:10:00','14:30:00','2015-08-04 20:00:47','2015-08-04 20:00:47'),(4,9,4,'2015-06-23','13:30:00','15:30:00','2015-08-04 20:00:47','2015-08-04 20:00:47'),(5,9,5,'2015-07-15',NULL,NULL,'2015-08-04 20:00:47','2015-08-04 20:00:47'),(6,10,1,'2015-03-19','08:10:00','09:20:00','2015-08-04 21:11:11','2015-08-04 21:11:11'),(7,10,2,'2015-04-16','10:30:00','08:30:00','2015-08-04 21:11:11','2015-08-04 21:11:11'),(8,10,3,'2015-05-28','10:10:00','11:20:00','2015-08-04 21:11:11','2015-08-04 21:11:11'),(9,10,4,'2015-06-03','10:30:00','11:20:00','2015-08-04 21:11:11','2015-08-04 21:11:11'),(10,10,5,'2015-07-15',NULL,NULL,'2015-08-04 21:11:11','2015-08-04 21:11:11'),(11,11,1,'2015-03-23','11:10:00','10:30:00','2015-08-06 14:01:40','2015-08-06 14:01:40'),(12,11,2,'2015-04-23','09:10:00','10:20:00','2015-08-06 14:01:40','2015-08-06 14:01:40'),(13,11,3,'2015-05-18','12:10:00','13:20:00','2015-08-06 14:01:40','2015-08-06 14:01:40'),(14,11,4,'2015-06-23','11:20:00','14:30:00','2015-08-06 14:01:40','2015-08-06 14:01:40'),(15,11,5,'2015-07-23',NULL,NULL,'2015-08-06 14:01:40','2015-08-06 14:01:40'),(16,12,1,'2015-03-20','07:10:00','08:20:00','2015-08-06 14:06:54','2015-08-06 14:06:54'),(17,12,2,'2015-04-20','10:10:00','11:20:00','2015-08-06 14:06:54','2015-08-06 14:06:54'),(18,12,3,'2015-05-20','08:10:00','10:20:00','2015-08-06 14:06:54','2015-08-06 14:06:54'),(19,12,4,'2015-06-18','09:10:00','12:10:00','2015-08-06 14:06:54','2015-08-06 14:06:54'),(20,12,5,'2015-07-15',NULL,NULL,'2015-08-06 14:06:54','2015-08-06 14:06:54'),(21,13,1,'2015-03-17','12:10:00','13:30:00','2015-08-06 14:08:23','2015-08-06 14:08:23'),(22,13,2,'2015-04-20','11:20:00','13:20:00','2015-08-06 14:08:23','2015-08-06 14:08:23'),(23,13,3,'2015-05-21','11:20:00','12:30:00','2015-08-06 14:08:23','2015-08-06 14:08:23'),(24,13,4,'2015-06-15','11:00:00','13:20:00','2015-08-06 14:08:23','2015-08-06 14:08:23'),(25,13,5,'2015-07-21',NULL,NULL,'2015-08-06 14:08:23','2015-08-06 14:08:23'),(26,14,1,'2015-03-16','11:10:00','12:20:00','2015-08-06 14:09:37','2015-08-06 14:09:37'),(27,14,2,'2015-04-17','10:00:00','12:30:00','2015-08-06 14:09:37','2015-08-06 14:09:37'),(28,14,3,'2015-05-19','07:00:00','09:10:00','2015-08-06 14:09:37','2015-08-06 14:09:37'),(29,14,4,'2015-06-16','08:00:00','10:10:00','2015-08-06 14:09:37','2015-08-06 14:09:37'),(30,14,5,'2015-07-16',NULL,NULL,'2015-08-06 14:09:37','2015-08-06 14:09:37'),(31,15,1,'2015-03-19','07:00:00','09:10:00','2015-08-06 14:11:09','2015-08-06 14:11:09'),(32,15,2,'2015-04-21','08:00:00','11:00:00','2015-08-06 14:11:09','2015-08-06 14:11:09'),(33,15,3,'2015-05-18','15:20:00','17:20:00','2015-08-06 14:11:09','2015-08-06 14:11:09'),(34,15,4,'2015-06-16','14:20:00','16:30:00','2015-08-06 14:11:09','2015-08-06 14:11:09'),(35,15,5,'2015-07-20',NULL,NULL,'2015-08-06 14:11:09','2015-08-06 14:11:09');
/*!40000 ALTER TABLE `exams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extra_partial_scores`
--

DROP TABLE IF EXISTS `extra_partial_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extra_partial_scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partial_score_id` int(11) NOT NULL,
  `description` varchar(25) DEFAULT NULL,
  `extra_points` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extra_partial_scores`
--

LOCK TABLES `extra_partial_scores` WRITE;
/*!40000 ALTER TABLE `extra_partial_scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `extra_partial_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extraordinary_and_title_scores`
--

DROP TABLE IF EXISTS `extraordinary_and_title_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `extraordinary_and_title_scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `final_score_id` int(11) NOT NULL,
  `obtained_score` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extraordinary_and_title_scores`
--

LOCK TABLES `extraordinary_and_title_scores` WRITE;
/*!40000 ALTER TABLE `extraordinary_and_title_scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `extraordinary_and_title_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `final_scores`
--

DROP TABLE IF EXISTS `final_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `final_scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `final_score` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_scores`
--

LOCK TABLES `final_scores` WRITE;
/*!40000 ALTER TABLE `final_scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `final_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goals`
--

DROP TABLE IF EXISTS `goals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `parcial` int(11) NOT NULL,
  `percentage` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goals`
--

LOCK TABLES `goals` WRITE;
/*!40000 ALTER TABLE `goals` DISABLE KEYS */;
INSERT INTO `goals` VALUES (1,'Lecturas',1,10,1,30,'2015-05-21 22:57:36','2015-05-21 22:57:36'),(2,'Tareas',1,10,1,20,'2015-05-21 22:57:36','2015-05-21 22:57:36'),(3,'Asistencias',1,10,1,10,'2015-05-21 22:57:36','2015-05-21 22:57:36'),(4,'Examen',1,10,1,40,'2015-05-21 22:57:36','2015-05-21 22:57:36'),(5,'Investigaciones',1,12,1,30,'2015-05-21 22:58:45','2015-05-21 22:58:45'),(6,'Asistencias',1,12,1,10,'2015-05-21 22:58:45','2015-05-21 22:58:45'),(7,'Examen',1,12,1,30,'2015-05-21 22:58:45','2015-05-21 22:58:45'),(8,'participaciones',1,12,1,30,'2015-05-21 22:58:45','2015-05-21 22:58:45');
/*!40000 ALTER TABLE `goals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (5,'admin','2015-03-03 16:54:18','2015-03-03 16:54:18'),(6,'coord','2015-03-03 16:54:36','2015-03-03 16:54:36'),(7,'teacher','2015-03-03 16:54:58','2015-03-03 16:54:58'),(8,'student','2015-03-03 16:55:11','2015-03-03 16:55:11');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period` int(4) NOT NULL,
  `name` char(4) NOT NULL,
  `career_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` VALUES (5,1,'A',11),(6,2,'A',13),(7,2,'B',11),(8,5,'A',11),(9,4,'A',11),(10,3,'A',11),(11,6,'A',11),(12,7,'A',11),(13,8,'A',11),(14,9,'A',11),(15,10,'A',11),(16,1,'A',13),(20,3,'A',13),(21,4,'A',13),(22,5,'A',13),(23,6,'A',13),(24,7,'A',13),(25,8,'A',13),(26,9,'A',13),(27,10,'A',13),(28,1,'A',12),(29,2,'A',12),(30,3,'A',12),(31,4,'A',12),(32,5,'A',12),(33,6,'A',12),(34,7,'A',12),(35,8,'A',12),(36,9,'A',12),(37,10,'A',12),(38,1,'A',19),(39,2,'A',19),(40,3,'A',19),(41,8,'A',19);
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remitente` int(11) NOT NULL,
  `destinatario` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,62,'Examen para imprimir de la materia: ComputaciÃ³n I','Nuevo examen disponible para descarga de la materia ComputaciÃ³n I, Periodo: Primer parcial','2015-08-02 21:51:04',1);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obtainedgoals`
--

DROP TABLE IF EXISTS `obtainedgoals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obtainedgoals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `percentage_obtained` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obtainedgoals`
--

LOCK TABLES `obtainedgoals` WRITE;
/*!40000 ALTER TABLE `obtainedgoals` DISABLE KEYS */;
INSERT INTO `obtainedgoals` VALUES (1,1,18,20,'2015-05-22 00:47:57','2015-05-22 00:47:57'),(2,2,18,10,'2015-05-22 00:47:57','2015-05-22 00:47:57'),(3,3,18,10,'2015-05-22 00:47:57','2015-05-22 00:47:57'),(4,4,18,39,'2015-05-22 00:47:57','2015-05-22 00:47:57'),(5,1,65,29,'2015-05-22 00:47:57','2015-05-22 00:47:57'),(6,2,65,19,'2015-05-22 00:47:57','2015-05-22 00:47:57'),(7,3,65,10,'2015-05-22 00:47:57','2015-05-22 00:47:57'),(8,4,65,20,'2015-05-22 00:47:57','2015-05-22 00:47:57'),(9,5,18,20,'2015-05-22 00:48:34','2015-05-22 00:48:34'),(10,6,18,8,'2015-05-22 00:48:34','2015-05-22 00:48:34'),(11,7,18,28,'2015-05-22 00:48:34','2015-05-22 00:48:34'),(12,8,18,10,'2015-05-22 00:48:34','2015-05-22 00:48:34'),(13,5,65,10,'2015-05-22 00:48:34','2015-05-22 00:48:34'),(14,6,65,5,'2015-05-22 00:48:34','2015-05-22 00:48:34'),(15,7,65,10,'2015-05-22 00:48:34','2015-05-22 00:48:34'),(16,8,65,29,'2015-05-22 00:48:34','2015-05-22 00:48:34');
/*!40000 ALTER TABLE `obtainedgoals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partial_scores`
--

DROP TABLE IF EXISTS `partial_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partial_scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `partial` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `final_score` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partial_scores`
--

LOCK TABLES `partial_scores` WRITE;
/*!40000 ALTER TABLE `partial_scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `partial_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plannings`
--

DROP TABLE IF EXISTS `plannings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plannings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coordi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `planeacion` varchar(255) NOT NULL,
  `planeacion_dir` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plannings`
--

LOCK TABLES `plannings` WRITE;
/*!40000 ALTER TABLE `plannings` DISABLE KEYS */;
INSERT INTO `plannings` VALUES (1,62,1,19,15,'planeacion semana 2','planeacionxD.rar','1','2015-08-02 12:21:12','2015-08-02 12:21:12');
/*!40000 ALTER TABLE `plannings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repitecursos`
--

DROP TABLE IF EXISTS `repitecursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repitecursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repitecursos`
--

LOCK TABLES `repitecursos` WRITE;
/*!40000 ALTER TABLE `repitecursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `repitecursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semesters`
--

DROP TABLE IF EXISTS `semesters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semesters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semesters`
--

LOCK TABLES `semesters` WRITE;
/*!40000 ALTER TABLE `semesters` DISABLE KEYS */;
INSERT INTO `semesters` VALUES (1,'2015-03-03','2015-11-20','2015-05-22 00:05:35','2015-05-22 00:05:35');
/*!40000 ALTER TABLE `semesters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_profiles`
--

DROP TABLE IF EXISTS `student_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `matricula` varchar(12) NOT NULL,
  `semester` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_profiles`
--

LOCK TABLES `student_profiles` WRITE;
/*!40000 ALTER TABLE `student_profiles` DISABLE KEYS */;
INSERT INTO `student_profiles` VALUES (5,7,11,5,'ISC2015001',1),(12,16,11,5,'LT20150088',1),(14,18,19,38,'LT20150098',1),(56,65,19,38,'LT20150093',1),(57,66,19,41,'LT002120AD',8),(58,70,11,5,'ICS2015001',1),(59,72,11,5,'ISC2015432',1),(60,73,19,38,'ISC2015009',1),(65,78,19,38,'LT12300ASD',1),(66,79,11,5,'ISC1240093',1),(72,88,12,28,'LAHGY20154',1),(73,89,11,5,'ISC201500S',1);
/*!40000 ALTER TABLE `student_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uploadtests`
--

DROP TABLE IF EXISTS `uploadtests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uploadtests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coordi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `partial` int(11) NOT NULL,
  `examen` varchar(255) NOT NULL,
  `examen_dir` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploadtests`
--

LOCK TABLES `uploadtests` WRITE;
/*!40000 ALTER TABLE `uploadtests` DISABLE KEYS */;
INSERT INTO `uploadtests` VALUES (1,62,1,15,1,'Formato de EvaluaciÃ³n (plan 2010).docx','1','2015-08-02 21:51:04','2015-08-02 21:51:04');
/*!40000 ALTER TABLE `uploadtests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `apat` varchar(40) NOT NULL,
  `amat` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Uriel','Cardoso','Alcantar','mmmasas@gmail.com','kljlkj',7),(2,'German','MARTINEZ','SOLIS','gms.linux@gmail.com','QWQWQWQW',7),(7,'JUAN','XXXXXX','XXXSFG','xxx@dd.com','ssssssds',8),(16,'JUAN','RAMIREZ','CASTRO','jcs@hmail.com','sasdfdf4',8),(18,'KINK','JAVAN','GAONA','kinghentai069@xxx.com','23swdcdfdf',8),(62,'Juaquin','avalos','alcantar','jqalvc@outlook.com','weeddffgghh',6),(63,'RICARDO','DFHHJK','RAMIREZ','rfc@hotmail.com','asasasasasa',6),(65,'JUAN CARLOS','UZTATTO','SJFHCC','jc_34.09@gfs.com','contraseÃ±a',8),(66,'ANA','RODRIGUEZ','VILLANUEVA','ana34_3@hotmail.com','ana09234',8),(67,'JUAN','ALVARES','RODRIGUEZ','juan.rdz@gmail.com','contraseÃ±a1',6),(68,'EVERALDO','ALCANTAR','ALCANTAR','everaldo.a34@gmail.com','everaldo12',6),(69,'FLOR','DIAS','RAMIREZ','flor_rems13@hotmail.com','contraseÃ±a12',7),(70,'JUANITO','DIAS','RODRIGUEZ','juan342@gmail.com','contraseÃ±a',8),(72,'ALAN','MORA','PEREZ','alan_304@hotmail.com','contraseÃ±a123',8),(73,'JUAN','PEDRO','ALCANTAR','juan.rdzQ@outlook.com','ssssssshshshshsh',8),(78,'OSCAR','REYES','SAMBRANO','oscar_smb34@hotmail.com','@LTORS201546',8),(79,'JUAN','ARNULFO','PERES','jn23_sdf@gmail.com','$ISCJAP201565',8),(81,'ARON','BOBADILLA','RAMIREZ','rmnx12_99@hotmail.com','$INGABR201514',7),(82,'MIGUEL','HERRERA','HURTADO','mgs_st@gmail.com','LIC.MHH201570',6),(88,'PABLO','ALCANTAR','PEREZ','gms.linux@gmail.com','$LAHYGPAP201584',8),(89,'JUAN','ALCANTAR','RAMIREZ','jcns@gmai.com','$ISCJAR201510',8);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_courses`
--

DROP TABLE IF EXISTS `users_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_courses`
--

LOCK TABLES `users_courses` WRITE;
/*!40000 ALTER TABLE `users_courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usrcareers`
--

DROP TABLE IF EXISTS `usrcareers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usrcareers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usrcareers`
--

LOCK TABLES `usrcareers` WRITE;
/*!40000 ALTER TABLE `usrcareers` DISABLE KEYS */;
INSERT INTO `usrcareers` VALUES (3,62,13),(5,62,14),(6,62,16),(7,62,19),(8,63,12),(9,63,18),(10,63,20),(11,62,15),(12,63,17),(13,63,11);
/*!40000 ALTER TABLE `usrcareers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-12  1:46:54
