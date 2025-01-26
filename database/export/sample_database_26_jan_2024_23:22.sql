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
-- Table structure for table `akun_penggunas`
--

DROP TABLE IF EXISTS `akun_penggunas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `akun_penggunas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `faskes_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `status_akun` enum('aktif','tidak_aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `akun_penggunas_faskes_id_foreign` (`faskes_id`),
  KEY `akun_penggunas_user_id_foreign` (`user_id`),
  CONSTRAINT `akun_penggunas_faskes_id_foreign` FOREIGN KEY (`faskes_id`) REFERENCES `faskes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `akun_penggunas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `akun_penggunas`
--

LOCK TABLES `akun_penggunas` WRITE;
/*!40000 ALTER TABLE `akun_penggunas` DISABLE KEYS */;
INSERT INTO `akun_penggunas` VALUES (1,3,5,'aktif',NULL,'2025-01-26 12:20:55','2025-01-26 12:20:55');
/*!40000 ALTER TABLE `akun_penggunas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alamats`
--

DROP TABLE IF EXISTS `alamats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alamats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jalan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rt` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rw` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamatable_id` bigint unsigned NOT NULL,
  `alamatable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('alamat_utama','alamat_tambahan','alamat_lama') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'alamat_utama',
  `wilayah_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alamats_uuid_unique` (`uuid`),
  UNIQUE KEY `alamats_slug_unique` (`slug`),
  KEY `alamats_wilayah_id_foreign` (`wilayah_id`),
  KEY `alamats_alamatable_id_alamatable_type_index` (`alamatable_id`,`alamatable_type`),
  CONSTRAINT `alamats_wilayah_id_foreign` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayahs` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alamats`
--

