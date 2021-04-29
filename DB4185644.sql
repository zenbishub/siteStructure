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

--
-- Table structure for table `zb_accento`
--

DROP TABLE IF EXISTS `zb_accento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_accento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bilddatei` text COLLATE latin1_german1_ci,
  `textinhalt` text COLLATE latin1_german1_ci,
  `ueberschrift` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_accento`
--

LOCK TABLES `zb_accento` WRITE;
/*!40000 ALTER TABLE `zb_accento` DISABLE KEYS */;
INSERT INTO `zb_accento` VALUES (2,NULL,'<p>Der Ursprung des Akkordeon-Ensembles Accento aus Wiesbaden geht zurÃ¼ck in die frÃ¼hen 1990er Jahre, als es von Spielern des â€œAkkordeon-Orchester Wiesbaden Dietmar Waltherâ€ gegrÃ¼ndet wurde.</p><p>Zu dieser Zeit waren alle Spieler lÃ¤ngjÃ¤hrige Orchestermitglieder, die die hervorragende musikalische Ausbildung ihres Dirigenten und GrÃ¼nders Dietmar Walther erfahren durften. Im Kern besteht das Ensemble noch heute aus denselben Spielern wie zu seiner GrÃ¼ndung.</p><p>Im Jahr 2006 erfuhr das Ensemble eine groÃŸe Wendung, als Thomas Bauer, bekannter Akkordeonsolist und Dirigent des berÃ¼hmten Akkordeon-Orchester Baltmannsweiler, das Ensemble kÃ¼nstlerisch leitete und bleibende musikalische Akzente setzte.</p><p>Heute besteht Accento wieder ausschlieÃŸlich aus FÃ¼hrungsspielern des Wiesbadener Konzertorchesters.</p><p>Seit Anbeginn ist das Ziel des Ensembles die FÃ¶rderung hochklassiger konzertanter Akkordeonmusik. Dies wird erreicht durch erfolgreiche Teilnahme an Wettbewerben, Kirchenkonzerte, gemeinnÃ¼tzige Auftritte wie auch private Engagements. So folgte Accento kÃ¼rzlich der Einladung zum irischen Akkordeon-Festival, um dort das Galakonzert mitzubestreiten,gefolgt von einem weiteren Auftritt.</p><p>Das Repertoire reicht von Musik aus dem Barock, klassischen Werken in groÃŸer Vielfalt, bis hin zu verschiedenen Arten zeitgenÃ¶ssischer Musik wie Astor Piazzollas Tango Nuevo und StÃ¼cken des polnischen Motion Trio.</p><p>Das Ensemble steht unter der Leitung der Akkordeonistin und -lehrerin Annegret Cratz. Die weiteren Mitglieder sind Martina Bopp, Gabriele Beckhaus, Norbert Bopp und Wilfried WÃ¶rz. VerstÃ¤rkt wird es zu verschiedenen AnlÃ¤ssen von Mareike und Christian Bopp.</p>','Ensembles / Accento',1,NULL);
/*!40000 ALTER TABLE `zb_accento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_accentogalerie`
--

DROP TABLE IF EXISTS `zb_accentogalerie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_accentogalerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bilddatei` text COLLATE latin1_german1_ci,
  `beschreibung` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_accentogalerie`
--

