-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 05:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AdminBaru', 'admin@admin.com', NULL, '$2y$10$iU9A0lFrpE9quDPSxwMix.gH39WjEW51nkZjzFPVuCytkImr0sVOS', 'd3DrD575SureVNuhdQ6sVxcUVf1NTUivk3sXK24BqaXqKdmjGW7EbWdeALYx', '2020-05-06 20:37:29', '2020-05-06 20:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `anggotas`
--

CREATE TABLE `anggotas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_anggota` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `fakultas` enum('Hukum','Ekonomi & Bisnis','Ilmu Administrasi','Pertanian','Peternakan','Teknik','Kedokteran','Perikanan & Ilmu Kelautan','Matematika & Ilmu Pengetahuan Alam','Teknologi Pertanian','Ilmu Sosial & Ilmu Politik','Ilmu Budaya','Kedokteran Hewan','Ilmu Komputer','Kedokteran Gigi','Vokasi') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `status_pinjam` enum('Bebas','Tertanggung') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggotas`
--

INSERT INTO `anggotas` (`id`, `id_anggota`, `nama`, `fakultas`, `tempat_lahir`, `no_hp`, `jenis_kelamin`, `tanggal_lahir`, `status_pinjam`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'AGT001', 'Rizki Nur', 'Teknik', 'Magetan', '98123456789', 'Laki-Laki', '2020-04-13', 'Bebas', 'Magetan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_buku` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengarang` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bukus`
--

