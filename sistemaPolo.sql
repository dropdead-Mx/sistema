-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sistema
-- ------------------------------------------------------
-- Server version	5.5.44-0+deb7u1

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assists`
--

LOCK TABLES `assists` WRITE;
/*!40000 ALTER TABLE `assists` DISABLE KEYS */;
INSERT INTO `assists` VALUES (1,18,12,38,1,'2015-08-24','','2015-08-24 23:42:40','2015-08-24 23:42:40'),(2,65,12,38,2,'2015-08-24','','2015-08-24 23:42:40','2015-08-24 23:42:40'),(3,73,12,38,1,'2015-08-24','','2015-08-24 23:42:40','2015-08-24 23:42:40'),(4,78,12,38,1,'2015-08-24','','2015-08-24 23:42:40','2015-08-24 23:42:40'),(5,90,12,38,2,'2015-08-24','','2015-08-24 23:42:40','2015-08-24 23:42:40'),(6,91,12,38,2,'2015-08-24','','2015-08-24 23:42:40','2015-08-24 23:42:40'),(7,18,12,38,1,'2015-08-28','','2015-08-28 02:16:24','2015-08-28 02:16:24'),(8,65,12,38,1,'2015-08-28','','2015-08-28 02:16:24','2015-08-28 02:16:24'),(9,73,12,38,2,'2015-08-28','Problemas familiares','2015-08-28 02:16:24','2015-09-02 13:30:42'),(10,78,12,38,1,'2015-08-28','Dia festivo','2015-08-28 02:16:24','2015-09-02 13:24:50'),(11,90,12,38,2,'2015-08-28','','2015-08-28 02:16:24','2015-08-28 02:16:24'),(12,91,12,38,1,'2015-08-28','','2015-08-28 02:16:24','2015-08-28 02:16:24');
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
  `grupo_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_modules`
--

LOCK TABLES `course_modules` WRITE;
/*!40000 ALTER TABLE `course_modules` DISABLE KEYS */;
INSERT INTO `course_modules` VALUES (1,19,12,38,'lunes','08:10:00','09:10:00','2015-08-22 12:57:40','2015-08-22 12:57:40'),(2,19,12,38,'miercoles','13:20:00','14:10:00','2015-08-22 12:57:40','2015-08-22 12:57:40'),(3,19,12,38,'viernes','15:10:00','16:10:00','2015-08-22 12:57:40','2015-08-22 12:57:40'),(4,19,9,38,'martes','07:00:00','08:20:00','2015-08-25 09:47:38','2015-08-25 09:47:38'),(5,19,9,38,'miercoles','09:00:00','10:00:00','2015-08-25 09:47:38','2015-08-25 09:47:38');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (9,'InglÃ©s BÃ¡sico I',1,19),(10,'TeorÃ­a y GeografÃ­a TurÃ­stic',1,19),(11,'IntroducciÃ³n a la GastronomÃ­',1,19),(12,'MicrobiologÃ­a de Alimentos',1,19),(13,'Fundamentos de AdministraciÃ³n',1,19),(14,'Fundamentos de Contabilidad',1,19),(15,'ComputaciÃ³n I',1,19),(16,'Desarrollo Humano y Ã‰tica',2,19),(17,'InglÃ©s BÃ¡sico II',2,19),(18,'paradigmas de programacion',2,11),(19,'MetodologÃ­a y DiseÃ±o de InvestigaciÃ³n',8,19),(20,'TransportaciÃ³n Terrestre',8,19),(21,'ArqueologÃ­a',8,19),(22,'EcologÃ­a y Ambiente',8,19),(23,'xddxdxdxxxxx',2,14);
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_profiles`
--

