-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Agu 2023 pada 15.46
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabelku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `app`
--

CREATE TABLE `app` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `warna_button` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `app`
--

INSERT INTO `app` (`id`, `logo`, `deskripsi`, `warna_button`, `created_at`, `updated_at`) VALUES
(1, 'app/tabelku.png', 'Website Tabelku adalah Website pencatatan pembelian yang ada di UD Bawang Merah Indofood.\r\nUntuk mencatat data pembelian klik fitur Pencatatan, jika ingin melihat data yang sudah tercatat, maka klik fitur Data Pembelian yang berada di sebelah kiri, dan jika ingin melihat laporan maka klik fitur Laporan di sebelah kiri.', 'btn-primary', '2023-07-28 17:11:32', '2023-07-28 17:11:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `avatar`
--

CREATE TABLE `avatar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `avatar`
--

INSERT INTO `avatar` (`id`, `name`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Man', 'avatar/man.png', '2023-07-18 16:20:59', '2023-07-18 16:20:59'),
(2, 'Black Man', 'avatar/black-man.png', '2023-07-18 16:20:59', '2023-07-18 16:20:59'),
(3, 'Hat Man', 'avatar/hat-man.png', '2023-07-18 16:20:59', '2023-07-18 16:20:59'),
(4, 'Jilbab Woman', 'avatar/jilbab-woman.png', '2023-07-18 16:20:59', '2023-07-18 16:20:59'),
(5, 'Europe Man', 'avatar/europe-man.png', '2023-07-18 16:20:59', '2023-07-18 16:20:59'),
(6, 'Woman', 'avatar/woman.png', '2023-07-18 16:20:59', '2023-07-18 16:20:59'),
(7, 'Young Black Man', 'avatar/young-black-man.png', '2023-07-18 16:20:59', '2023-07-18 16:20:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `font_family`
--

CREATE TABLE `font_family` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `font_family` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `font_family`
--

INSERT INTO `font_family` (`id`, `font_family`, `created_at`, `updated_at`) VALUES
(1, '\"Roboto\"', '2023-07-28 19:52:15', '2023-07-28 19:52:15'),
(2, '\"Helvetica Neue\"', '2023-07-28 19:52:15', '2023-07-28 19:52:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_penjual` varchar(255) DEFAULT NULL,
  `harga_beli` float(16,2) DEFAULT NULL,
  `bobot` varchar(255) DEFAULT NULL,
  `kualitas` varchar(255) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `total_bayar` float(16,2) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `nama_penjual`, `harga_beli`, `bobot`, `kualitas`, `tanggal_pembelian`, `total_bayar`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(6, 'rini', 7000.00, '20', 'Besar', '2023-07-20', 140000.00, 'Pemilik Usaha', '2023-08-09 14:11:14', 'Pemilik Usaha', '2023-08-09 14:11:14'),
(7, 'Biba', 12000.00, '32', 'Besar', '2023-07-23', 384000.00, 'Pemilik Usaha', '2023-08-09 14:12:10', NULL, '2023-08-09 14:12:10'),
(8, 'Udin', 12000.00, '40', 'Besar', '2023-07-20', 480000.00, 'Pemilik Usaha', '2023-08-09 14:12:49', NULL, '2023-08-09 14:12:49'),
(9, 'Siti', 7000.00, '22', 'Kecil', '2023-06-24', 154000.00, 'Pemilik Usaha', '2023-08-09 14:13:37', NULL, '2023-08-09 14:13:37'),
(10, 'Ali', 7000.00, '34', 'Kecil', '2023-06-25', 238000.00, 'Pemilik Usaha', '2023-08-09 14:14:21', NULL, '2023-08-09 14:14:21'),
(11, 'Sri', 12000.00, '30', 'Besar', '2023-06-25', 360000.00, 'Pemilik Usaha', '2023-08-09 14:15:06', NULL, '2023-08-09 14:15:06'),
(12, 'Sri', 7000.00, '20', 'Kecil', '2023-08-09', 140000.00, 'Pemilik Usaha', '2023-08-09 14:45:32', NULL, '2023-08-09 14:45:32'),
(13, 'Siti', 12000.00, '20', 'Besar', '2023-07-20', 240000.00, 'Pemilik Usaha', '2023-08-10 07:02:20', NULL, '2023-08-10 07:02:20'),
(14, 'Siti', 12000.00, '20', 'Besar', '2023-08-20', 240000.00, 'Pemilik Usaha', '2023-08-10 07:04:08', NULL, '2023-08-10 07:04:08'),
(15, 'titik', 12000.00, '-5', 'Kecil', '2023-08-09', -60000.00, 'Pemilik Usaha', '2023-08-10 07:10:52', NULL, '2023-08-10 07:10:52'),
(21, 'yuhuu', 1000.00, '2.5', 'Besar', '2023-08-12', 2500.00, 'Pegawai', '2023-08-12 09:47:50', NULL, '2023-08-12 09:47:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tampilan`
--

CREATE TABLE `tampilan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warna_skema` varchar(255) DEFAULT NULL,
  `warna_soft` varchar(255) DEFAULT NULL,
  `warna_latar` varchar(255) DEFAULT NULL,
  `warna_sidebar` varchar(255) DEFAULT NULL,
  `warna_topbar` varchar(255) DEFAULT NULL,
  `jenis_font` varchar(255) DEFAULT NULL,
  `ukuran_font` varchar(255) DEFAULT NULL,
  `warna_font` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tampilan`
--

INSERT INTO `tampilan` (`id`, `warna_skema`, `warna_soft`, `warna_latar`, `warna_sidebar`, `warna_topbar`, `jenis_font`, `ukuran_font`, `warna_font`, `created_at`, `updated_at`) VALUES
(1, 'primary', 'soft-primary', 'bg-soft-light', 'bg-primary', 'bg-soft-primary', '\"Roboto\"', 'fs-6', 'text-primary', '2023-07-28 17:25:39', '2023-07-29 00:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `gender` varchar(128) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone_number` varchar(128) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `avatar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `email`, `gender`, `birthday`, `phone_number`, `address`, `image`, `avatar_id`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'pemilikusaha', 'Pemilik Usaha', 'pemilikusaha@gmail.com', 'Perempuan', '1999-02-18', '081214222446', 'Jl. Bandung', 'avatar/jilbab-woman.png', NULL, '$2y$10$036R9kVPVDw4eYAD.9avm.b4V9lBMd5jqWE5psOrUbShW.GciIO3u', 1, 1, 1614472317),
(2, 'pegawai', 'Pegawai', 'pegawai@gmail.com', 'Perempuan', '2002-06-12', '0128938123', 'Bandung', 'avatar/woman.png', NULL, '$2y$10$t60ZMpdBXkLNKN0F1KaDsegdSXRgYdm5qRAiCThvqDpAG1o3J5XrC', 2, 1, 1614472317),
(18, NULL, 'coba ya', NULL, 'Laki-laki', '2023-08-14', '123123123', 'asdasdas', NULL, NULL, NULL, 3, 1, 1692020676);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 2),
(8, 1, 5),
(9, 1, 6),
(10, 2, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu` varchar(128) DEFAULT NULL,
  `active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `active`) VALUES
(0, 'Undefined', 0),
(1, 'Admin', 1),
(2, 'User', 1),
(3, 'Menu', 0),
(4, 'DataMaster', 0),
(5, 'Tabelku', 1),
(6, 'App', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'pemilik usaha'),
(2, 'pegawai'),
(3, 'penjual');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(0, 0, 'Undefined', NULL, NULL, 0),
(1, 1, 'Dashboard', 'admin/', 'box', 0),
(2, 5, 'Dashboard', 'user/', 'box', 1),
(3, 2, 'Edit Profile', 'user/edit', 'user', 1),
(4, 3, 'Menu Management', 'menu/', 'list', 1),
(5, 3, 'Submenu Management', 'menu/subMenu', 'list', 1),
(6, 1, 'Role Management', 'admin/role', 'users', 1),
(7, 2, 'Change Password', 'user/changePassword', 'key', 1),
(8, 1, 'Data User', 'admin/dataUser/', 'users', 1),
(9, 4, 'Master Data', 'DataMaster/', 'list', 0),
(10, 5, 'Pencatatan', 'Tabelku/index', 'file', 1),
(11, 5, 'Data Pembelian', 'Tabelku/pembelian', 'file', 1),
(12, 5, 'Laporan', 'Tabelku/laporan', 'file', 1),
(13, 6, 'Avatar', 'App/avatar', 'user', 1),
(14, 6, 'Kelola Tema', 'App/tampilan', 'aperture', 1),
(15, 6, 'Kelola Web', 'App/app', 'chrome', 1),
(16, 5, 'Data Pelanggan', 'Tabelku/pelanggan', 'user', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `warna`
--

CREATE TABLE `warna` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warna` varchar(255) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `warna`
--

INSERT INTO `warna` (`id`, `warna`, `kode`, `created_at`, `updated_at`) VALUES
(1, 'primary', '#3475ba', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(2, 'success', '#05a34a', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(3, 'info', '#66d1d1', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(4, 'warning', '#fbbc06', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(5, 'danger', '#ff3366', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(6, 'secondary', '#7987a1', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(7, 'light', '#e9ecef', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(8, 'dark', '#060c17', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(9, 'blue', '#0d6efd', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(10, 'indigo', '#6610f2', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(11, 'purple', '#6f42c1', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(12, 'pink', '#d63384', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(13, 'red', '#dc3545', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(14, 'orange', '#fd7e14', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(15, 'yellow', '#ffc107', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(16, 'green', '#198754', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(17, 'teal', '#20c997', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(18, 'cyan', '#0dcaf0', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(19, 'soft-primary', '#61A6F0', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(20, 'soft-success', '#6ecb8e', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(21, 'soft-info', '#a0e4e4', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(22, 'soft-warning', '#fbd994', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(23, 'soft-danger', '#ff8bb4', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(24, 'soft-secondary', '#7987a1', '2023-07-28 18:26:52', '2023-07-28 18:26:52'),
(25, 'soft-light', '#f3f6f8', '2023-07-28 18:29:25', '2023-07-28 18:29:25'),
(26, 'soft-dark', '#3f4e66', '2023-07-28 18:29:25', '2023-07-28 18:29:25'),
(27, 'soft-blue', '#7fa7f9', '2023-07-28 18:29:25', '2023-07-28 18:29:25'),
(28, 'soft-indigo', '#a68df7', '2023-07-28 18:29:25', '2023-07-28 18:29:25'),
(29, 'soft-purple', '#a687c6', '2023-07-28 18:29:25', '2023-07-28 18:29:25'),
(30, 'soft-pink', '#e978ad', '2023-07-28 18:29:25', '2023-07-28 18:29:25'),
(31, 'soft-red', '#e09ca4', '2023-07-28 18:29:25', '2023-07-28 18:29:25'),
(32, 'soft-orange', '#fda16e', '2023-07-28 18:29:25', '2023-07-28 18:29:25'),
(33, 'soft-yellow', '#ffe0a4', '2023-07-28 18:29:25', '2023-07-28 18:29:25'),
(34, 'soft-green', '#9edb9f', '2023-07-28 18:29:25', '2023-07-28 18:29:25'),
(35, 'soft-teal', '#80d4bd', '2023-07-28 18:29:25', '2023-07-28 18:29:25'),
(36, 'soft-cyan', '#7ddef7', '2023-07-28 18:29:25', '2023-07-28 18:29:25'),
(37, 'white', '#fff', '2023-07-28 18:45:52', '2023-07-28 18:45:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `font_family`
--
ALTER TABLE `font_family`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tampilan`
--
ALTER TABLE `tampilan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `avatar_id` (`avatar_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `app`
--
ALTER TABLE `app`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `font_family`
--
ALTER TABLE `font_family`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tampilan`
--
ALTER TABLE `tampilan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `warna`
--
ALTER TABLE `warna`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`avatar_id`) REFERENCES `avatar` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
