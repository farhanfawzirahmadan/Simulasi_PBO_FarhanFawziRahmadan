-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 02:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti1c_farhanfawzirahmdan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMA Negeri 1 Cilacap', '85.50', '200000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMK Negeri 2 Cilacap', '78.00', '200000.00', 'Reguler', 'Teknik Mesin', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMA Negeri 3 Cilacap', '90.25', '200000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(4, 'Dewi Sartika', 'MAN 1 Cilacap', '82.10', '200000.00', 'Reguler', 'Akuntansi', 'Kampus 2', NULL, NULL, NULL, NULL),
(5, 'Eko Prasetyo', 'SMA Negeri 1 Maos', '75.40', '200000.00', 'Reguler', 'Teknik Elektro', 'Kampus Utama', NULL, NULL, NULL, NULL),
(6, 'Fajar Sidik', 'SMK Komputama Jeruklegi', '88.00', '200000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gita Gutawa', 'SMA Negeri 2 Majenang', '81.15', '200000.00', 'Reguler', 'Akuntansi', 'Kampus 2', NULL, NULL, NULL, NULL),
(8, 'Hendra Wijaya', 'SMA Negeri 1 Cilacap', '92.00', '200000.00', 'Prestasi', NULL, NULL, 'Sains (Olimpiade Fisika)', 'Nasional', NULL, NULL),
(9, 'Indah Permata', 'SMA Negeri 3 Cilacap', '89.50', '200000.00', 'Prestasi', NULL, NULL, 'Olahraga (Basket)', 'Provinsi', NULL, NULL),
(10, 'Joko Tingkir', 'SMK Negeri 1 Cilacap', '86.00', '200000.00', 'Prestasi', NULL, NULL, 'LKS Web Technologies', 'Nasional', NULL, NULL),
(11, 'Kurniawati', 'MAN 2 Cilacap', '94.10', '200000.00', 'Prestasi', NULL, NULL, 'Hafizh Qur\'an 10 Juz', 'Kabupaten', NULL, NULL),
(12, 'Laksana Tri', 'SMA Negeri 1 Kroya', '87.30', '200000.00', 'Prestasi', NULL, NULL, 'Seni Musik (Gitar)', 'Provinsi', NULL, NULL),
(13, 'Mega Utami', 'SMA Negeri 1 Sidareja', '91.00', '200000.00', 'Prestasi', NULL, NULL, 'Karya Ilmiah Remaja', 'Nasional', NULL, NULL),
(14, 'Naufal Abdi', 'SMK Dr. Soetomo Cilacap', '85.20', '200000.00', 'Prestasi', NULL, NULL, 'Olahraga (Pencak Silat)', 'Kabupaten', NULL, NULL),
(15, 'Oki Lukman', 'SMA Negeri 1 Cilacap', '88.50', '250000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD-2026-001', 'Dinas Kominfo Cilacap'),
(16, 'Putri Rahayu', 'SMA Negeri 3 Cilacap', '91.75', '250000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD-2026-002', 'Bappeda Cilacap'),
(17, 'Qori Sandi', 'MAN 1 Cilacap', '84.00', '250000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD-2026-003', 'Dinas Perhubungan'),
(18, 'Riyan Hidayat', 'SMA Negeri 2 Cilacap', '86.90', '250000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD-2026-004', 'Dinas Pendidikan'),
(19, 'Siti Aminah', 'SMA Negeri 1 Maos', '93.00', '250000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD-2026-005', 'Setda Cilacap'),
(20, 'Taufik Hidayat', 'SMK Negeri 2 Cilacap', '83.45', '250000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-IKD-2026-006', 'Dinas Kesehatan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
