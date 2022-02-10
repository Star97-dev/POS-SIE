-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2021 at 01:29 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `satuan` enum('gram','mililiter','pcs') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama`, `stok`, `satuan`) VALUES
(15, 'Beras', 88, 'gram'),
(16, 'Jeruk', 96, 'pcs'),
(17, 'Roti', 56, 'pcs'),
(18, 'Minyak', 348, 'mililiter'),
(19, 'Sambal', 33, 'pcs'),
(20, 'Merica', 56, 'gram'),
(21, 'kecap', 16, 'pcs'),
(22, 'Gula', 49, 'gram');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_bahan` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `diskon` int(11) DEFAULT 0,
  `total` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_bahan`, `id_menu`, `harga`, `qty`, `satuan`, `diskon`, `total`, `id_user`) VALUES
(1, NULL, 7, 15000, 3, NULL, 0, 45000, 11);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(3) NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon_menu` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `id_penjualan`, `id_menu`, `qty`, `harga`, `diskon_menu`, `total`) VALUES
(33, 45, 1, 2, 18000, 4000, 28000),
(34, 45, 8, 6, 13000, 1000, 72000),
(36, 46, 10, 1, 10000, 1000, 9000),
(37, 46, 8, 2, 13000, 0, 26000),
(38, 46, 11, 1, 11000, 0, 11000),
(39, 46, 6, 3, 15000, 0, 45000),
(40, 46, 5, 1, 12000, 0, 12000),
(41, 47, 6, 1, 15000, 0, 15000),
(42, 47, 10, 3, 10000, 0, 30000),
(43, 47, 11, 2, 11000, 0, 22000),
(44, 48, 7, 4, 15000, 0, 60000),
(45, 48, 2, 4, 10000, 0, 40000),
(46, 49, 8, 3, 13000, 0, 39000),
(47, 49, 7, 2, 15000, 0, 30000),
(48, 50, 7, 4, 15000, 0, 60000),
(49, 50, 11, 4, 11000, 0, 44000),
(50, 51, 2, 1, 10000, 0, 10000),
(51, 51, 13, 1, 18000, 0, 18000),
(52, 52, 13, 1, 18000, 1000, 17000),
(53, 53, 7, 10, 15000, 5000, 100000),
(54, 53, 2, 8, 10000, 0, 80000),
(55, 53, 11, 2, 11000, 0, 22000),
(56, 54, 11, 6, 11000, 1100, 59400),
(58, 54, 8, 2, 13000, 1000, 24000),
(59, 55, 9, 1, 8000, 0, 8000),
(60, 55, 13, 1, 18000, 0, 18000),
(61, 56, 1, 6, 18000, 1000, 108000),
(62, 56, 2, 5, 10000, 0, 50000),
(63, 56, 11, 1, 11000, 0, 11000),
(64, 57, 6, 2, 15000, 500, 29000),
(65, 57, 7, 1, 15000, 0, 15000),
(66, 57, 11, 3, 12000, 0, 36000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_resep`
--

CREATE TABLE `detail_resep` (
  `id_detail_resep` int(10) NOT NULL,
  `id_menu` int(10) NOT NULL,
  `id_bahan` int(10) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_resep`
--

INSERT INTO `detail_resep` (`id_detail_resep`, `id_menu`, `id_bahan`, `qty`, `satuan`) VALUES
(254, 8, 20, '1', 'gram'),
(255, 8, 17, '1', 'pcs'),
(256, 8, 19, '1', 'pcs'),
(262, 1, 15, '2', 'gram      '),
(263, 1, 21, '4', 'pcs       '),
(265, 1, 19, '1', 'pcs'),
(266, 1, 18, '1', 'mililiter'),
(267, 1, 20, '2', 'gram      ');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` enum('Makanan','Snack','Minuman') NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `jenis`, `harga`) VALUES
(1, 'Nasi Goreng', 'Makanan', 18000),
(2, 'Jus Jeruk', 'Minuman', 10000),
(5, 'Es Kopi ', 'Minuman', 12000),
(6, 'Kentang', 'Snack', 15000),
(7, 'Burger', 'Snack', 15000),
(8, 'Kebab', 'Snack', 13000),
(9, 'Es Kacang Ijo', 'Minuman', 8000),
(10, 'Kopi Expresso', 'Minuman', 10000),
(11, 'Milk Tea', 'Minuman', 12000),
(13, 'Mie Goreng', 'Makanan', 18000);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_stok` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` enum('Internet','Peralatan','PDAM','PLN','Bahan') NOT NULL,
  `biaya` int(50) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `id_user`, `id_stok`, `tanggal`, `jenis`, `biaya`, `keterangan`) VALUES
(122, 9, 0, '2021-03-16', 'Bahan', 80000, 'Kulakan'),
(123, 9, 0, '2021-03-17', 'Bahan', 8000, 'Kulakan'),
(124, 9, 0, '2021-03-17', 'PLN', 450000, 'Listrik Maret'),
(125, 9, 0, '2021-04-25', 'Bahan', 8000, 'Kulak'),
(126, 9, 0, '2021-06-03', 'Bahan', 50000, 'Kulakan'),
(127, 9, 0, '2021-06-03', 'Bahan', 10000, 'Tambahan'),
(128, 9, 0, '2021-06-03', 'Bahan', 40000, 'Diskonan'),
(129, 9, 0, '2021-06-10', 'Bahan', 50000, 'kulakan'),
(130, 9, 0, '2021-08-10', 'Bahan', 20000, 'kulak'),
(131, 9, 0, '2022-08-16', 'Bahan', 50000, 'ojlik;hljk;h'),
(132, 9, 0, '2021-07-17', 'Bahan', 30000, 'Kulak'),
(133, 9, 0, '2021-06-17', 'PLN', 350000, 'Listrik lunas Juni');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `change` int(11) NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_user`, `tanggal`, `invoice`, `sub_total`, `diskon`, `total`, `cash`, `change`, `note`) VALUES
(45, 11, '2021-05-08', 'RJ2105080001', 100000, 1000, 99000, 100000, 1000, 'Lunas'),
(46, 11, '2021-05-09', 'RJ2105090001', 103000, 10000, 93000, 110000, 17000, 'Done'),
(47, 11, '2021-06-12', 'RJ2105120001', 67000, 0, 67000, 70000, 3000, 'Done'),
(48, 11, '2021-07-12', 'RJ2105120002', 100000, 5000, 95000, 100000, 5000, 'Done'),
(49, 11, '2021-05-13', 'RJ2105130001', 69000, 10000, 59000, 60000, 1000, 'Done'),
(50, 11, '2021-07-19', 'RJ2105190001', 104000, 10000, 94000, 100000, 6000, 'Done'),
(51, 11, '2021-08-19', 'RJ2105190002', 28000, 0, 28000, 30000, 2000, 'Done'),
(52, 11, '2021-06-03', 'RJ2106030001', 17000, 0, 17000, 20000, 3000, 'Done'),
(53, 11, '2021-06-04', 'RJ2106040001', 202000, 5000, 197000, 200000, 3000, 'Done'),
(54, 11, '2022-07-26', 'RJ2106110001', 83400, 1000, 82400, 222222, 139822, ''),
(55, 11, '2021-06-12', 'RJ2106120001', 8000, 0, 8000, 10000, 2000, ''),
(56, 11, '2022-07-20', 'RJ2106130001', 169000, 0, 169000, 170000, 1000, ''),
(57, 11, '2021-07-18', 'RJ2106180001', 80000, 1000, 79000, 80000, 1000, 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe` enum('In','Out') NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(50) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `id_supplier`, `id_user`, `id_bahan`, `tanggal`, `tipe`, `qty`, `total`, `keterangan`) VALUES
(176, 1, 9, 15, '2021-03-16', 'In', 8, 80000, 'Kulakan'),
(178, 1, 9, 22, '2021-04-25', 'In', 3, 8000, 'Kulak'),
(179, NULL, 9, 21, '2021-04-25', 'Out', 8, NULL, 'Kemasan rusak'),
(181, 2, 9, 17, '2021-06-03', 'In', 5, 40000, 'Kulak'),
(185, 2, 9, 19, '2021-06-03', 'In', 5, 40000, 'Diskonan'),
(186, 2, 9, 20, '2021-06-10', 'In', 20, 50000, 'kulakan'),
(187, 1, 9, 17, '2021-08-10', 'In', 20, 20000, 'kulak'),
(188, 2, 9, 18, '2022-08-16', 'In', 4, 50000, 'ojlik;hljk;h'),
(189, 3, 9, 21, '2021-07-17', 'In', 10, 30000, 'Kulak'),
(190, NULL, 9, 18, '2021-06-17', 'Out', 10, NULL, 'tidak layak pakai');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `no_telepon`, `alamat`, `keterangan`) VALUES
(1, 'Toko ABC', '0987765757', 'Kebumen', 'Menjual susu'),
(2, 'Sup A', '0988675785678', 'Surabaya', 'Jual bahan kue'),
(3, 'Sup B', '02020202025', 'Swiss belakang gunung salju', 'Menjual bahan makanan dan minuman');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `gaji` bigint(20) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:Admin, 2:Kasir, 3:Manager',
  `blokir` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `alamat`, `no_telepon`, `gaji`, `foto`, `level`, `blokir`) VALUES
(9, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Satria Anugerah', 'satriaanugerah94@gmail.com', 'Jl Tenggumung Baru Mulya 2/13        ', '0895326266600', 800000000, 'user-210311.jpg', 1, 'N'),
(11, 'Kasir', 'c7911af3adbd12a035b289556d96470a', 'Rezcio Narindra', 'ciociocio@gmail.com', '    Gubeng Surabaya    ', '98781000', 500000, 'user-210317.jpg', 2, 'N'),
(12, 'manager', '1d0258c2440a8d19e716292b231e3190', 'Dimas wahyu u', 'dimas@gmail.com', '    Jakarta    ', '98709800', 500000, 'user-210317.png', 3, 'N'),
(13, 'STAR', '8ff953dd97c4405234a04291dee39e0b', 'starash', 'star@gmail.com', 'Akihabara Street 34, Japan      ', '2147480000', 1000000, '', 1, ''),
(14, 'Oyek', '0fb53e9e5ead7853db860643b8b8f470', 'Fariz badnen', 'farizchan@gmail.com', ' Ampel punyaaaa oyek', '2147480000', 8000000, '', 1, 'N'),
(15, 'pakeo', '020d284e0a734bdf7fd76c4d1fc71754', 'pakeo pakwo', 'pakeo@gmail.com', '                 Sidoarjo brok                 ', '089532626660', 9000010, '', 2, 'N'),
(18, 'balung', '90dae715d83481fe1bf9cdd412831616', 'wulung', 'balung@gmail.com', 'randu agung', '0998687956', 99097097, '', 1, 'N'),
(24, 'foto', '66c9eed121277d8be2df09ce25c4687a', 'Werrrr', 'foto@gmail.com', 'HOGWARTSSSSS', '02512154', 2000000, 'user-210305.jpg', 1, 'N'),
(25, 'mad', '63faf9a9e04759f4ece532f53c0c8129', 'achmad', 'mad@gmail.com', 'Bulak Banteng', '087979494654', 500000, 'user-210618.png', 1, 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD PRIMARY KEY (`id_detail_resep`),
  ADD KEY `id_resep` (`id_menu`),
  ADD KEY `id_bahan` (`id_bahan`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pembelian` (`id_stok`),
  ADD KEY `id_pembelian_2` (`id_stok`),
  ADD KEY `id_pembelian_3` (`id_stok`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `id_supplier_2` (`id_supplier`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `detail_resep`
--
ALTER TABLE `detail_resep`
  MODIFY `id_detail_resep` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Constraints for table `detail_resep`
--
ALTER TABLE `detail_resep`
  ADD CONSTRAINT `detail_resep_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_resep_ibfk_2` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `stok_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `stok_ibfk_4` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
