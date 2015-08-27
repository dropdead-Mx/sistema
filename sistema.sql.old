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
  `grupo_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_modules`
--

LOCK TABLES `course_modules` WRITE;
/*!40000 ALTER TABLE `course_modules` DISABLE KEYS */;
INSERT INTO `course_modules` VALUES (1,19,12,38,'lunes','08:10:00','09:10:00','2015-08-22 12:57:40','2015-08-22 12:57:40'),(2,19,12,38,'miercoles','13:20:00','14:10:00','2015-08-22 12:57:40','2015-08-22 12:57:40'),(3,19,12,38,'viernes','15:10:00','16:10:00','2015-08-22 12:57:40','2015-08-22 12:57:40');
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_profiles`
--

LOCK TABLES `employee_profiles` WRITE;
/*!40000 ALTER TABLE `employee_profiles` DISABLE KEYS */;
INSERT INTO `employee_profiles` VALUES (1,1,'ING.','profesor.jpg','1'),(2,2,'ING.','profe2.jpg','2'),(25,62,'LIC.','coordi2.jpg','25'),(26,63,'LIC.','cordi1.jpg','26'),(27,67,'ING.','coordi3.jpg','27'),(29,69,'LIC.','profesora.png','29'),(33,95,'ING','direct.jpeg','33');
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
INSERT INTO `exams` VALUES (1,9,38,1,'2015-03-03','08:10:00','09:00:00','2015-08-22 19:05:11','2015-08-22 19:05:11'),(2,9,38,2,'2015-04-10','10:00:00','11:10:00','2015-08-22 19:05:11','2015-08-22 19:05:11'),(3,9,38,3,'2015-05-19','14:10:00','15:00:00','2015-08-22 19:05:11','2015-08-22 19:05:11'),(4,9,38,4,'2015-06-16','09:00:00','13:10:00','2015-08-22 19:05:11','2015-08-22 19:05:11'),(5,9,38,5,'2015-07-15',NULL,NULL,'2015-08-22 19:05:11','2015-08-22 19:05:11');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goals`
--

