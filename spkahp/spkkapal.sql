-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2021 at 03:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkkapal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAd` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `namalengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAd`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', 'admin', 'Cindi Wids');

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id` int(11) NOT NULL,
  `bhargasewa` double DEFAULT NULL,
  `bkapasitas` double DEFAULT NULL,
  `bfasilitas` double DEFAULT NULL,
  `bkenyamanan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id`, `bhargasewa`, `bkapasitas`, `bfasilitas`, `bkenyamanan`) VALUES
(1, 0.447, 0.21, 0.097, 0.045);

-- --------------------------------------------------------

--
-- Table structure for table `kapal`
--

CREATE TABLE `kapal` (
  `idK` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tipemesin` varchar(100) NOT NULL,
  `hargasewa` int(10) NOT NULL,
  `kapasitas` int(5) NOT NULL,
  `fasilitas` varchar(50) NOT NULL,
  `kenyamanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kapal`
--

INSERT INTO `kapal` (`idK`, `nama`, `tipemesin`, `hargasewa`, `kapasitas`, `fasilitas`, `kenyamanan`) VALUES
('K001', 'Kapal Michael', 'Engine 150HP Suzuki x2', 4040000, 10, 'Memancing', 'Nyaman'),
('K002', 'Kapal Concord', 'Engine 175HP Suzuki x2', 5120000, 16, 'Memancing', 'Nyaman'),
('K003', 'Kapal Vincent', 'Engine 250HP Suzuki x2', 5570000, 20, 'Memancing', 'Nyaman'),
('K004', 'Kapal Lavia', 'Engine 300HP Suzuki x2', 6650000, 26, 'Memancing', 'Nyaman'),
('K005', 'Kapal Miss Lee', 'Engine 300HP Suzuki x2', 8450000, 30, 'Memancing', 'Nyaman'),
('K006', 'Kapal Zevolution', 'Engine 250HP Suzuki x2', 8900000, 37, 'Tidak Memancing', 'Sangat Nyaman'),
('K007', 'Kapal Lumba-Lumba', 'Engine 250HP Suzuki x2', 10850000, 45, 'Tidak Memancing', 'Sangat Nyaman'),
('K008', 'Kapal Marina Express', 'Engine 250HP Suzuki x5', 25000000, 95, 'Tidak Memancing', 'Sangat Nyaman'),
('K009', 'Kapal Pramuka Express', 'Engine 250HP Suzuki x5', 35500000, 135, 'Tidak Memancing', 'Sangat Nyaman'),
('K010', 'Kapal Black Pearl', 'Engine 250HP Suzuki x6', 50500000, 190, 'Tidak Memancing', 'Sangat Nyaman');

-- --------------------------------------------------------

--
-- Table structure for table `konversi`
--

CREATE TABLE `konversi` (
  `idA` varchar(20) NOT NULL,
  `idK` varchar(10) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `hargasewa` int(10) NOT NULL,
  `kapasitas` int(5) DEFAULT NULL,
  `fasilitas` varchar(50) DEFAULT NULL,
  `kenyamanan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konversi`
--

INSERT INTO `konversi` (`idA`, `idK`, `nama`, `hargasewa`, `kapasitas`, `fasilitas`, `kenyamanan`) VALUES
('A001', 'K001', 'Kapal Michael', 7, 1, '2', '4'),
('A002', 'K002', 'Kapal Concord', 6, 2, '2', '4'),
('A003', 'K003', 'Kapal Vincent', 6, 2, '2', '4'),
('A004', 'K004', 'Kapal Lavia', 5, 3, '2', '4'),
('A005', 'K005', 'Kapal Miss Lee', 5, 3, '2', '4'),
('A006', 'K006', 'Kapal Zevolution', 4, 3, '1', '5'),
('A007', 'K007', 'Kapal Lumba-Lumba', 4, 4, '1', '5'),
('A008', 'K008', 'Kapal Marina Express', 3, 5, '1', '5'),
('A009', 'K009', 'Kapal Pramuka Express', 2, 6, '1', '5'),
('A010', 'K010', 'Kapal Black Pearl', 1, 7, '1', '5');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `idC` int(5) NOT NULL,
  `kriteria` varchar(20) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`idC`, `kriteria`, `deskripsi`, `bobot`) VALUES
(1, 'hargasewa', 'Harga Sewa Kapal', 0.447),
(2, 'kapasitas', 'Kapasitas Jumlah Orang', 0.21),
(3, 'fasilitas', 'Fasilitas Khusus Kapal', 0.097),
(4, 'kenyamanan', 'Kenyamanan Kapal', 0.045);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`idK`);

--
-- Indexes for table `konversi`
--
ALTER TABLE `konversi`
  ADD PRIMARY KEY (`idA`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`idC`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
