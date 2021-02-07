-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 07, 2021 at 03:20 PM
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
CREATE TABLE IF NOT EXISTS `tb_rekap_penjualan` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tahun` year(4) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `bolt_ikan` int(11) NOT NULL,
  `whiskas` int(11) NOT NULL,
  `ciao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `tb_rekap_penjualan`
--

TRUNCATE TABLE `tb_rekap_penjualan`;
--
-- Dumping data for table `tb_rekap_penjualan`
--

INSERT INTO `tb_rekap_penjualan` (`id`, `tahun`, `bulan`, `bolt_ikan`, `whiskas`, `ciao`) VALUES
(1, 2018, 'Januari', 114, 53, 91),
(2, 2018, 'Feb', 111, 37, 83),
(3, 2018, 'Mar', 122, 55, 87),
(4, 2018, 'Apr', 160, 28, 77),
(5, 2018, 'Mei', 119, 21, 40),
(6, 2018, 'Jun', 96, 24, 45),
(7, 2018, 'Jul', 122, 20, 47),
(8, 2018, 'Aug', 107, 26, 37),
(9, 2018, 'sept', 129, 36, 48),
(10, 2018, 'okt', 95, 22, 63),
(11, 2018, 'Nov', 74, 33, 41),
(12, 2018, 'Des', 119, 38, 49),
(13, 2019, 'Januari', 145, 30, 44),
(14, 2019, 'Feb', 147, 35, 51),
(15, 2019, 'Mar', 109, 29, 57),
(16, 2019, 'Apr', 113, 31, 51),
(17, 2019, 'Mei', 179, 26, 55),
(18, 2019, 'Jun', 115, 20, 48),
(19, 2019, 'Jul', 167, 27, 53),
(20, 2019, 'Aug', 197, 22, 45),
(21, 2019, 'sept', 155, 20, 39),
(22, 2019, 'okt', 136, 22, 42),
(23, 2019, 'Nov', 113, 29, 48),
(24, 2019, 'Des', 135, 31, 53),
(25, 2020, 'Januari', 211, 33, 45),
(26, 2020, 'Feb', 122, 32, 39),
(27, 2020, 'Mar', 130, 37, 49),
(28, 2020, 'Apr', 141, 44, 58),
(29, 2020, 'Mei', 106, 54, 65),
(30, 2020, 'Jun', 99, 48, 59),
(31, 2020, 'Jul', 96, 41, 50),
(32, 2020, 'Aug', 158, 49, 55),
(33, 2020, 'sept', 149, 42, 61),
(34, 2020, 'okt', 116, 48, 59),
(35, 2020, 'Nov', 87, 43, 63),
(36, 2020, ' Desember', 99, 41, 70);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE IF NOT EXISTS `tb_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(15) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

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
CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
