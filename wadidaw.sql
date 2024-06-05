-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 02:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uprak_dava_rizky`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_lengkap`, `alamat`, `no_hp`, `username`, `password`) VALUES
(1, 'AHMAD SAEFUDIN', 'CILEGONG', '081212342781', 'ahmadsaefudin', 'ahma1234'),
(2, 'WINARTI', 'CIBATU', '081212342774', 'winarti', 'wina1234'),
(3, 'setiawati', 'CITALANG', '081212342896', 'setiawati', 'seti1234'),
(4, 'HANA SINTA', 'CIMAUNG', '081212342896', 'hanasinta', 'hana1234');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `kode_jurusan` varchar(10) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `kode_jurusan`, `deskripsi`) VALUES
(1, 'RPL', 'REKAYASA PERANGKAT LUNAK'),
(2, 'TKRO', 'TEKNIK KENDARAAN RINGAN OTOMOTIF'),
(3, 'TP', 'TEKNIK PEMESINAN'),
(4, 'Akuntansi', 'Akuntansi'),
(8, 'PPLG', 'KOMPUTER'),
(9, 'Otomotif', 'OTOMOTIF'),
(10, 'Kimia Indu', 'Kimia Industri');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `tingkat` enum('10','11','12') DEFAULT NULL,
  `jurusan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kode_kelas`, `tingkat`, `jurusan_id`) VALUES
(1, 'X-RPL', '10', 1),
(2, 'XI-AK', '11', 1),
(3, 'XII-RPL', '12', 1),
(5, 'X-TKRO-2', '10', 2),
(6, 'XI-TKRO-1', '11', 2),
(7, 'XI-TKRO-2', '11', 2),
(8, 'XII-TKRO-1', '12', 2),
(9, 'XII-TKRO-2', '12', 2),
(10, 'X-TP', '10', 3),
(11, 'XI-TP', '11', 3),
(12, 'XII-TP', '12', 3),
(13, 'XI-RPL', '11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_transaksi` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nis` bigint(20) DEFAULT NULL,
  `bulan_tagihan` int(11) DEFAULT NULL,
  `tahun_tagihan` year(4) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`no_transaksi`, `tanggal`, `nis`, `bulan_tagihan`, `tahun_tagihan`, `admin_id`) VALUES
