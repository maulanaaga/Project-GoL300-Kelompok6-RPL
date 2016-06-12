-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2016 at 09:28 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l300`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `bankID` int(11) NOT NULL,
  `bankNama` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bankID`, `bankNama`) VALUES
(1, 'BNI'),
(2, 'BRI'),
(3, 'BCA'),
(4, 'MANDIRI'),
(5, 'MUAMMALAT'),
(6, 'BUKOPIN'),
(7, 'PAYPAL ONLINE BANK');

-- --------------------------------------------------------

--
-- Table structure for table `chair`
--

CREATE TABLE IF NOT EXISTS `chair` (
  `chairID` int(11) NOT NULL,
  `reservasiID` varchar(64) NOT NULL DEFAULT '',
  `noGerbong` varchar(11) NOT NULL DEFAULT '',
  `noChair` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chair`
--

INSERT INTO `chair` (`chairID`, `reservasiID`, `noGerbong`, `noChair`) VALUES
(1, '1', '1', '1A'),
(2, '2', '1', '2A'),
(3, '3', '1', '3A'),
(4, '4', '1', '4A'),
(5, '5', '1', '5A'),
(6, '6', '1', '6A'),
(7, '7', '1', '7A'),
(8, '8', '1', '8A'),
(9, '9', '1', '9A'),
(10, '10', '1', '10A'),
(11, '11', '1', '1B'),
(12, '12', '1', '2B'),
(13, '13', '1', '3B'),
(14, '14', '1', '4B'),
(15, '15', '1', '5B'),
(16, '16', '1', '6B'),
(17, '17', '1', '7B'),
(18, '18', '1', '8B'),
(19, '19', '1', '9B'),
(20, '20', '1', '10B'),
(21, '21', '1', '1C'),
(22, '22', '1', '2C'),
(23, '23', '1', '3C'),
(24, '24', '1', '4C'),
(25, '25', '1', '5C'),
(26, '26', '1', '6C'),
(27, '27', '1', '7C'),
(28, '28', '1', '8C'),
(29, '29', '1', '9C'),
(30, '30', '1', '10C'),
(31, '31', '2', '1A'),
(32, '32', '2', '2A'),
(33, '33', '2', '3A'),
(34, '34', '2', '4A'),
(35, '35', '2', '5A'),
(36, '36', '2', '6A'),
(37, '37', '2', '7A'),
(38, '38', '2', '8A'),
(39, '39', '2', '9A'),
(40, '40', '2', '10A'),
(41, '41', '2', '1B'),
(42, '42', '2', '2B'),
(43, '43', '2', '3B'),
(44, '44', '2', '4B'),
(45, '45', '2', '5B'),
(46, '46', '2', '6B'),
(47, '47', '2', '7B'),
(48, '48', '2', '8B'),
(49, '49', '2', '9B'),
(50, '50', '2', '10B'),
(51, '51', '2', '1C'),
(52, '52', '2', '2C'),
(53, '53', '2', '4C'),
(54, '54', '2', '5C'),
(55, '55', '2', '6C'),
(56, '56', '2', '7C'),
(57, '57', '2', '7C'),
(58, '58', '2', '8C'),
(59, '59', '2', '9C'),
(60, '60', '2', '10C'),
(61, '61', '3', '1A'),
(62, '62', '3', '2A'),
(63, '63', '3', '3A'),
(64, '64', '3', '4A'),
(65, '65', '3', '5A'),
(66, '66', '3', '6A'),
(67, '67', '3', '7A'),
(68, '68', '3', '8A'),
(69, '69', '3', '9A'),
(70, '70', '3', '10A'),
(71, '71', '3', '1B'),
(72, '72', '3', '2B'),
(73, '73', '3', '3B'),
(74, '74', '3', '4B'),
(75, '75', '3', '5B'),
(76, '76', '3', '6B'),
(77, '77', '3', '7B'),
(78, '78', '3', '8B'),
(79, '79', '3', '9B'),
(80, '80', '3', '10B'),
(81, '81', '3', '1C'),
(82, '82', '3', '2C'),
(83, '83', '3', '3C'),
(84, '84', '3', '4C'),
(85, '85', '3', '5C'),
(86, '86', '3', '6C'),
(87, '87', '3', '7C'),
(88, '88', '3', '8C'),
(89, '89', '3', '9C'),
(90, '90', '3', '10C'),
(91, '91', '4', '1A'),
(92, '92', '4', '2A'),
(93, '93', '4', '3A'),
(94, '94', '4', '4A'),
(95, '95', '4', '5A'),
(96, '96', '4', '6A'),
(97, '97', '4', '7A'),
(98, '98', '4', '8A'),
(99, '99', '4', '9A'),
(100, '100', '4', '10A'),
(101, '101', '4', '1B'),
(102, '102', '4', '2B'),
(103, '103', '4', '3B'),
(104, '104', '4', '4B'),
(105, '105', '4', '5B'),
(106, '106', '4', '6B'),
(107, '107', '4', '6C'),
(108, '108', '4', '8B'),
(109, '109', '4', '9B'),
(110, '110', '4', '10B'),
(111, '111', '4', '1C'),
(112, '112', '4', '2C'),
(113, '113', '4', '3C'),
(114, '114', '4', '4C'),
(115, '115', '4', '5C'),
(116, '116', '4', '6C'),
(117, '117', '4', '7C'),
(118, '118', '4', '8C'),
(119, '119', '4', '9C'),
(120, '120', '4', '10C'),
(121, '121', '5', '1A'),
(122, '122', '5', '2A'),
(123, '123', '5', '3A'),
(124, '124', '5', '4A'),
(125, '125', '5', '5A'),
(126, '126', '5', '6A'),
(127, '127', '5', '7A'),
(128, '128', '5', '8A'),
(129, '129', '5', '9A'),
(130, '130', '5', '10A'),
(131, '131', '5', '1B'),
(132, '132', '5', '2B'),
(133, '133', '5', '3B'),
(134, '134', '5', '4B'),
(135, '135', '5', '5B'),
(136, '136', '5', '6B'),
(137, '137', '5', '7B'),
(138, '138', '5', '8B'),
(139, '139', '5', '9B'),
(140, '140', '5', '10B'),
(141, '141', '5', '1C'),
(142, '142', '5', '2C'),
(143, '143', '5', '3C'),
(144, '144', '5', '4C'),
(145, '145', '5', '5C'),
(146, '146', '5', '6C'),
(147, '147', '5', '7C'),
(148, '148', '5', '8C'),
(149, '149', '5', '9C'),
(150, '150', '5', '10C');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
  `identitasID` int(11) NOT NULL,
  `jenisID` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`identitasID`, `jenisID`) VALUES
(1, 'KTP'),
(2, 'SIM'),
(3, 'Paspor');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `jadwalID` int(11) NOT NULL,
  `KAID` int(11) NOT NULL,
  `stasiunID` int(11) NOT NULL,
  `StasiunID1` int(11) NOT NULL,
  `kelasID` int(11) NOT NULL,
  `Harga` varchar(64) NOT NULL DEFAULT '',
  `Jam` time NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwalID`, `KAID`, `stasiunID`, `StasiunID1`, `kelasID`, `Harga`, `Jam`) VALUES
