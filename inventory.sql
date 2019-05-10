-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 02:51 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` int(20) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `qty` varchar(30) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `harga_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `qty`, `harga`, `harga_beli`) VALUES
(3, 111, 'lemari', '1', '50000', 4500),
(4, 1225, 'kayu', '140', '50000', 4500),
(5, 1452, 'kayu', '12', '50000', 4700),
(6, 1552, 'baju', '11', '20000', 1750),
(7, 22155, 'gula', '2', '2000', 1000),
(8, 22155, 'asdad2', '4', '1100', 4111);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `alamat`, `no_hp`, `status`) VALUES
(1, 'pt. abadi nan', 'lampung', '0044', 'lall'),
(2, 'pt suka citata', '', '', ''),
(3, 'latief', '', '', ''),
(4, 'ptt', 'jakart', '0228844', '1');

-- --------------------------------------------------------

--
-- Table structure for table `history_bayar`
--

CREATE TABLE `history_bayar` (
  `id_bayar` int(11) NOT NULL,
  `kode_transaksi` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `level`, `status`) VALUES
(1, 'latief', '03485d900be5631d0177eb9e1bfa98bf', 'admin', '0'),
(3, 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'admin', '0'),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1'),
(6, 'qohar', 'c19fa7906f9b2e7a9dd4ed57639fd877', 'staff', '1');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telpon` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama`, `alamat`, `no_telpon`, `status`) VALUES
(1, 'pt maju jaya', 'jakarta', '0211115', '1'),
(2, 'andi', 'lampung', '021566', '0'),
(3, 'andi sa', 'lampung', '021566', '0'),
(4, 'ptt', 'tangera', '55864', '0');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail_keluar`
--

CREATE TABLE `transaksi_detail_keluar` (
  `id_transaksi_detail_keluar` int(12) NOT NULL,
  `id_transaksi_keluar` int(20) NOT NULL,
  `id_barang` int(20) NOT NULL,
  `qty` int(20) NOT NULL,
  `harga_jual` int(30) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail_keluar`
--

