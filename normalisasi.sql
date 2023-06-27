-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 10:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dea`
--

-- --------------------------------------------------------

--
-- Table structure for table `normalisasi`
--

CREATE TABLE `normalisasi` (
  `id_data` int(50) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `n1_normal` double DEFAULT NULL,
  `n2_normal` double DEFAULT NULL,
  `n3_normal` double DEFAULT NULL,
  `n4_normal` double DEFAULT NULL,
  `n5_normal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `normalisasi`
--

INSERT INTO `normalisasi` (`id_data`, `nama_alternatif`, `n1_normal`, `n2_normal`, `n3_normal`, `n4_normal`, `n5_normal`) VALUES
(1, 'BD', 1, 0.33333333333333, 0, 0, NULL),
(2, 'TRM', 0.66666666666667, 1, 0.33333333333333, 0, NULL),
(3, 'RKS', 0, 0, 1, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `normalisasi`
--
ALTER TABLE `normalisasi`
  ADD PRIMARY KEY (`id_data`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `normalisasi`
--
ALTER TABLE `normalisasi`
  MODIFY `id_data` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
