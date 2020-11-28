-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 12:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `single_moving_average`
--
CREATE DATABASE IF NOT EXISTS `single_moving_average` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `single_moving_average`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekap_penjualan`
--

CREATE TABLE `tb_rekap_penjualan` (
  `id` bigint(20) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `total_penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rekap_penjualan`
--

INSERT INTO `tb_rekap_penjualan` (`id`, `tahun`, `bulan`, `total_penjualan`) VALUES
(1, 2018, 'Maret', 257),
(2, 2018, 'April', 242),
(3, 2018, 'Mei', 500),
(4, 2018, 'Juni', 576),
(5, 2018, 'Juli', 503),
(6, 2018, 'Agustus', 337),
(7, 2018, 'September', 470),
(8, 2018, 'Oktober', 403),
(9, 2018, 'November', 326),
(10, 2018, 'Desember', 520),
(11, 2019, 'Januari', 690),
(12, 2019, 'Februari', 589),
(13, 2019, 'Maret', 571),
(14, 2019, 'April', 504),
(15, 2019, 'Mei', 505),
(16, 2019, 'Juni', 682),
(17, 2019, 'Juli', 527),
(18, 2019, 'Agustus', 775),
(19, 2019, 'September', 662),
(20, 2019, 'Oktober', 888),
(21, 2019, 'November', 494),
(22, 2019, 'Desember', 655),
(23, 2020, 'Januari', 659),
(24, 2020, 'Februari', 679),
(25, 2020, 'Maret', 244),
(26, 2020, 'April', 665),
(27, 2020, 'Mei', 951),
(28, 2020, 'Juni', 1116);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_rekap_penjualan`
--
ALTER TABLE `tb_rekap_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_rekap_penjualan`
--
ALTER TABLE `tb_rekap_penjualan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
