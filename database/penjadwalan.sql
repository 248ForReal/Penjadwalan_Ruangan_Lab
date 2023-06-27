-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 07:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(5) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `username`) VALUES
(1, 'Admin'),
(2, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `tblhari`
--

CREATE TABLE `tblhari` (
  `id_hari` int(7) NOT NULL,
  `nama_hari` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblhari`
--

INSERT INTO `tblhari` (`id_hari`, `nama_hari`) VALUES
(1, 'senin'),
(2, 'selasa'),
(3, 'rabu'),
(4, 'kamis'),
(5, 'jumat'),
(6, 'sabtu'),
(7, 'minggu');

-- --------------------------------------------------------

--
-- Table structure for table `tblkelas`
--

CREATE TABLE `tblkelas` (
  `id_kelas` int(20) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblkelas`
--

INSERT INTO `tblkelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'MI-1A'),
(2, 'MI-1B'),
(3, 'MI-1C'),
(4, 'MI-1D'),
(5, 'MI-2A'),
(6, 'MI-2B'),
(7, 'MI-2C'),
(8, 'MI-2D'),
(9, 'MI-3A'),
(10, 'MI-3B'),
(11, 'MI-3C'),
(12, 'MI-3D'),
(13, 'MI-4A'),
(14, 'MI-4B'),
(15, 'MI-4C'),
(16, 'MI-4D'),
(17, 'MI-5A'),
(18, 'MI-5B'),
(19, 'MI-5C'),
(20, 'MI-5D');

-- --------------------------------------------------------

--
-- Table structure for table `tblreq`
--

CREATE TABLE `tblreq` (
  `id_req` int(20) NOT NULL,
  `nim` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` int(20) NOT NULL,
  `ruangan` int(20) NOT NULL,
  `hari` int(20) NOT NULL,
  `jam` int(20) NOT NULL,
  `proses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreq`
--

INSERT INTO `tblreq` (`id_req`, `nim`, `nama`, `kelas`, `ruangan`, `hari`, `jam`, `proses`) VALUES
(36, 2105102021, 'Revangga Prakusya Damanik', 9, 1, 1, 1, 'diterima'),
(37, 2105102021, 'Revangga Prakusya Damanik', 9, 1, 1, 2, 'diterima'),
(38, 2105102021, 'Revangga Prakusya Damanik', 9, 1, 1, 3, 'diterima'),
(39, 2105102021, 'Revangga Prakusya Damanik', 9, 1, 1, 4, 'diterima'),
(40, 2105102021, 'Revangga Prakusya Damanik', 9, 1, 1, 5, 'diterima'),
(41, 2105102021, 'Revangga Prakusya Damanik', 9, 1, 1, 6, 'diterima'),
(42, 2105102021, 'Revangga Prakusya Damanik', 9, 1, 2, 1, 'diterima'),
(43, 2105102021, 'Revangga Prakusya Damanik', 9, 1, 2, 2, 'diterima'),
(44, 2105102021, 'Revangga Prakusya Damanik', 9, 1, 2, 3, 'diterima'),
(45, 2105102021, 'Revangga Prakusya Damanik', 9, 1, 2, 4, 'diterima'),
(46, 2105102025, 'M. rauf Athila', 1, 1, 1, 1, 'ditolak'),
(47, 2105102025, 'M. rauf Athila', 1, 1, 1, 1, 'ditolak'),
(48, 2105102025, 'M. rauf Athila', 1, 2, 1, 1, 'diterima'),
(49, 2105102025, 'M. rauf Athila', 1, 2, 1, 2, 'diterima'),
(50, 2105102025, 'M. rauf Athila', 1, 2, 1, 3, 'diterima'),
(51, 2105102025, 'M. rauf Athila', 1, 2, 1, 4, 'diterima'),
(52, 2105102025, 'M. rauf Athila', 1, 2, 1, 5, 'diterima'),
(53, 2105102025, 'M. rauf Athila', 1, 2, 1, 6, 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `tblruangan`
--

CREATE TABLE `tblruangan` (
  `id_ruangan` int(20) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblruangan`
--

INSERT INTO `tblruangan` (`id_ruangan`, `nama_ruangan`) VALUES
(1, 'U-201'),
(2, 'U-202'),
(3, 'U-203'),
(4, 'U-204'),
(5, 'U-301'),
(6, 'U-302'),
(7, 'U-303'),
(8, 'U-304');

-- --------------------------------------------------------

--
-- Table structure for table `tblta`
--

CREATE TABLE `tblta` (
  `tahun ajar` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblta`
--

INSERT INTO `tblta` (`tahun ajar`, `semester`) VALUES
('2022/2023', 'Genap'),
('2022/2023', 'Ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `kelas` int(100) NOT NULL,
  `id_level` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nim`, `fullname`, `kelas`, `id_level`) VALUES
(1, 'admin', '1234', '', 'Revangga Prakusya Damanik', 0, 1),
(10, 'revangga', '1234', '2105102021', 'Revangga Prakusya Damanik', 9, 2),
(11, 'raup', '1234', '2105102025', 'M. rauf Athila', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE `waktu` (
  `id_waktu` int(20) NOT NULL,
  `waktu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waktu`
--

INSERT INTO `waktu` (`id_waktu`, `waktu`) VALUES
(1, '07.30 - 08.20'),
(2, '08.20 - 09.10'),
(3, '09.10 - 10.00'),
(4, '10.15 - 11.05'),
(5, '11.05 - 11.55'),
(6, '11.55 - 12.45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tblhari`
--
ALTER TABLE `tblhari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `tblkelas`
--
ALTER TABLE `tblkelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tblreq`
--
ALTER TABLE `tblreq`
  ADD PRIMARY KEY (`id_req`),
  ADD KEY `kelas` (`kelas`,`ruangan`,`hari`,`jam`),
  ADD KEY `hari` (`hari`);

--
-- Indexes for table `tblruangan`
--
ALTER TABLE `tblruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblhari`
--
ALTER TABLE `tblhari`
  MODIFY `id_hari` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblkelas`
--
ALTER TABLE `tblkelas`
  MODIFY `id_kelas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblreq`
--
ALTER TABLE `tblreq`
  MODIFY `id_req` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tblruangan`
--
ALTER TABLE `tblruangan`
  MODIFY `id_ruangan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id_waktu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblreq`
--
ALTER TABLE `tblreq`
  ADD CONSTRAINT `tblreq_ibfk_1` FOREIGN KEY (`hari`) REFERENCES `tblhari` (`id_hari`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
