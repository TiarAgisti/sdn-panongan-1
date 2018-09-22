-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 22, 2018 at 04:58 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sd_panongan`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kode_guru` varchar(6) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `nama_guru` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(6) NOT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_by` varchar(6) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kode_guru`, `nip`, `nama_guru`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telp`, `created_date`, `created_by`, `updated_date`, `updated_by`, `status`) VALUES
('G00001', '112333', 'Boby', '1990-08-31', 'Laki-Laki', 'Binong Permai', '085817579282', '2018-08-17', 'U00001', '2018-09-06', 'G00001', 0),
('G00002', '12', 'April', '2004-04-04', 'Perempuan', 'Citra', '1212', '2018-09-06', 'G00001', '2018-09-09', 'U00002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_mapel`
--

CREATE TABLE `jadwal_mapel` (
  `kode_jadwal` varchar(6) NOT NULL,
  `hari` int(11) NOT NULL,
  `kode_kelas` varchar(6) NOT NULL,
  `kode_mapel` varchar(6) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(6) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_by` varchar(6) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_mapel`
--

INSERT INTO `jadwal_mapel` (`kode_jadwal`, `hari`, `kode_kelas`, `kode_mapel`, `created_date`, `created_by`, `updated_date`, `updated_by`, `status`) VALUES
('J00001', 1, 'K00004', '', '2018-08-17', 'U00001', '2018-09-11', 'U00002', 1),
('J00002', 2, 'K00003', 'M00004', '2018-09-11', 'U00002', '2018-09-11', 'U00002', 0),
('J00003', 3, 'K00004', 'M00004', '2018-09-11', 'U00002', '2018-09-11', 'U00002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(6) NOT NULL,
  `tingkat_kelas` int(11) NOT NULL,
  `keterangan_tingkat` varchar(2) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(6) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_by` varchar(6) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `tingkat_kelas`, `keterangan_tingkat`, `created_date`, `created_by`, `updated_date`, `updated_by`, `status`) VALUES
('K00001', 1, 'A', '2018-08-17', 'U00001', '2018-08-17', 'U00001', 1),
('K00002', 2, 'A', '2018-08-17', 'U00001', '2018-08-17', 'U00001', 0),
('K00003', 1, 'D', '2018-09-06', 'G00001', '2018-09-06', 'G00001', 1),
('K00004', 2, 'A', '2018-09-06', 'G00001', '2018-09-06', 'G00001', 1),
('K00005', 3, 'A', '2018-09-06', 'G00001', '2018-09-06', 'G00001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kkm_murid`
--

CREATE TABLE `kkm_murid` (
  `kode_kkm` varchar(6) NOT NULL,
  `kode_mapel` varchar(6) NOT NULL,
  `tingkat_kelas` int(11) NOT NULL,
  `nilai_kkm` int(11) NOT NULL,
  `created_by` varchar(6) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` varchar(6) NOT NULL,
  `updated_date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kkm_murid`
--

INSERT INTO `kkm_murid` (`kode_kkm`, `kode_mapel`, `tingkat_kelas`, `nilai_kkm`, `created_by`, `created_date`, `updated_by`, `updated_date`, `status`) VALUES
('N00001', 'M00001', 1, 65, 'U00002', '2018-09-16', 'U00002', '2018-09-16', 1),
('N00002', 'M00002', 2, 55, 'U00002', '2018-09-16', 'U00002', '2018-09-16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_mapel` varchar(6) NOT NULL,
  `nama_mapel` varchar(150) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(6) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_by` varchar(6) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mapel`, `nama_mapel`, `created_date`, `created_by`, `updated_date`, `updated_by`, `status`) VALUES
('M00001', 'Bahasa Inggris', '2018-08-17', 'U00001', '2018-08-17', 'U00001', 1),
('M00002', 'Bahasa Indonesia', '2018-08-27', 'G00001', '2018-08-27', 'G00001', 1),
('M00003', 'IP', '2018-08-27', 'G00001', '2018-09-06', 'G00001', 0),
('M00004', 'IPS', '2018-08-27', 'G00001', '2018-08-27', 'G00001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `kode_murid` varchar(6) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_murid` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `kode_kelas` varchar(6) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(6) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_by` varchar(6) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`kode_murid`, `nisn`, `nama_murid`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telp`, `kode_kelas`, `tahun_ajaran`, `created_date`, `created_by`, `updated_date`, `updated_by`, `status`) VALUES
('S00001', '225', 'Tiar', '1990-08-31', 'Laki-Laki', 'Binong', '085817579282', 'K00001', 2018, '2018-08-17', 'U00001', '2018-09-09', 'U00002', 1),
('S00002', '113', 'April', '1996-01-01', 'Perempuan', 'citra', '01', 'K00004', 2018, '2018-09-09', 'U00002', '2018-09-10', 'U00002', 1),
('S00003', '111', 'Agus', '2005-01-01', 'Laki-Laki', 'citra', '111', 'K00001', 2018, '2018-09-11', 'U00002', '2018-09-11', 'U00002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_murid`
--

CREATE TABLE `nilai_murid` (
  `kode_murid` varchar(6) NOT NULL,
  `kode_kelas` varchar(6) NOT NULL,
  `kode_mapel` varchar(6) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(6) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_by` varchar(6) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_murid`
--

INSERT INTO `nilai_murid` (`kode_murid`, `kode_kelas`, `kode_mapel`, `tahun_ajaran`, `nilai`, `created_date`, `created_by`, `updated_date`, `updated_by`, `status`) VALUES
('S00001', 'K00001', 'M00001', 2018, 78, '2018-08-17', 'U00001', '2018-08-17', 'U00001', 1),
('S00001', 'K00001', 'M00002', 2018, 93, '2018-09-11', 'U00002', '2018-09-13', 'U00002', 1),
('S00001', 'K00001', 'M00004', 2018, 91, '2018-09-11', 'U00002', '2018-09-13', 'U00002', 1),
('S00002', 'K00004', 'M00002', 2018, 90, '2018-09-11', 'U00002', '2018-09-11', 'U00002', 1),
('S00003', 'K00001', 'M00002', 2018, 70, '2018-09-11', 'U00002', '2018-09-11', 'U00002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `raport_detail`
--

CREATE TABLE `raport_detail` (
  `kode_raport_detail` bigint(20) NOT NULL,
  `kode_raport` bigint(20) NOT NULL,
  `kode_mapel` varchar(6) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `raport_header`
--

CREATE TABLE `raport_header` (
  `kode_raport` bigint(20) NOT NULL,
  `kode_guru` varchar(6) NOT NULL,
  `kode_murid` varchar(6) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `ijin` int(11) NOT NULL,
  `alpa` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(6) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` varchar(6) NOT NULL,
  `kode_kelas` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `kode_user` varchar(6) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password_user` varchar(500) NOT NULL,
  `tipe_user` varchar(20) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(6) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_by` varchar(6) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`kode_user`, `nama_user`, `password_user`, `tipe_user`, `created_date`, `created_by`, `updated_date`, `updated_by`, `status`) VALUES
('G00001', 'Tiara Agisti', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru', NULL, '', '2018-09-09', 'G00001', 0),
('U00002', 'Agie', 'e10adc3949ba59abbe56e057f20f883e', 'Guru', '2018-09-06', 'G00001', '2018-09-09', 'U00002', 1),
('U00003', 'April', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru', '2018-09-06', 'U00002', '2018-09-06', 'U00002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `kode_wali` varchar(6) NOT NULL,
  `kode_guru` varchar(6) NOT NULL,
  `kode_kelas` varchar(6) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `created_date` date DEFAULT NULL,
  `created_by` varchar(6) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_by` varchar(6) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`kode_wali`, `kode_guru`, `kode_kelas`, `tahun_ajaran`, `created_date`, `created_by`, `updated_date`, `updated_by`, `status`) VALUES
('W00001', 'G00002', 'K00004', 2018, '2018-08-17', 'U00001', '2018-09-10', 'U00002', 0),
('W00002', 'G00002', 'K00003', 2018, '2018-09-10', 'U00002', '2018-09-10', 'U00002', 1),
('W00003', 'G00002', 'K00001', 2018, '2018-09-11', 'U00002', '2018-09-11', 'U00002', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kode_guru`);

--
-- Indexes for table `jadwal_mapel`
--
ALTER TABLE `jadwal_mapel`
  ADD PRIMARY KEY (`kode_jadwal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `kkm_murid`
--
ALTER TABLE `kkm_murid`
  ADD PRIMARY KEY (`kode_kkm`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`kode_murid`);

--
-- Indexes for table `nilai_murid`
--
ALTER TABLE `nilai_murid`
  ADD PRIMARY KEY (`kode_murid`,`kode_kelas`,`kode_mapel`);

--
-- Indexes for table `raport_detail`
--
ALTER TABLE `raport_detail`
  ADD PRIMARY KEY (`kode_raport_detail`);

--
-- Indexes for table `raport_header`
--
ALTER TABLE `raport_header`
  ADD PRIMARY KEY (`kode_raport`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`kode_wali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `raport_detail`
--
ALTER TABLE `raport_detail`
  MODIFY `kode_raport_detail` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
