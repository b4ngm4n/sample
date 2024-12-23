-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: localhost    Database: sample
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `biodatas`
--

DROP TABLE IF EXISTS `biodatas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `biodatas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_depan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tengah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_belakang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `jenis_kelamin` enum('l','p') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `biodatas_uuid_unique` (`uuid`),
  UNIQUE KEY `biodatas_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biodatas`
--

LOCK TABLES `biodatas` WRITE;
/*!40000 ALTER TABLE `biodatas` DISABLE KEYS */;
INSERT INTO `biodatas` VALUES (1,'b20d810e-3d3b-49b8-9a05-a836be182a99','Salman Mustapa','Salman',NULL,'Mustpaa','salman-mustapa','7571000000000001','2024-12-09','Gorontalo','Islam',NULL,'Jl. K.H Adam Zakaria, Kel. Dembe Jaya, Kec. Kota Utara, Kota Gorontalo, Gorontalo',NULL,'082154488769','2024-12-09 06:20:34','2024-12-09 06:20:34');
/*!40000 ALTER TABLE `biodatas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kabupatens`
--

DROP TABLE IF EXISTS `kabupatens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kabupatens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi_id` bigint unsigned NOT NULL,
  `nama_kabupaten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kabupaten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kabupatens_uuid_unique` (`uuid`),
  UNIQUE KEY `kabupatens_slug_unique` (`slug`),
  UNIQUE KEY `kabupatens_kode_kabupaten_unique` (`kode_kabupaten`),
  KEY `kabupatens_provinsi_id_foreign` (`provinsi_id`),
  CONSTRAINT `kabupatens_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kabupatens`
--

LOCK TABLES `kabupatens` WRITE;
/*!40000 ALTER TABLE `kabupatens` DISABLE KEYS */;
INSERT INTO `kabupatens` VALUES (43,'e57f9493-ae5c-48de-a8e8-9f5779554563',1,'KABUPATEN BOALEMO','kabupaten-boalemo-7501','7501','2024-12-10 10:05:38','2024-12-10 10:05:38'),(44,'e5a0fc3e-b459-4260-a6e5-1b32218c8cb8',1,'KABUPATEN GORONTALO','kabupaten-gorontalo-7502','7502','2024-12-10 10:06:35','2024-12-10 10:06:35'),(45,'3b3e5859-3e8f-4ea1-a7d6-ead2a798977b',1,'KABUPATEN POHUWATO','kabupaten-pohuwato-7503','7503','2024-12-10 10:23:09','2024-12-10 10:23:09'),(46,'976f1f68-c3d5-49d0-9870-259fdad85bfc',1,'KABUPATEN BONE BOLANGO','kabupaten-bone-bolango-7504','7504','2024-12-10 10:44:20','2024-12-10 10:44:20'),(47,'5b177efd-6765-4c9e-8998-e87ae76091ba',1,'KABUPATEN GORONTALO UTARA','kabupaten-gorontalo-utara-7505','7505','2024-12-10 10:44:53','2024-12-10 10:44:53'),(48,'7696002e-a7f6-4c9d-95d5-8bb51b93c5b1',1,'KOTA GORONTALO','kota-gorontalo-7571','7571','2024-12-10 10:45:07','2024-12-10 10:51:47');
/*!40000 ALTER TABLE `kabupatens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kecamatans`
--

DROP TABLE IF EXISTS `kecamatans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kecamatans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten_id` bigint unsigned NOT NULL,
  `nama_kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kecamatans_uuid_unique` (`uuid`),
  UNIQUE KEY `kecamatans_slug_unique` (`slug`),
  UNIQUE KEY `kecamatans_kode_kecamatan_unique` (`kode_kecamatan`),
  KEY `kecamatans_kabupaten_id_foreign` (`kabupaten_id`),
  CONSTRAINT `kecamatans_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupatens` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kecamatans`
--

LOCK TABLES `kecamatans` WRITE;
/*!40000 ALTER TABLE `kecamatans` DISABLE KEYS */;
INSERT INTO `kecamatans` VALUES (1,'2579c537-b052-448c-b4b9-67f2862e83ca',48,'KOTA BARAT','kota-barat-757101','757101','2024-12-10 11:48:39','2024-12-11 01:43:55'),(2,'4b9e4c8e-3b68-40d4-b80d-8ecd643fe1d8',48,'DUNGINGI','dungingi-757104','757104','2024-12-10 11:54:56','2024-12-11 01:44:15'),(3,'fe381f77-25b1-456b-bab5-9f71eaf44e4a',48,'KOTA SELATAN','kota-selatan-757102','757102','2024-12-10 11:55:29','2024-12-11 01:44:30'),(4,'802b8493-58d7-4873-ba7d-fc087216a788',48,'KOTA TIMUR','kota-timur-757105','757105','2024-12-10 11:58:08','2024-12-11 01:44:39'),(5,'eaa12357-521e-4b7d-8dd4-6429553cafa5',48,'HULONTHALANGI','hulonthalangi-757109','757109','2024-12-10 11:58:34','2024-12-11 01:44:48'),(6,'9c9154f7-c677-4864-a962-38e179b943ec',48,'DUMBO RAYA','dumbo-raya-757108','757108','2024-12-10 12:13:10','2024-12-11 01:44:57'),(7,'7611289b-cd77-4d74-8904-b9a6555063f4',48,'KOTA UTARA','kota-utara-757103','757103','2024-12-10 12:13:22','2024-12-11 01:45:12'),(8,'0032b018-bf23-41ef-b8b2-1b5d960f6202',48,'KOTA TENGAH','kota-tengah-757106','757106','2024-12-10 12:13:31','2024-12-11 01:45:22'),(9,'fbec95df-380a-4cca-9a7e-33f8be80b752',48,'SIPATANA','sipatana-757107','757107','2024-12-10 12:14:03','2024-12-11 01:45:38');
/*!40000 ALTER TABLE `kecamatans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelurahans`
--

DROP TABLE IF EXISTS `kelurahans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelurahans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` bigint unsigned NOT NULL,
  `nama_kelurahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelurahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kelurahans_uuid_unique` (`uuid`),
  UNIQUE KEY `kelurahans_slug_unique` (`slug`),
  UNIQUE KEY `kelurahans_kode_kelurahan_unique` (`kode_kelurahan`),
  KEY `kelurahans_kecamatan_id_foreign` (`kecamatan_id`),
  CONSTRAINT `kelurahans_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelurahans`
--

LOCK TABLES `kelurahans` WRITE;
/*!40000 ALTER TABLE `kelurahans` DISABLE KEYS */;
INSERT INTO `kelurahans` VALUES (1,'dbc97eda-7969-45f1-bbfc-0d5bc3b047af',7,'DEMBE II','dembe-ii-7571030003','7571030003','2024-12-10 16:57:26','2024-12-10 17:05:43'),(6,'3e4d86ef-2cc6-497d-8178-263f418dddd8',7,'WONGKADITI','wongkaditi-7571030004','7571030004','2024-12-10 17:49:47','2024-12-10 17:49:47'),(7,'5bfd23c8-308f-4f48-99b8-84e10ae55b1f',7,'WONGKADITI BARAT','wongkaditi-barat-7571030005','7571030005','2024-12-10 17:49:57','2024-12-10 17:49:57'),(8,'43791933-ebee-4027-a279-0f0e252dede0',7,'DULOMO SELATAN','dulomo-selatan-7571030011','7571030011','2024-12-10 17:50:12','2024-12-10 17:50:12'),(9,'308c6423-24ef-4e28-b9b2-264a790d96d9',7,'DULOMO','dulomo-7571030012','7571030012','2024-12-10 17:50:26','2024-12-10 17:50:26'),(10,'2d6d9340-7110-444c-b88a-2fb8c2f2b2df',7,'DEMBE JAYA','dembe-jaya-7571030015','7571030015','2024-12-10 17:50:40','2024-12-10 17:50:40'),(11,'6a23b156-6ab8-4ad3-8ccf-ec0978da6828',1,'DEMBE I','dembe-i-7571010001','7571010001','2024-12-10 17:52:20','2024-12-10 17:52:20'),(12,'d947a337-68e8-44e4-871c-be1ab578d376',1,'LEKOBALO','lekobalo-7571010002','7571010002','2024-12-10 17:53:01','2024-12-10 17:53:01'),(13,'f25f2786-4df9-4158-9040-d8276dbc0d4d',1,'PILOLODAA','pilolodaa-7571010003','7571010003','2024-12-10 17:54:02','2024-12-10 17:54:02'),(14,'bd2c8d99-0f20-4612-8097-2ec97c5604ab',1,'BULIIDE','buliide-7571010004','7571010004','2024-12-10 17:55:42','2024-12-10 17:55:42'),(15,'c8b43c5c-17f7-425c-a257-55f713c792fd',1,'TENILO','tenilo-7571010005','7571010005','2024-12-10 17:55:50','2024-12-10 17:55:50'),(16,'4a53255a-cbb5-4633-bfaf-f851b40eba9c',1,'MOLOSIPAT W','molosipat-w-7571010006','7571010006','2024-12-10 17:55:59','2024-12-10 17:55:59'),(17,'6e04cccb-0d96-43a4-8eec-fa6a4f6418e4',1,'BULADU','buladu-7571010008','7571010008','2024-12-10 17:56:10','2024-12-10 17:56:10'),(18,'6b573e84-a212-4a37-ba54-f8280b86adb2',2,'TULADENGGI','tuladenggi-7571011001','7571011001','2024-12-10 17:57:58','2024-12-10 17:57:58'),(19,'149e9ce0-70c9-42d1-b5e2-5d5caf3c8572',2,'LIBUO','libuo-7571011002','7571011002','2024-12-10 17:58:29','2024-12-10 17:58:29'),(20,'db8dfb48-5971-4e9c-9168-1968b5457a55',2,'TOMULABUTAO','tomulabutao-7571011003','7571011003','2024-12-10 17:58:40','2024-12-10 17:58:40'),(21,'9bff4a34-fd10-432c-bb75-98ed05a824f2',2,'HUANGOBOTU','huangobotu-7571011004','7571011004','2024-12-10 17:58:50','2024-12-10 17:58:50'),(22,'6622fa44-26ff-4c3d-ac01-9e5b9509481e',2,'TOMULABUTAO SELATAN','tomulabutao-selatan-7571011005','7571011005','2024-12-10 17:59:00','2024-12-10 17:59:00'),(23,'b168bca7-ab2c-45a3-b6ed-423efbc69c2f',3,'BIAWU','biawu-7571020010','7571020010','2024-12-10 17:59:28','2024-12-10 17:59:28'),(24,'3ae36e1e-61b5-4ff6-a540-6da68037d58b',3,'BIAWAO','biawao-7571020011','7571020011','2024-12-10 17:59:46','2024-12-10 17:59:46'),(25,'f9738885-8b8b-498f-8b57-a752e00e9701',3,'LIMBA B','limba-b-7571020018','7571020018','2024-12-10 17:59:53','2024-12-10 17:59:53'),(26,'7c72eeec-efc7-4d2f-a40e-91accb19d966',3,'LIMBA U SATU','limba-u-satu-7571020019','7571020019','2024-12-10 18:00:05','2024-12-10 18:00:05'),(27,'07de7baf-901c-41fa-abff-bb1b96bd10cb',3,'LIMBA U DUA','limba-u-dua-7571020020','7571020020','2024-12-10 18:00:45','2024-12-10 18:00:45'),(28,'d26d0bc8-7d6c-4c71-a336-8bea1afbf4d9',4,'PADEBUOLO','padebuolo-7571021006','7571021006','2024-12-10 18:01:17','2024-12-10 18:01:17'),(29,'1589289a-9681-444a-93f0-ee84d45c54cf',4,'IPILO','ipilo-7571021007','7571021007','2024-12-10 18:02:09','2024-12-10 18:02:09'),(30,'8003cb49-53c3-491a-b646-ea8ee687cfd7',4,'TAMALATE','tamalate-7571021008','7571021008','2024-12-10 18:02:18','2024-12-10 18:02:18'),(31,'66930277-c702-4ec7-a85f-7f5ce5f3b750',4,'MOODU','moodu-7571021009','7571021009','2024-12-10 18:02:27','2024-12-10 18:02:27'),(32,'0b0d2b70-4106-411e-a054-abb5aee2fe34',4,'HELEDULAA SELATAN','heledulaa-selatan-7571021010','7571021010','2024-12-10 18:02:39','2024-12-10 18:02:39'),(33,'9230f510-1fb8-406d-b506-514494167965',4,'HELEDULAA','heledulaa-7571021011','7571021011','2024-12-10 18:02:53','2024-12-10 18:02:53'),(34,'46522c24-e7fa-4133-a70c-7dbfabb80fe5',5,'TANJUNG KRAMAT','tanjung-kramat-7571022001','7571022001','2024-12-10 18:03:52','2024-12-10 18:03:52'),(35,'b97404ae-ccca-4f4a-86fd-701729178899',5,'POHE','pohe-7571022002','7571022002','2024-12-10 18:04:15','2024-12-10 18:04:15'),(36,'712bb924-3731-4d7e-b1a2-eeef230702bf',5,'TENDA','tenda-7571022003','7571022003','2024-12-10 18:04:29','2024-12-10 18:04:29'),(37,'97ca7d12-5fb5-456f-a932-cabe618b9d69',5,'SIENDENG','siendeng-7571022004','7571022004','2024-12-10 18:04:40','2024-12-10 18:04:40'),(38,'213036fa-4abf-403c-8024-f17beaa6ab02',5,'DONGGALA','donggala-7571022005','7571022005','2024-12-10 18:04:47','2024-12-10 18:04:47'),(39,'896923da-22db-4dd3-8f83-010a38f74838',6,'LEATO SELATAN','leato-selatan-7571023001','7571023001','2024-12-10 18:05:15','2024-12-10 18:05:15'),(40,'ad352444-1742-4276-820e-d193b6ab409a',6,'LEATO UTARA','leato-utara-7571023002','7571023002','2024-12-10 18:05:43','2024-12-10 18:05:43'),(41,'38710a40-1b10-49c9-98d3-1e10b8c1267d',6,'TALUMOLO','talumolo-7571023003','7571023003','2024-12-10 18:05:51','2024-12-10 18:05:51'),(42,'765e77f0-68dd-4e4b-bacd-c29921850078',6,'BOTU','botu-7571023004','7571023004','2024-12-10 18:06:02','2024-12-10 18:06:02'),(43,'bcefca2b-df0a-4a11-8581-c894dd795161',6,'BUGIS','bugis-7571023005','7571023005','2024-12-10 18:06:10','2024-12-10 18:06:10'),(44,'85a2abea-d559-466a-9ee9-5f0471bcea0f',8,'WUMIALO','wumialo-7571031001','7571031001','2024-12-10 18:06:57','2024-12-10 18:06:57'),(45,'d66737f5-999c-4254-90e5-5de4ebe20fcd',8,'DULALOWO','dulalowo-7571031002','7571031002','2024-12-10 18:07:12','2024-12-10 18:07:12'),(46,'2b901381-a986-4b5b-aaac-c04f89264e13',8,'LILUWO','liluwo-7571031003','7571031003','2024-12-10 18:07:23','2024-12-10 18:07:23'),(47,'662ad745-7618-4ce4-a1de-637d2f082a69',8,'PULUBALA','pulubala-7571031004','7571031004','2024-12-10 18:07:31','2024-12-10 18:07:31'),(48,'8c2c09af-0074-4781-ba0e-23768046d1e1',8,'PAGUYAMAN','paguyaman-7571031005','7571031005','2024-12-10 18:07:39','2024-12-10 18:07:39'),(49,'970cf4cd-668b-417c-a271-7517c155b62c',8,'DULALOWO TIMUR','dulalowo-timur-7571031006','7571031006','2024-12-10 18:07:48','2024-12-10 18:07:48'),(50,'5e9f963a-d31a-408d-b694-e5d8d8b618ec',9,'TAPA','tapa-7571032001','7571032001','2024-12-10 18:08:45','2024-12-10 18:08:45'),(51,'34134b70-a8c7-484e-b3f4-847e92035df4',9,'MOLOSIPAT U','molosipat-u-7571032002','7571032002','2024-12-10 18:09:14','2024-12-10 18:09:14'),(52,'6813d8b6-3dee-4fd2-a9e3-41b6ee73d779',9,'TANGGIKIKI','tanggikiki-7571032003','7571032003','2024-12-10 18:09:23','2024-12-10 18:09:23'),(53,'d9572101-9ad5-4f35-8887-a8310edba889',9,'BULOTADAA TIMUR','bulotadaa-timur-7571032004','7571032004','2024-12-10 18:09:32','2024-12-10 18:09:32'),(54,'bd3bbf87-3ea5-491f-be2e-c77532a5785d',9,'BULOTADAA','bulotadaa-7571032005','7571032005','2024-12-10 18:09:40','2024-12-10 18:09:40');
/*!40000 ALTER TABLE `kelurahans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_reset_tokens_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2019_12_14_000001_create_personal_access_tokens_table',1),(4,'2024_11_28_155020_create_biodatas_table',1),(5,'2024_11_28_155022_create_users_table',1),(6,'2024_11_28_155047_create_permissions_table',1),(7,'2024_11_28_160237_create_roles_table',1),(8,'2024_11_29_025058_create_role_permissions_table',1),(9,'2024_11_29_025114_create_user_roles_table',1),(10,'2024_11_29_033957_create_user_permissions_table',1),(11,'2024_12_05_173902_create_puskesmas_table',1),(12,'2024_12_06_074109_create_provinsis_table',1),(13,'2024_12_06_074115_create_kecamatans_table',1),(14,'2024_12_09_101414_create_kabupatens_table',1),(15,'2024_12_09_102049_create_kelurahans_table',1),(16,'2024_12_09_104105_create_wilayah_kerjas_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_pelayanans`
--

DROP TABLE IF EXISTS `pos_pelayanans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pos_pelayanans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puskesmas_id` bigint unsigned NOT NULL,
  `kelurahan_id` bigint unsigned DEFAULT NULL,
  `nama_pos_pelayanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `jenis_pelayanan_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pos_pelayanans_uuid_unique` (`uuid`),
  KEY `pos_pelayanans_puskesmas_id_foreign` (`puskesmas_id`),
  KEY `pos_pelayanans_kelurahan_id_foreign` (`kelurahan_id`),
  KEY `pos_pelayanans_jenis_pelayanan_id_foreign` (`jenis_pelayanan_id`),
  CONSTRAINT `pos_pelayanans_jenis_pelayanan_id_foreign` FOREIGN KEY (`jenis_pelayanan_id`) REFERENCES `jenis_pelayanans` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pos_pelayanans_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahans` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pos_pelayanans_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `puskesmas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_pelayanans`
--

LOCK TABLES `pos_pelayanans` WRITE;
/*!40000 ALTER TABLE `pos_pelayanans` DISABLE KEYS */;
/*!40000 ALTER TABLE `pos_pelayanans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinsis`
--

DROP TABLE IF EXISTS `provinsis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provinsis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_provinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_provinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `provinsis_uuid_unique` (`uuid`),
  UNIQUE KEY `provinsis_slug_unique` (`slug`),
  UNIQUE KEY `provinsis_kode_provinsi_unique` (`kode_provinsi`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinsis`
--

LOCK TABLES `provinsis` WRITE;
/*!40000 ALTER TABLE `provinsis` DISABLE KEYS */;
INSERT INTO `provinsis` VALUES (1,'d7c3d780-6b8a-49bc-b3ad-5b8f203443a2','PROVINSI GORONTALO','provinsi-gorontalo-75','75','2024-12-09 06:21:24','2024-12-10 08:50:17'),(13,'4f0e2a43-e7d0-43ae-bedf-28b23d4e59ff','TEST','test-12392','12392','2024-12-10 08:50:28','2024-12-10 09:56:40');
/*!40000 ALTER TABLE `provinsis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puskesmas`
--

DROP TABLE IF EXISTS `puskesmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `puskesmas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` bigint unsigned DEFAULT NULL,
  `nama_puskesmas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_puskesmas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_puskesmas` enum('aktif','non-aktif') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `puskesmas_uuid_unique` (`uuid`),
  UNIQUE KEY `puskesmas_slug_unique` (`slug`),
  KEY `puskesmas_kecamatan_id_foreign` (`kecamatan_id`),
  CONSTRAINT `puskesmas_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puskesmas`
--

LOCK TABLES `puskesmas` WRITE;
/*!40000 ALTER TABLE `puskesmas` DISABLE KEYS */;
INSERT INTO `puskesmas` VALUES (1,'d439e123-fff2-476d-8a0e-e6860cab1cd0',1,'PUSKESMAS PILOLODAA','puskesmas-pilolodaa-107177','107177','aktif','Jl. Usman Isa No. 668 Kel. Pilolodaa, Kec. Kota Barat','2024-12-18 18:23:50','2024-12-18 18:23:50'),(2,'7c67d6b7-fa0e-47d9-af4a-d3b1970ea8e4',1,'PUSKESMAS KOTA BARAT','puskesmas-kota-barat-1071178','1071178','aktif','Jl. Rambutan, Kel. Buladu, Kec. Kota Barat','2024-12-18 18:24:22','2024-12-18 18:24:22'),(3,'0224ef1f-d9af-4ce9-9d7e-228453d591ad',2,'PUSKESMAS DUNGINGI','puskesmas-dungingi-1071179','1071179','aktif','Jl. Palma Kel. Huango Botu, Kec. Dungingi','2024-12-18 18:24:50','2024-12-18 18:24:50'),(4,'f4fc5506-ac0e-4249-80cb-ec57b80af755',3,'PUSKESMAS KOTA SELATAN','puskesmas-kota-selatan-1071180','1071180','aktif','Jl. Mohamad Yamin, Kel. Limba B, Kec. Kota Selatan','2024-12-18 18:25:17','2024-12-18 18:25:17'),(5,'30335152-c96c-48b5-9374-8a3d9b8fc89b',4,'PUSKESMAS KOTA TIMUR','puskesmas-kota-timur-1071181','1071181','aktif','Jl. Kutai Kel. Tamalate Kec. Kota Timur','2024-12-18 18:25:42','2024-12-18 18:25:42'),(6,'fe35adef-b82f-4332-8673-4aaf954767d3',5,'PUSKESMAS HULONTHALANGI','puskesmas-hulonthalangi-1071182','1071182','aktif','Jl. Sasuit Tubun Kel. Tenda Kec. Hulonthalangi','2024-12-18 18:26:03','2024-12-18 18:26:03'),(7,'7c50cb54-f59b-40bb-94f7-e424dad2d378',6,'PUSKESMAS DUMBO RAYA','puskesmas-dumbo-raya-1071183','1071183','aktif','Jl. Mayor Dullah Kelurahan Talumolo Kec. Dumbo Raya','2024-12-18 18:26:31','2024-12-18 18:26:31'),(8,'4b9b10c5-b35f-4f2d-8407-dcbd6715700c',7,'PUSKESMAS KOTA UTARA','puskesmas-kota-utara-1071184','1071184','aktif','Jl. Yusuf Dali Kel. Wonggaditi Barat, Kec. Kota Utara','2024-12-18 18:26:50','2024-12-18 18:26:50'),(9,'fdf733d4-3dff-4b90-9160-8dfdb0125965',8,'PUSKESMAS KOTA TENGAH','puskesmas-kota-tengah-1071185','1071185','aktif','Jl. Sulawesi Kel. Dulalowo, Kec. Kota Tengah','2024-12-18 18:27:10','2024-12-18 18:27:10'),(10,'eb5c8db6-8359-4459-9dd4-5ecc3fbe923e',9,'PUSKESMAS SIPATANA','puskesmas-sipatana-1071186','1071186','aktif','Jl. Tondano Kel. Bulotadaa Barat Kec. Sipatana','2024-12-18 18:27:30','2024-12-18 18:27:30');
/*!40000 ALTER TABLE `puskesmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `permission_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_permissions_role_id_foreign` (`role_id`),
  KEY `role_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'c2a9a28d-cf26-4d12-bc40-57aa9f672998','Administrator','administrator','2024-12-09 06:20:34','2024-12-09 06:20:34');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_permissions`
--

DROP TABLE IF EXISTS `user_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `permission_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_permissions_user_id_foreign` (`user_id`),
  KEY `user_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `user_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_permissions`
--

LOCK TABLES `user_permissions` WRITE;
/*!40000 ALTER TABLE `user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_roles_user_id_foreign` (`user_id`),
  KEY `user_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,1,1,'2024-12-09 06:20:34','2024-12-09 06:20:34');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `biodata_id` bigint unsigned NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_uuid_unique` (`uuid`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_biodata_id_foreign` (`biodata_id`),
  CONSTRAINT `users_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodatas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'f5f69b8a-3627-4282-9790-e766ed649283',1,'abangucup@duck.com',NULL,'$2y$12$GVOlJ9Mj.n2/9.E9y7.xiuj9S9w4I/61WDkDXqqNq0NgSsbebhSAq','b4ngm4n',NULL,'2024-12-09 06:20:34','2024-12-09 06:20:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vaksins`
--

DROP TABLE IF EXISTS `vaksins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vaksins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_vaksin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_batch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kedaluwarsa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produsen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_pelayanan_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vaksins_uuid_unique` (`uuid`),
  UNIQUE KEY `vaksins_slug_unique` (`slug`),
  KEY `vaksins_jenis_pelayanan_id_foreign` (`jenis_pelayanan_id`),
  CONSTRAINT `vaksins_jenis_pelayanan_id_foreign` FOREIGN KEY (`jenis_pelayanan_id`) REFERENCES `jenis_pelayanans` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vaksins`
--

LOCK TABLES `vaksins` WRITE;
/*!40000 ALTER TABLE `vaksins` DISABLE KEYS */;
/*!40000 ALTER TABLE `vaksins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wilayah_kerjas`
--

DROP TABLE IF EXISTS `wilayah_kerjas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wilayah_kerjas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `puskesmas_id` bigint unsigned NOT NULL,
  `kelurahan_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wilayah_kerjas_puskesmas_id_foreign` (`puskesmas_id`),
  KEY `wilayah_kerjas_kelurahan_id_foreign` (`kelurahan_id`),
  CONSTRAINT `wilayah_kerjas_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahans` (`id`),
  CONSTRAINT `wilayah_kerjas_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `puskesmas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wilayah_kerjas`
--

LOCK TABLES `wilayah_kerjas` WRITE;
/*!40000 ALTER TABLE `wilayah_kerjas` DISABLE KEYS */;
INSERT INTO `wilayah_kerjas` VALUES (1,3,19,'2024-12-18 18:31:14','2024-12-18 18:31:14'),(2,3,22,'2024-12-18 18:31:14','2024-12-18 18:31:14'),(3,3,18,'2024-12-18 18:31:14','2024-12-18 18:31:14'),(4,3,21,'2024-12-18 18:31:14','2024-12-18 18:31:14'),(5,3,20,'2024-12-18 18:31:14','2024-12-18 18:31:14'),(6,10,51,'2024-12-18 18:31:25','2024-12-18 18:31:25'),(7,10,50,'2024-12-18 18:31:25','2024-12-18 18:31:25'),(8,10,52,'2024-12-18 18:31:25','2024-12-18 18:31:25'),(9,10,54,'2024-12-18 18:31:25','2024-12-18 18:31:25'),(10,10,53,'2024-12-18 18:31:25','2024-12-18 18:31:25'),(11,9,46,'2024-12-18 18:31:40','2024-12-18 18:31:40'),(12,9,47,'2024-12-18 18:31:40','2024-12-18 18:31:40'),(13,9,44,'2024-12-18 18:31:40','2024-12-18 18:31:40'),(14,9,48,'2024-12-18 18:31:40','2024-12-18 18:31:40'),(15,9,49,'2024-12-18 18:31:40','2024-12-18 18:31:40'),(16,9,45,'2024-12-18 18:31:40','2024-12-18 18:31:40'),(17,8,10,'2024-12-18 18:31:52','2024-12-18 18:31:52'),(18,8,9,'2024-12-18 18:31:52','2024-12-18 18:31:52'),(19,8,6,'2024-12-18 18:31:52','2024-12-18 18:31:52'),(20,8,8,'2024-12-18 18:31:52','2024-12-18 18:31:52'),(21,8,7,'2024-12-18 18:31:52','2024-12-18 18:31:52'),(22,8,1,'2024-12-18 18:31:52','2024-12-18 18:31:52'),(23,7,41,'2024-12-18 18:32:03','2024-12-18 18:32:03'),(24,7,42,'2024-12-18 18:32:03','2024-12-18 18:32:03'),(25,7,39,'2024-12-18 18:32:03','2024-12-18 18:32:03'),(26,7,40,'2024-12-18 18:32:03','2024-12-18 18:32:03'),(27,7,43,'2024-12-18 18:32:03','2024-12-18 18:32:03'),(28,6,38,'2024-12-18 18:32:16','2024-12-18 18:32:16'),(29,6,34,'2024-12-18 18:32:16','2024-12-18 18:32:16'),(30,6,36,'2024-12-18 18:32:16','2024-12-18 18:32:16'),(31,6,37,'2024-12-18 18:32:16','2024-12-18 18:32:16'),(32,6,35,'2024-12-18 18:32:16','2024-12-18 18:32:16'),(33,5,32,'2024-12-18 18:32:32','2024-12-18 18:32:32'),(34,5,29,'2024-12-18 18:32:32','2024-12-18 18:32:32'),(35,5,31,'2024-12-18 18:32:32','2024-12-18 18:32:32'),(36,5,30,'2024-12-18 18:32:32','2024-12-18 18:32:32'),(37,5,33,'2024-12-18 18:32:32','2024-12-18 18:32:32'),(38,5,28,'2024-12-18 18:32:32','2024-12-18 18:32:32'),(39,4,27,'2024-12-18 18:32:54','2024-12-18 18:32:54'),(40,4,24,'2024-12-18 18:32:54','2024-12-18 18:32:54'),(41,4,26,'2024-12-18 18:32:54','2024-12-18 18:32:54'),(42,4,23,'2024-12-18 18:32:54','2024-12-18 18:32:54'),(43,4,25,'2024-12-18 18:32:54','2024-12-18 18:32:54'),(44,1,11,'2024-12-18 18:33:29','2024-12-18 18:33:29'),(45,1,12,'2024-12-18 18:33:29','2024-12-18 18:33:29'),(46,1,13,'2024-12-18 18:33:29','2024-12-18 18:33:29'),(47,2,16,'2024-12-18 18:33:43','2024-12-18 18:33:43'),(48,2,17,'2024-12-18 18:33:43','2024-12-18 18:33:43'),(49,2,14,'2024-12-18 18:33:43','2024-12-18 18:33:43'),(50,2,15,'2024-12-18 18:33:43','2024-12-18 18:33:43');
/*!40000 ALTER TABLE `wilayah_kerjas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-19 10:36:17
