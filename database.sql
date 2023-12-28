-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 07:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `email`, `alamat`, `no_telp`) VALUES
(1, 'FIKRI MUHAMMAD YUSUF', 'fikri@gmail.com', 'MOJOKERTO', '+62 856-0444-3416');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` char(10) NOT NULL,
  `kasur` char(10) DEFAULT NULL,
  `lemari` char(10) DEFAULT NULL,
  `meja_belajar` char(10) DEFAULT NULL,
  `status` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `kasur`, `lemari`, `meja_belajar`, `status`) VALUES
('1', 'Single', 'Ya', 'Ya', 'tersedia'),
('10', 'Double', 'Ya', 'Ya', 'tersedia'),
('11', 'Single', 'Ya', 'Ya', 'tersedia'),
('12', 'Double', 'Ya', 'Ya', 'tersedia'),
('2', 'Double', 'Ya', 'Ya', 'terisi'),
('3', 'Single', 'Ya', 'Ya', 'tersedia'),
('4', 'Double', 'Ya', 'Ya', 'tersedia'),
('5', 'Single', 'Ya', 'Ya', 'terisi'),
('6', 'Double', 'Ya', 'Ya', 'tersedia'),
('7', 'Single', 'Ya', 'Ya', 'tersedia'),
('8', 'Double', 'Ya', 'Ya', 'terisi'),
('9', 'Single', 'Ya', 'Ya', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pemesanan`
--

CREATE TABLE `laporan_pemesanan` (
  `id_laporan_pemesanan` int(11) NOT NULL,
  `id_pembayaran` int(10) DEFAULT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `no_rekeningno_emoney` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_pemesanan`
--

INSERT INTO `laporan_pemesanan` (`id_laporan_pemesanan`, `id_pembayaran`, `jenis_pembayaran`, `no_rekeningno_emoney`) VALUES
(2, 2, 'BNI', '12346678');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `no_rekeningno_emoney` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_kamar` char(10) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `isi_kamar` varchar(100) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `role`) VALUES
(1, 'admin', 'admin', 'nurulifdiyah@gmail.com', 'admin'),
(2, 'fikri', 'fikri', 'fikri@gmail.com', 'penyewa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `laporan_pemesanan`
--
ALTER TABLE `laporan_pemesanan`
  ADD PRIMARY KEY (`id_laporan_pemesanan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan_pemesanan`
--
ALTER TABLE `laporan_pemesanan`
  MODIFY `id_laporan_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
