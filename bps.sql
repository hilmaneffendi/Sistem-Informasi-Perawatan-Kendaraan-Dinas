-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Jan 2016 pada 16.37
-- Versi Server: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hilman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `telepon`) VALUES
('BPS-ID-001', '21232f297a57a5a743894a0e4a801fc3', 'Hilman Effendi asus', '081323111222');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya`
--

CREATE TABLE `biaya` (
  `id` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` enum('Bahan Bakar','Pembelian Barang Atau Jasa') NOT NULL,
  `biaya` bigint(20) NOT NULL,
  `jumlah` double DEFAULT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kendaran_id` bigint(20) NOT NULL,
  `pemegang_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya`
--

INSERT INTO `biaya` (`id`, `tanggal`, `jenis`, `biaya`, `jumlah`, `keterangan`, `kendaran_id`, `pemegang_id`) VALUES
(2, '2015-12-18', 'Bahan Bakar', 20000, 2, 'x', 31, 1),
(3, '2015-12-28', 'Pembelian Barang Atau Jasa', 10000, 0, 'xx', 31, 1),
(4, '2015-12-21', 'Bahan Bakar', 20000, 2, 'x', 21, 2),
(5, '2015-12-23', 'Bahan Bakar', 30000, 3, 'xx', 21, 2),
(6, '2015-12-30', 'Pembelian Barang Atau Jasa', 100000, 0, 'xx', 21, 2),
(7, '2015-11-02', 'Bahan Bakar', 20000, 2, 'x', 31, 1),
(8, '2016-01-08', 'Pembelian Barang Atau Jasa', 50000, 0, 'ganti oli', 31, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` bigint(20) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `anggaran` int(11) NOT NULL,
  `pemegang_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nik`, `nama`, `nopol`, `anggaran`, `pemegang_id`) VALUES
(21, 'BPS-KD-804-251', 'Vario', 'z 0098 TY', 3000000, 2),
(31, 'BPS-KD-678-704', 'Beat', 'Z 123 XX', 3000000, 1),
(32, 'BPS-KD-816-318', 'Ferarri', 'Z 1111 XX', 100000, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemegang`
--

CREATE TABLE `pemegang` (
  `id` bigint(20) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemegang`
--

INSERT INTO `pemegang` (`id`, `nip`, `nama`, `alamat`, `telepon`) VALUES
(1, '196489439923412345', 'Hilman', 'Jalan raya sukasetia No. 12, RT 01/RW 01 Kota Tasikmalaya', '091323445123'),
(2, '839849549854999900', 'anggi rachmat', 'kawalu', '0867474744'),
(3, '102929882382838238', 'Mahmud Fajari', 'Kawali', '085353300225'),
(4, '345453453464644646', 'kosih', 'tasik', '454545454545'),
(5, '788888888888888888', 'anis', 'tasik', '085353300225');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_biaya`
--
CREATE TABLE `view_biaya` (
`id` bigint(20)
,`tanggal` date
,`biaya` bigint(20)
,`jumlah` double
,`nama` varchar(50)
,`nopol` varchar(10)
,`nami` varchar(50)
,`nip` varchar(18)
,`jenis` enum('Bahan Bakar','Pembelian Barang Atau Jasa')
,`keterangan` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_biaya`
--
DROP TABLE IF EXISTS `view_biaya`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_biaya`  AS  select `biaya`.`id` AS `id`,`biaya`.`tanggal` AS `tanggal`,`biaya`.`biaya` AS `biaya`,`biaya`.`jumlah` AS `jumlah`,`kendaraan`.`nama` AS `nama`,`kendaraan`.`nopol` AS `nopol`,`pemegang`.`nama` AS `nami`,`pemegang`.`nip` AS `nip`,`biaya`.`jenis` AS `jenis`,`biaya`.`keterangan` AS `keterangan` from ((`pemegang` join `kendaraan` on((`pemegang`.`id` = `kendaraan`.`pemegang_id`))) join `biaya` on((`pemegang`.`id` = `biaya`.`pemegang_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kendaran_id` (`kendaran_id`),
  ADD KEY `pemegang_id` (`pemegang_id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pemegang_id_2` (`pemegang_id`),
  ADD KEY `pemegang_id` (`pemegang_id`);

--
-- Indexes for table `pemegang`
--
ALTER TABLE `pemegang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `pemegang`
--
ALTER TABLE `pemegang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