LOCK TABLES `goals` WRITE;
/*!40000 ALTER TABLE `goals` DISABLE KEYS */;
INSERT INTO `goals` VALUES (1,'EXAMEN',1,12,38,1,30,'2015-08-24 14:17:29','2015-08-24 14:17:29'),(2,'TAREAS',1,12,38,1,30,'2015-08-24 14:17:29','2015-08-24 14:17:29'),(3,'ASISTENCIA',1,12,38,1,10,'2015-08-24 14:17:29','2015-08-24 14:17:29'),(4,'PARTICIPACIONES',1,12,38,1,20,'2015-08-24 14:17:29','2015-08-24 14:17:29'),(5,'PRACTICAS',1,12,38,1,10,'2015-08-24 14:17:29','2015-08-24 14:17:29'),(6,'EXAMEN',1,12,38,2,50,'2015-08-24 16:00:08','2015-08-24 16:00:08'),(7,'ASISTENCIAS',1,12,38,2,10,'2015-08-24 16:00:08','2015-08-24 16:00:08'),(8,'PRACTICAS',1,12,38,2,40,'2015-08-24 16:00:08','2015-08-24 16:00:08');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,62,'Examen para imprimir de la materia: MicrobiologÃ­a de Alimentos','Nuevo examen disponible para descarga de la materia MicrobiologÃ­a de Alimentos, Periodo: Primer parcial del grupo:1 A','2015-08-23 20:58:34',1),(2,1,62,'Planeacion de la materia: MicrobiologÃ­a de Alimentosd el grupo: 1 A','planeacion semana 1','2015-08-23 21:30:03',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obtainedgoals`
--

LOCK TABLES `obtainedgoals` WRITE;
/*!40000 ALTER TABLE `obtainedgoals` DISABLE KEYS */;
INSERT INTO `obtainedgoals` VALUES (1,1,18,20,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(2,2,18,8,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(3,3,18,2,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(4,4,18,2,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(5,5,18,10,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(6,1,65,30,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(7,2,65,30,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(8,3,65,1,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(9,4,65,20,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(10,5,65,10,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(11,1,73,30,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(12,2,73,22,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(13,3,73,10,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(14,4,73,20,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(15,5,73,1,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(16,1,78,30,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(17,2,78,12,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(18,3,78,10,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(19,4,78,20,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(20,5,78,9,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(21,1,90,9,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(22,2,90,2,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(23,3,90,10,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(24,4,90,3,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(25,5,90,8,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(26,1,91,1,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(27,2,91,2,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(28,3,91,2,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(29,4,91,2,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(30,5,91,5,'2015-08-24 15:30:58','2015-08-24 15:30:58'),(31,6,18,30,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(32,7,18,10,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(33,8,18,39,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(34,6,65,40,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(35,7,65,9,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(36,8,65,40,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(37,6,73,40,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(38,7,73,8,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(39,8,73,20,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(40,6,78,50,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(41,7,78,8,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(42,8,78,20,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(43,6,90,40,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(44,7,90,9,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(45,8,90,30,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(46,6,91,30,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(47,7,91,10,'2015-08-24 16:00:48','2015-08-24 16:00:48'),(48,8,91,40,'2015-08-24 16:00:48','2015-08-24 16:00:48');
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
  `grupo_id` int(11) NOT NULL,
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
INSERT INTO `plannings` VALUES (1,62,1,19,12,38,'planeacion semana 1','icomoon.zip','1','2015-08-23 16:30:03','2015-08-23 16:30:03');
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
INSERT INTO `student_profiles` VALUES (5,7,11,5,'ISC2015001',1),(12,16,11,5,'LT20150088',1),(14,18,19,38,'LT20150098',1),(56,65,19,38,'LT20150093',1),(57,66,19,41,'LT002120AD',8),(58,70,11,5,'ICS2015001',1),(59,72,11,5,'ISC2015432',1),(60,73,19,38,'ISC2015009',1),(65,78,19,38,'LT12300ASD',1),(66,79,11,5,'ISC1240093',1),(73,89,11,5,'ISC201500S',1),(74,90,19,38,'LT2015ALX0',1),(75,91,19,38,'LT2015AX92',1),(77,93,11,5,'ISC2015002',1),(78,94,19,42,'LT2015001V',1);
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
INSERT INTO `teachercourses` VALUES (1,12,1,38,'2015-08-21 19:27:19','2015-08-21 21:28:28'),(2,12,69,42,'2015-08-22 00:11:15','2015-08-22 00:11:15'),(3,9,2,38,'2015-08-22 17:35:34','2015-08-22 17:35:34');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uploadtests`
--

LOCK TABLES `uploadtests` WRITE;
/*!40000 ALTER TABLE `uploadtests` DISABLE KEYS */;
INSERT INTO `uploadtests` VALUES (1,62,1,12,38,1,'MySQLypostgresql.doc','1','2015-08-23 20:58:34','2015-08-23 20:58:34');
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
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'URIEL','CARDOSO','ALCANTAR','urielcardozo99@gmail.com','$2a$10$iR3ip1M7ySWaKh3WPfv5EeYGrmMBaY2/Y5geudb6JYRrHPtLUe0R6',7),(2,'GERMAN','MARTINEZ','SOLIS','gms.linux@gmail.com','$2a$10$pWCyzeuPBvLBP6d3Gb7NgednpJlCxM.uu53/w0hpW3Hjzq/9EhqPy',7),(7,'JUAN','XXXXXX','XXXSFG','xxx@dd.com','ssssssds',8),(16,'JUAN','RAMIREZ','CASTRO','jcs@hmail.com','sasdfdf4',8),(18,'KING','JAVAN','GAONA','kingleegaona@hotmail.com','$2a$10$bEPcETL.ZLqejiW6MtUXmeKVqKF65.D5c5SpGqb7yGij36JN1TTQG',8),(62,'JUAQUIN','AVALOS','ALCANTAR','juaquinalcantar@gmail.com','$2a$10$TlgbC.M5N2vycsy6Ujt4LOC8LE3plNAhvYVyWbu5tVKJkLrwOyzHK',6),(63,'RICARDO','OLIVARES','RAMIREZ','ricardo@hotmail.com','$2a$10$KCcJoWyK2I2SVAtKQJHHgenrWbxZ.cEWOVW7kkB2BafG6IfH7AM7e',6),(65,'JUAN CARLOS','UZTATTO','SJFHCC','jc_34.09@gfs.com','contraseÃ±a',8),(66,'ANA','RODRIGUEZ','VILLANUEVA','ana34_3@hotmail.com','ana09234',8),(67,'JUAN','ALVARES','RODRIGUEZ','juanrodriguez@gmail.com','$2a$10$doreYkDVSaYu1.FYkOGJYux15MEPK3OqKXbarEuK3HNCWzAUu9X8u',6),(69,'FLOR','DIAS','RAMIREZ','flor123@hotmail.com','$2a$10$9UTPf9lMlSViov4/.Uw02Ol3XYHSZ5aSwXay6FNL1XzBonPHWATbq',7),(70,'JUANITO','DIAS','RODRIGUEZ','juan342@gmail.com','contraseÃ±a',8),(72,'ALAN','MORA','PEREZ','alan_304@hotmail.com','contraseÃ±a123',8),(73,'JUAN','PEDRO','ALCANTAR','juan.rdzQ@outlook.com','ssssssshshshshsh',8),(78,'OSCAR','REYES','SAMBRANO','oscar_smb34@hotmail.com','@LTORS201546',8),(79,'JUAN','ARNULFO','PERES','jn23_sdf@gmail.com','$ISCJAP201565',8),(89,'JUAN','ALCANTAR','RAMIREZ','jcns@gmai.com','$ISCJAR201510',8),(90,'ALEJANDRA','REYES','BETANCOUR','alejxD23_btn@hotmail.com','$2a$10$eMfOEADiruxqUt6PAgZs0.s8i4x4/h9XK',8),(91,'AXEL','RUIZ','ALCANTAR','heblackparade@hotmail.com','$2a$10$pq8Lz/ZmJ5XRD2WMpgi9CeEPbeH/G8U/T',8),(93,'ANDRES','BAHENA','RODRIGUEZ','german.mtz.solis@gmail.com','$2a$10$n.QySR9YK1xPFsqYwlp9oeAYyV32GdZ4GL9bL6yeSGZh0FBuG.H7S',8),(94,'JUANITO','RAMIREZ','ABAD','abdrmz12@gmail.com','$2a$10$aMWF/pFngrQtr3VlMfHigevDrGKyID2T3ARg/GrI7Bp2cyCXQIQBa',8),(95,'ALEJANDRO','SANCHEZ','SALDAÃ‘A','alejandrosh@gmail.com','$2a$10$qfAxf7PeiVYJQzvQeOaFceH1VtPHiQj265YtwOh.YZcrNcMziN6lC',5);
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usrcareers`
--

LOCK TABLES `usrcareers` WRITE;
/*!40000 ALTER TABLE `usrcareers` DISABLE KEYS */;
INSERT INTO `usrcareers` VALUES (3,62,13),(5,62,14),(6,62,16),(7,62,19),(8,63,12),(9,63,18),(10,63,20),(12,63,17),(13,63,11),(14,67,15);
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

-- Dump completed on 2015-08-24 20:48:23
