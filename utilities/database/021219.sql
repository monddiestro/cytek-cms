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
INSERT INTO `category_tbl` VALUES (1,'Industrial Microscopes','Industrial microscopes incorporate many complex designs that aim to improve resolution and sample contrast.','no-image.png',NULL),(2,'Analytical Instruments','Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.','no-image.png',NULL);
/*!40000 ALTER TABLE `category_tbl` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feature_img_tbl`
--

LOCK TABLES `feature_img_tbl` WRITE;
/*!40000 ALTER TABLE `feature_img_tbl` DISABLE KEYS */;
INSERT INTO `feature_img_tbl` VALUES (1,1,2,'utilities/images/feature/1.jpg',NULL);
/*!40000 ALTER TABLE `feature_img_tbl` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_banner_tbl`
--

LOCK TABLES `product_banner_tbl` WRITE;
/*!40000 ALTER TABLE `product_banner_tbl` DISABLE KEYS */;
INSERT INTO `product_banner_tbl` VALUES (1,2,'utilities/images/banners/11.jpg'),(2,2,'utilities/images/banners/2.jpg'),(3,2,'utilities/images/banners/3.jpg'),(4,2,'utilities/images/banners/4.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_feature_tbl`
--

LOCK TABLES `product_feature_tbl` WRITE;
/*!40000 ALTER TABLE `product_feature_tbl` DISABLE KEYS */;
INSERT INTO `product_feature_tbl` VALUES (1,2,'Compact Design Compatible with High Optical Performance','<h6>Greenough Optical System</h6>\r\n<p>SZ51/61 have zoom ratios of 5:1 and 6.7:1 (zoom range 0.8x-4x and 0.67x-4.5x) respectively and are affordably priced yet off the highest resolving power in their price range and are available with either 45 or 60 degree inclination angles for observation.<br/>Utilizing the Greenough optical design, all zoom bodies incorporate the latest aberration and distortion-free optics that set a new standard in optical quality while maintaining superior operability.<br/>The V-shape optical path ensures a slim zoom body - ideal for integration into other equipment or stand alone use.</p>\r\n<br/><strong>3 Dimensional Viewing</strong><p>The optimum inward angle allows just the right combination of high level flatness and depth of focus for 3D viewing. Even a specimen with significant depth can be brought into focus from top to bottom for faster inspection</p>\r\n<strong>Observation Images with High Color Fidelity</strong><p>Superior optical coatings render true color images with fine detail.</p>\r\n<strong>ESD Measures for Protecting Devices from Static Electricity</strong><p>The main unit and major accessories can quickly eliminate static electricity with the use of antistatic materials and coatings. This prevents a specimen under observation from electrostatic damage.</p>\r\n<h6>Microscope Bodies According to Your Application</h6>\r\n<p>The SZ51/61 are available as 45-degree or 60-degree oriented models suitable for use with bench stands or OEM integration. The SZ61TR is video/digital camera ready with a built in c-mount optically matched to the zoom body, that guarantees parfocal, sharp images when a camera is attached.</p>'),(2,2,'Variety of Illumination Units','<h6>LED Illumination - Combination Reflected and Transmitted Light Stand</h6>\r\n<p>Ultra thin and eco-friendly LED stands provide energy efficient trouble free usage.</p>\r\n<h6>\"Off the Bench\" Illuminator</h6>\r\n<p>This specially designed fiber optic light source can mount directly onto the stand for a clutter free workspace. Available with single, double interlock or ring light guides, this system will provide bright long life illumination.</p><h6>Coaxial Reflected Light Illumination System</h6>\r\n<p>The SZ61 combines a polarizer and a 1/4? plate for easier viewing of specimens, which are difficult to examine under oblique reflected light illumination.</p>\r\n<h6>White LED Illuminator System</h6>\r\n<p>A long-lasting ringlight illuminator with minimal thermal effect and superior brightness is ideal for homogeneous lighting.</p>');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_specs_tbl`
--

LOCK TABLES `product_specs_tbl` WRITE;
/*!40000 ALTER TABLE `product_specs_tbl` DISABLE KEYS */;
INSERT INTO `product_specs_tbl` VALUES (1,1,'<!-- title -->\r\n<h3>BX53M Specifications (for Reflected and Reflected/Transmitted Light Combination)</h3>\r\n<!-- table wrapper -->\r\n<div class=\"table-responsive\">\r\n  <table class=\"table table-bordered\" cellpadding=\"0\" cellspacing=\"0\">\r\n    <tbody>\r\n      <tr>\r\n        <td colspan=\"2\" rowspan=\"1\">\r\n        </td>\r\n        <td style=\"text-align: center;\">\r\n          <strong>BX53MTRF-S</strong>\r\n        </td>\r\n        <td style=\"text-align: center;\">\r\n          <strong>BX53MRF-S</strong>\r\n        </td>\r\n        <td style=\"text-align: center;\">\r\n          <strong>BXFM</strong>\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\">\r\n          Optical syste/td>\r\n        <td colspan=\"3\" rowspan=\"1\">\r\n          UIS2 optical system (infinity-corrected)\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"1\" rowspan=\"3\">\r\n          Microscope frame\r\n        </td>\r\n        <td>\r\n          Illumination\r\n        </td>\r\n        <td>\r\n          Reflected/transmitted\r\n        </td>\r\n        <td colspan=\"2\" rowspan=\"1\">\r\n          Reflected\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n          Focus\r\n        </td>\r\n        <td colspan=\"2\" rowspan=\"1\">\r\n          Stroke: 25 mm <br>\r\n          Fine stroke per rotation: 100 ?m\r\n          <br>\r\n          Minimum graduation: 1 ?m\r\n          <br>\r\n          With upper limit stopper, torque adjustment for coarse handle\r\n        </td>\r\n        <td>\r\n          Stroke: 30 mm\r\n          <br>\r\n          Fine stroke per rotation: 200 ?m\r\n          <br>\r\n          Minimum graduation: 2 ?m\r\n          <br>\r\n          With torque adjustment for coarse&nbsp;handle\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n          Max. specimen height\r\n        </td>\r\n        <td>\r\n            35 mm (w/o spacer)\r\n            <br>\r\n            75 mm (with BX3M-ARMAD)\r\n        </td>\r\n        <td>\r\n          65 mm (w/o spacer)\r\n          <br>\r\n          105 mm (with BX3M-ARMAD)\r\n        </td>\r\n        <td>\r\n          Depends on the mounting&nbsp;configuration\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"1\" rowspan=\"2\">\r\n          Observation tube\r\n        </td>\r\n        <td>\r\n          Wide-field FN 22\r\n        </td>\r\n        <td colspan=\"3\" rowspan=\"1\">\r\n          Inverted: binocular, trinocular, tilting binocular\r\n          <br>\r\n          Erect: trinocular, tilting binocular\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n          Super-wide-field FN 26.5\r\n        </td>\r\n        <td colspan=\"3\" rowspan=\"1\">\r\n          Inverted: trinocular\r\n          <br>\r\n          Erect: trinocular, tilting trinocular\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"1\" rowspan=\"3\">\r\n          Reflected light illumination\r\n        </td>\r\n        <td colspan=\"1\" rowspan=\"2\">\r\n          Traditional observation&nbsp;technique\r\n        </td>\r\n        <td colspan=\"3\" rowspan=\"1\">\r\n          BX3M-RLAS-S\r\n          <br>\r\n          Coded, white LED, BF/DF/DIC/POL/MIX FS, AS (with centering mechanism)\r\n          <br>\r\n          BX3M-KMA-S\r\n          <br>\r\n          White LED, BF/DIC/POL/MIX FS, AS (with centering mechanism)\r\n          <br>\r\n          BX3M-RLA-S\r\n          <br>\r\n          100W halogen lamp, white LED, BF/DF/DIC/POL/MIX/ FS, AS (with centering mechanism),\r\n          <br>\r\n          BF/DF interlocking, ND filter\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" rowspan=\"1\" style=\"text-align: center;\">\r\n          -\r\n        </td>\r\n        <td>\r\n            U-KMAS\r\n            <br>\r\n            White LED, 100W halogen\r\n            <br>\r\n            Fiber illumination, BF/DIC/POL/MIX\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n          Fluorescence\r\n        </td>\r\n        <td colspan=\"3\" rowspan=\"1\">\r\n          BX3M-URAS-S\r\n          <br>\r\n          Coded, 100W mercury lamp, 4 position mirror unit turret, (standard: WB, WG, WU+BF etc)\r\n          <br>\r\n          With FS, AS (with centering mechanism), with shutter mechanism\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" rowspan=\"1\">\r\n          Transmitted light\r\n        </td>\r\n        <td rowspan=\"1\">\r\n          White LED\r\n          <br>\r\n          Abbe/long working distance&nbsp;condensers\r\n        </td>\r\n        <td colspan=\"2\" rowspan=\"1\" style=\"text-align: center;\">\r\n          -\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"1\" rowspan=\"2\">\r\n          Revolving nosepiece\r\n        </td>\r\n        <td>\r\n          For BF\r\n        </td>\r\n        <td colspan=\"3\" rowspan=\"1\">\r\n          Sextuple, centering sextuple, septuple, coded quintuple (optional motorized revolving nosepieces)\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td>\r\n          For BF/DF\r\n        </td>\r\n        <td colspan=\"3\" rowspan=\"1\">\r\n          Sextuple, quintuple, centering quintuple, coded quintuple (optional motorized revolving nosepieces)\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" rowspan=\"1\">\r\n          Stage\r\n        </td>\r\n        <td colspan=\"2\" rowspan=\"1\">\r\n          Coaxial left (right) handle stage:\r\n          <br>\r\n          76 mm × 52 mm, with torque adjustment\r\n          <br>\r\n          Large-size coaxial left (right) handle stage:\r\n          <br>\r\n          105 mm × 100 mm, with locking mechanism in Y-axis\r\n          <br>\r\n          Large-size coaxial right handle stage:\r\n          <br>\r\n          150 mm × 100 mm, with torque adjustment and locking mechanism in Y-axis\r\n        </td>\r\n        <td style=\"text-align: center;\">\r\n          -\r\n        </td>\r\n      </tr>\r\n      <tr>\r\n        <td colspan=\"2\" rowspan=\"1\">\r\n          Weight\r\n        </td>\r\n        <td>\r\n          Approx. 18.3 kg\r\n          <br>\r\n          (Microscope frame 7.6 kg)\r\n        </td>\r\n        <td>\r\n          Approx. 15.8 kg\r\n          <br>\r\n          (Microscope frame 7.4 kg)\r\n        </td>\r\n        <td>\r\n          Approx. 11.1 kg\r\n          <br>\r\n          (Microscope frame 1.9 kg)\r\n        </td>\r\n      </tr>\r\n    </tbody>\r\n  </table>\r\n</div>\r\n'),(2,2,'<table table-type=\"Safe Table\" class=\"specifications-table nowrap nowrap default-scrolling\"><tbody><tr class=\"split-cell-1-odd split-cell-2-odd\"><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"1\">Optical System</th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\"></th><td colspan=\"5\">\r\n                        Greenough Optical System\r\n                    </td></tr><tr class=\"split-cell-1-even split-cell-2-even\"><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"1\">Total Magnification</th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\"></th><td colspan=\"5\">\r\n                        2.0x-270x [SZ61]*1\r\n                        <br>\r\n                        2.4x-240x [SZ51]*1\r\n                    </td></tr><tr class=\"split-cell-1-odd split-cell-2-odd\"><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"1\">Zoom Body</th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\">Zoom Ratio</th><td colspan=\"5\">\r\n                        6.7 (0.67x-4.5x) [SZ61]\r\n                        <br>\r\n                        5 (0.8x-4x) [SZ51]\r\n                    </td></tr><tr class=\"split-cell-1-odd split-cell-2-even\"><th scope=\"row\" class=\"split-cell split-cell-duplicate split-cell-with-hidden\" split-cell=\"1\"><div class=\"hidden\">Zoom Body</div></th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\">AS</th><td colspan=\"5\">\r\n                        -\r\n                    </td></tr><tr class=\"split-cell-1-even split-cell-2-odd\"><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"1\">Observation Tube</th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\"></th><td colspan=\"5\">\r\n                        Binocular (Tube Inclination Angle 45°/60°)/Trinocular Observation Tube (0.5x Photographic Lens Built-in) [SZ61]\r\n                        <br>\r\n                        Binocular Observation Tube (Tube Inclination Angle 45°/60°) [SZ51]\r\n                    </td></tr><tr class=\"split-cell-1-odd split-cell-2-even\"><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"1\">Focus</th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\"></th><td colspan=\"5\">\r\n                        Stand\r\n                    </td></tr><tr class=\"split-cell-1-even split-cell-2-odd\"><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"1\">Objective Lens</th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\">Magnification</th><td>\r\n                        Type\r\n                    </td><td>\r\n                        N.A.\r\n                    </td><td>\r\n                        W.D. (mm)\r\n                    </td><td>\r\n                        Total Magnification *2\r\n                    </td><td>\r\n                        Field Diameter of View (mm)*2\r\n                    </td></tr><tr class=\"split-cell-1-even split-cell-2-even\"><th scope=\"row\" class=\"split-cell split-cell-duplicate split-cell-with-hidden\" split-cell=\"1\"><div class=\"hidden\">Objective Lens</div></th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\">0.3x</th><td>\r\n                        Auxiliary Objective Lens\r\n                    </td><td>\r\n                        0.02 - 0.024\r\n                    </td><td>\r\n                        350 - 250\r\n                    </td><td>\r\n                        2x - 13.5x [SZ61]\r\n                        <br>\r\n                        2.4x - 12x [SZ51]\r\n                    </td><td>\r\n                        Ø109.5 - Ø16.3 [SZ61]\r\n                        <br>\r\n                        Ø91.7 - Ø18.3 [SZ51]\r\n                    </td></tr><tr class=\"split-cell-1-even split-cell-2-odd\"><th scope=\"row\" class=\"split-cell split-cell-duplicate split-cell-with-hidden\" split-cell=\"1\"><div class=\"hidden\">Objective Lens</div></th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\">0.4x</th><td>\r\n                        Auxiliary Objective Lens\r\n                    </td><td>\r\n                        0.027 - 0.032\r\n                    </td><td>\r\n                        250 - 180\r\n                    </td><td>\r\n                        2.7x - 18x [SZ61]\r\n                        <br>\r\n                        3.2x - 16x [SZ51]\r\n                    </td><td>\r\n                        Ø82.1 - Ø12.2 [SZ61]\r\n                        <br>\r\n                        Ø68.8 - Ø13.8 [SZ51]\r\n                    </td></tr><tr class=\"split-cell-1-even split-cell-2-even\"><th scope=\"row\" class=\"split-cell split-cell-duplicate split-cell-with-hidden\" split-cell=\"1\"><div class=\"hidden\">Objective Lens</div></th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\">0.5x</th><td>\r\n                        Auxiliary Objective Lens\r\n                    </td><td>\r\n                        0.036\r\n                    </td><td>\r\n                        200\r\n                    </td><td>\r\n                        3.4x - 22.5x [SZ61]\r\n                        <br>\r\n                        4x - 20x [SZ51]\r\n                    </td><td>\r\n                        Ø65.7 - Ø9.8 [SZ61]\r\n                        <br>\r\n                        Ø55 - Ø11 [SZ51]\r\n                    </td></tr><tr class=\"split-cell-1-even split-cell-2-odd\"><th scope=\"row\" class=\"split-cell split-cell-duplicate split-cell-with-hidden\" split-cell=\"1\"><div class=\"hidden\">Objective Lens</div></th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\">0.62x</th><td>\r\n                        Auxiliary Objective Lens\r\n                    </td><td>\r\n                        0.042\r\n                    </td><td>\r\n                        160\r\n                    </td><td>\r\n                        4.2x - 27.9x [SZ61]\r\n                        <br>\r\n                        5x - 24.8x [SZ51]\r\n                    </td><td>\r\n                        Ø53 - Ø7.9 [SZ61]\r\n                        <br>\r\n                        Ø44.4 - Ø8.9 [SZ51]\r\n                    </td></tr><tr class=\"split-cell-1-even split-cell-2-even\"><th scope=\"row\" class=\"split-cell split-cell-duplicate split-cell-with-hidden\" split-cell=\"1\"><div class=\"hidden\">Objective Lens</div></th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\">0.75x</th><td>\r\n                        Auxiliary Objective Lens\r\n                    </td><td>\r\n                        0.053\r\n                    </td><td>\r\n                        130\r\n                    </td><td>\r\n                        5x - 33.8x [SZ61]\r\n                        <br>\r\n                        6x - 30x [SZ51]\r\n                    </td><td>\r\n                        Ø43.8 - Ø6.5 [SZ61]\r\n                        <br>\r\n                        Ø36.7 - Ø7.3 [SZ51]\r\n                    </td></tr><tr class=\"split-cell-1-even split-cell-2-odd\"><th scope=\"row\" class=\"split-cell split-cell-duplicate split-cell-with-hidden\" split-cell=\"1\"><div class=\"hidden\">Objective Lens</div></th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\">1x</th><td>\r\n                        -\r\n                    </td><td>\r\n                        0.071\r\n                    </td><td>\r\n                        110\r\n                    </td><td>\r\n                        6.7x - 45x [SZ61]\r\n                        <br>\r\n                        8x - 40x [SZ51]\r\n                    </td><td>\r\n                        Ø32.8 - Ø4.9 [SZ61]\r\n                        <br>\r\n                        Ø27.5-Ø5.5 [SZ51]\r\n                    </td></tr><tr class=\"split-cell-1-even split-cell-2-even\"><th scope=\"row\" class=\"split-cell split-cell-duplicate split-cell-with-hidden\" split-cell=\"1\"><div class=\"hidden\">Objective Lens</div></th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\">1.5x</th><td>\r\n                        Auxiliary Objective Lens\r\n                    </td><td>\r\n                        0.1\r\n                    </td><td>\r\n                        61\r\n                    </td><td>\r\n                        10.1x - 67.5x [SZ61]\r\n                        <br>\r\n                        12x - 60x [SZ51]\r\n                    </td><td>\r\n                        Ø21.9 - Ø3.3 [SZ61]\r\n                        <br>\r\n                        Ø18.3 - Ø3.7 [SZ51]\r\n                    </td></tr><tr class=\"split-cell-1-even split-cell-2-odd\"><th scope=\"row\" class=\"split-cell split-cell-duplicate split-cell-with-hidden\" split-cell=\"1\"><div class=\"hidden\">Objective Lens</div></th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\">2x</th><td>\r\n                        Auxiliary Objective Lens\r\n                    </td><td>\r\n                        0.142\r\n                    </td><td>\r\n                        38\r\n                    </td><td>\r\n                        13.4x - 90x [SZ61]\r\n                        <br>\r\n                        16x - 80x [SZ51]\r\n                    </td><td>\r\n                        Ø16.4 - Ø2.4 [SZ61]\r\n                        <br>\r\n                        Ø13.8 - Ø2.8 [SZ51]\r\n                    </td></tr><tr class=\"split-cell-1-odd split-cell-2-even\"><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"1\">Dimensions</th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\"></th><td colspan=\"5\">\r\n                        194(W)x253(D)x368(H)mm\r\n                    </td></tr><tr class=\"split-cell-1-even split-cell-2-odd\"><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"1\">Weight</th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\"></th><td colspan=\"5\">\r\n                        3.5 kg (in Standard Combination)`\r\n                    </td></tr><tr class=\"split-cell-1-odd split-cell-2-even\"><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"1\">Remark</th><th scope=\"row\" class=\"split-cell split-cell-header\" split-cell=\"2\"></th><td colspan=\"5\">\r\n                        *1 total magnification range possible by combining an objective lens and eyepiece\r\n                        <br>\r\n                        *2 in the case of using eyepiece 10x\r\n                    </td></tr></tbody></table>');
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
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tbl`
--

LOCK TABLES `product_tbl` WRITE;
/*!40000 ALTER TABLE `product_tbl` DISABLE KEYS */;
INSERT INTO `product_tbl` VALUES (1,1,2,'Industrial Microscope BX53M','Designed with modularity in mind, the BX3M series provide versatility for a wide variety of materials science and industrial applications. With improved integration with OLYMPUS Stream software, the BX3M provides a seamless workflow for standard microscopy and digital imaging users from observation to report creation.','utilities/images/meta/BX53M.jpg','microscope, bx53m, industrial, light, industrial microscope, light microscope',NULL),(2,1,3,'SZ51','The SZ51 and SZ61 microscopes, deliver images with superb depth of field as well as clarity, detail and true-to-life color and built in ESD protection. Their dependable, high-performance optics are central to producing consistent accurate results.','utilities/images/meta/sz51.jpg','Industrial, Stereo, Zoom, Microscope, Microscopes ','2019-02-12 14:25:19');
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
  `subcat_title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`subcat_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `subcategory_tbl_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category_tbl` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategory_tbl`
--

LOCK TABLES `subcategory_tbl` WRITE;
/*!40000 ALTER TABLE `subcategory_tbl` DISABLE KEYS */;
INSERT INTO `subcategory_tbl` VALUES (2,1,'Stereo Zoom Microscope','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(3,1,'Light Microscope','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(4,1,'Digital Microscope','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(5,1,'Semiconductor Microscope','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(6,1,'Measuring Microscope','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(7,1,'Cleanliness Inspection Microscope','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(8,1,'Laser Scanning Confocal Microscope','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(9,1,'Image Analysis Software','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(10,1,'Microscope Digital Camera','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(11,1,'Objective Lense','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(12,1,'Microscope Accessories','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(13,2,'XRF Analyzers Delta Series Handheld XRF','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(14,2,'XRF Analyzers Vanta Series Handheld XRF','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL),(15,2,'XRD Analzers','Bacon ipsum dolor amet tail cow pork chop spare ribs meatloaf shank. Shank ham hock andouille tail corned beef cupim kielbasa beef drumstick biltong venison kevin ball tip buffalo. Cupim ball tip shankle, frankfurter jerky boudin ham hock chicken kielbasa. Pastrami pork chop boudin landjaeger doner tenderloin jowl fatback beef ribs.',NULL,NULL);
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

-- Dump completed on 2019-02-12 17:09:55
