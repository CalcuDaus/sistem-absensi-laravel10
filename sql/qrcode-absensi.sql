-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 08:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_01`
--

-- --------------------------------------------------------

--
-- Table structure for table `absens`
--

CREATE TABLE `absens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` enum('h','a','i','s') NOT NULL,
  `sub_keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absens`
--

INSERT INTO `absens` (`id`, `siswa_id`, `keterangan`, `sub_keterangan`, `created_at`, `updated_at`) VALUES
(1, 46, 'a', 'xfsxdf', '2024-03-13 21:33:41', '2024-03-13 21:33:41'),
(2, 46, 'a', 'xfdsxex', '2024-03-13 21:33:58', '2024-03-13 21:33:58'),
(3, 46, 'i', 'xfdsxex', '2024-03-13 21:34:12', '2024-03-17 21:13:17'),
(4, 46, 'a', 'xfdsxex', '2024-03-13 21:37:51', '2024-03-13 21:37:51'),
(5, 46, 'i', 'sdawd', '2024-03-13 21:38:13', '2024-03-13 21:38:13'),
(6, 46, 'i', 'dwads', '2024-03-13 21:38:24', '2024-03-13 21:38:24'),
(7, 46, 's', 'dsfsd', '2024-03-13 22:39:22', '2024-03-13 22:39:22'),
(8, 46, 's', 'ewfsdf', '2024-03-13 22:39:38', '2024-03-13 22:39:38'),
(9, 46, 's', 'dsfsdfsf', '2024-03-13 22:39:54', '2024-03-13 22:39:54'),
(10, 46, 'a', 'asdkhjawd', '2024-03-17 23:19:16', '2024-03-17 23:19:16'),
(11, 1, 'a', 'awldjkasld', '2024-03-17 23:19:36', '2024-03-17 23:19:36'),
(12, 1, 'a', 'wajdhkkwad', '2024-03-17 23:19:52', '2024-03-17 23:19:52');

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
-- Table structure for table `instrukturs`
--

CREATE TABLE `instrukturs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `lab` enum('1','2','3') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instrukturs`
--

INSERT INTO `instrukturs` (`id`, `email`, `nama`, `lab`, `created_at`, `updated_at`) VALUES
(1, 'diki@gmail.com', 'diki', '1', '2024-03-13 21:25:49', '2024-03-13 21:25:49'),
(2, 'daus@gmail.com', 'daus', '2', '2024-03-13 21:26:08', '2024-03-13 21:26:08'),
(3, 'rifan@gmail.com', 'rifan', '3', '2024-03-13 21:26:22', '2024-03-13 21:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusans`
--

