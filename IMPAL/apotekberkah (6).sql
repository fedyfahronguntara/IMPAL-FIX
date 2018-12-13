-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 07:20 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotekberkah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` varchar(6) NOT NULL,
  `unameAdmin` varchar(20) NOT NULL,
  `pwAdmin` varchar(25) NOT NULL,
  `namaAdmin` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `unameAdmin`, `pwAdmin`, `namaAdmin`) VALUES
('ADM001', 'admin', 'admin', 'burhan');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `obat` varchar(150) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` float NOT NULL,
  `total` float NOT NULL,
  `pemilik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`obat`, `jumlah`, `harga`, `total`, `pemilik`) VALUES
('22781', 2, 149000, 298000, 'admin'),
('12340', 2, 259000, 518000, 'CSM001'),
('22781', 1, 149000, 149000, 'CSM001'),
('28517', 3, 5500, 16500, 'admin'),
('12340', 1, 259000, 259000, 'kelpon'),
('22781', 2, 149000, 298000, 'kelpon'),
('57639', 2, 13000, 26000, 'kelpon'),
('57639', 2, 13000, 26000, 'CSM001'),
('98587', 2, 164000, 328000, 'CSM001');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `username` varchar(100) NOT NULL,
  `namaKonsumen` varchar(35) NOT NULL,
  `noHP` int(15) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `no` int(11) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`username`, `namaKonsumen`, `noHP`, `Alamat`, `no`, `password`) VALUES
('CSM001', 'fedy', 2147483647, 'bandung', 2, '1'),
('CSM002', 'asd', 0, 'asd', 12, '2'),
('kelpon', 'Kevin', 99099090, 'wenak', 13, 'Kelpon4869');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `idManager` varchar(6) NOT NULL,
  `unameManager` varchar(20) NOT NULL,
  `pwManager` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`idManager`, `unameManager`, `pwManager`) VALUES
('MNG', 'manager', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `idObat` varchar(6) NOT NULL,
  `namaObat` varchar(35) NOT NULL,
  `stock` int(5) NOT NULL,
  `keteranganKhasiat` varchar(150) NOT NULL,
  `harga` double NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`idObat`, `namaObat`, `stock`, `keteranganKhasiat`, `harga`, `foto`) VALUES
('22781', 'NyQuil Cold and Flu -', 15, ' Night Time Relief - 12 Kapsul - Original 100%', 149000, '7718659_b357151b-b83f-4343-9d5b-5171cc4b77b7_2048_2048.jpg'),
('28517', 'Vicks Formula 44 Dewasa 27ml', 181, 'Vicks Formula 44 Dewasa 27ml', 5500, ''),
('57639', 'Mix Saga ', 37, '- Obat Tetes Herbal Daun Saga', 13000, '130207796_2a15500a-6b31-47cb-99a0-38002ce35d49_1600_1600.jpg'),
('75416', 'Ke Chuan Pian (Wan)', 12, 'Obat Batuk Asthma / Asma Bengek / Mengi TCM Herbal', 190000, '3917041_1766d862-0615-48d5-8c4f-b647f77c8b4e_1000_851.jpg'),
('80161', 'Detopar De Nature', 16, 'Obat Sesak Nafas / Batuk Berdahak Menahun Berdarah TB TBC Paru Basah', 295000, '43820035_1b1ecdea-da17-4693-bee3-2ff37004068b_500_500.jpg'),
('84674', 'Takabb Anti', 23, ' - Cough Pill (Herbal Med) - Obat Batuk Thailand', 15000, '9662146_16b4370e-2a9b-4d67-a6b7-3a998afb5011_800_618.jpg'),
('98587', 'SAMBUCOL', 186, 'Sambucol Kids Cough Liquid combines Ivy leaf and Elderberry to work together for an all natural and effective solution for our kids chesty coughs.', 164000, '212079_75f12b16-b615-41e3-b99a-dfe1878e2f6d.png');

-- --------------------------------------------------------

--
-- Table structure for table `pemasokan`
--

CREATE TABLE `pemasokan` (
  `idPemasokan` int(8) NOT NULL,
  `idObat` varchar(6) NOT NULL,
  `idSupplier` varchar(6) NOT NULL,
  `tglPemasokan` varchar(10) NOT NULL,
  `jumlahPemasokan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasokan`
--

INSERT INTO `pemasokan` (`idPemasokan`, `idObat`, `idSupplier`, `tglPemasokan`, `jumlahPemasokan`) VALUES
(1, 'MDC001', 'SUP001', '24-09-1998', 100),
(95192, 'baygon', 'SUP005', '24-09-2018', 143);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `idSupplier` varchar(6) NOT NULL,
  `namSupplier` varchar(35) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kontak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idSupplier`, `namSupplier`, `alamat`, `kontak`) VALUES
('sip02', 'assewe', 'sukabirus', '098765421');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(8) NOT NULL,
  `idKonsumen` varchar(6) NOT NULL,
  `idObat` varchar(6) NOT NULL,
  `statusPesanan` varchar(20) NOT NULL,
  `statusPembayaran` varchar(1) NOT NULL,
  `tglTransaksi` varchar(12) NOT NULL,
  `totalBiaya` double NOT NULL,
  `buktitf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `idKonsumen`, `idObat`, `statusPesanan`, `statusPembayaran`, `tglTransaksi`, `totalBiaya`, `buktitf`) VALUES
(191, 'fedy', '12340', 'siap', '0', 'Fri-11-2018', 518000, ''),
(191, 'fedy', '22781', 'siap', '0', 'Fri-11-2018', 149000, ''),
(191, 'fedy', '', 'siap', '', 'Fri-11-2018', 0, 'nomer_5_1.PNG'),
(483, 'fedy', '12340', 'belum siap', '0', 'Fri-11-2018', 518000, ''),
(483, 'fedy', '22781', 'belum siap', '0', 'Fri-11-2018', 149000, ''),
(483, 'fedy', '', 'belum siap', '', 'Fri-11-2018', 3044, 'arp.PNG'),
(356, 'axel', '12340', 'belum siap', '0', 'Fri-11-2018', 518000, ''),
(356, 'axel', '22781', 'belum siap', '0', 'Fri-11-2018', 149000, ''),
(356, 'axel', '57639', 'belum siap', '0', 'Fri-11-2018', 26000, ''),
(356, 'axel', '', 'belum siap', '', 'Fri-11-2018', 55412, 'download_(1).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`no`),
  ADD KEY `idKonsumen` (`username`) USING BTREE;

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`idManager`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`idObat`);

--
-- Indexes for table `pemasokan`
--
ALTER TABLE `pemasokan`
  ADD PRIMARY KEY (`idPemasokan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idSupplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
