-- MySQL dump 10.16  Distrib 10.1.34-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: cytek
-- ------------------------------------------------------
-- Server version	10.1.34-MariaDB

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
-- Table structure for table `category_tbl`
--

DROP TABLE IF EXISTS `category_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_tbl` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_desc` varchar(100) NOT NULL,
  `meta_title` varchar(100) DEFAULT NULL,
  `meta_desc` varchar(1000) DEFAULT NULL,
  `meta_img` varchar(100) DEFAULT NULL,
  `meta_keywords` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_tbl`
--

LOCK TABLES `category_tbl` WRITE;
/*!40000 ALTER TABLE `category_tbl` DISABLE KEYS */;
INSERT INTO `category_tbl` VALUES (1,'Industrial Microscopes','Lorem Ipsum','Industrial microscopes incorporate many complex designs that aim to improve resolution and sample contrast.','no-image.png',NULL),(2,'Analytical Instruments','Lorem Ipsum','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','no-image.png',NULL);
/*!40000 ALTER TABLE `category_tbl` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_tbl`
--

LOCK TABLES `page_tbl` WRITE;
/*!40000 ALTER TABLE `page_tbl` DISABLE KEYS */;
INSERT INTO `page_tbl` VALUES (1,'This is home page','This is homepage sample','test,test,test','no-image.png');
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
  `prod_id` int(10) NOT NULL,
  `feature_title` varchar(100) NOT NULL,
  `feature_desc` varchar(60000) DEFAULT NULL,
  `feature_img` varchar(100) NOT NULL,
  PRIMARY KEY (`feature_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `product_feature_tbl_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product_tbl` (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_feature_tbl`
--

LOCK TABLES `product_feature_tbl` WRITE;
/*!40000 ALTER TABLE `product_feature_tbl` DISABLE KEYS */;
INSERT INTO `product_feature_tbl` VALUES (3,1,'test','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','test2.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_specs_tbl`
--

LOCK TABLES `product_specs_tbl` WRITE;
/*!40000 ALTER TABLE `product_specs_tbl` DISABLE KEYS */;
INSERT INTO `product_specs_tbl` VALUES (1,1,'<!-- title -->\r\n<h3>BX53M Specifications (for Reflected and Reflected/Transmitted Light Combination)</h3>\r\n<!-- table wrapper -->\r\n<div class=\"table-responsive\">\r\n  <table class=\"table table-bordered\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tbody>\r\n      <tr>\r\n        <td colspan=\"2\" rowspan=\"1\">\r\n        </td>\r\n        <td style=\"text-align: center;\">\r\n          <strong>BX53MTRF-S</strong>\r\n        </td>\r\n        <td style=\"text-align: center;\">\r\n          <strong>BX53MRF-S</strong>\r\n        </td>\r\n        <td style=\"text-align: center;\">\r\n          <strong>BXFM</strong>\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\">\r\n          Optical syste/td>\r\n        <td colspan=\"3\" rowspan=\"1\">\r\n          UIS2 optical system (infinity-corrected)\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"1\" rowspan=\"3\">\r\n          Microscope frame\r\n        </td>\r\n        <td>\r\n          Illumination\r\n        </td>\r\n        <td>\r\n          Reflected/transmitted\r\n        </td>\r\n        <td colspan=\"2\" rowspan=\"1\">\r\n          Reflected\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n          Focus\r\n        </td>\r\n        <td colspan=\"2\" rowspan=\"1\">\r\n          Stroke: 25 mm <br>\r\n          Fine stroke per rotation: 100 ?m\r\n          <br>\r\n          Minimum graduation: 1 ?m\r\n          <br>\r\n          With upper limit stopper, torque adjustment for coarse handle\r\n        </td>\r\n        <td>\r\n          Stroke: 30 mm\r\n          <br>\r\n          Fine stroke per rotation: 200 ?m\r\n          <br>\r\n          Minimum graduation: 2 ?m\r\n          <br>\r\n          With torque adjustment for coarse&nbsp;handle\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n          Max. specimen height\r\n        </td>\r\n        <td>\r\n            35 mm (w/o spacer)\r\n            <br>\r\n            75 mm (with BX3M-ARMAD)\r\n        </td>\r\n        <td>\r\n          65 mm (w/o spacer)\r\n          <br>\r\n          105 mm (with BX3M-ARMAD)\r\n        </td>\r\n        <td>\r\n          Depends on the mounting&nbsp;configuration\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"1\" rowspan=\"2\">\r\n          Observation tube\r\n        </td>\r\n        <td>\r\n          Wide-field FN 22\r\n        </td>\r\n        <td colspan=\"3\" rowspan=\"1\">\r\n          Inverted: binocular, trinocular, tilting binocular\r\n          <br>\r\n          Erect: trinocular, tilting binocular\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n          Super-wide-field FN 26.5\r\n        </td>\r\n        <td colspan=\"3\" rowspan=\"1\">\r\n          Inverted: trinocular\r\n          <br>\r\n          Erect: trinocular, tilting trinocular\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"1\" rowspan=\"3\">\r\n          Reflected light illumination\r\n        </td>\r\n        <td colspan=\"1\" rowspan=\"2\">\r\n          Traditional observation&nbsp;technique\r\n        </td>\r\n        <td colspan=\"3\" rowspan=\"1\">\r\n          BX3M-RLAS-S\r\n          <br>\r\n          Coded, white LED, BF/DF/DIC/POL/MIX FS, AS (with centering mechanism)\r\n          <br>\r\n          BX3M-KMA-S\r\n          <br>\r\n          White LED, BF/DIC/POL/MIX FS, AS (with centering mechanism)\r\n          <br>\r\n          BX3M-RLA-S\r\n          <br>\r\n          100W halogen lamp, white LED, BF/DF/DIC/POL/MIX/ FS, AS (with centering mechanism),\r\n          <br>\r\n          BF/DF interlocking, ND filter\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" rowspan=\"1\" style=\"text-align: center;\">\r\n          -\r\n        </td>\r\n        <td>\r\n            U-KMAS\r\n            <br>\r\n            White LED, 100W halogen\r\n            <br>\r\n            Fiber illumination, BF/DIC/POL/MIX\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n          Fluorescence\r\n        </td>\r\n        <td colspan=\"3\" rowspan=\"1\">\r\n          BX3M-URAS-S\r\n          <br>\r\n          Coded, 100W mercury lamp, 4 position mirror unit turret, (standard: WB, WG, WU+BF etc)\r\n          <br>\r\n          With FS, AS (with centering mechanism), with shutter mechanism\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" rowspan=\"1\">\r\n          Transmitted light\r\n        </td>\r\n        <td rowspan=\"1\">\r\n          White LED\r\n          <br>\r\n          Abbe/long working distance&nbsp;condensers\r\n        </td>\r\n        <td colspan=\"2\" rowspan=\"1\" style=\"text-align: center;\">\r\n          -\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"1\" rowspan=\"2\">\r\n          Revolving nosepiece\r\n        </td>\r\n        <td>\r\n          For BF\r\n        </td>\r\n        <td colspan=\"3\" rowspan=\"1\">\r\n          Sextuple, centering sextuple, septuple, coded quintuple (optional motorized revolving nosepieces)\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n          For BF/DF\r\n        </td>\r\n        <td colspan=\"3\" rowspan=\"1\">\r\n          Sextuple, quintuple, centering quintuple, coded quintuple (optional motorized revolving nosepieces)\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" rowspan=\"1\">\r\n          Stage\r\n        </td>\r\n        <td colspan=\"2\" rowspan=\"1\">\r\n          Coaxial left (right) handle stage:\r\n          <br>\r\n          76 mm × 52 mm, with torque adjustment\r\n          <br>\r\n          Large-size coaxial left (right) handle stage:\r\n          <br>\r\n          105 mm × 100 mm, with locking mechanism in Y-axis\r\n          <br>\r\n          Large-size coaxial right handle stage:\r\n          <br>\r\n          150 mm × 100 mm, with torque adjustment and locking mechanism in Y-axis\r\n        </td>\r\n        <td style=\"text-align: center;\">\r\n          -\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" rowspan=\"1\">\r\n          Weight\r\n        </td>\r\n        <td>\r\n          Approx. 18.3 kg\r\n          <br>\r\n          (Microscope frame 7.6 kg)\r\n        </td>\r\n        <td>\r\n          Approx. 15.8 kg\r\n          <br>\r\n          (Microscope frame 7.4 kg)\r\n        </td>\r\n        <td>\r\n          Approx. 11.1 kg\r\n          <br>\r\n          (Microscope frame 1.9 kg)\r\n        </td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n</div>\r\n');
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
  `prod_name` varchar(100) NOT NULL,
  `prod_desc` varchar(60000) DEFAULT NULL,
  `cat_id` int(10) DEFAULT NULL,
  `subcat_id` int(10) NOT NULL,
  `meta_title` varchar(100) NOT NULL,
  `meta_desc` varchar(500) NOT NULL,
  `meta_img` varchar(100) DEFAULT NULL,
  `meta_keyword` varchar(200) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tbl`
--

LOCK TABLES `product_tbl` WRITE;
/*!40000 ALTER TABLE `product_tbl` DISABLE KEYS */;
INSERT INTO `product_tbl` VALUES (1,'BX53M','Designed with modularity in mind, the BX3M series provide versatility for a wide variety of materials science and industrial applications. With improved integration with OLYMPUS Stream software, the BX3M provides a seamless workflow for standard microscopy and digital imaging users from observation to report creation.',1,2,'Industrial Microscope BX53M','Designed with modularity in mind, the BX3M series provide versatility for a wide variety of materials science and industrial applications. With improved integration with OLYMPUS Stream software, the BX3M provides a seamless workflow for standard microscopy and digital imaging users from observation to report creation.','BX53M.jpg','microscope, bx53m, industrial, light, industrial microscope, light microscope');
/*!40000 ALTER TABLE `product_tbl` ENABLE KEYS */;
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
  `subcat_desc` varchar(100) NOT NULL,
  `meta_title` varchar(100) DEFAULT NULL,
  `meta_desc` varchar(1000) DEFAULT NULL,
  `meta_img` varchar(100) DEFAULT NULL,
  `meta_keywords` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`subcat_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `subcategory_tbl_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category_tbl` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategory_tbl`
--

LOCK TABLES `subcategory_tbl` WRITE;
/*!40000 ALTER TABLE `subcategory_tbl` DISABLE KEYS */;
INSERT INTO `subcategory_tbl` VALUES (2,1,'Light Microscope',NULL,NULL,NULL,NULL),(3,1,'Stereo Zoom Microscope',NULL,NULL,NULL,NULL),(4,1,'DIgital Microscope',NULL,NULL,NULL,NULL),(5,1,'Semiconductor Microscope',NULL,NULL,NULL,NULL),(6,1,'Measuring Microscope',NULL,NULL,NULL,NULL),(7,1,'Cleanliness Inspection Microscope',NULL,NULL,NULL,NULL),(8,1,'Laser Scanning Confocal Microscope',NULL,NULL,NULL,NULL),(9,1,'Image Analysis Software',NULL,NULL,NULL,NULL),(10,1,'Microscope Digital Cameras',NULL,NULL,NULL,NULL),(11,1,'Objective Lenses',NULL,NULL,NULL,NULL),(12,1,'Microscope Accessories',NULL,NULL,NULL,NULL),(13,2,'XRF Analyzer',NULL,NULL,NULL,NULL),(14,2,'XRD Analyzer',NULL,NULL,NULL,NULL);
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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tbl`
--

LOCK TABLES `user_tbl` WRITE;
/*!40000 ALTER TABLE `user_tbl` DISABLE KEYS */;
INSERT INTO `user_tbl` VALUES (1,'Mond','Diestro',1,'reymonddiestro@gmail.com','639176278173','692db33e4a3ff050ce164b9eeb4e46e4');
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

-- Dump completed on 2019-01-08  1:20:32
