-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: resume_storage
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `educational_institutions`
--

DROP TABLE IF EXISTS `educational_institutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `educational_institutions` (
  `id` varchar(36) NOT NULL,
  `person_id` varchar(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `location_id` varchar(36) DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `field_of_study` varchar(255) DEFAULT NULL,
  `awarded_degree` varchar(100) DEFAULT NULL,
  `form_of_education` varchar(15) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `educational_institutions_id_uindex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educational_institutions`
--

LOCK TABLES `educational_institutions` WRITE;
/*!40000 ALTER TABLE `educational_institutions` DISABLE KEYS */;
INSERT INTO `educational_institutions` VALUES ('5cf69bee-93ee-470c-b066-a043aae6caf2','5b8b1897-da52-40ab-bfe0-300913abc891','Riga Technical University','6866cbc5-3cb0-464a-9576-287daf5e7c58','Faculty of Engineering Economics and Management','Customs and tax administration','Bachelor studies','Part time','2014-09-01','2017-03-01','Discontinued'),('7365790c-a9e6-4784-9ea6-04f6dd5302eb','5b8b1897-da52-40ab-bfe0-300913abc891','Transport and Telecommunication Institute','6866cbc5-3cb0-464a-9576-287daf5e7c58','Faculty of Computer Science and Telecommunications','Computer science','Bachelor studies','Part time','2018-09-01','Currently','Studying'),('a682e6c5-6d2c-4199-9eed-60b8120eb2ac','c82eaea7-827b-42c2-b5c8-ed072f4047fb','Art Academy of Latvia','6866cbc5-3cb0-464a-9576-287daf5e7c58','Faculty of Visual Plastic Arts','Sculpture department','Bachelor studies','Full time','2014-09-01','2018-08-01','Completed');
/*!40000 ALTER TABLE `educational_institutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locations` (
  `id` varchar(36) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locations_id_uindex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES ('292983e5-d934-4e4f-b04a-f5543a9226a2','Latvia',''),('6866cbc5-3cb0-464a-9576-287daf5e7c58','Latvia','Riga');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persons` (
  `id` varchar(36) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `location_id` varchar(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persons_id_uindex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persons`
--

LOCK TABLES `persons` WRITE;
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` VALUES ('5b8b1897-da52-40ab-bfe0-300913abc891','Juris','Petrovs','male','+371 26261190','jura-petrov@inbox.lv','6866cbc5-3cb0-464a-9576-287daf5e7c58','2020-11-30 19:46:34','2020-11-30 19:46:34'),('c82eaea7-827b-42c2-b5c8-ed072f4047fb','Baiba','Broka','female','','baiba@example.lv','292983e5-d934-4e4f-b04a-f5543a9226a2','2020-11-30 19:55:40','2020-11-30 19:55:40');
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skills` (
  `id` varchar(36) NOT NULL,
  `workplace_id` varchar(36) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `achievement` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `skills_id_uindex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES ('14717f95-1162-4cb0-aa1f-9f35ceb3bfa3','6c21b3e6-4265-45ef-9108-aace3f3c49f0','Problem-solving','Soft skill','I improved the service of attention to the client over;'),('732bd578-5c2c-41b0-b5c9-5e5ad36d7668','e66af409-8bd9-4754-a8c8-3c704112924e','Back-end development','Hard skill','Come up with a new idea that improved things;\r\nWorked on special projects;');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workplaces`
--

DROP TABLE IF EXISTS `workplaces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workplaces` (
  `id` varchar(36) NOT NULL,
  `person_id` varchar(36) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `location_id` varchar(36) DEFAULT NULL,
  `position_held` varchar(255) DEFAULT NULL,
  `workload` varchar(255) DEFAULT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `end_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `workplaces_id_uindex` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workplaces`
--

LOCK TABLES `workplaces` WRITE;
/*!40000 ALTER TABLE `workplaces` DISABLE KEYS */;
INSERT INTO `workplaces` VALUES ('3c0f6551-5012-41d6-a392-202a163a3d10','c82eaea7-827b-42c2-b5c8-ed072f4047fb','Moller Auto','6866cbc5-3cb0-464a-9576-287daf5e7c58','Sales specialist','Full time','2019-01-10','Currently'),('6c21b3e6-4265-45ef-9108-aace3f3c49f0','5b8b1897-da52-40ab-bfe0-300913abc891','Multikino (office)','6866cbc5-3cb0-464a-9576-287daf5e7c58','Assistant of Manager','Full time','2015-08-01','2019-01-01'),('e66af409-8bd9-4754-a8c8-3c704112924e','5b8b1897-da52-40ab-bfe0-300913abc891','CODELEX','6866cbc5-3cb0-464a-9576-287daf5e7c58','Software Engineer','Full time','2020-09-01','Currently');
/*!40000 ALTER TABLE `workplaces` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-30 22:01:34
