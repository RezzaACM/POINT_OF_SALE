-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2019 pada 08.18
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_point_of_sale`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_category`
--

CREATE TABLE `mt_category` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `ts_create_by` varchar(50) NOT NULL,
  `ts_create` datetime NOT NULL,
  `ts_update_by` varchar(50) NOT NULL,
  `ts_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mt_category`
--

INSERT INTO `mt_category` (`id_kategori`, `kategori`, `ts_create_by`, `ts_create`, `ts_update_by`, `ts_update`) VALUES
(1, 'Makanan', 'administrator', '2019-08-12 11:41:26', 'administrator', '2019-08-12 11:41:26'),
(2, 'Minuman', 'administrator', '2019-08-09 22:16:34', 'administrator', '2019-08-09 22:16:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_customer`
--

CREATE TABLE `mt_customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `ts_update_by` varchar(50) NOT NULL,
  `ts_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_items`
--

CREATE TABLE `mt_items` (
  `id_item` char(15) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga_item` float NOT NULL,
  `stok_item` int(11) NOT NULL,
  `status_item` int(11) NOT NULL,
  `deskripsi_item` text NOT NULL,
  `ts_create_by` varchar(50) NOT NULL,
  `ts_create` datetime NOT NULL,
  `ts_update_by` varchar(50) NOT NULL,
  `ts_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mt_items`
--

INSERT INTO `mt_items` (`id_item`, `nama_item`, `id_kategori`, `harga_item`, `stok_item`, `status_item`, `deskripsi_item`, `ts_create_by`, `ts_create`, `ts_update_by`, `ts_update`) VALUES
('MENU-1308122', 'Sop Iga', 1, 30000, 4, 0, 'Sop Nigga Sapi', 'administrator', '2019-08-12 11:41:26', 'administrator', '2019-08-13 23:44:12'),
('MENU-1308401', 'Ayam Bakar', 1, 15000, 14, 1, 'Ayam Bakar Sambal Madu', 'administrator', '2019-08-12 11:41:26', 'administrator', '2019-08-13 23:39:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_payment_methode`
--

CREATE TABLE `mt_payment_methode` (
  `id_payment` int(11) NOT NULL,
  `nama_payment` varchar(50) NOT NULL,
  `ts_create_by` varchar(50) NOT NULL,
  `ts_create` datetime NOT NULL,
  `ts_update_by` varchar(50) NOT NULL,
  `ts_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mt_payment_methode`
--

INSERT INTO `mt_payment_methode` (`id_payment`, `nama_payment`, `ts_create_by`, `ts_create`, `ts_update_by`, `ts_update`) VALUES
(1, 'Cash', 'Adminsitrator', '2019-08-14 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_staff`
--

CREATE TABLE `mt_staff` (
  `id_staff` int(11) NOT NULL,
  `nama_staff` varchar(50) NOT NULL,
  `jns_klmn_staff` char(10) NOT NULL,
  `no_telp_staff` varchar(20) NOT NULL,
  `alamat_staff` text NOT NULL,
  `jabatan_staff` varchar(20) NOT NULL,
  `status_staff` int(11) NOT NULL,
  `ts_create_by` varchar(50) NOT NULL,
  `ts_create` datetime NOT NULL,
  `ts_update_by` varchar(50) NOT NULL,
  `ts_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mt_staff`
--

INSERT INTO `mt_staff` (`id_staff`, `nama_staff`, `jns_klmn_staff`, `no_telp_staff`, `alamat_staff`, `jabatan_staff`, `status_staff`, `ts_create_by`, `ts_create`, `ts_update_by`, `ts_update`) VALUES
(1, 'Santi Yulianti', 'Laki-laki', '081779104417', 'Villa Mutiara Serpong B1/1', 'Kepala Toko', 0, '', '0000-00-00 00:00:00', 'administrator', '2019-08-12 12:31:57'),
(4, 'Funky Reza', 'Laki-laki', '+6281779104416', 'Villa Mutiara Serpong D3/26', 'Kepala Koki', 1, 'administrator', '2019-08-12 11:41:46', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ts_order`
--

CREATE TABLE `ts_order` (
  `id_invoice` char(15) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ts_order` datetime NOT NULL,
  `ts_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ts_order`
--

INSERT INTO `ts_order` (`id_invoice`, `nama_customer`, `total_bayar`, `id_user`, `ts_order`, `ts_update`) VALUES
('DSBY-0814-01', 'Reza', 50000, 2, '2019-08-14 10:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ts_order_detail`
--

CREATE TABLE `ts_order_detail` (
  `id_invoice` char(15) NOT NULL,
  `id_item` char(15) NOT NULL,
  `jumlah_order` int(11) NOT NULL,
  `id_payment` int(11) NOT NULL,
  `diskon` float NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ts_order_detail`
--

INSERT INTO `ts_order_detail` (`id_invoice`, `id_item`, `jumlah_order`, `id_payment`, `diskon`, `subtotal`) VALUES
('DSBY-0814-01', 'MENU-1308401', 3, 1, 0.1, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_user` varchar(100) DEFAULT NULL,
  `level_user` int(1) NOT NULL,
  `last_login` datetime NOT NULL,
  `ts_create_by` varchar(50) NOT NULL,
  `ts_create` datetime NOT NULL,
  `ts_update_by` varchar(50) NOT NULL,
  `ts_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_staff`, `username`, `password`, `foto_user`, `level_user`, `last_login`, `ts_create_by`, `ts_create`, `ts_update_by`, `ts_update`) VALUES
(2, 1, 'administrator', '0192023a7bbd73250516f069df18b500', 'tNAB87RTSx.png', 1, '2019-08-14 21:52:30', '', '0000-00-00 00:00:00', 'administrator', '2019-08-13 23:43:36'),
(14, 4, 'RezzaACM', 'c4ca4238a0b923820dcc509a6f75849b', 'QcJo8dTYGh.png', 2, '0000-00-00 00:00:00', 'administrator', '2019-08-13 15:43:13', 'administrator', '2019-08-14 14:58:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mt_category`
--
ALTER TABLE `mt_category`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `mt_customer`
--
ALTER TABLE `mt_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `mt_items`
--
ALTER TABLE `mt_items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `mt_payment_methode`
--
ALTER TABLE `mt_payment_methode`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indeks untuk tabel `mt_staff`
--
ALTER TABLE `mt_staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indeks untuk tabel `ts_order`
--
ALTER TABLE `ts_order`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mt_category`
--
ALTER TABLE `mt_category`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mt_customer`
--
ALTER TABLE `mt_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mt_payment_methode`
--
ALTER TABLE `mt_payment_methode`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mt_staff`
--
ALTER TABLE `mt_staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
