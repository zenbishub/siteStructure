-- MySQL dump 10.13  Distrib 5.6.45, for Linux (x86_64)
--
-- Host: whemper.store.d0m.de    Database: DB4185644
-- ------------------------------------------------------
-- Server version	5.6.42-log

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



DROP TABLE IF EXISTS `zb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_admin` (
  `id` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `membernik` varchar(50) DEFAULT NULL,
  `memberpass` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_admin`
--

LOCK TABLES `zb_admin` WRITE;
/*!40000 ALTER TABLE `zb_admin` DISABLE KEYS */;
INSERT INTO `zb_admin` VALUES (1,'admin','admin2020','info@akkordeonorchester-wiesbaden.de','aow','aow2020');
/*!40000 ALTER TABLE `zb_admin` ENABLE KEYS */;
UNLOCK TABLES;


DROP TABLE IF EXISTS `zb_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageid` int(11) DEFAULT NULL,
  `page` varchar(50) DEFAULT NULL,
  `formname` varchar(50) DEFAULT NULL,
  `elemente` text,
  `html` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_forms`
--


DROP TABLE IF EXISTS `zb_fotogalerie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_fotogalerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bilddatei` text COLLATE latin1_german1_ci,
  `beschreibung` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_fotogalerie`
--

LOCK TABLES `zb_fotogalerie` WRITE;
/*!40000 ALTER TABLE `zb_fotogalerie` DISABLE KEYS */;
INSERT INTO `zb_fotogalerie` VALUES (1,'Chrysanthemum.jpg','Beschreibung zum Bild 1',1,NULL),(2,'Penguins.jpg','Beschreibung zum Bild 2',1,NULL),(3,'Jellyfish.jpg','Beschreibung zum Bild 3',1,NULL),(4,'Tulips.jpg','Beschreibung zum Bild 4',1,NULL),(5,'Hydrangeas.jpg','Beschreibung zum Bild',1,NULL),(6,'Koala.jpg','Beschreibung zum Bild',1,NULL);
/*!40000 ALTER TABLE `zb_fotogalerie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_hauptbild`
--

DROP TABLE IF EXISTS `zb_hauptbild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_hauptbild` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bilddatei` text COLLATE latin1_german1_ci,
  `aktiv` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_hauptbild`
--

LOCK TABLES `zb_hauptbild` WRITE;
/*!40000 ALTER TABLE `zb_hauptbild` DISABLE KEYS */;
INSERT INTO `zb_hauptbild` VALUES (1,'Desert.jpg','nicht aktiv',2,2),(2,'Tulips.jpg','aktiv',1,1);
/*!40000 ALTER TABLE `zb_hauptbild` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_htmlcode`
--

DROP TABLE IF EXISTS `zb_htmlcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_htmlcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `input_int_sort` int(11) DEFAULT NULL,
  `input_txt_codename` varchar(200) DEFAULT NULL,
  `textarea_text_code` text,
  `input_txt_page` varchar(50) DEFAULT NULL,
  `input_int_show` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_htmlcode`
--

LOCK TABLES `zb_htmlcode` WRITE;
/*!40000 ALTER TABLE `zb_htmlcode` DISABLE KEYS */;
INSERT INTO `zb_htmlcode` VALUES (1,NULL,'codename','<html>',NULL,NULL);
/*!40000 ALTER TABLE `zb_htmlcode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_impressum`
--

DROP TABLE IF EXISTS `zb_impressum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_impressum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ueberschrift` text COLLATE latin1_german1_ci,
  `textinhalt` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



DROP TABLE IF EXISTS `zb_kategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_kategorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kat_id` int(11) DEFAULT NULL,
  `kat_name` varchar(200) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_kategorie`
--

LOCK TABLES `zb_kategorie` WRITE;
/*!40000 ALTER TABLE `zb_kategorie` DISABLE KEYS */;
INSERT INTO `zb_kategorie` VALUES (11,1,'Seiten im Projekt',29),(12,2,'Galerien im Projekt',30),(14,4,'Organisation',28),(15,5,'Interner Bereich',NULL);
/*!40000 ALTER TABLE `zb_kategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_kontakt`
--



DROP TABLE IF EXISTS `zb_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(100) DEFAULT NULL,
  `route` varchar(100) DEFAULT NULL,
  `menu` int(11) DEFAULT NULL,
  `topmenu` int(11) DEFAULT NULL,
  `footmenu` int(11) DEFAULT NULL,
  `behavior` varchar(100) DEFAULT NULL,
  `form` text,
  `sort` int(11) DEFAULT NULL,
  `admmenu` int(11) DEFAULT NULL,
  `kategorie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;



DROP TABLE IF EXISTS `zb_parallax`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_parallax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kat_id` int(11) DEFAULT NULL,
  `bild` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_parallax`
--

LOCK TABLES `zb_parallax` WRITE;
/*!40000 ALTER TABLE `zb_parallax` DISABLE KEYS */;
/*!40000 ALTER TABLE `zb_parallax` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_registration`
--

DROP TABLE IF EXISTS `zb_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anrede` text,
  `Name` text,
  `Vorname` text,
  `Email` text,
  `Passwort` text,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_registration`
--

LOCK TABLES `zb_registration` WRITE;
/*!40000 ALTER TABLE `zb_registration` DISABLE KEYS */;
INSERT INTO `zb_registration` VALUES (3,'','Musterman','Peter','wert@domain.de','wert',NULL);
/*!40000 ALTER TABLE `zb_registration` ENABLE KEYS */;
UNLOCK TABLES;



DROP TABLE IF EXISTS `zb_startgalerie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_startgalerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bilddatei` text COLLATE latin1_german1_ci,
  `beschreibung` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_startgalerie`
--

LOCK TABLES `zb_startgalerie` WRITE;
/*!40000 ALTER TABLE `zb_startgalerie` DISABLE KEYS */;
INSERT INTO `zb_startgalerie` VALUES (1,'GE004_350A_2008-04-26-22-22-57-6334.jpg','Beschreibung 1',1,NULL),(2,'GE017_350A_2008-04-26-22-23-18-5705.jpg','Beschreibung 2',1,NULL),(3,'GE190_350A_2008-04-26-22-28-05-9961.jpg','Beschreibung 3',1,NULL);
/*!40000 ALTER TABLE `zb_startgalerie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_startseite`
--

DROP TABLE IF EXISTS `zb_startseite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_startseite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `column1` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT '1',
  `sort` int(3) DEFAULT NULL,
  `ueberschrift` text COLLATE latin1_german1_ci,
  `textinhalt` text COLLATE latin1_german1_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_startseite`
--

LOCK TABLES `zb_startseite` WRITE;
/*!40000 ALTER TABLE `zb_startseite` DISABLE KEYS */;
INSERT INTO `zb_startseite` VALUES (1,'Text Column 1',1,NULL,'Startseite Text auf der Startseite');
/*!40000 ALTER TABLE `zb_startseite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_switcher`
--

DROP TABLE IF EXISTS `zb_switcher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_switcher` (
  `id` int(11) NOT NULL,
  `onoff` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_switcher`
--

LOCK TABLES `zb_switcher` WRITE;
/*!40000 ALTER TABLE `zb_switcher` DISABLE KEYS */;
INSERT INTO `zb_switcher` VALUES (1,1);
/*!40000 ALTER TABLE `zb_switcher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_termine_aow`
--



DROP TABLE IF EXISTS `zb_tonakkrobaten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_tonakkrobaten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ueberschrift` text COLLATE latin1_german1_ci,
  `bilddatei` text COLLATE latin1_german1_ci,
  `textinhalt` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;



DROP TABLE IF EXISTS `zb_userlogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_userlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Benutzername` text,
  `Passwort` text,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_userlogin`
--

LOCK TABLES `zb_userlogin` WRITE;
/*!40000 ALTER TABLE `zb_userlogin` DISABLE KEYS */;
INSERT INTO `zb_userlogin` VALUES (1,'zenbis','nurich',NULL);
/*!40000 ALTER TABLE `zb_userlogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_videogalerie`
--

DROP TABLE IF EXISTS `zb_videogalerie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_videogalerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `column1` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT '1',
  `sort` int(3) DEFAULT NULL,
  `videotitel` text COLLATE latin1_german1_ci,
  `videocode` text COLLATE latin1_german1_ci,
  `beschreibung` text COLLATE latin1_german1_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_videogalerie`
--

LOCK TABLES `zb_videogalerie` WRITE;
/*!40000 ALTER TABLE `zb_videogalerie` DISABLE KEYS */;
INSERT INTO `zb_videogalerie` VALUES (1,'Text Column 1',1,NULL,'Unser erstes YouTube Video','https://www.youtube.com/watch?v=qZUxrUwmgXM','Kurze Videobeschreibung ist immer gut...'),(2,NULL,1,NULL,'Shape of you - accordion cover - Ed Sheeran','https://www.youtube.com/watch?v=C_hFfzBB5p8','<p>The accordion cover \'Shape of you\' by Ed Sheeran played and arranged for accordion by Stefanie Hazenbiller. This is my acoustic instrumental cover of this song.</p><p></p>');
/*!40000 ALTER TABLE `zb_videogalerie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_webmaster`
--

DROP TABLE IF EXISTS `zb_webmaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_webmaster` (
  `id` int(11) NOT NULL,
  `u` varchar(50) DEFAULT NULL,
  `p` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_webmaster`
--

LOCK TABLES `zb_webmaster` WRITE;
/*!40000 ALTER TABLE `zb_webmaster` DISABLE KEYS */;
/*!40000 ALTER TABLE `zb_webmaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_websitetitle`
--

DROP TABLE IF EXISTS `zb_websitetitle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_websitetitle` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_websitetitle`
--

LOCK TABLES `zb_websitetitle` WRITE;
/*!40000 ALTER TABLE `zb_websitetitle` DISABLE KEYS */;
INSERT INTO `zb_websitetitle` VALUES (1,'Akkordeonorchester Wiesbaden');
/*!40000 ALTER TABLE `zb_websitetitle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-20  6:55:14
