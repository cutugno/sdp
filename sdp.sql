-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: sdp
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url_name` varchar(255) NOT NULL,
  `modified_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artists`
--

LOCK TABLES `artists` WRITE;
/*!40000 ALTER TABLE `artists` DISABLE KEYS */;
INSERT INTO `artists` VALUES (1,'black sabbath','black-sabbath','2016-12-20 17:34:07','2016-12-20 17:30:24'),(2,'jane\'s addiction','janes-addiction','2016-12-20 16:31:15','2016-12-20 16:31:15');
/*!40000 ALTER TABLE `artists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('798sl7g48chc4ll7hnkprh7rmtpda8p5','127.0.0.1',1482163409,'__ci_last_regenerate|i:1482163195;'),('r1229dh5hphgpamhtnqt8rtopm9vgki1','127.0.0.1',1482163790,'__ci_last_regenerate|i:1482163549;'),('num8hucjkiubkbgjcs8tjhji08k2atsj','127.0.0.1',1482164156,'__ci_last_regenerate|i:1482163885;'),('ci67fvbtthdms4lnh8lag27pu41odm28','127.0.0.1',1482164330,'__ci_last_regenerate|i:1482164214;'),('389nish2t6n3mhd174has8im410sj7lr','127.0.0.1',1482164896,'__ci_last_regenerate|i:1482164638;'),('dnpbpb9l4ui7513guttv2ij4d7a5t28n','127.0.0.1',1482165036,'__ci_last_regenerate|i:1482164993;'),('4ojkn8kjogf8deshflkj8t836t3heghj','127.0.0.1',1482165322,'__ci_last_regenerate|i:1482165299;'),('2o8lcga61p2o7e31ihj41rh36ojfbtrq','127.0.0.1',1482165958,'__ci_last_regenerate|i:1482165661;post|a:1:{s:4:\"name\";s:9:\"superjioi\";}'),('kastniqt31me92j342fcml3iakfh26op','127.0.0.1',1482166052,'__ci_last_regenerate|i:1482165975;'),('dbd0i4fcuk2ft3o8e0qm97s13hh46d04','127.0.0.1',1482241876,'__ci_last_regenerate|i:1482241731;'),('ulofe24kcuh39m3iql3gq2o02lfiqab3','127.0.0.1',1482242535,'__ci_last_regenerate|i:1482242374;'),('7pqpbdftl3jg6brah1m7mq35tc5docpe','127.0.0.1',1482242837,'__ci_last_regenerate|i:1482242700;'),('577ktksjariuhf87f2bopnpo4akacutc','127.0.0.1',1482243321,'__ci_last_regenerate|i:1482243032;'),('87t89lpt2vpve0iqahs8fn92r32bu7c4','127.0.0.1',1482243443,'__ci_last_regenerate|i:1482243334;'),('6q6mugm33kukksn2c4g6pl0s3u7gripb','127.0.0.1',1482245097,'__ci_last_regenerate|i:1482244812;'),('rnqe6t985qd7g3dh3ijkl8f4vjg7om4q','127.0.0.1',1482245295,'__ci_last_regenerate|i:1482245127;'),('8e2ahv6j549n7ka0k2o1iv6t2h2m41hd','127.0.0.1',1482245863,'__ci_last_regenerate|i:1482245620;'),('cg0age2f0krvfvok05vkrh0u68ganmsd','127.0.0.1',1482246161,'__ci_last_regenerate|i:1482246015;'),('9p92ikkhs9qmpom9rapsedpakjd3e3sk','127.0.0.1',1482246602,'__ci_last_regenerate|i:1482246333;'),('4eqt0dk05gd4ove7i4fj5lp4qs4pl6l2','127.0.0.1',1482247053,'__ci_last_regenerate|i:1482246824;'),('mn9jr1svrapuisrthpujuab3hs6lvuj8','127.0.0.1',1482247390,'__ci_last_regenerate|i:1482247141;'),('810e730evnivufjvk5rsq9pknvncii89','127.0.0.1',1482247590,'__ci_last_regenerate|i:1482247453;'),('5kt9hne3hs5a80nc9n4oni491cb5772r','127.0.0.1',1482248050,'__ci_last_regenerate|i:1482247769;'),('ir4s4l48pur5s869d7b5mpdk4pq4p3ii','127.0.0.1',1482248856,'__ci_last_regenerate|i:1482248561;'),('ienbkhuph28d9l0ie2qh766jo6t5j2bj','127.0.0.1',1482250231,'__ci_last_regenerate|i:1482250033;'),('qstfeg529l9ugk63t6260k99h4oe6ts4','127.0.0.1',1482251016,'__ci_last_regenerate|i:1482250719;'),('j4bthub2u9in0al6166tcdak6sqkgkoj','127.0.0.1',1482251105,'__ci_last_regenerate|i:1482251029;'),('ddo4s1q71m7rm03vrg1qbjb4lpr5fmtk','127.0.0.1',1482251500,'__ci_last_regenerate|i:1482251343;'),('tco97ojnjnnq3rtb1jt5gmvt9gj0vsn3','127.0.0.1',1482251649,'__ci_last_regenerate|i:1482251596;');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artists_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `modified_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `songs`
--

LOCK TABLES `songs` WRITE;
/*!40000 ALTER TABLE `songs` DISABLE KEYS */;
/*!40000 ALTER TABLE `songs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-20 17:48:33
