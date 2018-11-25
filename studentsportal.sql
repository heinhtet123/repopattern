-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: studentsportal
-- ------------------------------------------------------
-- Server version	5.5.54-0ubuntu0.14.04.1

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
-- Table structure for table `attendences`
--

DROP TABLE IF EXISTS `attendences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `attendence_date` date NOT NULL,
  `total_presents` int(11) NOT NULL,
  `attendence_percent` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=437 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendences`
--

LOCK TABLES `attendences` WRITE;
/*!40000 ALTER TABLE `attendences` DISABLE KEYS */;
INSERT INTO `attendences` VALUES (373,9,1,'2016-11-12',0,'',0,'2017-02-12 20:13:45','2017-02-13 05:21:59'),(374,9,1,'2016-11-13',0,'',1,'2017-02-12 20:13:45','2017-02-14 02:11:06'),(375,9,1,'2016-11-19',0,'',0,'2017-02-12 20:13:45','2017-03-06 13:27:24'),(376,9,1,'2016-11-20',0,'',0,'2017-02-12 20:13:45','2017-02-14 02:04:10'),(377,9,1,'2016-11-26',0,'',1,'2017-02-12 20:13:45','2017-02-14 02:04:04'),(378,9,1,'2016-11-27',0,'',0,'2017-02-12 20:13:45','2017-02-12 20:13:45'),(379,9,1,'2016-12-03',0,'',0,'2017-02-12 20:13:45','2017-02-12 20:13:45'),(380,9,1,'2016-12-04',0,'',0,'2017-02-12 20:13:45','2017-02-12 20:13:45'),(381,9,1,'2016-12-10',0,'',1,'2017-02-12 20:13:45','2017-02-13 05:22:19'),(382,9,1,'2016-12-11',0,'',1,'2017-02-12 20:13:45','2017-02-13 05:22:16'),(383,9,1,'2016-12-17',0,'',0,'2017-02-12 20:13:45','2017-02-12 20:13:45'),(384,9,1,'2016-12-18',0,'',0,'2017-02-12 20:13:45','2017-02-12 20:13:45'),(385,9,1,'2016-12-24',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(386,9,1,'2016-12-25',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(387,9,1,'2016-12-31',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(388,9,1,'2017-01-01',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(389,9,1,'2017-01-07',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(390,9,1,'2017-01-08',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(391,9,1,'2017-01-14',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(392,9,1,'2017-01-15',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(393,9,1,'2017-01-21',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(394,9,1,'2017-01-22',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(395,9,1,'2017-01-28',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(396,9,1,'2017-01-29',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(397,9,1,'2017-02-04',0,'',1,'2017-02-12 20:13:46','2017-02-13 01:19:03'),(398,9,1,'2017-02-05',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(399,9,1,'2017-02-11',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(400,9,1,'2017-02-12',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(401,9,1,'2017-02-18',0,'',0,'2017-02-12 20:13:46','2017-02-12 20:13:46'),(402,9,1,'2017-02-19',0,'',0,'2017-02-12 20:13:47','2017-02-12 20:13:47'),(403,9,1,'2017-02-25',0,'',0,'2017-02-12 20:13:47','2017-02-12 20:13:47'),(404,9,1,'2017-02-26',0,'',0,'2017-02-12 20:13:47','2017-02-12 20:13:47'),(405,13,1,'2016-11-12',0,'',1,'2017-02-12 20:15:08','2017-02-14 02:04:26'),(406,13,1,'2016-11-13',0,'',0,'2017-02-12 20:15:09','2017-02-14 02:04:17'),(407,13,1,'2016-11-19',0,'',0,'2017-02-12 20:15:09','2017-02-14 02:04:13'),(408,13,1,'2016-11-20',0,'',0,'2017-02-12 20:15:09','2017-02-14 02:04:07'),(409,13,1,'2016-11-26',0,'',1,'2017-02-12 20:15:09','2017-02-14 02:04:06'),(410,13,1,'2016-11-27',0,'',0,'2017-02-12 20:15:09','2017-02-14 02:03:43'),(411,13,1,'2016-12-03',0,'',0,'2017-02-12 20:15:09','2017-02-12 20:15:09'),(412,13,1,'2016-12-04',0,'',0,'2017-02-12 20:15:09','2017-02-12 20:15:09'),(413,13,1,'2016-12-10',0,'',0,'2017-02-12 20:15:09','2017-02-12 20:15:09'),(414,13,1,'2016-12-11',0,'',1,'2017-02-12 20:15:09','2017-02-13 05:22:17'),(415,13,1,'2016-12-17',0,'',0,'2017-02-12 20:15:09','2017-02-12 20:15:09'),(416,13,1,'2016-12-18',0,'',0,'2017-02-12 20:15:09','2017-02-12 20:15:09'),(417,13,1,'2016-12-24',0,'',0,'2017-02-12 20:15:09','2017-02-12 20:15:09'),(418,13,1,'2016-12-25',0,'',0,'2017-02-12 20:15:09','2017-02-12 20:15:09'),(419,13,1,'2016-12-31',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(420,13,1,'2017-01-01',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(421,13,1,'2017-01-07',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(422,13,1,'2017-01-08',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(423,13,1,'2017-01-14',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(424,13,1,'2017-01-15',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(425,13,1,'2017-01-21',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(426,13,1,'2017-01-22',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(427,13,1,'2017-01-28',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(428,13,1,'2017-01-29',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(429,13,1,'2017-02-04',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(430,13,1,'2017-02-05',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(431,13,1,'2017-02-11',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(432,13,1,'2017-02-12',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(433,13,1,'2017-02-18',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(434,13,1,'2017-02-19',0,'',0,'2017-02-12 20:15:10','2017-02-12 20:15:10'),(435,13,1,'2017-02-25',0,'',0,'2017-02-12 20:15:11','2017-02-12 20:15:11'),(436,13,1,'2017-02-26',0,'',0,'2017-02-12 20:15:11','2017-02-12 20:15:11');
/*!40000 ALTER TABLE `attendences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batch_enrolledstudents`
--

DROP TABLE IF EXISTS `batch_enrolledstudents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batch_enrolledstudents` (
  `enrolledstudents_id` int(10) unsigned NOT NULL,
  `batch_id` int(10) unsigned NOT NULL,
  `student_bill` int(11) NOT NULL,
  `numbers_of_payment` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batch_enrolledstudents`
--

LOCK TABLES `batch_enrolledstudents` WRITE;
/*!40000 ALTER TABLE `batch_enrolledstudents` DISABLE KEYS */;
INSERT INTO `batch_enrolledstudents` VALUES (9,1,200000,0,2),(13,1,200000,0,2),(9,2,0,0,0),(9,12,200000,0,2),(4,1,200000,2,2),(14,1,200000,2,2),(14,12,200000,2,1);
/*!40000 ALTER TABLE `batch_enrolledstudents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `batch_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` int(11) NOT NULL,
  `start_month` date NOT NULL,
  `end_month` date NOT NULL,
  `total_months` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `type` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `period` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  `enrollment_flag` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batches`
--

LOCK TABLES `batches` WRITE;
/*!40000 ALTER TABLE `batches` DISABLE KEYS */;
INSERT INTO `batches` VALUES (1,'wpa1',1,'2016-11-10','2017-02-14',3,200000,'Weekend','',0,1,'2016-11-05 04:30:00','2017-01-03 02:34:51'),(2,'a1',2,'2016-12-21','2017-02-16',2,200000,'Weekend','',0,1,'2016-12-16 22:44:55','2016-12-16 22:44:55'),(3,'a2',2,'0000-00-00','0000-00-00',2,200000,'Weekend','',0,1,'2016-12-16 23:01:15','2016-12-16 23:01:15'),(12,'wpa2',1,'2016-12-28','2017-02-14',2,200000,'Weekend','',0,1,'2016-12-28 01:38:21','2017-01-21 05:34:34'),(13,'wpa3',1,'2017-01-04','2017-01-12',0,3,'Weekend','',0,1,'2017-01-03 22:33:13','2017-01-31 03:10:41'),(14,'wpa12',1,'2017-01-31','2017-02-08',1,200000,'Weekend','',0,1,'2017-01-31 02:00:55','2017-01-31 03:10:40'),(15,'wpa20',1,'2017-01-31','2017-03-15',2,200000,'Weekend','1:00 - 4:00 pm',0,1,'2017-01-31 02:22:32','2017-02-04 00:28:21');
/*!40000 ALTER TABLE `batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,1,1,1,'',0,'2017-02-15 17:30:00','2017-02-16 17:30:00'),(2,9,1,1,'',0,'2017-02-15 17:30:00','2017-02-15 17:30:00');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'web professional advanced',0,'2016-11-05 04:27:57','2016-11-05 04:27:57'),(2,'android',1000,'2016-11-23 17:30:00','2016-11-24 17:30:00');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'hein',1,1,'2017-02-14 15:01:43','2017-02-14 15:01:43');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_06_25_070936_create_students_table',1),('2016_06_25_071004_create_batches_table',1),('2016_06_25_071145_create_courses_table',1),('2016_06_25_081716_create_blogs_table',1),('2016_06_25_085718_create_attendences_table',1),('2016_06_25_090726_create_project_groups_table',1),('2016_06_25_092027_create_student_project_table',1),('2016_10_15_133135_create_roles_table',1),('2016_12_27_082307_create_enrolled_students_table',2),('2016_12_27_105549_create_batches_users_table',3),('2017_01_07_080852_create_batch_enrolledstudents_table',4),('2017_02_14_021601_create_gallery_table',5),('2017_02_14_022537_create_groups_table',6),('2017_02_14_045213_create_user_group_table',7),('2017_02_21_091415_create_permissions_table',8),('2017_02_21_112723_create_rolepermissions_table',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_groups`
--

DROP TABLE IF EXISTS `project_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `batch_id` int(11) NOT NULL,
  `project_name` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_groups`
--

LOCK TABLES `project_groups` WRITE;
/*!40000 ALTER TABLE `project_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=371 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
INSERT INTO `role_permissions` VALUES (311,1,'attendence','index',1,'2017-02-23 20:24:31','2017-02-27 00:33:51'),(312,1,'attendence','create',1,'2017-02-23 20:24:31','2017-02-23 20:34:32'),(313,1,'attendence','update',1,'2017-02-23 20:24:31','2017-02-24 19:26:50'),(314,1,'attendence','userdata',1,'2017-02-23 20:24:31','2017-02-24 19:26:51'),(315,1,'attendence','timetable_date',1,'2017-02-23 20:24:31','2017-02-24 19:27:12'),(316,1,'attendence','month',1,'2017-02-23 20:24:31','2017-03-06 13:24:05'),(317,1,'attendence','indexdata',1,'2017-02-23 20:24:31','2017-03-08 22:40:24'),(318,2,'attendence','index',0,'2017-02-23 20:24:32','2017-02-23 20:24:32'),(319,2,'attendence','create',0,'2017-02-23 20:24:32','2017-02-23 20:24:32'),(320,2,'attendence','update',1,'2017-02-23 20:24:32','2017-02-23 20:34:34'),(321,2,'attendence','userdata',0,'2017-02-23 20:24:32','2017-02-23 20:24:32'),(322,2,'attendence','timetable_date',1,'2017-02-23 20:24:32','2017-02-24 00:53:07'),(323,2,'attendence','month',1,'2017-02-23 20:24:32','2017-02-24 00:53:03'),(324,2,'attendence','indexdata',1,'2017-02-23 20:24:32','2017-02-24 00:53:02'),(325,1,'course','index',1,'2017-02-23 20:34:49','2017-02-24 00:51:25'),(326,2,'course','index',0,'2017-02-23 20:34:50','2017-02-23 20:34:50'),(327,1,'roles','index',1,'2017-02-23 21:55:35','2017-02-23 21:55:39'),(328,2,'roles','index',0,'2017-02-23 21:55:36','2017-02-23 21:55:36'),(329,1,'roles','indexdata',1,'2017-02-23 22:39:38','2017-02-23 22:39:41'),(330,2,'roles','indexdata',0,'2017-02-23 22:39:38','2017-02-23 22:39:38'),(331,1,'roles','getRoles',1,'2017-02-24 00:45:15','2017-02-24 00:46:29'),(332,1,'roles','getMethodsPermission',1,'2017-02-24 00:45:15','2017-02-24 00:46:31'),(333,1,'roles','getMethods',1,'2017-02-24 00:45:15','2017-02-24 00:46:33'),(334,2,'roles','getRoles',0,'2017-02-24 00:45:15','2017-02-24 00:45:15'),(335,2,'roles','getMethodsPermission',0,'2017-02-24 00:45:15','2017-02-24 00:45:15'),(336,2,'roles','getMethods',0,'2017-02-24 00:45:15','2017-02-24 00:45:15'),(337,1,'enrolledstudent','index',1,'2017-02-24 00:45:27','2017-02-24 19:42:01'),(338,2,'enrolledstudent','index',0,'2017-02-24 00:45:27','2017-02-24 00:45:27'),(339,1,'roles','changeMethodPermission',1,'2017-02-24 00:50:41','2017-02-24 00:50:41'),(340,2,'roles','changeMethodPermission',0,'2017-02-24 00:50:41','2017-02-24 00:50:41'),(341,1,'batch','index',1,'2017-02-24 19:41:51','2017-02-24 19:41:55'),(342,2,'batch','index',0,'2017-02-24 19:41:52','2017-02-24 19:41:52'),(343,1,'blog','index',1,'2017-02-24 19:42:04','2017-02-24 19:42:08'),(344,2,'blog','index',0,'2017-02-24 19:42:04','2017-02-24 19:42:04'),(345,1,'backend','index',1,'2017-02-26 21:27:46','2017-03-03 23:01:57'),(346,2,'backend','index',1,'2017-02-26 21:27:47','2017-03-09 01:41:36'),(347,1,'blog','create',1,'2017-02-26 21:57:54','2017-02-26 21:57:57'),(348,2,'blog','create',0,'2017-02-26 21:57:54','2017-02-26 21:57:54'),(349,1,'enrolledstudent','indexdata',1,'2017-03-06 13:20:24','2017-03-06 13:20:28'),(350,1,'enrolledstudent','batch',1,'2017-03-06 13:20:25','2017-03-06 13:20:29'),(351,1,'enrolledstudent','courses',1,'2017-03-06 13:20:25','2017-03-06 13:20:31'),(352,1,'enrolledstudent','allbatches',1,'2017-03-06 13:20:25','2017-03-06 13:20:32'),(353,1,'enrolledstudent','updatepayment',1,'2017-03-06 13:20:25','2017-03-06 13:20:33'),(354,2,'enrolledstudent','indexdata',0,'2017-03-06 13:20:25','2017-03-06 13:20:25'),(355,2,'enrolledstudent','batch',0,'2017-03-06 13:20:25','2017-03-06 13:20:25'),(356,2,'enrolledstudent','courses',0,'2017-03-06 13:20:25','2017-03-06 13:20:25'),(357,2,'enrolledstudent','allbatches',0,'2017-03-06 13:20:25','2017-03-06 13:20:25'),(358,2,'enrolledstudent','updatepayment',0,'2017-03-06 13:20:25','2017-03-06 13:20:25'),(359,1,'group','index',1,'2017-03-06 13:57:50','2017-03-06 13:57:54'),(360,2,'group','index',1,'2017-03-06 13:57:51','2017-03-09 01:44:34'),(361,1,'group','getBatch',1,'2017-03-08 02:31:24','2017-03-08 02:31:28'),(362,2,'group','getBatch',1,'2017-03-08 02:31:24','2017-03-09 21:43:59'),(363,1,'course','select',1,'2017-03-09 01:57:20','2017-03-09 01:57:24'),(364,2,'course','select',0,'2017-03-09 01:57:20','2017-03-09 01:57:20'),(365,1,'batch','indexdata',1,'2017-03-09 22:52:32','2017-03-09 22:52:34'),(366,2,'batch','indexdata',0,'2017-03-09 22:52:32','2017-03-09 22:52:32'),(367,1,'group','getGroups',1,'2017-03-10 12:26:14','2017-03-10 12:26:17'),(368,2,'group','getGroups',1,'2017-03-10 12:26:14','2017-03-10 12:26:19'),(369,1,'group','create',1,'2017-03-11 08:41:01','2017-03-11 08:41:04'),(370,2,'group','create',1,'2017-03-11 08:41:01','2017-03-11 08:41:05');
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','2016-11-04 17:30:00','2016-11-04 17:30:00'),(2,'student','2016-11-04 17:30:00','2016-11-04 17:30:00');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_project`
--

DROP TABLE IF EXISTS `student_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_project` (
  `student_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `student_project_student_id_index` (`student_id`),
  KEY `student_project_project_id_index` (`project_id`),
  CONSTRAINT `student_project_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `student_project_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_project`
--

LOCK TABLES `student_project` WRITE;
/*!40000 ALTER TABLE `student_project` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activate_flag` tinyint(1) NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `varification_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'hein','htethtet@gmail.com','$2y$10$eba8r9uyiLq42wjwAbnadeSezp0qRp0BeBTjYUv1SfK611rg5nu9O','2323232','',0,'','',0,0,'2017-02-12 23:57:03','2017-02-12 23:57:20');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` VALUES (1,1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `user_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'hein','hein@gmail.com',0,'$2y$10$uOmViJsc/X7u1iI6dfl5KOzc2IsdWDtXVBjRnIcfosyqG5xRZ7LFO','',1,0,NULL,'2016-11-05 04:16:44','2016-11-05 04:16:44'),(9,'htet','htethtet@gmail.com',0,'$2y$10$DIVkPrsiDP0YQUT1MUJuquyeMvKcLFmMDoCftSRK/azvZCMvvWasa','',2,0,NULL,'2017-01-19 02:17:33','2017-01-24 05:43:44'),(13,'sth','sthomething@gmail.com',9990,'$2y$10$QdipVwEMerf9UnntkHRvL.W4TvuOeO3uumECwIQhzBowqJWoOYgRG','',2,0,NULL,'2017-01-19 02:28:58','2017-01-20 20:47:58'),(14,'htun','htun@gmail.com',0,'$2y$10$D.06hqCWjD22OaKXRu71RenE5WmNdEwIwRzgiJkeN0qnss0SJW0Xe','',2,0,NULL,'2017-03-09 01:42:17','2017-03-09 01:42:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-14 18:02:44
