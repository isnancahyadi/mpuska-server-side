-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 11:27 AM
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
-- Database: `mpuska_app_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `ID_akun` int(11) NOT NULL,
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
  `ID_asesmen` varchar(3) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asesmen`
--

INSERT INTO `asesmen` (`ID_asesmen`, `nama`) VALUES
('KHD', 'Kehadiran'),
('KTF', 'Keaktifan'),
('QZ', 'Quiz'),
('TGS', 'Tugas'),
('UAS', 'Ujian Akhir Semester'),
('UTS', 'Ujian Tengah Semester');

-- --------------------------------------------------------

--
-- Table structure for table `ca_nama_dosen`
--

CREATE TABLE `ca_nama_dosen` (
  `niy_nip` varchar(18) NOT NULL,
  `gelar_depan` varchar(10) DEFAULT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_tengah` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `gelar_belakang` varchar(20) NOT NULL
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
('60910095', '', 'Wahyu', '', 'Pujiyono', 'M.Kom.'),
('12345678', '', 'Isnan', 'Arif', 'Cahyadi', 'M.Kom.');

-- --------------------------------------------------------

--
-- Table structure for table `ca_nama_mahasiswa`
--

CREATE TABLE `ca_nama_mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_tengah` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ca_nama_mahasiswa`
--

INSERT INTO `ca_nama_mahasiswa` (`nim`, `nama_depan`, `nama_tengah`, `nama_belakang`) VALUES
('1800018164', 'Novalia', 'Gita', 'Ramadhani'),
('1800018167', 'Winda', 'Yuniarti', 'Herman'),
('1800018172', 'Miftahul', '', 'Rahmah'),
('1800018182', 'Metha', 'Risca', 'Amalia'),
('1800018200', 'Nadia', 'Wati', 'Aprianti'),
('1800018206', 'Abdurahman', '', 'Algifari'),
('1800018216', 'Try', '', 'Wulandary'),
('1800018224', 'Shafira', 'Nur', 'Rohmah'),
('1800018243', 'La', 'Alhadar', 'Rohan'),
('1800018271', 'Alwin', 'Subhan', 'Muslim'),
('1800018272', 'Irma', 'Eryanti', 'Putri'),
('1800018280', 'Muhamad', 'Satriyo Adinul', 'Habib'),
('1800018282', 'Baiq', 'Nikum', 'Yulisasih'),
('1800018283', 'Rafi', 'Fakhtur', 'Rahman'),
('1800018285', 'Muhamad', 'Rizqi', 'Ismansyah'),
('1800018286', 'Muhamad', '', 'Satrio'),
('1800018288', 'Bogi', '', 'Mahendra'),
('1800018289', 'Dito', 'Abdusalam', 'Rafi'),
('1800018290', 'Risha', '', 'Alfanda'),
('1800018291', 'Dea', 'Nopita', 'Sari'),
('1800018293', 'Fesa', 'Wahyu', 'Ningsih'),
('1800018295', 'Vigur', 'Praja', 'Paramadhita'),
('1800018296', 'Achmad', '', 'Chun-Chun'),
('1800018298', 'Angelia', 'Retno', 'Madyaningrum'),
('1800018299', 'Daru', 'Thobrani', 'Furqon'),
('1800018300', 'Muhamad', 'Fajri', 'Majid'),
('1800018301', 'Wahyu', 'Dwi', 'Ramadhandi'),
('1800018302', 'Azwar', '', 'Sholeh'),
('1800018303', 'Sarah', '', 'Indriani'),
('1800018305', 'Muhamad', 'Imamul', 'Mukminin'),
('1800018377', 'Putri', 'Ayu', 'Daruningtyas'),
('1800018385', 'Imadela', '', 'Adam'),
('1800018403', 'Dimas', 'Rachmad', 'Dewanto'),
('1800018409', 'Muhammad', '', 'Hadi'),
('1800018222', 'Deden', '', 'Nurhidayat');

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
  `status_mbkm` varchar(1) NOT NULL DEFAULT '0',
  `ID_akun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`niy_nip`, `gender`, `no_hp`, `email`, `foto`, `status_mbkm`, `ID_akun`) VALUES
('060150842', '0', '', 'dewi.ismi@tif.uad.ac.id', NULL, '0', NULL),
('12345678', '1', '082111336643', 'isnan@tif.uad.ac.id', NULL, '0', NULL),
('197002062005011001', '1', '', 'ekoab@tif.uad.ac.id', NULL, '0', NULL),
('197310142005011001', '1', '', 'alitarmuji@tif.uad.ac.id', NULL, '0', NULL),
('197608192005012001', '0', '', 'rochmahdyah@tif.uad.ac.id', NULL, '0', NULL),
('197907202005011002', '1', '', 'bambang.robiin@tif.uad.ac.id', NULL, '0', NULL),
('198011152005011002', '1', '', 'fiftin.noviyanto@tif.uad.ac.id', NULL, '0', NULL),
('60010314', '1', '', 'taufiq@tif.uad.ac.id', NULL, '0', NULL),
('60020388', '0', '', 'sri.winiarti@tif.uad.ac.id', NULL, '0', NULL),
('60030475', '1', '', 'tedy.setiadi@tif.uad.ac.id', NULL, '0', NULL),
('60030476', '1', '', 'ardiansyah@tif.uad.ac.id', NULL, '0', NULL),
('60030479', '1', '', 'moch.aziz@tif.uad.ac.id', NULL, '0', NULL),
('60030480', '1', '', 'ardipujiyanta@tif.uad.ac.id', NULL, '0', NULL),
('60040496', '1', '', 'murintokusno@tif.uad.ac.id', NULL, '0', NULL),
('60040497', '0', '', 'dewi.soyusiawati@tif.uad.ac.id', NULL, '0', NULL),
('60090586', '0', '', 'arfiani.khusna@tif.uad.ac.id', NULL, '0', NULL),
('60110647', '0', '', 'annahendri@tif.uad.ac.id', NULL, '0', NULL),
('60110648', '1', '', 'herman.yuliansyah@tif.uad.ac.id', NULL, '0', NULL),
('60130757', '1', '', 'andripranolo@tif.uad.ac.id', NULL, '0', NULL),
('60150773', '0', '', 'lisna.zahrotun@tif.uad.ac.id', NULL, '0', NULL),
('60150841', '1', '', 'adhi.prahara@tif.uad.ac.id', NULL, '0', NULL),
('60160863', '1', '', 'ahmad.azhari@tif.uad.ac.id', NULL, '0', NULL),
('60160951', '0', '', 'ika.arfiani@tif.uad.ac.id', NULL, '0', NULL),
('60160952', '1', '', 'supriyanto@tif.uad.ac.id', NULL, '0', NULL),
('60160960', '0', '', 'murein.miksa@tif.uad.ac.id', NULL, '0', NULL),
('60160978', '0', '', 'dwi.normawati@tif.uad.ac.id', NULL, '0', NULL),
('60160979', '1', '', 'jefree.fahana@tif.uad.ac.id', NULL, '0', NULL),
('60160980', '1', '', 'nuril.anwar@tif.uad.ac.id', NULL, '0', NULL),
('60181172', '1', '', 'guntur.zamroni@tif.uad.ac.id', NULL, '0', NULL),
('60191223', '1', '', 'dinan.yulianto@tif.uad.ac.id', NULL, '0', NULL),
('60191224', '1', '', 'faisal.fajri@tif.uad.ac.id', NULL, '0', NULL),
('60191225', '0', '', 'miftahurrahma.rosyda@tif.uad.ac.id', NULL, '0', NULL),
('60910095', '1', '', 'yywahyup@tif.uad.ac.id', NULL, '0', NULL),
('60960147', '1', '', 'mdin@ee.uad.ac.id', NULL, '0', NULL),
('60980174', '1', '', 'rusydi.umar@tif.uad.ac.id', NULL, '0', NULL);

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
  `ID_khs` int(11) NOT NULL,
  `ID_krs` int(11) NOT NULL,
  `nilai` int(3) NOT NULL DEFAULT 0,
  `huruf` varchar(2) NOT NULL DEFAULT 'E'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khs`
--

INSERT INTO `khs` (`ID_khs`, `ID_krs`, `nilai`, `huruf`) VALUES
(1, 8, 0, 'E'),
(2, 9, 0, 'E'),
(3, 10, 0, 'E'),
(4, 11, 0, 'E'),
(5, 12, 0, 'E'),
(6, 13, 0, 'E'),
(7, 14, 0, 'E'),
(8, 15, 0, 'E'),
(9, 16, 0, 'E'),
(10, 17, 0, 'E'),
(11, 18, 0, 'E'),
(12, 19, 0, 'E'),
(13, 20, 0, 'E'),
(14, 21, 0, 'E'),
(15, 22, 0, 'E'),
(16, 23, 0, 'E'),
(17, 24, 0, 'E'),
(18, 25, 0, 'E'),
(19, 26, 0, 'E'),
(20, 27, 0, 'E'),
(21, 28, 0, 'E'),
(22, 29, 0, 'E'),
(23, 30, 0, 'E'),
(24, 31, 0, 'E'),
(25, 32, 0, 'E'),
(26, 33, 0, 'E'),
(27, 34, 0, 'E'),
(28, 35, 0, 'E'),
(29, 36, 0, 'E'),
(30, 37, 0, 'E'),
(31, 38, 0, 'E'),
(32, 39, 0, 'E'),
(33, 40, 0, 'E'),
(34, 41, 0, 'E'),
(35, 42, 0, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `khs_konv`
--

CREATE TABLE `khs_konv` (
  `ID_konv` int(11) NOT NULL,
  `ID_krs` int(11) NOT NULL,
  `kode_matkul_konv` varchar(9) NOT NULL,
  `nilai` int(3) NOT NULL DEFAULT 0,
  `huruf` varchar(2) NOT NULL DEFAULT 'E'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `konversi`
--

CREATE TABLE `konversi` (
  `kode_matkul` varchar(9) NOT NULL,
  `kode_matkul_konv` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konversi`
--

INSERT INTO `konversi` (`kode_matkul`, `kode_matkul_konv`) VALUES
('1970530', '211810630'),
('1970530', '211860330'),
('1975930', '211840131'),
('1975930', '211860531'),
('2266320', '211851131'),
('2266320', '211851431'),
('2266320', '211851531'),
('2266320', '211861231'),
('2266320', '211861431'),
('2276120', '211850631'),
('2276120', '211861431'),
('2276120', '211861531'),
('3370420', '211810630');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `ID_krs` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `ID_pengampu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`ID_krs`, `nim`, `ID_pengampu`) VALUES
(8, '1800018164', 1),
(9, '1800018167', 1),
(10, '1800018172', 1),
(11, '1800018182', 1),
(12, '1800018200', 1),
(13, '1800018206', 1),
(14, '1800018216', 1),
(15, '1800018222', 1),
(16, '1800018224', 1),
(17, '1800018243', 1),
(18, '1800018271', 1),
(19, '1800018272', 1),
(20, '1800018280', 1),
(21, '1800018282', 1),
(22, '1800018283', 1),
(23, '1800018285', 1),
(24, '1800018286', 1),
(25, '1800018288', 1),
(26, '1800018289', 1),
(27, '1800018290', 1),
(28, '1800018291', 1),
(29, '1800018293', 1),
(30, '1800018295', 1),
(31, '1800018296', 1),
(32, '1800018298', 1),
(33, '1800018299', 1),
(34, '1800018300', 1),
(35, '1800018301', 1),
(36, '1800018302', 1),
(37, '1800018303', 1),
(38, '1800018305', 1),
(39, '1800018377', 1),
(40, '1800018385', 1),
(41, '1800018403', 1),
(42, '1800018409', 1);

--
-- Triggers `krs`
--
DELIMITER $$
CREATE TRIGGER `insert_data_khs` AFTER INSERT ON `krs` FOR EACH ROW BEGIN
	INSERT INTO khs (ID_krs) VALUES (new.ID_krs);
    END
$$
DELIMITER ;

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
  `nama_tim` varchar(50) NOT NULL,
  `ID_akun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `gender`, `no_hp`, `email`, `foto`, `nama_tim`, `ID_akun`) VALUES
('1800018164', '0', '', 'novalia1800018164@webmail.uad.ac.id', NULL, 'Python', NULL),
('1800018167', '0', '', 'winda1800018167@webmail.uad.ac.id', NULL, 'Python', NULL),
('1800018172', '0', '', 'miftahul1800018172@webmail.uad.ac.id', NULL, 'Python', NULL),
('1800018182', '0', '', 'metha1800018182@webmail.uad.ac.id', NULL, 'Python', NULL),
('1800018200', '0', '', 'nadia1800018200@webmail.uad.ac.id', NULL, 'Python', NULL),
('1800018206', '1', '', 'abdurahman1800018206@webmail.uad.ac.id', NULL, 'Python', NULL),
('1800018216', '0', '', 'try1800018216@webmail.uad.ac.id', NULL, 'Python', NULL),
('1800018222', '1', '', 'deden1800018222@webmail.uad.ac.id', NULL, 'Dart', NULL),
('1800018224', '0', '', 'shafira1800018224@webmail.uad.ac.id', NULL, 'Java', NULL),
('1800018243', '1', '', 'la1800018243@webmail.uad.ac.id', NULL, 'Java', NULL),
('1800018271', '1', '', 'alwin1800018271@webmail.uad.ac.id', NULL, 'Java', NULL),
('1800018272', '0', '', 'irma1800018272@webmail.uad.ac.id', NULL, 'Java', NULL),
('1800018280', '1', '', 'muhamad1800018280@webmail.uad.ac.id', NULL, 'Java', NULL),
('1800018282', '0', '', 'baiq1800018282@webmail.uad.ac.id', NULL, 'Java', NULL),
('1800018283', '1', '', 'rafi1800018283@webmail.uad.ac.id', NULL, 'Java', NULL),
('1800018285', '1', '', 'muhamad1800018285@webmail.uad.ac.id', NULL, 'Kotlin', NULL),
('1800018286', '1', '', 'muhamad1800018286@webmail.uad.ac.id', NULL, 'Kotlin', NULL),
('1800018288', '1', '', 'bogi1800018288@webmail.uad.ac.id', NULL, 'Kotlin', NULL),
('1800018289', '1', '', 'dito1800018289@webmail.uad.ac.id', NULL, 'Kotlin', NULL),
('1800018290', '1', '', 'risha1800018290@webmail.uad.ac.id', NULL, 'Kotlin', NULL),
('1800018291', '0', '', 'dea1800018291@webmail.uad.ac.id', NULL, 'Kotlin', NULL),
('1800018293', '0', '', 'fesa1800018293@webmail.uad.ac.id', NULL, 'Kotlin', NULL),
('1800018295', '1', '', 'vigur1800018295@webmail.uad.ac.id', NULL, 'Golang', NULL),
('1800018296', '1', '', 'achmad1800018296@webmail.uad.ac.id', NULL, 'Golang', NULL),
('1800018298', '0', '', 'angelia1800018298@webmail.uad.ac.id', NULL, 'Golang', NULL),
('1800018299', '1', '', 'daru1800018299@webmail.uad.ac.id', NULL, 'Golang', NULL),
('1800018300', '1', '', 'muhamad1800018300@webmail.uad.ac.id', NULL, 'Golang', NULL),
('1800018301', '1', '', 'wahyu1800018301@webmail.uad.ac.id', NULL, 'Golang', NULL),
('1800018302', '1', '', 'azwar1800018302@webmail.uad.ac.id', NULL, 'Golang', NULL),
('1800018303', '0', '', 'sarah1800018303@webmail.uad.ac.id', NULL, 'Dart', NULL),
('1800018305', '1', '', 'muhamad1800018305@webmail.uad.ac.id', NULL, 'Dart', NULL),
('1800018377', '0', '', 'putri1800018377@webmail.uad.ac.id', NULL, 'Dart', NULL),
('1800018385', '1', '', 'imadela1800018385@webmail.uad.ac.id', NULL, 'Dart', NULL),
('1800018403', '1', '', 'dimas1800018403@webmail.uad.ac.id', NULL, 'Dart', NULL),
('1800018409', '1', '', 'muhammad1800018409@webmail.uad.ac.id', NULL, 'Dart', NULL);

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
('211840131', 'Analisis dan Perancangan Perangkat Lunak', '4', 3, 'Informatika'),
('211860120', 'Manajemen Proyek Teknologi Informasi', '6', 2, 'Informatika'),
('211860220', 'Metodologi Penelitian', '6', 2, 'Informatika'),
('211860731', 'Rekayasa Web', '6', 3, 'Informatika'),
('211870320', 'Kapita Selekta', '7', 2, 'Informatika'),
('211870420', 'Kewirausahaan', '7', 2, 'Informatika'),
('211870620', 'Komunikasi Interpersonal', '7', 2, 'Informatika'),
('211870820', 'Sosio Informatika', '7', 2, 'Informatika'),
('2266320', 'Sistem Cerdas', '6', 3, 'Teknik Elektro'),
('2276120', 'Computer Vision', '7', 3, 'Teknik Elektro'),
('3370420', 'Perencanaan Bisnis', '7', 3, 'Teknologi Pangan');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah_konv`
--

CREATE TABLE `matakuliah_konv` (
  `kode_matkul` varchar(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `semester` varchar(1) NOT NULL,
  `sks` int(2) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matakuliah_konv`
--

INSERT INTO `matakuliah_konv` (`kode_matkul`, `nama`, `semester`, `sks`, `prodi`) VALUES
('211810630', 'Manajemen Data dan Informasi', '1', 3, 'Informatika'),
('211820430', 'Arsitektur Komputer', '2', 3, 'Informatika'),
('211830531', 'Sistem Operasi', '3', 3, 'Informatika'),
('211840131', 'Analisis dan Perancangan Perangkat Lunak', '4', 3, 'Informatika'),
('211850631', 'Grafika Terapan', '5', 3, 'Informatika'),
('211851131', 'Pembelajaran Mesin', '5', 3, 'Informatika'),
('211851431', 'Sistem Pendukung Keputusan', '5', 3, 'Informatika'),
('211851531', 'Sistem Temu Balik Informasi', '5', 3, 'Informatika'),
('211860330', 'Rekayasa Perangkat Lunak', '6', 3, 'Informatika'),
('211860531', 'Teknologi Multimedia', '6', 3, 'Informatika'),
('211861231', 'Pemrosesan Bahasa Alami', '6', 3, 'Informatika'),
('211861431', 'Pengenalan Pola', '6', 3, 'Informatika'),
('211861531', 'Komputer Visi', '6', 3, 'Informatika'),
('211870420', 'Kewirausahaan', '7', 2, 'Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `ID_krs` int(11) NOT NULL,
  `ID_asesmen` varchar(3) NOT NULL,
  `bobot` int(3) NOT NULL,
  `nilai` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengampu`
--

CREATE TABLE `pengampu` (
  `ID_pengampu` int(11) NOT NULL,
  `niy_nip` varchar(18) NOT NULL,
  `kode_matkul` varchar(9) NOT NULL,
  `kelas` varchar(1) NOT NULL,
  `thn_ajaran` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengampu`
--

INSERT INTO `pengampu` (`ID_pengampu`, `niy_nip`, `kode_matkul`, `kelas`, `thn_ajaran`) VALUES
(1, '12345678', '211840131', 'A', '2021/2022'),
(2, '12345678', '211840131', 'C', '2021/2022'),
(3, '12345678', '211860220', 'B', '2021/2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`ID_akun`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `asesmen`
--
ALTER TABLE `asesmen`
  ADD PRIMARY KEY (`ID_asesmen`);

--
-- Indexes for table `ca_nama_dosen`
--
ALTER TABLE `ca_nama_dosen`
  ADD KEY `niy_nip` (`niy_nip`);

--
-- Indexes for table `ca_nama_mahasiswa`
--
ALTER TABLE `ca_nama_mahasiswa`
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `cpl`
--
ALTER TABLE `cpl`
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `cpmk`
--
ALTER TABLE `cpmk`
  ADD KEY `kode_matkul` (`kode_matkul`);

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
  ADD PRIMARY KEY (`ID_khs`),
  ADD KEY `ID_krs` (`ID_krs`);

--
-- Indexes for table `khs_konv`
--
ALTER TABLE `khs_konv`
  ADD PRIMARY KEY (`ID_konv`),
  ADD KEY `ID_khs` (`ID_krs`,`kode_matkul_konv`),
  ADD KEY `kode_matkul_konv` (`kode_matkul_konv`);

--
-- Indexes for table `konversi`
--
ALTER TABLE `konversi`
  ADD KEY `kode_matkul` (`kode_matkul`,`kode_matkul_konv`),
  ADD KEY `kode_matkul_konv` (`kode_matkul_konv`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`ID_krs`),
  ADD KEY `nim` (`nim`,`ID_pengampu`),
  ADD KEY `ID_pengampu` (`ID_pengampu`);

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
-- Indexes for table `matakuliah_konv`
--
ALTER TABLE `matakuliah_konv`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD KEY `ID_krs` (`ID_krs`,`ID_asesmen`),
  ADD KEY `ID_asesmen` (`ID_asesmen`);

--
-- Indexes for table `pengampu`
--
ALTER TABLE `pengampu`
  ADD PRIMARY KEY (`ID_pengampu`),
  ADD KEY `niy_nip` (`niy_nip`,`kode_matkul`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `ID_akun` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khs`
--
ALTER TABLE `khs`
  MODIFY `ID_khs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `khs_konv`
--
ALTER TABLE `khs_konv`
  MODIFY `ID_konv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `ID_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pengampu`
--
ALTER TABLE `pengampu`
  MODIFY `ID_pengampu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`);

--
-- Constraints for table `khs`
--
ALTER TABLE `khs`
  ADD CONSTRAINT `khs_ibfk_1` FOREIGN KEY (`ID_krs`) REFERENCES `krs` (`ID_krs`);

--
-- Constraints for table `khs_konv`
--
ALTER TABLE `khs_konv`
  ADD CONSTRAINT `khs_konv_ibfk_2` FOREIGN KEY (`kode_matkul_konv`) REFERENCES `matakuliah_konv` (`kode_matkul`),
  ADD CONSTRAINT `khs_konv_ibfk_3` FOREIGN KEY (`ID_krs`) REFERENCES `krs` (`ID_krs`);

--
-- Constraints for table `konversi`
--
ALTER TABLE `konversi`
  ADD CONSTRAINT `konversi_ibfk_1` FOREIGN KEY (`kode_matkul_konv`) REFERENCES `matakuliah_konv` (`kode_matkul`),
  ADD CONSTRAINT `konversi_ibfk_2` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`);

--
-- Constraints for table `krs`
--
ALTER TABLE `krs`
  ADD CONSTRAINT `krs_ibfk_1` FOREIGN KEY (`ID_pengampu`) REFERENCES `pengampu` (`ID_pengampu`),
  ADD CONSTRAINT `krs_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`ID_krs`) REFERENCES `krs` (`ID_krs`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`ID_asesmen`) REFERENCES `asesmen` (`ID_asesmen`);

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
