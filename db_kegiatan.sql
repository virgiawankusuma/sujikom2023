-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2024 at 12:43 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kegiatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `factories`
--

CREATE TABLE `factories` (
  `id` int NOT NULL,
  `name` varchar(31) NOT NULL,
  `uid` varchar(31) NOT NULL,
  `class` varchar(63) NOT NULL,
  `icon` varchar(31) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kegiatan`
--

CREATE TABLE `kategori_kegiatan` (
  `id` int NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `kategori_kegiatan`
--

INSERT INTO `kategori_kegiatan` (`id`, `nama_kategori`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Dolorem.', 'ut-ut-rerum-explicabo', '2024-07-22 20:37:20', '2024-07-22 20:37:20'),
(2, 'Quos.', 'rem-iste-ab-at', '2024-07-22 20:37:20', '2024-07-22 20:37:20'),
(3, 'Odit dolores.', 'similique-autem-dolor', '2024-07-22 20:37:20', '2024-07-22 20:37:20'),
(4, 'Corporis ab.', 'odio-corrupti-quis-magnam', '2024-07-22 20:37:20', '2024-07-22 20:37:20'),
(5, 'Quos voluptatem.', 'labore-voluptatem', '2024-07-22 20:37:20', '2024-07-22 20:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kategori_id` int NOT NULL,
  `deskripsi_kegiatan` text NOT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `batas_pendaftaran` datetime DEFAULT NULL,
  `link_pendaftaran` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `slug`, `kategori_id`, `deskripsi_kegiatan`, `tanggal_kegiatan`, `batas_pendaftaran`, `link_pendaftaran`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Deserunt cumque repellat voluptas.', 'totam-suscipit-rerum', 5, 'Facere libero illum amet atque aut quod non. Rerum sit quod eos blanditiis asperiores nihil. Quam eum qui dolores.', '1970-04-07', '2015-04-02 20:53:55', 'http://www.saptono.mil.id/est-quos-itaque-repellat-eius-rerum', 'default.jpg', '2003-10-11 06:11:20', '2024-07-22 20:37:20'),
(2, 'Quia delectus qui.', 'omnis-atque-esse', 2, 'Exercitationem et eos voluptatem. Aut ut explicabo quis blanditiis expedita provident. Veritatis omnis molestias est incidunt perferendis.', '1983-03-24', '1991-11-23 06:28:55', 'https://www.samosir.com/harum-autem-quo-quidem-quisquam-dolores-aut', 'default.jpg', '2011-07-10 18:31:30', '2024-07-22 20:37:20'),
(3, 'Dolores est qui.', 'asperiores-quasi-occaecati', 1, 'Asperiores explicabo ex esse repellendus repudiandae magnam. Accusantium et dicta non dignissimos eos occaecati hic. Amet dolore voluptates sunt blanditiis perspiciatis. Recusandae qui exercitationem repellat aperiam voluptatem aut.', '1995-03-18', '1979-09-12 20:37:48', 'http://budiman.com/', 'default.jpg', '1991-03-28 12:52:35', '2024-07-22 20:37:20'),
(4, 'Placeat libero sit.', 'dignissimos-a-occaecati', 5, 'Illum in dolore vitae dolor. Quidem quasi deleniti dicta.', '1988-09-09', '1983-03-29 01:46:44', 'http://www.iswahyudi.biz/laborum-hic-nulla-ipsam-in-ut-maiores-ut', 'default.jpg', '2002-04-17 19:20:17', '2024-07-22 20:37:20'),
(5, 'Modi aperiam qui.', 'reiciendis-culpa-facilis-ipsa-voluptatem', 4, 'Temporibus ut sint atque ullam ut. Nihil est at autem iure et rerum tempora. Maiores ducimus molestias odio libero accusantium illum et. Quis libero omnis quia qui debitis.', '1973-04-06', '1989-02-03 21:42:02', 'http://www.saptono.in/voluptatibus-ea-tempora-omnis-sequi', 'default.jpg', '2010-08-15 10:43:57', '2024-07-22 20:37:20'),
(6, 'Example Kegiatan', 'example-slug', 1, 'Deskripsi kegiatan', '2024-07-22', '2024-07-22 20:37:20', 'https://example.com', 'default.jpg', '2024-07-22 20:37:20', '2024-07-22 20:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(47, '2020-02-22-222222', 'Tests\\Support\\Database\\Migrations\\ExampleMigration', 'tests', 'Tests\\Support', 1721655375, 1),
(48, '2024-07-22-072122', 'App\\Database\\Migrations\\Users', 'default', 'App', 1721655428, 2),
(49, '2024-07-22-072123', 'App\\Database\\Migrations\\KategoriKegiatan', 'default', 'App', 1721655428, 2),
(50, '2024-07-22-072124', 'App\\Database\\Migrations\\Kegiatan', 'default', 'App', 1721655428, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `tanggal_lahir`, `nomor_telepon`, `alamat`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Virgiawan Teguh Kusuma', '2000-09-20', '081234567890', 'Jl. Raya Kedung Halang No. 1', 'virgiawanteguhkusuma@gmail.com', '$2y$10$7vz1JTX869duhCT1LsAnZeCXmLXBnkMAkRMkzLkn20LyMfZw2nuFK', '2024-07-22 20:37:20', '2024-07-22 20:37:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `factories`
--
ALTER TABLE `factories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `uid` (`uid`),
  ADD KEY `deleted_at_id` (`deleted_at`,`id`),
  ADD KEY `created_at` (`created_at`);

--
-- Indexes for table `kategori_kegiatan`
--
ALTER TABLE `kategori_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `factories`
--
ALTER TABLE `factories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_kegiatan`
--
ALTER TABLE `kategori_kegiatan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
