-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sistema
-- ------------------------------------------------------
-- Server version	5.5.41-0+wheezy1

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
  `module_course_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_assist` date NOT NULL,
  `note` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assists`
--

LOCK TABLES `assists` WRITE;
/*!40000 ALTER TABLE `assists` DISABLE KEYS */;
INSERT INTO `assists` VALUES (1,18,9,38,2,'2015-04-20','llego borracho'),(2,65,9,38,1,'2015-04-20','justificante medico');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_modules`
--

LOCK TABLES `course_modules` WRITE;
/*!40000 ALTER TABLE `course_modules` DISABLE KEYS */;
INSERT INTO `course_modules` VALUES (1,19,9,'viernes','13:00:00','14:00:00'),(2,19,9,'viernes','14:00:00','15:00:00'),(3,19,12,'miercoles','07:01:00','08:01:00'),(4,19,12,'lunes','13:00:00','16:00:00'),(5,11,18,'lunes','11:20:00','13:20:00'),(6,11,18,'martes','09:00:00','11:00:00'),(7,11,18,'lunes','14:01:00','15:00:00'),(8,11,18,'jueves','15:03:00','16:03:00'),(9,19,10,'lunes','01:00:00','02:00:00'),(10,19,11,'lunes','10:00:00','11:00:00'),(11,19,11,'martes','13:00:00','14:02:00'),(12,19,16,'viernes','14:18:00','13:02:00'),(13,19,16,'viernes','18:01:00','15:01:00'),(14,19,13,'lunes','09:00:00','10:00:00'),(15,19,13,'lunes','12:00:00','01:00:00'),(16,19,16,'viernes','18:02:00','17:03:00'),(17,19,15,'viernes','15:02:00','16:02:00'),(18,19,15,'viernes','16:01:00','03:01:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (9,'InglÃ©s BÃ¡sico I',1,19,2),(10,'TeorÃ­a y GeografÃ­a TurÃ­stic',1,19,1),(11,'IntroducciÃ³n a la GastronomÃ­',1,19,2),(12,'MicrobiologÃ­a de Alimentos',1,19,1),(13,'Fundamentos de AdministraciÃ³n',1,19,2),(14,'Fundamentos de Contabilidad',1,19,2),(15,'ComputaciÃ³n I',1,19,1),(16,'Desarrollo Humano y Ã‰tica',2,19,1),(17,'InglÃ©s BÃ¡sico II',2,19,2),(18,'paradigmas de programacion',2,11,2);
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
  `picture` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee_profiles`
--

LOCK TABLES `employee_profiles` WRITE;
/*!40000 ALTER TABLE `employee_profiles` DISABLE KEYS */;
INSERT INTO `employee_profiles` VALUES (1,1,'ING.','/img'),(2,2,'ING.','/img'),(25,62,'LIC.','/img'),(26,63,'LIC.','/img');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exams`
--

LOCK TABLES `exams` WRITE;
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
INSERT INTO `exams` VALUES (1,16,1,'2015-04-01','14:35:00','14:35:00'),(2,16,2,'2015-04-24','14:35:00','14:35:00'),(3,16,3,'2015-04-24','14:35:00','14:35:00'),(4,16,4,'2015-05-30','14:35:00','14:35:00'),(5,16,5,'2015-04-29',NULL,NULL),(6,17,1,'2015-04-30','14:35:00','14:35:00'),(7,17,2,'2015-04-29','14:35:00','14:35:00'),(8,17,3,'2015-04-24','14:35:00','14:35:00'),(9,17,4,'2015-04-26','14:35:00','14:35:00'),(10,17,5,'2015-04-27',NULL,NULL);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goals`
--

LOCK TABLES `goals` WRITE;
/*!40000 ALTER TABLE `goals` DISABLE KEYS */;
INSERT INTO `goals` VALUES (1,'Asistencias',9,11,1,10),(2,'Tareas',9,11,1,40),(3,'Participaciones',9,11,1,10),(4,'examen',9,11,1,40),(5,'Asistencias',9,11,2,10),(6,'Examen',9,11,2,30),(7,'Practicas',9,11,2,20),(8,'Tareas',9,11,2,40),(9,'Asistencia',1,10,1,10),(10,'Tareas',1,10,1,30),(11,'Examen',1,10,1,40),(12,'Investigacion',1,10,1,20),(13,'Asistencias',1,10,2,10),(14,'Proyecto',1,10,2,50),(15,'Tareas',1,10,2,40),(16,'proyeto final',1,10,3,100);
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` VALUES (5,1,'A',11),(6,2,'A',13),(7,2,'B',11),(8,5,'A',11),(9,4,'A',11),(10,3,'A',11),(11,6,'A',11),(12,7,'A',11),(13,8,'A',11),(14,9,'A',11),(15,10,'A',11),(16,1,'A',13),(20,3,'A',13),(21,4,'A',13),(22,5,'A',13),(23,6,'A',13),(24,7,'A',13),(25,8,'A',13),(26,9,'A',13),(27,10,'A',13),(28,1,'A',12),(29,2,'A',12),(30,3,'A',12),(31,4,'A',12),(32,5,'A',12),(33,6,'A',12),(34,7,'A',12),(35,8,'A',12),(36,9,'A',12),(37,10,'A',12),(38,1,'A',19),(39,2,'A',19),(40,3,'A',19);
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obtainedgoals`
--

LOCK TABLES `obtainedgoals` WRITE;
/*!40000 ALTER TABLE `obtainedgoals` DISABLE KEYS */;
INSERT INTO `obtainedgoals` VALUES (1,9,17,10),(2,10,17,7),(3,11,17,8),(4,12,17,9),(5,9,18,10),(6,10,18,6),(7,11,18,9),(8,12,18,10),(9,13,17,10),(10,14,17,10),(11,15,17,10),(12,13,18,9),(13,14,18,9),(14,15,18,9),(15,16,17,10),(16,16,18,10),(17,1,18,30),(18,2,18,20),(19,3,18,10),(20,4,18,10);
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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_profiles`
--

LOCK TABLES `student_profiles` WRITE;
/*!40000 ALTER TABLE `student_profiles` DISABLE KEYS */;
INSERT INTO `student_profiles` VALUES (2,4,11,5,'ISC2010999',1),(5,7,11,5,'ISC2015001',1),(12,16,11,5,'LT20150088',1),(14,18,19,38,'LT20150098',1),(56,65,19,38,'LT20150093',1);
/*!40000 ALTER TABLE `student_profiles` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Uriel','Cardoso','Alcantar','mmmasas@gmail.com','kljlkj',7),(2,'German','MARTINEZ','SOLIS','gms.linux@gmail.com','QWQWQWQW',7),(4,'GERMAN','MARTINEZ','SOLIS','asdas22@gmail.com','sdsdsd',8),(7,'JUAN','XXXXXX','XXXSFG','xxx@dd.com','ssssssds',8),(16,'JUAN','RAMIREZ','CASTRO','jcs@hmail.com','sasdfdf4',8),(18,'KINK','JAVAN','GAONA','kinghentai069@xxx.com','23swdcdfdf',8),(62,'Juaquin','avalos','alcantar','jqalvc@outlook.com','weeddffgghh',6),(63,'RICARDO','DFHHJK','RAMIREZ','rfc@hotmail.com','asasasasasa',6),(65,'JUAN CARLOS','UZTATTO','SJFHCC','jc_34.09@gfs.com','contraseÃ±a',8);
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usrcareers`
--

LOCK TABLES `usrcareers` WRITE;
/*!40000 ALTER TABLE `usrcareers` DISABLE KEYS */;
INSERT INTO `usrcareers` VALUES (5,63,14),(8,63,17),(9,63,18),(10,63,19),(11,63,20),(13,62,13),(14,62,15),(15,63,12);
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

-- Dump completed on 2015-04-20 17:45:58
