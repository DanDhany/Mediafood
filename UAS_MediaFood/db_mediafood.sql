-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2019 at 03:22 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediafood`
--
CREATE DATABASE IF NOT EXISTS `mediafood` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mediafood`;

-- --------------------------------------------------------

--
-- Table structure for table `detail_jual`
--

CREATE TABLE `detail_jual` (
  `id_trans` varchar(5) NOT NULL,
  `id_menu` int(25) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `hrg_menu` int(9) NOT NULL,
  `jml_pesan` int(5) NOT NULL,
  `sts_pesan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_jual`
--

INSERT INTO `detail_jual` (`id_trans`, `id_menu`, `nama_menu`, `hrg_menu`, `jml_pesan`, `sts_pesan`) VALUES
('T452', 1, 'Nasi Goreng Ayam', 25000, 2, 'bayar'),
('T645', 1, 'Nasi Goreng Ayam', 25000, 2, 'Proses'),
('T305', 1, 'Nasi Goreng Ayam', 25000, 1, 'bayar'),
('T305', 2, 'Es teh panas', 5000, 1, 'bayar'),
('T25', 1, 'Nasi Goreng Ayam', 25000, 3, 'bayar'),
('T25', 2, 'Es teh panas', 5000, 1, 'bayar'),
('T544', 1, 'Nasi Goreng Ayam', 25000, 2, 'bayar'),
('T544', 2, 'Es teh panas', 5000, 3, 'bayar'),
('T544', 1, 'Nasi Goreng Ayam', 25000, 3, 'bayar'),
('T486', 1, 'Nasi Goreng Ayam', 25000, 2, 'bayar'),
('T232', 1, 'Nasi Goreng Ayam', 25000, 1, 'Proses'),
('T232', 2, 'Es teh panas', 5000, 3, 'Proses'),
('T232', 1, 'Nasi Goreng Ayam', 25000, 1, 'Proses'),
('T232', 2, 'Es teh panas', 5000, 3, 'Proses'),
('T232', 1, 'Nasi Goreng Ayam', 25000, 4, 'Proses'),
('T232', 1, 'Nasi Goreng Ayam', 25000, 3, 'Proses'),
('T66', 2, 'Es teh panas', 5000, 3, 'selesai'),
('T66', 1, 'Nasi Goreng Ayam', 25000, 3, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `master_jual`
--

CREATE TABLE `master_jual` (
  `id_trans` varchar(5) NOT NULL,
  `id_meja` int(11) NOT NULL,
  `tgl_trans` date NOT NULL,
  `grand_total` int(9) NOT NULL,
  `total_bayar` int(9) NOT NULL,
  `kembalian` int(9) NOT NULL,
  `sts_trans` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_jual`
--

INSERT INTO `master_jual` (`id_trans`, `id_meja`, `tgl_trans`, `grand_total`, `total_bayar`, `kembalian`, `sts_trans`) VALUES
('T232', 2, '0000-00-00', 180000, 100000, 20000, 'selesai'),
('T25', 2, '0000-00-00', 80000, 100000, 20000, 'selesai'),
('T305', 2, '0000-00-00', 30000, 100000, 70000, 'selesai'),
('T452', 2, '0000-00-00', 50000, 50000, 0, 'selesai'),
('T486', 2, '0000-00-00', 50000, 100000, 50000, 'selesai'),
('T544', 2, '0000-00-00', 140000, 200000, 60000, 'selesai'),
('T66', 2, '0000-00-00', 90000, 100000, 10000, 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `ket` varchar(25) NOT NULL,
  `sts_meja` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id_meja`, `ket`, `sts_meja`) VALUES
(1, 'muat 2 orang', 'dipesan'),
(2, 'muat 2 orang', 'kosong'),
(3, 'muat 4 orang', 'dipesan'),
(4, 'muat 4 orang', 'kosong'),
(5, 'muat 4 orang', 'kosong'),
(6, 'muat 5 orang', 'kosong'),
(7, 'muat 5 orang', 'kosong'),
(8, 'muat 6 orang', 'kosong'),
(9, 'muat 6 orang', 'kosong'),
(10, 'muat 6 orang', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(25) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `hrg_menu` varchar(9) NOT NULL,
  `sts_menu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `hrg_menu`, `sts_menu`) VALUES
(1, 'Nasi Goreng Ayam', '25000', 'ada'),
(2, 'Es teh panas', '5000', 'ada'),
(3, 'Bakso Mercon Porsi Jumbo', '20000', 'kosong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_jual`
--
ALTER TABLE `master_jual`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