INSERT INTO `bukus` (`id`, `kode_buku`, `kategori`, `judul`, `pengarang`, `penerbit`, `tahun`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 'KMK001', 'Teknologi', 'Pemrograman Web', 'Informatika', 'Gramedia', '2018', 101, '2020-03-29 01:43:24', '2020-05-08 00:51:37'),
(2, 'KMK002', 'Komik', 'Naruto Shippuden 2', 'Sukardi', 'Gramedia', '2018', 20, '2020-03-29 01:43:56', '2020-04-20 00:37:05'),
(3, 'KMK003', 'Komik', 'Doraemon', 'Sunardji', 'Gramedia', '2020', 49, '2020-04-21 08:10:12', '2020-05-08 00:54:11'),
(4, 'KMK004', 'Komik', 'Spongebob', 'Darmawan', 'Gramedia', '2018', 12, '2020-04-24 00:42:36', '2020-04-24 00:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `dendas`
--

CREATE TABLE `dendas` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_kembali` int(10) UNSIGNED NOT NULL,
  `jumlah_denda` int(11) DEFAULT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dendas`
--

INSERT INTO `dendas` (`id`, `no_kembali`, `jumlah_denda`, `tanggal_bayar`, `created_at`, `updated_at`) VALUES
(3, 2, 40000, '2020-05-05', '2020-05-05 09:22:50', '2020-05-05 09:22:50'),
(4, 2, 40000, '2020-05-17', '2020-05-17 07:03:57', '2020-05-17 07:03:57'),
(5, 2, 40000, '2020-05-17', '2020-05-17 07:04:00', '2020-05-17 07:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `kembalis`
--

CREATE TABLE `kembalis` (
  `id` int(10) UNSIGNED NOT NULL,
  `no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pinjam` int(10) UNSIGNED NOT NULL,
  `admin` int(10) UNSIGNED NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `terlambat` int(10) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Clear','Kurang','Terlambat') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kembalis`
--

INSERT INTO `kembalis` (`id`, `no`, `no_pinjam`, `admin`, `tanggal_pengembalian`, `terlambat`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KMBL001', 2, 1, '2020-11-10', 0, 'Buku Lengkap', 'Clear', '2020-05-02 09:01:58', '2020-05-02 09:01:58'),
(2, 'KMBL002', 5, 1, '2020-05-04', 20, 'Bayar Denda', 'Terlambat', NULL, NULL),
(3, 'KMBL003', 5, 1, '2020-04-10', 0, 'Bersih', 'Clear', '2020-05-08 01:36:44', '2020-05-08 01:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_03_23_153203_create_bukus_table', 1),
(4, '2020_03_23_153806_create_pegawais_table', 1),
(5, '2020_03_29_085308_create_anggotas_table', 2),
(6, '2020_03_29_085347_create_pengembalians_table', 2),
(7, '2020_03_29_085428_create_peminjamen_table', 2),
(8, '2020_04_12_100146_relasi_peminjaman', 2),
(9, '2020_04_12_100408_relasi_pengembalian', 2),
(10, '2020_05_02_060659_create_kembalis_table', 3),
(11, '2020_05_04_133904_create_dendas_table', 4),
(12, '2020_05_07_032321_create_admins_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pegawai` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('Pria','Wanita') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `id_pegawai`, `nama`, `jenis_kelamin`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'PGW001', 'Adhyaksa', 'Pria', '081327390552', 'Pasuruan', '2020-03-25 09:02:57', '2020-04-15 22:20:50'),
(2, 'PGW002', 'Alexander', 'Wanita', '082244512269', 'Pasuruan', '2020-03-25 03:30:47', '2020-03-25 08:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `peminjamen`
--

CREATE TABLE `peminjamen` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_pinjam` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_anggota` int(10) UNSIGNED NOT NULL,
  `id_buku` int(10) UNSIGNED NOT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `lama_pinjam` int(7) NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `id_pegawai` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjamen`
--

INSERT INTO `peminjamen` (`id`, `no_pinjam`, `id_anggota`, `id_buku`, `tanggal_pinjam`, `lama_pinjam`, `tanggal_kembali`, `id_pegawai`, `created_at`, `updated_at`) VALUES
(2, 'PJM001', 1, 1, '2018-11-11', 3, '2018-11-14', 1, '2020-04-21 07:06:43', '2020-04-21 07:06:43'),
(5, 'PJM002', 1, 4, '2020-04-05', 5, '2020-04-10', 2, NULL, NULL),
(7, 'PJM003', 1, 3, '2020-05-01', 5, '2020-05-06', 1, '2020-05-08 00:54:11', '2020-05-08 00:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'UserSatu', 'usersatu@gmail.com', NULL, '$2y$10$Xu9kvriDYx7AtJ8O3S7dpud7pk34n2LKEsUcHLSbwOtinV81rxFVy', 'dawnZn6xRSusCgQrIi6LstgmTRvwGIVxghjtQUXnkDAkiUW8Ly0Y9xvIrh8W', '2020-05-06 22:54:15', '2020-05-06 22:54:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dendas`
--
ALTER TABLE `dendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dendas_no_kembali_foreign` (`no_kembali`);

--
-- Indexes for table `kembalis`
--
ALTER TABLE `kembalis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kembalis_no_pinjam_foreign` (`no_pinjam`),
  ADD KEY `kembalis_admin_foreign` (`admin`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjamen_id_pegawai_foreign` (`id_pegawai`),
  ADD KEY `peminjamen_id_buku_foreign` (`id_buku`),
  ADD KEY `peminjamen_id_anggota_foreign` (`id_anggota`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dendas`
--
ALTER TABLE `dendas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kembalis`
--
ALTER TABLE `kembalis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `peminjamen`
--
ALTER TABLE `peminjamen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dendas`
--
ALTER TABLE `dendas`
  ADD CONSTRAINT `dendas_no_kembali_foreign` FOREIGN KEY (`no_kembali`) REFERENCES `kembalis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kembalis`
--
ALTER TABLE `kembalis`
  ADD CONSTRAINT `kembalis_admin_foreign` FOREIGN KEY (`admin`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kembalis_no_pinjam_foreign` FOREIGN KEY (`no_pinjam`) REFERENCES `peminjamen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD CONSTRAINT `peminjamen_id_anggota_foreign` FOREIGN KEY (`id_anggota`) REFERENCES `anggotas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjamen_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjamen_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
