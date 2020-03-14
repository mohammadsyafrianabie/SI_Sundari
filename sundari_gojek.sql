-- MySQL dump 10.16  Distrib 10.1.9-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: sundari
-- ------------------------------------------------------
-- Server version	10.1.9-MariaDB

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
-- Temporary table structure for view `laporan`
--

DROP TABLE IF EXISTS `laporan`;
/*!50001 DROP VIEW IF EXISTS `laporan`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `laporan` (
  `id_transaksi` tinyint NOT NULL,
  `nama` tinyint NOT NULL,
  `harga` tinyint NOT NULL,
  `jumlah` tinyint NOT NULL,
  `subharga` tinyint NOT NULL,
  `tanggal` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id_menu` varchar(5) COLLATE utf8_bin NOT NULL,
  `nama` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `tipe` enum('makanan','minuman') COLLATE utf8_bin DEFAULT NULL,
  `stok` smallint(6) DEFAULT NULL,
  `harga` mediumint(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES ('m001','Nila Bakar A','makanan',100,15000),('m002','Nila Bakar B','makanan',89,20000),('m003','Nila Goreng A','makanan',100,12500),('m004','Nila Goreng B','makanan',100,17500),('m005','Lele Bakar','makanan',92,10000),('m006','Lele Goreng','makanan',100,8000),('m007','Ayam Bakar','makanan',93,12000),('m008','Ayam Goreng','makanan',100,10000),('m009','Wader','makanan',90,10000),('m010','Rempelo Ati','makanan',100,7000),('m011','Usus','makanan',98,8000),('m012','Tempe Penyet','makanan',100,6000),('m013','Telor','makanan',100,8000),('m014','Ikan Laut Bakar A','makanan',100,15000),('m015','Ikan Laut Bakar B','makanan',100,20000),('m016','Ikan Laut Bakar C','makanan',100,25000),('m017','Ikan Laut Goreng A','makanan',100,12500),('m018','Ikan Laut Goreng B','makanan',100,17500),('m019','Ikan Laut Goreng C','makanan',100,22500),('m020','Es Teh','minuman',99,3000),('m021','Es Jeruk Nipis','minuman',100,4000),('m022','Es Jeruk Buah','minuman',100,4000),('m023','Es Markisa','minuman',100,4000),('m024','Es Susu','minuman',95,5000),('m025','Teh Hangat','minuman',98,3000),('m026','Jeruk Nipis Anget','minuman',100,4000),('m027','Jeruk Buah Anget','minuman',100,4000),('m028','Markisa Hangat','minuman',100,4000),('m029','Susu Hangat','minuman',100,5000),('m030','Kopi','minuman',100,3000),('m031','Jahe Rempah','minuman',100,5000),('m032','Kopi Susu','minuman',100,5000),('m033','awal tahun (1 ayam + es teh)','makanan',100,20000);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tambah_stok`
--

DROP TABLE IF EXISTS `tambah_stok`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tambah_stok` (
  `id_stok` varchar(16) COLLATE utf8_bin NOT NULL,
  `id_menu` varchar(5) COLLATE utf8_bin NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jumlah` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_stok`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tambah_stok`
--

LOCK TABLES `tambah_stok` WRITE;
/*!40000 ALTER TABLE `tambah_stok` DISABLE KEYS */;
INSERT INTO `tambah_stok` VALUES ('s001','m001','2020-01-13 19:01:34',20),('s002','m005','2020-01-13 19:01:56',20);
/*!40000 ALTER TABLE `tambah_stok` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `id_transaksi` varchar(16) NOT NULL,
  `id_user` varchar(5) DEFAULT NULL,
  `id_menu` varchar(5) DEFAULT NULL,
  `nama_pembeli` varchar(64) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jumlah` smallint(6) DEFAULT NULL,
  `subharga` int(11) DEFAULT NULL,
  `jenis` enum('tunai','tunda') NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES ('t202001070801001','u002','m018','','2020-01-07 08:01:00',3,52500,'tunai'),('t202001070801002','u002','m025','','2020-01-07 08:01:00',3,9000,'tunai'),('t202001070801031','u002','m008','','2020-01-07 08:01:03',1,10000,'tunai'),('t202001070801032','u002','m024','','2020-01-07 08:01:03',1,5000,'tunai'),('t202001070801211','u002','m025','','2020-01-07 08:01:21',3,9000,'tunai'),('t202001070801212','u002','m020','','2020-01-07 08:01:21',3,9000,'tunai'),('t202001070801391','u002','m008','','2020-01-07 08:01:39',1,10000,'tunai'),('t202001070801392','u002','m024','','2020-01-07 08:01:39',1,5000,'tunai'),('t202001070801581','u002','m005','','2020-01-07 08:01:58',2,20000,'tunai'),('t202001070801582','u002','m025','','2020-01-07 08:01:58',1,3000,'tunai'),('t202001070801583','u002','m020','','2020-01-07 08:01:58',1,3000,'tunai'),('t202001071201011','u002','m001','','2020-01-07 12:01:01',3,45000,'tunai'),('t202001071201201','u002','m002','','2020-01-07 12:01:20',4,80000,'tunai'),('t202001071201431','u002','m004','','2020-01-07 12:01:43',2,35000,'tunai'),('t202001071301051','u002','m005','','2020-01-07 13:01:05',1,10000,'tunai'),('t202001071301052','u002','m006','','2020-01-07 13:01:05',1,8000,'tunai'),('t202001071301281','u002','m004','','2020-01-07 13:01:28',3,52500,'tunai'),('t202001080301291','u002','m008','','2020-01-08 03:01:29',1,10000,'tunai'),('t202001080301292','u002','m024','','2020-01-08 03:01:29',1,5000,'tunai'),('t202001080701151','u003','m006','','2020-01-08 07:01:15',2,16000,'tunai'),('t202001080701152','u003','m009','','2020-01-08 07:01:15',2,20000,'tunai'),('t202001080701153','u003','m025','','2020-01-08 07:01:15',3,9000,'tunai'),('t202001090601071','u002','m005','','2020-01-09 06:01:07',9,90000,'tunai'),('t202001090601072','u002','m004','','2020-01-09 06:01:07',6,105000,'tunai'),('t202001090601073','u002','m006','','2020-01-09 06:01:07',10,80000,'tunai'),('t202001090601074','u002','m007','','2020-01-09 06:01:07',6,72000,'tunai'),('t202001090601075','u002','m022','','2020-01-09 06:01:07',3,12000,'tunai'),('t202001090601076','u002','m020','','2020-01-09 06:01:07',6,18000,'tunai'),('t202001090601077','u002','m031','','2020-01-09 06:01:07',6,30000,'tunai'),('t202001090601221','u002','m005','','2020-01-09 06:01:22',1,10000,'tunai'),('t202001130201231','u002','m005','','2020-01-13 02:01:23',200,2000000,'tunai'),('t202001130201232','u002','m020','','2020-01-13 02:01:23',3,9000,'tunai'),('t202002070802471','u002','m002','','2020-02-07 08:02:47',2,40000,'tunai'),('t202002070802472','u002','m005','','2020-02-07 08:02:47',3,30000,'tunai'),('t202002070802591','u002','m007','','2020-02-07 08:02:59',2,24000,'tunai'),('t202002070902061','u002','m002','','2020-02-07 09:02:06',5,100000,'tunai'),('t202002070902431','u002','m009','','2020-02-07 09:02:43',10,100000,'tunai'),('t202002070902581','u002','m002','','2020-02-07 09:02:58',2,40000,'tunai'),('t202002070902582','u002','m020','','2020-02-07 09:02:58',1,3000,'tunai'),('t202002071002011','u002','m002','','2020-02-07 10:02:01',2,40000,'tunai'),('t202002071002391','u002','m011','','2020-02-07 10:02:39',2,16000,'tunai'),('t202002071002392','u002','m025','','2020-02-07 10:02:39',2,6000,'tunai'),('t202002071002451','u002','m005','','2020-02-07 10:02:45',5,50000,'tunai'),('t202002071002491','u002','m007','','2020-02-07 10:02:49',5,60000,'tunai'),('t202002071002492','u002','m024','','2020-02-07 10:02:49',5,25000,'tunai');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` varchar(5) COLLATE utf8_bin NOT NULL,
  `nama` varchar(32) COLLATE utf8_bin NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL,
  `hak_akses` enum('admin','pegawai') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('u001','admin','superuser','admin'),('u002','anisa','anisa1234','pegawai'),('u003','irfan','kasirirfan','pegawai');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `laporan`
--

/*!50001 DROP TABLE IF EXISTS `laporan`*/;
/*!50001 DROP VIEW IF EXISTS `laporan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `laporan` AS (select `transaksi`.`id_transaksi` AS `id_transaksi`,`menu`.`nama` AS `nama`,`menu`.`harga` AS `harga`,`transaksi`.`jumlah` AS `jumlah`,`transaksi`.`subharga` AS `subharga`,`transaksi`.`tanggal` AS `tanggal` from (`transaksi` join `menu` on((`menu`.`id_menu` = convert(`transaksi`.`id_menu` using utf8)))) order by `transaksi`.`id_transaksi`) */;
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

-- Dump completed on 2020-03-14 11:46:57