INSERT INTO `jurusans` (`id`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Jaringan Komputer dan Telekomunikasi', '2024-03-13 21:28:05', '2024-03-13 21:28:05'),
(2, 'Pengembangan Perangkat Lunak dan Gim', '2024-03-13 21:28:19', '2024-03-13 21:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_notifikasis`
--

CREATE TABLE `kategori_notifikasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_notifikasis`
--

INSERT INTO `kategori_notifikasis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'izin', '2024-03-14 04:36:16', '2024-03-14 04:36:16'),
(2, 'sakit', '2024-03-14 04:36:16', '2024-03-14 04:36:16'),
(3, 'alpha', '2024-03-14 04:37:03', '2024-03-14 04:37:03');

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
(27, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(28, '2019_08_19_000000_create_failed_jobs_table', 1),
(29, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(30, '2024_03_12_040656_create_instrukturs_table', 1),
(31, '2024_03_12_040707_create_sekolahs_table', 1),
(32, '2024_03_12_040735_create_periodes_table', 1),
(33, '2024_03_12_040746_create_jurusans_table', 1),
(34, '2024_03_12_040757_create_siswas_table', 1),
(35, '2024_03_12_040807_create_absens_table', 1),
(36, '2024_03_13_051303_create_users_table', 1),
(37, '2024_03_13_165335_create_kategori_notifikasis_table', 1),
(38, '2024_03_13_165604_create_notifikasis_table', 1),
(39, '2024_03_13_165605_create_notifikasi_bacas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasis`
--

CREATE TABLE `notifikasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `notif_instruktur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `notif_siswa_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifikasis`
--

INSERT INTO `notifikasis` (`id`, `judul`, `kategori_id`, `notif_instruktur_id`, `notif_siswa_id`, `created_at`, `updated_at`) VALUES
(3, 'Siswa Dengan Nama 01pAiirFVNsk Telah Alpha Lebih Dari Dua Kali', 3, 1, 46, '2024-03-13 21:37:51', '2024-03-13 21:37:51'),
(4, 'Siswa Dengan Nama 01pAiirFVNsk Telah Izin Lebih Dari Dua Kali', 1, 1, 46, '2024-03-13 21:38:24', '2024-03-13 21:38:24'),
(5, 'Siswa Dengan Nama 01pAiirFVNsk Telah Sakit Lebih Dari Dua Kali', 2, 1, 46, '2024-03-13 22:39:54', '2024-03-13 22:39:54'),
(6, 'Siswa Dengan Nama 02JRMDYC6kMA Telah Alpha Lebih Dari Dua Kali', 3, 2, 1, '2024-03-17 23:19:52', '2024-03-17 23:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi_bacas`
--

CREATE TABLE `notifikasi_bacas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dibaca` tinyint(1) NOT NULL,
  `notifikasi_id` bigint(20) UNSIGNED NOT NULL,
  `notifikasi_user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifikasi_bacas`
--

INSERT INTO `notifikasi_bacas` (`id`, `dibaca`, `notifikasi_id`, `notifikasi_user_id`, `created_at`, `updated_at`) VALUES
(6, 1, 3, 3, '2024-03-15 00:22:15', '2024-03-15 00:22:15'),
(7, 1, 4, 3, '2024-03-15 00:22:21', '2024-03-15 00:22:21'),
(8, 1, 5, 3, '2024-03-15 03:36:42', '2024-03-15 03:36:42'),
(9, 1, 6, 2, '2024-03-17 23:20:54', '2024-03-17 23:20:54');

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
-- Table structure for table `periodes`
--

CREATE TABLE `periodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `periode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periodes`
--

INSERT INTO `periodes` (`id`, `periode`, `created_at`, `updated_at`) VALUES
(1, '2023/2024', '2024-03-13 21:27:44', '2024-03-13 21:27:44');

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
-- Table structure for table `sekolahs`
--

CREATE TABLE `sekolahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sekolah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolahs`
--

INSERT INTO `sekolahs` (`id`, `sekolah`, `created_at`, `updated_at`) VALUES
(1, 'SMK NEGERI 1 PANTAI LABU', '2024-03-13 21:28:35', '2024-03-13 21:28:35'),
(2, 'SMK NEGERI 1 BERINGIN', '2024-03-13 21:28:46', '2024-03-13 21:28:46'),
(3, 'SMK AKP GALANG', '2024-03-13 21:28:55', '2024-03-13 21:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gelombang` enum('1','2') NOT NULL,
  `instruktur_id` bigint(20) UNSIGNED NOT NULL,
  `sekolah_id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `periode_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nis`, `nama`, `gelombang`, `instruktur_id`, `sekolah_id`, `jurusan_id`, `periode_id`, `created_at`, `updated_at`) VALUES
(1, 'y2grjOWeui', '02JRMDYC6kMA', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(2, 'yh5NIDO6RE', '02xrzmLQSn5Q', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(3, 'XSRLBc9okl', '02lOPTcan4AC', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(4, 'zemGSAANGB', '022V8GD56izg', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(5, 'B0f7BoyYLv', '02K9d2UETB8V', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(6, '85EQEdGYbc', '02xWfdw2MG5W', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(7, 'J5ezwZFy5a', '02eGmUzN5KFC', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(8, 'FUDr4wTrL2', '02e4cC3XNrcz', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(9, 'OTPZKDHzXz', '02nvp7FC7Tyl', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(10, 'OOHUYQs4a7', '02IqvATyxkPz', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(11, '1IqJoTKKhr', '02GpbrafQwZv', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(12, 'lhq5ynRY6e', '02rBe94ywUDK', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(13, '52gtrWWXov', '02mD9MAXVWmv', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(14, 'FPlI3HP4VW', '02d33I0WiKoV', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(15, 'JFZyQSujE2', '02lveDXQwhpT', '1', 2, 2, 2, 1, '2024-03-13 21:29:26', '2024-03-13 21:29:26'),
(16, 'l8uvuAxGXv', '02qhg8VBs097', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(17, '7SFwpL90HI', '02M3UlQvs8Wx', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(18, 'yCKyJSEJdB', '02wN8wfQLCz6', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(19, 'rkeiLCRYpq', '02heez1Aqkbi', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(20, 'fJ0VCmissu', '0279FBIXvLBH', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(21, 'mE1iPGnXk9', '02JvjhyyXPBT', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(22, 'CrrfDtWk47', '02quIWwfmuoy', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(23, 'bad1753QBq', '027LxVrCUkxE', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(24, 'qVmVTPXhjk', '02mf9bLh7CWI', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(25, '26PwfRl5Sg', '02GHBsjGZVBc', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(26, 'Ng2CED3jc3', '02B7cs29xzOJ', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(27, 'Mfa3pJYWRg', '023bUV5gJrOL', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(28, 'GzEWprl49Z', '02gwH9I5Ih7M', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(29, 'maLrzb0iAk', '02Smyg19gDxK', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(30, 'edOiQUMJKr', '02GehnFAgjEe', '1', 2, 2, 2, 1, '2024-03-13 21:29:42', '2024-03-13 21:29:42'),
(31, 'Iyrp0dq8f6', '03rXfp6FOJQE', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(32, 'c4xT3Vbh2E', '03YkjiIzRlt8', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(33, 'mEAkNpDLFg', '035FbCnZXBHX', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(34, 'wPiiRrKhTb', '035GxwCqs4NB', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(35, 'kUhNt6rru2', '03ciF8mr5Imx', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(36, 'Tawc5Zi9NW', '03ajFpTswdKB', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(37, 'cxeTEUOvXy', '03OifPZPPExz', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(38, '4MS7mp1NCF', '03R3X7OCsCLC', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(39, 'Zti1iLEZ1N', '03x9kZafUSkx', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(40, 'dKeKfNkmYi', '03d9jMUC5Yca', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(41, 'Jc5LjG54UF', '03QHHIZ2yx35', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(42, 'olRLgeXqaL', '03ZR86mG8Yza', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(43, 'zCrPaThwoV', '031WO09Lz7uz', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(44, 'O0B9nAkZlZ', '03xLWF2T5NhT', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(45, 'Z7U8UK6A7K', '0394VuNzj6jz', '1', 3, 3, 2, 1, '2024-03-13 21:29:53', '2024-03-13 21:29:53'),
(46, 'SuA6SR9BwN', '01pAiirFVNsk', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00'),
(47, '2sJhv9cN8q', '01QnJRmCqOzY', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00'),
(48, '0ydqGwy6dK', '01ncQDR17HIV', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00'),
(49, 'pgqa0rsO0c', '01P7lMku6TP8', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00'),
(50, 'bGIRzJUGiu', '01GzNPu3XwMX', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00'),
(51, 'CCbzLgc8pQ', '014UH9fZmhlD', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00'),
(52, 'LTcQY9wtFW', '01XRsbj996GD', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00'),
(53, 'Z3BvJ1Vhgx', '01g56XOMB0ZA', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00'),
(54, 'srD98VyeYN', '01c7kOR3ulrk', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00'),
(55, 'x1Lk5qZy2j', '01ZWcwvfNtLg', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00'),
(56, 'guYH1eyEdx', '015gT5QwQ0HJ', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00'),
(57, '88h0bzvTAw', '01LdIz75hiah', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00'),
(58, 'iCMkmswQas', '01gViuECDKrn', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00'),
(59, 'wWdJkwWSJk', '01Bkt0YFm9hS', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00'),
(60, 'NPKELnxRd7', '01yfr1h8TK7Q', '1', 1, 1, 2, 1, '2024-03-13 21:31:00', '2024-03-13 21:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','instruktur') NOT NULL,
  `instruktur_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `level`, `instruktur_user_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', '$2y$12$BnDvKIQPBybRYcYPxODKVOyrj7B.2Z4DLwEdKO22TfVBiNue7l4c2', 'admin', NULL, NULL, '2024-03-13 21:22:57', '2024-03-13 21:22:57'),
(2, 'Daus', 'daus@gmail.com', '$2y$12$QaWK/aw0TnojOMXvDPSPyOw4QKzoHbYlw7fVY2p3haT2OS4CBrdWm', 'instruktur', 2, NULL, '2024-03-13 21:26:52', '2024-03-13 21:26:52'),
(3, 'Diki', 'diki@gmail.com', '$2y$12$yTT06r356GpWNxVV9cG3gOHJz90jTdrZJKzTE6gkSZxIC0RtDI3P.', 'instruktur', 1, NULL, '2024-03-13 21:27:10', '2024-03-13 21:27:10'),
(4, 'Rifan', 'rifan@gmail.com', '$2y$12$ovy7c8iu37Bnsf3C5Fs4y.GgkjnXSWAgJ94PQZUBTALsTqqxFXEsy', 'instruktur', 3, NULL, '2024-03-13 21:27:26', '2024-03-13 21:27:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absens_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instrukturs`
--
ALTER TABLE `instrukturs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_notifikasis`
--
ALTER TABLE `kategori_notifikasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasis`
--
ALTER TABLE `notifikasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifikasis_kategori_id_foreign` (`kategori_id`),
  ADD KEY `notifikasis_notif_instruktur_id_foreign` (`notif_instruktur_id`),
  ADD KEY `notifikasis_notif_siswa_id_foreign` (`notif_siswa_id`);

--
-- Indexes for table `notifikasi_bacas`
--
ALTER TABLE `notifikasi_bacas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifikasi_bacas_notifikasi_id_foreign` (`notifikasi_id`),
  ADD KEY `notifikasi_bacas_notifikasi_user_id_foreign` (`notifikasi_user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswas_nis_unique` (`nis`),
  ADD KEY `siswas_instruktur_id_foreign` (`instruktur_id`),
  ADD KEY `siswas_sekolah_id_foreign` (`sekolah_id`),
  ADD KEY `siswas_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `siswas_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_instruktur_user_id_foreign` (`instruktur_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absens`
--
ALTER TABLE `absens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instrukturs`
--
ALTER TABLE `instrukturs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_notifikasis`
--
ALTER TABLE `kategori_notifikasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `notifikasis`
--
ALTER TABLE `notifikasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifikasi_bacas`
--
ALTER TABLE `notifikasi_bacas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absens`
--
ALTER TABLE `absens`
  ADD CONSTRAINT `absens_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`);

--
-- Constraints for table `notifikasis`
--
ALTER TABLE `notifikasis`
  ADD CONSTRAINT `notifikasis_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_notifikasis` (`id`),
  ADD CONSTRAINT `notifikasis_notif_instruktur_id_foreign` FOREIGN KEY (`notif_instruktur_id`) REFERENCES `instrukturs` (`id`),
  ADD CONSTRAINT `notifikasis_notif_siswa_id_foreign` FOREIGN KEY (`notif_siswa_id`) REFERENCES `siswas` (`id`);

--
-- Constraints for table `notifikasi_bacas`
--
ALTER TABLE `notifikasi_bacas`
  ADD CONSTRAINT `notifikasi_bacas_notifikasi_id_foreign` FOREIGN KEY (`notifikasi_id`) REFERENCES `notifikasis` (`id`),
  ADD CONSTRAINT `notifikasi_bacas_notifikasi_user_id_foreign` FOREIGN KEY (`notifikasi_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_instruktur_id_foreign` FOREIGN KEY (`instruktur_id`) REFERENCES `instrukturs` (`id`),
  ADD CONSTRAINT `siswas_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`),
  ADD CONSTRAINT `siswas_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`),
  ADD CONSTRAINT `siswas_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_instruktur_user_id_foreign` FOREIGN KEY (`instruktur_user_id`) REFERENCES `instrukturs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
