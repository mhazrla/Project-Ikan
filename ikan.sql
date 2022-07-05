-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 02:43 AM
-- Server version: 10.4.24-MariaDB-log
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `logdata`
--

CREATE TABLE `logdata` (
  `nama` varchar(255) NOT NULL,
  `waktu` datetime(2) NOT NULL DEFAULT current_timestamp(2),
  `nitrit` varchar(25) NOT NULL,
  `nitrat` varchar(25) NOT NULL,
  `amonia` varchar(25) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logdata`
--

INSERT INTO `logdata` (`nama`, `waktu`, `nitrit`, `nitrat`, `amonia`, `status`) VALUES
('a', '2022-07-05 07:04:04.00', '55', '2', '1ds', 'KUALITAS AIR BURUK, SEGERA GANTI AIR DI AQUASCAPE'),
('a', '2022-07-05 07:14:59.00', '55', '2', '1s', 'KUALITAS AIR BURUK, SEGERA GANTI AIR DI AQUASCAPE'),
('a', '2022-07-05 07:15:01.00', '55', '2', '19', 'KUALITAS AIR BURUK, SEGERA GANTI AIR DI AQUASCAPE'),
('a', '2022-07-05 07:15:04.00', '55', '2', '11', 'KUALITAS AIR BURUK, SEGERA GANTI AIR DI AQUASCAPE'),
('1', '2022-07-05 07:15:28.00', '55', '2', '11', 'KUALITAS AIR BURUK, SEGERA GANTI AIR DI AQUASCAPE');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `nama` varchar(255) NOT NULL,
  `waktu` datetime(1) DEFAULT current_timestamp(1),
  `nitrit` varchar(25) DEFAULT '0',
  `nitrat` varchar(25) DEFAULT '0',
  `amonia` varchar(25) DEFAULT '0',
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`nama`, `waktu`, `nitrit`, `nitrat`, `amonia`, `status`) VALUES
('a', '2022-07-05 07:15:04.0', '55', '2', '11', 'KUALITAS AIR BURUK, SEGERA GANTI AIR DI AQUASCAPE'),
('1', '2022-07-05 07:15:28.0', '55', '2', '11', 'KUALITAS AIR BURUK, SEGERA GANTI AIR DI AQUASCAPE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logdata`
--
ALTER TABLE `logdata`
  ADD KEY `nama` (`nama`) USING BTREE;

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring` ADD FULLTEXT KEY `nama` (`nama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
