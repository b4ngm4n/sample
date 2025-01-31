-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2025 at 10:22 AM
-- Server version: 10.11.10-MariaDB-cll-lve
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `n1577750_sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_penggunas`
--

CREATE TABLE `akun_penggunas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faskes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_akun` enum('aktif','tidak_aktif') NOT NULL DEFAULT 'aktif',
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun_penggunas`
--

INSERT INTO `akun_penggunas` (`id`, `faskes_id`, `user_id`, `status_akun`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 'aktif', NULL, '2025-01-26 12:20:55', '2025-01-26 12:20:55'),
(2, 2, 6, 'aktif', NULL, '2025-01-26 15:40:47', '2025-01-26 15:40:47'),
(3, 3, 7, 'aktif', NULL, '2025-01-30 01:25:24', '2025-01-30 01:25:24'),
(4, 4, 8, 'aktif', NULL, '2025-01-30 01:27:32', '2025-01-30 01:27:32'),
(5, 5, 9, 'aktif', NULL, '2025-01-30 01:28:37', '2025-01-30 01:28:37'),
(6, 6, 10, 'aktif', NULL, '2025-01-30 01:29:20', '2025-01-30 01:29:20'),
(7, 7, 11, 'aktif', NULL, '2025-01-30 01:30:20', '2025-01-30 01:30:20'),
(8, 8, 12, 'aktif', NULL, '2025-01-30 01:30:58', '2025-01-30 01:30:58'),
(9, 9, 13, 'aktif', NULL, '2025-01-30 01:31:40', '2025-01-30 01:31:40'),
(10, 10, 14, 'aktif', NULL, '2025-01-30 01:32:31', '2025-01-30 01:32:31'),
(11, 11, 15, 'aktif', NULL, '2025-01-30 01:33:23', '2025-01-30 01:33:23'),
(12, 12, 16, 'aktif', NULL, '2025-01-30 01:34:00', '2025-01-30 01:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `alamats`
--

CREATE TABLE `alamats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `jalan` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kode_pos` char(5) DEFAULT NULL,
  `rt` char(3) DEFAULT NULL,
  `rw` char(3) DEFAULT NULL,
  `alamatable_id` bigint(20) UNSIGNED NOT NULL,
  `alamatable_type` varchar(255) NOT NULL,
  `status` enum('alamat_utama','alamat_tambahan','alamat_lama') NOT NULL DEFAULT 'alamat_utama',
  `wilayah_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alamats`
--

INSERT INTO `alamats` (`id`, `uuid`, `jalan`, `slug`, `kode_pos`, `rt`, `rw`, `alamatable_id`, `alamatable_type`, `status`, `wilayah_id`, `created_at`, `updated_at`) VALUES
(1, 'b5abae7c-cf2b-40d8-bfd5-04eceea36b86', 'Jl. Pangeran Hidayat', 'jl-96128pangeran-96128hidayat', '96128', NULL, NULL, 1, 'App\\Models\\Faskes', 'alamat_utama', 54, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(2, '505be792-033d-43ec-841d-ec289a5f10a3', 'Jl. Jamaludin Malik', 'jl-jamaludin-malik-96138', '96138', NULL, NULL, 2, 'App\\Models\\Faskes', 'alamat_utama', 22, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(3, '92fe49f7-a232-4c38-b6d3-e00ae97075e2', 'Jl. Yusuf Dali', 'jl-yusuf-dali-45', NULL, NULL, NULL, 3, 'App\\Models\\Faskes', 'alamat_utama', 45, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(4, 'f3a98836-957d-4854-8027-83db81ffd097', 'Jl. Usman Isa', 'jl-usman-isa-6', NULL, NULL, NULL, 4, 'App\\Models\\Faskes', 'alamat_utama', 6, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(5, '2baf8dd1-c76c-40a0-b5de-44698531fadb', 'Jl. Rambutan', 'jl-rambutan-10', NULL, NULL, NULL, 5, 'App\\Models\\Faskes', 'alamat_utama', 10, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(6, 'a263c856-ee68-4178-8bba-b56f6aabc383', 'Jl. Palma', 'jl-palma-15', NULL, NULL, NULL, 6, 'App\\Models\\Faskes', 'alamat_utama', 15, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(7, 'bf64cc15-cffd-4da7-8f94-567d7c9ae26a', 'Jl. Mohamad Yamin', 'jl-mohamad-yamin-20', NULL, NULL, NULL, 7, 'App\\Models\\Faskes', 'alamat_utama', 20, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(8, '3e7235f6-6e64-4d36-b6f6-3f27eb31a8be', 'Jl. Kutai', 'jl-kutai-26', NULL, NULL, NULL, 8, 'App\\Models\\Faskes', 'alamat_utama', 26, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(9, 'e4e3a8fe-0eb1-437c-a38f-3a5a1aafcf8b', 'Jl. Sasuit Tubun', 'jl-sasuit-tubun-33', NULL, NULL, NULL, 9, 'App\\Models\\Faskes', 'alamat_utama', 33, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(10, '596c41ae-baf7-45c3-acea-baed5b34866a', 'Jl. Mayor Dullah', 'jl-mayor-dullah-39', NULL, NULL, NULL, 10, 'App\\Models\\Faskes', 'alamat_utama', 39, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(11, 'f5c12201-63ae-4978-8009-b9476c63a37f', 'Jl. Sulawesi', 'jl-sulawesi-51', NULL, NULL, NULL, 11, 'App\\Models\\Faskes', 'alamat_utama', 51, '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(12, 'c3caa305-d015-4b19-a0eb-94cadeebdb68', 'Jl. Tondano', 'jl-tondano-61', NULL, NULL, NULL, 12, 'App\\Models\\Faskes', 'alamat_utama', 61, '2025-01-26 00:35:49', '2025-01-26 00:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `biodatas`
--

CREATE TABLE `biodatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_tengah` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `nik` char(16) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('l','p') DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodatas`
--