INSERT INTO `transaksi_detail_keluar` (`id_transaksi_detail_keluar`, `id_transaksi_keluar`, `id_barang`, `qty`, `harga_jual`, `subtotal`) VALUES
(11, 15, 4, 2, 50000, 100000),
(12, 15, 3, 1, 200, 200),
(13, 16, 4, 1, 50000, 50000),
(14, 16, 3, 2, 50000, 100000),
(15, 16, 6, 3, 20000, 60000),
(16, 17, 3, 2, 50000, 100000),
(17, 17, 4, 10, 50000, 500000),
(18, 17, 6, 5, 20000, 100000),
(19, 18, 4, 2, 50000, 100000),
(20, 19, 4, 2, 50000, 100000),
(21, 19, 3, 1, 50000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail_masuk`
--

CREATE TABLE `transaksi_detail_masuk` (
  `id_transaksi_detail_masuk` int(11) NOT NULL,
  `id_transaksi_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail_masuk`
--

INSERT INTO `transaksi_detail_masuk` (`id_transaksi_detail_masuk`, `id_transaksi_masuk`, `id_barang`, `qty`, `harga_beli`, `subtotal`) VALUES
(9, 7, 3, 1, 0, 4500),
(16, 13, 4, 2, 4500, 9000),
(17, 13, 3, 1, 4500, 4500),
(20, 15, 3, 1, 4500, 4500),
(21, 15, 4, 2, 4500, 9000),
(22, 16, 3, 2, 4500, 9000),
(23, 16, 4, 1, 4500, 4500),
(24, 17, 5, 1, 4700, 4700),
(25, 17, 3, 2, 4500, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_keluar`
--

CREATE TABLE `transaksi_keluar` (
  `id_transaksi_keluar` int(11) NOT NULL,
  `kode_transaksi` int(11) NOT NULL,
  `kode_invoice` varchar(30) NOT NULL,
  `kode_surat_jalan` varchar(30) DEFAULT NULL,
  `tanggal_transaksi` date NOT NULL,
  `grand_total` int(30) NOT NULL,
  `bayar` int(30) NOT NULL DEFAULT '0',
  `qty_total` int(30) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `status_transaksi` int(11) DEFAULT '0',
  `status_user` int(30) DEFAULT '0',
  `status_invoice` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_keluar`
--

INSERT INTO `transaksi_keluar` (`id_transaksi_keluar`, `kode_transaksi`, `kode_invoice`, `kode_surat_jalan`, `tanggal_transaksi`, `grand_total`, `bayar`, `qty_total`, `id_customer`, `status_transaksi`, `status_user`, `status_invoice`) VALUES
(15, 1, '', 'SJ/100', '2019-02-02', 100200, 0, 3, 3, 1, 1, 0),
(16, 1233, '', 'SJ/SJ/003', '2019-02-03', 210000, 0, 6, 1, 1, 1, 0),
(17, 12345, '', NULL, '2019-02-18', 700000, 0, 17, 1, 0, 1, 0),
(18, 14, '', NULL, '2019-02-10', 100000, 0, 2, 3, 0, 1, 0),
(19, 3334, '20/INV/2019', '20/SJ/2019', '2019-03-05', 150000, 0, 3, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_masuk`
--

CREATE TABLE `transaksi_masuk` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(30) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total` varchar(30) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa_bayar` int(11) NOT NULL,
  `id_suplier` int(11) NOT NULL DEFAULT '0',
  `no_po` varchar(30) NOT NULL,
  `surat_jalan` varchar(30) NOT NULL,
  `tanggal_terima` date DEFAULT NULL,
  `invoice` varchar(30) NOT NULL,
  `status_user` int(11) NOT NULL DEFAULT '0',
  `status_invoice` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_masuk`
--

INSERT INTO `transaksi_masuk` (`id_transaksi`, `kode_transaksi`, `tgl_transaksi`, `total`, `grand_total`, `bayar`, `sisa_bayar`, `id_suplier`, `no_po`, `surat_jalan`, `tanggal_terima`, `invoice`, `status_user`, `status_invoice`) VALUES
(7, '1133', '2019-03-05', '', 4500, 60100, 0, 1, '1133/ PO /2019', 'ajjdb520', '2019-03-17', 'sjjwnha3333', 3, 1),
(13, '12345', '2019-03-04', '3', 13500, 1000, 0, 2, '1133/ PO /2019', 'ddxsdca', '2019-03-17', 'dadfsd', 3, 1),
(15, '1223', '2019-03-08', '3', 13500, 0, 0, 1, '1133/ PO /2019', 'sj112', '2019-03-17', 'in221', 3, 1),
(16, '5444', '2019-03-02', '3', 13500, 0, 0, 1, '1133/ PO /2019', 'sj4443', '2019-03-17', 'inv3334', 3, 1),
(17, '112', '2019-03-23', '3', 13700, 0, 0, 1, '1133/ PO /2019', 'sj112', '2019-03-17', 'inv3334', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trx_detail`
--

CREATE TABLE `trx_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `id_transaksi_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trx_detail`
--

INSERT INTO `trx_detail` (`id_transaksi_detail`, `id_transaksi_masuk`, `id_barang`, `qty`) VALUES
(1, 2, 2, '2'),
(2, 2, 2, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `history_bayar`
--
ALTER TABLE `history_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `transaksi_detail_keluar`
--
ALTER TABLE `transaksi_detail_keluar`
  ADD PRIMARY KEY (`id_transaksi_detail_keluar`);

--
-- Indexes for table `transaksi_detail_masuk`
--
ALTER TABLE `transaksi_detail_masuk`
  ADD PRIMARY KEY (`id_transaksi_detail_masuk`);

--
-- Indexes for table `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  ADD PRIMARY KEY (`id_transaksi_keluar`);

--
-- Indexes for table `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `trx_detail`
--
ALTER TABLE `trx_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `history_bayar`
--
ALTER TABLE `history_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaksi_detail_keluar`
--
ALTER TABLE `transaksi_detail_keluar`
  MODIFY `id_transaksi_detail_keluar` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `transaksi_detail_masuk`
--
ALTER TABLE `transaksi_detail_masuk`
  MODIFY `id_transaksi_detail_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `transaksi_keluar`
--
ALTER TABLE `transaksi_keluar`
  MODIFY `id_transaksi_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `transaksi_masuk`
--
ALTER TABLE `transaksi_masuk`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `trx_detail`
--
ALTER TABLE `trx_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
