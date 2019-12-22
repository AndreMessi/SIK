-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2019 at 02:59 PM
-- Server version: 10.4.10-MariaDB-1:10.4.10+maria~bionic-log
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kompen`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `nohp` char(15) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `nohp`, `alamat`) VALUES
(1, 'Pulut Suryanti', '087654789123', 'Bantul Yogyakarta'),
(2, 'Yosef Murya', '087717654789', 'Jakal Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `kompensasi`
--

CREATE TABLE `kompensasi` (
  `id_kompensasi` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_matakuliah` int(11) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `pertemuan_matkul` int(5) NOT NULL,
  `thn_akademik` date NOT NULL,
  `semester` varchar(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kompensasi`
--

INSERT INTO `kompensasi` (`id_kompensasi`, `id_mahasiswa`, `id_matakuliah`, `kelas`, `pertemuan_matkul`, `thn_akademik`, `semester`, `id_dosen`, `status`) VALUES
(1, 1, 1, '10', 10, '2019-12-18', '10', 1, 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `nohp` char(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `jurusan`, `nohp`, `email`, `gambar`) VALUES
(1, 11, 'adi', 'ti', '087', 'adi@mail', 'hhh.jpg'),
(8, 234, 'hanip', 'ti', '098', 'hanip@mail', 'absen.png'),
(9, 165, 'pri', 'ti', '09822', 'pri@mail.com', 'absen1.png'),
(10, 11122, 'as', 'a', '1', 'SA', 'absen2.png'),
(11, 11122, 'as', 'a', '1', 'SA', 'absen3.png'),
(12, 5, 'as', 'a', '1', 'SA', 'karyawan1.png'),
(13, 9, 'as', 'a', '1', 'SA', 'absen4.png'),
(14, 9, 'as', 'a', '1', 'SA', 'absen5.png'),
(15, 9, 'as', 'a', '1', 'SA', 'absen6.png'),
(16, 9, 'as', 'a', '1', 'SA', 'absen7.png'),
(17, 9, 'as', 'a', '1', 'SA', 'absen8.png'),
(18, 9, 'as', 'a', '1', 'SA', 'absen9.png'),
(19, 10, 'as', 'a', '1', 'SA', 'absen10.png'),
(20, 10, 'as', 'a', '1', 'SA', 'agenda1.png'),
(21, 13, 'as', 'a', '1', 'SA', 'absen11.png'),
(22, 14, 'ikeh', 'hahah', '988', 'A@mail', 'agenda2.png');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matakuliah` int(11) NOT NULL,
  `kd_matkul` char(11) NOT NULL,
  `nama_matkul` varchar(25) NOT NULL,
  `jlmh_sks` int(5) NOT NULL,
  `kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id_matakuliah`, `kd_matkul`, `nama_matkul`, `jlmh_sks`, `kelas`) VALUES
(1, '123456', 'Pemerograman Web', 2, 'TI4'),
(2, 'kmz', 'matematika dasar', 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` enum('admin','user','prodi') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `role`) VALUES
(1, 'madara', 'ed06a360b820d6a9a2bcf218f53b9922', 'uciha madara', 'admin'),
(2, 'naruto', 'ed06a360b820d6a9a2bcf218f53b9922', 'uzumaki naruto', 'user'),
(3, 'sasuke', 'ed06a360b820d6a9a2bcf218f53b9922', 'uciha sasuke', 'prodi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `kompensasi`
--
ALTER TABLE `kompensasi`
  ADD PRIMARY KEY (`id_kompensasi`),
  ADD KEY `id_matakuliah` (`id_matakuliah`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kompensasi`
--
ALTER TABLE `kompensasi`
  MODIFY `id_kompensasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kompensasi`
--
ALTER TABLE `kompensasi`
  ADD CONSTRAINT `kompensasi_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `kompensasi_ibfk_2` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id_matakuliah`),
  ADD CONSTRAINT `kompensasi_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
