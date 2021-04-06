-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Apr 2021 pada 05.46
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`, `created_at`, `updated_at`) VALUES
(7, 'BDP', 'bisnis daring pemasaran', '2021-03-22 21:05:47', '2021-03-22 21:05:47'),
(8, 'RPL', 'dasdada', '2021-03-25 18:47:25', '2021-03-25 18:47:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2021_03_26_013803_pembayaran', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_dibayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_petugas`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `tahun_dibayar`, `id_spp`, `jumlah_bayar`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 5, 123456123, '2021-04-04', 'juli', '2021', 6, 400000, NULL, '2021-04-04 00:18:16', '2021-04-04 00:18:16'),
(23, 5, 123456123, '2021-04-04', 'agustus', '2021', 6, 232344, NULL, '2021-04-04 02:55:08', '2021-04-04 02:55:08'),
(25, 5, 123456723, '2021-04-04', 'juli', '2021', 6, 400000, NULL, '2021-04-04 03:12:58', '2021-04-04 03:12:58'),
(26, 5, 123456723, '2021-04-04', 'agustus', '2021', 6, 400000, NULL, '2021-04-04 03:13:12', '2021-04-04 03:13:12'),
(27, 5, 123456123, '2021-04-05', 'september', '2021', 6, 420000, NULL, '2021-04-04 21:07:39', '2021-04-04 21:07:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`, `created_at`, `updated_at`) VALUES
(2, 'Adlan@gmail.com', '123123123', 'Adlan', 'petugas', '2021-03-16 00:48:42', '2021-03-22 21:06:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` char(10) NOT NULL,
  `nis` char(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nis`, `nama`, `email`, `password`, `id_kelas`, `alamat`, `no_telp`, `id_spp`, `created_at`, `updated_at`) VALUES
('123456123', '11800111', 'Manyu', 'manyu@gmail.com', '$2y$10$mak3rwfux6ysCK3egy3e2O3rUt9XArbtF8w6CVGG5HCb3Dpr/6qwy', 7, 'cikereteg', '0817827323', 6, '2021-04-04 00:17:56', '2021-04-04 00:17:56'),
('123456723', '11800111', 'kasep', 'kasep@gmail.com', '$2y$10$3RZcnCL/XvX6jdozRlNFmu7mEKGyRxgmHiLK9wB96zo6jDk/HTIMa', 7, 'garut', '0817827323', 6, '2021-04-04 02:57:27', '2021-04-04 02:57:27'),
('1234567898', '1111111', 'adlan', 'adlan@gmail.com', '$2y$10$Hw.Q14W7m3kOLwr1PMaOAu1eL5aUSuE.fUHA0vsO14ZmB3zmqyUf6', 7, 'cibaduyut', '081782738123', 6, '2021-04-04 21:04:15', '2021-04-04 21:04:15'),
('124242124', '11800888', 'Kuuhaku', '', '', 8, 'cibaduyut', '0817827382222', 4, '2021-04-03 02:00:45', '2021-04-03 02:00:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`, `created_at`, `updated_at`) VALUES
(2, 2012, 350000, '2021-03-12 22:09:13', '2021-03-12 22:09:13'),
(4, 2013, 450000, '2021-03-25 18:47:46', '2021-03-25 18:47:46'),
(6, 2021, 55000, '2021-04-03 02:06:49', '2021-04-03 02:06:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Admin', 'admin@gmail.com', NULL, 1, '$2y$10$n.CHks5igse3XQPZXSAt6ePbFwqX.E63K1PtzZbWlDAFIzemH8qWS', NULL, '2021-03-19 20:40:40', '2021-03-19 20:40:40'),
(6, 'petugas', 'petugas@gmail.com', NULL, 2, '$2y$10$dYAiRl7qsby4OPd7oEseEuCTwYqsof1H7uiidgAmvbfV88avC..2i', NULL, '2021-03-19 20:40:40', '2021-03-19 20:40:40'),
(7, 'siswa', 'siswa@gmail.com', NULL, 3, '$2y$10$EkeAk8xE5uU3488N.8ERfe5XU.3GdBviMD4ano.RYSUcxVzdBc7Wu', NULL, '2021-03-19 20:40:40', '2021-03-19 20:40:40'),
(12, 'Manyu', 'manyu@gmail.com', NULL, 3, '$2y$10$FxHuvE6cMi/NFIWBd6W8GO/MInzmx9Ui/l4WxIhGKCVonahCiYrXm', NULL, '2021-04-04 00:17:56', '2021-04-04 00:17:56'),
(13, 'kasep', 'kasep@gmail.com', NULL, 3, '$2y$10$6F8FcuZ4wu674MFGT20tyugnnMahS89AWV90vAOc7nco2GIaJ7IKO', NULL, '2021-04-04 02:57:27', '2021-04-04 02:57:27'),
(14, 'adlan', 'adlan@gmail.com', NULL, 3, '$2y$10$f0oqJy.kiFyTceWkDFGe9eSLSwoMcxAJecXdAJvWcnCzU2RQM/2M.', NULL, '2021-04-04 21:04:15', '2021-04-04 21:04:15');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_pembayaran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_pembayaran` (
`id_pembayaran` bigint(20) unsigned
,`id_petugas` int(11)
,`nisn` int(11)
,`tgl_bayar` date
,`bulan_dibayar` varchar(255)
,`tahun_dibayar` varchar(255)
,`id_spp` int(11)
,`jumlah_bayar` int(11)
,`remember_token` varchar(100)
,`created_at` timestamp
,`updated_at` timestamp
,`name` varchar(255)
,`nis` char(8)
,`nama` varchar(35)
,`nama_kelas` varchar(10)
,`tahun` int(11)
,`nominal` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_siswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_siswa` (
`nisn` char(10)
,`nis` char(8)
,`nama` varchar(35)
,`id_kelas` int(11)
,`alamat` text
,`no_telp` varchar(13)
,`id_spp` int(11)
,`tahun` int(11)
,`nominal` int(11)
,`nama_kelas` varchar(10)
,`kompetensi_keahlian` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_pembayaran`
--
DROP TABLE IF EXISTS `view_pembayaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pembayaran`  AS SELECT `pembayaran`.`id_pembayaran` AS `id_pembayaran`, `pembayaran`.`id_petugas` AS `id_petugas`, `pembayaran`.`nisn` AS `nisn`, `pembayaran`.`tgl_bayar` AS `tgl_bayar`, `pembayaran`.`bulan_dibayar` AS `bulan_dibayar`, `pembayaran`.`tahun_dibayar` AS `tahun_dibayar`, `pembayaran`.`id_spp` AS `id_spp`, `pembayaran`.`jumlah_bayar` AS `jumlah_bayar`, `pembayaran`.`remember_token` AS `remember_token`, `pembayaran`.`created_at` AS `created_at`, `pembayaran`.`updated_at` AS `updated_at`, `users`.`name` AS `name`, `view_siswa`.`nis` AS `nis`, `view_siswa`.`nama` AS `nama`, `view_siswa`.`nama_kelas` AS `nama_kelas`, `view_siswa`.`tahun` AS `tahun`, `view_siswa`.`nominal` AS `nominal` FROM ((`pembayaran` join `view_siswa` on(`pembayaran`.`nisn` = `view_siswa`.`nisn`)) join `users` on(`pembayaran`.`id_petugas` = `users`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_siswa`
--
DROP TABLE IF EXISTS `view_siswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_siswa`  AS SELECT `siswa`.`nisn` AS `nisn`, `siswa`.`nis` AS `nis`, `siswa`.`nama` AS `nama`, `siswa`.`id_kelas` AS `id_kelas`, `siswa`.`alamat` AS `alamat`, `siswa`.`no_telp` AS `no_telp`, `siswa`.`id_spp` AS `id_spp`, `spp`.`tahun` AS `tahun`, `spp`.`nominal` AS `nominal`, `kelas`.`nama_kelas` AS `nama_kelas`, `kelas`.`kompetensi_keahlian` AS `kompetensi_keahlian` FROM ((`siswa` join `spp` on(`siswa`.`id_spp` = `spp`.`id_spp`)) join `kelas` on(`siswa`.`id_kelas` = `kelas`.`id_kelas`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `id_spp` (`id_spp`),
  ADD KEY `id_kelas_2` (`id_kelas`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
