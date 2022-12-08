-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2022 at 05:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anak`
--

CREATE TABLE `tb_anak` (
  `id_pengajuan_anak` int(3) NOT NULL,
  `nik_user` char(16) NOT NULL,
  `kode_poli` enum('A') NOT NULL,
  `nama` varchar(30) NOT NULL,
  `umur` char(3) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `keluhan_anak` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anak`
--

INSERT INTO `tb_anak` (`id_pengajuan_anak`, `nik_user`, `kode_poli`, `nama`, `umur`, `alamat`, `keluhan_anak`) VALUES
(3, '000', 'A', 'wef', 'ter', 'yrty', 'yrt'),
(5, '000', 'A', 'yhty', 're', 'yu', 'rtyr');

-- --------------------------------------------------------

--
-- Table structure for table `tb_antrian_keluar`
--

CREATE TABLE `tb_antrian_keluar` (
  `nomor_antrian` varchar(10) NOT NULL,
  `id_pengajuan` int(3) NOT NULL,
  `kode_poli` enum('A','B','C') NOT NULL,
  `nik_user` char(16) NOT NULL,
  `file_antrian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_antrian_keluar`
--

INSERT INTO `tb_antrian_keluar` (`nomor_antrian`, `id_pengajuan`, `kode_poli`, `nik_user`, `file_antrian`) VALUES
('A - 01', 3, 'A', '000', '3-azzam.pdf'),
('A - 02', 4, 'A', '000', '4-azzam.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id_jadwal` int(3) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `kode_poli` enum('A','B','C') NOT NULL,
  `jenis_poli` varchar(15) NOT NULL,
  `hari_kerja` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id_pengajuan_lab` int(3) NOT NULL,
  `nik_user` char(16) NOT NULL,
  `kode_poli` enum('C') NOT NULL,
  `nama` varchar(30) NOT NULL,
  `umur` int(3) NOT NULL,
  `alamat` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_pengajuan` int(3) NOT NULL,
  `nik_user` char(16) NOT NULL,
  `kode_poli` enum('A','B','C') NOT NULL,
  `waktu_pengajuan` datetime NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `status_pengajuan` enum('Di Terima','Di Tolak','Menunggu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `nik_user`, `kode_poli`, `waktu_pengajuan`, `keluhan`, `status_pengajuan`) VALUES
(3, '000', 'A', '2022-04-18 21:37:00', 'yrt', 'Di Terima'),
(4, '000', 'A', '2022-04-18 22:03:43', 'rtyr', 'Di Terima'),
(5, '000', 'A', '2022-04-18 22:05:03', 'rtyr', 'Di Tolak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_poli`
--

CREATE TABLE `tb_poli` (
  `kode_poli` enum('A','B','C') NOT NULL,
  `jenis_poli` varchar(15) NOT NULL,
  `antrian_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_poli`
--

INSERT INTO `tb_poli` (`kode_poli`, `jenis_poli`, `antrian_keluar`) VALUES
('A', 'Poli Anak', 2),
('B', 'Poli Umum', 0),
('C', 'Laboratorium', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_umum`
--

CREATE TABLE `tb_umum` (
  `id_pengajuan_umum` int(11) NOT NULL,
  `nik_user` char(16) NOT NULL,
  `kode_poli` enum('B') NOT NULL,
  `nama` varchar(30) NOT NULL,
  `umur` char(3) NOT NULL,
  `alamat` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `nik` char(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `sandi` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`nik`, `nama`, `no_hp`, `sandi`) VALUES
('000', 'azzam', '000', '000'),
('1234567891012345', 'kharisma intan', '085733674996', 'kharisma'),
('admin', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anak`
--
ALTER TABLE `tb_anak`
  ADD PRIMARY KEY (`id_pengajuan_anak`),
  ADD KEY `nik_user` (`nik_user`),
  ADD KEY `kode_poli` (`kode_poli`);

--
-- Indexes for table `tb_antrian_keluar`
--
ALTER TABLE `tb_antrian_keluar`
  ADD PRIMARY KEY (`nomor_antrian`),
  ADD KEY `id_pengajuan` (`id_pengajuan`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `kode_poli` (`kode_poli`);

--
-- Indexes for table `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD PRIMARY KEY (`id_pengajuan_lab`),
  ADD KEY `kode_poli` (`kode_poli`),
  ADD KEY `nik_user` (`nik_user`);

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `nik_user` (`nik_user`),
  ADD KEY `kode_poli` (`kode_poli`);

--
-- Indexes for table `tb_poli`
--
ALTER TABLE `tb_poli`
  ADD PRIMARY KEY (`kode_poli`);

--
-- Indexes for table `tb_umum`
--
ALTER TABLE `tb_umum`
  ADD PRIMARY KEY (`id_pengajuan_umum`),
  ADD KEY `nik_user` (`nik_user`),
  ADD KEY `kode_poli` (`kode_poli`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anak`
--
ALTER TABLE `tb_anak`
  MODIFY `id_pengajuan_anak` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id_jadwal` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_lab`
--
ALTER TABLE `tb_lab`
  MODIFY `id_pengajuan_lab` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_umum`
--
ALTER TABLE `tb_umum`
  MODIFY `id_pengajuan_umum` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anak`
--
ALTER TABLE `tb_anak`
  ADD CONSTRAINT `tb_anak_ibfk_1` FOREIGN KEY (`id_pengajuan_anak`) REFERENCES `tb_pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anak_ibfk_2` FOREIGN KEY (`kode_poli`) REFERENCES `tb_poli` (`kode_poli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anak_ibfk_3` FOREIGN KEY (`nik_user`) REFERENCES `tb_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_antrian_keluar`
--
ALTER TABLE `tb_antrian_keluar`
  ADD CONSTRAINT `tb_antrian_keluar_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `tb_pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`kode_poli`) REFERENCES `tb_poli` (`kode_poli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD CONSTRAINT `tb_lab_ibfk_1` FOREIGN KEY (`id_pengajuan_lab`) REFERENCES `tb_pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_lab_ibfk_2` FOREIGN KEY (`kode_poli`) REFERENCES `tb_poli` (`kode_poli`),
  ADD CONSTRAINT `tb_lab_ibfk_3` FOREIGN KEY (`nik_user`) REFERENCES `tb_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD CONSTRAINT `tb_pengajuan_ibfk_1` FOREIGN KEY (`kode_poli`) REFERENCES `tb_poli` (`kode_poli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengajuan_ibfk_2` FOREIGN KEY (`nik_user`) REFERENCES `tb_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_umum`
--
ALTER TABLE `tb_umum`
  ADD CONSTRAINT `tb_umum_ibfk_1` FOREIGN KEY (`id_pengajuan_umum`) REFERENCES `tb_pengajuan` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_umum_ibfk_2` FOREIGN KEY (`kode_poli`) REFERENCES `tb_poli` (`kode_poli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_umum_ibfk_3` FOREIGN KEY (`nik_user`) REFERENCES `tb_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
