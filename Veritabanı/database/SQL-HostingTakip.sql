-- MySQL dump 10.13  Distrib 5.1.30, for pc-linux-gnu (i686)
--
-- Host: localhost    Database: panel30
-- ------------------------------------------------------
-- Server version	5.1.30

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
-- Table structure for table `adminler`
--

DROP TABLE IF EXISTS `adminler`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `adminler` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `admin` varchar(16) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(16) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `oturum` varchar(32) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `adminler`
--

LOCK TABLES `adminler` WRITE;
/*!40000 ALTER TABLE `adminler` DISABLE KEYS */;
INSERT INTO `adminler` (`id`, `admin`, `pass`, `email`, `oturum`) VALUES (1,'admin','demo','admin@hostingtakip.com','');
/*!40000 ALTER TABLE `adminler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bildirim`
--

DROP TABLE IF EXISTS `bildirim`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `bildirim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(200) NOT NULL DEFAULT '0',
  `webpage` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `package` int(200) DEFAULT NULL,
  `customer` varchar(200) DEFAULT NULL,
  `paid` varchar(189) DEFAULT NULL,
  `info` text CHARACTER SET latin1 NOT NULL,
  `banka` varchar(255) DEFAULT NULL,
  `tutar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin5 ROW_FORMAT=DYNAMIC;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `bildirim`
--

LOCK TABLES `bildirim` WRITE;
/*!40000 ALTER TABLE `bildirim` DISABLE KEYS */;
/*!40000 ALTER TABLE `bildirim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `destek`
--

DROP TABLE IF EXISTS `destek`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `destek` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `kulno` int(8) NOT NULL,
  `tarih` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `starih` int(14) NOT NULL,
  `ustid` int(6) NOT NULL,
  `baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `yazi` text COLLATE utf8_turkish_ci NOT NULL,
  `kapali` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=155 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci COMMENT='Ticket sayfasi tablosu tek tablo ile yapilacak ust id = 0 an';
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `destek`
--

LOCK TABLES `destek` WRITE;
/*!40000 ALTER TABLE `destek` DISABLE KEYS */;
/*!40000 ALTER TABLE `destek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duyurular`
--

DROP TABLE IF EXISTS `duyurular`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `duyurular` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `kulno` int(8) NOT NULL,
  `baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `duyuru` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `duyurular`
--

LOCK TABLES `duyurular` WRITE;
/*!40000 ALTER TABLE `duyurular` DISABLE KEYS */;
/*!40000 ALTER TABLE `duyurular` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hosting`
--

DROP TABLE IF EXISTS `hosting`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `hosting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '0',
  `webpage` varchar(200) DEFAULT NULL,
  `package` int(11) DEFAULT NULL,
  `customer` int(11) DEFAULT NULL,
  `hdate` varchar(200) DEFAULT NULL,
  `ddate` varchar(200) DEFAULT NULL,
  `paid` varchar(200) DEFAULT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin5;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `hosting`
--

LOCK TABLES `hosting` WRITE;
/*!40000 ALTER TABLE `hosting` DISABLE KEYS */;
/*!40000 ALTER TABLE `hosting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musteri`
--

DROP TABLE IF EXISTS `musteri`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `musteri` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `ad` varchar(200) DEFAULT NULL,
  `kullaniciadi` varchar(200) NOT NULL,
  `sifre` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` varchar(250) NOT NULL,
  `hakkimda` text NOT NULL,
  `sehir` varchar(200) NOT NULL,
  `ilce` varchar(50) NOT NULL,
  `tc` varchar(11) NOT NULL,
  `adres` varchar(250) NOT NULL,
  `mustip` enum('k','b') NOT NULL,
  `oturum` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin5 ROW_FORMAT=DYNAMIC;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `musteri`
--

LOCK TABLES `musteri` WRITE;
/*!40000 ALTER TABLE `musteri` DISABLE KEYS */;
INSERT INTO `musteri` (`id`, `ad`, `kullaniciadi`, `sifre`, `email`, `tel`, `hakkimda`, `sehir`, `ilce`, `tc`, `adres`, `mustip`, `oturum`) VALUES (23,'Demo Müşteri','musteri@hostingtakip.com','demo','musteri@hostingtakip.com','5464258993','hosting takip demo müşterisidir.','Ankara','Kızılay','12345678901','Teknoder.com','b','');
/*!40000 ALTER TABLE `musteri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `space` varchar(100) DEFAULT NULL,
  `transfer` varchar(100) DEFAULT NULL,
  `email` varchar(225) NOT NULL DEFAULT '',
  `subdomain` varchar(225) NOT NULL DEFAULT '',
  `ftp` varchar(225) NOT NULL DEFAULT '',
  `addon` varchar(225) NOT NULL DEFAULT '',
  `lokasyon` varchar(225) NOT NULL DEFAULT '',
  `panel` varchar(225) NOT NULL DEFAULT '',
  `veri` varchar(225) NOT NULL DEFAULT '',
  `kat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin5;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `package`
--

LOCK TABLES `package` WRITE;
/*!40000 ALTER TABLE `package` DISABLE KEYS */;
/*!40000 ALTER TABLE `package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siparis`
--

DROP TABLE IF EXISTS `siparis`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `siparis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(200) NOT NULL DEFAULT '0',
  `webpage` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `package` int(11) DEFAULT NULL,
  `customer` varchar(30) DEFAULT NULL,
  `paid` varchar(189) DEFAULT NULL,
  `info` text CHARACTER SET latin1 NOT NULL,
  `banka` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin5 ROW_FORMAT=DYNAMIC;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `siparis`
--

LOCK TABLES `siparis` WRITE;
/*!40000 ALTER TABLE `siparis` DISABLE KEYS */;
/*!40000 ALTER TABLE `siparis` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-06-13 21:03:07
