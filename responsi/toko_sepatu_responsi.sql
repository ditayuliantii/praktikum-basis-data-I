-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: toko_sepatu_responsi
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary table structure for view `daftar_merk`
--

DROP TABLE IF EXISTS `daftar_merk`;
/*!50001 DROP VIEW IF EXISTS `daftar_merk`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `daftar_merk` (
  `daftar merk sepatu` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `detail_bayar`
--

DROP TABLE IF EXISTS `detail_bayar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_bayar` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_sepatu` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `fk_det_sepatu` (`id_sepatu`),
  CONSTRAINT `fk_det_sepatu` FOREIGN KEY (`id_sepatu`) REFERENCES `sepatu` (`id_sepatu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_bayar`
--

LOCK TABLES `detail_bayar` WRITE;
/*!40000 ALTER TABLE `detail_bayar` DISABLE KEYS */;
INSERT INTO `detail_bayar` VALUES (2,5,2),(3,6,2),(4,7,1),(6,9,2),(12,18,1),(13,20,1),(14,21,1);
/*!40000 ALTER TABLE `detail_bayar` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `editStok` AFTER INSERT ON `detail_bayar` FOR EACH ROW BEGIN
	UPDATE sepatu
	SET 
	stok = stok - new.jumlah_beli
	WHERE id_sepatu = new.id_sepatu;

    END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `toko_sepatu_responsi`.`update_stok` AFTER UPDATE
    ON `toko_sepatu_responsi`.`detail_bayar`
    FOR EACH ROW 
    BEGIN
	IF OLD.jumlah_beli <> NEW.jumlah_beli THEN
        UPDATE sepatu SET 
        stok = stok + OLD.jumlah_beli - NEW.jumlah_beli 
        WHERE id_sepatu = NEW.id_sepatu;
	END IF;
    
    END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `header_bayar`
--

DROP TABLE IF EXISTS `header_bayar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `header_bayar` (
  `no_nota` int(11) NOT NULL AUTO_INCREMENT,
  `id_detail` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa_bayar` int(11) NOT NULL,
  PRIMARY KEY (`no_nota`),
  KEY `fk_head_detail` (`id_detail`),
  CONSTRAINT `fk_head_detail` FOREIGN KEY (`id_detail`) REFERENCES `detail_bayar` (`id_detail`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `header_bayar`
--

LOCK TABLES `header_bayar` WRITE;
/*!40000 ALTER TABLE `header_bayar` DISABLE KEYS */;
INSERT INTO `header_bayar` VALUES (2,2,'2023-04-07',100000,200000,100000),(4,4,'2023-04-02',100000,200000,100000),(6,6,'2023-04-04',400000,450000,50000);
/*!40000 ALTER TABLE `header_bayar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `header_bayar_new`
--

DROP TABLE IF EXISTS `header_bayar_new`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `header_bayar_new` (
  `no_nota` int(11) NOT NULL AUTO_INCREMENT,
  `noNota` varchar(10) DEFAULT NULL,
  `id_detail` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total_pembelian` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `sisa_bayar` int(11) DEFAULT NULL,
  KEY `no_nota` (`no_nota`),
  KEY `fk_detail` (`id_detail`),
  CONSTRAINT `fk_detail` FOREIGN KEY (`id_detail`) REFERENCES `detail_bayar` (`id_detail`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `header_bayar_new`
--

LOCK TABLES `header_bayar_new` WRITE;
/*!40000 ALTER TABLE `header_bayar_new` DISABLE KEYS */;
INSERT INTO `header_bayar_new` VALUES (10,'230409-00',2,'2023-04-09',400000,400000,0);
/*!40000 ALTER TABLE `header_bayar_new` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `merk`
--

DROP TABLE IF EXISTS `merk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `merk` (
  `id_merk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_merk` varchar(150) NOT NULL,
  `model_sepatu` varchar(150) NOT NULL,
  PRIMARY KEY (`id_merk`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `merk`
--

LOCK TABLES `merk` WRITE;
/*!40000 ALTER TABLE `merk` DISABLE KEYS */;
INSERT INTO `merk` VALUES (8,'converse','sport wanita'),(9,'ando','sport wanita'),(10,'vans','sekolah'),(11,'ando','sekolah'),(12,'nike','sport pria'),(13,'puma','sport pria'),(16,'nike','sport wanita'),(17,'adidas','sekolah'),(24,'patrobas','sekolah'),(25,'ventela','sekolah'),(26,'johnson','sekolah'),(27,'geoff max','sekolah'),(28,'compass','sekolah'),(29,'johnson','sport pria'),(30,'adidas','sport');
/*!40000 ALTER TABLE `merk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `pemasukan_harian`
--

DROP TABLE IF EXISTS `pemasukan_harian`;
/*!50001 DROP VIEW IF EXISTS `pemasukan_harian`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `pemasukan_harian` (
  `nomor nota` tinyint NOT NULL,
  `tanggal` tinyint NOT NULL,
  `total pemasukan` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `sepatu`
--

DROP TABLE IF EXISTS `sepatu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sepatu` (
  `id_sepatu` int(11) NOT NULL AUTO_INCREMENT,
  `id_merk` int(11) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id_sepatu`),
  KEY `fk_sep_merk` (`id_merk`),
  CONSTRAINT `fk_sep_merk` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sepatu`
--

LOCK TABLES `sepatu` WRITE;
/*!40000 ALTER TABLE `sepatu` DISABLE KEYS */;
INSERT INTO `sepatu` VALUES (5,8,40,'putih abu',200000,20),(6,9,37,'hitam',150000,10),(7,10,40,'navy',100000,8),(9,12,41,'hijau',200000,10),(16,10,38,'abu-abu',200000,30),(17,10,36,'putih',100000,34),(18,13,40,'hitam',150000,16),(20,27,38,'hitam putih',350000,19),(21,30,38,'hijau ',99000,9);
/*!40000 ALTER TABLE `sepatu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `sepatu_vans`
--

DROP TABLE IF EXISTS `sepatu_vans`;
/*!50001 DROP VIEW IF EXISTS `sepatu_vans`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `sepatu_vans` (
  `merk sepatu` tinyint NOT NULL,
  `model` tinyint NOT NULL,
  `ukuran` tinyint NOT NULL,
  `warna` tinyint NOT NULL,
  `harga sepatu` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `daftar_merk`
--

/*!50001 DROP TABLE IF EXISTS `daftar_merk`*/;
/*!50001 DROP VIEW IF EXISTS `daftar_merk`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `daftar_merk` AS select distinct `merk`.`nama_merk` AS `daftar merk sepatu` from `merk` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `pemasukan_harian`
--

/*!50001 DROP TABLE IF EXISTS `pemasukan_harian`*/;
/*!50001 DROP VIEW IF EXISTS `pemasukan_harian`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `pemasukan_harian` AS select `header_bayar`.`no_nota` AS `nomor nota`,`header_bayar`.`tanggal` AS `tanggal`,sum(`header_bayar`.`total_pembelian`) AS `total pemasukan` from `header_bayar` group by `header_bayar`.`tanggal` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `sepatu_vans`
--

/*!50001 DROP TABLE IF EXISTS `sepatu_vans`*/;
/*!50001 DROP VIEW IF EXISTS `sepatu_vans`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `sepatu_vans` AS select `m`.`nama_merk` AS `merk sepatu`,`m`.`model_sepatu` AS `model`,`s`.`ukuran` AS `ukuran`,`s`.`warna` AS `warna`,`s`.`harga` AS `harga sepatu` from (`sepatu` `s` join `merk` `m` on(`m`.`id_merk` = `s`.`id_merk`)) where `m`.`nama_merk` = 'vans' */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-31 12:39:26
