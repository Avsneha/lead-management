-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: lead_management
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `lead_history`
--

DROP TABLE IF EXISTS `lead_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lead_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` int(11) NOT NULL,
  `old_status` enum('New','In Progress','Closed') DEFAULT NULL,
  `new_status` enum('New','In Progress','Closed') DEFAULT NULL,
  `changed_by` int(11) NOT NULL,
  `changed_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lead_history`
--

LOCK TABLES `lead_history` WRITE;
/*!40000 ALTER TABLE `lead_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `lead_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` enum('New','In Progress','Closed') DEFAULT 'New',
  `date_added` datetime DEFAULT current_timestamp(),
  `last_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leads`
--

LOCK TABLES `leads` WRITE;
/*!40000 ALTER TABLE `leads` DISABLE KEYS */;
INSERT INTO `leads` VALUES (1,'Sneha Kumar','sneha.kumar@example.com','9876543210','New','2025-11-03 10:51:52','2025-11-03 10:51:52'),(2,'Rahul Mehta','rahul.mehta@example.com','9988776655','In Progress','2025-11-03 10:51:52','2025-11-03 10:51:52'),(3,'Priya Sharma','priya.sharma@example.com','9123456789','Closed','2025-11-03 10:51:52','2025-11-03 10:51:52'),(4,'Amit Verma','amit.verma@example.com','9898989898','New','2025-11-03 10:51:52','2025-11-03 10:51:52'),(5,'Neha Patel','neha.patel@example.com','9001234567','In Progress','2025-11-03 10:51:52','2025-11-03 10:51:52'),(6,'Ravi Nair','ravi.nair@example.com','8123456789','Closed','2025-11-03 10:51:52','2025-11-03 10:51:52'),(7,'Kiran Das','kiran.das@example.com','9990001112','New','2025-11-03 10:51:52','2025-11-03 10:51:52'),(8,'Manoj Pillai','manoj.pillai@example.com','8004567890','In Progress','2025-11-03 10:51:52','2025-11-03 10:51:52'),(9,'Asha Reddy','asha.reddy@example.com','7001234567','New','2025-11-03 10:51:52','2025-11-03 10:51:52'),(10,'Deepak Singh','deepak.singh@example.com','9090909090','Closed','2025-11-03 10:51:52','2025-11-03 10:51:52');
/*!40000 ALTER TABLE `leads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Admin','admin@gmail.com','$2y$12$iNdJGfvIwLOhlCHsP9D9yOO45GfgosZ2p3Ahcm9ipsmneftciorq.','admin','2025-11-03 05:29:44','2025-11-03 05:29:44'),(3,'user','user@gmail.com','$2y$12$p7Nns446jwg.xQgxhgOezOh/yeZ72fWzMzsbe7SKlZCXWPkffmp6G','user','2025-11-03 05:31:46','2025-11-03 05:31:46');
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

-- Dump completed on 2025-11-03 11:02:06
