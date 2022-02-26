-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 05:48 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mpuska_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `ID_akun` int(3) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(125) NOT NULL,
  `hak_akses` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`ID_akun`, `username`, `password`, `hak_akses`) VALUES
(25, '1700018161', '$2y$10$zdNAp6zDPFjFW4Bf3t.YMujGiXD7ibMRotCYeEC3qWbHjXQI.t47G', '2'),
(26, '12345', '$2y$10$Qrjk7QZ05pMeKkgGZDfmv.n3kALdtoVefPnB/6IG.ZYJMCejHIgva', '1');

--
-- Triggers `akun`
--
DELIMITER $$
CREATE TRIGGER `buat_akun_dosen` AFTER INSERT ON `akun` FOR EACH ROW BEGIN
    	UPDATE dosen SET dosen.ID_akun = new.ID_akun WHERE dosen.niy = new.username;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `buat_akun_mahasiswa` AFTER INSERT ON `akun` FOR EACH ROW BEGIN
    	UPDATE mahasiswa SET mahasiswa.ID_akun = new.ID_akun WHERE mahasiswa.nim = new.username;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `asesmen`
--

CREATE TABLE `asesmen` (
  `ID_asesmen` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ca_alamat_dosen`
--

CREATE TABLE `ca_alamat_dosen` (
  `niy` varchar(8) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ca_alamat_dosen`
--

INSERT INTO `ca_alamat_dosen` (`niy`, `alamat`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`) VALUES
('12345', 'Dusun Krajan 1 RT06 RW02', 'Lemahabang', 'Karawang', 'Jawa Barat', '41383'),
('67890', 'Kertopaten', 'Srimulyo', 'Bantul', 'D.I. Yogyakarta', '12345'),
('54321', 'Kradenan', 'Imogiri', 'Bantul', 'D.I. Yogyakarta', '56789');

-- --------------------------------------------------------

--
-- Table structure for table `ca_alamat_mahasiswa`
--

CREATE TABLE `ca_alamat_mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ca_alamat_mahasiswa`
--

INSERT INTO `ca_alamat_mahasiswa` (`nim`, `alamat`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`) VALUES
('1700018161', 'Dusun Kradenan, Desa Sitimulyo', 'Piyungan', 'Bantul', 'DI Yogyakarta', '55792'),
('1800018001', 'Jl. Solo', 'Sleman', 'Sleman', 'D.I. Yogyakarta', '56987');

-- --------------------------------------------------------

--
-- Table structure for table `ca_nama_dosen`
--

CREATE TABLE `ca_nama_dosen` (
  `niy` varchar(8) NOT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_tengah` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ca_nama_dosen`
--

INSERT INTO `ca_nama_dosen` (`niy`, `nama_depan`, `nama_tengah`, `nama_belakang`) VALUES
('12345', 'Isnan', 'Arif', 'Cahyadi'),
('67890', 'Fulani', 'Fulina', ''),
('54321', 'Dini', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ca_nama_mahasiswa`
--

CREATE TABLE `ca_nama_mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_tengah` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ca_nama_mahasiswa`
--

INSERT INTO `ca_nama_mahasiswa` (`nim`, `nama_depan`, `nama_tengah`, `nama_belakang`) VALUES
('1700018161', 'Isnan', 'Arif', 'Cahyadi'),
('1800018001', 'Fulana', 'F', '');

-- --------------------------------------------------------

--
-- Table structure for table `cpl`
--

CREATE TABLE `cpl` (
  `ID_pencapaian` int(3) NOT NULL,
  `cpl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cpmk`
--

CREATE TABLE `cpmk` (
  `ID_pencapaian` int(3) NOT NULL,
  `cpmk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `niy` varchar(8) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `ID_akun` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`niy`, `gender`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `email`, `foto`, `ID_akun`) VALUES
('12345', '1', 'Karawang', '1990-05-22', '082111336643', 'isnan@tif.uad.ac.id', NULL, 26),
('54321', '0', 'Wates', '1990-11-14', '082122223333', 'dini@tif.uad.ac.id', NULL, NULL),
('67890', '0', 'Klaten', '1990-03-07', '082111112222', 'fulani@tif.uad.ac.id', NULL, NULL);

--
-- Triggers `dosen`
--
DELIMITER $$
CREATE TRIGGER `delete_data_dosen` BEFORE DELETE ON `dosen` FOR EACH ROW BEGIN
	DELETE ca_nama_dosen FROM dosen JOIN ca_nama_dosen ON dosen.niy = ca_nama_dosen.niy WHERE dosen.niy = old.niy;
    DELETE ca_alamat_dosen FROM dosen JOIN ca_alamat_dosen ON dosen.niy = ca_alamat_dosen.niy WHERE dosen.niy = old.niy;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE `khs` (
  `ID_krs` int(11) NOT NULL,
  `ID_asesmen` int(3) NOT NULL,
  `nilai` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `ID_krs` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `kode_matkul` varchar(9) NOT NULL,
  `kelas` varchar(1) NOT NULL,
  `thn_ajaran` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `ID_akun` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `gender`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `email`, `foto`, `ID_akun`) VALUES
('1700018161', '1', 'Klaten', '1999-05-22', '082111336643', 'isnan1700018161@webmail.uad.ac.id', NULL, 25),
('1800018001', '1', 'Karawang', '2000-04-13', '082155556666', 'fulana18000180001@webmail.uad.ac.id', NULL, NULL);

--
-- Triggers `mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `delete_data_akun_mahasiswa` BEFORE DELETE ON `mahasiswa` FOR EACH ROW BEGIN
	DELETE akun FROM akun JOIN mahasiswa ON akun.ID_akun = mahasiswa.ID_akun WHERE akun.ID_akun = old.ID_akun;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_data_mahasiswa` BEFORE DELETE ON `mahasiswa` FOR EACH ROW BEGIN
	DELETE ca_nama_mahasiswa FROM mahasiswa JOIN ca_nama_mahasiswa ON mahasiswa.nim = ca_nama_mahasiswa.nim WHERE mahasiswa.nim = old.nim;
    DELETE ca_alamat_mahasiswa FROM mahasiswa JOIN ca_alamat_mahasiswa ON mahasiswa.nim = ca_alamat_mahasiswa.nim WHERE mahasiswa.nim = old.nim;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_matkul` varchar(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `semester` varchar(1) NOT NULL,
  `sks` int(2) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode_matkul`, `nama`, `semester`, `sks`, `prodi`) VALUES
('12345', 'Logika Informatika', '2', 3, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `pencapaian`
--

CREATE TABLE `pencapaian` (
  `ID_pencapaian` int(3) NOT NULL,
  `kode_matkul` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengampu`
--

CREATE TABLE `pengampu` (
  `niy` varchar(8) NOT NULL,
  `kode_matkul` varchar(9) NOT NULL,
  `kelas` varchar(1) NOT NULL,
  `thn_ajaran` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`ID_akun`);

--
-- Indexes for table `asesmen`
--
ALTER TABLE `asesmen`
  ADD PRIMARY KEY (`ID_asesmen`);

--
-- Indexes for table `ca_alamat_dosen`
--
ALTER TABLE `ca_alamat_dosen`
  ADD KEY `niy` (`niy`);

--
-- Indexes for table `ca_alamat_mahasiswa`
--
ALTER TABLE `ca_alamat_mahasiswa`
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `ca_nama_dosen`
--
ALTER TABLE `ca_nama_dosen`
  ADD KEY `niy` (`niy`);

--
-- Indexes for table `ca_nama_mahasiswa`
--
ALTER TABLE `ca_nama_mahasiswa`
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `cpl`
--
ALTER TABLE `cpl`
  ADD KEY `ID_pencapaian` (`ID_pencapaian`);

--
-- Indexes for table `cpmk`
--
ALTER TABLE `cpmk`
  ADD KEY `ID_pencapaian` (`ID_pencapaian`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`niy`),
  ADD KEY `ID_akun` (`ID_akun`);

--
-- Indexes for table `khs`
--
ALTER TABLE `khs`
  ADD KEY `ID_krs` (`ID_krs`),
  ADD KEY `ID_asesmen` (`ID_asesmen`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`ID_krs`),
  ADD KEY `nim` (`nim`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `ID_akun` (`ID_akun`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indexes for table `pencapaian`
--
ALTER TABLE `pencapaian`
  ADD PRIMARY KEY (`ID_pencapaian`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `pengampu`
--
ALTER TABLE `pengampu`
  ADD KEY `niy` (`niy`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `ID_akun` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `asesmen`
--
ALTER TABLE `asesmen`
  MODIFY `ID_asesmen` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `ID_krs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pencapaian`
--
ALTER TABLE `pencapaian`
  MODIFY `ID_pencapaian` int(3) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ca_alamat_dosen`
--
ALTER TABLE `ca_alamat_dosen`
  ADD CONSTRAINT `ca_alamat_dosen_ibfk_1` FOREIGN KEY (`niy`) REFERENCES `dosen` (`niy`);

--
-- Constraints for table `ca_alamat_mahasiswa`
--
ALTER TABLE `ca_alamat_mahasiswa`
  ADD CONSTRAINT `ca_alamat_mahasiswa_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `ca_nama_dosen`
--
ALTER TABLE `ca_nama_dosen`
  ADD CONSTRAINT `ca_nama_dosen_ibfk_1` FOREIGN KEY (`niy`) REFERENCES `dosen` (`niy`);

--
-- Constraints for table `ca_nama_mahasiswa`
--
ALTER TABLE `ca_nama_mahasiswa`
  ADD CONSTRAINT `ca_nama_mahasiswa_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `cpl`
--
ALTER TABLE `cpl`
  ADD CONSTRAINT `cpl_ibfk_1` FOREIGN KEY (`ID_pencapaian`) REFERENCES `pencapaian` (`ID_pencapaian`);

--
-- Constraints for table `cpmk`
--
ALTER TABLE `cpmk`
  ADD CONSTRAINT `cpmk_ibfk_1` FOREIGN KEY (`ID_pencapaian`) REFERENCES `pencapaian` (`ID_pencapaian`);

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `khs`
--
ALTER TABLE `khs`
  ADD CONSTRAINT `khs_ibfk_1` FOREIGN KEY (`ID_krs`) REFERENCES `krs` (`ID_krs`),
  ADD CONSTRAINT `khs_ibfk_2` FOREIGN KEY (`ID_asesmen`) REFERENCES `asesmen` (`ID_asesmen`);

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`),
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pencapaian`
--
ALTER TABLE `pencapaian`
  ADD CONSTRAINT `pencapaian_ibfk_1` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`);

--
-- Constraints for table `pengampu`
--
ALTER TABLE `pengampu`
  ADD CONSTRAINT `pengampu_ibfk_1` FOREIGN KEY (`niy`) REFERENCES `dosen` (`niy`),
  ADD CONSTRAINT `pengampu_ibfk_2` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
