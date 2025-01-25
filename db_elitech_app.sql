-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2025 pada 06.16
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elitech_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_user_models`
--

CREATE TABLE `auth_user_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `auth_user_models`
--

INSERT INTO `auth_user_models` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'NovalSaputraa', '$2y$10$3njxgdE9w3rg4P4fMAzyV.d3bUwvlSI09JN5DsIrXZqZCFGekMCdq', '2025-01-23 07:24:33', '2025-01-24 20:22:00'),
(2, 'Noval', '$2y$10$twxjtDa1blLn1eX178RhfO4xPRoY.BISXaWWMqr7VVj1NDvklAV5O', '2025-01-24 21:25:26', '2025-01-24 21:25:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `file_models`
--

CREATE TABLE `file_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `file_models`
--

INSERT INTO `file_models` (`id`, `name_file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'IOT.jpg', '2025-01-23 07:24:58', '2025-01-23 07:24:58', NULL),
(2, 'Foto Noval.jpg', '2025-01-23 07:25:17', '2025-01-23 07:25:17', NULL),
(3, 'Foto Noval.jpg', '2025-01-23 08:53:45', '2025-01-23 08:53:45', '2025-01-25 03:24:35'),
(4, 'me.jpg', '2025-01-23 13:51:57', '2025-01-23 13:51:57', NULL),
(5, 'IOT.jpg', '2025-01-24 10:02:20', '2025-01-24 10:02:20', NULL),
(6, 'tws.jpg', '2025-01-24 17:05:39', '2025-01-24 17:05:39', NULL),
(7, 'Foto Noval.jpg', '2025-01-24 17:05:53', '2025-01-24 17:05:53', NULL),
(8, 'Download.mp4', '2025-01-24 17:08:06', '2025-01-24 17:08:06', NULL),
(9, 'Foto Noval.jpg', '2025-01-24 19:49:24', '2025-01-24 19:49:24', NULL),
(10, 'Download.mp4', '2025-01-24 19:52:36', '2025-01-24 19:52:36', NULL),
(11, 'Download.mp4', '2025-01-24 19:55:03', '2025-01-24 19:55:03', NULL),
(12, 'Noval-KTP.jpg', '2025-01-24 20:21:25', '2025-01-24 20:21:25', NULL),
(13, 'bromo.jpg', '2025-01-24 21:27:39', '2025-01-24 21:27:39', NULL),
(14, 'bromo2.jpg', '2025-01-24 21:29:07', '2025-01-24 21:29:07', NULL),
(15, 'bromo3.jpg', '2025-01-24 21:29:15', '2025-01-24 21:29:15', NULL),
(16, 'Download.mp4', '2025-01-24 21:30:27', '2025-01-24 21:30:27', NULL),
(17, 'banner.jpg', '2025-01-24 21:43:34', '2025-01-24 21:43:34', NULL),
(18, 'download.png', '2025-01-24 21:49:15', '2025-01-24 21:49:15', NULL),
(19, 'reel.png', '2025-01-24 21:51:37', '2025-01-24 21:51:37', NULL),
(20, 'save-instagram.png', '2025-01-24 21:51:37', '2025-01-24 21:51:37', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(53, '2025_01_20_175341_create_auth_user_models_table', 2),
(54, '2025_01_20_175347_create_user_models_table', 2),
(55, '2025_01_22_231902_create_file_models_table', 2),
(57, '2025_01_22_023616_create_post_models_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `post_models`
--

CREATE TABLE `post_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file_id` bigint(20) UNSIGNED NOT NULL,
  `like` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `caption` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post_models`
--

INSERT INTO `post_models` (`id`, `user_id`, `file_id`, `like`, `comment`, `caption`, `thumbnail`, `extension`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 2, 13, NULL, NULL, 'Yuhu', 'bromo.jpg', 'jpg', NULL, '2025-01-24 21:27:39', '2025-01-24 21:43:49'),
(6, 2, 14, NULL, NULL, 'postingan ke 2', 'bromo2.jpg', 'jpg', NULL, '2025-01-24 21:29:07', '2025-01-24 21:29:07'),
(7, 2, 15, NULL, NULL, 'Postingan ke 3', 'bromo3.jpg', 'jpg', NULL, '2025-01-24 21:29:15', '2025-01-24 21:29:15'),
(8, 2, 16, NULL, NULL, 'Postingan video', 'Download.mp4', 'mp4', NULL, '2025-01-24 21:30:27', '2025-01-24 21:30:27'),
(9, 2, 17, NULL, NULL, 'Postingan ke 5', 'banner.jpg', 'jpg', NULL, '2025-01-24 21:43:34', '2025-01-24 21:43:34'),
(10, 2, 18, NULL, NULL, 'w', 'download.png', 'png', NULL, '2025-01-24 21:49:15', '2025-01-24 21:49:15'),
(11, 2, 19, NULL, NULL, 's', 'reel.png', 'png', NULL, '2025-01-24 21:51:37', '2025-01-24 21:51:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_models`
--

CREATE TABLE `user_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nickname` varchar(250) DEFAULT NULL,
  `bio` varchar(250) DEFAULT NULL,
  `path_foto` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_models`
--

INSERT INTO `user_models` (`id`, `user_id`, `nickname`, `bio`, `path_foto`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Mochammad Nouval', 'Foto Noval.jpg', '2025-01-23 07:24:33', '2025-01-24 20:22:00'),
(2, 2, NULL, 'Mochammad Nouval Saputra', 'banner.jpg', '2025-01-24 21:25:26', '2025-01-24 21:26:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_user_models`
--
ALTER TABLE `auth_user_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_user_models_username_unique` (`username`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `file_models`
--
ALTER TABLE `file_models`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `post_models`
--
ALTER TABLE `post_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_models_user_id_foreign` (`user_id`),
  ADD KEY `post_models_file_id_foreign` (`file_id`);

--
-- Indeks untuk tabel `user_models`
--
ALTER TABLE `user_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_models_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_user_models`
--
ALTER TABLE `auth_user_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `file_models`
--
ALTER TABLE `file_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `post_models`
--
ALTER TABLE `post_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_models`
--
ALTER TABLE `user_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `post_models`
--
ALTER TABLE `post_models`
  ADD CONSTRAINT `post_models_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `file_models` (`id`),
  ADD CONSTRAINT `post_models_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_models` (`id`);

--
-- Ketidakleluasaan untuk tabel `user_models`
--
ALTER TABLE `user_models`
  ADD CONSTRAINT `user_models_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `auth_user_models` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
