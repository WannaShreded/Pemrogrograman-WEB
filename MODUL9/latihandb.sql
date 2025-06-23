-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2025 at 04:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(2) NOT NULL,
  `nidn` int(10) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `prodi` varchar(40) DEFAULT NULL,
  `foto` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nidn`, `nama`, `email`, `prodi`, `foto`) VALUES
(20, 101, 'Muhammad Hijri Thoriq Maruf', 'mhijrithoriqmrf@gmail.com', 'Kedokteran JavaScript', '684a340d9c5f0.jpeg'),
(21, 102, 'Andrey Smaev', 'smaev@gmail.com', 'Sastra Lifting', '684a35a5d03a8.jpeg'),
(22, 103, 'Chris Bumstead', 'bums@gmail.com', 'Teknik Estetik', '684a3619a112f.jpeg'),
(23, 104, 'David Laid', 'laidofficial@gmail.com', 'Teknik Estetik', '684a362c727c5.jpeg'),
(24, 105, 'Enriqo Gerryano Devega', 'enriqo@gmail.com', 'Ilmu Low Reps', '684a363e81ca2.jpeg'),
(25, 106, 'Christa Bella', 'bell@gmail.com', 'Farmasi C++', '684a365163dac.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