(1, 1, 1, 4, 1, '100000', '08:00:00'),
(2, 1, 4, 1, 1, '170000', '16:00:00'),
(3, 2, 1, 2, 1, '160000', '07:00:00'),
(4, 2, 2, 1, 1, '165000', '17:00:00'),
(5, 3, 1, 8, 1, '150000', '09:00:00'),
(6, 3, 8, 1, 1, '150000', '19:00:00'),
(7, 4, 1, 10, 1, '200000', '08:00:00'),
(8, 4, 10, 1, 1, '200000', '12:00:00'),
(9, 5, 1, 5, 1, '250000', '13:00:00'),
(10, 5, 5, 1, 1, '250000', '20:00:00'),
(11, 6, 12, 8, 1, '170000', '18:00:00'),
(12, 6, 8, 12, 1, '170000', '14:00:00'),
(13, 7, 1, 6, 6, '200000', '19:00:00'),
(14, 7, 6, 1, 1, '200000', '15:00:00'),
(15, 8, 1, 6, 1, '200000', '17:00:00'),
(16, 8, 6, 1, 1, '200000', '09:00:00'),
(17, 9, 1, 10, 1, '200000', '07:00:00'),
(18, 9, 10, 1, 1, '200000', '12:00:00'),
(19, 10, 1, 9, 1, '75000', '06:00:00'),
(20, 10, 9, 1, 1, '75000', '17:00:00'),
(21, 11, 1, 7, 1, '70000', '14:00:00'),
(22, 11, 7, 1, 1, '70000', '17:00:00'),
(23, 12, 12, 11, 1, '100000', '09:00:00'),
(24, 12, 11, 12, 1, '100000', '17:00:00'),
(25, 1, 1, 1, 1, '160000', '00:00:00'),
(26, 1, 1, 1, 1, '170000', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jumlah`
--

CREATE TABLE IF NOT EXISTS `jumlah` (
  `jumlahID` int(11) NOT NULL,
  `jumlahNama` double NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jumlah`
--

INSERT INTO `jumlah` (`jumlahID`, `jumlahNama`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ka`
--

CREATE TABLE IF NOT EXISTS `ka` (
  `KAID` int(11) NOT NULL,
  `KANama` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ka`
--

INSERT INTO `ka` (`KAID`, `KANama`) VALUES
(1, 'Angin Ribut'),
(2, 'Buraq angkasa'),
(4, 'Argo Sindoro'),
(3, 'Argo Dwipanga'),
(5, 'Argo Muria'),
(6, 'Sembrani'),
(7, 'Taksaka 1'),
(8, 'Taksaka 2'),
(9, 'Gumarang'),
(10, 'Angkasa Jaya'),
(11, 'Buraq Ekspress'),
(12, 'Senja Utama');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE IF NOT EXISTS `kasir` (
  `kasirID` int(11) NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`kasirID`, `username`, `password`) VALUES
(1, 'kasir', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `kelasID` int(11) NOT NULL,
  `kelasNama` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelasID`, `kelasNama`) VALUES
(1, 'Eksekutif'),
(2, 'Bisnis'),
(3, 'Ekonomi');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `pembayaranID` int(11) NOT NULL,
  `jenisPembayaran` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaranID`, `jenisPembayaran`) VALUES
(1, 'Credit Card'),
(2, 'Paypal'),
(3, 'Transfer Antar BANK');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE IF NOT EXISTS `reservasi` (
  `reservasiID` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL DEFAULT '',
  `no_identitas` varchar(64) NOT NULL DEFAULT '',
  `identitasID` int(11) NOT NULL,
  `no_telp` varchar(24) NOT NULL DEFAULT '',
  `email` varchar(64) NOT NULL DEFAULT '',
  `jadwalID` int(11) NOT NULL,
  `KAID` int(11) NOT NULL,
  `stasiunID` int(11) NOT NULL,
  `stasiunID1` int(11) NOT NULL,
  `pembayaranID` int(11) NOT NULL,
  `pemilik` varchar(64) NOT NULL,
  `bankID` int(11) NOT NULL,
  `rekening` varchar(64) NOT NULL DEFAULT '',
  `jumlahID` int(11) NOT NULL,
  `tanggal_berangkat` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`reservasiID`, `nama`, `no_identitas`, `identitasID`, `no_telp`, `email`, `jadwalID`, `KAID`, `stasiunID`, `stasiunID1`, `pembayaranID`, `pemilik`, `bankID`, `rekening`, `jumlahID`, `tanggal_berangkat`) VALUES
(2, 'Alter Gajah Mada', '45678', 1, '08567864025', 'air_alter@yahoo.co.id', 3, 2, 1, 2, 2, 'Alter Gajah Mada', 7, '12345', 2, '2011-01-22'),
(3, 'archer', '12121', 1, '08213231', 'adasdas', 1, 1, 1, 1, 1, '12121', 1, '1212121221', 1, '2016-06-01'),
(4, 'aga', '1212', 1, '12121', 'aga@gmail.com', 1, 1, 1, 1, 3, '121', 1, '0920930293', 1, '2016-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `stasiun`
--

CREATE TABLE IF NOT EXISTS `stasiun` (
  `stasiunID` int(11) NOT NULL,
  `stasiunNama` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stasiun`
--

INSERT INTO `stasiun` (`stasiunID`, `stasiunNama`) VALUES
(1, 'Banda Aceh'),
(2, 'Banda Aceh'),
(3, 'Banda Aceh'),
(4, 'Banda Aceh'),
(5, 'Banda Aceh'),
(6, 'Banda Aceh'),
(7, 'Banda Aceh'),
(8, 'Banda Aceh'),
(9, 'Banda Aceh'),
(10, 'Banda Aceh'),
(11, 'Banda Aceh'),
(12, 'Banda Aceh');

-- --------------------------------------------------------

--
-- Table structure for table `stasiun1`
--

CREATE TABLE IF NOT EXISTS `stasiun1` (
  `stasiunID1` int(11) NOT NULL,
  `stasiunNama1` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stasiun1`
--

INSERT INTO `stasiun1` (`stasiunID1`, `stasiunNama1`) VALUES
(1, 'Banda Aceh - Medan'),
(2, 'Banda Aceh - Binjai'),
(3, 'Banda Aceh - Langsa'),
(4, 'Banda Aceh - Idi Rayeuk\r\n'),
(5, 'Banda Aceh - Lhokseumawe'),
(6, 'Banda Aceh - Sigli'),
(7, 'Banda Aceh - Tapak Tuan'),
(8, 'Banda Aceh - Meulaboh'),
(9, 'Banda Aceh - Lamno'),
(10, 'Banda Aceh - Subulussalam'),
(11, 'Banda Aceh - Singkil'),
(12, 'Banda Aceh - Blang Pidie'),
(13, 'Banda Aceh - Stabat');

-- --------------------------------------------------------

--
-- Table structure for table `testi`
--

CREATE TABLE IF NOT EXISTS `testi` (
  `testiID` int(11) NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `pesan` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testi`
--

INSERT INTO `testi` (`testiID`, `username`, `pesan`) VALUES
(1, 'alter', 'tes'),
(2, 'bleketek', 'sundul gan..pesanan udah nyampe..top markotop dah..\r\nbagi yang m');

-- --------------------------------------------------------

--
-- Table structure for table `trayek`
--

CREATE TABLE IF NOT EXISTS `trayek` (
  `trayekID` int(11) NOT NULL,
  `trayekName` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trayek`
--

INSERT INTO `trayek` (`trayekID`, `trayekName`) VALUES
(1, 'Banda Aceh - Medan'),
(2, 'Banda Aceh - Binjai'),
(3, 'Banda Aceh - Langsa'),
(4, 'Banda Aceh - Idi Rayeuk'),
(5, 'Banda Aceh - Lhokseumawe'),
(6, 'Banda Aceh - Sigli'),
(7, 'Banda Aceh - Tapak Tuan'),
(8, 'Banda Aceh - Meulaboh'),
(9, 'Banda Aceh - Lamno'),
(10, 'Banda Aceh - Subulussalam'),
(11, 'Banda Aceh - Singkil'),
(12, 'Banda Aceh - Blang Pidie'),
(13, 'Banda Aceh - Bireun'),
(14, 'Banda Aceh - Takengon'),
(15, 'Banda Aceh - Seulawah'),
(16, 'Banda Aceh - Kuala Simpang');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `accessLevel` varchar(64) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `accessLevel`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'guest', 'guest', 'guest'),
(3, 'alter', 'alter', ''),
(4, 'baket', 'baket', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bankID`);

--
-- Indexes for table `chair`
--
ALTER TABLE `chair`
  ADD PRIMARY KEY (`chairID`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`identitasID`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwalID`);

--
-- Indexes for table `jumlah`
--
ALTER TABLE `jumlah`
  ADD PRIMARY KEY (`jumlahID`);

--
-- Indexes for table `ka`
--
ALTER TABLE `ka`
  ADD PRIMARY KEY (`KAID`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelasID`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaranID`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`reservasiID`);

--
-- Indexes for table `stasiun`
--
ALTER TABLE `stasiun`
  ADD PRIMARY KEY (`stasiunID`);

--
-- Indexes for table `stasiun1`
--
ALTER TABLE `stasiun1`
  ADD PRIMARY KEY (`stasiunID1`);

--
-- Indexes for table `testi`
--
ALTER TABLE `testi`
  ADD PRIMARY KEY (`testiID`);

--
-- Indexes for table `trayek`
--
ALTER TABLE `trayek`
  ADD PRIMARY KEY (`trayekID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bankID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `identitasID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwalID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `jumlah`
--
ALTER TABLE `jumlah`
  MODIFY `jumlahID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ka`
--
ALTER TABLE `ka`
  MODIFY `KAID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelasID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaranID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `reservasiID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stasiun`
--
ALTER TABLE `stasiun`
  MODIFY `stasiunID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `stasiun1`
--
ALTER TABLE `stasiun1`
  MODIFY `stasiunID1` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `testi`
--
ALTER TABLE `testi`
  MODIFY `testiID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trayek`
--
ALTER TABLE `trayek`
  MODIFY `trayekID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
