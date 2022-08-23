-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 10:08 AM
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
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`ID_akun`, `username`, `password`, `hak_akses`) VALUES
(2, '12345678', '$2y$10$Z32.zs4UVAA2AbKzTnEFve8zVZDvK6i9Ucf.2yVeQiUe7HKEnKVo6', '1');

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
  `ID_asesmen` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asesmen`
--

INSERT INTO `asesmen` (`ID_asesmen`, `nama`) VALUES
(1, 'Kehadiran'),
(2, 'Keaktifan'),
(3, 'Quiz'),
(4, 'Tugas'),
(5, 'Ujian Akhir Semester'),
(6, 'Ujian Tengah Semester'),
(7, 'Uji Kompetensi'),
(8, 'Presentasi');

-- --------------------------------------------------------

--
-- Table structure for table `capaian_lulusan`
--

CREATE TABLE `capaian_lulusan` (
  `KEY_cpl` int(11) NOT NULL,
  `kode_matkul` varchar(9) NOT NULL,
  `ID_cpl` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `capaian_lulusan`
--

INSERT INTO `capaian_lulusan` (`KEY_cpl`, `kode_matkul`, `ID_cpl`) VALUES
(17, '1970530', 4),
(18, '1970530', 6),
(1, '211840131', 3),
(2, '211840131', 4),
(6, '211860120', 5),
(5, '211860120', 6),
(3, '211860220', 3),
(4, '211860220', 6),
(8, '211860731', 3),
(7, '211860731', 8),
(9, '211870420', 1),
(10, '211870420', 2),
(11, '211870620', 4),
(12, '211870620', 6),
(13, '211870820', 1),
(14, '211870820', 7),
(16, '3370420', 4),
(15, '3370420', 7);

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
  `ID_cpl` int(3) NOT NULL,
  `cpl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cpl`
--

INSERT INTO `cpl` (`ID_cpl`, `cpl`) VALUES
(1, 'Menjunjung tinggi nilai kemanusiaan dalam menjalankan tugas, memiliki kepekaan sosial dan bertanggung jawab secara individu dan berkelompok di bidang keahliannya'),
(2, 'Menginternalisasi semangat kemandirian, kejuangan, dan kewirausahaan'),
(3, 'Mampu menerapkan konsep teoritis bidang area Informatika terkait matematika dasar dan ilmu komputer untuk memodelkan masalah dan meningkatkan produktivitas'),
(4, 'Mampu berpikir logis, kritis, sistematis dan inovatif, dan mampu mengambil keputusan secara tepat di bidang keahliannya'),
(5, 'Mampu mengkaji / menganalisis implikasi pengembangan atau implementasi ilmu pengetahuan teknologi, menyusun deskripsi saintifik hasil kajian untuk pemecahan masalah dengan mempertimbangkan multidisiplin ilmu'),
(6, 'Memahami tanggung jawab profesional dan menerapkan pengetahuan serta berkomunikasi efektif dalam melakukan penilaian berdasar informasi dan praktek computing  dengan berpedoman pada prinsip-prinsip legal dan etika'),
(7, 'Mampu memilih, membuat dan menerapakan teknik, sumber daya, penggunaan perangkat teknik modern dan implementasi teknologi informasi untuk memecahkan masalah'),
(8, 'Mampu merancang dan mengimplementasikan algoritma/metode dalam mengidentifikasi dan memecahkan masalah yang melibatkan perangkat lunak dan pemikiran komputasi');

-- --------------------------------------------------------

--
-- Table structure for table `cpmk`
--

CREATE TABLE `cpmk` (
  `ID_cpmk` int(3) NOT NULL,
  `kode_matkul` varchar(9) NOT NULL,
  `cpmk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cpmk`
--

INSERT INTO `cpmk` (`ID_cpmk`, `kode_matkul`, `cpmk`) VALUES
(1, '211840131', 'Mahasiswa memiliki kemampuan teoritis terkait konsep perangkat lunak, menerapkan konsep-teori dan model serta analisis dalam merancang dan membangun perangkat lunak'),
(2, '211840131', 'Mahasiswa mampu menganalisis rancangan sistem untuk memecahkan masalah dalam lingkup pengembangan perangkat lunak'),
(3, '211860220', 'Mahasiswa mampu menganalisis kebutuhan sistem untuk memecahkan masalah dalam lingkup sosial'),
(6, '211860120', 'aaaaaaaaaa'),
(7, '211860120', 'bbbbbbbbb'),
(8, '211860731', 'bbbbbbbbbbb'),
(9, '211870420', '['),
(10, '211870620', '[\"hhhhhhhh,iiiiiiii\"]'),
(11, '211870820', '[\"zzzzzz,xxxxxxx\"]'),
(12, '3370420', '[\"aaaaaaaaaa,bbbbbbbbb\"]'),
(13, '1970530', 'asdasdasd'),
(14, '1970530', 'qweqweqwewq');

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
('12345678', '1', '082111336643', 'isnan@tif.uad.ac.id', NULL, '1', 2),
('197002062005011001', '1', '', 'ekoab@tif.uad.ac.id', NULL, '0', NULL),
('197310142005011001', '1', '', 'alitarmuji@tif.uad.ac.id', NULL, '0', NULL),
('197608192005012001', '0', '', 'rochmahdyah@tif.uad.ac.id', NULL, '1', NULL),
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
('60160960', '0', '', 'murein.miksa@tif.uad.ac.id', NULL, '1', NULL),
('60160978', '0', '', 'dwi.normawati@tif.uad.ac.id', NULL, '0', NULL),
('60160979', '1', '', 'jefree.fahana@tif.uad.ac.id', NULL, '0', NULL),
('60160980', '1', '', 'nuril.anwar@tif.uad.ac.id', NULL, '0', NULL),
('60181172', '1', '', 'guntur.zamroni@tif.uad.ac.id', NULL, '1', NULL),
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
-- Table structure for table `ketercapaian_cpmk`
--

CREATE TABLE `ketercapaian_cpmk` (
  `ID_pengampu` int(11) NOT NULL,
  `ID_asesmen` int(11) NOT NULL,
  `ID_cpmk` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `khs`
--

CREATE TABLE `khs` (
  `ID_khs` int(11) NOT NULL,
  `ID_krs` int(11) NOT NULL,
  `nilai` float NOT NULL DEFAULT 0,
  `grade` varchar(2) NOT NULL DEFAULT 'E'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khs`
