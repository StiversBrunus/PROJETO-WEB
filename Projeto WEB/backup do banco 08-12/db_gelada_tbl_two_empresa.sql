-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: db_gelada
-- ------------------------------------------------------
-- Server version	8.0.17

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
-- Table structure for table `tbl_two_empresa`
--

DROP TABLE IF EXISTS `tbl_two_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_two_empresa` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo1` varchar(100) DEFAULT NULL,
  `imagem1` varchar(100) NOT NULL,
  `titulo2` varchar(100) DEFAULT NULL,
  `imagem2` varchar(100) NOT NULL,
  `titulo3` varchar(100) DEFAULT NULL,
  `imagem3` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_two_empresa`
--

LOCK TABLES `tbl_two_empresa` WRITE;
/*!40000 ALTER TABLE `tbl_two_empresa` DISABLE KEYS */;
INSERT INTO `tbl_two_empresa` VALUES (21,'Centro de distribuição','1365281afb9fe4227cfc8504c0052495.jpg','Logistica','1de28fa00add311614b7b570dd484ee4.jpg','Central de Atendimentos','5be289f7a79183a2beaad819458b68b0.jpg'),(22,'teste titulo um','050a266eb57b5ffe96c89fb8abeb2f79.png','teste titulo dois','4ed883dd2498d9711a2398f2ad7defe6.png','teste titulo tres','2dcdb801282ab1f2719118be8e4195f6.png'),(23,'teste titulo um','139908c5f2d7a5de3e46295464956c22.jpg','EDITADOO','ffa1df8268c5503231db26b62e7928d9.png','teste titulo tresaaaaaaaaaa','c737d47ef90dfacba99e6956046f0b41.jpg'),(24,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa','93241872e5f03c5be7b9de30ce00341e.jpg','Bruno','d92c7b8b5f4d0e19bfdad8d599299057.jpg','EDITADOOO','4fcbf639c41ca084bd22ae0beda3aea1.jpg');
/*!40000 ALTER TABLE `tbl_two_empresa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-08 22:12:21
