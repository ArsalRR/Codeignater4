-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2023 pada 22.08
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan-batik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_karyawan`
--

CREATE TABLE `absensi_karyawan` (
  `id` int(11) NOT NULL,
  `id_karyawan` char(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_kerja` time NOT NULL,
  `tanggal_kerja` date NOT NULL,
  `jam_pulang` time NOT NULL,
  `slug` varchar(50) NOT NULL,
  `status_kehadiran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi_karyawan`
--

INSERT INTO `absensi_karyawan` (`id`, `id_karyawan`, `nama`, `posisi`, `jam_masuk`, `jam_kerja`, `tanggal_kerja`, `jam_pulang`, `slug`, `status_kehadiran`) VALUES
(26, 'K004', 'Eka', 'Karyawan Tetap', '04:03:00', '15:03:00', '2023-07-12', '14:00:00', 'k004', 'Hadir'),
(27, 'K001', 'Amira', 'Karyawan Tetap', '07:07:00', '10:11:00', '2023-07-10', '08:04:00', 'k001', 'Hadir'),
(28, 'K001', 'Amira', 'Karyawan Tetap', '05:08:00', '22:13:00', '2023-07-20', '03:10:00', 'k001', 'Hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(3, 'admin_produksi', 'admin_produksi'),
(4, 'Admin_gudang', 'admin_gudang'),
(5, 'admin_suplayer', 'admin_suplayer'),
(6, 'admin_pemesanan', 'admin_pemesanan'),
(7, 'admin_hr', 'admin_hr'),
(8, 'pemilik', 'pemilik'),
(9, 'master', 'master\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(3, 11),
(3, 11),
(4, 15),
(5, 12),
(6, 14),
(7, 13),
(8, 16),
(9, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'adminproduksi', NULL, '2023-06-25 01:15:51', 0),
(2, '::1', 'arasalrsal@gmil.com', 11, '2023-06-25 01:16:30', 1),
(3, '::1', 'arasalrsal@gmil.com', 11, '2023-06-25 01:17:21', 1),
(4, '::1', 'arasalrsal@gmil.com', 11, '2023-06-25 01:18:42', 1),
(5, '::1', 'adminsuplayer@gmil.com', 12, '2023-06-25 01:39:08', 1),
(6, '::1', 'adminhr@gmil.com', 13, '2023-06-25 01:42:18', 1),
(7, '::1', 'pemesanan@gmil.com', 14, '2023-06-25 01:46:07', 1),
(8, '::1', 'arasalrsal@gmil.com', 11, '2023-06-25 01:49:29', 1),
(9, '::1', 'pemesanan@gmil.com', 14, '2023-06-25 01:50:13', 1),
(10, '::1', 'arasalrsal@gmil.com', 11, '2023-06-25 01:53:27', 1),
(11, '::1', 'admingudang@gmil.com', 15, '2023-06-25 01:54:06', 1),
(12, '::1', 'adminsuplayer@gmil.com', 12, '2023-06-25 01:55:28', 1),
(13, '::1', 'pemesanan@gmil.com', 14, '2023-06-25 01:55:48', 1),
(14, '::1', 'adminhr@gmil.com', 13, '2023-06-25 01:56:15', 1),
(15, '::1', 'arasalrsal@gmil.com', 11, '2023-06-25 03:04:16', 1),
(16, '::1', 'arasalrsal@gmil.com', 11, '2023-06-25 03:37:46', 1),
(17, '::1', 'pemilik', NULL, '2023-06-25 03:43:19', 0),
(18, '::1', 'owner', NULL, '2023-06-25 03:43:31', 0),
(19, '::1', 'arasalrasal@gmil.com', 16, '2023-06-25 03:43:39', 1),
(20, '::1', 'arasalrasal@gmil.com', 16, '2023-06-25 03:52:15', 1),
(21, '::1', 'arasalrsal@gmil.com', 11, '2023-06-25 12:13:07', 1),
(22, '::1', 'arasalrsal@gmil.com', 11, '2023-06-26 05:30:06', 1),
(23, '::1', 'arasalrsal@gmil.com', 11, '2023-06-26 05:31:58', 1),
(24, '::1', 'admingudang@gmil.com', 15, '2023-06-26 05:32:14', 1),
(25, '::1', 'adminsuplayer@gmil.com', 12, '2023-06-26 05:32:31', 1),
(26, '::1', 'pemesanan@gmil.com', 14, '2023-06-26 05:32:50', 1),
(27, '::1', 'adminhr@gmil.com', 13, '2023-06-26 05:33:14', 1),
(28, '::1', 'arasalrsal@gmil.com', 11, '2023-06-26 09:59:42', 1),
(29, '::1', 'adminproduksi', NULL, '2023-06-26 10:02:26', 0),
(30, '::1', 'arasalrsal@gmil.com', 11, '2023-06-26 10:02:36', 1),
(31, '::1', 'arasalrsal@gmil.com', 11, '2023-06-27 07:49:46', 1),
(32, '::1', 'arasalrsal@gmil.com', 11, '2023-06-27 08:15:08', 1),
(33, '::1', 'adminhr@gmil.com', 13, '2023-06-27 08:16:05', 1),
(34, '::1', 'arasalrsal@gmil.com', 11, '2023-06-28 04:18:42', 1),
(35, '::1', 'arasalrsal@gmil.com', 11, '2023-07-05 09:17:49', 1),
(36, '::1', 'arasalrsal@gmil.com', 11, '2023-07-05 09:50:37', 1),
(37, '::1', 'adminhr@gmil.com', 13, '2023-07-05 09:50:58', 1),
(38, '::1', 'arsal', NULL, '2023-07-05 12:04:40', 0),
(39, '::1', 'arasalrsal@gmil.com', 11, '2023-07-05 12:04:49', 1),
(40, '::1', 'arasalrsal@gmil.com', 11, '2023-07-05 12:40:16', 1),
(41, '::1', 'arasalrsal@gmil.com', 11, '2023-07-05 12:40:50', 1),
(42, '::1', 'arasalrsal@gmil.com', 11, '2023-07-05 12:42:02', 1),
(43, '::1', 'arasalrsal@gmil.com', 11, '2023-07-05 12:45:16', 1),
(44, '::1', 'arasalrsal@gmil.com', 11, '2023-07-05 13:27:49', 1),
(45, '::1', 'arasalrsal@gmil.com', 11, '2023-07-05 13:28:58', 1),
(46, '::1', 'arasalrsal@gmil.com', 11, '2023-07-05 13:35:32', 1),
(47, '::1', 'admin', NULL, '2023-07-05 13:41:40', 0),
(48, '::1', 'admin', NULL, '2023-07-05 13:41:48', 0),
(49, '::1', 'pemesanan@gmil.com', 14, '2023-07-05 13:42:00', 1),
(50, '::1', 'arasalrsal@gmil.com', 11, '2023-07-05 13:42:59', 1),
(51, '::1', 'arasalrsal@gmil.com', 11, '2023-07-06 00:46:03', 1),
(52, '::1', 'adminhr@gmil.com', 13, '2023-07-06 01:01:37', 1),
(53, '::1', 'arasalrsal@gmil.com', 11, '2023-07-06 03:02:17', 1),
(54, '::1', 'arasalrsal@gmil.com', 11, '2023-07-06 06:52:22', 1),
(55, '::1', 'arasalrasal@gmil.com', 16, '2023-07-06 11:05:43', 1),
(56, '::1', 'adminsuplayer@gmil.com', 12, '2023-07-06 11:09:21', 1),
(57, '::1', 'arasalrasal@gmil.com', 16, '2023-07-06 11:12:52', 1),
(58, '::1', 'adminsuplayer@gmil.com', 12, '2023-07-06 14:59:02', 1),
(59, '::1', 'adminproduksi', NULL, '2023-07-06 15:21:49', 0),
(60, '::1', 'adminprodusi', NULL, '2023-07-06 15:21:57', 0),
(61, '::1', 'adminprodusi', NULL, '2023-07-06 15:22:05', 0),
(62, '::1', 'adminprodusi', NULL, '2023-07-06 15:22:26', 0),
(63, '::1', 'adminsuplayer@gmil.com', 12, '2023-07-06 15:22:33', 1),
(64, '::1', 'adminsuplyer', NULL, '2023-07-07 07:58:35', 0),
(65, '::1', 'adminsuplayer@gmil.com', 12, '2023-07-07 07:59:12', 1),
(66, '::1', 'adminsuplayer@gmil.com', 12, '2023-07-07 13:02:25', 1),
(67, '::1', 'adminsuplayer@gmil.com', 12, '2023-07-07 15:31:26', 1),
(68, '::1', 'adminsuplayer@gmil.com', 12, '2023-07-07 22:02:10', 1),
(69, '::1', 'adminsuplayer@gmil.com', 12, '2023-07-07 23:42:18', 1),
(70, '::1', 'pemesanan@gmil.com', 14, '2023-07-07 23:52:05', 1),
(71, '::1', 'adminsuplayer@gmil.com', 12, '2023-07-07 23:53:40', 1),
(72, '::1', 'arasalrsal@gmil.com', 11, '2023-07-08 00:00:37', 1),
(73, '::1', 'adminsuplayer@gmil.com', 12, '2023-07-08 01:15:46', 1),
(74, '::1', 'arasalrsal@gmil.com', 11, '2023-07-08 01:23:13', 1),
(75, '::1', 'adminsuplyer', NULL, '2023-07-08 03:11:05', 0),
(76, '::1', 'adminsuplayer@gmil.com', 12, '2023-07-08 03:11:15', 1),
(77, '::1', 'arasalrsal@gmil.com', 11, '2023-07-08 03:19:43', 1),
(78, '::1', 'adminsuplyer', NULL, '2023-07-08 03:27:15', 0),
(79, '::1', 'adminsuplayer@gmil.com', 12, '2023-07-08 03:27:22', 1),
(80, '::1', 'arasalrsal@gmil.com', 11, '2023-07-08 04:12:50', 1),
(81, '::1', 'arasalrsal@gmil.com', 11, '2023-07-08 06:29:44', 1),
(82, '::1', 'arasalrsal@gmil.com', 11, '2023-07-08 09:22:49', 1),
(83, '::1', 'pemesanan@gmil.com', 14, '2023-07-08 11:50:13', 1),
(84, '::1', 'arasalrsal@gmil.com', 11, '2023-07-08 11:54:17', 1),
(85, '::1', 'arasalrsal@gmil.com', 11, '2023-07-08 21:54:23', 1),
(86, '::1', 'arasalrsal@gmil.com', 11, '2023-07-08 22:43:15', 1),
(87, '::1', 'pemesanan@gmil.com', 14, '2023-07-09 01:16:31', 1),
(88, '::1', 'master@gmail.com', 17, '2023-07-09 01:32:54', 1),
(89, '::1', 'adminsuplayer@gmil.com', 12, '2023-07-09 04:30:50', 1),
(90, '::1', 'arasalrsal@gmil.com', 11, '2023-07-09 04:37:19', 1),
(91, '::1', 'arasalrsal@gmil.com', 11, '2023-07-09 04:44:34', 1),
(92, '::1', 'arasalrsal@gmil.com', 11, '2023-07-09 05:14:14', 1),
(93, '::1', 'arasalrsal@gmil.com', 11, '2023-07-09 07:53:26', 1),
(94, '::1', 'pemilik', NULL, '2023-07-09 08:23:32', 0),
(95, '::1', 'arasalrasal@gmil.com', 16, '2023-07-09 08:23:41', 1),
(96, '::1', 'arasalrsal@gmil.com', 11, '2023-07-09 08:37:54', 1),
(97, '::1', 'arsal', NULL, '2023-07-09 09:17:48', 0),
(98, '::1', 'arasalrsal@gmil.com', 11, '2023-07-09 09:17:55', 1),
(99, '::1', 'arasalrsal@gmil.com', 11, '2023-07-09 13:42:26', 1),
(100, '::1', 'admingudang@gmil.com', 15, '2023-07-09 21:09:27', 1),
(101, '::1', 'admingudang@gmil.com', 15, '2023-07-09 21:14:18', 1),
(102, '::1', 'arasalrsal@gmil.com', 11, '2023-07-10 03:01:59', 1),
(103, '::1', 'arasalrsal@gmil.com', 11, '2023-07-10 11:20:13', 1),
(104, '::1', 'adminhr@gmil.com', 13, '2023-07-10 13:41:30', 1),
(105, '::1', 'adminhr@gmil.com', 13, '2023-07-10 22:13:14', 1),
(106, '::1', 'arasalrsal@gmil.com', 11, '2023-07-10 23:17:27', 1),
(107, '::1', 'arasalrsal@gmil.com', 11, '2023-07-11 12:32:36', 1),
(108, '::1', 'master@gmail.com', 17, '2023-07-11 13:59:13', 1),
(109, '::1', 'master@gmail.com', 17, '2023-07-11 14:03:53', 1),
(110, '::1', 'master@gmail.com', 17, '2023-07-11 14:06:08', 1),
(111, '::1', 'pemilik', NULL, '2023-07-11 14:13:27', 0),
(112, '::1', 'pemilik', NULL, '2023-07-11 14:13:35', 0),
(113, '::1', 'pemilik', NULL, '2023-07-11 14:13:44', 0),
(114, '::1', 'arasalrasal@gmil.com', 16, '2023-07-11 14:14:01', 1),
(115, '::1', 'arasalrsal@gmil.com', 11, '2023-07-11 22:32:55', 1),
(116, '::1', 'arasalrsal@gmil.com', 11, '2023-07-12 03:05:16', 1),
(117, '::1', 'admin1', NULL, '2023-07-12 18:51:51', 0),
(118, '::1', 'admingudang', NULL, '2023-07-12 18:53:25', 0),
(119, '::1', 'admingudang@gmil.com', 15, '2023-07-12 18:55:09', 1),
(120, '::1', 'adminhr@gmil.com', 13, '2023-07-12 19:01:13', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-user', 'Manage All User'),
(2, 'manage-profile', 'Manage user\'s profile');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakeluar_gudang`
--

CREATE TABLE `datakeluar_gudang` (
  `idkeluar` int(11) NOT NULL,
  `id_produk` char(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `jumlahkeluar` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `harga` varchar(30) NOT NULL,
  `kondisi_produk` varchar(15) NOT NULL,
  `slug` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datakeluar_gudang`
--

INSERT INTO `datakeluar_gudang` (`idkeluar`, `id_produk`, `nama_produk`, `jumlahkeluar`, `tanggal_keluar`, `harga`, `kondisi_produk`, `slug`) VALUES
(21, '', 'Sandal', 2, '2023-07-18', '2000', 'Baik', ''),
(22, '', 'Sprei Batik', 2, '2023-07-14', '1000', 'Baik', ''),
(23, '', 'Sprei Batik', 10, '2023-07-21', '1000', 'Baik', ''),
(24, '', 'Sprei Batik', 2, '2023-07-11', '1000', 'Baik', ''),
(28, '', 'Peci', 150, '2023-07-07', '90000', 'Baik', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datamasuk_gudang`
--

CREATE TABLE `datamasuk_gudang` (
  `idmasuk` int(11) NOT NULL,
  `id_produk` char(11) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `jumlahmasuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `harga_satuan` varchar(15) NOT NULL,
  `kondisi_produk` varchar(10) NOT NULL,
  `slug` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datamasuk_gudang`
--

INSERT INTO `datamasuk_gudang` (`idmasuk`, `id_produk`, `nama_produk`, `jumlahmasuk`, `tanggal_masuk`, `harga_satuan`, `kondisi_produk`, `slug`) VALUES
(32, '', 'Sandal', 10, '2023-07-15', '1000', 'Baik', ''),
(34, '', 'Peci', 10, '2023-07-05', '90000', 'Baik', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id` int(11) NOT NULL,
  `id_karywan` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `slug` varchar(50) NOT NULL,
  `reward` bigint(9) NOT NULL,
  `gaji` bigint(9) NOT NULL,
  `total_gaji` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `id_karywan`, `nama`, `posisi`, `jenis_kelamin`, `alamat`, `status`, `slug`, `reward`, `gaji`, `total_gaji`) VALUES
(40, 'K001', 'Amira', 'Karyawan Tetap', 'Perempuan', 'LIMPUNG', 'Aktif', 'k001', 0, 1000000, ''),
(41, 'K003', 'Arum', 'Karyawan Tetap', 'Perempuan', 'Pemalang', 'Aktif', 'k003', 0, 2000000, ''),
(43, 'K004', 'Eka', 'Karyawan Tetap', 'Perempuan', 'Pemalang', 'Aktif', 'k004', 0, 3000000, ''),
(44, 'K005', 'Asta', 'Karyawan Tetap', 'Laki-laki', 'Pemalang', 'Aktif', 'k005', 0, 4000000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_karyawan12`
--

CREATE TABLE `data_karyawan12` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `gaji` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_karyawan12`
--

INSERT INTO `data_karyawan12` (`id`, `id_karyawan`, `nama`, `posisi`, `jenis_kelamin`, `alamat`, `status`, `slug`, `gaji`) VALUES
(12, 'DT-55', 'Yoga', 'Karyawan Tetap', 'Laki Laki', 'Limas', 'Aktive', 'dt-55', '500000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pembelian_supplier`
--

CREATE TABLE `data_pembelian_supplier` (
  `id` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nama_bahan` varchar(150) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pembelian_supplier`
--

INSERT INTO `data_pembelian_supplier` (`id`, `id_supplier`, `nama_bahan`, `jumlah`, `tgl_masuk`, `harga_satuan`, `total_harga`) VALUES
(10, 7, 'Kain Goni', 5, '2023-07-10', 120, 600);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_produksi`
--

CREATE TABLE `hasil_produksi` (
  `id` int(11) NOT NULL,
  `jumlah_produksi` int(11) NOT NULL,
  `jumlah_cacat` int(11) NOT NULL,
  `jumlah_sukses` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `id_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_produksi`
--

CREATE TABLE `jadwal_produksi` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `tgl_ml_pd` date NOT NULL,
  `tgl_sl_pd` date NOT NULL,
  `slug` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_produksi`
--

INSERT INTO `jadwal_produksi` (`id`, `nama_produk`, `tgl_ml_pd`, `tgl_sl_pd`, `slug`) VALUES
(1, 'Baju Batik', '2023-07-11', '2023-07-14', 'baju-batik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelola_pesanan`
--

CREATE TABLE `kelola_pesanan` (
  `id_produk` varchar(50) NOT NULL,
  `invoice` varchar(60) NOT NULL,
  `pelangan` varchar(60) NOT NULL,
  `produk` varchar(60) NOT NULL,
  `harga` varchar(60) NOT NULL,
  `qty` varchar(60) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelola_pesanan`
--

INSERT INTO `kelola_pesanan` (`id_produk`, `invoice`, `pelangan`, `produk`, `harga`, `qty`, `satuan`, `status`, `create_at`) VALUES
('B-187', 'MKLll', 'Dimas', 'Gamis', '40.000', '2', '2', 'Terkonfirmasi', '2023-03-30 02:57:15'),
('B-188', 'MKLT', 'Ahmad', 'Batik Pranggok', '500000', '1', '1', 'Terkonfirmasi', '2023-07-01 05:47:00'),
('B-189', 'MKLM', 'Satria', 'Sarung', '80000', '2', '2', 'Terkonfirmasi', '2023-07-01 05:05:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kinerja_karyawan`
--

CREATE TABLE `kinerja_karyawan` (
  `id` int(11) NOT NULL,
  `id_karyawan` char(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hasil_kerja` enum('SB','B','K') NOT NULL,
  `pengetahuan_pekerjaan` enum('SB','B','K') NOT NULL,
  `disiplin_absensi` enum('SB','B','K') NOT NULL,
  `total` varchar(11) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kinerja_karyawan`
--

INSERT INTO `kinerja_karyawan` (`id`, `id_karyawan`, `nama`, `hasil_kerja`, `pengetahuan_pekerjaan`, `disiplin_absensi`, `total`, `slug`) VALUES
(16, 'K0003', 'ARUM', 'B', 'B', 'B', 'B', 'k0003'),
(17, 'K003', 'Eko', 'SB', 'SB', 'SB', 'SB', 'k003'),
(18, 'K002', 'Arum', 'SB', 'SB', 'SB', 'SB', 'k002'),
(19, 'K004', 'Eka', 'SB', 'B', 'B', 'B', 'k004'),
(20, 'K005', 'Asta', 'B', 'B', 'B', 'B', 'k005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_pesanan` varchar(20) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_karyawan`
--

CREATE TABLE `laporan_karyawan` (
  `id` int(11) NOT NULL,
  `id_karyawan` char(30) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `kehadiran` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_produksi`
--

CREATE TABLE `laporan_produksi` (
  `id` int(11) NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `id_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1673576798, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nomor_pesanan`
--

CREATE TABLE `nomor_pesanan` (
  `id_pesanan` varchar(20) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `nama_pelanggan` text NOT NULL,
  `total_harga` int(11) NOT NULL,
  `alamat_tujuan` varchar(50) NOT NULL,
  `ekspedisi` varchar(30) NOT NULL,
  `tgl_pengiriman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nomor_pesanan`
--

INSERT INTO `nomor_pesanan` (`id_pesanan`, `tgl_pesanan`, `nama_pelanggan`, `total_harga`, `alamat_tujuan`, `ekspedisi`, `tgl_pengiriman`) VALUES
('B-188', '2023-07-01', 'Ahmad', 500000, 'Pekalongan', 'POS INDONESIA', '2023-07-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_gudang`
--

CREATE TABLE `stok_gudang` (
  `id_stok` int(11) NOT NULL,
  `id_produk` char(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `jumlahmasuk` int(11) NOT NULL,
  `jumlahkeluar` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `kondisi_produk` varchar(11) NOT NULL,
  `harga_satuan` char(15) NOT NULL,
  `slug` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok_gudang`
--

INSERT INTO `stok_gudang` (`id_stok`, `id_produk`, `nama_produk`, `jumlahmasuk`, `jumlahkeluar`, `tanggal_masuk`, `tanggal_keluar`, `kondisi_produk`, `harga_satuan`, `slug`) VALUES
(2, 'KG01', 'Sprei Batik', 100, 60, '2023-02-09', '2023-02-12', 'Baik', '150000', 0),
(19, 'KG02', 'Sandal', 2990, 32, '2023-06-02', '2023-06-10', 'Baik', '250000', 0),
(42, '', 'Peci', 110, 240, '2023-07-01', '2023-07-07', 'Baik', '55000', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kode_supplier` char(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `kode_supplier`, `nama`, `no_hp`, `alamat`) VALUES
(7, '132', 'Rizki', '0987', 'Bandengan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'arasalrsal@gmil.com', 'adminproduksi', '$2y$10$t7mpzdh04X8XaeGjMMbHR.iuCTNPkmSJGw3ZqzkPwAUhCP.ePIWg.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-25 01:16:14', '2023-06-25 01:16:14', NULL),
(12, 'adminsuplayer@gmil.com', 'adminsuplayer', '$2y$10$4S1G62MDMf6.47GB2eWGkumYZHbmmMZ1Pae50k8Ql1FvfYUUziTvi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-25 01:36:49', '2023-06-25 01:36:49', NULL),
(13, 'adminhr@gmil.com', 'adminhr', '$2y$10$4oWP3uM2aDI2cb0l2PCqZu0cCvmmI6hIFKqhiesXcG36dK7kEd8pe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-25 01:41:17', '2023-06-25 01:41:17', NULL),
(14, 'pemesanan@gmil.com', 'adminpemesanan', '$2y$10$Qh9sYQIaLdBBz3M4JVaCRuOeSxedoyEtGJZDmu5PDdouCrh/C.wQ2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-25 01:45:41', '2023-06-25 01:45:41', NULL),
(15, 'admingudang@gmil.com', 'admingudang', '$2y$10$l7PTg2QjuDxV8PbkVlWmZuoMbCafOa/Tz5PKPP6XFupXMB0c2spny', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-25 01:48:12', '2023-06-25 01:48:12', NULL),
(16, 'arasalrasal@gmil.com', 'owner', '$2y$10$zcDoCT6lT0p4RGyHtWP9MO1AfQ3.aucemQmcQ/FRFd2K3mTmq7eMi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-25 03:40:24', '2023-06-25 03:40:24', NULL),
(17, 'master@gmail.com', 'master', '$2y$10$j7s8LDPVfAWvJGM3mdywSeF3sZQniRSIhlFHy6qamoSPTAiTVM39.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-09 01:32:44', '2023-07-09 01:32:44', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi_karyawan`
--
ALTER TABLE `absensi_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `datakeluar_gudang`
--
ALTER TABLE `datakeluar_gudang`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indeks untuk tabel `datamasuk_gudang`
--
ALTER TABLE `datamasuk_gudang`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indeks untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_karyawan12`
--
ALTER TABLE `data_karyawan12`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pembelian_supplier`
--
ALTER TABLE `data_pembelian_supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_pembelian_supplier_ibfk_1` (`id_supplier`);

--
-- Indeks untuk tabel `hasil_produksi`
--
ALTER TABLE `hasil_produksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `jadwal_produksi`
--
ALTER TABLE `jadwal_produksi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_produk` (`nama_produk`);

--
-- Indeks untuk tabel `kelola_pesanan`
--
ALTER TABLE `kelola_pesanan`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `kinerja_karyawan`
--
ALTER TABLE `kinerja_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `laporan_karyawan`
--
ALTER TABLE `laporan_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_produksi`
--
ALTER TABLE `laporan_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nomor_pesanan`
--
ALTER TABLE `nomor_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `stok_gudang`
--
ALTER TABLE `stok_gudang`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_supplier` (`kode_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi_karyawan`
--
ALTER TABLE `absensi_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `datakeluar_gudang`
--
ALTER TABLE `datakeluar_gudang`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `datamasuk_gudang`
--
ALTER TABLE `datamasuk_gudang`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `data_karyawan12`
--
ALTER TABLE `data_karyawan12`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `data_pembelian_supplier`
--
ALTER TABLE `data_pembelian_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `hasil_produksi`
--
ALTER TABLE `hasil_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_produksi`
--
ALTER TABLE `jadwal_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kinerja_karyawan`
--
ALTER TABLE `kinerja_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `laporan_karyawan`
--
ALTER TABLE `laporan_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan_produksi`
--
ALTER TABLE `laporan_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `stok_gudang`
--
ALTER TABLE `stok_gudang`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_pembelian_supplier`
--
ALTER TABLE `data_pembelian_supplier`
  ADD CONSTRAINT `data_pembelian_supplier_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