('SPP-2024-001', '2024-01-30', 22001001, 1, '2024', 1),
('SPP-2024-002', '2024-01-19', 22001002, 1, '2024', 3),
('SPP-2024-003', '2024-01-15', 22001003, 1, '2024', 4),
('SPP-2024-004', '2024-01-18', 22001004, 1, '2024', 1),
('SPP-2024-005', '2024-01-23', 22001005, 1, '2024', 1),
('SPP-2024-006', '2024-01-18', 22001006, 1, '2024', 1),
('SPP-2024-007', '2024-01-18', 22001007, 1, '2024', 4),
('SPP-2024-008', '2024-01-19', 22001010, 1, '2024', 4),
('SPP-2024-009', '2024-02-23', 22001003, 2, '2024', 3),
('SPP-2024-010', '2024-02-15', 22001004, 2, '2024', 3),
('SPP-2024-011', '2024-02-09', 22001005, 2, '2024', 1),
('SPP-2024-012', '2024-02-25', 22001006, 2, '2024', 2),
('SPP-2024-013', '2024-02-09', 22001007, 2, '2024', 1),
('SPP-2024-014', '2024-02-06', 22001008, 2, '2024', 2),
('SPP-2024-015', '2024-02-01', 22001009, 2, '2024', 4),
('SPP-2024-016', '2024-02-17', 22001010, 2, '2024', 4),
('SPP-2024-017', '2024-03-07', 22001001, 3, '2024', 4),
('SPP-2024-018', '2024-03-28', 22001002, 3, '2024', 4),
('SPP-2024-019', '2024-03-08', 22001003, 3, '2024', 4),
('SPP-2024-020', '2024-03-05', 22001004, 3, '2024', 1),
('SPP-2024-021', '2024-03-18', 22001005, 3, '2024', 1),
('SPP-2024-022', '2024-03-10', 22001006, 3, '2024', 3),
('SPP-2024-023', '2024-03-26', 22001007, 3, '2024', 1),
('SPP-2024-024', '2024-03-08', 22001008, 3, '2024', 1),
('SPP-2024-025', '2024-03-25', 22001009, 3, '2024', 1),
('SPP-2024-026', '2024-03-02', 22001010, 3, '2024', 1),
('SPP-2024-027', '2024-04-06', 22001001, 4, '2024', 1),
('SPP-2024-028', '2024-04-15', 22001002, 4, '2024', 4),
('SPP-2024-029', '2024-04-29', 22001003, 4, '2024', 2),
('SPP-2024-030', '2024-04-27', 22001004, 4, '2024', 3),
('SPP-2024-031', '2024-04-15', 22001005, 4, '2024', 4),
('SPP-2024-032', '2024-04-16', 22001006, 4, '2024', 1),
('SPP-2024-033', '2024-04-30', 22001007, 4, '2024', 3),
('SPP-2024-034', '2024-04-28', 22001008, 4, '2024', 4),
('SPP-2024-035', '2024-04-02', 22001009, 4, '2024', 1),
('SPP-2024-036', '2024-04-21', 22001010, 4, '2024', 4),
('SPP-2024-037', '2024-05-25', 22001001, 5, '2024', 4),
('SPP-2024-038', '2024-05-16', 22001002, 5, '2024', 4),
('SPP-2024-039', '2024-05-03', 22001005, 5, '2024', 1),
('SPP-2024-040', '2024-05-05', 22001006, 5, '2024', 1),
('SPP-2024-041', '2024-05-22', 22001007, 5, '2024', 4),
('SPP-2024-042', '2024-05-05', 22001008, 5, '2024', 4),
('SPP-2024-043', '2024-05-07', 22001009, 5, '2024', 3),
('SPP-2024-044', '2024-05-23', 22001010, 5, '2024', 1),
('SPP-2024-045', '2024-06-16', 22001004, 6, '2024', 2),
('SPP-2024-046', '2024-06-05', 22001005, 6, '2024', 3),
('SPP-2024-047', '2024-06-09', 22001006, 6, '2024', 2),
('SPP-2024-048', '2024-06-24', 22001007, 6, '2024', 4),
('SPP-2024-049', '2024-06-23', 22001008, 6, '2024', 1),
('SPP-2024-050', '2024-06-04', 22001009, 6, '2024', 4);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` bigint(20) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `spp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_lengkap`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_hp`, `kelas_id`, `spp_id`) VALUES
(23, 'Dava Rizky', NULL, 'P', 'CISEREUH', NULL, 1, 4),
(202, 'Ahmad Dhani', NULL, NULL, 'CIMAUNG', NULL, 3, 6),
(2023, 'DANZ', '0000-00-00', 'L', 'CIMAUNG', NULL, 2, 6),
(2027, 'rexi', NULL, 'L', 'CISEREUH', NULL, 1, 4),
(22001001, 'SANTI RIMA', '2000-06-18', 'L', 'CIWANGI', '08121234495', 12, 3),
(22001002, 'SATRIA MELATI', '2000-07-04', 'P', 'CIMANUK', '08121234404', 3, 3),
(22001003, 'SANTI HANA', '2000-05-04', 'L', 'CITALANG', '08121234471', 11, 4),
(22001004, 'SATRIA MELATI', '2000-08-14', 'P', 'CIMANUK', '08121234417', 10, 5),
(22001005, 'RADEN SINTA', '2000-01-12', 'L', 'CISEUREUH', '08121234472', 1, 5),
(22001006, 'SANTI LASMI', '2000-11-01', 'P', 'CIMAUNG', '08121234450', 4, 5),
(22001007, 'MUMUN MELATI', '2000-11-23', 'P', 'CIMAUNG', '08121234486', 1, 5),
(22001008, 'SANTI KENZO', '2000-01-19', 'P', 'CISEUREUH', '08121234406', 8, 3),
(22001009, 'MUMUN LASMI', '2000-11-06', 'P', 'CISEUREUH', '08121234457', 11, 4),
(22001010, 'MALA LASMI', '2000-11-24', 'P', 'CITALANG', '08121234499', 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id` int(11) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `nominal` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id`, `tahun`, `nominal`) VALUES
(1, '2004', 10000),
(2, '2020', 150000),
(3, '2021', 175000),
(4, '2022', 200000),
(5, '2023', 225000),
(6, '2024', 250000),
(7, '2004', 250000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