--

INSERT INTO `khs` (`ID_khs`, `ID_krs`, `nilai`, `grade`) VALUES
(1, 58, 0, 'E'),
(2, 59, 0, 'E'),
(3, 60, 0, 'E'),
(4, 61, 0, 'E'),
(5, 62, 0, 'E'),
(6, 63, 0, 'E'),
(7, 64, 0, 'E'),
(8, 65, 0, 'E'),
(9, 66, 0, 'E'),
(10, 67, 0, 'E'),
(11, 68, 0, 'E'),
(12, 69, 0, 'E'),
(13, 70, 0, 'E'),
(14, 71, 0, 'E'),
(15, 72, 0, 'E'),
(16, 73, 0, 'E'),
(17, 74, 0, 'E'),
(18, 75, 0, 'E'),
(19, 76, 0, 'E'),
(20, 77, 0, 'E'),
(21, 78, 0, 'E'),
(22, 79, 0, 'E'),
(23, 80, 0, 'E'),
(24, 81, 0, 'E'),
(25, 82, 0, 'E'),
(26, 83, 0, 'E'),
(27, 84, 0, 'E'),
(28, 85, 0, 'E'),
(29, 86, 0, 'E'),
(30, 87, 0, 'E'),
(31, 88, 0, 'E'),
(32, 89, 0, 'E'),
(33, 90, 0, 'E'),
(34, 91, 0, 'E'),
(35, 92, 0, 'E'),
(36, 93, 0, 'E'),
(37, 94, 0, 'E'),
(38, 95, 0, 'E'),
(39, 96, 0, 'E'),
(40, 97, 0, 'E'),
(41, 98, 0, 'E'),
(42, 99, 0, 'E'),
(43, 100, 0, 'E'),
(44, 101, 0, 'E'),
(45, 102, 0, 'E'),
(46, 103, 0, 'E'),
(47, 104, 0, 'E'),
(48, 105, 0, 'E'),
(49, 106, 0, 'E'),
(50, 107, 0, 'E'),
(51, 108, 0, 'E'),
(52, 109, 0, 'E'),
(53, 110, 0, 'E'),
(54, 111, 0, 'E'),
(55, 112, 0, 'E'),
(56, 113, 0, 'E'),
(57, 114, 0, 'E'),
(58, 115, 0, 'E'),
(59, 116, 0, 'E'),
(60, 117, 0, 'E'),
(61, 118, 0, 'E'),
(62, 119, 0, 'E'),
(63, 120, 0, 'E'),
(64, 121, 0, 'E'),
(65, 122, 0, 'E'),
(66, 123, 0, 'E'),
(67, 124, 0, 'E'),
(68, 125, 0, 'E'),
(69, 126, 0, 'E'),
(70, 127, 0, 'E'),
(71, 128, 0, 'E'),
(72, 129, 0, 'E'),
(73, 130, 0, 'E'),
(74, 131, 0, 'E'),
(75, 132, 0, 'E'),
(76, 133, 0, 'E'),
(77, 134, 0, 'E'),
(78, 135, 0, 'E'),
(79, 136, 0, 'E'),
(80, 137, 0, 'E'),
(81, 138, 0, 'E'),
(82, 139, 0, 'E'),
(83, 140, 0, 'E'),
(84, 141, 0, 'E'),
(85, 142, 0, 'E'),
(86, 143, 0, 'E'),
(87, 144, 0, 'E'),
(88, 145, 0, 'E'),
(89, 146, 0, 'E'),
(90, 147, 0, 'E'),
(91, 148, 0, 'E'),
(92, 149, 0, 'E'),
(93, 150, 0, 'E'),
(94, 151, 0, 'E'),
(95, 152, 0, 'E'),
(96, 153, 0, 'E'),
(97, 154, 0, 'E'),
(98, 155, 0, 'E'),
(99, 156, 0, 'E'),
(100, 157, 0, 'E'),
(101, 158, 0, 'E'),
(102, 159, 0, 'E'),
(103, 160, 0, 'E'),
(104, 161, 0, 'E'),
(105, 162, 0, 'E'),
(106, 163, 0, 'E'),
(107, 164, 0, 'E'),
(108, 165, 0, 'E'),
(109, 166, 0, 'E'),
(110, 167, 0, 'E'),
(111, 168, 0, 'E'),
(112, 169, 0, 'E'),
(113, 170, 0, 'E'),
(114, 171, 0, 'E'),
(115, 172, 0, 'E'),
(116, 173, 0, 'E'),
(117, 174, 0, 'E'),
(118, 175, 0, 'E'),
(119, 176, 0, 'E'),
(120, 177, 0, 'E'),
(121, 178, 0, 'E'),
(122, 179, 0, 'E'),
(123, 180, 0, 'E'),
(124, 181, 0, 'E'),
(125, 182, 0, 'E'),
(126, 183, 0, 'E'),
(127, 184, 0, 'E'),
(128, 185, 0, 'E'),
(129, 186, 0, 'E'),
(130, 187, 0, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `khs_konv`
--

CREATE TABLE `khs_konv` (
  `ID_konv` int(11) NOT NULL,
  `ID_krs` int(11) NOT NULL,
  `kode_matkul_konv` varchar(9) NOT NULL
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
(58, '1800018164', 5),
(88, '1800018164', 7),
(176, '1800018164', 10),
(118, '1800018164', 12),
(178, '1800018164', 17),
(59, '1800018167', 5),
(89, '1800018167', 7),
(119, '1800018167', 12),
(179, '1800018167', 17),
(60, '1800018172', 5),
(90, '1800018172', 7),
(120, '1800018172', 12),
(180, '1800018172', 17),
(61, '1800018182', 5),
(91, '1800018182', 7),
(121, '1800018182', 12),
(181, '1800018182', 17),
(62, '1800018200', 5),
(92, '1800018200', 7),
(166, '1800018200', 9),
(122, '1800018200', 12),
(182, '1800018200', 17),
(63, '1800018206', 5),
(93, '1800018206', 7),
(151, '1800018206', 8),
(123, '1800018206', 12),
(183, '1800018206', 17),
(64, '1800018216', 5),
(94, '1800018216', 7),
(124, '1800018216', 12),
(184, '1800018216', 17),
(65, '1800018222', 5),
(95, '1800018222', 7),
(125, '1800018222', 12),
(185, '1800018222', 17),
(66, '1800018224', 5),
(96, '1800018224', 7),
(126, '1800018224', 12),
(186, '1800018224', 17),
(67, '1800018243', 5),
(97, '1800018243', 7),
(127, '1800018243', 12),
(187, '1800018243', 17),
(68, '1800018271', 6),
(98, '1800018271', 11),
(128, '1800018271', 15),
(69, '1800018272', 6),
(148, '1800018272', 8),
(163, '1800018272', 9),
(173, '1800018272', 10),
(99, '1800018272', 11),
(129, '1800018272', 15),
(70, '1800018280', 6),
(153, '1800018280', 8),
(100, '1800018280', 11),
(130, '1800018280', 15),
(71, '1800018282', 6),
(101, '1800018282', 11),
(131, '1800018282', 15),
(72, '1800018283', 6),
(102, '1800018283', 11),
(132, '1800018283', 15),
(73, '1800018285', 6),
(103, '1800018285', 11),
(133, '1800018285', 15),
(74, '1800018286', 6),
(104, '1800018286', 11),
(134, '1800018286', 15),
(75, '1800018288', 6),
(149, '1800018288', 8),
(105, '1800018288', 11),
(135, '1800018288', 15),
(76, '1800018289', 6),
(164, '1800018289', 9),
(106, '1800018289', 11),
(136, '1800018289', 15),
(77, '1800018290', 6),
(177, '1800018290', 10),
(107, '1800018290', 11),
(137, '1800018290', 15),
(78, '1800018291', 13),
(108, '1800018291', 14),
(138, '1800018291', 16),
(167, '1800018293', 9),
(175, '1800018293', 10),
(79, '1800018293', 13),
(109, '1800018293', 14),
(139, '1800018293', 16),
(80, '1800018295', 13),
(110, '1800018295', 14),
(140, '1800018295', 16),
(81, '1800018296', 13),
(111, '1800018296', 14),
(141, '1800018296', 16),
(150, '1800018298', 8),
(82, '1800018298', 13),
(112, '1800018298', 14),
(142, '1800018298', 16),
(83, '1800018299', 13),
(113, '1800018299', 14),
(143, '1800018299', 16),
(165, '1800018300', 9),
(84, '1800018300', 13),
(114, '1800018300', 14),
(144, '1800018300', 16),
(85, '1800018301', 13),
(115, '1800018301', 14),
(145, '1800018301', 16),
(152, '1800018302', 8),
(86, '1800018302', 13),
(116, '1800018302', 14),
(146, '1800018302', 16),
(87, '1800018303', 13),
(117, '1800018303', 14),
(147, '1800018303', 16),
(162, '1800018305', 9),
(172, '1800018305', 10),
(157, '1800018377', 8),
(161, '1800018377', 9),
(171, '1800018377', 10),
(156, '1800018385', 8),
(160, '1800018385', 9),
(170, '1800018385', 10),
(174, '1800018385', 10),
(155, '1800018403', 8),
(159, '1800018403', 9),
(169, '1800018403', 10),
(154, '1800018409', 8),
(158, '1800018409', 9),
(168, '1800018409', 10);

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
  `KEY_nilai` int(11) NOT NULL,
  `ID_krs` int(11) NOT NULL,
  `ID_asesmen` int(11) NOT NULL,
  `bobot` int(3) NOT NULL,
  `nilai` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`KEY_nilai`, `ID_krs`, `ID_asesmen`, `bobot`, `nilai`) VALUES
(1, 178, 1, 15, 0),
(1, 179, 1, 15, 0),
(1, 180, 1, 15, 0),
(1, 181, 1, 15, 0),
(1, 182, 1, 15, 0),
(1, 183, 1, 15, 0),
(1, 184, 1, 15, 0),
(1, 185, 1, 15, 0),
(1, 186, 1, 15, 0),
(1, 187, 1, 15, 0),
(2, 178, 3, 20, 0),
(2, 179, 3, 20, 0),
(2, 180, 3, 20, 0),
(2, 181, 3, 20, 0),
(2, 182, 3, 20, 0),
(2, 183, 3, 20, 0),
(2, 184, 3, 20, 0),
(2, 185, 3, 20, 0),
(2, 186, 3, 20, 0),
(2, 187, 3, 20, 0),
(3, 178, 6, 25, 0),
(3, 179, 6, 25, 0),
(3, 180, 6, 25, 0),
(3, 181, 6, 25, 0),
(3, 182, 6, 25, 0),
(3, 183, 6, 25, 0),
(3, 184, 6, 25, 0),
(3, 185, 6, 25, 0),
(3, 186, 6, 25, 0),
(3, 187, 6, 25, 0),
(4, 178, 5, 40, 0),
(4, 179, 5, 40, 0),
(4, 180, 5, 40, 0),
(4, 181, 5, 40, 0),
(4, 182, 5, 40, 0),
(4, 183, 5, 40, 0),
(4, 184, 5, 40, 0),
(4, 185, 5, 40, 0),
(4, 186, 5, 40, 0),
(4, 187, 5, 40, 0);

--
-- Triggers `nilai`
--
DELIMITER $$
CREATE TRIGGER `update_nilai_khs` AFTER UPDATE ON `nilai` FOR EACH ROW BEGIN
	UPDATE khs
    SET nilai = (SELECT SUM(nilai*(bobot/100)) FROM nilai WHERE khs.ID_krs = nilai.ID_krs),
    grade = CASE
    	WHEN nilai >= 0 AND nilai < 40.00 THEN "E"
        WHEN nilai >= 40.00 AND nilai < 43.75 THEN "D"
        WHEN nilai >= 43.75 AND nilai < 51.25 THEN "D+"
        WHEN nilai >= 51.25 AND nilai < 55.00 THEN "C-"
        WHEN nilai >= 55.00 AND nilai < 57.50 THEN "C"
        WHEN nilai >= 57.50 AND nilai < 62.50 THEN "C+"
        WHEN nilai >= 62.50 AND nilai < 65.00 THEN "B-"
        WHEN nilai >= 65.00 AND nilai < 68.75 THEN "B"
        WHEN nilai >= 68.75 AND nilai < 76.25 THEN "B+"
        WHEN nilai >= 76.25 AND nilai < 80.00 THEN "A-"
        WHEN nilai >= 80.00 AND nilai < 100.00 THEN "A"
        ELSE "E"
    END
    WHERE khs.ID_krs = new.ID_krs;
END
$$
DELIMITER ;

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
(5, '60160960', '211840131', 'A', '2021/2022'),
(6, '60160960', '211840131', 'B', '2021/2022'),
(7, '60160960', '211860731', 'C', '2021/2022'),
(8, '60160960', '211870420', 'A', '2021/2022'),
(9, '197608192005012001', '211870320', 'A', '2021/2022'),
(10, '197608192005012001', '211870620', 'A', '2021/2022'),
(11, '197608192005012001', '211860731', 'B', '2021/2022'),
(12, '197608192005012001', '211870820', 'B', '2021/2022'),
(13, '60181172', '211840131', 'C', '2021/2022'),
(14, '60181172', '211860731', 'A', '2021/2022'),
(15, '60181172', '211870820', 'A', '2021/2022'),
(16, '60181172', '211870820', 'C', '2021/2022'),
(17, '12345678', '211840131', 'D', '2021/2022');

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
-- Indexes for table `capaian_lulusan`
--
ALTER TABLE `capaian_lulusan`
  ADD PRIMARY KEY (`KEY_cpl`),
  ADD KEY `kode_matkul` (`kode_matkul`,`ID_cpl`),
  ADD KEY `ID_cpl` (`ID_cpl`);

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
  ADD PRIMARY KEY (`ID_cpl`);

--
-- Indexes for table `cpmk`
--
ALTER TABLE `cpmk`
  ADD PRIMARY KEY (`ID_cpmk`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`niy_nip`),
  ADD KEY `ID_akun` (`ID_akun`);

--
-- Indexes for table `ketercapaian_cpmk`
--
ALTER TABLE `ketercapaian_cpmk`
  ADD KEY `ID_asesmen` (`ID_asesmen`,`ID_cpmk`),
  ADD KEY `ID_cpmk` (`ID_cpmk`),
  ADD KEY `ID_pengampu` (`ID_pengampu`);

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
  MODIFY `ID_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `asesmen`
--
ALTER TABLE `asesmen`
  MODIFY `ID_asesmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `capaian_lulusan`
--
ALTER TABLE `capaian_lulusan`
  MODIFY `KEY_cpl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cpl`
--
ALTER TABLE `cpl`
  MODIFY `ID_cpl` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cpmk`
--
ALTER TABLE `cpmk`
  MODIFY `ID_cpmk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `khs`
--
ALTER TABLE `khs`
  MODIFY `ID_khs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `khs_konv`
--
ALTER TABLE `khs_konv`
  MODIFY `ID_konv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `ID_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `pengampu`
--
ALTER TABLE `pengampu`
  MODIFY `ID_pengampu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `capaian_lulusan`
--
ALTER TABLE `capaian_lulusan`
  ADD CONSTRAINT `capaian_lulusan_ibfk_1` FOREIGN KEY (`kode_matkul`) REFERENCES `matakuliah` (`kode_matkul`),
  ADD CONSTRAINT `capaian_lulusan_ibfk_2` FOREIGN KEY (`ID_cpl`) REFERENCES `cpl` (`ID_cpl`);

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
-- Constraints for table `ketercapaian_cpmk`
--
ALTER TABLE `ketercapaian_cpmk`
  ADD CONSTRAINT `ketercapaian_cpmk_ibfk_1` FOREIGN KEY (`ID_cpmk`) REFERENCES `cpmk` (`ID_cpmk`),
  ADD CONSTRAINT `ketercapaian_cpmk_ibfk_2` FOREIGN KEY (`ID_asesmen`) REFERENCES `asesmen` (`ID_asesmen`),
  ADD CONSTRAINT `ketercapaian_cpmk_ibfk_3` FOREIGN KEY (`ID_pengampu`) REFERENCES `pengampu` (`ID_pengampu`);

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
