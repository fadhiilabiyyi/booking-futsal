-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 03:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_akhir_14`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `id_user` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `waktu_bermain` enum('1 jam','2 jam','3 jam') NOT NULL,
  `lapangan` enum('lapangan 1','lapangan 2') NOT NULL,
  `harga` varchar(225) NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `id_user`, `nama`, `tanggal`, `jam`, `waktu_bermain`, `lapangan`, `harga`, `gambar`) VALUES
(47, '28', 'Fadhiil Abiyyi Tamsil', '2021-06-17', '09:00:00', '1 jam', 'lapangan 1', 'Rp 120.000,00', '60c94db9149cb.jpg'),
(48, '28', 'Fadhiil Abiyyi Tamsil', '2021-06-03', '10:20:00', '2 jam', 'lapangan 2', 'Rp 190.000,00', '60c96e4b35d0b.jpg'),
(49, '28', 'Fadhiil Abiyyi Tamsil', '2021-06-18', '15:30:00', '2 jam', 'lapangan 1', 'Rp 170.000,00', '60caeb9b28792.jpg'),
(50, '28', 'Fadhiil Abiyyi Tamsil', '2021-06-18', '15:45:00', '2 jam', 'lapangan 2', 'Rp 190.000,00', '60caeefe3bb1d.jpg'),
(51, '28', 'Fadhiil Abiyyi Tamsil', '2021-06-09', '10:11:00', '2 jam', 'lapangan 2', 'Rp 190.000,00', ''),
(52, '28', 'Fadhiil Abiyyi Tamsil', '2021-06-17', '10:15:00', '2 jam', 'lapangan 1', 'Rp 170.000,00', ''),
(53, '28', 'Fadhiil Abiyyi Tamsil', '2021-06-10', '08:20:00', '2 jam', 'lapangan 2', 'Rp 190.000,00', '60d13f2c16162.png'),
(54, '28', 'Fadhiil Abiyyi Tamsil', '2021-06-02', '08:42:00', '2 jam', 'lapangan 2', 'Rp 190.000,00', '60d1401360567.png'),
(55, '29', 'Antonio Pablo Oscar', '2021-06-01', '09:30:00', '1 jam', 'lapangan 1', 'Rp 120.000,00', '60d140af1c854.png'),
(56, '28', 'Fadhiil Abiyyi Tamsil', '2021-06-03', '10:47:00', '1 jam', 'lapangan 1', 'Rp 120.000,00', ''),
(57, '29', 'Antonio Pablo Oscar', '2021-06-02', '08:51:00', '2 jam', 'lapangan 2', 'Rp 190.000,00', '60d14203ca019.png'),
(58, '29', 'Antonio Pablo Oscar', '0000-00-00', '10:52:00', '3 jam', 'lapangan 1', 'Rp 220.000,00', ''),
(59, '29', 'Antonio Pablo Oscar', '2021-06-03', '10:52:00', '3 jam', 'lapangan 1', 'Rp 220.000,00', '60d1429167781.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(28, 'Fadhiil Abiyyi Tamsil', 'fadhiil', '$2y$10$BcUy7ZbPAOleMZQv5jUjgeeuEwOd8GuFZHBSyeySsn3yf4o6z.deS'),
(29, 'Antonio Pablo Oscar', 'oscar', '$2y$10$m9uT4WPsAzCgVnh9JD7KBuEXal3WgXLRNbVyWvl0Hsy3yKQE1aOTC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
