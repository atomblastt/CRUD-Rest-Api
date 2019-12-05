-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2019 pada 07.22
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ali_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_mobil`
--

CREATE TABLE `t_mobil` (
  `id_mobil` int(11) NOT NULL,
  `no_kerangka` int(11) NOT NULL,
  `no_polisi` varchar(20) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `tahun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_mobil`
--

INSERT INTO `t_mobil` (`id_mobil`, `no_kerangka`, `no_polisi`, `merek`, `tipe`, `tahun`) VALUES
(1, 1234567890, 'B 1788 BA', 'Toyota', 'Avanza', '2011'),
(2, 987654321, 'B 8876 AC', 'Honda', 'Civic', '2009'),
(3, 923852390, 'BA 1717 MD', 'Honda', 'Accord', '2013'),
(4, 293859090, 'BK 9089 MM', 'Toyota', 'Ft 86', '2018'),
(12, 2147483647, 'BM 5678 M', 'Ford', 'Mustang', '2018'),
(18, 2147483647, 'DK 6753 GG', 'Mitsubishi ', 'Lancer Evo ', '2016');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL DEFAULT 'User',
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(7, 'admin', 'admin1', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', '2019-12-05 04:55:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_mobil`
--
ALTER TABLE `t_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_mobil`
--
ALTER TABLE `t_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
