-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 02:06 PM
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
  `harga` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `nm_brg`, `stok`, `harga`) VALUES
(15, 'Ikan Cupang', 60, 30000),
(16, 'Akuarium Kecil', 5, 40000),
(17, 'Akuarium Sedang', 6, 60000),
(18, 'Akuarium Besar', 4, 10000),
(19, 'Pakan ikan', 20, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_beli`
--

CREATE TABLE `detail_beli` (
  `no_faktur` int(11) NOT NULL,
  `kd_suppl` int(11) NOT NULL,
  `kd_brg` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_jual`
--

CREATE TABLE `detail_jual` (
  `nota` int(11) NOT NULL,
  `kd_brg` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kd_supp` int(10) NOT NULL,
  `nm_supp` varchar(20) NOT NULL,
  `alamat_supp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trans_beli`
--

CREATE TABLE `trans_beli` (
  `no_faktur` int(11) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `kd_brg` (`kd_brg`),
  ADD KEY `kd_suppl` (`kd_suppl`),
  ADD KEY `no_faktur` (`no_faktur`);

--
-- Indexes for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD KEY `nota` (`nota`),
  ADD KEY `kd_brg` (`kd_brg`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kd_supp`);

--
-- Indexes for table `trans_beli`
--
ALTER TABLE `trans_beli`
  ADD PRIMARY KEY (`no_faktur`);

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
  MODIFY `kd_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `kd_supp` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_beli`
--
ALTER TABLE `trans_beli`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trans_jual`
--
ALTER TABLE `trans_jual`
  MODIFY `nota` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_beli`
--
ALTER TABLE `detail_beli`
  ADD CONSTRAINT `detail_beli_ibfk_1` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kd_brg`),
  ADD CONSTRAINT `detail_beli_ibfk_2` FOREIGN KEY (`kd_suppl`) REFERENCES `supplier` (`kd_supp`),
  ADD CONSTRAINT `detail_beli_ibfk_3` FOREIGN KEY (`no_faktur`) REFERENCES `trans_beli` (`no_faktur`);

--
-- Constraints for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD CONSTRAINT `detail_jual_ibfk_1` FOREIGN KEY (`nota`) REFERENCES `trans_jual` (`nota`),
  ADD CONSTRAINT `detail_jual_ibfk_2` FOREIGN KEY (`kd_brg`) REFERENCES `barang` (`kd_brg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
