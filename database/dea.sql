-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230703.475871160d
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2023 at 05:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

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
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(20) NOT NULL,
  `nama_alternatif` varchar(100) NOT NULL,
  `keterangan_alternatif` text NOT NULL,
  `gambar_alternatif` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`, `keterangan_alternatif`, `gambar_alternatif`) VALUES
(1, 'Rekayasa Keamanan Siber', 'Profil Lulusan : \r\n1. Cybersecurity Governance Officer\r\n2. Network Security Administrator\r\n3. Digital Evidence First Responder\r\n4. Penetration Tester', 'foto/IMG-20220417-WA0001.jpg'),
(2, 'Bisnis Digital', 'Profil Lulusan :\r\n1. Digital Marketer\r\n2. Startup Enterpreneur\r\n3. Data Engineer\r\n4. Data Analyst\r\n5. Konsultan Bisnis', 'foto/pngegg (6).png'),
(3, 'Teknik Rekayasa Multimedia', 'Profil Lulusan : \r\n1. Multimedia Enterpreneur (Technopreneur)\r\n2. Multimedia Broadcaster\r\n3. Multimedia Creative', 'foto/pngwing.com (20).png');

-- --------------------------------------------------------

--
-- Table structure for table `data_input`
--

CREATE TABLE `data_input` (
  `id_data` int(11) NOT NULL,
  `nama_alternatif` varchar(100) NOT NULL,
  `n1` double NOT NULL,
  `n2` double NOT NULL,
  `n3` double NOT NULL,
  `n4` double NOT NULL,
  `n5` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_input`
--

INSERT INTO `data_input` (`id_data`, `nama_alternatif`, `n1`, `n2`, `n3`, `n4`, `n5`) VALUES
(1, 'Rekayasa Keamanan Siber', 20, 5, 7, 35, 0),
(2, 'Bisnis Digital', 44, 8, 8, 34, 0),
(3, 'Teknik Rekayasa Multimedia', 32, 7, 9, 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `efisiensi`
--

CREATE TABLE `efisiensi` (
  `id_data` int(11) NOT NULL,
  `skor_efisiensi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(100) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `bobot_kriteria` int(100) NOT NULL,
  `jenis` enum('input','output') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `bobot_kriteria`, `jenis`) VALUES
(1, 'Jumlah Mahasiswa', 70, 'input'),
(2, 'Jumlah Dosen', 30, 'input'),
(3, 'Jumlah Pengabdian', 50, 'output'),
(4, 'Jumlah Penelitian', 50, 'output');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `nama_lengkap`, `level`) VALUES
('a@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'ahmad', 'user'),
('admin@admin.com', '0192023a7bbd73250516f069df18b500', 'adminaaa', 'user'),
('aji@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'aji nur', 'user'),
('arp@gmail.com', 'eab2ee2f2b1a7aa2c251e119c239a4af', 'Coba', 'user'),
('attafaniff@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Ducky', 'user'),
('b@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'baco', 'user'),
('ok@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ok', 'user'),
('polibestpc2@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', 'Polibest', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `data_input`
--
ALTER TABLE `data_input`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `efisiensi`
--
ALTER TABLE `efisiensi`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `normalisasi`
--
ALTER TABLE `normalisasi`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `data_input`
--
ALTER TABLE `data_input`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `efisiensi`
--
ALTER TABLE `efisiensi`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `normalisasi`
--
ALTER TABLE `normalisasi`
  MODIFY `id_data` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
