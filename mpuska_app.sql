-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2022 at 09:28 AM
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
  `username` varchar(18) NOT NULL,
  `password` varchar(125) NOT NULL,
  `hak_akses` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `akun`
--
DELIMITER $$
CREATE TRIGGER `buat_akun_dosen` AFTER INSERT ON `akun` FOR EACH ROW BEGIN
    	UPDATE dosen SET dosen.ID_akun = new.ID_akun WHERE dosen.niy_nip = new.username;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `buat_akun_mahasiswa` AFTER INSERT ON `akun` FOR EACH ROW BEGIN
    	UPDATE mahasiswa SET mahasiswa.ID_akun = new.ID_akun WHERE mahasiswa.nim = new.username;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_akun_dosen` BEFORE DELETE ON `akun` FOR EACH ROW BEGIN
    	UPDATE dosen SET dosen.ID_akun = null WHERE dosen.niy_nip = old.username;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_akun_mahasiswa` BEFORE DELETE ON `akun` FOR EACH ROW BEGIN
    	UPDATE mahasiswa SET mahasiswa.ID_akun = null WHERE mahasiswa.nim = old.username;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `asesmen`
--

CREATE TABLE `asesmen` (
  `ID_asesmen` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ca_nama_dosen`
--

CREATE TABLE `ca_nama_dosen` (
  `niy_nip` varchar(18) NOT NULL,
  `gelar_depan` varchar(10) DEFAULT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_tengah` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `gelar_belakang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ca_nama_dosen`
--

INSERT INTO `ca_nama_dosen` (`niy_nip`, `gelar_depan`, `nama_depan`, `nama_tengah`, `nama_belakang`, `gelar_belakang`) VALUES
('60150841', '', 'Adhi', '', 'Prahara', 'S.Si., M.Cs.'),
('60160863', '', 'Ahmad', '', 'Azhari', 'S.Kom., M.Eng.'),
('197310142005011001', '', 'Ali', '', 'Tarmuji', 'S.T., M.Cs.'),
('60130757', '', 'Andri', '', 'Pranolo', 'S.Kom., M.Cs.'),
('60110647', '', 'Anna', 'Hendri Soleliza', 'Jones', 'S.Kom., M.Cs.'),
('60030476', '', 'Ardiansyah', '', '', 'S.T., M.Cs.'),
('60030480', 'Dr. Ir.', 'Ardi', '', 'Pujiyanta', 'M.T.'),
('60090586', '', 'Arfiani', 'Nur', 'Khusna', 'S.T., M.Kom.'),
('197907202005011002', '', 'Bambang', '', 'Robiin', 'S.T., M.T.'),
('060150842', '', 'Dewi', 'Pramudi', 'Ismi', 'S.T., M.CompSc'),
('60040497', '', 'Dewi', '', 'Soyusiawaty', 'S.T., M.T.'),
('60191223', '', 'Dinan', '', 'Yulianto', 'S.T., M.Eng.'),
('60160978', '', 'Dwi', '', 'Normawati', 'S.T., M.Eng.'),
('197002062005011001', '', 'Eko', '', 'Aribowo', 'S.T., M.Kom.'),
('60191224', '', 'Faisal', 'Fajri', 'Rahani', 'S.Si., M.Cs.'),
('198011152005011002', '', 'Fiftin', '', 'Noviyanto', 'S.T., M.Cs.'),
('60181172', '', 'Guntur', 'Maulana', 'Zamroni', 'B.Sc., M.Kom.'),
('60110648', '', 'Herman', '', 'Yuliansyah', 'S.T., M.Eng.'),
('60160951', '', 'Ika', '', 'Arfiani', 'S.T., M.Cs.'),
('60160979', '', 'Jefree', '', 'Fahana', 'S.T., M.Kom.'),
('60150773', '', 'Lisna', '', 'Zahrotun', 'S.T., M.Cs.'),
('60191225', '', 'Miftahurrahma', '', 'Rosyda', 'S.Kom, M.Eng.'),
('60030479', '', 'Muhammad', '', 'Aziz', 'S.T., M.Cs.'),
('60160960', '', 'Murein', 'Miksa', 'Mardhia', 'S.T., M.T.'),
('60040496', 'Dr.', 'Murinto', '', '', 'S.Si., M.Kom.'),
('60960147', '', 'Mushlihudin', '', '', 'S.T., M.T.'),
('60160980', '', 'Nuril', '', 'Anwar', 'S.T., M.Kom.'),
('197608192005012001', '', 'Nur Rochmah', 'Dyah', 'Puji Astuti', 'S.T., M.Kom.'),
('60980174', '', 'Rusydi', '', 'Umar', 'S.T., M.T., Ph.D.'),
('60020388', '', 'Sri', '', 'Winiarti', 'S.T., M.Cs.'),
('60160952', '', 'Supriyanto', '', '', 'S.T., M.T.'),
('60010314', '', 'Taufiq', '', 'Ismail', 'S.T., M.Cs.'),
('60030475', 'Drs.', 'Tedy', '', 'Setiadi', 'M.T.'),
('60910095', 'Drs.', 'Wahyu', '', 'Pujiyono', 'M.Kom.'),
('12345678', '', 'Isnan', 'Arif', 'Cahyadi', 'M.Kom.');

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

-- --------------------------------------------------------

--
-- Table structure for table `cpl`
--

CREATE TABLE `cpl` (
  `kode_matkul` varchar(9) NOT NULL,
  `cpl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cpmk`
--

CREATE TABLE `cpmk` (
  `kode_matkul` varchar(9) NOT NULL,
  `cpmk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `niy_nip` varchar(18) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `ID_akun` int(3) DEFAULT NULL,
  `status_mbkm` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`niy_nip`, `gender`, `no_hp`, `email`, `foto`, `ID_akun`, `status_mbkm`) VALUES
('060150842', '0', '', 'dewi.ismi@tif.uad.ac.id', NULL, NULL, '0'),
('12345678', '1', '082111336643', 'isnan.arif@tif.uad.ac.id', NULL, NULL, '0'),
('197002062005011001', '1', '', 'ekoab@tif.uad.ac.id', NULL, NULL, '0'),
('197310142005011001', '1', '', 'alitarmuji@tif.uad.ac.id', NULL, NULL, '0'),
('197608192005012001', '0', '', 'rochmahdyah@tif.uad.ac.id', NULL, NULL, '0'),
('197907202005011002', '1', '', 'bambang.robiin@tif.uad.ac.id', NULL, NULL, '0'),
('198011152005011002', '1', '', 'fiftin.noviyanto@tif.uad.ac.id', NULL, NULL, '0'),
('60010314', '1', '', 'taufiq@tif.uad.ac.id', NULL, NULL, '0'),
('60020388', '0', '', 'sri.winiarti@tif.uad.ac.id', NULL, NULL, '0'),
('60030475', '1', '', 'tedy.setiadi@tif.uad.ac.id', NULL, NULL, '0'),
('60030476', '1', '', 'ardiansyah@tif.uad.ac.id', NULL, NULL, '0'),
('60030479', '1', '', 'moch.aziz@tif.uad.ac.id', NULL, NULL, '0'),
('60030480', '1', '', 'ardipujiyanta@tif.uad.ac.id', NULL, NULL, '0'),
('60040496', '1', '', 'murintokusno@tif.uad.ac.id', NULL, NULL, '0'),
('60040497', '0', '', 'dewi.soyusiawati@tif.uad.ac.id', NULL, NULL, '0'),
('60090586', '0', '', 'arfiani.khusna@tif.uad.ac.id', NULL, NULL, '0'),
('60110647', '0', '', 'annahendri@tif.uad.ac.id', NULL, NULL, '0'),
('60110648', '1', '', 'herman.yuliansyah@tif.uad.ac.id', NULL, NULL, '0'),
('60130757', '1', '', 'andripranolo@tif.uad.ac.id', NULL, NULL, '0'),
('60150773', '0', '', 'lisna.zahrotun@tif.uad.ac.id', NULL, NULL, '0'),
('60150841', '1', '', 'adhi.prahara@tif.uad.ac.id', NULL, NULL, '0'),
('60160863', '1', '', 'ahmad.azhari@tif.uad.ac.id', NULL, NULL, '0'),
('60160951', '0', '', 'ika.arfiani@tif.uad.ac.id', NULL, NULL, '0'),
('60160952', '1', '', 'supriyanto@tif.uad.ac.id', NULL, NULL, '0'),
('60160960', '0', '', 'murein.miksa@tif.uad.ac.id', NULL, NULL, '0'),
('60160978', '0', '', 'dwi.normawati@tif.uad.ac.id', NULL, NULL, '0'),
('60160979', '1', '', 'jefree.fahana@tif.uad.ac.id', NULL, NULL, '0'),
('60160980', '1', '', 'nuril.anwar@tif.uad.ac.id', NULL, NULL, '0'),
('60181172', '1', '', 'guntur.zamroni@tif.uad.ac.id', NULL, NULL, '0'),
('60191223', '1', '', 'dinan.yulianto@tif.uad.ac.id', NULL, NULL, '0'),
('60191224', '1', '', 'faisal.fajri@tif.uad.ac.id', NULL, NULL, '0'),
('60191225', '0', '', 'miftahurrahma.rosyda@tif.uad.ac.id', NULL, NULL, '0'),
('60910095', '1', '', 'yywahyup@tif.uad.ac.id', NULL, NULL, '0'),
('60960147', '1', '', 'mdin@ee.uad.ac.id', NULL, NULL, '0'),
('60980174', '1', '', 'rusydi.umar@tif.uad.ac.id', NULL, NULL, '0');

--
-- Triggers `dosen`
--
DELIMITER $$
CREATE TRIGGER `delete_data_akun_dosen` BEFORE DELETE ON `dosen` FOR EACH ROW BEGIN
	DELETE akun FROM akun JOIN dosen ON akun.ID_akun = dosen.ID_akun WHERE akun.ID_akun = old.ID_akun;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_data_dosen` BEFORE DELETE ON `dosen` FOR EACH ROW BEGIN
	DELETE ca_nama_dosen FROM dosen JOIN ca_nama_dosen ON dosen.niy_nip = ca_nama_dosen.niy_nip WHERE dosen.niy_nip = old.niy_nip;
    DELETE pengampu FROM dosen JOIN pengampu ON dosen.niy_nip = pengampu.niy_nip WHERE dosen.niy_nip = old.niy_nip;
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
  `ID_pengampu` int(3) NOT NULL,
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
  `no_hp` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `ID_akun` int(3) DEFAULT NULL,
  `nama_tim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('1970530', 'Analisis Perancangan Perusahaan', '7', 3, 'Teknik Industri'),
('1975930', 'Manajemen Teknologi', '6', 3, 'Teknik Industri'),
('211810630', 'Manajemen Data dan Informasi', '1', 3, 'Informatika'),
('211820430', 'Arsitektur Komputer', '2', 3, 'Informatika'),
('211830531', 'Sistem Operasi', '3', 3, 'Informatika'),
('211840131', 'Analisis dan Perancangan Perangkat Lunak', '4', 3, 'Informatika'),
('211850631', 'Grafika Terapan', '5', 3, 'Informatika'),
('211851131', 'Pembelajaran Mesin', '5', 3, 'Informatika'),
('211851431', 'Sistem Pendukung Keputusan', '5', 3, 'Informatika'),
('211851531', 'Sistem Temu Balik Informasi', '5', 3, 'Informatika'),
('211860120', 'Manajemen Proyek Teknologi Informasi', '6', 2, 'Informatika'),
('211860220', 'Metodologi Penelitian', '6', 2, 'Informatika'),
('211860330', 'Rekayasa Perangkat Lunak', '6', 3, 'Informatika'),
('211860531', 'Teknologi Multimedia', '6', 3, 'Informatika'),
('211860731', 'Rekayasa Web', '6', 3, 'Informatika'),
('211861231', 'Pemrosesan Bahasa Alami', '6', 3, 'Informatika'),
('211861431', 'Pengenalan Pola', '6', 3, 'Informatika'),
('211861531', 'Komputer Visi', '6', 3, 'Informatika'),
('211870320', 'Kapita Selekta', '7', 2, 'Informatika'),
('211870420', 'Kewirausahaan', '7', 2, 'Informatika'),
('211870620', 'Komunikasi Interpersonal', '7', 2, 'Informatika'),
('211870820', 'Sosio Informatika', '7', 2, 'Informatika'),
('2266320', 'Sistem Cerdas', '6', 3, 'Teknik Elektro'),
('2276120', 'Computer Vision', '7', 3, 'Teknik Elektro'),
('3370420', 'Perencanaan Bisnis', '7', 3, 'Teknologi Pangan');

-- --------------------------------------------------------

--
-- Table structure for table `pengampu`
--

CREATE TABLE `pengampu` (
  `ID_pengampu` int(3) NOT NULL,
  `niy_nip` varchar(18) NOT NULL,
  `kode_matkul` varchar(9) NOT NULL,
  `kelas` varchar(1) NOT NULL,
  `thn_ajaran` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengampu`
--

INSERT INTO `pengampu` (`ID_pengampu`, `niy_nip`, `kode_matkul`, `kelas`, `thn_ajaran`) VALUES
(9, '12345678', '211860120', 'C', '2021/2022'),
(10, '12345678', '211860330', 'A', '2021/2022'),
(11, '12345678', '211840131', 'E', '2021/2022'),
(12, '12345678', '211870820', 'B', '2021/2022');

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
-- Indexes for table `ca_nama_dosen`
--
ALTER TABLE `ca_nama_dosen`
  ADD KEY `niy` (`niy_nip`);

--
-- Indexes for table `ca_nama_mahasiswa`
--
ALTER TABLE `ca_nama_mahasiswa`
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `cpl`
--
ALTER TABLE `cpl`
  ADD KEY `ID_pencapaian` (`kode_matkul`);

--
-- Indexes for table `cpmk`
--
ALTER TABLE `cpmk`
  ADD KEY `ID_pencapaian` (`kode_matkul`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`niy_nip`),
  ADD KEY `ID_akun` (`ID_akun`);

--
-- Indexes for table `khs`
--
ALTER TABLE `khs`
  ADD KEY `ID_krs` (`ID_krs`),
  ADD KEY `ID_asesmen` (`ID_asesmen`),
  ADD KEY `ID_pengampu` (`ID_pengampu`);

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
-- Indexes for table `pengampu`
--
ALTER TABLE `pengampu`
  ADD PRIMARY KEY (`ID_pengampu`),
  ADD KEY `niy` (`niy_nip`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `ID_akun` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
-- AUTO_INCREMENT for table `pengampu`
--
ALTER TABLE `pengampu`
  MODIFY `ID_pengampu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ca_nama_dosen`
--
ALTER TABLE `ca_nama_dosen`
  ADD CONSTRAINT `ca_nama_dosen_ibfk_1` FOREIGN KEY (`niy_nip`) REFERENCES `dosen` (`niy_nip`);

--
-- Constraints for table `ca_nama_mahasiswa`
--
ALTER TABLE `ca_nama_mahasiswa`
  ADD CONSTRAINT `ca_nama_mahasiswa_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `cpl`
--
ALTER TABLE `cpl`
  ADD CONSTRAINT `cpl_ibfk_1` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`);

--
-- Constraints for table `cpmk`
--
ALTER TABLE `cpmk`
  ADD CONSTRAINT `cpmk_ibfk_1` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`);

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
  ADD CONSTRAINT `khs_ibfk_2` FOREIGN KEY (`ID_asesmen`) REFERENCES `asesmen` (`ID_asesmen`),
  ADD CONSTRAINT `khs_ibfk_3` FOREIGN KEY (`ID_pengampu`) REFERENCES `pengampu` (`ID_pengampu`);

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
-- Constraints for table `pengampu`
--
ALTER TABLE `pengampu`
  ADD CONSTRAINT `pengampu_ibfk_1` FOREIGN KEY (`niy_nip`) REFERENCES `dosen` (`niy_nip`),
  ADD CONSTRAINT `pengampu_ibfk_2` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