LOCK TABLES `alamats` WRITE;
/*!40000 ALTER TABLE `alamats` DISABLE KEYS */;
INSERT INTO `alamats` VALUES (1,'b5abae7c-cf2b-40d8-bfd5-04eceea36b86','Jl. Pangeran Hidayat','jl-96128pangeran-96128hidayat','96128',NULL,NULL,1,'App\\Models\\Faskes','alamat_utama',54,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(2,'505be792-033d-43ec-841d-ec289a5f10a3','Jl. Jamaludin Malik','jl-jamaludin-malik-96138','96138',NULL,NULL,2,'App\\Models\\Faskes','alamat_utama',22,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(3,'92fe49f7-a232-4c38-b6d3-e00ae97075e2','Jl. Yusuf Dali','jl-yusuf-dali-45',NULL,NULL,NULL,3,'App\\Models\\Faskes','alamat_utama',45,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(4,'f3a98836-957d-4854-8027-83db81ffd097','Jl. Usman Isa','jl-usman-isa-6',NULL,NULL,NULL,4,'App\\Models\\Faskes','alamat_utama',6,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(5,'2baf8dd1-c76c-40a0-b5de-44698531fadb','Jl. Rambutan','jl-rambutan-10',NULL,NULL,NULL,5,'App\\Models\\Faskes','alamat_utama',10,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(6,'a263c856-ee68-4178-8bba-b56f6aabc383','Jl. Palma','jl-palma-15',NULL,NULL,NULL,6,'App\\Models\\Faskes','alamat_utama',15,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(7,'bf64cc15-cffd-4da7-8f94-567d7c9ae26a','Jl. Mohamad Yamin','jl-mohamad-yamin-20',NULL,NULL,NULL,7,'App\\Models\\Faskes','alamat_utama',20,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(8,'3e7235f6-6e64-4d36-b6f6-3f27eb31a8be','Jl. Kutai','jl-kutai-26',NULL,NULL,NULL,8,'App\\Models\\Faskes','alamat_utama',26,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(9,'e4e3a8fe-0eb1-437c-a38f-3a5a1aafcf8b','Jl. Sasuit Tubun','jl-sasuit-tubun-33',NULL,NULL,NULL,9,'App\\Models\\Faskes','alamat_utama',33,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(10,'596c41ae-baf7-45c3-acea-baed5b34866a','Jl. Mayor Dullah','jl-mayor-dullah-39',NULL,NULL,NULL,10,'App\\Models\\Faskes','alamat_utama',39,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(11,'f5c12201-63ae-4978-8009-b9476c63a37f','Jl. Sulawesi','jl-sulawesi-51',NULL,NULL,NULL,11,'App\\Models\\Faskes','alamat_utama',51,'2025-01-26 00:35:49','2025-01-26 00:35:49'),(12,'c3caa305-d015-4b19-a0eb-94cadeebdb68','Jl. Tondano','jl-tondano-61',NULL,NULL,NULL,12,'App\\Models\\Faskes','alamat_utama',61,'2025-01-26 00:35:49','2025-01-26 00:35:49');
/*!40000 ALTER TABLE `alamats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `biodatas`
--

DROP TABLE IF EXISTS `biodatas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `biodatas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_depan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_tengah` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_belakang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` char(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('l','p') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `biodatas_uuid_unique` (`uuid`),
  UNIQUE KEY `biodatas_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biodatas`
--

LOCK TABLES `biodatas` WRITE;
/*!40000 ALTER TABLE `biodatas` DISABLE KEYS */;
INSERT INTO `biodatas` VALUES (1,'1ca369f7-41d3-485b-9516-536a08c4bfce','Salman Mustapa','Salman',NULL,'Mustapa','salman-mustapa-07','7571000000000001','2025-01-26','Gorontalo','Islam',NULL,NULL,'082154488769','2025-01-26 00:35:49','2025-01-26 00:35:49'),(8,'139ee74e-c707-4bee-863a-c88b81ca38a9','Salman Mustapa','Salman',NULL,'Mustapa','salman-mustapa-2','7571031310000002','2000-10-13','Gorontalo','Islam','Operator Komputer','l','082154488769','2025-01-26 12:20:55','2025-01-26 12:20:55');
/*!40000 ALTER TABLE `biodatas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bulans`
--

DROP TABLE IF EXISTS `bulans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bulans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bulans_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bulans`
--

LOCK TABLES `bulans` WRITE;
/*!40000 ALTER TABLE `bulans` DISABLE KEYS */;
INSERT INTO `bulans` VALUES (1,'Januari','januari','2025-01-26 00:35:49','2025-01-26 00:35:49'),(2,'Februari','februari','2025-01-26 00:35:49','2025-01-26 00:35:49'),(3,'Maret','maret','2025-01-26 00:35:49','2025-01-26 00:35:49'),(4,'April','april','2025-01-26 00:35:49','2025-01-26 00:35:49'),(5,'Mei','mei','2025-01-26 00:35:49','2025-01-26 00:35:49'),(6,'Juni','juni','2025-01-26 00:35:49','2025-01-26 00:35:49'),(7,'Juli','juli','2025-01-26 00:35:49','2025-01-26 00:35:49'),(8,'Agustus','agustus','2025-01-26 00:35:49','2025-01-26 00:35:49'),(9,'September','september','2025-01-26 00:35:49','2025-01-26 00:35:49'),(10,'Oktober','oktober','2025-01-26 00:35:49','2025-01-26 00:35:49'),(11,'November','november','2025-01-26 00:35:49','2025-01-26 00:35:49'),(12,'Desember','desember','2025-01-26 00:35:49','2025-01-26 00:35:49');
/*!40000 ALTER TABLE `bulans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `faskes`
--

DROP TABLE IF EXISTS `faskes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faskes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_faskes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_faskes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_faskes` enum('dinkes-prov','dinkes-kabkot','puskesmas','pustu','klinik','rs','lab-kesehatan','apotek','posyandu','gudang-farmasi','lkt','balai-pengobatan','labkesda') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'puskesmas',
  `status_faskes` enum('aktif','tidak-aktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `wilayah_id` bigint unsigned DEFAULT NULL,
  `_lft` int unsigned NOT NULL DEFAULT '0',
  `_rgt` int unsigned NOT NULL DEFAULT '0',
  `parent_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `faskes_uuid_unique` (`uuid`),
  UNIQUE KEY `faskes_slug_unique` (`slug`),
  KEY `faskes_wilayah_id_foreign` (`wilayah_id`),
  KEY `faskes__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`),
  CONSTRAINT `faskes_wilayah_id_foreign` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayahs` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faskes`
--

LOCK TABLES `faskes` WRITE;
/*!40000 ALTER TABLE `faskes` DISABLE KEYS */;
INSERT INTO `faskes` VALUES (1,'128c3f53-2413-499d-819a-82ada4e4c67d','Dinas Kesehatan Provinsi Gorontalo','dinas-kesehatan-provinsi-gorontalo-75','75','dinkes-prov','aktif',1,1,24,NULL,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(2,'dfd56362-c759-4694-83a9-f48cc8873e6e','Dinas Kesehatan Kota Gorontalo','dinas-kesehatan-kota-gorontalo-7571','7571','dinkes-kabkot','aktif',2,2,23,1,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(3,'b68a9837-0c84-44de-b1ba-e49085c82f43','Puskesmas Kota Utara','puskesmas-kota-utara-1071184','1071184','puskesmas','aktif',42,3,4,2,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(4,'5c56e095-c100-4d1d-aca9-0eeb120e4ee1','Puskesmas Pilolodaa','puskesmas-pilolodaa-1071177','1071177','puskesmas','aktif',3,5,6,2,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(5,'7d5da063-2578-490d-946e-e1c357dd9cc3','Puskesmas Kota Barat','puskesmas-kota-barat-1071178','1071178','puskesmas','aktif',3,7,8,2,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(6,'f2bae0be-def3-438a-ab94-4b4e0f4c7a79','Puskesmas Dungingi','puskesmas-dungingi-1071179','1071179','puskesmas','aktif',11,9,10,2,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(7,'4dd5a821-c483-4073-b2ed-4103ea8b2e07','Puskesmas Kota Selatan','puskesmas-kota-selatan-1071180','1071180','puskesmas','aktif',17,11,12,2,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(8,'9fea2dc7-86b8-4bf3-b8ee-cc1ba7e23de6','Puskesmas Kota Timur','puskesmas-kota-timur-1071181','1071181','puskesmas','aktif',23,13,14,2,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(9,'7f786990-82da-4ff0-8b83-749cc93a8dae','Puskesmas Hulonthalangi','puskesmas-hulonthalangi-1071182','1071182','puskesmas','aktif',30,15,16,2,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(10,'570e03f9-c43a-4870-b7e0-e4fc8024c1d9','Puskesmas Dumbo Raya','puskesmas-dumbo-raya-1071183','1071183','puskesmas','aktif',36,17,18,2,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(11,'241434d5-cb10-4c92-a8c4-651477496f30','Puskesmas Kota Tengah','puskesmas-kota-tengah-1071185','1071185','puskesmas','aktif',49,19,20,2,'2025-01-26 00:35:48','2025-01-26 00:35:49'),(12,'5a2ece54-8403-4354-9f84-6f3ccccbdd4a','Puskesmas Sipatana','puskesmas-sipatana-1071186','1071186','puskesmas','aktif',56,21,22,2,'2025-01-26 00:35:49','2025-01-26 00:35:49');
/*!40000 ALTER TABLE `faskes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori_vaksins`
--

DROP TABLE IF EXISTS `kategori_vaksins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori_vaksins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kategori_id` bigint unsigned NOT NULL,
  `vaksin_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori_vaksins_kategori_id_foreign` (`kategori_id`),
  KEY `kategori_vaksins_vaksin_id_foreign` (`vaksin_id`),
  CONSTRAINT `kategori_vaksins_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE,
  CONSTRAINT `kategori_vaksins_vaksin_id_foreign` FOREIGN KEY (`vaksin_id`) REFERENCES `vaksins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori_vaksins`
--

LOCK TABLES `kategori_vaksins` WRITE;
/*!40000 ALTER TABLE `kategori_vaksins` DISABLE KEYS */;
INSERT INTO `kategori_vaksins` VALUES (1,1,1,'2025-01-26 05:39:38','2025-01-26 05:39:38'),(2,1,2,'2025-01-26 06:00:37','2025-01-26 06:00:37');
/*!40000 ALTER TABLE `kategori_vaksins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategoris`
--

DROP TABLE IF EXISTS `kategoris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategoris` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kategoris_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategoris`
--

LOCK TABLES `kategoris` WRITE;
/*!40000 ALTER TABLE `kategoris` DISABLE KEYS */;
INSERT INTO `kategoris` VALUES (1,'20de0b74-effb-4cbc-a386-4bbe7bf5ff41','Imunisasi Dasar Lengkap 1','imunisasi-dasar-lengkap-1','bayi','idl','Imunisasi Dasar Lengkap 1','2025-01-26 00:35:49','2025-01-26 00:35:49'),(2,'f149bd02-407d-4c6a-87cb-614f226ca06e','Imunisasi Baduta Lengkap 1','imunisasi-baduta-lengkap-1','baduta','ibl','Imuinasasi Bayi Dua Tahun Lengkap','2025-01-26 00:35:49','2025-01-26 00:35:49'),(3,'c4f4acc5-d386-47f2-bc35-28798f30bf09','Imunisasi TT WUS','imunisasi-tt-wus','wus','tt+','Imunisasi Tetanus Toksoid (TT) pada WUS','2025-01-26 00:35:49','2025-01-26 00:35:49');
/*!40000 ALTER TABLE `kategoris` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_reset_tokens_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2019_12_14_000001_create_personal_access_tokens_table',1),(4,'2024_11_28_155020_create_biodatas_table',1),(5,'2024_11_28_155022_create_users_table',1),(6,'2024_11_28_155047_create_permissions_table',1),(7,'2024_11_28_160237_create_roles_table',1),(8,'2024_11_29_025058_create_role_permissions_table',1),(9,'2024_11_29_025114_create_user_roles_table',1),(10,'2024_11_29_033957_create_user_permissions_table',1),(11,'2024_12_16_074127_create_vaksins_table',1),(12,'2025_01_10_101213_create_bulans_table',1),(13,'2025_01_10_101257_create_tahuns_table',1),(14,'2025_01_10_182905_create_stok_vaksins_table',1),(15,'2025_01_13_071207_create_wilayahs_table',1),(16,'2025_01_20_215817_create_faskes_table',1),(17,'2025_01_21_093539_create_alamats_table',1),(18,'2025_01_21_132414_create_wilayah_kerjas_table',1),(19,'2025_01_26_022923_create_kategoris_table',1),(20,'2025_01_26_114524_create_kategori_vaksins_table',2),(21,'2025_01_26_142338_create_pws_table',3),(22,'2025_01_26_160746_create_akun_penggunas_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'02e11ea5-cf9a-4c47-bed3-4436d80f0715','home care','home-care','2025-01-26 00:35:53','2025-01-26 00:35:53'),(2,'51c0704a-3e18-4aba-a9fd-c66d6c543b02','dashboard','dashboard','2025-01-26 00:35:53','2025-01-26 00:35:53'),(3,'94b4dd9f-ddca-4cb1-b759-5f874e22a0cc','list wilayah','list-wilayah','2025-01-26 00:35:53','2025-01-26 00:35:53'),(4,'192780c1-b43a-4b87-830c-205d18bdae0f','create wilayah','create-wilayah','2025-01-26 00:35:53','2025-01-26 00:35:53'),(5,'ca7e3789-9a90-45c5-a754-ecc68324ff9d','store wilayah','store-wilayah','2025-01-26 00:35:53','2025-01-26 00:35:53'),(6,'9976d5f9-02a5-4cbd-b8e5-e86bcd7959fd','read wilayah','read-wilayah','2025-01-26 00:35:53','2025-01-26 00:35:53'),(7,'e3eb435e-9a46-4b52-9216-379dbceb2275','edit wilayah','edit-wilayah','2025-01-26 00:35:53','2025-01-26 00:35:53'),(8,'098be508-ba9e-4e15-ae28-6ed862e07923','update wilayah','update-wilayah','2025-01-26 00:35:53','2025-01-26 00:35:53'),(9,'4de8acaf-f290-40e3-8ec6-85e11a4bb182','delete wilayah','delete-wilayah','2025-01-26 00:35:53','2025-01-26 00:35:53'),(10,'cb039b10-ff2c-4bd9-a49b-9e79dad851ef','list faskes','list-faskes','2025-01-26 00:35:53','2025-01-26 00:35:53'),(11,'c80ec3a9-254e-4215-8afb-56473b621e71','create faskes','create-faskes','2025-01-26 00:35:53','2025-01-26 00:35:53'),(12,'0c8417cf-a94b-450c-b944-f68f78ecbfeb','store faskes','store-faskes','2025-01-26 00:35:53','2025-01-26 00:35:53'),(13,'aa012d88-7e13-40a9-9e13-0d369dca4829','read faskes','read-faskes','2025-01-26 00:35:53','2025-01-26 00:35:53'),(14,'ffdb5dcf-68f3-4069-936e-24aad9d29c48','edit faskes','edit-faskes','2025-01-26 00:35:53','2025-01-26 00:35:53'),(15,'9ad97c69-4406-400e-97f4-f843f3b1e5d3','update faskes','update-faskes','2025-01-26 00:35:53','2025-01-26 00:35:53'),(16,'f2abbf91-855b-4f17-90ce-5a26a3770e2b','delete faskes','delete-faskes','2025-01-26 00:35:53','2025-01-26 00:35:53'),(17,'214ca069-db80-44bf-899a-220d85932d79','store wilayah kerja','store-wilayah-kerja','2025-01-26 00:35:53','2025-01-26 00:35:53'),(18,'ca6e7492-88e7-4cba-ad34-1eeef6ea345d','delete wilayah kerja','delete-wilayah-kerja','2025-01-26 00:35:53','2025-01-26 00:35:53'),(19,'543b4f8b-9be2-4261-9bdc-99a19baffbab','list user','list-user','2025-01-26 00:35:53','2025-01-26 00:35:53'),(20,'817550d5-cdfc-4ee6-aca9-7497c5fce607','create user','create-user','2025-01-26 00:35:53','2025-01-26 00:35:53'),(21,'acd6c781-e731-4d3e-b38f-63306f6bc8aa','store user','store-user','2025-01-26 00:35:53','2025-01-26 00:35:53'),(22,'3d492f78-ea6d-4f1f-9e59-03a4e0d0d9fa','read user','read-user','2025-01-26 00:35:53','2025-01-26 00:35:53'),(23,'2452ac4a-94c9-49bf-ab6b-2d0be978e759','edit user','edit-user','2025-01-26 00:35:53','2025-01-26 00:35:53'),(24,'627c4126-d1a8-4a1f-b1fa-d9781c8707fe','update user','update-user','2025-01-26 00:35:53','2025-01-26 00:35:53'),(25,'86b25d6d-3e54-4b35-9826-3dec3a0f3743','delete user','delete-user','2025-01-26 00:35:53','2025-01-26 00:35:53'),(26,'07d7fa86-6402-4e11-8dd8-9ba100b94f06','list user permissions','list-user-permissions','2025-01-26 00:35:53','2025-01-26 00:35:53'),(27,'bd150e91-d73c-43f9-a598-23cf581c18b9','store user permissions','store-user-permissions','2025-01-26 00:35:53','2025-01-26 00:35:53'),(28,'e9e1c5a4-78e5-4f02-9d36-60ec4044edda','store user role','store-user-role','2025-01-26 00:35:53','2025-01-26 00:35:53'),(29,'fe10fcd4-fd36-4e52-ae9f-d04fb078d83f','list role','list-role','2025-01-26 00:35:53','2025-01-26 00:35:53'),(30,'9c775a99-97bf-4b8e-940e-324ba22b63c2','create role','create-role','2025-01-26 00:35:53','2025-01-26 00:35:53'),(31,'793bc910-ec47-4d40-b044-212fbec9a97b','store role','store-role','2025-01-26 00:35:53','2025-01-26 00:35:53'),(32,'b142f3c4-9c54-4e73-8e98-33eb5ac44565','read role','read-role','2025-01-26 00:35:53','2025-01-26 00:35:53'),(33,'2f3faac7-2e9c-4375-a9fd-9803869f33c4','edit role','edit-role','2025-01-26 00:35:53','2025-01-26 00:35:53'),(34,'79fd94a9-020b-4baf-9bfd-62b7f6ba8134','update role','update-role','2025-01-26 00:35:53','2025-01-26 00:35:53'),(35,'60aef5f0-e6bc-4fee-bfa1-4b4ce0239fdc','delete role','delete-role','2025-01-26 00:35:53','2025-01-26 00:35:53'),(36,'e5a7e8e4-e06e-4bff-b5a9-b44adcb42663','store role permissions','store-role-permissions','2025-01-26 00:35:53','2025-01-26 00:35:53'),(37,'39ae8b65-5b87-44dd-8f6e-fcbfe259f2c6','list table','list-table','2025-01-26 00:35:53','2025-01-26 00:35:53'),(38,'5163ce90-c452-4260-ade7-e0332d52c396','list kategori','list-kategori','2025-01-26 05:19:29','2025-01-26 05:19:29'),(39,'3534e236-c112-4640-ae9c-171e0bf20c31','list vaksin','list-vaksin','2025-01-26 05:19:29','2025-01-26 05:19:29'),(40,'bde9f8d8-c42d-4a7f-a778-780dc254f9e5','list pws imunisasi bayi','list-pws-imunisasi-bayi','2025-01-26 05:19:29','2025-01-26 05:19:29'),(41,'f964cae6-8233-4071-a9a6-103e2fb7a69c','list pws imunisasi baduta','list-pws-imunisasi-baduta','2025-01-26 05:19:29','2025-01-26 05:19:29'),(42,'95ca8e13-f61a-4478-9ad5-fff682a46c56','list pws imunisasi wus','list-pws-imunisasi-wus','2025-01-26 05:19:29','2025-01-26 05:19:29');
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
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `pws`
--

DROP TABLE IF EXISTS `pws`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pws` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tahun_id` bigint unsigned NOT NULL,
  `bulan_id` bigint unsigned NOT NULL,
  `faskes_id` bigint unsigned NOT NULL,
  `vaksin_id` bigint unsigned NOT NULL,
  `wilayah_id` bigint unsigned NOT NULL,
  `jumlah_imunisasi_l` int NOT NULL DEFAULT '0',
  `jumlah_imunisasi_p` int NOT NULL DEFAULT '0',
  `kategori_id` bigint unsigned DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pws_tahun_id_foreign` (`tahun_id`),
  KEY `pws_bulan_id_foreign` (`bulan_id`),
  KEY `pws_faskes_id_foreign` (`faskes_id`),
  KEY `pws_vaksin_id_foreign` (`vaksin_id`),
  KEY `pws_wilayah_id_foreign` (`wilayah_id`),
  KEY `pws_kategori_id_foreign` (`kategori_id`),
  CONSTRAINT `pws_bulan_id_foreign` FOREIGN KEY (`bulan_id`) REFERENCES `bulans` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `pws_faskes_id_foreign` FOREIGN KEY (`faskes_id`) REFERENCES `faskes` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `pws_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pws_tahun_id_foreign` FOREIGN KEY (`tahun_id`) REFERENCES `tahuns` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `pws_vaksin_id_foreign` FOREIGN KEY (`vaksin_id`) REFERENCES `vaksins` (`id`) ON DELETE RESTRICT,
  CONSTRAINT `pws_wilayah_id_foreign` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayahs` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pws`
--

LOCK TABLES `pws` WRITE;
/*!40000 ALTER TABLE `pws` DISABLE KEYS */;
INSERT INTO `pws` VALUES (1,3,1,5,1,15,1,2,1,NULL,'2025-01-26 07:13:53','2025-01-26 07:13:53'),(2,3,1,5,1,16,3,4,1,NULL,'2025-01-26 07:13:53','2025-01-26 07:13:53'),(3,3,1,5,1,17,5,6,1,NULL,'2025-01-26 07:13:53','2025-01-26 07:13:53'),(4,3,1,5,1,18,7,9,1,NULL,'2025-01-26 07:13:53','2025-01-26 07:21:31'),(5,3,1,5,2,15,1,2,1,NULL,'2025-01-26 07:13:53','2025-01-26 07:13:53'),(6,3,1,5,2,16,3,4,1,NULL,'2025-01-26 07:13:53','2025-01-26 07:13:53'),(7,3,1,5,2,17,5,6,1,NULL,'2025-01-26 07:13:53','2025-01-26 07:13:53'),(8,3,1,5,2,18,5,8,1,NULL,'2025-01-26 07:13:53','2025-01-26 07:21:47');
/*!40000 ALTER TABLE `pws` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
INSERT INTO `role_permissions` VALUES (1,2,8,'2025-01-26 08:32:15','2025-01-26 08:32:15'),(2,2,4,'2025-01-26 08:32:15','2025-01-26 08:32:15'),(3,2,17,'2025-01-26 08:32:15','2025-01-26 08:32:15'),(4,2,9,'2025-01-26 08:32:15','2025-01-26 08:32:15'),(5,2,3,'2025-01-26 08:32:15','2025-01-26 08:32:15'),(6,2,42,'2025-01-26 08:32:15','2025-01-26 08:32:15'),(7,2,6,'2025-01-26 08:32:15','2025-01-26 08:32:15'),(8,2,40,'2025-01-26 08:32:15','2025-01-26 08:32:15'),(9,2,18,'2025-01-26 08:32:15','2025-01-26 08:32:15'),(10,2,5,'2025-01-26 08:32:15','2025-01-26 08:32:15'),(11,2,7,'2025-01-26 08:32:15','2025-01-26 08:32:15'),(12,2,41,'2025-01-26 08:32:15','2025-01-26 08:32:15'),(13,2,2,'2025-01-26 12:21:34','2025-01-26 12:21:34');
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
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'60a68931-3a49-4df0-a47c-404d5b0dd630','Administrator','administrator','2025-01-26 00:35:49','2025-01-26 00:35:49'),(2,'9291ac0e-d0fd-4510-833f-a2660ed17a39','Puskesmas','puskesmas','2025-01-26 07:35:47','2025-01-26 07:35:47'),(3,'a779d9c4-7094-4955-b43d-252586aaefc8','Dinas Kesehatan Kabupaten / Kota','dinas-kesehatan-kabupaten-kota','2025-01-26 07:36:04','2025-01-26 07:36:04'),(4,'3c4f38b0-5c2c-4e77-9750-023bb5ee1a7d','Dinas Kesehatan Provinsi','dinas-kesehatan-provinsi','2025-01-26 07:36:19','2025-01-26 07:36:19');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stok_vaksins`
--

DROP TABLE IF EXISTS `stok_vaksins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stok_vaksins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vaksin_id` bigint unsigned NOT NULL,
  `kode_batch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_produksi` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `jumlah` int NOT NULL DEFAULT '1',
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'vial',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stok_vaksins_uuid_unique` (`uuid`),
  KEY `stok_vaksins_vaksin_id_foreign` (`vaksin_id`),
  CONSTRAINT `stok_vaksins_vaksin_id_foreign` FOREIGN KEY (`vaksin_id`) REFERENCES `vaksins` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok_vaksins`
--

LOCK TABLES `stok_vaksins` WRITE;
/*!40000 ALTER TABLE `stok_vaksins` DISABLE KEYS */;
/*!40000 ALTER TABLE `stok_vaksins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tahuns`
--

DROP TABLE IF EXISTS `tahuns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tahuns` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tahuns`
--

LOCK TABLES `tahuns` WRITE;
/*!40000 ALTER TABLE `tahuns` DISABLE KEYS */;
INSERT INTO `tahuns` VALUES (1,'2023','2025-01-26 00:35:49','2025-01-26 00:35:49'),(2,'2024','2025-01-26 00:35:49','2025-01-26 00:35:49'),(3,'2025','2025-01-26 00:35:49','2025-01-26 00:35:49');
/*!40000 ALTER TABLE `tahuns` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,1,1,'2025-01-26 00:35:49','2025-01-26 00:35:49'),(4,5,2,'2025-01-26 12:20:55','2025-01-26 12:20:55');
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
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biodata_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_uuid_unique` (`uuid`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_biodata_id_foreign` (`biodata_id`),
  CONSTRAINT `users_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodatas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'f472e3e8-e824-402a-bbe8-e8d61f149a32',1,'abangucup@duck.com',NULL,'$2y$12$C9S3lXC9tag4nCfXx5hP4ukJ2qDDgpeg62PXeNQqb1hERX.Po0.7q','b4ngm4n',NULL,'2025-01-26 00:35:49','2025-01-26 00:35:49'),(5,'93a9bec3-e191-42c8-8ab8-a83370120843',8,'id.salmanmustapa@gmail.com',NULL,'$2y$12$RKvsYBcunT/4TqaTBiiUR.kUZVOwj2K0btitOCgK10xi3OMiIlpXG','mances',NULL,'2025-01-26 12:20:55','2025-01-26 12:20:55');
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
  `produsen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vaksins_uuid_unique` (`uuid`),
  UNIQUE KEY `vaksins_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vaksins`
--

LOCK TABLES `vaksins` WRITE;
/*!40000 ALTER TABLE `vaksins` DISABLE KEYS */;
INSERT INTO `vaksins` VALUES (1,'a0f2806c-459b-4a62-ab8f-ba6bc286426b','HB0','hb0',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(2,'25d3c560-ef94-491d-894c-a4dc15d87e4a','BCG','bcg',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(3,'f88ad62b-b29d-41c2-bff6-2ea3b54a19f6','Polio 1','polio-1',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(4,'9526efd6-5729-4344-ba9b-1902b99a98cc','DPT/HB/Hib 1','dpthbhib-1',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(5,'ef813e76-ba85-4f9a-ad97-8400da480a68','Polio 2','polio-2',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(6,'40940e03-2b96-4b28-8635-972f199c223a','PCV 1','pcv-1',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(7,'aca977d8-9a52-423b-a4c8-c54980f3cb79','RV 1','rv-1',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(8,'f4123360-54db-4bfe-924e-d0c8468138d7','DPT/HB/Hib 2','dpthbhib-2',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(9,'342cb740-7333-4659-be44-efedadc3285e','Polio 3','polio-3',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(10,'ff6aa697-54da-4374-9191-7ec21e55af55','PCV 2','pcv-2',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(11,'e04cc33f-2651-4a03-8333-044c1138afdc','RV 2','rv-2',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(12,'4ab5c15c-e79f-42c5-9dbd-e8a55212b897','DPT/HB/Hib 3','dpthbhib-3',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(13,'eb6a9745-5bb8-4b5c-8f3a-df606f130d85','Polio 4','polio-4',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(14,'ceb92118-1213-43e6-ba73-fafaa2572f09','RV 3','rv-3',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(15,'483c41ce-5a30-4efd-b903-6c0b9ce50cdd','IPV 1','ipv-1',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(16,'d28b46d7-527f-4a3b-8295-940a355769c2','T 1','t-1',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(17,'7c4f3d7f-0d85-4a18-8315-aeb2182106ad','T 2','t-2',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(18,'dabd88da-8000-4c69-965e-2ad46d743584','T 3','t-3',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(19,'5eac74e4-f583-444f-a586-ac0641b0f93a','T 4','t-4',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(20,'9984d7f5-4e16-495b-b400-b8cc5af07884','T 5','t-5',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(21,'e82a44d3-8a64-41ce-86ee-46d82bd61d2d','Td','td',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(22,'05c72b30-077c-49b9-80d5-dc761c9b394f','MR 1','mr-1',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(23,'f31fc0eb-7751-4261-8a5b-1bf0d687a816','IPV 2','ipv-2',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(24,'666a7893-743c-4713-b647-1e928e3f6936','DPT-HB-Hib 4','dpt-hb-hib-4',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(25,'62b1496e-8e74-478c-8ec4-626e766436e7','MR 2','mr-2',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08'),(26,'8e02f17e-83db-4b06-9927-a3fcdc335272','PCV 3','pcv-3',NULL,NULL,'2025-01-26 05:34:08','2025-01-26 05:34:08');
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
  `wilayah_id` bigint unsigned NOT NULL,
  `faskes_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wilayah_kerjas_wilayah_id_foreign` (`wilayah_id`),
  KEY `wilayah_kerjas_faskes_id_foreign` (`faskes_id`),
  CONSTRAINT `wilayah_kerjas_faskes_id_foreign` FOREIGN KEY (`faskes_id`) REFERENCES `faskes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wilayah_kerjas_wilayah_id_foreign` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayahs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wilayah_kerjas`
--

LOCK TABLES `wilayah_kerjas` WRITE;
/*!40000 ALTER TABLE `wilayah_kerjas` DISABLE KEYS */;
INSERT INTO `wilayah_kerjas` VALUES (5,2,1,'2025-01-26 00:37:50','2025-01-26 00:37:50'),(6,17,2,'2025-01-26 00:39:28','2025-01-26 00:39:28'),(7,3,2,'2025-01-26 00:39:28','2025-01-26 00:39:28'),(8,49,2,'2025-01-26 00:39:28','2025-01-26 00:39:28'),(9,11,2,'2025-01-26 00:39:28','2025-01-26 00:39:28'),(10,56,2,'2025-01-26 00:39:28','2025-01-26 00:39:28'),(11,36,2,'2025-01-26 00:39:28','2025-01-26 00:39:28'),(12,42,2,'2025-01-26 00:39:28','2025-01-26 00:39:28'),(13,23,2,'2025-01-26 00:39:28','2025-01-26 00:39:28'),(14,30,2,'2025-01-26 00:39:28','2025-01-26 00:39:28'),(15,8,5,'2025-01-26 00:43:15','2025-01-26 00:43:15'),(16,10,5,'2025-01-26 00:43:15','2025-01-26 00:43:15'),(17,9,5,'2025-01-26 00:43:15','2025-01-26 00:43:15'),(18,7,5,'2025-01-26 00:43:15','2025-01-26 00:43:15'),(19,44,3,'2025-01-26 00:44:25','2025-01-26 00:44:25'),(20,45,3,'2025-01-26 00:44:25','2025-01-26 00:44:25'),(21,43,3,'2025-01-26 00:44:25','2025-01-26 00:44:25'),(22,46,3,'2025-01-26 00:44:25','2025-01-26 00:44:25'),(23,48,3,'2025-01-26 00:44:25','2025-01-26 00:44:25'),(24,47,3,'2025-01-26 00:44:25','2025-01-26 00:44:25'),(25,6,4,'2025-01-26 00:49:06','2025-01-26 00:49:06'),(26,5,4,'2025-01-26 00:49:06','2025-01-26 00:49:06'),(27,4,4,'2025-01-26 00:49:06','2025-01-26 00:49:06'),(28,14,6,'2025-01-26 00:50:02','2025-01-26 00:50:02'),(29,12,6,'2025-01-26 00:50:02','2025-01-26 00:50:02'),(30,15,6,'2025-01-26 00:50:02','2025-01-26 00:50:02'),(31,16,6,'2025-01-26 00:50:02','2025-01-26 00:50:02'),(32,13,6,'2025-01-26 00:50:02','2025-01-26 00:50:02'),(33,22,7,'2025-01-26 00:51:12','2025-01-26 00:51:12'),(34,20,7,'2025-01-26 00:51:12','2025-01-26 00:51:12'),(35,18,7,'2025-01-26 00:51:12','2025-01-26 00:51:12'),(36,19,7,'2025-01-26 00:51:12','2025-01-26 00:51:12'),(37,21,7,'2025-01-26 00:51:12','2025-01-26 00:51:12'),(38,25,8,'2025-01-26 00:52:44','2025-01-26 00:52:44'),(39,26,8,'2025-01-26 00:52:44','2025-01-26 00:52:44'),(40,27,8,'2025-01-26 00:52:44','2025-01-26 00:52:44'),(41,24,8,'2025-01-26 00:52:44','2025-01-26 00:52:44'),(42,28,8,'2025-01-26 00:52:44','2025-01-26 00:52:44'),(43,29,8,'2025-01-26 00:52:44','2025-01-26 00:52:44'),(44,33,9,'2025-01-26 00:53:35','2025-01-26 00:53:35'),(45,34,9,'2025-01-26 00:53:35','2025-01-26 00:53:35'),(46,31,9,'2025-01-26 00:53:35','2025-01-26 00:53:35'),(47,35,9,'2025-01-26 00:53:35','2025-01-26 00:53:35'),(48,32,9,'2025-01-26 00:53:35','2025-01-26 00:53:35'),(49,39,10,'2025-01-26 00:54:14','2025-01-26 00:54:14'),(50,40,10,'2025-01-26 00:54:14','2025-01-26 00:54:14'),(51,41,10,'2025-01-26 00:54:14','2025-01-26 00:54:14'),(52,38,10,'2025-01-26 00:54:14','2025-01-26 00:54:14'),(53,37,10,'2025-01-26 00:54:14','2025-01-26 00:54:14'),(54,51,11,'2025-01-26 00:55:23','2025-01-26 00:55:23'),(55,55,11,'2025-01-26 00:55:23','2025-01-26 00:55:23'),(56,50,11,'2025-01-26 00:55:23','2025-01-26 00:55:23'),(57,54,11,'2025-01-26 00:55:23','2025-01-26 00:55:23'),(58,53,11,'2025-01-26 00:55:23','2025-01-26 00:55:23'),(59,52,11,'2025-01-26 00:55:23','2025-01-26 00:55:23'),(60,60,12,'2025-01-26 00:57:42','2025-01-26 00:57:42'),(61,58,12,'2025-01-26 00:57:42','2025-01-26 00:57:42'),(62,59,12,'2025-01-26 00:57:42','2025-01-26 00:57:42'),(63,56,12,'2025-01-26 00:57:42','2025-01-26 00:57:42'),(64,61,12,'2025-01-26 00:57:42','2025-01-26 00:57:42');
/*!40000 ALTER TABLE `wilayah_kerjas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wilayahs`
--

DROP TABLE IF EXISTS `wilayahs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wilayahs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_wilayah` enum('provinsi','kabkot','kecamatan','kelurahan','desa') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int unsigned NOT NULL DEFAULT '0',
  `_rgt` int unsigned NOT NULL DEFAULT '0',
  `parent_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wilayahs_uuid_unique` (`uuid`),
  UNIQUE KEY `wilayahs_slug_unique` (`slug`),
  KEY `wilayahs__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wilayahs`
--

LOCK TABLES `wilayahs` WRITE;
/*!40000 ALTER TABLE `wilayahs` DISABLE KEYS */;
INSERT INTO `wilayahs` VALUES (1,'a6a07ded-163c-4220-81ab-7843cef04abd','Gorontalo','gorontalo-75','75','provinsi',1,122,NULL,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(2,'5df65eaf-8bee-41d1-9711-7cf98de85291','Kota Gorontalo','kota-gorontalo-7571','7571','kabkot',2,121,1,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(3,'2884d4d4-0302-4183-a774-ed290580ce46','Kecamatan Kota Barat','kecamatan-kota-barat-7571010','7571010','kecamatan',3,18,2,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(4,'e933107c-8027-4695-a138-37b160956c0e','Kelurahan Dembe I','kelurahan-dembe-i-7571010001','7571010001','kelurahan',4,5,3,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(5,'ba27961f-9a0c-4a4c-9b09-ec9ee549fbcc','Kelurahan Lekobalo','kelurahan-lekobalo-7571010002','7571010002','kelurahan',6,7,3,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(6,'7beee926-aaae-454c-858e-12ccaf263ab3','Kelurahan Pilolodaa','kelurahan-pilolodaa-7571010003','7571010003','kelurahan',8,9,3,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(7,'997a1894-fcc2-429b-a83d-6c471ccdc31f','Kelurahan Buliide','kelurahan-buliide-7571010004','7571010004','kelurahan',10,11,3,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(8,'431253be-eb4b-4544-bba8-f6a03718a2ac','Kelurahan Tenilo','kelurahan-tenilo-7571010005','7571010005','kelurahan',12,13,3,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(9,'91a6af05-3b2d-4516-bffd-e23bcc5b3ad9','Kelurahan Molosipat W','kelurahan-molosipat-w-7571010006','7571010006','kelurahan',14,15,3,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(10,'46096de7-218b-4ed9-a43d-ad5713d14a7b','Kelurahan Buladu','kelurahan-buladu-7571010008','7571010008','kelurahan',16,17,3,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(11,'5479830e-b793-4da3-ad6e-873dfca684a1','Kecamatan Dungingi','kecamatan-dungingi-7571011','7571011','kecamatan',19,30,2,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(12,'4534b4b7-db7a-4dba-8432-a7f0166dc8d2','Kelurahan Tuladenggi','kelurahan-tuladenggi-7571011001','7571011001','kelurahan',20,21,11,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(13,'aae97ea1-8a23-4044-a8eb-891df671873a','Kelurahan Libuo','kelurahan-libuo-7571011002','7571011002','kelurahan',22,23,11,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(14,'0e725291-c34d-4a88-b92f-8142d0167ea1','Kelurahan Tomulabutao','kelurahan-tomulabutao-7571011003','7571011003','kelurahan',24,25,11,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(15,'4cdf6bc2-9927-4b0d-8e99-b6a90e50ef14','Kelurahan Huangobotu','kelurahan-huangobotu-7571011004','7571011004','kelurahan',26,27,11,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(16,'9f312bb9-0f73-4e41-9bf4-4ea47793f911','Kelurahan Tomulabutao Selatan','kelurahan-tomulabutao-selatan-7571011005','7571011005','kelurahan',28,29,11,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(17,'12af9de2-2a54-41c0-8114-a0503e64886f','Kecamatan Kota Selatan','kecamatan-kota-selatan-7571020','7571020','kecamatan',31,42,2,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(18,'572619bb-5326-45f2-b618-65c97993947d','Kelurahan Biawu','kelurahan-biawu-7571020010','7571020010','kelurahan',32,33,17,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(19,'e90e5e6f-b23c-4404-9a58-4a3c062bcce2','Kelurahan Biawao','kelurahan-biawao-7571020011','7571020011','kelurahan',34,35,17,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(20,'0beeaf60-794d-4a6c-9d5a-4956b8e0892d','Kelurahan Limba B','kelurahan-limba-b-7571020018','7571020018','kelurahan',36,37,17,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(21,'fa15f4b7-7158-4e9f-98bc-557036b035fe','Kelurahan Limba U Satu','kelurahan-limba-u-satu-7571020019','7571020019','kelurahan',38,39,17,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(22,'0087433c-2cc1-43b1-9d0f-fcb04236a1fc','Kelurahan Limba U Dua','kelurahan-limba-u-dua-7571020020','7571020020','kelurahan',40,41,17,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(23,'d7011941-92f6-46ad-8c21-45779c2d1caf','Kecamatan Kota Timur','kecamatan-kota-timur-7571021','7571021','kecamatan',43,56,2,'2025-01-26 00:35:46','2025-01-26 00:35:46'),(24,'5fb8f3f0-9b1c-4054-acdb-be444883972e','Kelurahan Padebuolo','kelurahan-padebuolo-7571021006','7571021006','kelurahan',44,45,23,'2025-01-26 00:35:46','2025-01-26 00:35:47'),(25,'261c00cc-6622-4d09-b602-99518fe48046','Kelurahan Ipilo','kelurahan-ipilo-7571021007','7571021007','kelurahan',46,47,23,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(26,'3ba366e6-98f3-44fb-bb81-3efdf73a2d80','Kelurahan Tamalate','kelurahan-tamalate-7571021008','7571021008','kelurahan',48,49,23,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(27,'45525a1b-c405-4943-b4d3-ca4a39542828','Kelurahan Moodu','kelurahan-moodu-7571021009','7571021009','kelurahan',50,51,23,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(28,'8df38760-017e-4625-9c87-986acdff8172','Kelurahan Heledulaa Selatan','kelurahan-heledulaa-selatan-7571021010','7571021010','kelurahan',52,53,23,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(29,'f0380619-b460-4841-b8cb-f2f0626e0b24','Kelurahan Heledulaa Utara','kelurahan-heledulaa-utara-7571021011','7571021011','kelurahan',54,55,23,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(30,'f6caaec5-dada-41d2-a522-123c86f06334','Kecamatan Hulonthalangi','kecamatan-hulonthalangi-7571022','7571022','kecamatan',57,68,2,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(31,'a7301c7b-ff6d-4623-a4bc-6728a2584dee','Kelurahan Tanjung Kramat','kelurahan-tanjung-kramat-7571022001','7571022001','kelurahan',58,59,30,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(32,'d3a67863-a4c6-4291-919b-a2f226845772','Kelurahan Pohe','kelurahan-pohe-7571022002','7571022002','kelurahan',60,61,30,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(33,'072aea85-abfe-4485-9cf7-7075f7b5c680','Kelurahan Tenda','kelurahan-tenda-7571022003','7571022003','kelurahan',62,63,30,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(34,'831052b4-f287-43d5-9e7c-f14bff8e0572','Kelurahan Siendeng','kelurahan-siendeng-7571022004','7571022004','kelurahan',64,65,30,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(35,'d08322ad-ae6c-4516-8650-7ec96704927b','Kelurahan Donggala','kelurahan-donggala-7571022005','7571022005','kelurahan',66,67,30,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(36,'86df7d88-e12a-44c9-9f21-2e4075c0fc5a','Kecamatan Dumbo Raya','kecamatan-dumbo-raya-7571023','7571023','kecamatan',69,80,2,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(37,'f1214aa0-3437-49a4-9c3b-d33ec41e89c8','Kelurahan Leato Selatan','kelurahan-leato-selatan-7571023001','7571023001','kelurahan',70,71,36,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(38,'b68b31bb-498a-49b4-a783-8701abb93f03','Kelurahan Leato Utara','kelurahan-leato-utara-7571023002','7571023002','kelurahan',72,73,36,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(39,'57a719b1-6bf3-4157-a04d-873d9006dc0b','Kelurahan Talumolo','kelurahan-talumolo-7571023003','7571023003','kelurahan',74,75,36,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(40,'65ba68c7-b746-4580-9104-0408861cd692','Kelurahan Botu','kelurahan-botu-7571023004','7571023004','kelurahan',76,77,36,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(41,'6be9ac43-9531-4f5e-9bcf-52be9b6a3280','Kelurahan Bugis','kelurahan-bugis-7571023005','7571023005','kelurahan',78,79,36,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(42,'d6ba548c-7d45-40ea-bc08-d6a195f34bd6','Kecamatan Kota Utara','kecamatan-kota-utara-7571030','7571030','kecamatan',81,94,2,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(43,'597caf6b-5276-4f8b-b8a5-c915754f4386','Kelurahan Dembe II','kelurahan-dembe-ii-7571030003','7571030003','kelurahan',82,83,42,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(44,'1a0fa962-0680-4bf9-bc6a-5dac88690a9a','Kelurahan Wongkaditi Timur','kelurahan-wongkaditi-timur-7571030004','7571030004','kelurahan',84,85,42,'2025-01-26 00:35:47','2025-01-26 00:35:47'),(45,'31ba5c4c-422a-4859-a558-1f12a515545c','Kelurahan Wongkaditi Barat','kelurahan-wongkaditi-barat-7571030005','7571030005','kelurahan',86,87,42,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(46,'63e236ab-a486-415f-af48-6c9a811ffb1c','Kelurahan Dulomo Selatan','kelurahan-dulomo-selatan-7571030011','7571030011','kelurahan',88,89,42,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(47,'f3077311-2fb6-4414-9838-08d6712fe756','Kelurahan Dulomo Utara','kelurahan-dulomo-utara-7571030012','7571030012','kelurahan',90,91,42,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(48,'6f3e4582-ace7-432a-9d90-5101b084e016','Kelurahan Dembe Jaya','kelurahan-dembe-jaya-7571030015','7571030015','kelurahan',92,93,42,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(49,'4b67fef2-57c2-4aa1-a08c-f481e8ee6232','Kecamatan Kota Tengah','kecamatan-kota-tengah-7571031','7571031','kecamatan',95,108,2,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(50,'92453600-6758-4845-ba9e-835fdb08e3d7','Kelurahan Wumialo','kelurahan-wumialo-7571031001','7571031001','kelurahan',96,97,49,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(51,'61299702-baf2-4f9f-82ac-4bc136dc7cf4','Kelurahan Dulalowo','kelurahan-dulalowo-7571031002','7571031002','kelurahan',98,99,49,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(52,'efc18a00-aff9-4058-9efa-8f91d1dd0050','Kelurahan Liluwo','kelurahan-liluwo-7571031003','7571031003','kelurahan',100,101,49,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(53,'bed551a8-6cff-42ab-92c6-62d09616b1e9','Kelurahan Pulubala','kelurahan-pulubala-7571031004','7571031004','kelurahan',102,103,49,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(54,'aec2eed9-0d78-4d46-a07d-3d8091a30b06','Kelurahan Paguyaman','kelurahan-paguyaman-7571031005','7571031005','kelurahan',104,105,49,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(55,'68cdb70e-70bf-4332-9399-2ca8de8f97bf','Kelurahan Dulalowo Timur','kelurahan-dulalowo-timur-7571031006','7571031006','kelurahan',106,107,49,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(56,'64d74ca5-aebc-4f5f-991a-c8e9385a5da4','Kecamatan Sipatana','kecamatan-sipatana-7571032','7571032','kecamatan',109,120,2,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(57,'e847be96-e1a6-413d-852c-8b1400952802','Kelurahan Tapa','kelurahan-tapa-7571032001','7571032001','kelurahan',110,111,56,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(58,'1f9775da-7977-4ca7-aa50-617dc39fd652','Kelurahan Molosipat U','kelurahan-molosipat-u-7571032002','7571032002','kelurahan',112,113,56,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(59,'2b4c255b-7a28-494d-818c-9ff6d5cc53bd','Kelurahan Tanggikiki','kelurahan-tanggikiki-7571032003','7571032003','kelurahan',114,115,56,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(60,'19a6c24c-2ff1-4a04-805f-c3140fd614a5','Kelurahan Bulotadaa Timur','kelurahan-bulotadaa-timur-7571032004','7571032004','kelurahan',116,117,56,'2025-01-26 00:35:48','2025-01-26 00:35:48'),(61,'a92de7b4-ccdb-4921-aff2-b43f0cf2c6ed','Kelurahan Bulotadaa Barat','kelurahan-bulotadaa-barat-7571032005','7571032005','kelurahan',118,119,56,'2025-01-26 00:35:48','2025-01-26 00:35:48');
/*!40000 ALTER TABLE `wilayahs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-26 23:22:52