LOCK TABLES `employee_profiles` WRITE;
/*!40000 ALTER TABLE `employee_profiles` DISABLE KEYS */;
INSERT INTO `employee_profiles` VALUES (1,1,'ING.','profesor.jpg','1'),(2,2,'ING.','profe2.jpg','2'),(25,62,'LIC.','coordi2.jpg','25'),(26,63,'LIC.','cordi1.jpg','26'),(27,67,'ING.','coordi3.jpg','27'),(29,69,'LIC.','profesora.png','29'),(33,95,'ING','direct.jpeg','33'),(34,96,'DR','direct.jpeg','34');
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
  `grupo_id` int(11) NOT NULL,
  `partial` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exams`
--

LOCK TABLES `exams` WRITE;
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
INSERT INTO `exams` VALUES (1,9,38,1,'2015-03-03','09:00:00','10:10:00','2015-08-30 13:50:36','2015-08-30 13:50:36'),(2,9,38,2,'2015-04-17','10:10:00','12:00:00','2015-08-30 13:50:36','2015-08-30 13:50:36'),(3,9,38,3,'2015-05-05','10:00:00','11:10:00','2015-08-30 13:50:36','2015-08-30 13:50:36'),(4,9,38,4,'2015-06-18','10:10:00','12:10:00','2015-08-30 13:50:36','2015-08-30 13:50:36'),(5,9,38,5,'2015-08-19',NULL,NULL,'2015-08-30 13:50:36','2015-08-30 13:50:36');
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
  `grupo_id` int(11) NOT NULL,
  `parcial` int(11) NOT NULL,
  `percentage` float NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goals`
--