LOCK TABLES `zb_accentogalerie` WRITE;
/*!40000 ALTER TABLE `zb_accentogalerie` DISABLE KEYS */;
INSERT INTO `zb_accentogalerie` VALUES (1,'GE043_350A_2008042622233811942.jpg','Beschreibung zum Bild',1,NULL),(2,'GE164_350A_2008042622272918467.jpg','Beschreibung zum Bild',1,NULL);
/*!40000 ALTER TABLE `zb_accentogalerie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_admin`
--

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

--
-- Table structure for table `zb_akkordeonunterricht`
--

DROP TABLE IF EXISTS `zb_akkordeonunterricht`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_akkordeonunterricht` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ueberschrift` text COLLATE latin1_german1_ci,
  `bilddatei` text COLLATE latin1_german1_ci,
  `textinhalt` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_akkordeonunterricht`
--

LOCK TABLES `zb_akkordeonunterricht` WRITE;
/*!40000 ALTER TABLE `zb_akkordeonunterricht` DISABLE KEYS */;
INSERT INTO `zb_akkordeonunterricht` VALUES (1,'Akkordeonunterricht',NULL,'<p>Bei Diplom-MusikpÃ¤dagogin und Konzertakkordionistin Stefanie Hazenbiller kÃ¶nnen Kinder sowie auch erwachsene Spieler Akkordeonunterricht erhalten.&nbsp;</p><p>Der Unterricht findet statt in:</p><p>Wiesbaden-Dotzheim im Alten Rathaus,</p><p>RÃ¶mergasse 13, 65199 Wiesbaden statt.<br></p><p><br></p><p>Bei Interesse informieren Sie sich bitte auf ihrer Homepage oder unter&nbsp;</p><p><a href=\"mailto:info@akkordeonorchester-wiesbaden.de\">info@akkordeonorchester-wiesbaden.de</a>.</p>',NULL,NULL);
/*!40000 ALTER TABLE `zb_akkordeonunterricht` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_akkordissimo`
--

DROP TABLE IF EXISTS `zb_akkordissimo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_akkordissimo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ueberschrift` text COLLATE latin1_german1_ci,
  `bilddatei` text COLLATE latin1_german1_ci,
  `textinhalt` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_akkordissimo`
--

LOCK TABLES `zb_akkordissimo` WRITE;
/*!40000 ALTER TABLE `zb_akkordissimo` DISABLE KEYS */;
INSERT INTO `zb_akkordissimo` VALUES (1,'Ensembles / Akkordissimo',NULL,'<p>Im Hobbyorchester werden MusikstÃ¼cke aus dem breiten Spektrum der gehobenen Unterhaltungsmusik - Musettwalzer, klassische Musik, Filmmusik - einstudiert. Interessierte Spieler sind herzlich willkommen!&nbsp;</p><p>Das Hobby-Orchester probt unter der Leitung von Stefanie Hazenbiller dienstags von 18:15 - 19:45 Uhr&nbsp; im Moritz-Lang-Haus, Karl-Arnold-StraÃŸe 13 in 65199 Wiesbaden statt.</p>',1,NULL);
/*!40000 ALTER TABLE `zb_akkordissimo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_akkordissimogalerie`
--

DROP TABLE IF EXISTS `zb_akkordissimogalerie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_akkordissimogalerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bilddatei` text COLLATE latin1_german1_ci,
  `beschreibung` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_akkordissimogalerie`
--

LOCK TABLES `zb_akkordissimogalerie` WRITE;
/*!40000 ALTER TABLE `zb_akkordissimogalerie` DISABLE KEYS */;
INSERT INTO `zb_akkordissimogalerie` VALUES (1,'GE018_350A_2008042622232128145.jpg','',1,NULL),(2,'GE063_350A_2008042622225418467.jpg','',1,NULL);
/*!40000 ALTER TABLE `zb_akkordissimogalerie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_auszeichnungen`
--

DROP TABLE IF EXISTS `zb_auszeichnungen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_auszeichnungen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ueberschrift` text COLLATE latin1_german1_ci,
  `bilddatei` text COLLATE latin1_german1_ci,
  `textinhalt` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_auszeichnungen`
--

LOCK TABLES `zb_auszeichnungen` WRITE;
/*!40000 ALTER TABLE `zb_auszeichnungen` DISABLE KEYS */;
INSERT INTO `zb_auszeichnungen` VALUES (2,'Unsere Auszeichnungen','DSC_1006.JPG','',1,NULL);
/*!40000 ALTER TABLE `zb_auszeichnungen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_bestellungen`
--

DROP TABLE IF EXISTS `zb_bestellungen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_bestellungen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bestellung_data` text,
  `bestellung_time` int(11) DEFAULT NULL,
  `bestellung_nummer` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `bemerkung` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_bestellungen`
--

LOCK TABLES `zb_bestellungen` WRITE;
/*!40000 ALTER TABLE `zb_bestellungen` DISABLE KEYS */;
/*!40000 ALTER TABLE `zb_bestellungen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_datenschutz`
--

DROP TABLE IF EXISTS `zb_datenschutz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_datenschutz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` text COLLATE latin1_german1_ci,
  `textinhalt` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_datenschutz`
--

LOCK TABLES `zb_datenschutz` WRITE;
/*!40000 ALTER TABLE `zb_datenschutz` DISABLE KEYS */;
INSERT INTO `zb_datenschutz` VALUES (1,'Datenschutz','<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.&nbsp;</p><p><br></p><p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.&nbsp; &nbsp;</p><p><br></p><p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.&nbsp; &nbsp;</p><p><br></p><p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.&nbsp; &nbsp;</p><p><br></p><p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.&nbsp; &nbsp;</p><p><br></p><p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.&nbsp; &nbsp;</p><p><br></p><p>Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus.&nbsp; &nbsp;</p><p><br></p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.&nbsp; &nbsp;</p><p><br></p><p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.&nbsp; &nbsp;</p><p><br></p><p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.&nbsp; &nbsp;</p><p><br></p><p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo</p>',NULL,NULL);
/*!40000 ALTER TABLE `zb_datenschutz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_dirigenten`
--

DROP TABLE IF EXISTS `zb_dirigenten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_dirigenten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bilddatei` text COLLATE latin1_german1_ci,
  `ueberschrift` text COLLATE latin1_german1_ci,
  `textinhalt` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_dirigenten`
--

LOCK TABLES `zb_dirigenten` WRITE;
/*!40000 ALTER TABLE `zb_dirigenten` DISABLE KEYS */;
INSERT INTO `zb_dirigenten` VALUES (1,'dirigent_stefanie_hazenbiller.jpg','Aktueller Dirigent','<h3>Stefanie Hazenbiller</h3><p>Die deutsche klassische Akkordeonistin Stefanie Hazenbiller wusste schon frÃ¼h, was sie wollte. Ihr musikalisches Interesse umfasst nahezu alle Stilrichtungen der Musik, so dass sie immer versucht dies in ihrem musikalischen Schaffen zu reflektieren. Sie zÃ¤hlt zu den fÃ¼hrenden Akkordeonisten ihrer Generation und ist PreistrÃ¤gerin von nationalen und internationalen Akkordeonwettbewerben.</p><p>2017 stand Stefanie erstmals mit dem hessischen Staatsorchester Wiesbaden auf der BÃ¼hne. Weitere musikalische HÃ¶hepunkte bildeten die Ballett-Produktion \"Eine Winterreise\" am Staatstheater Wiesbaden. 2018 spielt Stefanie Hazenbiller in der Produktion \"Die Dreigroschenoper\" am Staatstheater Darmstadt mit. Stefanie Hazenbiller ist als Akkordeonistin im gesamten Rhein-Main-Gebiet zu hÃ¶ren.</p><p>Im Mittelpunkt ihres musikalischen Schaffens steht die Arbeit als Duo Claste, gemeinsam mit Violinistin und Akkordeonistin Clara Holzapfel. Die zwei Frauen verstehen es musikalische Grenzen zu durchbrechen und ihr Publikum zu begeistern. Neue, eigens fÃ¼r ihre Besetzung geschaffenen Arrangements, begeistern immer wieder das Publikum. Seit einiger Zeit widmen sich die beiden Musikerinnen der Ãœbertragung von Pop-, Rock- und Charthits fÃ¼r ihre Instrumentenkombination.</p><p>2015 wurde Stefanie Hazenbiller von der deutschen Fachzeitschrift \"Das Akkordeon Magazin\" portraitiert.</p><p>Geboren 1992, kommt Stefanie aus einer Familie von leidenschaftlichen Hobby-Musikern. Angefangen zunÃ¤chst mit Klavierunterricht, wechselte sie mit zehn Jahren die waagerechte Tastatur gegen die senkrechte und begann das Akkordeon zu spielen in Laupheim, bei Ulm.</p><p>Ihr professioneller Weg begann mit der musikalischen Ausbildung an der Berufsfachschule fÃ¼r Musik des Bezirks Schwaben in Krumbach. Des Weiteren wurde sie durch den Bayanist Peter Gerter geprÃ¤gt. Als Mitglied des Akkordeon-Landesjugendorchesters Baden-WÃ¼rttemberg kann Stefanie rÃ¼ckblickend auf zahlreiche Konzerte im In- und Ausland sehen.</p><p>Von 2010 â€“ 2015 studierte sie im Diplomstudiengang an der Musikakademie Wiesbaden, in Kooperation mit der Hochschule fÃ¼r Musik und darstellende Kunst Frankfurt am Main, in der Klasse von Mirjana Petercol. 2015 beendete sie ihr Studium mit der Note \"sehr gut\" und dem akademischen Grad Diplom.</p><p>2014 Ã¼bernahm Stefanie die musikalische Leitung des Frankfurter Akkordeon-Orchesters \"Akkordeana\". Seit 2015 ist Stefanie Ausbilderin fÃ¼r Akkordeon in der Akkordeon-Vereinigung Pfungstadt und unterrichtet in Wiesbaden ihre eigene Akkordeonklasse. Ebenso ist sie Dozentin bei \"Musica Viva\". 2017 Ã¼bernahm Stefanie die musikalische Leitung des Hobbyorchesters im Akkordeon-Orchester Wiesbaden Dietmar Walther e.V., in dem sie 2019 auch das Konzertorchester Ã¼bernahm.</p>',1,NULL),(2,NULL,'Unser Ehrendirigent','<h3>Dietmar Walther</h3><p>Dietmar Walther wurde am 10. August 1923 in Dresden geboren. Er erhielt Klavier-, Klarinetten- und Theorieunterricht am Dresdner Konservatorium, ab 1938 nahm er Akkordeonunterricht bei Alfred Olbrich in Dresden. 1949 kam er schlieÃŸlich nach Wiesbaden, wo er am Konservatorium bald Leiter der Meisterklasse fÃ¼r Akkordeon und Lehrer fÃ¼r Musiktheorie und Methodik wurde und im Jahre 1950 das Akkordeon-Orchester Wiesbaden grÃ¼ndete. In den Jahren 1948 bis 1968 war er zusÃ¤tzlich als Konzert- und Rundfunksolist tÃ¤tig. Von 1970 an wirkte er bis 1989 als Musikschulleiter, im Vorstand und als Direktor am \"Wiesbadener Konservatorium und Musikseminar fÃ¼r musikalische Berufsausbildung\".</p><p>Mit ihm konnte das Orchester zahlreiche internationale Auszeichnungen und Preise gewinnen. Er selbst hat unzÃ¤hlige Verdienstorden und Abzeichen der verschiedenen VerbÃ¤nde bis hin zum Ehrenbrief des Landes Hessen und Bundesverdienstkreuz erhalten.&nbsp;</p><p>Durch persÃ¶nliche Freundschaften und Kontakte zu Komponisten wie Gerhard Mohr oder Curt Mahr konnte er diese dazu bewegen, fÃ¼r&nbsp; Akkordeon zu schreiben. Aus diesen Zusammenarbeiten stammen StÃ¼cke wie \"Heimatbilder\", \"Drei Temperamente\" oder \"Florentinisches Konzert\" etc. Er selbst schrieb diverse Kompositionen der virtuosen Unterhaltungsmusik fÃ¼r das Akkordeon. Auch hat er mehrere&nbsp; Filmmusiken verfasst.</p><p>1992 Ã¼bertrug Dietmar Walther seinem SchÃ¼ler JÃ¶rg Mehren die Leitung des Orchesters. Nach dem Weggang von JÃ¶rg Mehren im Oktober 1999 Ã¼bernahm Dietmar Walther interimsmÃ¤ÃŸig wieder die kÃ¼nstlerische Leitung. Mit dem viel umjubelten JubilÃ¤umskonzert (50 Jahre AOWDW)&nbsp; am 11.11.2000 verabschiedete er sich als aktiver Dirigent.</p><p>Unser GrÃ¼nder und Namensgeber Dietmar Walther ist am 29.01.2017 verstorben.</p>',1,NULL);
/*!40000 ALTER TABLE `zb_dirigenten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_dsgvo`
--

DROP TABLE IF EXISTS `zb_dsgvo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_dsgvo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `textinhalt` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_dsgvo`
--

LOCK TABLES `zb_dsgvo` WRITE;
/*!40000 ALTER TABLE `zb_dsgvo` DISABLE KEYS */;
INSERT INTO `zb_dsgvo` VALUES (1,'<h4>Lorem ipsum dolor sit amet</h4><p>consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est</p><p><a href=\"http://google.de\">Lorem ipsum dolor sit amet.</a></p>',NULL,NULL);
/*!40000 ALTER TABLE `zb_dsgvo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_ensembles`
--

DROP TABLE IF EXISTS `zb_ensembles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_ensembles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ensembel_id` text COLLATE latin1_german1_ci,
  `ensembelname` text COLLATE latin1_german1_ci,
  `besetzung` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_ensembles`
--

LOCK TABLES `zb_ensembles` WRITE;
/*!40000 ALTER TABLE `zb_ensembles` DISABLE KEYS */;
INSERT INTO `zb_ensembles` VALUES (2,'01','Konzertorchester','Liste der Spieler',1,NULL),(3,'02','Accento','Liste der Spieler',1,NULL),(4,'03','Akkordissimo','Liste der Spieler',1,NULL),(5,'04','Ton-AKK.robaten','Liste der Spieler',1,NULL);
/*!40000 ALTER TABLE `zb_ensembles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_forms`
--

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

LOCK TABLES `zb_forms` WRITE;
/*!40000 ALTER TABLE `zb_forms` DISABLE KEYS */;
INSERT INTO `zb_forms` VALUES (10,32,'userlogin','userlogin','a:1:{s:9:\"userlogin\";a:2:{s:12:\"Benutzername\";s:4:\"text\";s:8:\"Passwort\";s:8:\"password\";}}','<form method=\"post\" action=\"model/actions.php\"><div class=\"form-group\">\r\n		<label for=\"Benutzername\">Benutzername</label><input type=\"text\" name=\"Benutzername\" class=\"form-control col-4 Benutzername\"  value=\"\" placeholder=\"Benutzername\">\r\n		</div><div class=\"form-group\">\r\n		<label for=\"Passwort\">Passwort</label><input type=\"password\" name=\"Passwort\" class=\"form-control col-4\" id=\"Passwort\" value=\"\" placeholder=\"Passwort\">\r\n		</div><input type=\"hidden\" name=\"action\" value=\"insertdata\"><input type=\"hidden\" name=\"actiontable\" value=\"zb_userlogin\"></form>'),(13,43,'kontakt','kontakt','a:1:{s:7:\"kontakt\";a:5:{s:6:\"anrede\";s:6:\"select\";s:4:\"Name\";s:4:\"text\";s:7:\"Vorname\";s:4:\"text\";s:6:\"E-Mail\";s:5:\"email\";s:9:\"Nachricht\";s:8:\"textarea\";}}','<form method=\"post\" ><div class=\"form-group\"><label for=\"anrede\">Anrede</label><select class=\"form-control col-3\" name=\"anrede\">\r\n		<option value=\"\"></option></select></div><div class=\"form-group\">\r\n		<label for=\"Name\">Name</label><input type=\"text\" name=\"Name\" class=\"form-control col-4 Name\"  value=\"\" placeholder=\"Name\">\r\n		</div><div class=\"form-group\">\r\n		<label for=\"Vorname\">Vorname</label><input type=\"text\" name=\"Vorname\" class=\"form-control col-4 Vorname\"  value=\"\" placeholder=\"Vorname\">\r\n		</div><div class=\"form-group\">\r\n		<label for=\"E-Mail\">E-Mail</label><input type=\"email\" name=\"E-Mail\" class=\"form-control col-4\" id=\"E-Mail\" value=\"\" placeholder=\"E-Mail\">\r\n		</div><div class=\"form-group\"><label for=\"Nachricht\">Nachricht</label><textarea class=\"editor form-control col-10\" name=\"Nachricht\" id=\"Nachricht\" rows=\"3\" placeholder=\"Nachricht\" ></textarea></div></form>');
/*!40000 ALTER TABLE `zb_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_fotogalerie`
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

--
-- Dumping data for table `zb_impressum`
--

LOCK TABLES `zb_impressum` WRITE;
/*!40000 ALTER TABLE `zb_impressum` DISABLE KEYS */;
INSERT INTO `zb_impressum` VALUES (1,'Impressum','<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.&nbsp; &nbsp;</p><p><br></p><p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.&nbsp; &nbsp;</p><p><br></p><p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.&nbsp; &nbsp;</p><p><br></p><p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.&nbsp; &nbsp;</p><p><br></p><p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis.&nbsp; &nbsp;</p><p><br></p><p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur</p>',1,NULL);
/*!40000 ALTER TABLE `zb_impressum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_kategorie`
--

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

DROP TABLE IF EXISTS `zb_kontakt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_kontakt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ueberschrift` text COLLATE latin1_german1_ci,
  `textinhalt` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_kontakt`
--

LOCK TABLES `zb_kontakt` WRITE;
/*!40000 ALTER TABLE `zb_kontakt` DISABLE KEYS */;
INSERT INTO `zb_kontakt` VALUES (1,'Kontakt','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.',NULL,NULL);
/*!40000 ALTER TABLE `zb_kontakt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_konzertorchester`
--

DROP TABLE IF EXISTS `zb_konzertorchester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_konzertorchester` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ueberschrift` text COLLATE latin1_german1_ci,
  `bilddatei` text COLLATE latin1_german1_ci,
  `textinhalt` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_konzertorchester`
--

LOCK TABLES `zb_konzertorchester` WRITE;
/*!40000 ALTER TABLE `zb_konzertorchester` DISABLE KEYS */;
INSERT INTO `zb_konzertorchester` VALUES (1,'Konzertorchester',NULL,'<p>1950 grÃ¼ndete Dietmar Walther das Akkordeon-Orchester Wiesbaden, das seit 1988 auch seinen Namen trÃ¤gt. Das besondere Interesse des Orchesters liegt bis heute in der neuen Originalliteratur. Insgesamt wurden 30 Originalwerke uraufgefÃ¼hrt.</p><p>Viele Erfolge bei Wertungsspielen sind im Laufe der Zeit erreicht worden. Am Internationalen Akkordeon-Festival in Innsbruck nahm das Orchester viele Male teil. 1989 und 1995 gewann es diesen wichtigen Wettbewerb.Â </p><p>Seit Ende 2019 ist Stefanie Hazenbiller Dirigentin und kÃ¼nstlerische Leiterin des AOWDW.</p>',1,NULL);
/*!40000 ALTER TABLE `zb_konzertorchester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_konzertorchestergalerie`
--

DROP TABLE IF EXISTS `zb_konzertorchestergalerie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_konzertorchestergalerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bilddatei` text COLLATE latin1_german1_ci,
  `beschreibung` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_konzertorchestergalerie`
--

LOCK TABLES `zb_konzertorchestergalerie` WRITE;
/*!40000 ALTER TABLE `zb_konzertorchestergalerie` DISABLE KEYS */;
INSERT INTO `zb_konzertorchestergalerie` VALUES (1,'GE050_350A_200804262223533902.jpg','',1,NULL),(2,'GE169_350A_2008042622273719169.jpg','',1,NULL),(3,'plaster.jpg','Beschreibung zum Bild',1,NULL);
/*!40000 ALTER TABLE `zb_konzertorchestergalerie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_links`
--

DROP TABLE IF EXISTS `zb_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `textinhalt` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_links`
--

LOCK TABLES `zb_links` WRITE;
/*!40000 ALTER TABLE `zb_links` DISABLE KEYS */;
INSERT INTO `zb_links` VALUES (1,'<ul><li><a href=\"http://wert.de\">Link 1</a></li><li><a href=\"http://wert.de\">Link 2</a></li><li><a href=\"http://wert.de\">Link 3</a></li></ul>',1,NULL);
/*!40000 ALTER TABLE `zb_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_mitglieder`
--

DROP TABLE IF EXISTS `zb_mitglieder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_mitglieder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text COLLATE latin1_german1_ci,
  `Vorname` text COLLATE latin1_german1_ci,
  `Geburtstag` text COLLATE latin1_german1_ci,
  `bilddatei` text COLLATE latin1_german1_ci,
  `erreichbar` text COLLATE latin1_german1_ci,
  `funktion` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT '1',
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_mitglieder`
--

LOCK TABLES `zb_mitglieder` WRITE;
/*!40000 ALTER TABLE `zb_mitglieder` DISABLE KEYS */;
INSERT INTO `zb_mitglieder` VALUES (1,'Mustermann','Peter','13.05.1970','vertinskiy.jpeg','Telefon: 00011248555 Weitere Information....','aktives Mitglied',1,NULL),(2,'Musterfrau','Monika','09.09.1981',NULL,'Telefon und weiter Information...','aktives Mitglied',1,NULL),(3,'Wertlos','Peter','10.07.1973',NULL,'weitere Information...','aktives Mitglied',1,NULL);
/*!40000 ALTER TABLE `zb_mitglieder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_nonpublic`
--

DROP TABLE IF EXISTS `zb_nonpublic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_nonpublic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partitur` text COLLATE latin1_german1_ci,
  `information` text COLLATE latin1_german1_ci,
  `title` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_nonpublic`
--

LOCK TABLES `zb_nonpublic` WRITE;
/*!40000 ALTER TABLE `zb_nonpublic` DISABLE KEYS */;
INSERT INTO `zb_nonpublic` VALUES (2,NULL,'<h4>Hallo liebes AOWDW-Mitglied!</h4><p>In diesem nonpublic Bereich fÃ¼r Orchestermitglieder werden Intern relevante Inhalte zur VerfÃ¼gung gestellt. Z.B. download fÃ¼r die Noten und sonstige Informationen und Mitteilungen. Diese Informationen sind als dynamische Inhalte werden durch den Administrator verwaltet.&nbsp;&nbsp;</p>','Interne Mitglieder-Bereich',1,1),(3,'53AM0166.jpg','Ein bischen Beschreibung schadet nicht','Notenpartutur fÃ¼r Bla bla',1,3),(4,'a0079977681.JPG','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam','Nere Titel fÃ¼r Datensatz',1,4),(5,'Briefmarken.1Stk.25.05.2018_1723.pdf','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam','Partituren zum Download',1,2);
/*!40000 ALTER TABLE `zb_nonpublic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_pages`
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

--
-- Dumping data for table `zb_pages`
--

LOCK TABLES `zb_pages` WRITE;
/*!40000 ALTER TABLE `zb_pages` DISABLE KEYS */;
INSERT INTO `zb_pages` VALUES (1,'index','index',NULL,NULL,NULL,NULL,NULL,23,NULL,NULL),(14,'termine_aow','termine',1,NULL,NULL,'blog','a:6:{s:12:\"ueberschrift\";s:5:\"input\";s:9:\"bilddatei\";s:4:\"file\";s:12:\"beschreibung\";s:8:\"textarea\";s:9:\"eventzeit\";s:5:\"input\";s:10:\"wer_spielt\";s:6:\"select\";s:9:\"timestamp\";s:9:\"unvisible\";}',7,1,1),(18,'startgalerie','startgalerie',0,NULL,NULL,'blog','a:2:{s:9:\"bilddatei\";s:4:\"file\";s:12:\"beschreibung\";s:5:\"input\";}',20,1,2),(19,'konzertorchester','konzertorchester',0,NULL,1,'blog','a:3:{s:12:\"ueberschrift\";s:5:\"input\";s:9:\"bilddatei\";s:4:\"file\";s:10:\"textinhalt\";s:8:\"textarea\";}',2,1,1),(20,'konzertorchestergalerie','konzertorchestergalerie',0,NULL,NULL,'blog','a:2:{s:9:\"bilddatei\";s:4:\"file\";s:12:\"beschreibung\";s:5:\"input\";}',22,1,2),(21,'accento','accento',0,NULL,1,'blog','a:3:{s:9:\"bilddatei\";s:4:\"file\";s:10:\"textinhalt\";s:8:\"textarea\";s:12:\"ueberschrift\";s:5:\"input\";}',3,1,1),(22,'accentogalerie','accentogalerie',0,NULL,NULL,'blog','a:2:{s:9:\"bilddatei\";s:4:\"file\";s:12:\"beschreibung\";s:5:\"input\";}',23,1,2),(25,'akkordissimo','akkordissimo',0,NULL,1,'blog','a:3:{s:12:\"ueberschrift\";s:5:\"input\";s:9:\"bilddatei\";s:4:\"file\";s:10:\"textinhalt\";s:8:\"textarea\";}',4,1,1),(26,'akkordissimogalerie','akkordissimogalerie',0,NULL,NULL,'blog','a:2:{s:9:\"bilddatei\";s:4:\"file\";s:12:\"beschreibung\";s:5:\"input\";}',24,1,2),(27,'tonakkrobaten','tonakkrobaten',0,NULL,1,'blog','a:3:{s:12:\"ueberschrift\";s:5:\"input\";s:9:\"bilddatei\";s:4:\"file\";s:10:\"textinhalt\";s:8:\"textarea\";}',5,1,1),(28,'tonakkrobatengalerie','tonakkrobatengalerie',0,NULL,NULL,'blog','a:2:{s:9:\"bilddatei\";s:4:\"file\";s:12:\"beschreibung\";s:5:\"input\";}',25,1,2),(29,'auszeichnungen','auszeichnungen',0,1,NULL,'blog','a:3:{s:12:\"ueberschrift\";s:5:\"input\";s:9:\"bilddatei\";s:4:\"file\";s:10:\"textinhalt\";s:8:\"textarea\";}',10,1,1),(30,'dirigenten','dirigenten',1,NULL,1,'blog','a:3:{s:9:\"bilddatei\";s:4:\"file\";s:12:\"ueberschrift\";s:5:\"input\";s:10:\"textinhalt\";s:8:\"textarea\";}',6,1,1),(31,'akkordeonunterricht','akkordeonunterricht',2,0,1,'statisch','a:3:{s:12:\"ueberschrift\";s:5:\"input\";s:9:\"bilddatei\";s:4:\"file\";s:10:\"textinhalt\";s:8:\"textarea\";}',8,1,1),(32,'userlogin','userlogin',0,NULL,NULL,'statisch','a:2:{s:12:\"Benutzername\";s:5:\"input\";s:8:\"Passwort\";s:5:\"input\";}',27,0,NULL),(33,'ensembles','ensembles',0,NULL,NULL,'blog','a:3:{s:11:\"ensembel_id\";s:5:\"input\";s:12:\"ensembelname\";s:5:\"input\";s:9:\"besetzung\";s:8:\"textarea\";}',14,1,4),(34,'nonpublic','nonpublic',0,NULL,NULL,'blog','a:3:{s:8:\"partitur\";s:4:\"file\";s:11:\"information\";s:8:\"textarea\";s:5:\"title\";s:5:\"input\";}',9,1,5),(39,'datenschutz','datenschutz',NULL,NULL,1,'statisch','a:2:{s:5:\"titel\";s:5:\"input\";s:10:\"textinhalt\";s:8:\"textarea\";}',17,1,1),(41,'impressum','impressum',NULL,0,1,'blog','a:2:{s:12:\"ueberschrift\";s:5:\"input\";s:10:\"textinhalt\";s:8:\"textarea\";}',15,1,1),(42,'dsgvo','dsgvo',0,NULL,NULL,'statisch','a:1:{s:10:\"textinhalt\";s:8:\"textarea\";}',16,1,1),(43,'kontakt','kontakt',NULL,1,1,'statisch','a:2:{s:12:\"ueberschrift\";s:5:\"input\";s:10:\"textinhalt\";s:8:\"textarea\";}',12,1,1),(44,'fotogalerie','fotogalerie',1,NULL,1,'blog','a:2:{s:9:\"bilddatei\";s:4:\"file\";s:12:\"beschreibung\";s:5:\"input\";}',11,1,2),(45,'hauptbild','hauptbild',0,NULL,NULL,'blog','a:2:{s:9:\"bilddatei\";s:4:\"file\";s:5:\"aktiv\";s:6:\"select\";}',21,1,2),(48,'links','links',0,NULL,NULL,'blog','a:1:{s:10:\"textinhalt\";s:8:\"textarea\";}',18,1,1),(49,'sponsoren','sponsoren',0,NULL,NULL,'blog','a:4:{s:9:\"bilddatei\";s:4:\"file\";s:10:\"webadresse\";s:5:\"input\";s:11:\"sponsorname\";s:5:\"input\";s:10:\"textinhalt\";s:8:\"textarea\";}',19,1,1),(53,'mitglieder','mitglieder',0,NULL,NULL,'blog','a:6:{s:4:\"Name\";s:5:\"input\";s:7:\"Vorname\";s:5:\"input\";s:8:\"funktion\";s:5:\"input\";s:10:\"Geburtstag\";s:5:\"input\";s:9:\"bilddatei\";s:4:\"file\";s:10:\"erreichbar\";s:8:\"textarea\";}',13,1,5),(56,'videogalerie','videogalerie',1,NULL,NULL,'blog','a:3:{s:10:\"videotitel\";s:5:\"input\";s:9:\"videocode\";s:5:\"input\";s:12:\"beschreibung\";s:8:\"textarea\";}',26,1,2),(58,'startseite','startseite',0,NULL,NULL,'statisch','a:2:{s:12:\"ueberschrift\";s:5:\"input\";s:10:\"textinhalt\";s:8:\"textarea\";}',NULL,1,1);
/*!40000 ALTER TABLE `zb_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_parallax`
--

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
INSERT INTO `zb_registration` VALUES (3,'','Hazenbiller','Wjatschelaw','zenbis@online.de','wert',NULL);
/*!40000 ALTER TABLE `zb_registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_sponsoren`
--

DROP TABLE IF EXISTS `zb_sponsoren`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_sponsoren` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bilddatei` text COLLATE latin1_german1_ci,
  `webadresse` text COLLATE latin1_german1_ci,
  `sponsorname` text COLLATE latin1_german1_ci,
  `textinhalt` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_sponsoren`
--

LOCK TABLES `zb_sponsoren` WRITE;
/*!40000 ALTER TABLE `zb_sponsoren` DISABLE KEYS */;
INSERT INTO `zb_sponsoren` VALUES (1,'Koala.jpg','https://zenbis.de','Sponsor 1','Eventuell obligatorischer Text fÃ¼r Sponsor....',1,NULL),(2,'Penguins.jpg','https://zenbis.de','Sponsor 2','Hier kommt ein kurzer Text Ã¼ber den Sponsor...',1,NULL);
/*!40000 ALTER TABLE `zb_sponsoren` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_startgalerie`
--

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
INSERT INTO `zb_startseite` VALUES (1,'Text Column 1',1,NULL,'Herzlich willkommen beim Akkordeon-Orchester Wiesbaden Dietmar Walther e.V.!','Auf den kommenden Seiten finden Sie Informationen zu anstehenden Veranstaltungen, zu unseren Orchestern und zur Geschichte unseres Vereins. Nehmen Sie sich die Zeit und lernen Sie uns kennen...!');
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

DROP TABLE IF EXISTS `zb_termine_aow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_termine_aow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ueberschrift` text COLLATE latin1_german1_ci,
  `bilddatei` text COLLATE latin1_german1_ci,
  `beschreibung` text COLLATE latin1_german1_ci,
  `eventzeit` text COLLATE latin1_german1_ci,
  `wer_spielt` text COLLATE latin1_german1_ci,
  `timestamp` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_termine_aow`
--

LOCK TABLES `zb_termine_aow` WRITE;
/*!40000 ALTER TABLE `zb_termine_aow` DISABLE KEYS */;
INSERT INTO `zb_termine_aow` VALUES (3,'Konzert in BÃ¼rgerhaus',NULL,'<h3>18:00 Uhr</h3><p>weiter Beschreibung zu Adresse ....</p>','11.10.2020','Konzertorchester','1602367200',1,2),(4,'Konzert in der Kirche',NULL,'<h3>18:00 Uhr</h3><p><span style=\"color:rgb(0,0,0);\">Musterstrasse 35, 701141, Musterstadt.</span></p>','18.08.2020','Accento','1597701600',1,1),(5,'Akkordeon am Markt','Lighthouse.jpg','<h3>18:00 Uhr</h3>Stadt-Marktplatz in der Ecke...','20.10.2020','Accento','1603144800',1,3),(6,'Akkordeon Forever','Desert.jpg','<h3>15:00 Uhr</h3><p>BÃ¼rgersaal Meinestrasse 2, 48955 Irgendwo...</p>','23.07.2020','Konzertorchester','1595455200',1,NULL);
/*!40000 ALTER TABLE `zb_termine_aow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_tonakkrobaten`
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

--
-- Dumping data for table `zb_tonakkrobaten`
--

LOCK TABLES `zb_tonakkrobaten` WRITE;
/*!40000 ALTER TABLE `zb_tonakkrobaten` DISABLE KEYS */;
INSERT INTO `zb_tonakkrobaten` VALUES (1,'Ensembles / Ton-AKK.robaten',NULL,'<h4>Jeder fÃ¤ngt einmal klein an...</h4><p>Bei den Ton-AKK.robaten spielen unsere jÃ¼ngsten Mitglieder. Die Gruppe wurde im November 2013 mit SchÃ¼lern im Alter von 10-13 Jahren gegrÃ¼ndet.Â  Geleitet wird diese Spielgruppe von Kerstin Nacken, die seit vielen Jahren selbst im Hauptorchester spielt und im Vorstand tÃ¤tig ist.</p><p>Neue Mitspieler sind herzlich willkommen - auch AnfÃ¤nger werden hier gern integriert!Â </p><p><br></p><p>Weitere Informationen erhalten Sie unter <a href=\"mailto:kerstin-nacken@akkordeonorchester-wiesbaden.de\">kerstin-nacken@akkordeonorchester-wiesbaden.de</a></p>',1,NULL);
/*!40000 ALTER TABLE `zb_tonakkrobaten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_tonakkrobatengalerie`
--

DROP TABLE IF EXISTS `zb_tonakkrobatengalerie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zb_tonakkrobatengalerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bilddatei` text COLLATE latin1_german1_ci,
  `beschreibung` text COLLATE latin1_german1_ci,
  `active` int(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zb_tonakkrobatengalerie`
--

LOCK TABLES `zb_tonakkrobatengalerie` WRITE;
/*!40000 ALTER TABLE `zb_tonakkrobatengalerie` DISABLE KEYS */;
INSERT INTO `zb_tonakkrobatengalerie` VALUES (1,'takrobaten2.jpg','',1,NULL),(2,'takrobaten1.jpg','',1,NULL);
/*!40000 ALTER TABLE `zb_tonakkrobatengalerie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zb_userlogin`
--

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
