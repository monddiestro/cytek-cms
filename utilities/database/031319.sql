-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: cytek
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

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
-- Table structure for table `article_tbl`
--

DROP TABLE IF EXISTS `article_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_tbl` (
  `article_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `description` varchar(6000) NOT NULL,
  `content` varchar(6000) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_tbl`
--

LOCK TABLES `article_tbl` WRITE;
/*!40000 ALTER TABLE `article_tbl` DISABLE KEYS */;
INSERT INTO `article_tbl` VALUES (4,'Cute','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','utilities/images/articles/download.jpg',NULL,'2019-03-13 00:03:14');
/*!40000 ALTER TABLE `article_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_tbl`
--

DROP TABLE IF EXISTS `category_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_tbl` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(100) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `keyword` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_tbl`
--

LOCK TABLES `category_tbl` WRITE;
/*!40000 ALTER TABLE `category_tbl` DISABLE KEYS */;
INSERT INTO `category_tbl` VALUES (1,'Industrial Microscopes','Industrial microscopes incorporate many complex designs that aim to improve resolution and sample contrast.','',NULL),(2,'Analytical Instrument\'s','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','utilities/images/meta/article_image1.jpg','test,test,aw');
/*!40000 ALTER TABLE `category_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_tbl`
--

DROP TABLE IF EXISTS `company_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_tbl` (
  `company_id` int(10) NOT NULL AUTO_INCREMENT,
  `address` varchar(1000) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `office_hours` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook` varchar(1000) DEFAULT NULL,
  `twitter` varchar(1000) DEFAULT NULL,
  `instagram` varchar(1000) DEFAULT NULL,
  `description` varchar(60000) DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_tbl`
--

LOCK TABLES `company_tbl` WRITE;
/*!40000 ALTER TABLE `company_tbl` DISABLE KEYS */;
INSERT INTO `company_tbl` VALUES (1,'asds','contact number','office hours','email','','','',NULL);
/*!40000 ALTER TABLE `company_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events_tbl`
--

DROP TABLE IF EXISTS `events_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events_tbl` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `content` varchar(60000) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `event_date` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `keyword` varchar(100) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events_tbl`
--

LOCK TABLES `events_tbl` WRITE;
/*!40000 ALTER TABLE `events_tbl` DISABLE KEYS */;
INSERT INTO `events_tbl` VALUES (3,'asdasda','asdasd','asdasd','utilities/images/events/E_Mail_Signature_Reymond1.png','2019-03-14 00:00:00','2019-03-12 22:33:27',''),(4,'asdsadasdsad','asdasd','asdad','utilities/images/events/E_Mail_Signature_Reymond2.png','2019-03-28 00:00:00','2019-03-12 22:34:23','');
/*!40000 ALTER TABLE `events_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feature_img_tbl`
--

DROP TABLE IF EXISTS `feature_img_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feature_img_tbl` (
  `img_id` int(10) NOT NULL AUTO_INCREMENT,
  `feature_id` int(100) NOT NULL,
  `prod_id` int(100) DEFAULT NULL,
  `img` varchar(1000) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feature_img_tbl`
--

LOCK TABLES `feature_img_tbl` WRITE;
/*!40000 ALTER TABLE `feature_img_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `feature_img_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lead_tbl`
--

DROP TABLE IF EXISTS `lead_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lead_tbl` (
  `lead_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contact` int(13) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `company_name` varchar(1000) NOT NULL,
  `department` varchar(1000) DEFAULT NULL,
  `position` varchar(1000) DEFAULT NULL,
  `message` varchar(60000) DEFAULT NULL,
  `source` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`lead_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lead_tbl`
--

LOCK TABLES `lead_tbl` WRITE;
/*!40000 ALTER TABLE `lead_tbl` DISABLE KEYS */;
INSERT INTO `lead_tbl` VALUES (1,'asda',0,'asd','asd','asd','asd','asd',' Product Page',2,'2019-03-02 17:22:42');
/*!40000 ALTER TABLE `lead_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_tbl`
--

DROP TABLE IF EXISTS `page_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_tbl` (
  `page_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `meta_description` varchar(500) NOT NULL,
  `meta_keywords` varchar(500) NOT NULL,
  `meta_image` varchar(500) NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_tbl`
--

LOCK TABLES `page_tbl` WRITE;
/*!40000 ALTER TABLE `page_tbl` DISABLE KEYS */;
INSERT INTO `page_tbl` VALUES (1,'Bacon Ipsum','Bacon ipsum dolor amet biltong pork chop alcatra cow tongue pork belly. Pork belly beef t-bone swine. Biltong pork loin drumstick, filet mignon porchetta burgdoggen shank tenderloin. Strip steak pork loin shoulder rump flank doner jowl beef corned beef chicken tenderloin ball tip meatball venison. Sausage pastrami flank jowl turkey. Bacon shank andouille fatback. Meatloaf sirloin ham hock, ball tip tri-tip pork tenderloin andouille leberkas.This is homepage sample','test,test,test','utilities/images/meta/180219_CYTEK_WEB_BANNER-011.png'),(2,'About','asdasdsadasdasdas','','utilities/images/meta/1349x551_chevrolet_makati_0123191.png'),(3,'Events','','',''),(4,'About','asdadsasd','','utilities/images/meta/375x590_chevrolet_makati_012319.png'),(5,'Article','','','');
/*!40000 ALTER TABLE `page_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_banner_tbl`
--

DROP TABLE IF EXISTS `product_banner_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_banner_tbl` (
  `banner_id` int(10) NOT NULL AUTO_INCREMENT,
  `prod_id` int(10) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`banner_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `product_banner_tbl_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product_tbl` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_banner_tbl`
--

LOCK TABLES `product_banner_tbl` WRITE;
/*!40000 ALTER TABLE `product_banner_tbl` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_banner_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_feature_tbl`
--

DROP TABLE IF EXISTS `product_feature_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_feature_tbl` (
  `feature_id` int(10) NOT NULL AUTO_INCREMENT,
  `prod_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(10000) NOT NULL,
  PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_feature_tbl`
--

LOCK TABLES `product_feature_tbl` WRITE;
/*!40000 ALTER TABLE `product_feature_tbl` DISABLE KEYS */;
INSERT INTO `product_feature_tbl` VALUES (3,3,'asdsad','asdsad'),(4,3,'asdasdas','\\\'asdasdasasd\\\' asdasda\\\'\\\'asd \\\'asd\\\'');
/*!40000 ALTER TABLE `product_feature_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_specs_tbl`
--

DROP TABLE IF EXISTS `product_specs_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_specs_tbl` (
  `specs_id` int(10) NOT NULL AUTO_INCREMENT,
  `prod_id` int(10) NOT NULL,
  `specs` varchar(65000) NOT NULL,
  PRIMARY KEY (`specs_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `product_specs_tbl_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product_tbl` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_specs_tbl`
--

LOCK TABLES `product_specs_tbl` WRITE;
/*!40000 ALTER TABLE `product_specs_tbl` DISABLE KEYS */;
INSERT INTO `product_specs_tbl` VALUES (3,3,'test\\\'s abcd'),(4,4,''),(5,5,''),(6,6,'');
/*!40000 ALTER TABLE `product_specs_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_tbl`
--

DROP TABLE IF EXISTS `product_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_tbl` (
  `prod_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) DEFAULT NULL,
  `subcat_id` int(10) NOT NULL,
  `prod_title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `keyword` varchar(1000) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tbl`
--

LOCK TABLES `product_tbl` WRITE;
/*!40000 ALTER TABLE `product_tbl` DISABLE KEYS */;
INSERT INTO `product_tbl` VALUES (3,2,15,'asda','asdas','utilities/images/meta/image_184550909.jpg','asdasd','yes','2019-03-02 16:15:39'),(4,1,9,'asdsad','asd','utilities/images/meta/image_1845509091.jpg','asdasd','yes','2019-03-03 01:35:11'),(5,1,3,'asd','asd','utilities/images/meta/image_1845509092.jpg','asd','yes','2019-03-03 01:37:37'),(6,1,9,'asd','asd','utilities/images/meta/image_1845509093.jpg','asd','yes','2019-03-03 01:39:58');
/*!40000 ALTER TABLE `product_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider_tbl`
--

DROP TABLE IF EXISTS `slider_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider_tbl` (
  `slider_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider_tbl`
--

LOCK TABLES `slider_tbl` WRITE;
/*!40000 ALTER TABLE `slider_tbl` DISABLE KEYS */;
INSERT INTO `slider_tbl` VALUES (2,'Test Slider','Bacon ipsum dolor amet biltong pork chop alcatra cow tongue pork belly. Pork belly beef t-bone swine. Biltong pork loin drumstick, filet mignon porchetta burgdoggen shank tenderloin. Strip steak pork loin shoulder rump flank doner jowl beef corned beef chicken tenderloin ball tip meatball venison. Sausage pastrami flank jowl turkey. Bacon shank andouille fatback. Meatloaf sirloin ham hock, ball tip tri-tip pork tenderloin andouille leberkas.','http://localhost/cytek-cms/product','utilities/images/slider/180219_CYTEK_WEB_BANNER-01_(1)2.png'),(3,'asd','asdasd','asd','utilities/images/slider/image_184550909.jpg');
/*!40000 ALTER TABLE `slider_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategory_tbl`
--

DROP TABLE IF EXISTS `subcategory_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategory_tbl` (
  `subcat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) NOT NULL,
  `subcat_title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`subcat_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `subcategory_tbl_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category_tbl` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategory_tbl`
--

LOCK TABLES `subcategory_tbl` WRITE;
/*!40000 ALTER TABLE `subcategory_tbl` DISABLE KEYS */;
INSERT INTO `subcategory_tbl` VALUES (2,1,'Stereo Zoom Microscope','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(3,1,'Light Microscope','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(4,1,'Digital Microscope','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(5,1,'Semiconductor Microscope','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(6,1,'Measuring Microscope','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(7,1,'Cleanliness Inspection Microscope','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(8,1,'Laser Scanning Confocal Microscope','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(9,1,'Image Analysis Software','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(10,1,'Microscope Digital Camera','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(11,1,'Objective Lense','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(12,1,'Microscope Accessories','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(13,2,'XRF Analyzers Delta Series Handheld XRF','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.','utilities/images/meta/adventure.jpg',NULL),(14,2,'XRF Analyzers Vanta Series Handheld XRF','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(15,2,'XRD Analzers','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.','utilities/images/meta/avanza.jpg','test,test'),(16,2,'asdasd\'z','asdasdasd','utilities/images/meta/265x160_chevrolet_makati_0123193.png','asdasz\'zz');
/*!40000 ALTER TABLE `subcategory_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_tbl`
--

DROP TABLE IF EXISTS `user_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_tbl` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `uac_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(13) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tbl`
--

LOCK TABLES `user_tbl` WRITE;
/*!40000 ALTER TABLE `user_tbl` DISABLE KEYS */;
INSERT INTO `user_tbl` VALUES (1,'Mond','Diestro',1,'reymonddiestro@gmail.com','639176278173','692db33e4a3ff050ce164b9eeb4e46e4',NULL);
/*!40000 ALTER TABLE `user_tbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-13 18:05:05