LOCK TABLES `goals` WRITE;
/*!40000 ALTER TABLE `goals` DISABLE KEYS */;
INSERT INTO `goals` VALUES (1,'EXAMEN',1,12,38,1,30,'2015-08-24 14:17:29','2015-08-24 14:17:29'),(2,'TAREAS',1,12,38,1,30,'2015-08-24 14:17:29','2015-08-24 14:17:29'),(3,'ASISTENCIA',1,12,38,1,10,'2015-08-24 14:17:29','2015-08-24 14:17:29'),(4,'PARTICIPACIONES',1,12,38,1,20,'2015-08-24 14:17:29','2015-08-24 14:17:29'),(5,'PRACTICAS',1,12,38,1,10,'2015-08-24 14:17:29','2015-08-24 14:17:29'),(6,'EXAMEN',1,12,38,2,50,'2015-08-24 16:00:08','2015-08-24 16:00:08'),(7,'ASISTENCIAS',1,12,38,2,10,'2015-08-24 16:00:08','2015-08-24 16:00:08'),(8,'PRACTICAS',1,12,38,2,40,'2015-08-24 16:00:08','2015-08-24 16:00:08'),(9,'EXAMEN',1,9,38,1,40,'2015-08-25 09:46:07','2015-08-25 09:46:07'),(10,'ASISTENCIAS',1,9,38,1,50,'2015-08-25 09:46:07','2015-08-25 09:46:07'),(11,'TAREA',1,9,38,1,5,'2015-08-25 09:46:07','2015-08-25 09:46:07'),(12,'PARTICIPACION',1,9,38,1,5,'2015-08-25 09:46:07','2015-08-25 09:46:07'),(13,'EXAMEN',1,9,38,2,50,'2015-08-31 22:47:36','2015-08-31 22:47:36'),(14,'TAREAS',1,9,38,2,30,'2015-08-31 22:47:36','2015-08-31 22:47:36'),(15,'ASISTENCIAS',1,9,38,2,10,'2015-08-31 22:47:36','2015-08-31 22:47:36'),(16,'PARTICIPACIONES',1,9,38,2,10,'2015-08-31 22:47:36','2015-08-31 22:47:36'),(18,'EXAMEN',1,12,38,3,30,'2015-08-31 22:52:24','2015-08-31 22:52:24'),(21,'PRACTICAS',1,12,38,3,40,'2015-08-31 22:52:24','2015-08-31 22:52:24'),(22,'ASISTENCIAS',1,12,38,3,10,'2015-08-31 22:52:24','2015-08-31 22:52:24'),(23,'TAREAS',1,12,38,3,20,'2015-08-31 22:52:24','2015-08-31 22:52:24'),(24,'ASISTENCIA',1,9,38,3,10,'2015-08-31 23:13:10','2015-08-31 23:13:10'),(25,'EXAMEN',1,9,38,3,20,'2015-08-31 23:13:10','2015-08-31 23:13:10'),(26,'PROYECTO FINAL',1,9,38,3,70,'2015-08-31 23:13:10','2015-08-31 23:13:10');
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` VALUES (5,1,'A',11),(6,2,'A',13),(7,2,'B',11),(8,5,'A',11),(9,4,'A',11),(10,3,'A',11),(11,6,'A',11),(12,7,'A',11),(13,8,'A',11),(14,9,'A',11),(15,10,'A',11),(16,1,'A',13),(20,3,'A',13),(21,4,'A',13),(22,5,'A',13),(23,6,'A',13),(24,7,'A',13),(25,8,'A',13),(26,9,'A',13),(27,10,'A',13),(28,1,'A',12),(29,2,'A',12),(30,3,'A',12),(31,4,'A',12),(32,5,'A',12),(33,6,'A',12),(34,7,'A',12),(35,8,'A',12),(36,9,'A',12),(37,10,'A',12),(38,1,'A',19),(39,2,'A',19),(40,3,'A',19),(41,8,'A',19),(42,1,'B',19);
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
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,62,'Examen para imprimir de la materia: MicrobiologÃ­a de Alimentos','Nuevo examen disponible para descarga de la materia MicrobiologÃ­a de Alimentos, Periodo: Primer parcial del grupo:1 A','2015-08-25 05:33:40',0,NULL,NULL),(2,1,62,'Examen para imprimir de la materia: MicrobiologÃ­a de Alimentos','Nuevo examen disponible para descarga de la materia MicrobiologÃ­a de Alimentos, Periodo: Segundo parcial del grupo:1 A','2015-08-25 05:53:05',0,'2015-08-25 00:51:35','2015-08-25 00:53:05'),(3,1,62,'Examen para imprimir de la materia: MicrobiologÃ­a de Alimentos','Nuevo examen disponible para descarga de la materia MicrobiologÃ­a de Alimentos, Periodo: Tercer parcial del grupo:1 A','2015-08-25 05:55:44',0,'2015-08-25 00:53:48','2015-08-25 00:55:44'),(4,1,62,'Examen para imprimir de la materia: MicrobiologÃ­a de Alimentos','Nuevo examen disponible para descarga de la materia MicrobiologÃ­a de Alimentos, Periodo: Cuatrimestral del grupo:1 A','2015-08-25 06:16:54',0,'2015-08-25 01:16:37','2015-08-25 01:16:54'),(5,1,62,'Examen para imprimir de la materia: MicrobiologÃ­a de Alimentos','Nuevo examen disponible para descarga de la materia MicrobiologÃ­a de Alimentos, Periodo: Primer parcial del grupo:1 A','2015-08-25 06:18:33',0,'2015-08-25 01:18:22','2015-08-25 01:18:33'),(6,1,62,'Planeacion de la materia: MicrobiologÃ­a de Alimentosd el grupo: 1 A','planeacion semana 1','2015-08-25 06:26:14',0,'2015-08-25 01:23:14','2015-08-25 01:26:14'),(7,1,62,'Examen para imprimir de la materia: InglÃ©s BÃ¡sico I','Nuevo examen disponible para descarga de la materia InglÃ©s BÃ¡sico I, Periodo: Primer parcial del grupo:1 A','2015-08-25 07:13:35',0,'2015-08-25 02:12:13','2015-08-25 02:13:35'),(8,62,1,'Envio planeaciones','mandame las planeaciones a mas tardar el lunes','2015-09-04 00:20:06',0,'2015-09-03 19:18:23','2015-09-03 19:20:06'),(9,1,62,'Envio planeaciones','si yo se las envio','2015-09-04 00:21:21',0,'2015-09-03 19:21:07','2015-09-03 19:21:21');
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
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obtainedgoals`
--

