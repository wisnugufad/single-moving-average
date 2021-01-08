-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2021 at 04:35 AM
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

DROP TABLE IF EXISTS `tb_rekap_penjualan`;
CREATE TABLE `tb_rekap_penjualan` (
  `id` bigint(20) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `dry_food` int(11) NOT NULL,
  `wet_food` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `tb_rekap_penjualan`
--

TRUNCATE TABLE `tb_rekap_penjualan`;
--
-- Dumping data for table `tb_rekap_penjualan`
--

INSERT INTO `tb_rekap_penjualan` (`id`, `tahun`, `bulan`, `dry_food`, `wet_food`) VALUES
(30, 2018, 'Januari', 143, 112),
(31, 2018, 'Februari', 189, 102),
(32, 2018, 'Maret', 157, 100),
(33, 2018, 'April', 161, 81),
(34, 2018, 'Mei', 312, 188),
(35, 2018, 'Juni', 335, 241),
(36, 2018, 'Juli', 300, 203),
(37, 2018, 'Agustus', 201, 136),
(38, 2018, 'September', 287, 183),
(39, 2018, 'Oktober', 237, 166),
(40, 2018, 'November', 177, 149),
(41, 2018, 'Desember', 346, 174),
(42, 2019, 'Januari', 403, 287),
(43, 2019, 'Februari', 343, 246),
(44, 2019, 'Maret', 279, 292),
(45, 2019, 'April', 284, 220),
(46, 2019, 'Mei', 228, 277),
(47, 2019, 'Juni', 371, 311),
(48, 2019, 'Juli', 316, 211),
(49, 2019, 'Agustus', 412, 363),
(50, 2019, 'September', 371, 291),
(51, 2019, 'Oktober', 484, 404),
(52, 2019, 'November', 306, 277),
(53, 2019, 'Desember', 318, 337),
(54, 2020, 'Januari', 320, 339),
(55, 2020, 'Februari', 351, 328),
(56, 2020, 'Maret', 360, 341),
(57, 2020, 'April', 425, 240),
(58, 2020, 'Mei', 555, 396),
(59, 2020, 'Juni', 688, 428),
(60, 2020, 'Juli', 355, 167),
(61, 2020, 'Agustus', 411, 368),
(62, 2020, 'September', 631, 599),
(63, 2020, 'Oktober', 774, 579);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `tb_role`
--

TRUNCATE TABLE `tb_role`;
--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`role_id`, `role_name`) VALUES
(1, 'ADMIN'),
(2, 'STAFF');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `tb_user`
--

TRUNCATE TABLE `tb_user`;
--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `role_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'staff', '1253208465b1efa876f982d8a9e73eef', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_rekap_penjualan`
--
ALTER TABLE `tb_rekap_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_rekap_penjualan`
--
ALTER TABLE `tb_rekap_penjualan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
