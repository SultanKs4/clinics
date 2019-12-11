-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2019 at 01:16 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinics`
--
CREATE DATABASE IF NOT EXISTS `clinics` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `clinics`;

-- --------------------------------------------------------

--
-- Table structure for table `dataAdmin`
--

CREATE TABLE `dataAdmin` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dataAdmin`
--

INSERT INTO `dataAdmin` (`id`, `nip`, `nama`, `password`) VALUES
(1, '1841720019', 'Sultan Achmad Qum', '0c2b96a2854aebc2f39326e0d634719f'),
(2, '1841720184', 'Yusril', 'b577a9b492e79755d31b62b40ee44c16'),
(3, '1841720085', 'Azmi', '2251df3b7a7c55657526155222d2743a');

-- --------------------------------------------------------

--
-- Table structure for table `dataAntrian`
--

CREATE TABLE `dataAntrian` (
  `id` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `puskesmas` int(11) NOT NULL,
  `poli` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `antrian` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dataAntrian`
--

INSERT INTO `dataAntrian` (`id`, `nik`, `puskesmas`, `poli`, `tanggal`, `antrian`) VALUES
(1, 2, 5, 2, '2019-12-03', 'GI-001');

-- --------------------------------------------------------

--
-- Table structure for table `dataPasien`
--

CREATE TABLE `dataPasien` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bpjs` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggalLahir` date NOT NULL,
  `jenisKelamin` int(11) NOT NULL,
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusPasien` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dataPasien`
--

INSERT INTO `dataPasien` (`id`, `nik`, `bpjs`, `nama`, `tanggalLahir`, `jenisKelamin`, `no_hp`, `alamat`, `statusPasien`, `password`) VALUES
(1, '350731234124412', '', 'Sultan Achmad Qum', '1999-11-08', 1, '', 'sawojajar I C3-F8', 2, '098f6bcd4621d373cade4e832627b4f6'),
(2, '6351641624612', '', 'asdasd', '2019-12-02', 2, '', 'jdansjdnasjdnadsjads', 2, '098f6bcd4621d373cade4e832627b4f6'),
(3, '3507240811990006', '491411213124123', 'Sultan Achmad Qum Masykuro NS', '1999-11-08', 1, '+62877394941570', 'Perumahan BLKI Singosari No.40', 1, '9af82031d374b97c9e73132a413cbdf5'),
(4, '3507241511650001231', '2313124123123', 'Sultan Achmad Qum Masykuro NS', '1999-08-11', 2, '+62877394941570', 'Perumahan BLKI Singosari No.40', 1, '81dc9bdb52d04dc20036dbd8313ed055'),
(5, '7263712731212', '873827323123', 'falaah', '2000-08-11', 1, '086521312412', 'lalalalala', 1, '827ccb0eea8a706c4c34a16891f84e7b'),
(6, '1234', '88312331', 'elok', '2000-02-02', 2, '028318381381', 'jdajdsajkdas', 1, '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `dataPoli`
--

CREATE TABLE `dataPoli` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dataPoli`
--

INSERT INTO `dataPoli` (`id`, `nama`) VALUES
(1, 'Poli Umum'),
(2, 'Poli Gigi'),
(3, 'Poli Gizi'),
(4, 'Poli KIA');

-- --------------------------------------------------------

--
-- Table structure for table `dataPuskesmas`
--

CREATE TABLE `dataPuskesmas` (
  `idPuskesmas` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longtitude` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dataPuskesmas`
--

INSERT INTO `dataPuskesmas` (`idPuskesmas`, `nama`, `alamat`, `latitude`, `longtitude`, `telp`, `jenis`) VALUES
(1, 'Puskesmas Kedungkandang', 'Jl. Ki Ageng Gribig No.142', '-7.993113', '112.648131', '(0341) 710112 ', 1),
(2, 'Puskesmas Gribig', 'Jl. Ki Ageng Gribig No.97', '', '', '(0341) 718165', 2),
(3, 'Puskesmas Arjowinangun', 'Jl. Raya Arjowinangun No. 2', '', '', '(0341) 751398', 2),
(4, 'Puskesmas Janti', 'Jl. Janti Barat No.88, Sukun', '', '', '(0341) 352203', 2),
(5, 'Puskesmas Ciptomulyo', 'Jl. Kol. Sugiyono VIII No.54, Sukun', '', '', '(0341) 329918', 2),
(6, 'Puskesmas Mulyorejo', 'Jl. Budi Utomo No.18A, Sukun', '', '', '(0341) 580955', 2),
(7, 'Puskesmas Arjuno', 'Jl. Arjuno No.17, Klojen', '', '', '(0341) 396339', 2),
(8, 'Puskesmas Bareng', 'Jl. Bareng Tebes No.10A, Klojen', '', '', '(0341) 322280', 2),
(9, 'Puskesmas Rampal Celaket', 'Jl. Simpang Kasembon No.5, Klojen', '', '', '(0341) 356380', 2),
(10, 'Puskesmas Kendalkerep', 'Jl. Sulfat No.100, Blimbing', '', '', '(0341) 484477', 1),
(11, 'Puskesmas Cisadea', 'Jl. Cisadea No.19, Blimbing', '', '', '(0341) 489540', 2),
(12, 'Puskesmas Pandanwangi', 'Jl. LA. Sucipto No.315, Blimbing', '', '', '(0341) 484472', 2),
(13, 'Puskesmas Dinoyo', 'Jl. Keramik No.2, Lowokwaru', '', '', '(0341) 581442', 1),
(14, 'Puskesmas Kendalsari', 'Jl. Cengger Ayam No.8, Lowokwaru', '', '', '(0341) 478215', 1),
(15, 'Puskesmas Mojolangu', 'Jl. Sudimoro No.17A, Lowokwaru', '', '', '(0341) 482905', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detailPuskesmas`
--

CREATE TABLE `detailPuskesmas` (
  `idDetail` int(11) NOT NULL,
  `idPuskesmas` int(11) NOT NULL,
  `idPoli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailPuskesmas`
--

INSERT INTO `detailPuskesmas` (`idDetail`, `idPuskesmas`, `idPoli`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 3),
(8, 2, 4),
(9, 3, 1),
(10, 3, 2),
(11, 3, 3),
(12, 3, 4),
(13, 4, 1),
(14, 4, 2),
(15, 4, 3),
(16, 4, 4),
(17, 5, 1),
(18, 5, 2),
(19, 5, 3),
(20, 5, 4),
(21, 6, 1),
(22, 6, 2),
(23, 6, 3),
(24, 6, 4),
(25, 7, 1),
(26, 7, 2),
(27, 7, 3),
(28, 7, 4),
(29, 8, 1),
(30, 8, 2),
(31, 8, 3),
(32, 8, 4),
(33, 9, 1),
(34, 9, 2),
(35, 9, 3),
(36, 9, 4),
(37, 10, 1),
(38, 10, 2),
(39, 10, 3),
(40, 10, 4),
(41, 11, 1),
(42, 11, 2),
(43, 11, 3),
(44, 11, 4),
(45, 12, 1),
(46, 12, 2),
(47, 12, 3),
(48, 12, 4),
(49, 13, 1),
(50, 13, 2),
(51, 13, 3),
(52, 13, 4),
(53, 14, 1),
(54, 14, 2),
(55, 14, 3),
(56, 14, 4),
(57, 15, 1),
(58, 15, 2),
(59, 15, 3),
(60, 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `jenisKelamin`
--

CREATE TABLE `jenisKelamin` (
  `id` int(11) NOT NULL,
  `jenisKelamin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenisKelamin`
--

INSERT INTO `jenisKelamin` (`id`, `jenisKelamin`) VALUES
(1, 'Laki-Laki'),
(2, 'Wanita');

-- --------------------------------------------------------

--
-- Table structure for table `jenisPuskesmas`
--

CREATE TABLE `jenisPuskesmas` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenisPuskesmas`
--

INSERT INTO `jenisPuskesmas` (`id`, `jenis`) VALUES
(1, 'Rawat Inap'),
(2, 'Non Rawat Inap');

-- --------------------------------------------------------

--
-- Table structure for table `statusAkun`
--

CREATE TABLE `statusAkun` (
  `id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statusAkun`
--

INSERT INTO `statusAkun` (`id`, `status`) VALUES
(1, 'Not Verified'),
(2, 'Verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataAdmin`
--
ALTER TABLE `dataAdmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `dataAntrian`
--
ALTER TABLE `dataAntrian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkNik` (`nik`),
  ADD KEY `fkPuskesmas` (`puskesmas`),
  ADD KEY `fkPoli` (`poli`);

--
-- Indexes for table `dataPasien`
--
ALTER TABLE `dataPasien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `fkStatusPasien` (`statusPasien`),
  ADD KEY `fkJenisKelamin` (`jenisKelamin`);

--
-- Indexes for table `dataPoli`
--
ALTER TABLE `dataPoli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dataPuskesmas`
--
ALTER TABLE `dataPuskesmas`
  ADD PRIMARY KEY (`idPuskesmas`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `fkJenis` (`jenis`);

--
-- Indexes for table `detailPuskesmas`
--
ALTER TABLE `detailPuskesmas`
  ADD PRIMARY KEY (`idDetail`),
  ADD KEY `fkIdPuskesmas` (`idPuskesmas`),
  ADD KEY `fkIdPoli` (`idPoli`);

--
-- Indexes for table `jenisKelamin`
--
ALTER TABLE `jenisKelamin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jenisKelamin` (`jenisKelamin`);

--
-- Indexes for table `jenisPuskesmas`
--
ALTER TABLE `jenisPuskesmas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statusAkun`
--
ALTER TABLE `statusAkun`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataAdmin`
--
ALTER TABLE `dataAdmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dataAntrian`
--
ALTER TABLE `dataAntrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dataPasien`
--
ALTER TABLE `dataPasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dataPoli`
--
ALTER TABLE `dataPoli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dataPuskesmas`
--
ALTER TABLE `dataPuskesmas`
  MODIFY `idPuskesmas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detailPuskesmas`
--
ALTER TABLE `detailPuskesmas`
  MODIFY `idDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `jenisKelamin`
--
ALTER TABLE `jenisKelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenisPuskesmas`
--
ALTER TABLE `jenisPuskesmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statusAkun`
--
ALTER TABLE `statusAkun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dataAntrian`
--
ALTER TABLE `dataAntrian`
  ADD CONSTRAINT `fkNik` FOREIGN KEY (`nik`) REFERENCES `dataPasien` (`id`),
  ADD CONSTRAINT `fkPoli` FOREIGN KEY (`poli`) REFERENCES `dataPoli` (`id`),
  ADD CONSTRAINT `fkPuskesmas` FOREIGN KEY (`puskesmas`) REFERENCES `dataPuskesmas` (`idPuskesmas`);

--
-- Constraints for table `dataPasien`
--
ALTER TABLE `dataPasien`
  ADD CONSTRAINT `fkJenisKelamin` FOREIGN KEY (`jenisKelamin`) REFERENCES `jenisKelamin` (`id`),
  ADD CONSTRAINT `fkStatusPasien` FOREIGN KEY (`statusPasien`) REFERENCES `statusAkun` (`id`);

--
-- Constraints for table `dataPuskesmas`
--
ALTER TABLE `dataPuskesmas`
  ADD CONSTRAINT `fkJenis` FOREIGN KEY (`jenis`) REFERENCES `jenisPuskesmas` (`id`);

--
-- Constraints for table `detailPuskesmas`
--
ALTER TABLE `detailPuskesmas`
  ADD CONSTRAINT `fkIdPoli` FOREIGN KEY (`idPoli`) REFERENCES `dataPoli` (`id`),
  ADD CONSTRAINT `fkIdPuskesmas` FOREIGN KEY (`idPuskesmas`) REFERENCES `dataPuskesmas` (`idPuskesmas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
