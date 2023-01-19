-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2023 at 07:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `asisten`
--

CREATE TABLE `asisten` (
  `mahasiswa_nrp_mahasiswa` int(11) NOT NULL,
  `jadwal_dosen_nrp_dosen` int(11) NOT NULL,
  `jadwal_matkul_kode_matkul` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `asisten`
--

INSERT INTO `asisten` (`mahasiswa_nrp_mahasiswa`, `jadwal_dosen_nrp_dosen`, `jadwal_matkul_kode_matkul`) VALUES
(2072012, 7200002, 'IN252'),
(2072032, 7200001, 'IN253');

-- --------------------------------------------------------

--
-- Table structure for table `det_jadwal`
--

CREATE TABLE `det_jadwal` (
  `tanggal` date NOT NULL,
  `pertemuan_ke` int(11) DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `materi` varchar(200) DEFAULT NULL,
  `ket_pbm` varchar(500) DEFAULT NULL,
  `jumlah_asisten` int(11) DEFAULT NULL,
  `jadwal_dosen_nrp_dosen` int(11) NOT NULL,
  `jadwal_matkul_kode_matkul` varchar(10) NOT NULL,
  `jadwal_ruangan_nama_ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `det_jadwal`
--

INSERT INTO `det_jadwal` (`tanggal`, `pertemuan_ke`, `waktu`, `materi`, `ket_pbm`, `jumlah_asisten`, `jadwal_dosen_nrp_dosen`, `jadwal_matkul_kode_matkul`, `jadwal_ruangan_nama_ruangan`) VALUES
('2022-11-03', 1, '09:42:49', 'Ujian Tengah Semester', 'Semua Hadir', 1, 7200001, 'IN253', 'Lab Adv 2'),
('2022-11-03', 1, '08:32:44', 'Ujian Tengah Semester', 'Semua Hadir', 1, 7200002, 'IN252', 'Lab Adv 3');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nrp_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nrp_dosen`, `nama_dosen`) VALUES
(123982, 'halo'),
(7200001, 'Robby Tan'),
(7200002, 'Sulaeman Santoso'),
(7200003, 'hendra');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `dosen_nrp_dosen` int(11) NOT NULL,
  `matkul_kode_matkul` varchar(10) NOT NULL,
  `ruangan_nama_ruangan` varchar(50) NOT NULL,
  `semester_semester_ke` int(11) NOT NULL,
  `kelas` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`dosen_nrp_dosen`, `matkul_kode_matkul`, `ruangan_nama_ruangan`, `semester_semester_ke`, `kelas`) VALUES
(7200001, 'in0098', 'gbryh', 1, 'A'),
(7200001, 'IN253', 'Lab Adv 2', 5, 'B'),
(7200002, 'IN252', 'Lab Adv 3', 5, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp_mahasiswa`, `nama_mahasiswa`) VALUES
(1234, 'feranvin'),
(2072012, 'Jason Himendrian'),
(2072032, 'Alvin Augus');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `kode_matkul` varchar(10) NOT NULL,
  `nama_matkul` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`kode_matkul`, `nama_matkul`) VALUES
('1234in', 'biologi'),
('in0098', 'sfsfgfs'),
('IN252', 'Grafika Komputer'),
('IN253', 'Proyek Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `nama_ruangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`nama_ruangan`) VALUES
('gbryh'),
('Lab Adv 1'),
('Lab Adv 2'),
('Lab Adv 3'),
('Multi Media');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_ke` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_ke`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(9),
(10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','tu','dosen') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`) VALUES
('admin', '1234', 'admin'),
('dosen', '1234', 'dosen'),
('tu', '1234', 'tu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asisten`
--
ALTER TABLE `asisten`
  ADD PRIMARY KEY (`mahasiswa_nrp_mahasiswa`,`jadwal_dosen_nrp_dosen`,`jadwal_matkul_kode_matkul`),
  ADD KEY `fk_mahasiswa_has_jadwal_jadwal1_idx` (`jadwal_dosen_nrp_dosen`,`jadwal_matkul_kode_matkul`),
  ADD KEY `fk_mahasiswa_has_jadwal_mahasiswa1_idx` (`mahasiswa_nrp_mahasiswa`);

--
-- Indexes for table `det_jadwal`
--
ALTER TABLE `det_jadwal`
  ADD PRIMARY KEY (`tanggal`,`jadwal_dosen_nrp_dosen`,`jadwal_matkul_kode_matkul`,`jadwal_ruangan_nama_ruangan`),
  ADD KEY `fk_det_jadwal_jadwal1_idx` (`jadwal_dosen_nrp_dosen`,`jadwal_matkul_kode_matkul`,`jadwal_ruangan_nama_ruangan`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nrp_dosen`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`dosen_nrp_dosen`,`matkul_kode_matkul`,`ruangan_nama_ruangan`,`semester_semester_ke`,`kelas`),
  ADD KEY `fk_dosen_has_matkul_matkul1_idx` (`matkul_kode_matkul`),
  ADD KEY `fk_dosen_has_matkul_dosen_idx` (`dosen_nrp_dosen`),
  ADD KEY `fk_jadwal_ruangan1_idx` (`ruangan_nama_ruangan`),
  ADD KEY `fk_jadwal_semester1_idx` (`semester_semester_ke`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp_mahasiswa`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`nama_ruangan`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_ke`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asisten`
--
ALTER TABLE `asisten`
  ADD CONSTRAINT `fk_mahasiswa_has_jadwal_jadwal1` FOREIGN KEY (`jadwal_dosen_nrp_dosen`,`jadwal_matkul_kode_matkul`) REFERENCES `jadwal` (`dosen_nrp_dosen`, `matkul_kode_matkul`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mahasiswa_has_jadwal_mahasiswa1` FOREIGN KEY (`mahasiswa_nrp_mahasiswa`) REFERENCES `mahasiswa` (`nrp_mahasiswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `det_jadwal`
--
ALTER TABLE `det_jadwal`
  ADD CONSTRAINT `fk_det_jadwal_jadwal1` FOREIGN KEY (`jadwal_dosen_nrp_dosen`,`jadwal_matkul_kode_matkul`,`jadwal_ruangan_nama_ruangan`) REFERENCES `jadwal` (`dosen_nrp_dosen`, `matkul_kode_matkul`, `ruangan_nama_ruangan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_dosen_has_matkul_dosen` FOREIGN KEY (`dosen_nrp_dosen`) REFERENCES `dosen` (`nrp_dosen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dosen_has_matkul_matkul1` FOREIGN KEY (`matkul_kode_matkul`) REFERENCES `matkul` (`kode_matkul`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jadwal_ruangan1` FOREIGN KEY (`ruangan_nama_ruangan`) REFERENCES `ruangan` (`nama_ruangan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jadwal_semester1` FOREIGN KEY (`semester_semester_ke`) REFERENCES `semester` (`semester_ke`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