LOCK TABLES `obtainedgoals` WRITE;
/*!40000 ALTER TABLE `obtainedgoals` DISABLE KEYS */;
INSERT INTO `obtainedgoals` VALUES (1,9,18,40,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(2,10,18,50,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(3,11,18,5,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(4,12,18,5,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(5,9,65,40,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(6,10,65,50,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(7,11,65,5,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(8,12,65,5,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(9,9,73,40,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(10,10,73,50,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(11,11,73,4,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(12,12,73,4,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(13,9,78,32,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(14,10,78,40,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(15,11,78,4,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(16,12,78,4,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(17,9,90,32,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(18,10,90,40,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(19,11,90,4,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(20,12,90,4,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(21,9,91,36,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(22,10,91,45,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(23,11,91,4.5,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(24,12,91,4.5,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(25,6,18,35,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(26,7,18,9,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(27,8,18,36,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(28,6,65,45,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(29,7,65,9,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(30,8,65,36,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(31,6,73,37.5,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(32,7,73,8.6,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(33,8,73,36.4,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(34,6,78,15,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(35,7,78,2,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(36,8,78,4,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(37,6,90,15,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(38,7,90,5,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(39,8,90,4,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(40,6,91,40,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(41,7,91,9,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(42,8,91,40,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(43,13,18,50,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(44,14,18,30,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(45,15,18,10,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(46,16,18,10,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(47,13,65,45,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(48,14,65,27,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(49,15,65,9,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(50,16,65,8,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(51,13,73,40,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(52,14,73,21,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(53,15,73,6,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(54,16,73,5,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(55,13,78,5,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(56,14,78,0,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(57,15,78,10,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(58,16,78,10,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(59,13,90,45,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(60,14,90,27,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(61,15,90,9,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(62,16,90,5,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(63,13,91,25,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(64,14,91,15,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(65,15,91,9,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(66,16,91,10,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(67,24,18,10,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(68,25,18,20,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(69,26,18,70,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(70,24,65,9,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(71,25,65,18,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(72,26,65,63,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(73,24,73,9,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(74,25,73,18,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(75,26,73,63,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(76,24,78,9,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(77,25,78,18,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(78,26,78,63,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(79,24,90,5,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(80,25,90,10,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(81,26,90,35,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(82,24,91,9,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(83,25,91,20,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(84,26,91,49,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(85,1,18,15,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(86,2,18,9,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(87,3,18,3,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(88,4,18,6,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(89,5,18,0.2,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(90,1,65,0.6,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(91,2,65,0,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(92,3,65,0,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(93,4,65,0,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(94,5,65,10,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(95,1,73,30,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(96,2,73,30,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(97,3,73,10,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(98,4,73,20,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(99,5,73,10,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(100,1,78,27,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(101,2,78,27,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(102,3,78,9,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(103,4,78,18,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(104,5,78,9,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(105,1,90,0,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(106,2,90,0,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(107,3,90,0,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(108,4,90,0,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(109,5,90,0,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(110,1,91,0,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(111,2,91,0,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(112,3,91,0,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(113,4,91,0,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(114,5,91,0,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(115,18,18,0,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(116,21,18,20,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(117,22,18,5,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(118,23,18,10,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(119,18,65,30,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(120,21,65,40,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(121,22,65,10,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(122,23,65,20,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(123,18,73,30,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(124,21,73,0,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(125,22,73,2,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(126,23,73,2,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(127,18,78,3,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(128,21,78,36,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(129,22,78,9,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(130,23,78,18,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(131,18,90,24,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(132,21,90,32,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(133,22,90,8,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(134,23,90,10,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(135,18,91,15,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(136,21,91,24,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(137,22,91,7,'2015-09-01 00:02:55','2015-09-01 00:02:55'),(138,23,91,14,'2015-09-01 00:02:55','2015-09-01 00:02:55');
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
  `grupo_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `final_score` float NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partial_scores`
--

LOCK TABLES `partial_scores` WRITE;
/*!40000 ALTER TABLE `partial_scores` DISABLE KEYS */;
INSERT INTO `partial_scores` VALUES (1,18,1,9,38,19,10,NULL,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(2,65,1,9,38,19,10,NULL,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(3,73,1,9,38,19,9.8,NULL,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(4,78,1,9,38,19,8,NULL,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(5,90,1,9,38,19,8,NULL,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(6,91,1,9,38,19,9,NULL,'2015-08-31 18:14:00','2015-08-31 18:14:00'),(7,18,2,12,38,19,8,NULL,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(8,65,2,12,38,19,9,NULL,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(9,73,2,12,38,19,8.25,NULL,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(10,78,2,12,38,19,2.1,NULL,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(11,90,2,12,38,19,2.4,NULL,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(12,91,2,12,38,19,8.9,NULL,'2015-08-31 19:55:29','2015-08-31 19:55:29'),(13,18,2,9,38,19,10,NULL,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(14,65,2,9,38,19,8.9,NULL,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(15,73,2,9,38,19,7.2,NULL,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(16,78,2,9,38,19,2.5,NULL,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(17,90,2,9,38,19,8.6,NULL,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(18,91,2,9,38,19,5.9,NULL,'2015-08-31 23:14:13','2015-08-31 23:14:13'),(19,18,3,9,38,19,10,NULL,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(20,65,3,9,38,19,9,NULL,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(21,73,3,9,38,19,9,NULL,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(22,78,3,9,38,19,9,NULL,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(23,90,3,9,38,19,5,NULL,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(24,91,3,9,38,19,7.8,NULL,'2015-08-31 23:14:47','2015-08-31 23:14:47'),(31,18,1,12,38,19,3.32,NULL,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(32,65,1,12,38,19,1.06,NULL,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(33,73,1,12,38,19,10,NULL,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(34,78,1,12,38,19,9,NULL,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(35,90,1,12,38,19,0,NULL,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(36,91,1,12,38,19,0,NULL,'2015-09-01 00:02:10','2015-09-01 00:02:10'),(37,18,3,12,38,19,3.5,NULL,'2015-09-01 00:02:56','2015-09-01 00:02:56'),(38,65,3,12,38,19,10,NULL,'2015-09-01 00:02:56','2015-09-01 00:02:56'),(39,73,3,12,38,19,3.4,NULL,'2015-09-01 00:02:56','2015-09-01 00:02:56'),(40,78,3,12,38,19,6.6,NULL,'2015-09-01 00:02:56','2015-09-01 00:02:56'),(41,90,3,12,38,19,7.4,NULL,'2015-09-01 00:02:56','2015-09-01 00:02:56'),(42,91,3,12,38,19,6,NULL,'2015-09-01 00:02:56','2015-09-01 00:02:56'),(55,18,4,12,38,19,0,NULL,'2015-09-03 00:35:16','2015-09-03 00:35:16'),(56,18,5,12,38,19,9.7,'ExamenExtraordinario','2015-09-03 00:35:16','2015-09-03 16:53:02'),(57,65,4,12,38,19,9.5,NULL,'2015-09-03 00:35:16','2015-09-03 00:35:16'),(58,65,5,12,38,19,8,'default','2015-09-03 00:35:16','2015-09-03 00:35:16'),(59,73,4,12,38,19,8.2,NULL,'2015-09-03 00:35:16','2015-09-03 00:35:16'),(60,73,5,12,38,19,8,'default','2015-09-03 00:35:16','2015-09-03 00:35:16'),(61,78,4,12,38,19,0,NULL,'2015-09-03 00:35:16','2015-09-03 00:35:16'),(62,78,5,12,38,19,6.5,'ExamenExtraordinario','2015-09-03 00:35:16','2015-09-03 16:53:02'),(63,90,4,12,38,19,0,NULL,'2015-09-03 00:35:16','2015-09-03 00:35:16'),(64,90,5,12,38,19,9.9,'ExamenExtraordinario','2015-09-03 00:35:16','2015-09-03 16:53:02'),(65,91,4,12,38,19,0,NULL,'2015-09-03 00:35:16','2015-09-03 00:35:16'),(66,91,5,12,38,19,8,'ExamenExtraordinario','2015-09-03 00:35:16','2015-09-03 16:53:02'),(67,18,4,9,38,19,9,NULL,'2015-09-03 17:02:20','2015-09-03 17:02:20'),(68,18,5,9,38,19,10,'default','2015-09-03 17:02:20','2015-09-03 17:02:20'),(69,65,4,9,38,19,6,NULL,'2015-09-03 17:02:20','2015-09-03 17:02:20'),(70,65,5,9,38,19,8,'default','2015-09-03 17:02:20','2015-09-03 17:02:20'),(71,73,4,9,38,19,5,NULL,'2015-09-03 17:02:20','2015-09-03 17:02:20'),(72,73,5,9,38,19,7,'default','2015-09-03 17:02:20','2015-09-03 17:02:20'),(73,78,4,9,38,19,4,NULL,'2015-09-03 17:02:20','2015-09-03 17:02:20'),(74,78,5,9,38,19,7,'ExamenExtraordinario','2015-09-03 17:02:20','2015-09-03 17:03:05'),(75,90,4,9,38,19,9.8,NULL,'2015-09-03 17:02:20','2015-09-03 17:02:20'),(76,90,5,9,38,19,9,'default','2015-09-03 17:02:20','2015-09-03 17:02:20'),(77,91,4,9,38,19,10,NULL,'2015-09-03 17:02:20','2015-09-03 17:02:20'),(78,91,5,9,38,19,9,'default','2015-09-03 17:02:20','2015-09-03 17:02:20');
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
  `grupo_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `planeacion` varchar(255) NOT NULL,
  `planeacion_dir` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plannings`
--

LOCK TABLES `plannings` WRITE;
/*!40000 ALTER TABLE `plannings` DISABLE KEYS */;
INSERT INTO `plannings` VALUES (1,62,1,19,12,38,'planeacion semana 1','icomoon.zip','1','2015-08-23 16:30:03','2015-08-23 16:30:03'),(2,62,1,19,12,38,'planeacion semana 1','jquery-validation-1.13.1.zip','2','2015-08-25 01:23:14','2015-08-25 01:23:14');
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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_profiles`
--

LOCK TABLES `student_profiles` WRITE;
/*!40000 ALTER TABLE `student_profiles` DISABLE KEYS */;
INSERT INTO `student_profiles` VALUES (5,7,11,5,'ISC2015001',1),(12,16,11,5,'LT20150088',1),(14,18,19,38,'LT20150098',1),(56,65,19,38,'LT20150093',1),(57,66,19,41,'LT002120AD',8),(58,70,11,5,'ICS2015001',1),(59,72,11,5,'ISC2015432',1),(60,73,19,38,'ISC2015009',1),(65,78,19,38,'LT12300ASD',1),(66,79,11,5,'ISC1240093',1),(73,89,11,5,'ISC201500S',1),(74,90,19,38,'LT2015ALX0',1),(75,91,19,39,'LT2015AX92',2),(77,93,11,5,'ISC2015002',1),(78,94,19,42,'LT2015001V',1);
/*!40000 ALTER TABLE `student_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachercourses`
--

DROP TABLE IF EXISTS `teachercourses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachercourses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachercourses`
--

LOCK TABLES `teachercourses` WRITE;
/*!40000 ALTER TABLE `teachercourses` DISABLE KEYS */;
INSERT INTO `teachercourses` VALUES (1,12,1,38,'2015-08-21 19:27:19','2015-08-21 21:28:28'),(2,12,69,42,'2015-08-22 00:11:15','2015-08-22 00:11:15'),(3,9,1,38,'2015-08-22 17:35:34','2015-08-25 02:09:04');
/*!40000 ALTER TABLE `teachercourses` ENABLE KEYS */;
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
  `grupo_id` int(11) NOT NULL,
  `partial` int(11) NOT NULL,
  `examen` varchar(255) NOT NULL,
  `examen_dir` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploadtests`
--

LOCK TABLES `uploadtests` WRITE;
/*!40000 ALTER TABLE `uploadtests` DISABLE KEYS */;
INSERT INTO `uploadtests` VALUES (1,62,1,12,38,1,'EJERCICIOS_1_UNIDAD.docx','1','2015-08-25 06:18:22','2015-08-25 06:18:22'),(2,62,1,9,38,1,'Carta aceptacion.docx','2','2015-08-25 07:12:13','2015-08-25 07:12:13');
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
  `password` varchar(255) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'URIEL','CARDOSO','ALCANTAR','urielcardozo99@gmail.com','$2a$10$hWaR2WKT1T0KIPJvzuk5/O3yLYSWrPXGTZXUqE24OmEDQNon44nw.',7),(2,'GERMAN','MARTINEZ','SOLIS','gms.linux@gmail.com','$2a$10$pWCyzeuPBvLBP6d3Gb7NgednpJlCxM.uu53/w0hpW3Hjzq/9EhqPy',7),(7,'JUAN','XXXXXX','XXXSFG','xxx@dd.com','ssssssds',8),(16,'JUAN','RAMIREZ','CASTRO','jcs@hmail.com','sasdfdf4',8),(18,'KING','JAVAN','GAONA','kingleegaona@hotmail.com','$2a$10$bEPcETL.ZLqejiW6MtUXmeKVqKF65.D5c5SpGqb7yGij36JN1TTQG',8),(62,'JUAQUIN','AVALOS','ALCANTAR','juaquinalcantar@gmail.com','$2a$10$NsqJ/ghum2jJ4BA5xUZmOuonRA4pptbn2cofygzsq8KPgRck1zXD2',6),(63,'RICARDO','OLIVARES','RAMIREZ','ricardo@hotmail.com','$2a$10$KCcJoWyK2I2SVAtKQJHHgenrWbxZ.cEWOVW7kkB2BafG6IfH7AM7e',6),(65,'JUAN CARLOS','UZTATTO','SJFHCC','jcxd21@hotmail.com','$2a$10$mVTlQqpy/FoyS1dA23q4zODjlCCmsxEHPGId5feb6k9mjqMX//GZG',8),(66,'ANA','RODRIGUEZ','VILLANUEVA','ana34_3@hotmail.com','ana09234',8),(67,'JUAN','ALVARES','RODRIGUEZ','juanrodriguez@gmail.com','$2a$10$doreYkDVSaYu1.FYkOGJYux15MEPK3OqKXbarEuK3HNCWzAUu9X8u',6),(69,'FLOR','DIAS','RAMIREZ','flor123@hotmail.com','$2a$10$9UTPf9lMlSViov4/.Uw02Ol3XYHSZ5aSwXay6FNL1XzBonPHWATbq',7),(70,'JUANITO','DIAS','RODRIGUEZ','juan342@gmail.com','contraseÃ±a',8),(72,'ALAN','MORA','PEREZ','alan_304@hotmail.com','contraseÃ±a123',8),(73,'JUAN','PEDRO','ALCANTAR','juan.rdzQ@outlook.com','ssssssshshshshsh',8),(78,'OSCAR','REYES','SAMBRANO','oscar_smb34@hotmail.com','@LTORS201546',8),(79,'JUAN','ARNULFO','PERES','jn23_sdf@gmail.com','$ISCJAP201565',8),(89,'JUAN','ALCANTAR','RAMIREZ','jcns@gmai.com','$ISCJAR201510',8),(90,'ALEJANDRA','REYES','BETANCOUR','alejxD23_btn@hotmail.com','$2a$10$eMfOEADiruxqUt6PAgZs0.s8i4x4/h9XK',8),(91,'AXEL','RUIZ','ALCANTAR','heblackparade@hotmail.com','$2a$10$pq8Lz/ZmJ5XRD2WMpgi9CeEPbeH/G8U/T',8),(93,'ANDRES','BAHENA','RODRIGUEZ','german.mtz.solis@gmail.com','$2a$10$n.QySR9YK1xPFsqYwlp9oeAYyV32GdZ4GL9bL6yeSGZh0FBuG.H7S',8),(94,'JUANITO','RAMIREZ','ABAD','abdrmz12@gmail.com','$2a$10$aMWF/pFngrQtr3VlMfHigevDrGKyID2T3ARg/GrI7Bp2cyCXQIQBa',8),(95,'ALEJANDRO','SANCHEZ','SALDAÃ‘A','alejandrosh@gmail.com','$2a$10$qfAxf7PeiVYJQzvQeOaFceH1VtPHiQj265YtwOh.YZcrNcMziN6lC',5),(96,'OSCAR','POLO','LOPEZ','polo_polo100@hotmail.com','$2a$10$S3.SfFT49OeDdIDEQXqYW.AKImUFWFK/z2T.nj3O.gtb.W0ZjRPvm',5);
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usrcareers`
--

LOCK TABLES `usrcareers` WRITE;
/*!40000 ALTER TABLE `usrcareers` DISABLE KEYS */;
INSERT INTO `usrcareers` VALUES (6,62,16),(7,62,19),(9,63,18),(10,63,20),(12,63,17),(13,63,11),(15,67,12),(16,62,14),(17,63,13),(18,62,15);
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

-- Dump completed on 2015-09-12 22:36:35
