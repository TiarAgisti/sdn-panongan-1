-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2018 at 03:28 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

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
('G00001', '112333', 'Agisti', '1990-08-31', 'Laki-Laki', 'Binong Permai', '085817579282', '2018-08-17', 'U00001', '2018-08-17', 'U00001', 1);

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
('J00001', 1, 'K00001', 'M00001', '2018-08-17', 'U00001', '2018-08-17', 'U00001', 1);

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
('K00002', 2, 'A', '2018-08-17', 'U00001', '2018-08-17', 'U00001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kenaikan_kelas`
--

CREATE TABLE `kenaikan_kelas` (
  `tahun_ajaran` int(11) NOT NULL,
  `dari_kode_kelas` varchar(6) NOT NULL,
  `ke_kode_kelas` varchar(6) NOT NULL,
  `created_date` date NOT NULL,
  `created_by` varchar(6) NOT NULL,
  `updated_date` date NOT NULL,
  `updated_by` varchar(6) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kenaikan_kelas`
--

INSERT INTO `kenaikan_kelas` (`tahun_ajaran`, `dari_kode_kelas`, `ke_kode_kelas`, `created_date`, `created_by`, `updated_date`, `updated_by`, `status`) VALUES
(2018, 'K00001', 'K00002', '2018-08-17', 'U00001', '2018-08-17', 'U00001', 1);

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
('M00001', 'Matematika', '2018-08-17', 'U00001', '2018-08-17', 'U00001', 1);

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
('S00001', '225', 'Tiar', '1990-08-31', 'Laki-Laki', 'Binong', '085817579282', 'K00001', 2018, '2018-08-17', 'U00001', '2018-08-17', 'U00001', 1);

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
('S00001', 'K00001', 'M00001', 2018, 78, '2018-08-17', 'U00001', '2018-08-17', 'U00001', 1);

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
('U00001', 'Tiar', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru', NULL, '', NULL, '', 1);

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
('W00001', 'G00001', 'K00001', 2018, '2018-08-17', 'U00001', '2018-08-17', 'U00001', 1);

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
-- Indexes for table `kenaikan_kelas`
--
ALTER TABLE `kenaikan_kelas`
  ADD PRIMARY KEY (`tahun_ajaran`,`dari_kode_kelas`,`ke_kode_kelas`);

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
  ADD PRIMARY KEY (`kode_murid`,`kode_kelas`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
