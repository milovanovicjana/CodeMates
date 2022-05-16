-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: mixology_database
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `IdUser` int NOT NULL,
  PRIMARY KEY (`IdUser`),
  CONSTRAINT `FK_user_admin` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cocktail`
--

DROP TABLE IF EXISTS `cocktail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cocktail` (
  `IdCocktail` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `AvgGrade` float NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Image` varchar(45) NOT NULL,
  `Price` float DEFAULT NULL,
  `Alcoholic` tinyint NOT NULL,
  `Approved` tinyint NOT NULL,
  PRIMARY KEY (`IdCocktail`)
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cocktail`
--

LOCK TABLES `cocktail` WRITE;
/*!40000 ALTER TABLE `cocktail` DISABLE KEYS */;
/*!40000 ALTER TABLE `cocktail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contains`
--

DROP TABLE IF EXISTS `contains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contains` (
  `IdCocktail` int NOT NULL,
  `IdIngredient` int NOT NULL,
  `Quantity` int NOT NULL,
  PRIMARY KEY (`IdCocktail`,`IdIngredient`),
  KEY `FK_ingredient_contains_idx` (`IdIngredient`),
  CONSTRAINT `FK_cocktail_contains` FOREIGN KEY (`IdCocktail`) REFERENCES `cocktail` (`IdCocktail`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_ingredient_contains` FOREIGN KEY (`IdIngredient`) REFERENCES `ingredient` (`IdIngredient`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contains`
--

LOCK TABLES `contains` WRITE;
/*!40000 ALTER TABLE `contains` DISABLE KEYS */;
/*!40000 ALTER TABLE `contains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade` (
  `IdUser` int NOT NULL,
  `IdCocktail` int NOT NULL,
  `Grade` int NOT NULL,
  PRIMARY KEY (`IdUser`,`IdCocktail`),
  KEY `FK_cocktail_grade_idx` (`IdCocktail`),
  CONSTRAINT `FK_cocktail_grade` FOREIGN KEY (`IdCocktail`) REFERENCES `cocktail` (`IdCocktail`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_registered_grade` FOREIGN KEY (`IdUser`) REFERENCES `registered` (`IdUser`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade`
--

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingredient` (
  `IdIngredient` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Type` varchar(45) NOT NULL,
  PRIMARY KEY (`IdIngredient`)
) ENGINE=InnoDB ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredient`
--

LOCK TABLES `ingredient` WRITE;
/*!40000 ALTER TABLE `ingredient` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingredient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preferences`
--

DROP TABLE IF EXISTS `preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `preferences` (
  `IdUser` int NOT NULL,
  `IdIngredient` int NOT NULL,
  `Value` int NOT NULL,
  PRIMARY KEY (`IdUser`,`IdIngredient`),
  KEY `FK_ingredient_preferences_idx` (`IdIngredient`),
  CONSTRAINT `FK_ingredient_preferences` FOREIGN KEY (`IdIngredient`) REFERENCES `ingredient` (`IdIngredient`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_registered_preferences` FOREIGN KEY (`IdUser`) REFERENCES `registered` (`IdUser`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preferences`
--

LOCK TABLES `preferences` WRITE;
/*!40000 ALTER TABLE `preferences` DISABLE KEYS */;
/*!40000 ALTER TABLE `preferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registered`
--

DROP TABLE IF EXISTS `registered`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registered` (
  `IdUser` int NOT NULL,
  PRIMARY KEY (`IdUser`),
  CONSTRAINT `FK_user_registered` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registered`
--

LOCK TABLES `registered` WRITE;
/*!40000 ALTER TABLE `registered` DISABLE KEYS */;
/*!40000 ALTER TABLE `registered` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saved`
--

DROP TABLE IF EXISTS `saved`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `saved` (
  `IdUser` int NOT NULL,
  `IdCocktail` int NOT NULL,
  PRIMARY KEY (`IdUser`,`IdCocktail`),
  KEY `FK_cocktail_saved_idx` (`IdCocktail`),
  CONSTRAINT `FK_cocktail_saved` FOREIGN KEY (`IdCocktail`) REFERENCES `cocktail` (`IdCocktail`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `FK_registered_saved` FOREIGN KEY (`IdUser`) REFERENCES `registered` (`IdUser`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saved`
--

LOCK TABLES `saved` WRITE;
/*!40000 ALTER TABLE `saved` DISABLE KEYS */;
/*!40000 ALTER TABLE `saved` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `IdUser` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Surname` varchar(45) NOT NULL,
  `Mail` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` varchar(1) NOT NULL,
  PRIMARY KEY (`IdUser`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-20 18:29:59
