-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2019 at 02:02 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrr`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nm_barang` varchar(30) NOT NULL,
  `deskripsi` varchar(40) NOT NULL,
  `foto` text NOT NULL,
  `harga` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nm_barang`, `deskripsi`, `foto`, `harga`) VALUES
(1, 'Nasi Goreng', 'Nasi Goreng Telur Ceplok', 'menu_1.png', 25000),
(3, 'Chicken Cordon Bleu', 'Chicken Cordon Bleu', 'menu_2.png', 25000),
(4, 'Fettuccine Alfredo', 'Fettuccine Alfredo', 'menu_3.png', 17000),
(5, 'Kentang Goreng', 'Kentang Goreng', 'menu_4.png', 12000),
(6, 'HHR Pizza', 'HHR Pizza', 'menu_5.png', 55000),
(8, 'HHR Burger', 'HHR Burger', 'menu_6.png', 20000),
(9, 'Nasi HipHip Hore', 'Nasi HipHip Hore', 'menu_8.png', 27000),
(10, 'Bakmi Goreng Hore', 'Bakmi Goreng Hore', 'menu_9.png', 23000);

-- --------------------------------------------------------

--
-- Table structure for table `cust`
--

CREATE TABLE `cust` (
  `id_cust` int(11) NOT NULL,
  `nm_cust` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust`
--

INSERT INTO `cust` (`id_cust`, `nm_cust`) VALUES
(1, 'Fahrur'),
(3, 'Fitra'),
(4, 'okyyy'),
(5, 'Indra'),
(6, 'Oki Riyanto');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_barang`, `qty`) VALUES
(1, 1, 1, 1),
(2, 1, 3, 2),
(3, 2, 1, 2),
(4, 3, 9, 5),
(5, 3, 6, 10),
(6, 4, 9, 5),
(7, 4, 6, 3),
(8, 5, 1, 3),
(9, 5, 3, 2),
(10, 6, 1, 2),
(11, 7, 1, 2),
(12, 8, 1, 2),
(13, 8, 3, 3),
(14, 9, 1, 2),
(15, 6, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_pesan` int(5) NOT NULL,
  `wkt_pesan` datetime NOT NULL,
  `cust_id` int(4) NOT NULL,
  `no_meja` int(2) NOT NULL,
  `sudah_bayar` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_pesan`, `wkt_pesan`, `cust_id`, `no_meja`, `sudah_bayar`) VALUES
(1, '2018-12-01 18:51:49', 1, 23, '1'),
(2, '2018-12-01 19:55:38', 2, 24, '0'),
(3, '2018-12-01 19:59:03', 3, 250, '1'),
(4, '2018-12-01 14:34:09', 4, 10, '0'),
(5, '2018-12-07 05:13:04', 5, 100, '0'),
(6, '2018-12-14 12:44:25', 6, 111, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cust`
--
ALTER TABLE `cust`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_pesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cust`
--
ALTER TABLE `cust`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_pesan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
