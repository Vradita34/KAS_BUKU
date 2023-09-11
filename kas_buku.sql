-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Sep 2023 pada 14.03
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kas_buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `keterangan` varchar(70) NOT NULL,
  `nominal` float NOT NULL,
  `username` varchar(50) NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `keterangan`, `nominal`, `username`, `jenis_transaksi`, `date`) VALUES
(5, 'Utang', 200000, 'Admin', 'Pengeluaran', '2023-08-10'),
(6, 'Dana kas', 100000, 'Admin', 'Pemasukan', '2023-08-10'),
(7, 'Bantuan Desa', 20000000, 'Admin', 'Pemasukan', '2023-08-10'),
(10, 'Bantuan Jalan', 100000000, 'Admin', 'Pemasukan', '2023-08-12'),
(13, 'Beli Lampu LED Jalan(merah-putih)', 1000000, 'User', 'Pengeluaran', '2023-06-13'),
(14, 'Sewa Panggung', 200000, 'User', 'Pengeluaran', '2023-08-12'),
(15, 'Dana Jimpitan', 2000000, 'User', 'Pemasukan', '2023-08-15'),
(17, 'Jimpitan bulan Agustus', 350000, 'User', 'Pemasukan', '2023-09-03'),
(18, 'Pinjam seratus', 100000, 'Admin', 'Pengeluaran', '2023-09-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `level`) VALUES
(7, 'Admin', 'Admin', '$2y$10$23vj7jh5aQWEmvEdNVnk5.Ppbx3QviFFyiJr3TSCDhi2O.hWqpDji', 'Admin'),
(19, 'User', 'User', '$2y$10$5hUp2n4GUxryFxtPyktqweGh8cHwl5uMTN7qMFkM8SgBs9epJ8ctK', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