INSERT INTO `biodatas` (`id`, `uuid`, `nama_lengkap`, `nama_depan`, `nama_tengah`, `nama_belakang`, `slug`, `nik`, `tanggal_lahir`, `tempat_lahir`, `agama`, `pekerjaan`, `jenis_kelamin`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, '1ca369f7-41d3-485b-9516-536a08c4bfce', 'Salman Mustapa', 'Salman', NULL, 'Mustapa', 'salman-mustapa-07', '7571000000000001', '2025-01-26', 'Gorontalo', 'Islam', NULL, NULL, '082154488769', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(8, '139ee74e-c707-4bee-863a-c88b81ca38a9', 'Salman Mustapa', 'Salman', NULL, 'Mustapa', 'salman-mustapa-2', '7571031310000002', '2000-10-13', 'Gorontalo', 'Islam', 'Operator Komputer', 'l', '082154488769', '2025-01-26 12:20:55', '2025-01-26 12:20:55'),
(9, '106abf8f-574a-41d9-8da8-3d46cda4c7fc', 'Farida Muchtar', 'Farida', NULL, 'Muchtar', 'farida-muchtar-9', '7571', '1974-01-01', 'Gorontalo', 'Islam', 'PJ Imunisasi', 'p', '08111', '2025-01-26 15:40:46', '2025-01-26 15:40:46'),
(10, '6e70aafe-8727-4fc2-aebc-64dcf87f602b', 'Puskesmas Kota Utara', 'Puskesmas', NULL, 'Kota Utara', 'puskesmas-kota-utara-10', '1071184', '2025-03-01', 'Gorontalo', 'Islam', '-', 'l', '-', '2025-01-30 01:25:24', '2025-01-30 01:25:24'),
(11, 'd5da5d69-e0d6-4912-80e0-b0e5e813e813', 'Puskesmas Pilolodaa', 'Puskesmas', NULL, 'Pilolodaa', 'puskesmas-pilolodaa-11', '1071177', '2025-01-30', '', 'Islam', '', 'l', '1071177', '2025-01-30 01:27:32', '2025-01-30 01:27:32'),
(12, '8cdb145f-24b1-493f-b300-b32ff36ccbe0', 'Puskesmas Kota Barat', 'Puskesmas', NULL, 'Kota Barat', 'puskesmas-kota-barat-12', '1071178', '2025-01-30', 'Gorontalo', 'Islam', '', 'l', '1071178', '2025-01-30 01:28:36', '2025-01-30 01:28:36'),
(13, '91d45465-b46f-4bf2-b47d-52800445baeb', 'Puskesmas Dungingi', 'Puskesmas', NULL, 'Dungingi', 'puskesmas-dungingi-13', '1071179', '2025-01-30', '', 'Islam', '', 'l', '1071179', '2025-01-30 01:29:20', '2025-01-30 01:29:20'),
(14, 'd0dd0460-b353-46ac-a5db-1d5b0bbe9fb7', 'Puskesmas Kota Selatan', 'Puskesmas', NULL, 'Kota Selatan', 'puskesmas-kota-selatan-14', '1071180', '2025-01-30', '', 'Islam', '', 'l', '1071180', '2025-01-30 01:30:20', '2025-01-30 01:30:20'),
(15, 'fdf0080f-e6c5-44b1-b070-ae1393177fa8', 'Puskesmas Kota Timur', 'Puskesmas', NULL, 'Kota Timur', 'puskesmas-kota-timur-15', '1071181', '2025-01-30', '', 'Islam', '', 'l', '1071181', '2025-01-30 01:30:57', '2025-01-30 01:30:57'),
(16, 'c0a388a9-ceb2-410f-8fdc-ddadbe19d8ae', 'Puskesmas Hulonthalangi', 'Puskesmas', NULL, 'Hulonthalangi', 'puskesmas-hulonthalangi-16', '1071182', '2025-01-30', '', 'Islam', '', 'l', '1071182', '2025-01-30 01:31:40', '2025-01-30 01:31:40'),
(17, '19856df5-01f4-42d5-bf26-3032f64e4085', 'Puskesmas Dumbo Raya', 'Puskesmas', NULL, 'Dumbo Raya', 'puskesmas-dumbo-raya-17', '1071183', '2025-01-30', '', 'Islam', '', 'l', '1071183', '2025-01-30 01:32:31', '2025-01-30 01:32:31'),
(18, '05a1749b-ed24-41bd-9b23-af9d88f5dbd7', 'Puskesmas Kota Tengah', 'Puskesmas', NULL, 'Kota Tengah', 'puskesmas-kota-tengah-18', '1071185', '2025-01-30', '', 'Islam', '', 'l', '1071185', '2025-01-30 01:33:23', '2025-01-30 01:33:23'),
(19, 'b513cee4-4128-4794-8a54-2778d63b79a1', 'Puskesmas Sipatana', 'Puskesmas', NULL, 'Sipatana', 'puskesmas-sipatana-19', '1071186', '2025-01-30', '', 'Islam', '', 'l', '1071186', '2025-01-30 01:34:00', '2025-01-30 01:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `bulans`
--

CREATE TABLE `bulans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bulans`
--

INSERT INTO `bulans` (`id`, `bulan`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Januari', 'januari', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(2, 'Februari', 'februari', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(3, 'Maret', 'maret', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(4, 'April', 'april', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(5, 'Mei', 'mei', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(6, 'Juni', 'juni', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(7, 'Juli', 'juli', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(8, 'Agustus', 'agustus', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(9, 'September', 'september', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(10, 'Oktober', 'oktober', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(11, 'November', 'november', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(12, 'Desember', 'desember', '2025-01-26 00:35:49', '2025-01-26 00:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faskes`
--

CREATE TABLE `faskes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `nama_faskes` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kode_faskes` varchar(255) NOT NULL,
  `jenis_faskes` enum('dinkes-prov','dinkes-kabkot','puskesmas','pustu','klinik','rs','lab-kesehatan','apotek','posyandu','gudang-farmasi','lkt','balai-pengobatan','labkesda') NOT NULL DEFAULT 'puskesmas',
  `status_faskes` enum('aktif','tidak-aktif') NOT NULL DEFAULT 'aktif',
  `wilayah_id` bigint(20) UNSIGNED DEFAULT NULL,
  `_lft` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `_rgt` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faskes`
--

INSERT INTO `faskes` (`id`, `uuid`, `nama_faskes`, `slug`, `kode_faskes`, `jenis_faskes`, `status_faskes`, `wilayah_id`, `_lft`, `_rgt`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, '128c3f53-2413-499d-819a-82ada4e4c67d', 'Dinas Kesehatan Provinsi Gorontalo', 'dinas-kesehatan-provinsi-gorontalo-75', '75', 'dinkes-prov', 'aktif', 1, 1, 24, NULL, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(2, 'dfd56362-c759-4694-83a9-f48cc8873e6e', 'Dinas Kesehatan Kota Gorontalo', 'dinas-kesehatan-kota-gorontalo-7571', '7571', 'dinkes-kabkot', 'aktif', 2, 2, 23, 1, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(3, 'b68a9837-0c84-44de-b1ba-e49085c82f43', 'Puskesmas Kota Utara', 'puskesmas-kota-utara-1071184', '1071184', 'puskesmas', 'aktif', 42, 3, 4, 2, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(4, '5c56e095-c100-4d1d-aca9-0eeb120e4ee1', 'Puskesmas Pilolodaa', 'puskesmas-pilolodaa-1071177', '1071177', 'puskesmas', 'aktif', 3, 5, 6, 2, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(5, '7d5da063-2578-490d-946e-e1c357dd9cc3', 'Puskesmas Kota Barat', 'puskesmas-kota-barat-1071178', '1071178', 'puskesmas', 'aktif', 3, 7, 8, 2, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(6, 'f2bae0be-def3-438a-ab94-4b4e0f4c7a79', 'Puskesmas Dungingi', 'puskesmas-dungingi-1071179', '1071179', 'puskesmas', 'aktif', 11, 9, 10, 2, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(7, '4dd5a821-c483-4073-b2ed-4103ea8b2e07', 'Puskesmas Kota Selatan', 'puskesmas-kota-selatan-1071180', '1071180', 'puskesmas', 'aktif', 17, 11, 12, 2, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(8, '9fea2dc7-86b8-4bf3-b8ee-cc1ba7e23de6', 'Puskesmas Kota Timur', 'puskesmas-kota-timur-1071181', '1071181', 'puskesmas', 'aktif', 23, 13, 14, 2, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(9, '7f786990-82da-4ff0-8b83-749cc93a8dae', 'Puskesmas Hulonthalangi', 'puskesmas-hulonthalangi-1071182', '1071182', 'puskesmas', 'aktif', 30, 15, 16, 2, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(10, '570e03f9-c43a-4870-b7e0-e4fc8024c1d9', 'Puskesmas Dumbo Raya', 'puskesmas-dumbo-raya-1071183', '1071183', 'puskesmas', 'aktif', 36, 17, 18, 2, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(11, '241434d5-cb10-4c92-a8c4-651477496f30', 'Puskesmas Kota Tengah', 'puskesmas-kota-tengah-1071185', '1071185', 'puskesmas', 'aktif', 49, 19, 20, 2, '2025-01-26 00:35:48', '2025-01-26 00:35:49'),
(12, '5a2ece54-8403-4354-9f84-6f3ccccbdd4a', 'Puskesmas Sipatana', 'puskesmas-sipatana-1071186', '1071186', 'puskesmas', 'aktif', 56, 21, 22, 2, '2025-01-26 00:35:49', '2025-01-26 00:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `jenis_kategori` varchar(255) NOT NULL,
  `status_kategori` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `uuid`, `nama_kategori`, `slug`, `jenis_kategori`, `status_kategori`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '20de0b74-effb-4cbc-a386-4bbe7bf5ff41', 'Imunisasi Dasar Lengkap 1', 'imunisasi-dasar-lengkap-1', 'bayi', 'idl', 'Imunisasi Dasar Lengkap 1', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(2, 'f149bd02-407d-4c6a-87cb-614f226ca06e', 'Imunisasi Baduta Lengkap 1', 'imunisasi-baduta-lengkap-1', 'baduta', 'ibl', 'Imuinasasi Bayi Dua Tahun Lengkap', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(3, 'c4f4acc5-d386-47f2-bc35-28798f30bf09', 'Imunisasi TT WUS', 'imunisasi-tt-wus', 'wus', 'tt+', 'Imunisasi Tetanus Toksoid (TT) pada WUS', '2025-01-26 00:35:49', '2025-01-26 00:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_vaksins`
--

CREATE TABLE `kategori_vaksins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `vaksin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_vaksins`
--

INSERT INTO `kategori_vaksins` (`id`, `kategori_id`, `vaksin_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(4, 1, 2, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(5, 1, 3, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(6, 1, 4, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(7, 1, 5, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(8, 1, 6, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(9, 1, 7, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(10, 1, 8, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(11, 1, 9, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(12, 1, 10, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(13, 1, 11, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(14, 1, 12, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(15, 1, 13, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(16, 1, 14, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(17, 1, 15, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(18, 3, 16, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(19, 3, 17, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(20, 3, 18, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(21, 3, 19, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(22, 3, 20, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(23, 3, 21, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(24, 1, 22, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(25, 1, 23, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(26, 2, 24, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(27, 2, 25, '2025-01-27 02:45:44', '2025-01-27 02:45:44'),
(28, 2, 26, '2025-01-27 02:45:44', '2025-01-27 02:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_11_28_155020_create_biodatas_table', 1),
(5, '2024_11_28_155022_create_users_table', 1),
(6, '2024_11_28_155047_create_permissions_table', 1),
(7, '2024_11_28_160237_create_roles_table', 1),
(8, '2024_11_29_025058_create_role_permissions_table', 1),
(9, '2024_11_29_025114_create_user_roles_table', 1),
(10, '2024_11_29_033957_create_user_permissions_table', 1),
(11, '2024_12_16_074127_create_vaksins_table', 1),
(12, '2025_01_10_101213_create_bulans_table', 1),
(13, '2025_01_10_101257_create_tahuns_table', 1),
(14, '2025_01_10_182905_create_stok_vaksins_table', 1),
(15, '2025_01_13_071207_create_wilayahs_table', 1),
(16, '2025_01_20_215817_create_faskes_table', 1),
(17, '2025_01_21_093539_create_alamats_table', 1),
(18, '2025_01_21_132414_create_wilayah_kerjas_table', 1),
(19, '2025_01_26_022923_create_kategoris_table', 1),
(20, '2025_01_26_114524_create_kategori_vaksins_table', 2),
(21, '2025_01_26_142338_create_pws_table', 3),
(22, '2025_01_26_160746_create_akun_penggunas_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `uuid`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, '02e11ea5-cf9a-4c47-bed3-4436d80f0715', 'home care', 'home-care', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(2, '51c0704a-3e18-4aba-a9fd-c66d6c543b02', 'dashboard', 'dashboard', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(3, '94b4dd9f-ddca-4cb1-b759-5f874e22a0cc', 'list wilayah', 'list-wilayah', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(4, '192780c1-b43a-4b87-830c-205d18bdae0f', 'create wilayah', 'create-wilayah', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(5, 'ca7e3789-9a90-45c5-a754-ecc68324ff9d', 'store wilayah', 'store-wilayah', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(6, '9976d5f9-02a5-4cbd-b8e5-e86bcd7959fd', 'read wilayah', 'read-wilayah', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(7, 'e3eb435e-9a46-4b52-9216-379dbceb2275', 'edit wilayah', 'edit-wilayah', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(8, '098be508-ba9e-4e15-ae28-6ed862e07923', 'update wilayah', 'update-wilayah', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(9, '4de8acaf-f290-40e3-8ec6-85e11a4bb182', 'delete wilayah', 'delete-wilayah', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(10, 'cb039b10-ff2c-4bd9-a49b-9e79dad851ef', 'list faskes', 'list-faskes', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(11, 'c80ec3a9-254e-4215-8afb-56473b621e71', 'create faskes', 'create-faskes', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(12, '0c8417cf-a94b-450c-b944-f68f78ecbfeb', 'store faskes', 'store-faskes', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(13, 'aa012d88-7e13-40a9-9e13-0d369dca4829', 'read faskes', 'read-faskes', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(14, 'ffdb5dcf-68f3-4069-936e-24aad9d29c48', 'edit faskes', 'edit-faskes', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(15, '9ad97c69-4406-400e-97f4-f843f3b1e5d3', 'update faskes', 'update-faskes', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(16, 'f2abbf91-855b-4f17-90ce-5a26a3770e2b', 'delete faskes', 'delete-faskes', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(17, '214ca069-db80-44bf-899a-220d85932d79', 'store wilayah kerja', 'store-wilayah-kerja', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(18, 'ca6e7492-88e7-4cba-ad34-1eeef6ea345d', 'delete wilayah kerja', 'delete-wilayah-kerja', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(19, '543b4f8b-9be2-4261-9bdc-99a19baffbab', 'list user', 'list-user', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(20, '817550d5-cdfc-4ee6-aca9-7497c5fce607', 'create user', 'create-user', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(21, 'acd6c781-e731-4d3e-b38f-63306f6bc8aa', 'store user', 'store-user', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(22, '3d492f78-ea6d-4f1f-9e59-03a4e0d0d9fa', 'read user', 'read-user', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(23, '2452ac4a-94c9-49bf-ab6b-2d0be978e759', 'edit user', 'edit-user', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(24, '627c4126-d1a8-4a1f-b1fa-d9781c8707fe', 'update user', 'update-user', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(25, '86b25d6d-3e54-4b35-9826-3dec3a0f3743', 'delete user', 'delete-user', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(26, '07d7fa86-6402-4e11-8dd8-9ba100b94f06', 'list user permissions', 'list-user-permissions', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(27, 'bd150e91-d73c-43f9-a598-23cf581c18b9', 'store user permissions', 'store-user-permissions', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(28, 'e9e1c5a4-78e5-4f02-9d36-60ec4044edda', 'store user role', 'store-user-role', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(29, 'fe10fcd4-fd36-4e52-ae9f-d04fb078d83f', 'list role', 'list-role', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(30, '9c775a99-97bf-4b8e-940e-324ba22b63c2', 'create role', 'create-role', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(31, '793bc910-ec47-4d40-b044-212fbec9a97b', 'store role', 'store-role', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(32, 'b142f3c4-9c54-4e73-8e98-33eb5ac44565', 'read role', 'read-role', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(33, '2f3faac7-2e9c-4375-a9fd-9803869f33c4', 'edit role', 'edit-role', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(34, '79fd94a9-020b-4baf-9bfd-62b7f6ba8134', 'update role', 'update-role', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(35, '60aef5f0-e6bc-4fee-bfa1-4b4ce0239fdc', 'delete role', 'delete-role', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(36, 'e5a7e8e4-e06e-4bff-b5a9-b44adcb42663', 'store role permissions', 'store-role-permissions', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(37, '39ae8b65-5b87-44dd-8f6e-fcbfe259f2c6', 'list table', 'list-table', '2025-01-26 00:35:53', '2025-01-26 00:35:53'),
(38, '5163ce90-c452-4260-ade7-e0332d52c396', 'list kategori', 'list-kategori', '2025-01-26 05:19:29', '2025-01-26 05:19:29'),
(39, '3534e236-c112-4640-ae9c-171e0bf20c31', 'list vaksin', 'list-vaksin', '2025-01-26 05:19:29', '2025-01-26 05:19:29'),
(40, 'bde9f8d8-c42d-4a7f-a778-780dc254f9e5', 'list pws imunisasi bayi', 'list-pws-imunisasi-bayi', '2025-01-26 05:19:29', '2025-01-26 05:19:29'),
(41, 'f964cae6-8233-4071-a9a6-103e2fb7a69c', 'list pws imunisasi baduta', 'list-pws-imunisasi-baduta', '2025-01-26 05:19:29', '2025-01-26 05:19:29'),
(42, '95ca8e13-f61a-4478-9ad5-fff682a46c56', 'list pws imunisasi wus', 'list-pws-imunisasi-wus', '2025-01-26 05:19:29', '2025-01-26 05:19:29'),
(43, 'f1cbb2e7-0b79-48de-a567-49b7ca969599', 'create kategori', 'create-kategori', '2025-01-26 15:43:17', '2025-01-26 15:43:17'),
(44, 'eca68c43-f264-456a-b97c-57e4a495e8d7', 'store kategori', 'store-kategori', '2025-01-26 15:43:17', '2025-01-26 15:43:17'),
(45, 'c43f595f-176d-43a6-b34a-49935ded7fae', 'read kategori', 'read-kategori', '2025-01-26 15:43:17', '2025-01-26 15:43:17'),
(46, '32814575-f4d1-4e05-a61b-19ac0071defe', 'edit kategori', 'edit-kategori', '2025-01-26 15:43:17', '2025-01-26 15:43:17'),
(47, 'cd268515-d13c-436b-8dfc-c35d409d8aa4', 'update kategori', 'update-kategori', '2025-01-26 15:43:17', '2025-01-26 15:43:17'),
(48, 'd6c8c600-43ea-4c44-a98e-475ac6ddaf24', 'delete kategori', 'delete-kategori', '2025-01-26 15:43:17', '2025-01-26 15:43:17'),
(49, '82b75178-19a2-47fa-96bf-84c303bceeae', 'create vaksin', 'create-vaksin', '2025-01-26 15:43:17', '2025-01-26 15:43:17'),
(50, '21409be8-218e-4ad7-8aeb-4b46faa0cef4', 'store vaksin', 'store-vaksin', '2025-01-26 15:43:17', '2025-01-26 15:43:17'),
(51, '0b8a45e7-452a-4b8b-ace7-a2a11ffc7d08', 'read vaksin', 'read-vaksin', '2025-01-26 15:43:17', '2025-01-26 15:43:17'),
(52, 'd960937f-585e-48b2-94a7-7deffb9dd475', 'edit vaksin', 'edit-vaksin', '2025-01-26 15:43:17', '2025-01-26 15:43:17'),
(53, 'c3f376d0-6a0c-40e4-ae8d-9462f3d2e648', 'update vaksin', 'update-vaksin', '2025-01-26 15:43:17', '2025-01-26 15:43:17'),
(54, '328e5990-8fc3-49b7-adf1-035e59c4b31f', 'delete vaksin', 'delete-vaksin', '2025-01-26 15:43:17', '2025-01-26 15:43:17'),
(55, 'd74d86a3-5340-4255-afcd-50a0dc0f1957', 'store pws imunisasi bayi', 'store-pws-imunisasi-bayi', '2025-01-26 15:43:17', '2025-01-26 15:43:17'),
(56, 'cac4680d-6672-4f17-8c6a-be918dbfbbba', 'store pws imunisasi baduta', 'store-pws-imunisasi-baduta', '2025-01-26 15:43:17', '2025-01-26 15:43:17'),
(57, 'c18e8ac9-1a28-4689-9e7a-0f831fdebc55', 'store pws imunisasi wus', 'store-pws-imunisasi-wus', '2025-01-26 15:43:17', '2025-01-26 15:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pws`
--

CREATE TABLE `pws` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_id` bigint(20) UNSIGNED NOT NULL,
  `bulan_id` bigint(20) UNSIGNED NOT NULL,
  `faskes_id` bigint(20) UNSIGNED NOT NULL,
  `vaksin_id` bigint(20) UNSIGNED NOT NULL,
  `wilayah_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_imunisasi_l` int(11) NOT NULL DEFAULT 0,
  `jumlah_imunisasi_p` int(11) NOT NULL DEFAULT 0,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pws`
--

INSERT INTO `pws` (`id`, `tahun_id`, `bulan_id`, `faskes_id`, `vaksin_id`, `wilayah_id`, `jumlah_imunisasi_l`, `jumlah_imunisasi_p`, `kategori_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(121, 3, 1, 3, 1, 19, 10, 2, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(122, 3, 1, 3, 1, 20, 2, 2, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(123, 3, 1, 3, 1, 21, 2, 2, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(124, 3, 1, 3, 1, 22, 2, 2, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(125, 3, 1, 3, 1, 23, 2, 2, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(126, 3, 1, 3, 1, 24, 2, 2, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(127, 3, 1, 3, 2, 19, 1, 1, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(128, 3, 1, 3, 2, 20, 1, 1, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(129, 3, 1, 3, 2, 21, 1, 1, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(130, 3, 1, 3, 2, 22, 1, 1, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(131, 3, 1, 3, 2, 23, 1, 1, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(132, 3, 1, 3, 2, 24, 1, 1, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(133, 3, 1, 3, 3, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(134, 3, 1, 3, 3, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(135, 3, 1, 3, 3, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(136, 3, 1, 3, 3, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(137, 3, 1, 3, 3, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(138, 3, 1, 3, 3, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(139, 3, 1, 3, 4, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(140, 3, 1, 3, 4, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(141, 3, 1, 3, 4, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(142, 3, 1, 3, 4, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(143, 3, 1, 3, 4, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(144, 3, 1, 3, 4, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(145, 3, 1, 3, 5, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(146, 3, 1, 3, 5, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(147, 3, 1, 3, 5, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(148, 3, 1, 3, 5, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(149, 3, 1, 3, 5, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(150, 3, 1, 3, 5, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(151, 3, 1, 3, 6, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(152, 3, 1, 3, 6, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(153, 3, 1, 3, 6, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(154, 3, 1, 3, 6, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(155, 3, 1, 3, 6, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(156, 3, 1, 3, 6, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(157, 3, 1, 3, 7, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(158, 3, 1, 3, 7, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(159, 3, 1, 3, 7, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(160, 3, 1, 3, 7, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(161, 3, 1, 3, 7, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(162, 3, 1, 3, 7, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(163, 3, 1, 3, 8, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(164, 3, 1, 3, 8, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(165, 3, 1, 3, 8, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(166, 3, 1, 3, 8, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(167, 3, 1, 3, 8, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(168, 3, 1, 3, 8, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(169, 3, 1, 3, 9, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(170, 3, 1, 3, 9, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(171, 3, 1, 3, 9, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(172, 3, 1, 3, 9, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(173, 3, 1, 3, 9, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(174, 3, 1, 3, 9, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(175, 3, 1, 3, 10, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(176, 3, 1, 3, 10, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(177, 3, 1, 3, 10, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(178, 3, 1, 3, 10, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(179, 3, 1, 3, 10, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(180, 3, 1, 3, 10, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(181, 3, 1, 3, 11, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(182, 3, 1, 3, 11, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(183, 3, 1, 3, 11, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(184, 3, 1, 3, 11, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(185, 3, 1, 3, 11, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(186, 3, 1, 3, 11, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(187, 3, 1, 3, 12, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(188, 3, 1, 3, 12, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(189, 3, 1, 3, 12, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(190, 3, 1, 3, 12, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(191, 3, 1, 3, 12, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(192, 3, 1, 3, 12, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(193, 3, 1, 3, 13, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(194, 3, 1, 3, 13, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(195, 3, 1, 3, 13, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(196, 3, 1, 3, 13, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(197, 3, 1, 3, 13, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(198, 3, 1, 3, 13, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(199, 3, 1, 3, 14, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(200, 3, 1, 3, 14, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(201, 3, 1, 3, 14, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(202, 3, 1, 3, 14, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(203, 3, 1, 3, 14, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(204, 3, 1, 3, 14, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(205, 3, 1, 3, 15, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(206, 3, 1, 3, 15, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(207, 3, 1, 3, 15, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(208, 3, 1, 3, 15, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(209, 3, 1, 3, 15, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(210, 3, 1, 3, 15, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(211, 3, 1, 3, 22, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(212, 3, 1, 3, 22, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(213, 3, 1, 3, 22, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(214, 3, 1, 3, 22, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(215, 3, 1, 3, 22, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(216, 3, 1, 3, 22, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(217, 3, 1, 3, 23, 19, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(218, 3, 1, 3, 23, 20, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(219, 3, 1, 3, 23, 21, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(220, 3, 1, 3, 23, 22, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(221, 3, 1, 3, 23, 23, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48'),
(222, 3, 1, 3, 23, 24, 0, 0, 1, NULL, '2025-01-27 04:12:48', '2025-01-27 04:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `uuid`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, '60a68931-3a49-4df0-a47c-404d5b0dd630', 'Administrator', 'administrator', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(2, '9291ac0e-d0fd-4510-833f-a2660ed17a39', 'Puskesmas', 'puskesmas', '2025-01-26 07:35:47', '2025-01-26 07:35:47'),
(3, 'a779d9c4-7094-4955-b43d-252586aaefc8', 'Dinas Kesehatan Kabupaten / Kota', 'dinas-kesehatan-kabupaten-kota', '2025-01-26 07:36:04', '2025-01-26 07:36:04'),
(4, '3c4f38b0-5c2c-4e77-9750-023bb5ee1a7d', 'Dinas Kesehatan Provinsi', 'dinas-kesehatan-provinsi', '2025-01-26 07:36:19', '2025-01-26 07:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 2, 8, '2025-01-26 08:32:15', '2025-01-26 08:32:15'),
(2, 2, 4, '2025-01-26 08:32:15', '2025-01-26 08:32:15'),
(3, 2, 17, '2025-01-26 08:32:15', '2025-01-26 08:32:15'),
(4, 2, 9, '2025-01-26 08:32:15', '2025-01-26 08:32:15'),
(5, 2, 3, '2025-01-26 08:32:15', '2025-01-26 08:32:15'),
(6, 2, 42, '2025-01-26 08:32:15', '2025-01-26 08:32:15'),
(7, 2, 6, '2025-01-26 08:32:15', '2025-01-26 08:32:15'),
(8, 2, 40, '2025-01-26 08:32:15', '2025-01-26 08:32:15'),
(9, 2, 18, '2025-01-26 08:32:15', '2025-01-26 08:32:15'),
(10, 2, 5, '2025-01-26 08:32:15', '2025-01-26 08:32:15'),
(11, 2, 7, '2025-01-26 08:32:15', '2025-01-26 08:32:15'),
(12, 2, 41, '2025-01-26 08:32:15', '2025-01-26 08:32:15'),
(13, 2, 2, '2025-01-26 12:21:34', '2025-01-26 12:21:34'),
(14, 3, 8, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(15, 3, 12, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(16, 3, 4, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(17, 3, 17, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(18, 3, 9, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(19, 3, 2, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(20, 3, 3, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(21, 3, 42, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(22, 3, 6, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(23, 3, 15, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(24, 3, 13, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(25, 3, 40, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(26, 3, 11, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(27, 3, 18, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(28, 3, 5, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(29, 3, 10, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(30, 3, 7, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(31, 3, 16, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(32, 3, 41, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(33, 3, 14, '2025-01-26 15:42:35', '2025-01-26 15:42:35'),
(34, 3, 51, '2025-01-26 15:44:05', '2025-01-26 15:44:05'),
(35, 3, 50, '2025-01-26 15:44:06', '2025-01-26 15:44:06'),
(36, 3, 54, '2025-01-26 15:44:06', '2025-01-26 15:44:06'),
(37, 3, 39, '2025-01-26 15:44:06', '2025-01-26 15:44:06'),
(38, 3, 49, '2025-01-26 15:44:06', '2025-01-26 15:44:06'),
(39, 3, 57, '2025-01-26 15:44:06', '2025-01-26 15:44:06'),
(40, 3, 53, '2025-01-26 15:44:06', '2025-01-26 15:44:06'),
(41, 3, 56, '2025-01-26 15:44:06', '2025-01-26 15:44:06'),
(42, 3, 55, '2025-01-26 15:44:06', '2025-01-26 15:44:06'),
(43, 3, 52, '2025-01-26 15:44:06', '2025-01-26 15:44:06'),
(44, 2, 57, '2025-01-27 00:27:12', '2025-01-27 00:27:12'),
(45, 2, 56, '2025-01-27 00:27:12', '2025-01-27 00:27:12'),
(46, 2, 55, '2025-01-27 00:27:12', '2025-01-27 00:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `stok_vaksins`
--

CREATE TABLE `stok_vaksins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `vaksin_id` bigint(20) UNSIGNED NOT NULL,
  `kode_batch` varchar(255) NOT NULL,
  `tanggal_produksi` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `satuan` varchar(255) DEFAULT 'vial',
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tahuns`
--

CREATE TABLE `tahuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahuns`
--

INSERT INTO `tahuns` (`id`, `tahun`, `created_at`, `updated_at`) VALUES
(1, '2023', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(2, '2024', '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(3, '2025', '2025-01-26 00:35:49', '2025-01-26 00:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `biodata_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `biodata_id`, `email`, `email_verified_at`, `password`, `username`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'f472e3e8-e824-402a-bbe8-e8d61f149a32', 1, 'abangucup@duck.com', NULL, '$2y$12$C9S3lXC9tag4nCfXx5hP4ukJ2qDDgpeg62PXeNQqb1hERX.Po0.7q', 'b4ngm4n', NULL, '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(5, '93a9bec3-e191-42c8-8ab8-a83370120843', 8, 'id.salmanmustapa@gmail.com', NULL, '$2y$12$RKvsYBcunT/4TqaTBiiUR.kUZVOwj2K0btitOCgK10xi3OMiIlpXG', 'mances', NULL, '2025-01-26 12:20:55', '2025-01-26 12:20:55'),
(6, 'ea705e10-7407-45a4-8743-1ae325abe895', 9, 'faridamuchtar@gmail.com', NULL, '$2y$12$0jq36yYO/sXN3T5ROjvlXO7wdNx8uilRKe7MYjJzwS7tiDl5w9ZC2', 'farida', NULL, '2025-01-26 15:40:47', '2025-01-26 15:40:47'),
(7, '8c02d5e4-54f0-4139-ab87-ccd81e29bfa3', 10, 'puskesmaskotautara@gmail.com', NULL, '$2y$12$8TjO.TsY68RO3A3k6bM5V./mqu9pIi6nXnUM6VC/NLFIKRoNluQOO', '1071184', NULL, '2025-01-30 01:25:24', '2025-01-30 01:25:24'),
(8, '60fd86d5-2235-4322-8a37-54f5531e0180', 11, 'puskesmaspilolodaa@gmail.com', NULL, '$2y$12$mjdWgRcmYgbBM5d9X/NJz.krTexcDCYo/PBArOUU5.3.LJeeNTuxO', '1071177', NULL, '2025-01-30 01:27:32', '2025-01-30 01:27:32'),
(9, '2c832b03-4a5b-4e8e-bc97-3346ff57d6b1', 12, 'puskesmaskotabarat@gmail.com', NULL, '$2y$12$GuIDLuBcpoHBSOgu5VTacuS0sKWUhVVWGIee4UzdFcAGdYhwllX.C', '1071178', NULL, '2025-01-30 01:28:37', '2025-01-30 01:28:37'),
(10, '40e9b680-f3f5-4faa-8917-a6f1ed6b72f0', 13, 'puskesmasdungingi@gmail.com', NULL, '$2y$12$wCfXBDgQS/zxwsVGvsjVNekEogQXoL.HO6FLA5bg.VrTNhpORJt4G', '1071179', NULL, '2025-01-30 01:29:20', '2025-01-30 01:29:20'),
(11, '8bf78747-8602-4bfa-9f38-24e8aeca3fa8', 14, 'puskesmaskotaselatan@gmail.com', NULL, '$2y$12$9d85cbRVlnCjZP/Q3WsT.eMsvJcdW7lhWBy8z8pg.R9UnaOyQZVcO', '1071180', NULL, '2025-01-30 01:30:20', '2025-01-30 01:30:20'),
(12, '0216cf22-cc8c-4c2e-8bbf-07af2198bed5', 15, 'puskesmaskotatimur@gmail.com', NULL, '$2y$12$OSb42TKUFrrwHTeYQld.l.JCQW8iJypaQByckiH.NhE7ULmFkfTZ6', '1071181', NULL, '2025-01-30 01:30:58', '2025-01-30 01:30:58'),
(13, '7dec4239-9830-4ce9-868f-8ff495ef6e3d', 16, 'puskesmashulonthalangi@gmail.com', NULL, '$2y$12$E.t31kTteon15aB.T1zwpuvCkCKII2dzv8xAw2bBYqR32MKOC/VyG', '1071182', NULL, '2025-01-30 01:31:40', '2025-01-30 01:31:40'),
(14, '8d1b762e-d2e4-460a-a24c-d07ced31ecfd', 17, 'puskesmasdumboraya@gmail.com', NULL, '$2y$12$BgYJ3aVz2WBbBU84tsPUqOnlV14zIOsuNOgvBL9IrQpeBvaIb8oES', '1071183', NULL, '2025-01-30 01:32:31', '2025-01-30 01:32:31'),
(15, '1eba19c2-04bb-4264-8866-7c556478e571', 18, 'puskesmaskotatengah@gmail.com', NULL, '$2y$12$mV.v9xbDhbisY3Z7RP8WjOCIpqM83u72X5E4doc.xesCWcr.gIAJu', '1071185', NULL, '2025-01-30 01:33:23', '2025-01-30 01:33:23'),
(16, '81d21da6-2405-428b-b60a-e4e9f201089b', 19, 'puskesmassipatana@gmail.com', NULL, '$2y$12$4Q.GgVdHQ8YTbo/o/16A3.495Ph979bR.4NgryAkgRDIyLvnsC.oO', '1071186', NULL, '2025-01-30 01:34:00', '2025-01-30 01:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-01-26 00:35:49', '2025-01-26 00:35:49'),
(4, 5, 2, '2025-01-26 12:20:55', '2025-01-26 12:20:55'),
(5, 6, 3, '2025-01-26 15:40:47', '2025-01-26 15:40:47'),
(6, 7, 2, '2025-01-30 01:25:24', '2025-01-30 01:25:24'),
(7, 8, 2, '2025-01-30 01:27:32', '2025-01-30 01:27:32'),
(8, 9, 2, '2025-01-30 01:28:37', '2025-01-30 01:28:37'),
(9, 10, 2, '2025-01-30 01:29:20', '2025-01-30 01:29:20'),
(10, 11, 2, '2025-01-30 01:30:20', '2025-01-30 01:30:20'),
(11, 12, 2, '2025-01-30 01:30:58', '2025-01-30 01:30:58'),
(12, 13, 2, '2025-01-30 01:31:40', '2025-01-30 01:31:40'),
(13, 14, 2, '2025-01-30 01:32:31', '2025-01-30 01:32:31'),
(14, 15, 2, '2025-01-30 01:33:23', '2025-01-30 01:33:23'),
(15, 16, 2, '2025-01-30 01:34:00', '2025-01-30 01:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `vaksins`
--

CREATE TABLE `vaksins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `nama_vaksin` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `produsen` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaksins`
--

INSERT INTO `vaksins` (`id`, `uuid`, `nama_vaksin`, `slug`, `produsen`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'a0f2806c-459b-4a62-ab8f-ba6bc286426b', 'HB0', 'hb0', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(2, '25d3c560-ef94-491d-894c-a4dc15d87e4a', 'BCG', 'bcg', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(3, 'f88ad62b-b29d-41c2-bff6-2ea3b54a19f6', 'Polio 1', 'polio-1', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(4, '9526efd6-5729-4344-ba9b-1902b99a98cc', 'DPT/HB/Hib 1', 'dpthbhib-1', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(5, 'ef813e76-ba85-4f9a-ad97-8400da480a68', 'Polio 2', 'polio-2', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(6, '40940e03-2b96-4b28-8635-972f199c223a', 'PCV 1', 'pcv-1', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(7, 'aca977d8-9a52-423b-a4c8-c54980f3cb79', 'RV 1', 'rv-1', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(8, 'f4123360-54db-4bfe-924e-d0c8468138d7', 'DPT/HB/Hib 2', 'dpthbhib-2', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(9, '342cb740-7333-4659-be44-efedadc3285e', 'Polio 3', 'polio-3', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(10, 'ff6aa697-54da-4374-9191-7ec21e55af55', 'PCV 2', 'pcv-2', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(11, 'e04cc33f-2651-4a03-8333-044c1138afdc', 'RV 2', 'rv-2', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(12, '4ab5c15c-e79f-42c5-9dbd-e8a55212b897', 'DPT/HB/Hib 3', 'dpthbhib-3', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(13, 'eb6a9745-5bb8-4b5c-8f3a-df606f130d85', 'Polio 4', 'polio-4', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(14, 'ceb92118-1213-43e6-ba73-fafaa2572f09', 'RV 3', 'rv-3', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(15, '483c41ce-5a30-4efd-b903-6c0b9ce50cdd', 'IPV 1', 'ipv-1', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(16, 'd28b46d7-527f-4a3b-8295-940a355769c2', 'T 1', 't-1', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(17, '7c4f3d7f-0d85-4a18-8315-aeb2182106ad', 'T 2', 't-2', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(18, 'dabd88da-8000-4c69-965e-2ad46d743584', 'T 3', 't-3', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(19, '5eac74e4-f583-444f-a586-ac0641b0f93a', 'T 4', 't-4', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(20, '9984d7f5-4e16-495b-b400-b8cc5af07884', 'T 5', 't-5', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(21, 'e82a44d3-8a64-41ce-86ee-46d82bd61d2d', 'Td', 'td', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(22, '05c72b30-077c-49b9-80d5-dc761c9b394f', 'MR 1', 'mr-1', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(23, 'f31fc0eb-7751-4261-8a5b-1bf0d687a816', 'IPV 2', 'ipv-2', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(24, '666a7893-743c-4713-b647-1e928e3f6936', 'DPT-HB-Hib 4', 'dpt-hb-hib-4', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(25, '62b1496e-8e74-478c-8ec4-626e766436e7', 'MR 2', 'mr-2', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08'),
(26, '8e02f17e-83db-4b06-9927-a3fcdc335272', 'PCV 3', 'pcv-3', NULL, NULL, '2025-01-26 05:34:08', '2025-01-26 05:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `wilayahs`
--

CREATE TABLE `wilayahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `nama_wilayah` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kode_wilayah` varchar(255) NOT NULL,
  `jenis_wilayah` enum('provinsi','kabkot','kecamatan','kelurahan','desa') DEFAULT NULL,
  `_lft` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `_rgt` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wilayahs`
--

INSERT INTO `wilayahs` (`id`, `uuid`, `nama_wilayah`, `slug`, `kode_wilayah`, `jenis_wilayah`, `_lft`, `_rgt`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'a6a07ded-163c-4220-81ab-7843cef04abd', 'Gorontalo', 'gorontalo-75', '75', 'provinsi', 1, 122, NULL, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(2, '5df65eaf-8bee-41d1-9711-7cf98de85291', 'Kota Gorontalo', 'kota-gorontalo-7571', '7571', 'kabkot', 2, 121, 1, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(3, '2884d4d4-0302-4183-a774-ed290580ce46', 'Kecamatan Kota Barat', 'kecamatan-kota-barat-7571010', '7571010', 'kecamatan', 3, 18, 2, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(4, 'e933107c-8027-4695-a138-37b160956c0e', 'Kelurahan Dembe I', 'kelurahan-dembe-i-7571010001', '7571010001', 'kelurahan', 4, 5, 3, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(5, 'ba27961f-9a0c-4a4c-9b09-ec9ee549fbcc', 'Kelurahan Lekobalo', 'kelurahan-lekobalo-7571010002', '7571010002', 'kelurahan', 6, 7, 3, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(6, '7beee926-aaae-454c-858e-12ccaf263ab3', 'Kelurahan Pilolodaa', 'kelurahan-pilolodaa-7571010003', '7571010003', 'kelurahan', 8, 9, 3, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(7, '997a1894-fcc2-429b-a83d-6c471ccdc31f', 'Kelurahan Buliide', 'kelurahan-buliide-7571010004', '7571010004', 'kelurahan', 10, 11, 3, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(8, '431253be-eb4b-4544-bba8-f6a03718a2ac', 'Kelurahan Tenilo', 'kelurahan-tenilo-7571010005', '7571010005', 'kelurahan', 12, 13, 3, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(9, '91a6af05-3b2d-4516-bffd-e23bcc5b3ad9', 'Kelurahan Molosipat W', 'kelurahan-molosipat-w-7571010006', '7571010006', 'kelurahan', 14, 15, 3, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(10, '46096de7-218b-4ed9-a43d-ad5713d14a7b', 'Kelurahan Buladu', 'kelurahan-buladu-7571010008', '7571010008', 'kelurahan', 16, 17, 3, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(11, '5479830e-b793-4da3-ad6e-873dfca684a1', 'Kecamatan Dungingi', 'kecamatan-dungingi-7571011', '7571011', 'kecamatan', 19, 30, 2, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(12, '4534b4b7-db7a-4dba-8432-a7f0166dc8d2', 'Kelurahan Tuladenggi', 'kelurahan-tuladenggi-7571011001', '7571011001', 'kelurahan', 20, 21, 11, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(13, 'aae97ea1-8a23-4044-a8eb-891df671873a', 'Kelurahan Libuo', 'kelurahan-libuo-7571011002', '7571011002', 'kelurahan', 22, 23, 11, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(14, '0e725291-c34d-4a88-b92f-8142d0167ea1', 'Kelurahan Tomulabutao', 'kelurahan-tomulabutao-7571011003', '7571011003', 'kelurahan', 24, 25, 11, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(15, '4cdf6bc2-9927-4b0d-8e99-b6a90e50ef14', 'Kelurahan Huangobotu', 'kelurahan-huangobotu-7571011004', '7571011004', 'kelurahan', 26, 27, 11, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(16, '9f312bb9-0f73-4e41-9bf4-4ea47793f911', 'Kelurahan Tomulabutao Selatan', 'kelurahan-tomulabutao-selatan-7571011005', '7571011005', 'kelurahan', 28, 29, 11, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(17, '12af9de2-2a54-41c0-8114-a0503e64886f', 'Kecamatan Kota Selatan', 'kecamatan-kota-selatan-7571020', '7571020', 'kecamatan', 31, 42, 2, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(18, '572619bb-5326-45f2-b618-65c97993947d', 'Kelurahan Biawu', 'kelurahan-biawu-7571020010', '7571020010', 'kelurahan', 32, 33, 17, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(19, 'e90e5e6f-b23c-4404-9a58-4a3c062bcce2', 'Kelurahan Biawao', 'kelurahan-biawao-7571020011', '7571020011', 'kelurahan', 34, 35, 17, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(20, '0beeaf60-794d-4a6c-9d5a-4956b8e0892d', 'Kelurahan Limba B', 'kelurahan-limba-b-7571020018', '7571020018', 'kelurahan', 36, 37, 17, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(21, 'fa15f4b7-7158-4e9f-98bc-557036b035fe', 'Kelurahan Limba U Satu', 'kelurahan-limba-u-satu-7571020019', '7571020019', 'kelurahan', 38, 39, 17, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(22, '0087433c-2cc1-43b1-9d0f-fcb04236a1fc', 'Kelurahan Limba U Dua', 'kelurahan-limba-u-dua-7571020020', '7571020020', 'kelurahan', 40, 41, 17, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(23, 'd7011941-92f6-46ad-8c21-45779c2d1caf', 'Kecamatan Kota Timur', 'kecamatan-kota-timur-7571021', '7571021', 'kecamatan', 43, 56, 2, '2025-01-26 00:35:46', '2025-01-26 00:35:46'),
(24, '5fb8f3f0-9b1c-4054-acdb-be444883972e', 'Kelurahan Padebuolo', 'kelurahan-padebuolo-7571021006', '7571021006', 'kelurahan', 44, 45, 23, '2025-01-26 00:35:46', '2025-01-26 00:35:47'),
(25, '261c00cc-6622-4d09-b602-99518fe48046', 'Kelurahan Ipilo', 'kelurahan-ipilo-7571021007', '7571021007', 'kelurahan', 46, 47, 23, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(26, '3ba366e6-98f3-44fb-bb81-3efdf73a2d80', 'Kelurahan Tamalate', 'kelurahan-tamalate-7571021008', '7571021008', 'kelurahan', 48, 49, 23, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(27, '45525a1b-c405-4943-b4d3-ca4a39542828', 'Kelurahan Moodu', 'kelurahan-moodu-7571021009', '7571021009', 'kelurahan', 50, 51, 23, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(28, '8df38760-017e-4625-9c87-986acdff8172', 'Kelurahan Heledulaa Selatan', 'kelurahan-heledulaa-selatan-7571021010', '7571021010', 'kelurahan', 52, 53, 23, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(29, 'f0380619-b460-4841-b8cb-f2f0626e0b24', 'Kelurahan Heledulaa Utara', 'kelurahan-heledulaa-utara-7571021011', '7571021011', 'kelurahan', 54, 55, 23, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(30, 'f6caaec5-dada-41d2-a522-123c86f06334', 'Kecamatan Hulonthalangi', 'kecamatan-hulonthalangi-7571022', '7571022', 'kecamatan', 57, 68, 2, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(31, 'a7301c7b-ff6d-4623-a4bc-6728a2584dee', 'Kelurahan Tanjung Kramat', 'kelurahan-tanjung-kramat-7571022001', '7571022001', 'kelurahan', 58, 59, 30, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(32, 'd3a67863-a4c6-4291-919b-a2f226845772', 'Kelurahan Pohe', 'kelurahan-pohe-7571022002', '7571022002', 'kelurahan', 60, 61, 30, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(33, '072aea85-abfe-4485-9cf7-7075f7b5c680', 'Kelurahan Tenda', 'kelurahan-tenda-7571022003', '7571022003', 'kelurahan', 62, 63, 30, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(34, '831052b4-f287-43d5-9e7c-f14bff8e0572', 'Kelurahan Siendeng', 'kelurahan-siendeng-7571022004', '7571022004', 'kelurahan', 64, 65, 30, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(35, 'd08322ad-ae6c-4516-8650-7ec96704927b', 'Kelurahan Donggala', 'kelurahan-donggala-7571022005', '7571022005', 'kelurahan', 66, 67, 30, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(36, '86df7d88-e12a-44c9-9f21-2e4075c0fc5a', 'Kecamatan Dumbo Raya', 'kecamatan-dumbo-raya-7571023', '7571023', 'kecamatan', 69, 80, 2, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(37, 'f1214aa0-3437-49a4-9c3b-d33ec41e89c8', 'Kelurahan Leato Selatan', 'kelurahan-leato-selatan-7571023001', '7571023001', 'kelurahan', 70, 71, 36, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(38, 'b68b31bb-498a-49b4-a783-8701abb93f03', 'Kelurahan Leato Utara', 'kelurahan-leato-utara-7571023002', '7571023002', 'kelurahan', 72, 73, 36, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(39, '57a719b1-6bf3-4157-a04d-873d9006dc0b', 'Kelurahan Talumolo', 'kelurahan-talumolo-7571023003', '7571023003', 'kelurahan', 74, 75, 36, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(40, '65ba68c7-b746-4580-9104-0408861cd692', 'Kelurahan Botu', 'kelurahan-botu-7571023004', '7571023004', 'kelurahan', 76, 77, 36, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(41, '6be9ac43-9531-4f5e-9bcf-52be9b6a3280', 'Kelurahan Bugis', 'kelurahan-bugis-7571023005', '7571023005', 'kelurahan', 78, 79, 36, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(42, 'd6ba548c-7d45-40ea-bc08-d6a195f34bd6', 'Kecamatan Kota Utara', 'kecamatan-kota-utara-7571030', '7571030', 'kecamatan', 81, 94, 2, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(43, '597caf6b-5276-4f8b-b8a5-c915754f4386', 'Kelurahan Dembe II', 'kelurahan-dembe-ii-7571030003', '7571030003', 'kelurahan', 82, 83, 42, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(44, '1a0fa962-0680-4bf9-bc6a-5dac88690a9a', 'Kelurahan Wongkaditi Timur', 'kelurahan-wongkaditi-timur-7571030004', '7571030004', 'kelurahan', 84, 85, 42, '2025-01-26 00:35:47', '2025-01-26 00:35:47'),
(45, '31ba5c4c-422a-4859-a558-1f12a515545c', 'Kelurahan Wongkaditi Barat', 'kelurahan-wongkaditi-barat-7571030005', '7571030005', 'kelurahan', 86, 87, 42, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(46, '63e236ab-a486-415f-af48-6c9a811ffb1c', 'Kelurahan Dulomo Selatan', 'kelurahan-dulomo-selatan-7571030011', '7571030011', 'kelurahan', 88, 89, 42, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(47, 'f3077311-2fb6-4414-9838-08d6712fe756', 'Kelurahan Dulomo Utara', 'kelurahan-dulomo-utara-7571030012', '7571030012', 'kelurahan', 90, 91, 42, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(48, '6f3e4582-ace7-432a-9d90-5101b084e016', 'Kelurahan Dembe Jaya', 'kelurahan-dembe-jaya-7571030015', '7571030015', 'kelurahan', 92, 93, 42, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(49, '4b67fef2-57c2-4aa1-a08c-f481e8ee6232', 'Kecamatan Kota Tengah', 'kecamatan-kota-tengah-7571031', '7571031', 'kecamatan', 95, 108, 2, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(50, '92453600-6758-4845-ba9e-835fdb08e3d7', 'Kelurahan Wumialo', 'kelurahan-wumialo-7571031001', '7571031001', 'kelurahan', 96, 97, 49, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(51, '61299702-baf2-4f9f-82ac-4bc136dc7cf4', 'Kelurahan Dulalowo', 'kelurahan-dulalowo-7571031002', '7571031002', 'kelurahan', 98, 99, 49, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(52, 'efc18a00-aff9-4058-9efa-8f91d1dd0050', 'Kelurahan Liluwo', 'kelurahan-liluwo-7571031003', '7571031003', 'kelurahan', 100, 101, 49, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(53, 'bed551a8-6cff-42ab-92c6-62d09616b1e9', 'Kelurahan Pulubala', 'kelurahan-pulubala-7571031004', '7571031004', 'kelurahan', 102, 103, 49, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(54, 'aec2eed9-0d78-4d46-a07d-3d8091a30b06', 'Kelurahan Paguyaman', 'kelurahan-paguyaman-7571031005', '7571031005', 'kelurahan', 104, 105, 49, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(55, '68cdb70e-70bf-4332-9399-2ca8de8f97bf', 'Kelurahan Dulalowo Timur', 'kelurahan-dulalowo-timur-7571031006', '7571031006', 'kelurahan', 106, 107, 49, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(56, '64d74ca5-aebc-4f5f-991a-c8e9385a5da4', 'Kecamatan Sipatana', 'kecamatan-sipatana-7571032', '7571032', 'kecamatan', 109, 120, 2, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(57, 'e847be96-e1a6-413d-852c-8b1400952802', 'Kelurahan Tapa', 'kelurahan-tapa-7571032001', '7571032001', 'kelurahan', 110, 111, 56, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(58, '1f9775da-7977-4ca7-aa50-617dc39fd652', 'Kelurahan Molosipat U', 'kelurahan-molosipat-u-7571032002', '7571032002', 'kelurahan', 112, 113, 56, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(59, '2b4c255b-7a28-494d-818c-9ff6d5cc53bd', 'Kelurahan Tanggikiki', 'kelurahan-tanggikiki-7571032003', '7571032003', 'kelurahan', 114, 115, 56, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(60, '19a6c24c-2ff1-4a04-805f-c3140fd614a5', 'Kelurahan Bulotadaa Timur', 'kelurahan-bulotadaa-timur-7571032004', '7571032004', 'kelurahan', 116, 117, 56, '2025-01-26 00:35:48', '2025-01-26 00:35:48'),
(61, 'a92de7b4-ccdb-4921-aff2-b43f0cf2c6ed', 'Kelurahan Bulotadaa Barat', 'kelurahan-bulotadaa-barat-7571032005', '7571032005', 'kelurahan', 118, 119, 56, '2025-01-26 00:35:48', '2025-01-26 00:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_kerjas`
--

CREATE TABLE `wilayah_kerjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wilayah_id` bigint(20) UNSIGNED NOT NULL,
  `faskes_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wilayah_kerjas`
--

INSERT INTO `wilayah_kerjas` (`id`, `wilayah_id`, `faskes_id`, `created_at`, `updated_at`) VALUES
(5, 2, 1, '2025-01-26 00:37:50', '2025-01-26 00:37:50'),
(6, 17, 2, '2025-01-26 00:39:28', '2025-01-26 00:39:28'),
(7, 3, 2, '2025-01-26 00:39:28', '2025-01-26 00:39:28'),
(8, 49, 2, '2025-01-26 00:39:28', '2025-01-26 00:39:28'),
(9, 11, 2, '2025-01-26 00:39:28', '2025-01-26 00:39:28'),
(10, 56, 2, '2025-01-26 00:39:28', '2025-01-26 00:39:28'),
(11, 36, 2, '2025-01-26 00:39:28', '2025-01-26 00:39:28'),
(12, 42, 2, '2025-01-26 00:39:28', '2025-01-26 00:39:28'),
(13, 23, 2, '2025-01-26 00:39:28', '2025-01-26 00:39:28'),
(14, 30, 2, '2025-01-26 00:39:28', '2025-01-26 00:39:28'),
(15, 8, 5, '2025-01-26 00:43:15', '2025-01-26 00:43:15'),
(16, 10, 5, '2025-01-26 00:43:15', '2025-01-26 00:43:15'),
(17, 9, 5, '2025-01-26 00:43:15', '2025-01-26 00:43:15'),
(18, 7, 5, '2025-01-26 00:43:15', '2025-01-26 00:43:15'),
(19, 44, 3, '2025-01-26 00:44:25', '2025-01-26 00:44:25'),
(20, 45, 3, '2025-01-26 00:44:25', '2025-01-26 00:44:25'),
(21, 43, 3, '2025-01-26 00:44:25', '2025-01-26 00:44:25'),
(22, 46, 3, '2025-01-26 00:44:25', '2025-01-26 00:44:25'),
(23, 48, 3, '2025-01-26 00:44:25', '2025-01-26 00:44:25'),
(24, 47, 3, '2025-01-26 00:44:25', '2025-01-26 00:44:25'),
(25, 6, 4, '2025-01-26 00:49:06', '2025-01-26 00:49:06'),
(26, 5, 4, '2025-01-26 00:49:06', '2025-01-26 00:49:06'),
(27, 4, 4, '2025-01-26 00:49:06', '2025-01-26 00:49:06'),
(28, 14, 6, '2025-01-26 00:50:02', '2025-01-26 00:50:02'),
(29, 12, 6, '2025-01-26 00:50:02', '2025-01-26 00:50:02'),
(30, 15, 6, '2025-01-26 00:50:02', '2025-01-26 00:50:02'),
(31, 16, 6, '2025-01-26 00:50:02', '2025-01-26 00:50:02'),
(32, 13, 6, '2025-01-26 00:50:02', '2025-01-26 00:50:02'),
(33, 22, 7, '2025-01-26 00:51:12', '2025-01-26 00:51:12'),
(34, 20, 7, '2025-01-26 00:51:12', '2025-01-26 00:51:12'),
(35, 18, 7, '2025-01-26 00:51:12', '2025-01-26 00:51:12'),
(36, 19, 7, '2025-01-26 00:51:12', '2025-01-26 00:51:12'),
(37, 21, 7, '2025-01-26 00:51:12', '2025-01-26 00:51:12'),
(38, 25, 8, '2025-01-26 00:52:44', '2025-01-26 00:52:44'),
(39, 26, 8, '2025-01-26 00:52:44', '2025-01-26 00:52:44'),
(40, 27, 8, '2025-01-26 00:52:44', '2025-01-26 00:52:44'),
(41, 24, 8, '2025-01-26 00:52:44', '2025-01-26 00:52:44'),
(42, 28, 8, '2025-01-26 00:52:44', '2025-01-26 00:52:44'),
(43, 29, 8, '2025-01-26 00:52:44', '2025-01-26 00:52:44'),
(44, 33, 9, '2025-01-26 00:53:35', '2025-01-26 00:53:35'),
(45, 34, 9, '2025-01-26 00:53:35', '2025-01-26 00:53:35'),
(46, 31, 9, '2025-01-26 00:53:35', '2025-01-26 00:53:35'),
(47, 35, 9, '2025-01-26 00:53:35', '2025-01-26 00:53:35'),
(48, 32, 9, '2025-01-26 00:53:35', '2025-01-26 00:53:35'),
(49, 39, 10, '2025-01-26 00:54:14', '2025-01-26 00:54:14'),
(50, 40, 10, '2025-01-26 00:54:14', '2025-01-26 00:54:14'),
(51, 41, 10, '2025-01-26 00:54:14', '2025-01-26 00:54:14'),
(52, 38, 10, '2025-01-26 00:54:14', '2025-01-26 00:54:14'),
(53, 37, 10, '2025-01-26 00:54:14', '2025-01-26 00:54:14'),
(54, 51, 11, '2025-01-26 00:55:23', '2025-01-26 00:55:23'),
(55, 55, 11, '2025-01-26 00:55:23', '2025-01-26 00:55:23'),
(56, 50, 11, '2025-01-26 00:55:23', '2025-01-26 00:55:23'),
(57, 54, 11, '2025-01-26 00:55:23', '2025-01-26 00:55:23'),
(58, 53, 11, '2025-01-26 00:55:23', '2025-01-26 00:55:23'),
(59, 52, 11, '2025-01-26 00:55:23', '2025-01-26 00:55:23'),
(60, 60, 12, '2025-01-26 00:57:42', '2025-01-26 00:57:42'),
(61, 58, 12, '2025-01-26 00:57:42', '2025-01-26 00:57:42'),
(62, 59, 12, '2025-01-26 00:57:42', '2025-01-26 00:57:42'),
(64, 61, 12, '2025-01-26 00:57:42', '2025-01-26 00:57:42'),
(65, 57, 12, '2025-01-30 02:33:15', '2025-01-30 02:33:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_penggunas`
--
ALTER TABLE `akun_penggunas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akun_penggunas_faskes_id_foreign` (`faskes_id`),
  ADD KEY `akun_penggunas_user_id_foreign` (`user_id`);

--
-- Indexes for table `alamats`
--
ALTER TABLE `alamats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alamats_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `alamats_slug_unique` (`slug`),
  ADD KEY `alamats_wilayah_id_foreign` (`wilayah_id`),
  ADD KEY `alamats_alamatable_id_alamatable_type_index` (`alamatable_id`,`alamatable_type`);

--
-- Indexes for table `biodatas`
--
ALTER TABLE `biodatas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `biodatas_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `biodatas_slug_unique` (`slug`);

--
-- Indexes for table `bulans`
--
ALTER TABLE `bulans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bulans_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faskes`
--
ALTER TABLE `faskes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faskes_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `faskes_slug_unique` (`slug`),
  ADD KEY `faskes_wilayah_id_foreign` (`wilayah_id`),
  ADD KEY `faskes__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategoris_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori_vaksins`
--
ALTER TABLE `kategori_vaksins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_vaksins_kategori_id_foreign` (`kategori_id`),
  ADD KEY `kategori_vaksins_vaksin_id_foreign` (`vaksin_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_uuid_unique` (`uuid`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pws`
--
ALTER TABLE `pws`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pws_tahun_id_foreign` (`tahun_id`),
  ADD KEY `pws_bulan_id_foreign` (`bulan_id`),
  ADD KEY `pws_faskes_id_foreign` (`faskes_id`),
  ADD KEY `pws_vaksin_id_foreign` (`vaksin_id`),
  ADD KEY `pws_wilayah_id_foreign` (`wilayah_id`),
  ADD KEY `pws_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_uuid_unique` (`uuid`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `stok_vaksins`
--
ALTER TABLE `stok_vaksins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stok_vaksins_uuid_unique` (`uuid`),
  ADD KEY `stok_vaksins_vaksin_id_foreign` (`vaksin_id`);

--
-- Indexes for table `tahuns`
--
ALTER TABLE `tahuns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_biodata_id_foreign` (`biodata_id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_permissions_user_id_foreign` (`user_id`),
  ADD KEY `user_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `vaksins`
--
ALTER TABLE `vaksins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vaksins_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `vaksins_slug_unique` (`slug`);

--
-- Indexes for table `wilayahs`
--
ALTER TABLE `wilayahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wilayahs_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `wilayahs_slug_unique` (`slug`),
  ADD KEY `wilayahs__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`);

--
-- Indexes for table `wilayah_kerjas`
--
ALTER TABLE `wilayah_kerjas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wilayah_kerjas_wilayah_id_foreign` (`wilayah_id`),
  ADD KEY `wilayah_kerjas_faskes_id_foreign` (`faskes_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_penggunas`
--
ALTER TABLE `akun_penggunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `alamats`
--
ALTER TABLE `alamats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `biodatas`
--
ALTER TABLE `biodatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bulans`
--
ALTER TABLE `bulans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faskes`
--
ALTER TABLE `faskes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_vaksins`
--
ALTER TABLE `kategori_vaksins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pws`
--
ALTER TABLE `pws`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `stok_vaksins`
--
ALTER TABLE `stok_vaksins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tahuns`
--
ALTER TABLE `tahuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vaksins`
--
ALTER TABLE `vaksins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `wilayahs`
--
ALTER TABLE `wilayahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `wilayah_kerjas`
--
ALTER TABLE `wilayah_kerjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun_penggunas`
--
ALTER TABLE `akun_penggunas`
  ADD CONSTRAINT `akun_penggunas_faskes_id_foreign` FOREIGN KEY (`faskes_id`) REFERENCES `faskes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `akun_penggunas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `alamats`
--
ALTER TABLE `alamats`
  ADD CONSTRAINT `alamats_wilayah_id_foreign` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayahs` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `faskes`
--
ALTER TABLE `faskes`
  ADD CONSTRAINT `faskes_wilayah_id_foreign` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayahs` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `kategori_vaksins`
--
ALTER TABLE `kategori_vaksins`
  ADD CONSTRAINT `kategori_vaksins_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kategori_vaksins_vaksin_id_foreign` FOREIGN KEY (`vaksin_id`) REFERENCES `vaksins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pws`
--
ALTER TABLE `pws`
  ADD CONSTRAINT `pws_bulan_id_foreign` FOREIGN KEY (`bulan_id`) REFERENCES `bulans` (`id`),
  ADD CONSTRAINT `pws_faskes_id_foreign` FOREIGN KEY (`faskes_id`) REFERENCES `faskes` (`id`),
  ADD CONSTRAINT `pws_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pws_tahun_id_foreign` FOREIGN KEY (`tahun_id`) REFERENCES `tahuns` (`id`),
  ADD CONSTRAINT `pws_vaksin_id_foreign` FOREIGN KEY (`vaksin_id`) REFERENCES `vaksins` (`id`),
  ADD CONSTRAINT `pws_wilayah_id_foreign` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayahs` (`id`);

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stok_vaksins`
--
ALTER TABLE `stok_vaksins`
  ADD CONSTRAINT `stok_vaksins_vaksin_id_foreign` FOREIGN KEY (`vaksin_id`) REFERENCES `vaksins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodatas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wilayah_kerjas`
--
ALTER TABLE `wilayah_kerjas`
  ADD CONSTRAINT `wilayah_kerjas_faskes_id_foreign` FOREIGN KEY (`faskes_id`) REFERENCES `faskes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wilayah_kerjas_wilayah_id_foreign` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayahs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
