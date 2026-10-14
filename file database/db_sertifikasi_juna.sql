-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 14, 2026 at 07:11 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sertifikasi_juna`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_09_30_031727_create_skemas_table', 1),
(5, '2026_09_30_031746_create_pesertas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesertas`
--

CREATE TABLE `pesertas` (
  `id` bigint UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `skema_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesertas`
--

INSERT INTO `pesertas` (`id`, `nik`, `nama_lengkap`, `email`, `no_hp`, `status`, `skema_id`, `created_at`, `updated_at`) VALUES
(1, '3175083671777772', 'Sultan Iskandarin', 'iskandar@gmail.com', '083471312833', 'Terverifikasi', 1, '2026-10-11 19:45:41', '2026-10-13 23:30:54'),
(2, '3175083643222122', 'Jesica Simanjutak', 'jesica@gmail.com', '08212366333', 'Terverifikasi', 2, '2026-10-11 21:08:09', '2026-10-13 22:42:56'),
(4, '3175083634751002', 'Valentino', 'vlen@gmail.com', '082361276352', 'Terverifikasi', 3, '2026-10-12 00:17:31', '2026-10-13 22:42:56'),
(5, '3188357282141002', 'Alisson Matius', 'alisson@gmail.com', '081123874202', 'Terverifikasi', 3, '2026-10-13 19:06:41', '2026-10-13 22:42:57'),
(6, '3177263273791007', 'Luke Modrid', 'luke@gmail.com', '087532123677', 'Terverifikasi', 1, '2026-10-13 19:12:44', '2026-10-13 23:30:52'),
(7, NULL, 'Ismail', 'mail@gmail.com', NULL, 'Terverifikasi', NULL, '2026-10-13 20:39:16', '2026-10-13 23:30:50'),
(8, '3164432838221004', 'Olimo Siregar', 'imo@gmail.com', '083476878438', 'Pending', 2, '2026-10-13 20:55:21', '2026-10-13 20:55:21'),
(9, '3073457209384879', 'Mohammad Mane', 'mane@gmail.com', '085432832681', 'Pending', 2, '2026-10-13 20:58:46', '2026-10-13 20:58:46'),
(10, NULL, 'Lionel Simanjutak', 'lionel@gmail.com', NULL, 'Pending', NULL, '2026-10-13 22:47:53', '2026-10-13 22:47:53'),
(11, '3175083434481002', 'ucok simanjutak', 'ucok@gmail.com', '082137443293', 'Pending', 2, '2026-10-13 23:07:47', '2026-10-13 23:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Ftq0w8DH2Vt5fYSifI3ye3VYFp9HNcWzDLbuvVgQ', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRDZHck5TaGhpVkZaMUdIeDk0alppbUp0SG1oR2ZscUpCdzVVVFI2MiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjY0OiI5NDEyNTA4ZjkyMzljZjQ2MjZjMTliMGQ4ZDkxMzE0OTU0YzUxNGJkMWUxYWUzOGM4NGUzMjY5Zjg3OThiNzgwIjtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3OTE5NjE3MDI7fX0=', 1791961703);

-- --------------------------------------------------------

--
-- Table structure for table `skemas`
--

CREATE TABLE `skemas` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_skema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_skema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skemas`
--

INSERT INTO `skemas` (`id`, `kode_skema`, `nama_skema`, `jenis`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'SKM-JWD-0001', 'Junior Web Developer', 'Okupasi', NULL, '2026-10-11 19:42:58', '2026-10-11 20:57:33'),
(2, 'KLS-FE-002', 'Pemrograman Frontend Web', 'Klaster', NULL, '2026-10-11 19:43:49', '2026-10-11 19:43:49'),
(3, 'KKNI-II-RPL', 'Rekayasa Perangkat Lunak Level II', 'KKNI', NULL, '2026-10-11 19:44:43', '2026-10-11 19:44:43'),
(5, 'SKM-DG-004', 'Desain Grafis Muda', 'Okupasi', NULL, '2026-10-13 21:29:23', '2026-10-13 21:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'peserta',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$9M8dvlh9PamtmZxTeN.95eWBSCi9eIQry4d/AZjnOH9krnQ40YuFe', NULL, '2026-10-11 19:12:17', '2026-10-11 19:12:17'),
(3, 'Benares', 'ares@gmail.com', 'peserta', NULL, '$2y$12$YiWRQCXG89lgmo7gm0NkReWMl2PLR7KzuksC9g81VPeCWDFd0A1U.', NULL, '2026-10-12 18:05:07', '2026-10-12 18:05:07'),
(4, 'tadashi', 'tadashi@gmail.com', 'peserta', NULL, '$2y$12$pnYf2W6nD4fAbkZSm6M25.oh.THD.Fbfg3O/xMRM7TWdRkhTJqWoq', NULL, '2026-10-12 20:37:27', '2026-10-12 20:37:27'),
(5, 'Sultan Iskandarin', 'iskandar@gmail.com', 'peserta', NULL, '$2y$12$TjClxXZDGJJxtPHXC.KHb.x7FFVTeZ9glP1PEtume6A32sK/ex1F6', NULL, '2026-10-12 20:39:07', '2026-10-12 20:39:07'),
(6, 'Jesica Simanjutak', 'jesica@gmail.com', 'peserta', NULL, '$2y$12$kSg1FmLc05oPVUlckXvijujwO1xaNMsQ3PRZmn6SzFxP7vUannoxO', NULL, '2026-10-13 18:53:58', '2026-10-13 18:53:58'),
(7, 'Valentino', 'vlen@gmail.com', 'peserta', NULL, '$2y$12$fYKpn.8rTQavRO8nJ3npCOZwUQ5bB06kXH2rfHx89Tohyk3t3sVZe', NULL, '2026-10-13 18:57:12', '2026-10-13 18:57:12'),
(8, 'Alisson Matius', 'alisson@gmail.com', 'peserta', NULL, '$2y$12$uUdYgh3c.BS.lSzAzUfUcexeZgk2IXcv0F67kffIFHChFbtO/61xS', NULL, '2026-10-13 19:07:03', '2026-10-13 19:07:03'),
(9, 'Luke Modrid', 'luke@gmail.com', 'peserta', NULL, '$2y$12$4H3/dliGLd3KUdrIJCnVgewgxT2BMy1rdKzO6CuNFKzPVHooo4Cdi', NULL, '2026-10-13 19:13:28', '2026-10-13 19:13:28'),
(10, 'Ismail', 'mail@gmail.com', 'peserta', NULL, '$2y$12$CWcPPyS2gCFfVsYErR4WcewptJWbXyX5BRjIw1tbhSlDWKNCNSo1u', NULL, '2026-10-13 20:29:13', '2026-10-13 20:29:13'),
(11, 'Lionel Simanjutak', 'lionel@gmail.com', 'peserta', NULL, '$2y$12$ejx/01nDUDR4yopPs75s7OapZWkMxd15ooAJ6ZFgVh5bTKeIQxU8W', NULL, '2026-10-13 22:47:53', '2026-10-13 22:47:53'),
(12, 'ucok simanjutak', 'ucok@gmail.com', 'peserta', NULL, '$2y$12$23xBW4fbr7Ep3zZcatvit.5GDysMgswfLUXpV86Cbj6HVVwXnqepS', NULL, '2026-10-13 23:07:47', '2026-10-13 23:07:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pesertas`
--
ALTER TABLE `pesertas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pesertas_nik_unique` (`nik`),
  ADD KEY `pesertas_skema_id_foreign` (`skema_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skemas`
--
ALTER TABLE `skemas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skemas_kode_skema_unique` (`kode_skema`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesertas`
--
ALTER TABLE `pesertas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `skemas`
--
ALTER TABLE `skemas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesertas`
--
ALTER TABLE `pesertas`
  ADD CONSTRAINT `pesertas_skema_id_foreign` FOREIGN KEY (`skema_id`) REFERENCES `skemas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
