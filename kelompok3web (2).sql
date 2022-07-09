-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 02:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelompok3web`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_brg` int(11) NOT NULL,
  `nm_brg` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_jual` bigint(15) NOT NULL,
  `harga_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `nm_brg`, `stok`, `harga_jual`, `harga_beli`) VALUES
(16, 'Akuarium Kecil', 23, 40000, 30000),
(17, 'Akuarium Sedang', 6, 60000, 45000),
(18, 'Akuarium Besar', 5, 100000, 80000),
(19, 'Pakan ikan', 9, 20000, 15000),
(22, 'Cupang eyeCup', 50, 60000, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_beli`
--

CREATE TABLE `detail_beli` (
  `no_faktur` int(11) NOT NULL,
  `kd_brg` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_beli_view`
-- (See below for the actual view)
--
CREATE TABLE `detail_beli_view` (
`no_faktur` int(11)
,`nm_brg` varchar(20)
,`harga` int(11)
,`jumlah` int(11)
,`bayar` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `detail_jual`
--

CREATE TABLE `detail_jual` (
  `nota` int(11) NOT NULL,
  `kd_brg` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_jual`
--

INSERT INTO `detail_jual` (`nota`, `kd_brg`, `harga`, `jumlah`, `bayar`) VALUES
(1, 16, 0, 1, 135000),
(1, 18, 0, 2, 40000),
(2, 16, 40000, 9, 360000),
(3, 19, 20000, 2, 40000),
(4, 16, 40000, 4, 160000),
(5, 17, 60000, 1, 60000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_jual_view`
-- (See below for the actual view)
--
CREATE TABLE `detail_jual_view` (
`nota` int(11)
,`nm_brg` varchar(20)
,`harga` int(11)
,`jumlah` int(11)
,`bayar` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kd_supp` int(10) NOT NULL,
  `nm_supp` varchar(40) NOT NULL,
  `alamat_supp` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kd_supp`, `nm_supp`, `alamat_supp`) VALUES
(6, 'PT. Ikan Sentosa', 'Purwokerto'),
(7, 'CV. Kaca Sejati Indah', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `trans_beli`
--

CREATE TABLE `trans_beli` (
  `no_faktur` int(11) NOT NULL,
  `kd_supp` int(11) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `trans_beli_view`
-- (See below for the actual view)
--
CREATE TABLE `trans_beli_view` (
`no_faktur` int(11)
,`tgl` int(2)
,`bulan` varchar(9)
,`tahun` int(4)
,`jam` time
,`nm_supp` varchar(40)
,`total_bayar` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `trans_jual`
--

CREATE TABLE `trans_jual` (
  `nota` int(11) NOT NULL,
  `tgl` datetime DEFAULT current_timestamp(),
  `nm_pembeli` varchar(30) NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_jual`
--

INSERT INTO `trans_jual` (`nota`, `tgl`, `nm_pembeli`, `total_bayar`) VALUES
(1, '2022-07-09 19:25:39', 'aaa', 66),
(2, '2022-07-09 19:51:11', 'Muhammad Riqqi Amru', 360000),
(3, '2022-07-09 19:53:06', 'adfa', 40000),
(4, '2022-07-09 19:54:59', '', 160000),
(5, '2022-07-09 19:56:42', 'aaa', 60000);

-- --------------------------------------------------------

--
-- Stand-in structure for view `trans_jual_view`
-- (See below for the actual view)
--
CREATE TABLE `trans_jual_view` (
`nota` int(11)
,`nm_pembeli` varchar(30)
,`total_bayar` int(11)
,`hari` int(2)
,`bulan` varchar(9)
,`tahun` int(4)
,`jam` time
);

-- --------------------------------------------------------

--
-- Structure for view `detail_beli_view`
--
DROP TABLE IF EXISTS `detail_beli_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_beli_view`  AS SELECT `detail_beli`.`no_faktur` AS `no_faktur`, `barang`.`nm_brg` AS `nm_brg`, `detail_beli`.`harga` AS `harga`, `detail_beli`.`jumlah` AS `jumlah`, `detail_beli`.`bayar` AS `bayar` FROM (`detail_beli` join `barang`) WHERE `detail_beli`.`kd_brg` = `barang`.`kd_brg` ;

-- --------------------------------------------------------

--
-- Structure for view `detail_jual_view`
--
DROP TABLE IF EXISTS `detail_jual_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_jual_view`  AS SELECT `detail_jual`.`nota` AS `nota`, `barang`.`nm_brg` AS `nm_brg`, `detail_jual`.`harga` AS `harga`, `detail_jual`.`jumlah` AS `jumlah`, `detail_jual`.`bayar` AS `bayar` FROM (`detail_jual` join `barang`) WHERE `detail_jual`.`kd_brg` = `barang`.`kd_brg` ;

-- --------------------------------------------------------

--
-- Structure for view `trans_beli_view`
--
DROP TABLE IF EXISTS `trans_beli_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trans_beli_view`  AS SELECT `trans_beli`.`no_faktur` AS `no_faktur`, dayofmonth(`trans_beli`.`tgl`) AS `tgl`, monthname(`trans_beli`.`tgl`) AS `bulan`, year(`trans_beli`.`tgl`) AS `tahun`, cast(`trans_beli`.`tgl` as time) AS `jam`, `supplier`.`nm_supp` AS `nm_supp`, `trans_beli`.`total_bayar` AS `total_bayar` FROM (`trans_beli` join `supplier`) WHERE `trans_beli`.`kd_supp` = `supplier`.`kd_supp` ;

-- --------------------------------------------------------

--
-- Structure for view `trans_jual_view`
--
DROP TABLE IF EXISTS `trans_jual_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trans_jual_view`  AS SELECT `trans_jual`.`nota` AS `nota`, `trans_jual`.`nm_pembeli` AS `nm_pembeli`, `trans_jual`.`total_bayar` AS `total_bayar`, dayofmonth(`trans_jual`.`tgl`) AS `hari`, monthname(`trans_jual`.`tgl`) AS `bulan`, year(`trans_jual`.`tgl`) AS `tahun`, cast(`trans_jual`.`tgl` as time) AS `jam` FROM `trans_jual` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `detail_beli`
--
ALTER TABLE `detail_beli`
  ADD KEY `detail_beli_ibfk_1` (`kd_brg`),
  ADD KEY `detail_beli_ibfk_3` (`no_faktur`);

--
-- Indexes for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD KEY `detail_jual_ibfk_1` (`nota`),
  ADD KEY `detail_jual_ibfk_2` (`kd_brg`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kd_supp`);

--
-- Indexes for table `trans_beli`
--
ALTER TABLE `trans_beli`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `trans_beli_ibfk_1` (`kd_supp`);

--
-- Indexes for table `trans_jual`
--
ALTER TABLE `trans_jual`
  ADD PRIMARY KEY (`nota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `kd_supp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trans_beli`
--
ALTER TABLE `trans_beli`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `trans_jual`
--
ALTER TABLE `trans_jual`
  MODIFY `nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_beli`
--
ALTER TABLE `detail_beli`
  ADD CONSTRAINT `detail_beli_ibfk_1` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kd_brg`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_beli_ibfk_3` FOREIGN KEY (`no_faktur`) REFERENCES `trans_beli` (`no_faktur`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD CONSTRAINT `detail_jual_ibfk_1` FOREIGN KEY (`nota`) REFERENCES `trans_jual` (`nota`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_jual_ibfk_2` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kd_brg`) ON UPDATE CASCADE;

--
-- Constraints for table `trans_beli`
--
ALTER TABLE `trans_beli`
  ADD CONSTRAINT `trans_beli_ibfk_1` FOREIGN KEY (`kd_supp`) REFERENCES `supplier` (`kd_supp`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
