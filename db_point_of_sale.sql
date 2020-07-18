-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2020 pada 10.39
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
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mt_category`
--

INSERT INTO `mt_category` (`id_kategori`, `kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(8, 'Camilan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_items`
--

CREATE TABLE `mt_items` (
  `id_item` char(15) NOT NULL,
  `nama_item` varchar(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga_item` float NOT NULL,
  `status_item` int(11) NOT NULL,
  `deskripsi_item` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mt_items`
--

INSERT INTO `mt_items` (`id_item`, `nama_item`, `id_kategori`, `harga_item`, `status_item`, `deskripsi_item`) VALUES
('MENU-05105410', 'Pepes Ikan Peda', 1, 12000, 1, 'Ikan peda yang dipepes dengan daun pisang dan dibumbui dengan olahan khas Sukabumi'),
('MENU-08100914', 'Es Jeruk', 2, 7000, 1, 'Minuman dengan jeruk peras alami '),
('MENU-08100916', 'Es Teh Manis', 2, 5000, 1, 'Teh manis dingin dengan kenikmatan yang haqiqi'),
('MENU-08105612', 'Ikan Asin Jambal', 1, 7000, 1, 'Ikan Asin Jambal yang Mantap'),
('MENU-11075972', 'Ayam Bakar', 1, 20000, 1, 'Test'),
('MENU-1308122', 'Sop Iga', 1, 30000, 1, 'Sop Nigga Sapi'),
('MENU-1308401', 'Ayam Goreng', 1, 15000, 1, 'Ayam Goreng Spesial Dapur Sunda Bu Yuyu'),
('MENU-16100056', 'Pepes Ayam', 1, 20000, 1, 'Pepes ayam khas Sukabumi'),
('MENU-16100128', 'Kulit Ayam Goreng', 1, 7000, 1, 'Sate kulit ayam goreng'),
('MENU-16100370', 'Teh Pucuk', 2, 4000, 1, 'Teh pucuk'),
('MENU-16100746', 'Bakwan Jagung', 1, 5000, 1, 'Gorengan bakwan jagung'),
('MENU-16100918', 'Pepes Ikan Mas', 1, 20000, 1, 'Pepes Ikan Mas dengan Bumbu Khas Sukabumi'),
('MENU-16100924', 'Paru Goreng', 1, 15000, 1, 'Paru sapi goreng dengan bumbu asam manis'),
('MENU-16101150', 'Tumis Kangkung', 1, 10000, 1, 'Tumis kangkung '),
('MENU-16101236', 'Ikan Lele Goreng', 1, 12000, 1, 'Ikan lele goreng dengan bumbu khas Sukabumi'),
('MENU-16101362', 'Ikan Gurame Goreng', 1, 25000, 1, 'Ikan Goreng Gurame Khas Sukabumi'),
('MENU-16101532', 'Ikan Mas Goreng', 1, 15000, 1, 'Ikan mas goreng dengan bumbu khas Sukabumi'),
('MENU-16101742', 'Tahu Goreng', 1, 2000, 1, 'Tahu goreng'),
('MENU-16102358', 'Pepes Jamur', 1, 8000, 1, 'Pepes Jamur khas Sukabumi'),
('MENU-16102648', 'Perkedel Kentang', 1, 5000, 1, 'Perkedel jagung terbaik'),
('MENU-16102722', 'Gepuk Empal', 1, 15000, 1, 'Daging Sapi dengan olahan gepuk'),
('MENU-16103364', 'Ikan Bawal Goreng', 1, 15000, 1, 'Ikan Bawal goreng khas Sukabumi'),
('MENU-16103454', 'Pepes Ikan Peda', 1, 12000, 1, 'Pepes Ikan Peda dengan bumbu khas Sukabumi'),
('MENU-16103634', 'Ikan Nila Goreng', 1, 15000, 1, 'Ikan nila goreng dengan bumbu khas Sukabumi'),
('MENU-16103668', 'Air Mineral', 2, 5000, 1, 'Aqua, Fit / Oasis'),
('MENU-16104330', 'Ati Ampela Goreng', 1, 7000, 1, 'Sate ati ampela yang digoreng'),
('MENU-16104338', 'Ikan Peda Goreng', 1, 10000, 1, 'Ikan peda digoreng dengan bumbu khas Sukabumi'),
('MENU-16104560', 'Pepes Tahu', 1, 5000, 1, 'Pepes tahu khas Sukabumi'),
('MENU-16104740', 'Ikan Sepat Goreng', 1, 7000, 1, 'Ikan Sepat asin yang digoreng'),
('MENU-16104944', 'Tempe Goreng', 1, 2000, 1, 'Tempe goreng'),
('MENU-16105126', 'Udang Goreng', 1, 10000, 1, 'Sate udang dengan 3 udang/tusuk'),
('MENU-16105666', 'Teh Tawar', 2, 3000, 1, 'Teh Tawar'),
('MENU-16105720', 'Ayam Goreng Pejantan', 1, 18000, 1, 'Ayam Pejantan Goreng'),
('MENU-16105852', 'Pepes Ikan Kembung', 1, 15000, 1, 'Ikan kembung yang dipepes dengan bumbu khas sukabumi'),
('MENU-17103774', 'Sample A', 1, 10000, 1, 'Test'),
('MENU-2609194', 'Sayur Asem', 1, 7000, 1, 'Sayur Asem Enak'),
('MENU-27062676', 'Contoh 1', 1, 15000, 1, 'Test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_payment_methode`
--

CREATE TABLE `mt_payment_methode` (
  `id_payment` int(11) NOT NULL,
  `nama_payment` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mt_payment_methode`
--

INSERT INTO `mt_payment_methode` (`id_payment`, `nama_payment`) VALUES
(1, 'Cash'),
(2, 'Go-Pay'),
(3, 'Ovo'),
(5, 'Debit BCA'),
(6, 'Link aja!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mt_staff`
--

CREATE TABLE `mt_staff` (
  `id_staff` int(11) NOT NULL,
  `nama_staff` varchar(20) NOT NULL,
  `jns_klmn_staff` char(10) NOT NULL,
  `no_telp_staff` varchar(20) NOT NULL,
  `alamat_staff` text NOT NULL,
  `jabatan_staff` varchar(20) NOT NULL,
  `status_staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mt_staff`
--

INSERT INTO `mt_staff` (`id_staff`, `nama_staff`, `jns_klmn_staff`, `no_telp_staff`, `alamat_staff`, `jabatan_staff`, `status_staff`) VALUES
(4, 'Yuyu Yudarsih', 'Perempuam', '-', 'Tangerang Selatan', 'Kepala Koki', 1),
(11, 'Santi Yulianti', 'Perempuam', '085959165499', 'Villa Mutiara Serpong D3/26', 'Kepala Toko', 1),
(12, 'Nia Herlina', 'Perempuam', '085780887394', 'Gg. Hj. Joan RT.004/002 Tangerang Selatan', 'Asisten Koki', 1),
(13, 'Dea Ayu', 'Perempuam', '085676789876', 'Cisauk', 'Pelayan', 1),
(14, 'Habibah', 'Perempuam', '089698090023', 'Tangerang Selatan', 'Kasir', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ts_order`
--

CREATE TABLE `ts_order` (
  `id_invoice` char(15) NOT NULL,
  `nama_customer` varchar(20) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total_bayar` int(9) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ts_order_date` date NOT NULL,
  `ts_order_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ts_order`
--

INSERT INTO `ts_order` (`id_invoice`, `nama_customer`, `diskon`, `total_bayar`, `id_user`, `ts_order_date`, `ts_order_time`) VALUES
('DSBY-0907-6', 'Ipan', 0, 10000, 18, '2020-07-09', '21:36:36'),
('DSBY-0910-1', 'Rafi', 10, 90900, 2, '2019-10-09', '10:07:06'),
('DSBY-1107-7', 'Test', 0, 70000, 18, '2020-07-11', '09:33:48'),
('DSBY-1107-8', 'Test 3', 0, 20000, 18, '2020-07-11', '09:44:56'),
('DSBY-1610-2', 'Jamal', 0, 150000, 18, '2019-10-16', '22:36:20'),
('DSBY-1702-4', 'Funky Reza', 10, 40500, 19, '2020-02-18', '06:03:49'),
('DSBY-1710-3', 'Maulana', 10, 32400, 18, '2019-10-17', '15:38:55'),
('DSBY-2906-5', 'Funky Reza', 0, 14000, 18, '2020-06-29', '14:19:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ts_order_detail`
--

CREATE TABLE `ts_order_detail` (
  `id_invoice` char(15) NOT NULL,
  `id_item` char(15) NOT NULL,
  `jumlah_order` int(3) NOT NULL,
  `id_payment` int(11) NOT NULL,
  `subtotal` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ts_order_detail`
--

INSERT INTO `ts_order_detail` (`id_invoice`, `id_item`, `jumlah_order`, `id_payment`, `subtotal`) VALUES
('DSBY-0910-1', 'MENU-08100914', 3, 1, 21000),
('DSBY-0910-1', 'MENU-0410446', 4, 1, 20000),
('DSBY-0910-1', 'MENU-1308401', 4, 1, 60000),
('DSBY-1610-2', 'MENU-0410446', 3, 5, 15000),
('DSBY-1610-2', 'MENU-16100056', 3, 5, 60000),
('DSBY-1610-2', 'MENU-08100916', 3, 5, 15000),
('DSBY-1610-2', 'MENU-1308122', 2, 5, 60000),
('DSBY-1710-3', 'MENU-0510358', 3, 1, 21000),
('DSBY-1710-3', 'MENU-0410446', 3, 1, 15000),
('DSBY-1702-4', 'MENU-1308401', 3, 1, 45000),
('DSBY-2906-5', 'MENU-08100914', 2, 1, 14000),
('DSBY-0907-6', 'MENU-16100746', 2, 2, 10000),
('DSBY-1107-7', 'MENU-11075972', 2, 1, 40000),
('DSBY-1107-7', 'MENU-16103364', 2, 1, 30000),
('DSBY-1107-8', 'MENU-16104338', 2, 1, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_staff` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_user` varchar(100) DEFAULT NULL,
  `level_user` int(1) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_staff`, `username`, `password`, `foto_user`, `level_user`, `last_login`) VALUES
(2, 1, 'administrator', '21232f297a57a5a743894a0e4a801fc3', 'tNAB87RTSx.png', 1, '2019-10-16 22:03:56'),
(16, 9, 'dimas@dapursunda.com', '81dc9bdb52d04dc20036dbd8313ed055', 'BaC6jlALSb.png', 2, '0000-00-00 00:00:00'),
(18, 11, 'superadmin', '21232f297a57a5a743894a0e4a801fc3', 'kXdhL8D2SY.png', 1, '2020-07-18 09:05:32'),
(19, 14, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'avatar_default.png', 2, '2020-02-18 08:26:10'),
(20, 12, 'nia', '81dc9bdb52d04dc20036dbd8313ed055', 'HXdZA7nOEl.png', 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mt_category`
--
ALTER TABLE `mt_category`
  ADD PRIMARY KEY (`id_kategori`);

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
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mt_payment_methode`
--
ALTER TABLE `mt_payment_methode`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mt_staff`
--
ALTER TABLE `mt_staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
