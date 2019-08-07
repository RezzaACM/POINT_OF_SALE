-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2019 pada 09.30
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
-- Struktur dari tabel `mt_items`
--

CREATE TABLE `mt_items` (
  `id_item` char(15) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `jenis_item` varchar(10) NOT NULL,
  `harga_item` float NOT NULL,
  `status_item` int(11) NOT NULL,
  `deskripsi_item` text NOT NULL,
  `ts_create` datetime NOT NULL,
  `ts_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mt_items`
--

INSERT INTO `mt_items` (`id_item`, `nama_item`, `jenis_item`, `harga_item`, `status_item`, `deskripsi_item`, `ts_create`, `ts_update`) VALUES
('MENU-0001', 'Nasi', 'Makanan', 5000, 1, 'Nasi Putih', '2019-08-05 01:12:12', '2019-08-05 14:59:16'),
('MENU-0002', 'Ikan', 'Makanan', 10000, 1, 'Ikan Goreng', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('MENU-0003', 'Ayam Bakar', 'Makanan', 15000, 1, 'Nothing', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_user` varchar(100) NOT NULL,
  `level_user` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `foto_user`, `level_user`) VALUES
(2, 'administrator', '21232f297a57a5a743894a0e4a801fc3', 'Test', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mt_items`
--
ALTER TABLE `mt_items`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
