-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2017 at 12:03 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `NILAI`
--

CREATE TABLE `NILAI` (
  `NIP` char(6) NOT NULL,
  `NIS` char(6) NOT NULL,
  `NILAI_UTS` int(11) NOT NULL,
  `NILAI_UAS` int(11) NOT NULL,
  `NILAI_TUGAS` int(11) NOT NULL,
  `NILAI_ULANGAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SISWA`
--

CREATE TABLE `SISWA` (
  `NIS` char(6) NOT NULL,
  `NIP` char(6) NOT NULL,
  `NIK` char(6) NOT NULL,
  `NAMA_SISWA` varchar(50) NOT NULL,
  `JK_SISWA` varchar(9) NOT NULL,
  `ALAMAT_SISWA` varchar(120) NOT NULL,
  `PASSWORD_SISWA` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SISWA`
--

INSERT INTO `SISWA` (`NIS`, `NIP`, `NIK`, `NAMA_SISWA`, `JK_SISWA`, `ALAMAT_SISWA`, `PASSWORD_SISWA`) VALUES
('345678', '234567', '123456', 'sayasiswa', 'Laki-Laki', 'dimanahayooo', '1qw23er4');

-- --------------------------------------------------------

--
-- Table structure for table `TU`
--

CREATE TABLE `TU` (
  `NIK` char(6) NOT NULL,
  `NAMA_TU` varchar(50) NOT NULL,
  `JK_TU` varchar(9) NOT NULL,
  `ALAMAT_TU` varchar(120) NOT NULL,
  `PASSWORD_TU` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TU`
--

INSERT INTO `TU` (`NIK`, `NAMA_TU`, `JK_TU`, `ALAMAT_TU`, `PASSWORD_TU`) VALUES
('123456', 'siapahayoo', 'Laki-laki', 'dimanasajaboleh', '1qw23er4');

-- --------------------------------------------------------

--
-- Table structure for table `WALI_KELAS`
--

CREATE TABLE `WALI_KELAS` (
  `NIP` char(6) NOT NULL,
  `NIK` char(6) NOT NULL,
  `NAMA_WALI` varchar(50) NOT NULL,
  `JK_WALI` varchar(9) NOT NULL,
  `ALAMAT_WALI` varchar(120) NOT NULL,
  `PASSWORD_WALI` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `WALI_KELAS`
--

INSERT INTO `WALI_KELAS` (`NIP`, `NIK`, `NAMA_WALI`, `JK_WALI`, `ALAMAT_WALI`, `PASSWORD_WALI`) VALUES
('234567', '123456', 'sayaguruwali', 'Laki-Laki', 'dimanayaa', '1qw23er4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `NILAI`
--
ALTER TABLE `NILAI`
  ADD KEY `FK_AKSES` (`NIS`),
  ADD KEY `FK_INPUT` (`NIP`);

--
-- Indexes for table `SISWA`
--
ALTER TABLE `SISWA`
  ADD PRIMARY KEY (`NIS`),
  ADD KEY `FK_DIWALI` (`NIP`),
  ADD KEY `FK_MENGISI` (`NIK`);

--
-- Indexes for table `TU`
--
ALTER TABLE `TU`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `WALI_KELAS`
--
ALTER TABLE `WALI_KELAS`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `FK_MENGEDIT` (`NIK`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `NILAI`
--
ALTER TABLE `NILAI`
  ADD CONSTRAINT `FK_AKSES` FOREIGN KEY (`NIS`) REFERENCES `SISWA` (`NIS`),
  ADD CONSTRAINT `FK_INPUT` FOREIGN KEY (`NIP`) REFERENCES `WALI_KELAS` (`NIP`);

--
-- Constraints for table `SISWA`
--
ALTER TABLE `SISWA`
  ADD CONSTRAINT `FK_DIWALI` FOREIGN KEY (`NIP`) REFERENCES `WALI_KELAS` (`NIP`),
  ADD CONSTRAINT `FK_MENGISI` FOREIGN KEY (`NIK`) REFERENCES `TU` (`NIK`);

--
-- Constraints for table `WALI_KELAS`
--
ALTER TABLE `WALI_KELAS`
  ADD CONSTRAINT `FK_MENGEDIT` FOREIGN KEY (`NIK`) REFERENCES `TU` (`NIK`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
